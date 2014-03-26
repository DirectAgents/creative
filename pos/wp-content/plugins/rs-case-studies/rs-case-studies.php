<?php
/*
	Plugin Name: RS Case Studies
	Author: Roman Sharf
	Description: Adds the FAQ (rs_faq) custom post type
*/

/* register the rs_faq custom post type */
add_action( 'init', 'rs_case_studies_init' );
function rs_case_studies_init() {
	
	$args = array(
  		'public' => true,
  		'label'  => 'Case Studies',
  		'taxonomies' => array('case_studies_tax'),
  		'supports' =>  array('title', 'thumbnail', 'editor', 'revisions', 'page-attributes', 'post-formats'),
  		'labels' => array(
  			'add_new_item' => 'Add New Case Study',
  			'view_item' => 'View Case Study',
  			'edit_item' => 'Edit Case Study'
  			)
	);

	register_post_type( 'rs_case_studies', $args );
}

add_action( 'init', 'case_studies_tax_init' );
function case_studies_tax_init() {
	
	$args = array(
			'label' => __( 'Case Studies Categories' ),
			'rewrite' => array( 'slug' => 'case-studies-categories' ),
			'hierarchical' => true,
			'show_ui' => 'radio'
	);
	
	register_taxonomy('case_studies_tax', 'rs_case_studies', $args);
	
}

/** 
 * Use faq-script.js for FAQ slide in-out functionality. Only works on faq page
 */
// add_action( 'wp_enqueue_scripts', 'rs_faq_js' );
// function rs_faq_js() {
	
// 	if (is_page('faq'))
// 		wp_enqueue_script( 'faqjs', plugins_url( '/scripts/faq-script.js', __FILE__ ), array( 'jquery' ), false, false);
// }

?>