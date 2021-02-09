<?php

/**
 * Template Name: Template-Contact
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
?>

<?php if (is_front_page() && is_home()) : ?>
	<?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">
			<!-- <?php get_template_part('global-templates/left-sidebar-check'); ?> -->
			<main class="site-main col-12 col-md-8 d-flex flex-column align-items-center" id="main">
                <?php the_content() ?>
            </main><!-- #main -->
			<div class="col-0 col-md-4 p-0 top-recipes-container">
				<?php get_template_part('./global-templates/recently-popular') ?>
				<?php get_template_part('./global-templates/pinterest-widget') ?>

			</div>



			<!-- Do the left sidebar check and opens the primary div -->
			<!-- <?php get_template_part('global-templates/left-sidebar-check'); ?> -->


			<!-- The pagination component -->
			<!-- <?php understrap_pagination(); ?> -->

			<!-- Do the right sidebar check -->
			<?php get_template_part('global-templates/right-sidebar-check'); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
    