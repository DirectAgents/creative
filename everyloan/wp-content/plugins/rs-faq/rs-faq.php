<?php
/*
	Plugin Name: RS FAQ
	Author: Roman Sharf
*/

/* register the advice_articles custom post type */
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

/* Register the advice_articles_tax for use with advice_articles CPT */
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