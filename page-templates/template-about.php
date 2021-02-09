<?php

/**
 * Template Name: Template-About
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
                <p>
                <b>Hi!</b> My name is Lynna (lee-nuh) and I`m a huge foodie! I started baking about 5 years ago. Before then, it was all frozen cookie dough and box mixes for me. I always wanted to learn how to bake, but my family didn`t have many baking essentials. I became obsessed with baking when I moved into a college apartment my sophomore year. I got crazy buying baking sheets, pans, etc. and went from having 0 to over 20 (and counting)!</p>
                <p>
I started baking so much, it became a need for me. I even think about food 24/7. No really, I do. ;) I craved to bake, basically. It launched me into this beautiful, magical, and delicious learning experience about food. Several years ago, I couldn`t even separate an egg...but I have learned so much since then. So, whether you`re new to baking or an experienced cook, I hope you`ll find something you like here!</p>
                <img src="https://2.bp.blogspot.com/-tpF2CyofQV0/UmrQaD1W9CI/AAAAAAAABpo/rgkhlGqTYUU/s1600/cfpumpkindonutsYG.jpg" alt="pumpkin donut holes">
                <p>
                    Food is a great way to bring people together and a fantastic way to show the people important in your life, that you care about them. I figured, I love baking and I bake for those I love...thus, my oven is always filled with hearts. Hearts In My Oven. 
                </p>
                <p>
                Thank you for stumbling on my little internet space! Happy reading & eating.
                </p>
                <p>Love, Lynna</p>
                <img src="https://4.bp.blogspot.com/-i_gbSTPLcsU/UNa2p9U8X9I/AAAAAAAAA6Q/pMwqqZimjSY/s1600/cinnamonsugarcrisps.jpg" alt="cinnamon crisp">
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
    