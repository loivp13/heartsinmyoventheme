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

<div class="wrapper" id="wrapper-footer">
	<div class="footer-connect">
		<div class="footer-connect-header">
			Stay Connected!
		</div>

		<div class="footer-connect-subscribe  mb-5">
			<div class="footer-connect-title">SUBSCRIBE TO GET NEW RECIPES</div>
			<div class="footer-connect-form">
				<input type="text" class="footer-connect-form">
				<i class="fa fa-arrow-right"></i>

			</div>
		</div>
	</div>
</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>