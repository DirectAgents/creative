<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 *
 * WARNING: Please do not edit this file in any way
 *
 * load the theme function files
 */
require ( get_template_directory() . '/core/includes/functions.php' );
require ( get_template_directory() . '/core/includes/theme-options.php' );
require ( get_template_directory() . '/core/includes/post-custom-meta.php' );
require ( get_template_directory() . '/core/includes/tha-theme-hooks.php' );
require ( get_template_directory() . '/core/includes/hooks.php' );
require ( get_template_directory() . '/core/includes/version.php' );

/** 
 * Use custom.js for generic site functionality 
 */
add_action( 'wp_enqueue_scripts', 'rs_custom_js' );
function rs_custom_js() {
	wp_enqueue_script( 'cutsomjs', get_stylesheet_directory_uri() . '/core/js/custom.js', array( 'jquery' ), false, false);
}

/**
 * get rid of space after read more 
 */
add_filter('the_excerpt', 'excerpt_ellipse');
function excerpt_ellipse($text) {
	 return str_replace('<p><!-- end of .read-more --></p>', '', $text);
}

/**
 * change the read more link to include a +
 */
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ) {
	return '<div class="read-more"><a href="'. get_permalink( get_the_ID() ) . '">Read More +</a></div>';
}

/**
 * Create a shorter title 
 */
function short_text ($text, $max)
{
	strlen($text) >= $max ? $dots = '...' : $dots = '';
	return substr($text, 0, $max) . $dots;
}

/**
 * Create breadcrumbs for advice and articles 
 */
function advice_breadcrumbs ($tax)
{
	global $post;
	$tax_page = '';

	// Check if we're on a sub page. If not then return root Advice and Articles page
	if (!isset($tax)) 
		return '';	
	
	//$tax = '';

	if (is_single())
	{
		$terms = get_the_terms($post->ID, 'advice_articles_tax');
		
		// If the advice and articles post has terms
		if (!isset($terms->errors))
		{
			foreach($terms as $term)
			{
				$tax_page = '<a href="' . site_url() . '/advice-articles/?advice='. $term->slug . '">' . $term->name . '</a> > ';
				break;
			}
		}
	}	
		
		
	$root_page = '<a href="' . site_url() . '/advice-articles">Advice and Articles</a>' . ' > ';

	//$current_page = site_url() . '/advice-articles/?advice=' . $tax;
	$current_page =  ucwords(str_replace('-', ' ', $tax));

	return $root_page . $tax_page . $current_page;
	
}

?>
