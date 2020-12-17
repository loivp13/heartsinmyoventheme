<?php

/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ($understrap_includes as $file) {
	require_once $understrap_inc_dir . $file;
}
register_nav_menus(array(
	'primary'   => __('Home Menu', 'Home'),
	'secondary' => __('Blog Menu', 'Blog'),
	'tertiary' => __('Recipes Menu', 'Recipes'),
	'quaternary' => __('About Menu', 'About'),
	'quinary' => __('Contact Menu', 'Contact'),

));

//Add post count 
function get_post_counts()
{
	$count = get_post_meta(get_the_id(), 'post_views_count', true);
	return "$count views";
}
function set_post_view()
{
	$key = 'post_views_count';
	$post_id = get_the_id();
	$count = get_post_meta($post_id, $key, true);
	echo $count;
	$count++;
	update_post_meta($post_id, $key, $count);
}
function posts_column_views($columns)
{
	$columns['post_views'] = 'Views';
	return $columns;
}
function posts_custom_column_views($column)
{
	if ($column === 'post_views') {
		echo get_post_counts();
	}
}
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views');
