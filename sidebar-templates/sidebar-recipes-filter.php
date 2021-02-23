<aside class='mb-4' data-css-sidebar="sidebar">
    <form id='searchRecipes' data-css-form="filter" data-js-form="filter">
        <h2 data-css-form="title" class=" search-recipes-heading text-light-dark">Search Recipes</h2>
        <div class="searchRecipes-orderby-box w-100 flex-column align-items-start">
            <label class='searchRecipes-orderby-label-title text-primary' data-css-form="label" >Order by</label>
            <fieldset class='d-flex flex-column col-12 pl-2' data-css-form="group">
                <label class='searchRecipes-orderby-label recipe-label-1' for="recipes-order-by">
                    <select class="searchRecipes-orderby" data-css-form="input select" id="recipes-order-by" name="recipes-order-by">
                        <option value="date">Date Posted</option>
                        <option value="meta_value">Popularity</option>
                    </select>
                </label>
                <label class='searchRecipes-orderby-label recipe-label-2'for="recipes-order" >
                    <select class="searchRecipes-orderby" data-css-form="input select" id="recipes-order" name="recipes-order">
                        <option value="DESC">Newest to Old</option>
                        <option value="ASC">Oldest to New</option>
                    </select>
                </label>
            </fieldset>
        </div>
        <div class="row w-100 no-gutters">
            <div class="col-12">
                <fieldset data-css-form="group">
                    <?php

                    $filterSweetCategories = get_terms(array(
                        'slug' => array('brownies', 'bread', 'cake', 'cookies', 'pie', 'donuts', 'ice-cream', 'muffins', 'rolls', 'pastry')
                    ));
                    ?>
                    <section class="search-section">
                        <div class="browse-title row justify-content-between no-gutters align-items-center">
                            <div class="mr-3 heading-style-2 ">Sweets</div>
                            <div class="fa fa-plus searchRecipes-icon-plus text-primary rotate180right"></div>
                        </div>
                        <div class="browse-filter browse-filter-open">
                            <?php
                            foreach ($filterSweetCategories as $keyword) :
                                //replacing filter's categories to match back-end
                                switch ($keyword->name) {
                                    case 'Brownies':
                                        $keyword->name = 'brownies/bars';
                                        break;
                                    case 'Pie':
                                        $keyword->name = 'pies/cobblers/crisps';
                                        break;
                                    case 'Cake':
                                        $keyword->name = 'cake/cupcakes';
                                        break;
                                    case 'Rolls':
                                        $keyword->name = 'rolls/buns';
                                        break;
                                }

                            ?>

                                <div class='search-input' data-css-form="input-group">
                                    <input class='searchRecipes-input-chk' type="checkbox" id="<?= $keyword->slug; ?>" name="recipes-id[]" value="<?= $keyword->term_id; ?>">
                                    <label for="<?= $keyword->slug; ?>"><?= $keyword->name; ?></label>
                                </div>

                            <?php endforeach; ?>
                        </div>

                    </section>



                    <?php
                    $filterSweetCategories = get_terms(array(
                        'slug' => array('breakfast', 'sandwich', 'pasta', 'pizza', 'appetizer')
                    ));
                    ?>
                    <section class="search-filter">
                        <div class="browse-title row justify-content-between no-gutters align-items-center">
                            <div class="mr-3 heading-style-2 ">Savory</div>
                            <div class="fa fa-plus searchRecipes-icon-plus text-primary rotate180left"></div>
                        </div>
                        <div class="browse-filter browse-filter-close">

                            <?php
                            foreach ($filterSweetCategories as $keyword) :

                                switch ($keyword->name) {
                                    case 'Pizza':
                                        $keyword->name = 'pizza/calzone';
                                        break;
                                }

                            ?>

                                <div  class='search-input' data-css-form="input-group">
                                    <input class='searchRecipes-input-chk' type="checkbox" id="<?= $keyword->slug; ?>" name="recipes-id[]" value="<?= $keyword->term_id; ?>">
                                    <label for="<?= $keyword->slug; ?>"><?= $keyword->name; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>

                    <?php

                    // $filteredCategories = get_categories(array(
                    //     'term_taxonomy_id' => $filter_category_ids,
                    //     'orderby' => 'name'
                    // ));

                    $filterSweetCategories = get_terms(array(
                        'slug' => array('season-spring', 'season-summer', 'season-fall', 'season-winter')
                    ));
                    ?>
                    <section class="search-filter">
                        <div class="browse-title row justify-content-between no-gutters align-items-center">
                            <div class="mr-3 heading-style-2 ">Seasons</div>
                            <div class="fa fa-plus searchRecipes-icon-plus text-primary rotate180left"></div>
                        </div>
                        <div class="browse-filter browse-filter-close">

                            <?php
                            foreach ($filterSweetCategories as $keyword) :

                                $keyword->name = substr($keyword->name, 7);

                            ?>

                                <div  class='search-input' data-css-form="input-group">
                                    <input class='searchRecipes-input-chk' type="checkbox" id="<?= $keyword->slug; ?>" name="recipes-id[]" value="<?= $keyword->term_id; ?>">
                                    <label for="<?= $keyword->slug; ?>"><?= $keyword->name; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>


                    <?php

                    // $filteredCategories = get_categories(array(
                    //     'term_taxonomy_id' => $filter_category_ids,
                    //     'orderby' => 'name'
                    // ));

                    $filterSweetCategories = get_terms(array(
                        'slug' => array('drinks', 'spices', 'dulce-de-leche')
                    ));
                    ?>
                    <section class="search-filter">

                        <div class="browse-title row justify-content-between no-gutters align-items-center">
                            <div class="mr-3 heading-style-2 ">Others</div>
                            <div class="fa fa-plus searchRecipes-icon-plus text-primary rotate180left"></div>
                        </div>
                        <div class="browse-filter browse-filter-close">


                            <?php
                            foreach ($filterSweetCategories as $keyword) :


                            ?>

                                <div class='search-input' data-css-form="input-group">
                                    <input class='searchRecipes-input-chk' type="checkbox" id="<?= $keyword->slug; ?>" name="recipes-id[]" value="<?= $keyword->term_id; ?>">
                                    <label for="<?= $keyword->slug; ?>"><?= $keyword->name; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset class='d-flex justify-content-end' data-css-form="group right">
                    <button class='search-filter-button bg-white col-4' data-css-button="button red">Filter</button>
                    <input type="hidden" name="action" value="recipe_search">
                </fieldset>
            </div>

        </div>




    </form>
</aside>