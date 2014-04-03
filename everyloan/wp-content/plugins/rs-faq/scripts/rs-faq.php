<?php
/*
	Plugin Name: RS FAQ
	Author: Roman Sharf
	Description: Adds the FAQ (rs_faq) custom post type
*/

/* register the rs_faq custom post type */
add_action( 'init', 'rs_faq_init' );
function rs_faq_init() {
	
	$args = array(
  		'public' => true,
  		'label'  => 'FAQ',
  		'supports' =>  array('title', 'thumbnail', 'editor', 'revisions', 'page-attributes')
	);

	register_post_type( 'rs_faq', $args );
}

/** 
 * Use custom.js for generic site functionality 
 */
add_action( 'wp_enqueue_scripts', 'rs_faq_js' );
function rs_faq_js() {
	wp_enqueue_script( 'faqjs', plugins_url( __FILE__, 'rs-faq' ); . '/scripts/faq-script.js', array( 'jquery' ), false, false);
}

?>