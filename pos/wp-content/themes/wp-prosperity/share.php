<?php
	$hidestuff = array();
	if ( get_post_meta($post->ID, 'tb_hide_stuff', true) ) { $hidestuff = get_post_meta($post->ID, 'tb_hide_stuff', true); }
 	if ( tb_option('post_share') && !in_array('hide_share', $hidestuff) ) { 
		$sharelinks = '';
		$sharelinks = tb_option('share_links'); 
		if (has_post_thumbnail( $post->ID ) ) :
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
		endif;
	$title = urlencode(trim($post->post_title)); // get post title
?>	

	<div id="sharelinks" class="share-icons">

		<?php if ( tb_option('share_title') ) { ?>
			<h6><?php echo tb_option('share_title'); ?></h6>
		<?php } ?>

		<?php if ( in_array('facebook', $sharelinks) ) { ?>
			<a data-toggle="tooltip" title="<?php _e('Share this Entry on Facebook', 'themebeagle'); ?>" rel="external" class="facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink(); ?>"><i class="fa fa-facebook"></i><?php _e('Facebook', 'themebeagle'); ?></a>
		<?php } ?>

		<?php if ( in_array('google', $sharelinks) ) { ?>
			<a data-toggle="tooltip" title="<?php _e('Share this Entry on Google+', 'themebeagle'); ?>" rel="external" class="googleplus" href="https://plus.google.com/share?url=<?php echo wp_get_shortlink(); ?>"><i class="fa fa-google-plus"></i><?php _e('Google+', 'themebeagle'); ?></a>
		<?php } ?>

		<?php if ( in_array('twitter', $sharelinks) ) { ?>
			<a data-toggle="tooltip" title="<?php _e('Tweet this Entry on Twitter', 'themebeagle'); ?>" rel="external" class="twitter" href="http://twitter.com/home?status=<?php echo $title; ?>:<?php echo wp_get_shortlink(); ?>"><i class="fa fa-twitter"></i><?php _e('Twitter', 'themebeagle'); ?></a>
		<?php } ?>

		<?php if ( in_array('pinterest', $sharelinks) ) { ?>
			<a data-toggle="tooltip" title="<?php _e('Pin this Entry on Pinterest', 'themebeagle'); ?>" rel="external" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo wp_get_shortlink(); ?>&amp;media=<?php echo $image[0]; ?>"><i class="fa fa-pinterest"></i><?php _e('Pinterest', 'themebeagle'); ?></a>
		<?php } ?>

		<?php if ( in_array('linkedin', $sharelinks) ) { ?>
			<a data-toggle="tooltip" title="<?php _e('Share this Entry on LinkedIn', 'themebeagle'); ?>" rel="external" class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo wp_get_shortlink(); ?>&amp;title=<?php echo $title; ?>"><i class="fa fa-linkedin"></i><?php _e('LinkedIn', 'themebeagle'); ?></a>
		<?php } ?>

		<?php if ( in_array('stumbleupon', $sharelinks) ) { ?>
			<a data-toggle="tooltip" title="<?php _e('Stumble this Entry on StumbleUpon', 'themebeagle'); ?>" rel="external" class="stumbleupon"  href="http://www.stumbleupon.com/submit?url=<?php echo wp_get_shortlink(); ?>&amp;title=<?php echo $title; ?>"><i class="fa fa-stumbleupon"></i><?php _e('StumbleUpon', 'themebeagle'); ?></a>
		<?php } ?>

		<?php if ( in_array('reddit', $sharelinks) ) { ?>
			<a data-toggle="tooltip" title="<?php _e('Share this on Reddit', 'themebeagle'); ?>" rel="external" class="reddit" href="http://reddit.com/submit?url=<?php echo wp_get_shortlink(); ?>&amp;title=<?php echo $title; ?>"><i class="fa fa-reddit"></i><?php _e('Reddit', 'themebeagle'); ?></a>
		<?php } ?>

		<?php if ( in_array('email', $sharelinks) ) { ?>
			<a data-toggle="tooltip" title="<?php _e('Share this Entry via Email', 'themebeagle'); ?>" rel="external" class="email" href="mailto:?subject=<?php echo $title; ?>&amp;body=<?php echo $title; ?>:<?php echo wp_get_shortlink(); ?>"><i class="fa fa-linkedin"></i><?php _e('Email', 'themebeagle'); ?></a>
		<?php } ?>

	</div>

<?php } ?>