<?php
/*
	Plugin Name: Advice and Articles
	Author: Roman Sharf
*/

/* register the advice_articles custom post type */
add_action( 'init', 'advice_articles_init' );
function advice_articles_init() {
	
	$args = array(
  		'public' => true,
  		'label'  => 'Advice and Articles',
  		'taxonomies' => array('advice_articles'),
  		'supports' =>  array('title', 'thumbnail', 'editor', 'revisions', 'page-attributes')
	);

	register_post_type( 'advice_articles', $args );
}

/* Register the advice_articles_tax for use with advice_articles CPT */
add_action( 'init', 'advice_articles_tax_init' );
function advice_articles_tax_init() {
	
	$args = array(
			'label' => __( 'Article Categories' ),
			'rewrite' => array( 'slug' => 'advice-articles-categories' ),
			'hierarchical' => true
	);
	
	register_taxonomy('advice_articles_tax', 'advice_articles', $args);
	
}

?>