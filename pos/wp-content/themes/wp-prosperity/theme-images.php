<?php

/*-----------------------------------------------------------------------------------*/
// Add theme support for Featured Images/Post Thumnbnails
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}



/*-----------------------------------------------------------------------------------*/
// Add featured image sizes
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_image_size' ) ) {
	add_image_size('extra-wide-featured-image', 1920, 500, true);
	add_image_size('wide-featured-image', 1280, 500, true);
	add_image_size('large-thumbnail', 740, 493, true); /* 6:4 */
	add_image_size('medium-thumbnail', 400, 266, true); /* 6:4 */
}



/*-----------------------------------------------------------------------------------*/
// Retrieves the attachment ID from A file URL; For use in grabbing the default 
// thumbnail image from theme settings.
// ref: http://codex.wordpress.org/Function_Reference/url_to_postid -> http://pippinsplugins.com/retrieve-attachment-id-from-image-url/
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function tb_get_image_id($image_url) {
	global $wpdb;
	$prefix = $wpdb->prefix;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", $image_url ));
	if ($attachment) { 
		return $attachment[0]; 
	}
}



/*-----------------------------------------------------------------------------------*/
// POST THUMBNAIL
// Display an optional post thumbnail.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function themebeagle_post_thumbnail() {

	global $post;

	$defthumb ='';
	if ( tb_option('defthumb_url') ) {
		$image_url = tb_option('defthumb_url');
		$image_id = tb_get_image_id($image_url);
		$defthumb = wp_get_attachment_image_src( $image_id, 'thumbnail' );
	}

	$imgsize = 'thumbnail';
	$mainimg = '';

	if ( function_exists('get_the_image') ) {
		$mainimg = get_the_image(array( 'meta_key' => $imgsize, 'size' => $imgsize, 'default_image' => false, 'image_scan' => true, 'link_to_post' => false, 'echo' => false ));
	} else { 
		$mainimg = get_the_post_thumbnail($post->ID, $imgsize, array('class' => 'thumbnail'));
	}

	if ( $mainimg ) { ?>
		<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
			<?php echo $mainimg; ?>
		</a>
	<?php } elseif ( tb_option('defthumb') && $defthumb ) { ?>
		<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
			<img class="wp-post-image thumbnail" src="<?php echo $defthumb[0]; ?>" alt="<?php esc_attr( the_title() ); ?>" />
		</a>
	<?php }
}



/*-----------------------------------------------------------------------------------*/
// MEDIUM THUMBNAIL
// Display a medium post thumbnail.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function themebeagle_medium_thumbnail() {

	global $post;

	$defthumb ='';
	if ( tb_option('defthumb_url') ) {
		$image_url = tb_option('defthumb_url');
		$image_id = tb_get_image_id($image_url);
		$defthumb = wp_get_attachment_image_src( $image_id, 'medium-thumbnail' );
	}

	$imgsize = 'medium-thumbnail';
	$mainimg = '';

	if ( function_exists('get_the_image') ) {
		$mainimg = get_the_image(array( 'meta_key' => $imgsize, 'size' => $imgsize, 'default_image' => false, 'image_scan' => true, 'link_to_post' => false, 'echo' => false ));
	} else { 
		$mainimg = get_the_post_thumbnail($post->ID, $imgsize, array('class' => 'medium-thumbnail'));
	}

	if ( $mainimg ) { ?>
		<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
			<?php echo $mainimg; ?>
		</a>
	<?php } elseif ( tb_option('defthumb') && $defthumb ) { ?>
		<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
			<img class="wp-post-image medium-thumbnail" src="<?php echo $defthumb[0]; ?>" alt="<?php esc_attr( the_title() ); ?>" />
		</a>
	<?php }

}



/*-----------------------------------------------------------------------------------*/
// LARGE THUMBNAIL
// Display an optional post thumbnail.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function themebeagle_large_thumbnail() {

	global $post;

	$defthumb ='';
	if ( tb_option('defthumb_url') ) {
		$image_url = tb_option('defthumb_url');
		$image_id = tb_get_image_id($image_url);
		$defthumb = wp_get_attachment_image_src( $image_id, 'large-thumbnail' );
	}

	$imgsize = 'large-thumbnail';
	$mainimg = '';

	if ( function_exists('get_the_image') ) {
		$mainimg = get_the_image(array( 'meta_key' => $imgsize, 'size' => $imgsize, 'default_image' => false, 'image_scan' => true, 'link_to_post' => false, 'echo' => false ));
	} else { 
		$mainimg = get_the_post_thumbnail($post->ID, $imgsize, array('class' => 'large-thumbnail'));
	}

	if ( $mainimg ) { ?>
		<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
			<?php echo $mainimg; ?>
		</a>
	<?php } elseif ( tb_option('defthumb') && $defthumb ) { ?>
		<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
			<img class="wp-post-image large-thumbnail" src="<?php echo $defthumb[0]; ?>" alt="<?php esc_attr( the_title() ); ?>" />
		</a>
	<?php }
}



