( function( $ ) {
    //Toggle search bar on small devices
    //otherwise same functionality
    (function(){
        let searchButton  = $('.btn-mobile');
        let searchBar =  $('.header_widget');
        let searchIcon = $('.btn-icon');

        searchButton.click( (e) => {
            let windowSize = window.innerWidth;
            if(windowSize < 992){
                e.preventDefault();
                searchBar.toggle({
                    start: function(){
                         searchBar.toggleClass('animate-slideRight animate-slideLeft');
                    },
                    queue: false,
                    duration: 400,
                    easing: 'linear',
                });
                    
            }
        })

        //add onScroll
        
        let scrollTop ;

        //elements
        let topRecipesSidebar = $('.top-recipes-container');
        let infinitefooter = $('.infinite-footer') 
        
        $(window).scroll((e) => {
            if(scrollTop < 100){

             infinitefooter.css('display', 'none')
            }
            
        }
        )

       

        
    })()




	
} )( jQuery );
