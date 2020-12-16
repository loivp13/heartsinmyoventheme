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
	<div id='page' class="header site bg-white ">
		<div class="row no-md-gutters d-flex bg-white flex-wrap flex-sm-no-wrap justify-content-end justify-content-md-start align-items-end align-item-sm-center align-items-md-center mb-md-0 mb-md-3">

			<!-- .site-navigation -->
			<nav id="main-nav" class="col-2 col-md-6 navbar navbar-expand-md bg-white nav justify-content-md-around justify-content-lg-around  order-1 order-md-2" aria-labelledby="main-nav-label col-md-3">

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

			</nav>
			<!-- LOGO -->
			<div class="header-logo col-8 col-md-3 order-2 order-md-1">
				<img src="<?php echo get_template_directory_uri(); ?>/img/favorites/Final.png" alt="">
			</div>
			<!-- Mobile Search Button -->
			<button class="col-2 d-block d-md-none btn btn-icon btn-primary bg-white text-primary border-none btn-mobile order-3">
				<i class="fa fa-search"></i>
			</button>
			<!-- Search widget -->
			<div class="header_widget justify-content-md-end col-12 col-md-3 col-lg-3 order-4 order-md-3 mt-2 animate-slideRight">
				<?php dynamic_sidebar('navmenu') ?>
			</div>

		</div>
	</div>