<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="container">
	<div class="footer_copy_right text-primary d-flex justify-content-center mb-4">
		© HEARTS IN MY OVEN. DEVELOPED BY LOI V PHAM.
	</div>
</div>
</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
</body>

</html>