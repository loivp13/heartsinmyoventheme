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
	'/search-recipes.php'					// Load custom search for recipes
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
	$count += 1;
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


//  Custom Infinite Footer for Jetpack Infinite Scroll.

function my_custom_infinite_footer()
{
?>
	<div id="infinite-footer">
		<div class="container d-flex justify-content-end">
			<div class="col-2 d-flex flex-column align-items-center">
				<div class=" col-12 blog-credits-title text-center">BACK TO TOP</div>
				<img class="col-6" src="<?php echo get_template_directory_uri() ?>/img/back_to_top-green.png" alt="">
			</div>
		</div>
	</div>
<?php
}

/**
 * Custom Filter to replace the JetPack Infinite Scroll Footer
 **/
function my_infinite_scroll_settings($args)
{
	if (is_array($args))
		$args['footer_callback'] = 'my_custom_infinite_footer';
	return $args;
}



add_filter('infinite_scroll_settings', 'my_infinite_scroll_settings');



//RECIPES SEARCH AJAX

add_action('wp_head', 'wp97797_define_ajaxurl');
function wp97797_define_ajaxurl()
{ ?>
	<script type="text/javascript">
		let ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
<?php }

/**
 * Builds custom HTML.
 *
 * With this function, I can alter WPP's HTML output from my theme's functions.php.
 * This way, the modification is permanent even if the plugin gets updated.
 *
 * @param  array $popular_posts
 * @param  array $instance
 * @return string
 */


function my_custom_popular_posts_html_list($popular_posts, $instance ){		
	
	function loopStartAtStopAt($start, $stop, $string, $allPosts, $occurrence){
		for($i = $start; $i < $stop; $i++){
			$posts = $allPosts[$i];
			$string .= '<div class="col-6 col-md-4 col-lg-3 card p-1 mb-0  onHoverShineAnimation onHoverShineAnimation-right ';
			if( $i === 2){ $string .= 'd-none d-md-block">';}
			elseif ( $i === 3)  {$string .= 'd-none d-md-none d-lg-block">';}
			elseif ( $i === 6)  {$string .= 'd-none d-md-block">';}
			elseif ( $i === 7)  {$string .= 'd-none d-md-none d-lg-block">';}
			else {$string .= '">' ;}    

			$stats = array(); // placeholder for the stats tag

			// Comment count option active, display comments
			if ( $occurrence['stats_tag']['comment_count'] ) {
				// display text in singular or plural, according to comments count
				$stats[] = '<span class="wpp-comments">' . sprintf(
					_n('1 comment', '%s comments', $posts->comment_count, 'wordpress-popular-posts'),
					number_format_i18n($posts->comment_count)
				) . '</span>';
			}

			// Pageviews option checked, display views
			if ( $occurrence['stats_tag']['views'] ) {

				// If sorting posts by average views
				if ($occurrence['order_by'] == 'avg') {
					// display text in singular or plural, according to views count
					$stats[] = '<span class="wpp-views">' . sprintf(
						_n('1 view per day', '%s views per day', intval($posts->pageviews), 'wordpress-popular-posts'),
						number_format_i18n($posts->pageviews, 2)
					) . '</span>';
				} else { // Sorting posts by views
					// display text in singular or plural, according to views count
					$stats[] = '<span class="wpp-views">' . sprintf(
						_n('1 view', '%s views', intval($posts->pageviews), 'wordpress-popular-posts'),
						number_format_i18n($posts->pageviews)
					) . '</span>';
				}
			}

			// Author option checked
			if ( $occurrence['stats_tag']['author'] ) {
				$author = get_the_author_meta('display_name', $posts->uid);
				$display_name = '<a href="' . get_author_posts_url($posts->uid) . '">' . $author . '</a>';
				$stats[] = '<span class="wpp-author">' . sprintf(__('by %s', 'wordpress-popular-posts'), $display_name). '</span>';
			}

			// Date option checked
			if ( $occurrence['stats_tag']['date']['active'] ) {
				$date = date_i18n($occurrence['stats_tag']['date']['format'], strtotime($posts->date));
				$stats[] = '<span class="wpp-date">' . sprintf(__('posted on %s', 'wordpress-popular-posts'), $date) . '</span>';
			}

			// Category option checked
			if ( $occurrence['stats_tag']['category'] ) {
				$post_cat = get_the_category($posts->id);
				$post_cat = ( isset($post_cat[0]) )
				? '<a href="' . get_category_link($post_cat[0]->term_id) . '">' . $post_cat[0]->cat_name . '</a>'
				: '';

				if ( $post_cat != '' ) {
					$stats[] = '<span class="wpp-category">' . sprintf(__('under %s', 'wordpress-popular-posts'), $post_cat) . '</span>';
				}
			}

			// Build stats tag
			if ( ! empty($stats) ) {
				$stats = '<div class="wpp-stats">' . join(' | ', $stats) . '</div>';
			} else {
				$stats = null;
			}

			$excerpt = ''; // Excerpt placeholder

			// Excerpt option checked, build excerpt tag
			if ( $occurrence['post-excerpt']['active'] ) {

				$excerpt = get_excerpt_by_id($posts->id);
				if ( ! empty($excerpt) ) {
					$excerpt = '<div class="wpp-excerpt">' . $excerpt . '</div>';
				}

        	}

			$string .= "<a href='" . get_permalink($posts->id) . "'>";
			$string .= wp_get_attachment_image(get_post_thumbnail_id(($posts->id)), 'large', false, array('class' => 'carousel-item-img card-img-top'));
			$string .= "<div class='card-body'>";
			$string .=  "<h4>" .  wp_trim_words($posts->title, 5) . "</h4>";
			$string .= $stats;
			$string .= $excerpt;
			$string .=  "</div>";
			$string .=  "</a>";
			$string .= '</div>';
		
		}
		return $string;
		
	}

	$output = ' <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card-group d-flex">';

    // loop the array of popular posts objects
	$output = loopStartAtStopAt(0,4, $output, $popular_posts, $instance);
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="carousel-item">
	<div class="card-group d-flex">';
	$output = loopStartAtStopAt(4,8, $output, $popular_posts, $instance);
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';


    return $output;
}
add_filter('wpp_custom_html', 'my_custom_popular_posts_html_list', 10, 2);

/**
 * Gets the excerpt using the post ID outside the loop.
 *
 * @author Withers David
 * @link   http://uplifted.net/programming/wordpress-get-the-excerpt-automatically-using-the-post-id-outside-of-the-loop/
 * @param  int $post_id
 * @return string
 */
function get_excerpt_by_id($post_id) {
    // Get post data
    $the_post = get_post($post_id);
    // Get post_content
    $the_excerpt = $the_post->post_content;
    // Set excerpt length to 35 words, feel free to change this to whatever you like
    $excerpt_length = 35;
    // Remove all HTML tags
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt));

    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if ( count($words) > $excerpt_length ) :
        array_pop($words);
        array_push($words, '...');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';

    return $the_excerpt;
}


