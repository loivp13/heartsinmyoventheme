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

<ul>

</ul>


<div class="carousel-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="carousel-item-img d-block w-100" src="<?php echo get_template_directory_uri(); ?>/img/bakedcoffeecakefrenchtoast01.png" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Baked Coffee Cake French Toast</h3>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <img class="carousel-item-img" src="<?php echo get_template_directory_uri(); ?>/img/berrymilk01.png" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Berry Milk</h3>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="carousel-item-img" src="<?php echo get_template_directory_uri(); ?>/img/californiarollcrunch01.png" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>California Roll Crunch</h3>
                            </div>
                        </div>
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
        <div class="carousel-favorites-title">
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
                            <div class="row">
                                <div class="col-4 card">
                                    <img class="carousel-item-img card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bananaberrybreadpudding01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Bananaberry Bread Pudding</h4>
                                    </div>

                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bananacrumbcake01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Banana Crumbcake</h4>
                                    </div>


                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bbshortbread02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">BB Short Bread</h4>
                                    </div>


                                </div>
                                <!-- <div class="col-3 card">
                                    <img class="carousel-item-img" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                </div> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-4 card">
                                    <img class="carousel-item-img card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Mini Eggcake</h4>
                                    </div>

                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/redvelvetcookies02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Red Velvet Cookie</h4>
                                    </div>


                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/redvelvettccookies01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Red Velvet Cookie</h4>
                                    </div>


                                </div>
                                <!-- <div class="col-3 card">
                                    <img class="carousel-item-img" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                </div> -->
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

<div class="carousel-reader-favorites mb-5">

    <div class="container">
        <div class="carousel-favorites-title">
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
                            <div class="row">
                                <div class="col-4 card">
                                    <img class="carousel-item-img card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bananaberrybreadpudding01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Bananaberry Bread Pudding</h4>
                                    </div>

                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bananacrumbcake01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Banana Crumbcake</h4>
                                    </div>


                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bbshortbread02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">BB Short Bread</h4>
                                    </div>


                                </div>
                                <!-- <div class="col-3 card">
                                    <img class="carousel-item-img" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                </div> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-4 card">
                                    <img class="carousel-item-img card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Mini Eggcake</h4>
                                    </div>

                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/redvelvetcookies02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Red Velvet Cookie</h4>
                                    </div>


                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/redvelvettccookies01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Red Velvet Cookie</h4>
                                    </div>


                                </div>
                                <!-- <div class="col-3 card">
                                    <img class="carousel-item-img" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                </div> -->
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
<div class="carousel-reader-favorites mb-5">

    <div class="container">
        <div class="carousel-favorites-title">
            RECENTLY POPULAR
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
                            <div class="row">
                                <div class="col-4 card">
                                    <img class="carousel-item-img card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bananaberrybreadpudding01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Bananaberry Bread Pudding</h4>
                                    </div>

                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bananacrumbcake01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Banana Crumbcake</h4>
                                    </div>


                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/bbshortbread02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">BB Short Bread</h4>
                                    </div>


                                </div>
                                <!-- <div class="col-3 card">
                                    <img class="carousel-item-img" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                </div> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-4 card">
                                    <img class="carousel-item-img card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Mini Eggcake</h4>
                                    </div>

                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/redvelvetcookies02.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Red Velvet Cookie</h4>
                                    </div>


                                </div>
                                <div class="col-4 card">
                                    <img class="carousel-item-img  card-img-top" src="<?php echo get_template_directory_uri(); ?>/img/favorites/redvelvettccookies01.png" alt="">
                                    <div class="card-body">
                                        <h4 class="text-center">Red Velvet Cookie</h4>
                                    </div>


                                </div>
                                <!-- <div class="col-3 card">
                                    <img class="carousel-item-img" src="<?php echo get_template_directory_uri(); ?>/img/favorites/minieggcake02.png" alt="">
                                </div> -->
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


<?php
get_footer();
