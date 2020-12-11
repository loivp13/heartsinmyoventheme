<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;1,600&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="header mt-3 pb-3">
		<div class="container d-flex justify-content-between align-items-center">
			<div class="header-logo col-6 col-md-4">
				<img src="<?php echo get_template_directory_uri(); ?>/img/favorites/Final.png" alt="">
			</div>
			<div class="header_widget col-6 col-md-4 d-flex flex-column">
				<?php dynamic_sidebar('navmenu') ?>
			</div>

		</div>
	</div>
	<div class="site mt-5  bg-white" id="page">

		<!-- ******************* The Navbar Area ******************* -->

		<nav id="main-nav" class="navbar navbar-expand-lg bg-white nav justify-content-lg-around justify-content-md-start " aria-labelledby="main-nav-label">

			<div id="wrapper-navbar">

				<div class="mobile-menu-dropdown">

					<button class="navbar-toggler text-primary" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<!-- The WordPress Menu goes here -->
				<?php
				//on Home Page
				// var_dump(get_query_var('paged'));

				if (is_front_page()) {

					wp_nav_menu(
						array(
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							'theme_location'  => 'primary'
						)
					);
				} else if (is_home()) {
					wp_nav_menu(
						array(
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							'theme_location'  => 'secondary'
						)
					);
				} else if (is_page(334)) {
					wp_nav_menu(
						array(
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							'theme_location'  => 'tertiary'
						)
					);
				} else if (is_page(336)) {
					wp_nav_menu(
						array(
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							'theme_location'  => 'quaternary'
						)
					);
				} else if (is_page(338)) {
					wp_nav_menu(
						array(
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							'theme_location'  => 'quinary'
						)
					);
				}
				?>

		</nav><!-- .site-navigation -->


	</div><!-- #wrapper-navbar end -->