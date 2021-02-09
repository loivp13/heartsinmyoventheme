<?php

/**
 * Hero setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
// The Query
$arg = array(
    'meta_key' => "post_views_count",
    'posts_per_page' => 4,
    'orderby' => 'meta_value_num'
);
$query = new WP_Query($arg);




?>
<div class="top-recipes-header text-light-dark">
    RECENTLY POPULAR

</div>
<div class="row no-gutters d-flex">
    <?php

    // The Query
    $arg = array(
        'meta_key' => "post_views_count",
        'posts_per_page' => 6,
        'orderby' => 'meta_value_num'
    );
    $query = new WP_Query($arg);

    // The Loop
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
    ?>
            <div class="col-md-4 top-recipes-item p-1">
                <a href="<?php echo get_permalink(get_the_id()); ?>">
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_id()), 'thumbnail', false, array('class' => 'carousel-item-img top-recipes-img')); ?>
                    <div class="card-body p-0">
                        <h4 class="top-recipes-title"><?php
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



<?php
