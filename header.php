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
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>



	<?php do_action('wp_body_open'); ?>
	<div id='page' class="header site bg-white">
		<div class="row no-md-gutters d-flex bg-white flex-wrap flex-sm-no-wrap justify-content-end justify-content-lg-start align-items-end  mb-md-0">

			<!-- .site-navigation -->
			<nav id="main-nav" class="col-2 col-xl-6 navbar navbar-expand-xl bg-white nav justify-content-md-around justify-content-xl-center  order-1 order-xl-2" aria-labelledby="main-nav-label col-md-3">

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
								'menu_class'      => 'navbar-nav ml-auto mr-auto',
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
								'menu_class'      => 'navbar-nav ml-auto mr-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								'theme_location'  => 'secondary'
							)
						);
					} else if (is_page(7)) {
						wp_nav_menu(
							array(
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto mr-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								'theme_location'  => 'tertiary'
							)
						);
					} else if (is_page(11)) {
						wp_nav_menu(
							array(
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto mr-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								'theme_location'  => 'quaternary'
							)
						);
					} else if (is_page(333)) {
						wp_nav_menu(
							array(
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto mr-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								'theme_location'  => 'quinary'
							)
						);
					} else {
						wp_nav_menu(
							array(
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto mr-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								'theme_location'  => 'primary'
							)
						);
					}
					?>

			</nav>
			<!-- LOGO -->
			<div class="header-logo d-flex justify-content-center col-8 col-xl-3 order-2 order-xl-1">
				<a href="<?php echo get_home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/favorites/Final.png" alt="">
				</a>
			</div>
			<!-- Mobile Search Button -->
			<button class="col-2 d-block d-xl-none btn btn-icon btn-primary bg-white text-tertiary border-none btn-mobile order-3">
				<i class="fa fa-search"></i>
			</button>
			<!-- Search widget -->
			<div class="header_widget justify-content-end col-5 col-md-3 order-4 order-md-3 mt-2 animate-slideRight">
				<?php dynamic_sidebar('navmenu') ?>
			</div>

		</div>