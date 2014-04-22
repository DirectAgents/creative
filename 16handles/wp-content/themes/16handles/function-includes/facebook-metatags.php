<?php
function insert_facebook_metatags(){
	global $wp_query;
	global $post;
	
	if (isset($wp_query->post->ID)) :
	$thePostID = $wp_query->post->ID;
	
	$additional_tags = array();
	
	if(is_single() ){
		$the_post = get_post($thePostID); 
		$type = "article";		
		$title = apply_filters('the_title', $the_post->post_title);
	  $desc = get_post_meta($the_post->ID,'hero_quick_summary',true);		
		$url = get_permalink( $the_post );
		if( has_post_thumbnail( $thePostID )){
			$thumb_id = get_post_thumbnail_id( $thePostID );
			$image = wp_get_attachment_image_src( $thumb_id, 'hero_thumb' );
			$thumbnail = $image[0];
		} else {
		  $thumbnail = "";
		}
		
	} else {
		$title = get_bloginfo('name');
		$desc = get_bloginfo('description');
		$type = "blog";
		$url = get_home_url();
		$thumbnail = get_bloginfo( 'template_url' ).'/img/ajax-home.png';
	}
	
	$site_name = get_bloginfo();
		
echo "\n\t<meta property=\"og:title\" content=\"$title\" />";
echo "\n\t<meta property=\"og:type\" content=\"$type\" />";
echo "\n\t<meta property=\"og:url\" content=\"$url\" />";
echo "\n\t<meta property=\"og:image\" content=\"$thumbnail\" />";
echo "\n\t<meta property=\"og:site_name\" content=\"$site_name\" />";
echo "\n\t<meta property=\"og:description\" content=\"$desc\" />";
endif;			
}

// add_action('wp_head', 'insert_facebook_metatags');

?>