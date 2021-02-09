<?php

/**
 * Template Name: Template Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
    get_template_part('global-templates/hero');
}
?>



<div class="carousel-banner container d-flex justify-content-center mt-3">
    <div class="carousel-hero ">
        <div class="row d-flex justify-content-center">
            <div class="col-12 ">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php

                        // The Query
                        $arg = array(
                            'category_name' => 'featuring',
                            'posts_per_page' => 3,
                            'order'         => 'date'
                        );
                        $query = new WP_Query($arg);

                        // The Loop
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>

                                <div class="carousel-item <?php
                                                            echo $query->current_post === 0 ? 'active' : '';
                                                            ?>">
                                    <a href="<?php
                                                echo get_permalink(get_the_id())
                                                ?>">
                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_id()), 'large', false, array('class' => 'carousel-item-img d-block w-100')); ?>
                                        <div class="carousel-caption ">
                                            <h3><?php
                                                the_title();
                                                echo ' ';
                                                ?></h3>
                                        </div>

                                    </a>
                                </div>

                        <?php }
                        } else {
                            // no posts found
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata();

                        ?>
                    </div>


                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="fa fa-chevron-right"></i>

                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="carousel-favorites mb-5">

    <div class="container">
        <div class="carousel-favorites-title text-light-dark">
            LYNNA'S FAVORITES
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="carousel-favorites" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-favorites" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-favorites" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                                <div class="card-group d-flex">
                                    <?php

                                    // The Query
                                    $arg = array(
                                        'category_name' => 'favorites',
                                        'posts_per_page' => 4,
                                        'order'         => 'date'
                                    );
                                    $query = new WP_Query($arg);

                                    // The Loop
                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) {
                                            $query->the_post();
                                    ?>
                                            <div class="col-6 col-md-4 col-lg-3 card p-1 mb-0  onHoverShineAnimation onHoverShineAnimation-right
                                                <?php
                                                echo $query->current_post === 2 ? 'd-none d-md-block' : '';
                                                echo $query->current_post === 3 ? 'd-none d-md-none d-lg-block' : '';
                                                ?>">
                                                <a href="<?php echo get_permalink(get_the_id()); ?>">
                                                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_id()), 'large', false, array('class' => 'carousel-item-img card-img-top')); ?>
                                                    <div class="card-body">
                                                        <h4><?php
                                                            echo wp_trim_words(get_the_title(), 5);
                                                            ?></h4>
                                                    </div>
                                                </a>

                                            </div>

                                    <?php }
                                    } else {
                                        // no posts found
                                    }
                                    /* Restore original Post Data */
                                    wp_reset_postdata();

                                    ?>

                                </div>

                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <?php

                                // The Query
                                $arg = array(
                                    'category_name'  => 'favorites',
                                    'posts_per_page' => 4,
                                    'order'          => 'date',
                                    'offset'         => 4
                                );
                                $query = new WP_Query($arg);

                                // The Loop
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                ?>
                                        <div class="col-6 col-md-4 col-lg-3 card p-1 mb-0  onHoverShineAnimation onHoverShineAnimation-right
                                                <?php
                                                echo $query->current_post === 2 ? 'd-none d-md-block' : '';
                                                echo $query->current_post === 3 ? 'd-none d-md-none d-lg-block' : '';
                                                ?>">
                                            <a href="<?php echo get_permalink(get_the_id()) ?>">
                                                <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_id()), 'large', false, array('class' => 'carousel-item-img card-img-top')); ?>
                                                <div class="card-body">
                                                    <h4><?php
                                                        echo wp_trim_words(get_the_title(), 5);
                                                        ?></h4>
                                                </div>
                                            </a>

                                        </div>

                                <?php }
                                } else {
                                    // no posts found
                                }
                                /* Restore original Post Data */
                                wp_reset_postdata();

                                ?>

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-favorites" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-favorites" role="button" data-slide="next">
                        <i class="fa fa-chevron-right"></i>

                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="carousel-favorites mb-5">

    <div class="container">
        <div class="carousel-favorites-title text-light-dark">
            READER'S FAVORITES
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="carousel-reader-favorites" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-reader-favorites" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-reader-favorites" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex">
                                <?php

                                // The Query
                                $arg = array(
                                    'meta_key' => "post_views_count",
                                    'posts_per_page' => 4,
                                    'orderby' => 'meta_value_num'
                                );
                                $query = new WP_Query($arg);

                                // The Loop
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                ?>
                                        <div class="col-6 col-md-4 col-lg-3 card p-1 mb-0  onHoverShineAnimation onHoverShineAnimation-right
                                                <?php
                                                echo $query->current_post === 2 ? 'd-none d-md-block' : '';
                                                echo $query->current_post === 3 ? 'd-none d-md-none d-lg-block' : '';
                                                ?>">


                                            <a href="<?php echo get_permalink(get_the_id()); ?>">
                                                <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_id()), 'large', false, array('class' => 'carousel-item-img card-img-top')); ?>
                                                <div class="card-body">
                                                    <h4><?php
                                                        the_title();
                                                        ?></h4>
                                                </div>
                                            </a>

                                        </div>

                                <?php }
                                } else {
                                    // no posts found
                                }
                                /* Restore original Post Data */
                                wp_reset_postdata();

                                ?>


                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <?php

                                // The Query
                                $arg = array(
                                    'category_name'  => 'favorites',
                                    'posts_per_page' => 4,
                                    'order'          => 'date',
                                    'offset'         => 4
                                );
                                $query = new WP_Query($arg);

                                // The Loop
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                ?>
                                        <div class="col-6 col-md-4 col-lg-3 card mb-0 p-1  onHoverShineAnimation onHoverShineAnimation-right
                                                <?php
                                                echo $query->current_post === 2 ? 'd-none d-md-block' : '';
                                                echo $query->current_post === 3 ? 'd-none d-md-none d-lg-block' : '';
                                                ?>">

                                            <a href="<?php echo get_permalink(get_the_id()); ?>">
                                                <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_id()), 'large', false, array('class' => 'carousel-item-img card-img-top')); ?>
                                                <div class="card-body">
                                                    <h4><?php
                                                        echo wp_trim_words(get_the_title(), 5);
                                                        ?></h4>
                                                </div>
                                            </a>

                                        </div>

                                <?php }
                                } else {
                                    // no posts found
                                }
                                /* Restore original Post Data */
                                wp_reset_postdata();

                                ?>

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-reader-favorites" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-reader-favorites" role="button" data-slide="next">
                        <i class="fa fa-chevron-right"></i>

                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-3">
    <div class="carousel-favorites-title text-light-dark">
        RECENTLY POPULAR
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="carousel-reader-popular" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-reader-popular" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-reader-popular" data-slide-to="1"></li>
                </ol>
                <?php 
                if ( function_exists('wpp_get_mostpopular') ) {
                                    /* Get up to the top 5 commented posts from the last 7 days */
                                     wpp_get_mostpopular(array(
                                        'limit' => 8,
                                        'range' => 'last7days',
                                        'stats_views' => 0
                                    ));
                                }
                ?>
                
                <a class="carousel-control-prev" href="#carousel-reader-popular" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-reader-popular" role="button" data-slide="next">
                    <i class="fa fa-chevron-right"></i>

                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </div>
</div>

<?php
get_footer(); ?>
</div>


