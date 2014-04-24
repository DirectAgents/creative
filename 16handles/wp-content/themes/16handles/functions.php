<?php
/*-----------------------------------------------------------------------------------*/
/* disable update link */
/*-----------------------------------------------------------------------------------*/

add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

/*-----------------------------------------------------------------------------------*/
/* Options Framework Theme */
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'optionsframework_init' ) ) {

 /* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */
 
 define( 'OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/' );
 define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
 
 require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php' );

}

// alternative options: 
// require_once( get_template_directory() . '/function-includes/theme-options/theme-options.php' );

/*-----------------------------------------------------------------------------------*/
/* Includes */
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/function-includes/remove-extra.php' );
require_once( get_template_directory() . '/function-includes/theme-functions.php' );
require_once( get_template_directory() . '/function-includes/enqueues.php' );
require_once( get_template_directory() . '/function-includes/facebook-metatags.php' );
require_once( get_template_directory() . '/function-includes/custom-post-types.php' );
require_once( get_template_directory() . '/function-includes/simple-google-map-short-code.php' );
require_once( get_template_directory() . '/function-includes/acf-functions.php' );
require_once( get_template_directory() . '/function-includes/user-caps.php' );
// require_once( get_template_directory() . '/function-includes/thumbnail-preview.php' );


/*-----------------------------------------------------------------------------------*/
/*	Theme Support
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'menus' ); // add custom menus support
add_theme_support('automatic-feed-links');
add_theme_support( 'post-thumbnails');
add_image_size( 'product_image', 291, 9999, true ); 
add_image_size( 'page_header_image', 9999, 342, true ); 
add_image_size( 'testimonial', 312, 312, true ); 
add_image_size( 'location_featured', 620, 325, true ); 
add_image_size( 'flavor-item', 350, 250, true ); 
add_image_size( 'press_horizontal', 940, 9999, true ); 
add_image_size( 'press_vertical', 437, 9999, true ); 
add_image_size( 'people_avatar', 200, 200, true );  
add_image_size( 'slide_feed', 251, 251, true );  

remove_filter ('the_content', 'wpautop');

/*-----------------------------------------------------------------------------------*/
/*  Get Page ID by Slug
/*-----------------------------------------------------------------------------------*/

function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

/*-----------------------------------------------------------------------------------*/
/*  Register The Menus
/*-----------------------------------------------------------------------------------*/

function register_theme_menus() {
  global $domain_name;
    register_nav_menus( array(
    'main_nav' => __( 'Main navigation', $domain_name ),
    'footer_menu' => __( 'Footer navigation', $domain_name )
  ));
}

add_action('init', 'register_theme_menus');


/*-----------------------------------------------------------------------------------*/
/*  Customize ACF Markup
/*-----------------------------------------------------------------------------------*/
 
add_filter( 'acf/fields/relationship/result', 'acf_relationship_result', 10, 2);
 
function acf_relationship_result( $html, $post )
{
	$cats = wp_get_post_terms($post->ID, 'type', array("fields" => "names"));
	$comma_cats = implode(",", $cats);
	$new = '<div style="color:#999;font-size:9px; position:absolute; left:200px; ">'.$comma_cats.'</div>';
	
	return $new . $html ;
}


/*-----------------------------------------------------------------------------------*/
/*  Dynamically populate Job Application form
/*-----------------------------------------------------------------------------------*/
add_filter('gform_pre_render_7', 'populate_posts');
function populate_posts($form){

    foreach($form['fields'] as &$field){

        if($field['id'] == 2){

            $posts = get_posts('numberposts=-1&post_type=locations');
            
            foreach($posts as $post){
                $hiring = get_field('are_you_hiring', $post->ID);
                if($hiring === true){
                    $state = get_field('state', $post->ID);
                    $value = "$state - $post->post_title";
                    $choices[] = array('text' => $value, 'value' => $value);
                }
            }

            $field['choices'] = $choices;

        }
    }
    
    return $form;
}

/*-----------------------------------------------------------------------------------*/
/*  Helper functions for displaying features icons for locations page
/*-----------------------------------------------------------------------------------*/

function get_icon_num ($name) 
{
    switch ($name)
    {
        case 'catering':
            return 1;
        case 'party_room':
            return 2;
        case 'cakes':
            return 3;
        case 'delivery':
            return 4;
        default:
            return 0;
    }
}

function get_icon_class ($name)
{   
    $features = get_field('features');
    return  in_array($name, $features) ? 'icon_' . get_icon_num($name) : 'icon_0';
}

?>