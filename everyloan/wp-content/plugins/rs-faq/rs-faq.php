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
  		'taxonomies' => array('faq_tax'),
  		'supports' =>  array('title', 'thumbnail', 'editor', 'revisions', 'page-attributes')
	);

	register_post_type( 'rs_faq', $args );
}

/* Register the rs_faq_tax for use with rs_faq CPT */
add_action( 'init', 'rs_faq_tax_init' );
function rs_faq_tax_init() {
	
	$args = array(
			'label' => __( 'FAQ Categories' ),
			'rewrite' => array( 'slug' => 'faq-categories' ),
			'hierarchical' => true
	);
	
	register_taxonomy('rs_faq_tax', 'rs_faw', $args);
	
}

?>