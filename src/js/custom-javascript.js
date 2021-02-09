(function ($) {
	//Toggle search bar on small devices
	//otherwise same functionality
	(function () {
		//ADD SHINE ANIMATIONS TO CARDS
		addShineAnimation();

		let searchButton = $(".btn-mobile");
		let searchBar = $(".header_widget");
		let searchIcon = $(".btn-icon");

		searchButton.click((e) => {
			let windowSize = window.innerWidth;
			if (windowSize < 1200) {
				e.preventDefault();
				searchBar.toggle({
					start: function () {
						searchBar.toggleClass("animate-slideRight animate-slideLeft");
					},
					queue: false,
					duration: 400,
					easing: "linear",
				});
			}
		});

		//add onScroll

		let scrollTop;

		//elements
		let topRecipesSidebar = $(".top-recipes-container");
		let infinitefooter = $(".infinite-footer");

		$(window).scroll((e) => {
			if (scrollTop < 100) {
				infinitefooter.css("display", "none");
			}
		});

		//Search Filter Toggle

		/////////// PRINT FRIENDLY///////////
		let dev = false;

		function createTableOfContent(
			element,
			index = 0,
			ToC = {
				firstImage: {
					src: "",
					start: 0,
				},
				header: {
					start: 0,
					end: 0,
				},
				ingredients: {
					start: 0,
					end: 0,
				},
				directions: {
					start: 0,
					end: element.children.length,
				},
				materials: {
					start: 0,
					end: 0,
				},
				needsExtraction: false,
				extractionSite: 0,
			},
			childrenLength = element.children.length,
			originalElement = element
		) {
			let e = [...element.children];
			//RETURN FIRST IMAGE SRC and START AND END POSITIONS OF THE FOLLOWING: HEADER, INGREGIENTS, AND DIRECTIONS
			// ???BETTER SOLUTIONS???
			// ??????????????????????
			if (dev) {
			} else if (!dev) {
				//Loop though marking firstImage, header, ingredients, directions, and materials
				ToC: for (let i = 0; i < e.length; i++) {
					let text = e[i].innerHTML.trim();

					if (e[i].tagName === "IMG" && !ToC.firstImage.src) {
						ToC.firstImage.src = e[i].getAttribute("src");
						ToC.firstImage.start = index;
					} else if (
						e[i].style.fontSize === "20pt" ||
						e[i].style.fontSize === "22pt" ||
						e[i].tagName === "H2" ||
						e[i].tagName === "H1" ||
						e[i].tagName === "H3"
					) {
						ToC.header.start = index;
						//If header.start is the same as the element's length, high chance it's older posts,
						//break
						if (
							ToC.header.start === childrenLength - 1 ||
							ToC.header.start === childrenLength - 2
						) {
							ToC.extractionSite = ToC.header.start;
							break;
						}
					} else if (
						text === "Ingredients" ||
						text === "Ingredients:" ||
						text === "Ingredients:&nbsp;" ||
						text === "INGREDIENTS:"
					) {
						if (!ToC.ingredients.start) ToC.ingredients.start = index;
						if (!ToC.header.end && ToC.header.start) {
							ToC.header.end = index;
						}

						if (ToC.materials.start && !ToC.materials.end) {
							ToC.materials.end = index;
						}

						if (
							ToC.ingredients.start === ToC.materials.end &&
							ToC.ingredients.end === ToC.materials.start &&
							!ToC.extractionSite
						) {
							ToC.extractionSite = index;
							break;
						}
					} else if (
						text === "Materials Needed:" ||
						text === "Materials:" ||
						text === "Materials Needed" ||
						text === "Materials Needed:"
					) {
						if (!ToC.materials.start) ToC.materials.start = index;
						if (!ToC.header.end && ToC.header.start) {
							ToC.header.end = index;
						}
						if (ToC.ingredients.start && !ToC.ingredients.end)
							ToC.ingredients.end = index;

						if (
							ToC.ingredients.start === ToC.materials.end &&
							ToC.materials.start === ToC.ingredients.end &&
							!ToC.extractionSite
						) {
							ToC.extractionSite = index;
							break;
						}
					} else if (
						text === "Directions" ||
						text === "Directions:" ||
						text === "Directions:&nbsp;" ||
						text === "DIRECTIONS:"
					) {
						ToC.directions.start = index;
						if (!ToC.ingredients.end) {
							ToC.ingredients.end = index;
						}
						if (!ToC.materials.end) {
							ToC.materials.end = index;
						}
					} else if (e[i].children) {
						for (let j = 0; j < e[i].children.length; j++) {
							createTableOfContent(
								e[i],
								index,
								ToC,
								childrenLength,
								originalElement
							);
						}
					}
					index++;
				}

				return ToC;
			}
		}

		function searchForLastImage(element, hasImg = false) {
			if (hasImg) {
				return hasImg;
			}
			if (element.tagName === "IMG") {
				hasImg = true;
			} else if (element.children) {
				for (let i = 0; i < element.children.length; i++) {
					return searchForLastImage(element.children[i], hasImg);
				}
			}

			return hasImg;
		}

		//creates element tags
		function nodeCreation(tagName, className, attribute, innerText) {
			let element = document.createElement(tagName);

			//add classes depending if array or string
			if (Array.isArray(className)) {
				for (let i of className) {
					element.classList.add(i);
				}
			} else if (typeof className === "string") {
				element.classList.add(className);
			}

			//set attributes
			for (let i in attribute) {
				element.setAttribute(`${i}`, `${attribute[i]}`);
			}

			//set innerHTML
			element.textContent = innerText;

			return element;
		}

		let printElements = document.querySelector("#entry-content-print");

		//if needs for extraction loop, extract and loop again
		function needsExtractionCheck(ToC) {
			if (ToC.needsExtraction) {
				console.log(
					"🚀 ~ file: custom-javascript.js ~ line 219 ~ needsExtractionCheck ~ ToC",
					ToC
				);

				let lastChild = document
					.createRange()
					.createContextualFragment(
						printElements.children[printElements.childElementCount - 1]
							.innerHTML
					);

				printElements.replaceChild(
					lastChild,
					printElements.children[printElements.childElementCount - 1]
				);
				return needsExtractionCheck(createTableOfContent(printElements));
			} else if (ToC.extractionSite) {
				console.log(ToC);
				console.log(
					"🚀 ~ file: custom-javascript.js ~ line 241 ~ needsExtractionCheck ~ printElements.children[ToC.extractionSite].innerHTML",
					printElements.children[ToC.extractionSite].innerHTML
				);
				let child = document
					.createRange()
					.createContextualFragment(
						printElements.children[ToC.extractionSite].innerHTML
					);

				printElements.replaceChild(
					child,
					printElements.children[ToC.extractionSite]
				);

				return needsExtractionCheck(createTableOfContent(printElements));
			}

			return ToC;
		}
		//style and structure the elements that will be printed

		if (printElements) {
			if (dev) {
				return;
			}
			let ToC = needsExtractionCheck(createTableOfContent(printElements));
			console.log(ToC);
			let { firstImage, header, ingredients, directions, materials } = ToC;

			if (!ingredients.start) {
				return;
			}
			let headerDiv = nodeCreation("div", [
				"print-header-box",
				"d-flex",
				"justify-content-around",
				"align-items-center",
				"p-3",
			]);
			let headerLeft = nodeCreation("div", ["print-header-box-left", "col-4"]);
			let headerRight = nodeCreation("div", [
				"print-header-box-right",
				"col-8",
			]);

			let directionsDiv = nodeCreation("div", [
				"print-directions-box",
				"px-5",
				"pb-5",
			]);
			let ingredientsDiv = nodeCreation("div", [
				"print-ingredients-box",
				"px-5",
				"pt-5",
			]);
			let materialDiv = nodeCreation("div", [
				"print-ingredients-box",
				"px-5",
				"pt-5",
			]);

			let elements = [...printElements.children];

			for (let i = 0; i < elements.length; i++) {
				if (i === firstImage.start) {
					headerLeft.appendChild(
						nodeCreation("img", "print-image", { src: `${firstImage.src}` })
					);
				} else if (i >= header.start && i < header.end) {
					headerRight.appendChild(elements[i]);

					if (i === header.end - 1) {
						headerDiv.appendChild(
							nodeCreation(
								"div",
								["print-button", "print-none"],
								null,
								"print recipe"
							)
						);
					}
				} else if (i >= ingredients.start && i < ingredients.end) {
					ingredientsDiv.appendChild(elements[i]);
				} else if (
					materials.start &&
					i >= materials.start &&
					i < materials.end
				) {
					materialDiv.appendChild(elements[i]);
				} else if (i >= directions.start && i < directions.end) {
					directionsDiv.appendChild(elements[i]);
				}
			}

			let printContainer = nodeCreation("div", ["print-container", "mt-5"]);

			headerDiv.appendChild(headerLeft);
			headerDiv.appendChild(headerRight);
			printContainer.appendChild(headerDiv);
			printContainer.appendChild(ingredientsDiv);
			printContainer.appendChild(directionsDiv);
			printElements.appendChild(printContainer);

			//Edit Print card header
			[
				...document
					.querySelector(".print-header-box-right")
					.getElementsByTagName("I"),
			].forEach((e, i, arr) => {
				if (arr.length === 1) {
					let innerText;
					if (e.querySelector("span")) {
						innerText = e.querySelector("span").innerHTML;
					} else {
						innerText = e.innerHTML;
					}
					innerText = innerText.replaceAll("&nbsp;", "");
					innerText = innerText.replaceAll("Print", "");
					innerText = innerText.replaceAll("+ ", "");
					let indexOfSpacer = innerText.indexOf("|");
					let firstHalfText = innerText.slice(0, indexOfSpacer);
					let secondHalfText = innerText.slice(++indexOfSpacer);

					let frag1 = document
						.createRange()
						.createContextualFragment(firstHalfText);
					let frag2 = document
						.createRange()
						.createContextualFragment(secondHalfText);

					let firstHalfTextDiv = nodeCreation(
						"div",
						["print-title"],
						null,
						null
					);
					firstHalfTextDiv.appendChild(frag1);

					let secondHalfTextDiv = nodeCreation("div", null, null, null);
					secondHalfTextDiv.appendChild(frag2);

					e.innerHTML = "";
					e.appendChild(firstHalfTextDiv);
					e.appendChild(secondHalfTextDiv);
				} else if (arr.length > 1) {
					let text = e.innerText.trim();
					text.replaceAll("Print", "");

					if (text[0] === "|" || text[text.length - 1]) {
						text = text.replaceAll("|", "");
					}
					let indexYield = text.indexOf("Yields");
					if (indexYield !== -1) {
						let box1 = nodeCreation("div", ["recipe-print-card-line"]);
						let box2 = nodeCreation("div", ["recipe-print-card-line"]);
						box1.innerHTML = text.slice(0, indexYield);
						box2.innerHTML = text.slice(indexYield);
						e.innerText = "";
						e.appendChild(box1);
						e.appendChild(box2);
					} else if (text.indexOf("+ ")) {
						e.style.display = "initial";
					}
				}
			});

			[
				...document
					.querySelector(".print-header-box-right")
					.getElementsByTagName("div"),
			].forEach((e) => {
				if (e.innerHTML.indexOf("Print Recipe") !== -1) {
					e.style.display = "none";
				}
			});
		}

		///Make elements before the last image to display:none when in print screen
		let updatedPrintElements = document.querySelector("#entry-content-print");
		console.log(
			"🚀 ~ file: custom-javascript.js ~ line 353 ~ updatedPrintElements",
			updatedPrintElements
		);
		if (updatedPrintElements) {
			updatedPrintElements = [...updatedPrintElements.children];
			let indexOfLastImage = [];

			updatedPrintElements.forEach((e, i) => {
				if (i < updatedPrintElements.length - 1) e.classList.add("print-none");
				if (searchForLastImage(e)) {
					e.classList.add("py-3");
				}
			});
			// console.log(indexOfLastImage);
			// for (let i = 0; i <= updatedPrintElements.childElementCount - 2; i++) {
			// 	if (indexOfLastImage.includes(i)) {
			// 		console.log(
			// 			"🚀 ~ file: custom-javascript.js ~ line 259 ~ indexOfLastImage.indexOf(i)",
			// 			indexOfLastImage.indexOf(i)
			// 		);
			// 		updatedPrintElements[i].classList.add("py-5");
			// 	}
			// 	updatedPrintElements[i].classList.add("print-none");
			// }
		}
	})();

	////////////////////AJAX////////////////////////////////
	$(document).ready(() => {
		var fruit = "Banana";
		let recipesContent = $(".search-results");

		//ONLOAD SEARCH RECIPES VIA AJAX
		postSearchRecipesAJAX();
		//ONCLICK SEARCH RECIPES VIA AJAX
		$("#searchRecipes").on(
			"click",
			debounce(function (e) {
				e.preventDefault();
				let data = $(this).serialize();

				postSearchRecipesAJAX();
			}, 750)
		);

		//Utility functions TO CALL
		function debounce(func, wait, immediate) {
			let timeout;

			return function () {
				let context = this,
					args = arguments;
				let later = function () {
					timeout = null;
					if (!immediate) func.apply(context, args);
				};
				let callNow = immediate && !timeout;
				clearTimeout(timeout);
				timeout = setTimeout(later, wait);
				if (callNow) func.apply(context, args);
			};
		}

		function addPaginationListeners(element) {
			element.on("click", function (e) {
				e.preventDefault();

				postSearchRecipesAJAX(+this.dataset.paged);
			});
		}

		//AJAX request for filtered recipes
		function postSearchRecipesAJAX(pageNum) {
			let data = $("#searchRecipes").serialize();
			if (pageNum) {
				data = `paged=${pageNum}&${data}`;
			}

			$.ajax({
				url: ajaxurl,
				data,
				type: "POST",
				action: "recipe_search",
				success: function (res) {
					$(".search-results").html(res);
					//add eventlisteners to pagination
					let pageNumbers = $(".search-results-page-num");
					pageNumbers.each(function () {
						addPaginationListeners($(this));
					});
					addShineAnimation();
				},
				error: function (res) {
					console.warn(res);
				},
			});
		}
	});

	//TOGGLE SEARCH BOX FILTERS
	(function () {
		//STOP PROPAGATION IF USER TOGGLE FILTER SECTIONS
		let titleContainer = $(".browse-title");
		let searchHeading = $(".search-recipes-heading");
		searchHeading.on("click", function (e) {
			if (window.innerWidth <= 768) {
				let element = $(this);
				e.stopPropagation();
				element.siblings().toggle(400);
			}
		});

		titleContainer.each(function () {
			let element = $(this);
			element.on("hover", function (e) {
				element.css("cursor", "pointer");
			});

			element.on("click", function (e) {
				e.stopPropagation();
				element.siblings().toggle(400);
				element.children().last().toggleClass("rotate180left");
				element.children().last().toggleClass("rotate180right");
			});
		});

		//STOP PROPAGATION WHEN USER CLICK ON ORDER BY OPTION TO SELECT OPTION
		//CONTINUE AJAX IF USER CHANGES SELECT OPTION
		let orderbyDropdown = $(".searchRecipes-orderby");
		orderbyDropdown.each(function () {
			let element = $(this);

			element.on(
				"click",
				propagationCheck(element.val(), function (e) {
					e.stopPropagation();
				})
			);
		});

		function propagationCheck(val, fnc) {
			let cache = val;

			return function () {
				let element = $(this);
				let args = arguments;
				if (element.val() === cache) {
					fnc.apply(element, args);
				} else {
					cache = element.val();
				}
			};
		}

		//ADD SHRINE ANIMATION
	})();
})(jQuery);
function addShineAnimation() {
	let elementToShine = document.querySelectorAll(".onHoverShineAnimation");
	[...elementToShine].forEach((e) => {
		e.addEventListener("mouseenter", function () {
			e.classList.toggle("onHoverShineAnimation-left");
			e.classList.toggle("onHoverShineAnimation-right");
			window.setTimeout(function () {
				e.classList.toggle("onHoverShineAnimation-left");
			}, 1200);
			window.setTimeout(function () {
				e.classList.toggle("onHoverShineAnimation-right");
			}, 1200);
		});
	});
}
