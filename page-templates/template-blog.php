<?php /* Template Name: Template-Blog */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
    get_template_part('global-templates/hero');
}

?>





<?php
get_footer(); ?>
