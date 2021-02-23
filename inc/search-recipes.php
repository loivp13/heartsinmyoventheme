<?php


// Exit if accessed directly.
defined('ABSPATH') || exit;



function recipe_search()
{

    $recipes_id = $_POST['recipes-id'];
    $recipes_order_by = $_POST['recipes-order-by'];
    $recipes_order = $_POST['recipes-order'];
    $paged = $_POST['paged'];

    if (!$paged) {
        $paged = 1;
    } else {
        $paged = abs($paged);
    }
    //date alpha meta value
    //if date ->

    foreach ($recipes_id as $recipe) {
        switch ($recipe) {
            case '34':
                echo $recipe;
                array_push($recipes_id, '32');
                break;
            case '27':
                array_push($recipes_id, '88');
                break;
            case '21':
                array_push($recipes_id, '117', '109');
                break;
        }
    }


    $args = array(
        'cat' => $recipes_id,
        'order' => $recipes_order,
        'orderby' => $recipes_order_by,
        'posts_per_page' => 24,
        'paged' => $paged

    );
    if($recipes_order_by === 'meta_value'){
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = 'post_views_count';

    }

    $query = new WP_Query($args);
    $max_pages = ($query->max_num_pages);
    $max_pages = intval($max_pages);



    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $url = get_the_permalink();
            $title = get_the_title();
            $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
?>
            <div class="col-4 col-md-3  ">
                <a href=<?php echo $url ?>>
                    <div class="search-results-image  onHoverShineAnimation onHoverShineAnimation-right">
                        <img src=<?php echo $thumb ?> alt="">
                    </div>
                    <div class="">
                        <?php echo trim($title, " \n\r\t\v\0") ?>
                    </div>
                </a>
            </div>


        <?php
        }
        wp_reset_postdata();
        ?>


        <div class="search-results-pagination col-12 d-flex justify-content-center">
            <div class="d-flex col-12 col-sm-8 col-md-12 col-lg-11 col-xl-7 align-items-center justify-content-around">
            <!-- Hide Previous and First buttons -->
            <?php
            if ($paged > 1) {
                $previousPaged = $paged-1;

                echo
                    "
                        <div class=''>
                                <a data-paged=1 class='search-results-first search-results-page-num'> |<< </a>
                        </div>
                         <div class=''>
                                <a data-paged=$previousPaged class='search-results-previous search-results-page-num'>  PREV</a>
                        </div>
                        
                        ";
            } else {
                 echo"";
            }
        }


        if ($max_pages < 6) {
            for ($x = 1; $x <= $max_pages; $x++) {
                if ($x === $paged) {
                    echo "<div class='search-results-page search-results-current-page'>
                            <a data-paged=$x href='#' class='search-results-page-num'>$x</a>
                         </div>";
                } else {
                    echo "<div class='search-results-page search-results-current-page'>
                            <a  data-paged=$x href='#' class='search-results-page-num'>$x</a>
                        </div>";
                }
            }
        } elseif ($max_pages > 6) {
            if ($paged <= 3) {
                for ($x = 1; $x <= 5; $x++) {
                    if ($paged === $x) {

                        echo "<div class='search-results-page search-results-current-page'>
                                    <a  data-paged=$x href='#' class='search-results-page-num'>$x</a>
                                </div>";
                    } else {
                        echo "<div class='search-results-page search-results-page'>
                                    <a  data-paged=$x href='#' class='search-results-page-num'>$x</a>
                                </div>";
                    }
                }
            } else if ($paged > 3 && $paged <= $max_pages - 2) {
                for ($x = $paged - 2; $x <= $paged + 2; $x++) {
                    if ($paged === $x) {
                        echo "<div class='search-results-page search-results-current-page'>
                                        <a  data-paged=$x href='#' class='search-results-page-num'>$x</a>
                                    </div>";
                    } else {
                        echo "<div class='search-results-page search-results-page'>
                                <a  data-paged=$x href='#' class='search-results-page-num'>$x</a>
                                </div>";
                    }
                }
            } else {
                for ($x = $max_pages - 4; $x <= $max_pages; $x++) {
                    if ($paged === $x) {
                        echo "<div class='search-results-page search-results-current-page'>
                                <a  data-paged=$x href='#' class='search-results-page-num'>$x</a>
                             </div>";
                    } else {
                        echo "<div class='search-results-page search-results-page'>
                                <a  data-paged=$x href='#' class='search-results-page-num'>$x</a>
                                </div>";
                    }
                }
            }
        }

        if ($paged === $max_pages) {
            echo '';
        } else {
            $nextPaged = $paged+1;
            echo "
                        <div class=''>
                                <a data-paged=$nextPaged class='search-results-page-num search-results-next'>  NEXT </a>
                        </div>
                        ";
        }


        if ($paged !== $max_pages) {
            echo "
                        <div class=''>
                                <a data-paged=$max_pages class='search-results-page-num search-results-last'> >>|</a>
                        </div>
                        ";
        }




            ?>
            </div>
        </div>

    <?php



    // // Always die in functions echoing AJAX content
    wp_die();
}

// This bit is a special action hook that works with the WordPress AJAX functionality.
add_action('wp_ajax_recipe_search', 'recipe_search');
add_action('wp_ajax_nopriv_recipe_search', 'recipe_search');
