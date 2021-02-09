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

<div class="wrapper print-none" id="wrapper-footer">
	<div class="footer-connect">
		<div class="footer-connect-header">
			Stay Connected!
		</div>

		<div class="footer-connect-subscribe  mb-5">
			<div class="footer-connect-title text-light-dark">SUBSCRIBE TO GET NEW RECIPES</div>
			<div class="footer-connect-form d-flex">
				<input type="text" class="footer-connect-form border-primary-reg" placeholder="ENTER EMAIL">
				<div class="footer_arrow_icon d-flex">
					<img class="footer_arrow_image" src="<?php echo get_template_directory_uri(); ?>/img/arrow_right_icon.png" alt="">
				</div>

			</div>
		</div>
	</div>
</div><!-- wrapper end -->
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