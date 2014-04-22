<?php

add_action( 'init', 'ds_post_type_register' );
 
function ds_post_type_register() {

  $labels = array(
    'name' => _x( "Landing Page Slides", "landing page slides", '' ),
    'singular_name' => _x( "Landing Page Slides", "Landing Page Slides", '' ),
    'not_found_in_trash' => __( "Nothing found in Trash", '' ),
    'parent_item_colon' => ''
  );
 
  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_position' => 25,
    'publicly_queryable' => false, //important
    'exclude_from_search' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'page-attributes','revisions' )
    ); 
 
  register_post_type( 'landing_slides' , $args );

  $labels = array(
    'name' => _x( "Locations", "locations", '' ),
    'singular_name' => _x( "Location", "location", '' ),
    'add_new' => _x( "Add New", "Location", '' ),
    'add_new_item' => __( "Add New Location", '' ),
    'edit_item' => __( "Edit Location", '' ),
    'new_item' => __( "New Location", '' ),
    'view_item' => __( "View Location", '' ),
    'search_items' => __( "Search Location", '' ),
    'not_found' =>  __( "Nothing found", '' ),
    'not_found_in_trash' => __( "Nothing found in Trash", '' ),
    'parent_item_colon' => ''
  );
 
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'menu_position' => 30,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'location',
    'capabilities' => array(  		

      'delete_others_posts' => 'delete_others_locations',
      'delete_post' => 'delete_location',  //METACAPABILITY - DON'T ASSIGN TO A ROLE
    	'delete_posts' => 'delete_locations',
    	'delete_private_posts' => 'delete_private_locations',
    	'delete_published_posts' => 'delete_published_locations',
      // 'edit_post' => 'edit_location',        //METACAPABILITY - DON'T ASSIGN TO A ROLE
    	'edit_posts' => 'edit_locations',
      'edit_others_posts' => 'edit_others_locations',    	
    	'edit_private_posts' => 'edit_private_posts',
    	'edit_published_posts' => 'edit_published_locations',
      'publish_posts' => 'publish_locations',
       // 'read_post' => 'read_location',     //METACAPABILITY - DON'T ASSIGN TO A ROLE
    	'read_private_posts' => 'read_private_locations',
    ),
    'map_meta_cap' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'page-attributes','revisions' )
    ); 
 
  register_post_type( 'locations' , $args );
  
  $labels = array(
    'name' => _x( "Flavors", "Flavors", '' ),
    'singular_name' => _x( "Flavors", "Flavors", '' ),
    'add_new' => _x( "Add New", "Flavors", '' ),
    'add_new_item' => __( "Add New Flavors", '' ),
    'edit_item' => __( "Edit Flavors", '' ),
    'new_item' => __( "New Flavors", '' ),
    'view_item' => __( "View Flavors", '' ),
    'search_items' => __( "Search Flavors", '' ),
    'not_found' =>  __( "Nothing found", '' ),
    'not_found_in_trash' => __( "Nothing found in Trash", '' ),
    'parent_item_colon' => ''
  );
 
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'menu_position' => 30,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'page-attributes','revisions' )
    ); 
  
  register_post_type( 'flavors' , $args );
  register_taxonomy('type','flavors', array(
    'hierarchical' => true,
    'query_var' => true, 
    'labels' => array(
    			'name' => _x( 'Types', 'type taxonomy' ),
    			'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    			'search_items' =>  __( 'Search Types' ),
    			'all_items' => __( 'All Types' ),
    			'edit_item' => __( 'Edit Type' ),
    			'update_item' => __( 'Update Type' ),
    			'add_new_item' => __( 'Add New Type' ),
    			'new_item_name' => __( 'New Type Name' ),
    			'menu_name' => __( 'Types' ),
    		)
  ));
  
  $labels = array(
    'name' => _x( "Product", "product", '' ),
    'singular_name' => _x( "Product", "product", '' ),
    'add_new' => _x( "Add New", "Product", '' ),
    'add_new_item' => __( "Add New Product", '' ),
    'edit_item' => __( "Edit Product", '' ),
    'new_item' => __( "New Product", '' ),
    'view_item' => __( "View Product", '' ),
    'search_items' => __( "Search Product", '' ),
    'not_found' =>  __( "Nothing found", '' ),
    'not_found_in_trash' => __( "Nothing found in Trash", '' ),
    'parent_item_colon' => ''
  );
 
  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_position' => 30,
    'publicly_queryable' => false,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'page-attributes','revisions', 'editor' )
    ); 
  register_post_type( 'product' , $args );
  
  $labels = array(
    'name' => _x( "Testimonial", "testimonial", '' ),
    'singular_name' => _x( "Testimonial", "testimonial", '' ),
    'add_new' => _x( "Add New", "Testimonial", '' ),
    'add_new_item' => __( "Add New Testimonial", '' ),
    'edit_item' => __( "Edit Testimonial", '' ),
    'new_item' => __( "New Testimonial", '' ),
    'view_item' => __( "View Testimonial", '' ),
    'search_items' => __( "Search Testimonial", '' ),
    'not_found' =>  __( "Nothing found", '' ),
    'not_found_in_trash' => __( "Nothing found in Trash", '' ),
    'parent_item_colon' => ''
  );
 
  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_position' => 30,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'page-attributes', 'revisions', 'editor' )
    ); 
 
  register_post_type( 'testimonial' , $args );  
  
  
  $labels = array(
    'name' => _x( "Press", "press", '' ),
    'singular_name' => _x( "Press", "press", '' ),
    'add_new' => _x( "Add New", "Press", '' ),
    'add_new_item' => __( "Add New Press", '' ),
    'edit_item' => __( "Edit Press", '' ),
    'new_item' => __( "New Press", '' ),
    'view_item' => __( "View Press", '' ),
    'search_items' => __( "Search Press", '' ),
    'not_found' =>  __( "Nothing found", '' ),
    'not_found_in_trash' => __( "Nothing found in Trash", '' ),
    'parent_item_colon' => ''
  );
 
  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_position' => 30,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'page-attributes', 'revisions' )
    ); 
 
  register_post_type( 'press' , $args );    
  
  $labels = array(
    'name' => _x( "People", "people", '' ),
    'singular_name' => _x( "People", "people", '' )
  );
 
  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_position' => 35,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'page-attributes', 'revisions' )
    ); 
 
  register_post_type( 'people' , $args );  
  
  flush_rewrite_rules();
  
}
?>