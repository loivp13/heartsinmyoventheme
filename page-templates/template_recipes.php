<?php

/**
 * Template Name: Template Recipes
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

?>
<div class="wrapper" id="page-wrapper">
    <div class="row search-recipes">
        <div class="col-12 col-md-4 col-xl-3">
            <?php get_template_part('sidebar-templates/sidebar-recipes-filter') ?>
        </div>
        <div class="col-12 col-md-8 col-xl-9">
            <div class="search-results row">
            </div>
        </div>
    </div>





</div><!-- #page-wrapper -->

<?php
get_footer();