/*-----------------------------------------------------------------------------------*/
// RELATED POSTS THUMBNAIL
// Display an optional post thumbnail.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function themebeagle_related_thumbnail() {

	global $post;

	$defthumb ='';
	if ( tb_option('defthumb_url') ) {
		$image_url = tb_option('defthumb_url');
		$image_id = tb_get_image_id($image_url);
		$defthumb = wp_get_attachment_image_src( $image_id, 'medium-thumbnail' );
	}

	$imgsize = 'medium-thumbnail';
	$mainimg = '';

	if ( function_exists('get_the_image') ) {
		$mainimg = get_the_image(array( 'meta_key' => $imgsize, 'size' => $imgsize, 'default_image' => false, 'image_scan' => true, 'link_to_post' => false, 'echo' => false ));
	} else { 
		$mainimg = get_the_post_thumbnail($post->ID, $imgsize, array('class' => 'medium-thumbnail'));
	}

	if ( $mainimg ) { ?>
		<a data-toggle="tooltip" class="post-thumbnail medium" href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
			<?php echo $mainimg; ?>
		</a>
	<?php } elseif ( tb_option('defthumb') && $defthumb ) { ?>
		<a data-toggle="tooltip" class="post-thumbnail medium" href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
			<img class="wp-post-image medium-thumbnail" src="<?php echo $defthumb[0]; ?>" alt="<?php esc_attr( the_title() ); ?>" />
		</a>
	<?php }

}



/*-----------------------------------------------------------------------------------*/
// ENTRY MEDIA
// Display post thumbnail, video or gallery based on theme settings and post format.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'themebeagle_entry_media' ) ) :
function themebeagle_entry_media() {

	global $post;

	$imgsize = 'large-thumbnail';
	if (tb_option('medium_thumb') ) { $imgsize = 'medium-thumbnail'; }

	$defthumb ='';
	if ( tb_option('defthumb_url') ) {
		$image_url = tb_option('defthumb_url');
		$image_id = tb_get_image_id($image_url);
		$defthumb = wp_get_attachment_image_src( $image_id, $imgsize );
	}

	$mainimg = '';
	if ( function_exists('get_the_image') ) {
		$mainimg = get_the_image(array( 'meta_key' => $imgsize, 'size' => $imgsize, 'default_image' => false, 'image_scan' => true, 'link_to_post' => false, 'echo' => false ));
	} else { 
		$mainimg = get_the_post_thumbnail($post->ID, $imgsize, array('class' => 'medium-thumbnail'));
	}

	$embed = get_post_meta( $post->ID, 'tb_video_embed', true);
	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $embed, $ytid)) { $ytid = $ytid[1]; }

	$hidestuff = array();
	if ( get_post_meta($post->ID, 'tb_hide_stuff', true) )
		$hidestuff = get_post_meta($post->ID, 'tb_hide_stuff', true);

	if ( in_array('hide_thumb', $hidestuff) || post_password_required() || (function_exists('is_bbpress') && is_bbpress()) )
		return;

	if ( is_singular() && get_post_gallery() && tb_option('gallery_slider') && !get_post_meta($post->ID, 'tb_default_gallery', true) ) { ?>
		<div class="entry-media">
			<?php themebeagle_gallery_slider(); ?>
		</div>
	<?php } elseif (
		( is_page() && tb_option('page_feat_img') ) ||
		( is_single() && tb_option('single_feat_img') ) ||
		( is_home() && tb_option('thumbnails') ) ||
		( is_archive() && tb_option('thumbnails') )
	) { ?>
		<?php if ( is_singular() && $embed ) { ?>
			<div class="entry-media">
				<div class="entry-video">
					<?php echo $embed; ?>
				</div>
			</div>
		<?php } elseif ( !is_singular() && $embed && !$ytid ) { ?>
			<div class="entry-media">
				<div class="entry-video">
					<?php echo $embed; ?>
				</div>
			</div>
		<?php } elseif ( $mainimg ) { ?>
			<div class="entry-media">
				<a class="post-thumbnail large" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php 
						echo $mainimg;
						if (get_post(get_post_thumbnail_id())->post_excerpt) {
							echo '<span class="thumb-caption">'.get_post(get_post_thumbnail_id())->post_excerpt.'</span>';
						}
					?>
				</a>
			</div>
		<?php } elseif ( tb_option('defthumb') && $defthumb ) { ?>
			<div class="entry-media">
				<a class="post-thumbnail large" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<img class="wp-post-image" src="<?php echo $defthumb[0]; ?>" alt="<?php the_title(); ?>" />
				</a>
			</div>
		<?php } 
	}
}
endif;



/*-----------------------------------------------------------------------------------*/
// GALLERY SLIDER
// Replace default wordpress gallery with a gallery slider.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'themebeagle_gallery_slider' ) ) :
function themebeagle_gallery_slider() {

	global $post;

	if (get_post_gallery()) { ?>
		<div class="mainslider galleryslider">
			<div class="flexslider">
				<ul class="slides">
					<?php
						$gallery = get_post_gallery( get_the_ID(), false );
						$image_ids = $gallery['ids'];
						$featarr = explode(",",$image_ids);
						// shuffle($featarr);
						foreach ($featarr as $featitem) {
							$thumbnail = wp_get_attachment_image_src( $featitem, 'thumbnail' );
							$fullimage = wp_get_attachment_image_src( $featitem, 'large' );
							$image = wp_get_attachment_image_src( $featitem, 'large-thumbnail' );
						?>

							<li data-thumb="<?php echo $thumbnail[0]; ?>">
								<div class="slide-container">
									<a href="<?php echo $fullimage[0]; ?>">
										<img src="<?php echo $image[0]; ?>" alt="<?php echo get_post($featitem)->post_title ; ?>" title="<?php echo get_post($featitem)->post_title ; ?>" />
									</a>
									<?php if ( get_post($featitem)->post_excerpt ) {
										echo '<p class="thumb-caption"><span>' . get_post($featitem)->post_excerpt . '</span></p>';
									} ?>
								</div>
							</li>

						<?php }
					?>
				</ul>
			</div>
		</div>

		<?php if (is_singular()) {
			// remove the default wordpress gallery from the post.
			add_shortcode('gallery', '__return_false');
		}
	}
}
endif;