<?php
/**
 * The template for displaying site-wide social media icons.
 *
 * @since 1.0
 */
?>

<div class="subicons site-icons">

	<a data-toggle="tooltip" data-placement="bottom" class="subicon rss" rel="external" title="<?php _e("RSS Feed", "themebeagle"); ?>" href="<?php bloginfo('rss2_url'); ?>">
		<i class="fa fa-rss"></i>
	</a>

	<?php if ( tb_option('twitter_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon twitter" rel="external" title="<?php echo tb_option('twitter_link_text'); ?>" href="<?php echo esc_url( tb_option('twitter_url')); ?>">
			<i class="fa fa-twitter"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('facebook_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon facebook" rel="external" title="<?php echo tb_option('facebook_link_text'); ?>" href="<?php echo esc_url( tb_option('facebook_url')); ?>">
			<i class="fa fa-facebook"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('google_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon googleplus" rel="external" title="<?php echo tb_option('google_link_text'); ?>" href="<?php echo esc_url( tb_option('google_url')); ?>?rel=author">
			<i class="fa fa-google-plus"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('linkedin_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon linkedin" rel="external" title="<?php echo tb_option('linkedin_link_text'); ?>" href="<?php echo esc_url( tb_option('linkedin_url')); ?>">
			<i class="fa fa-linkedin"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('instagram_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon instagram" rel="external" title="<?php echo tb_option('instagram_link_text'); ?>" href="<?php echo esc_url( tb_option('instagram_url')); ?>">
			<i class="fa fa-instagram"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('pinterest_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon pinterest" rel="external" title="<?php echo tb_option('pinterest_link_text'); ?>" href="<?php echo esc_url( tb_option('pinterest_url')); ?>">
			<i class="fa fa-pinterest"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('flickr_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon flickr" rel="external" title="<?php echo tb_option('flickr_link_text'); ?>" href="<?php echo esc_url( tb_option('flickr_url')); ?>">
			<i class="fa fa-flickr"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('youtube_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon youtube" rel="external" title="<?php echo tb_option('youtube_link_text'); ?>" href="<?php echo esc_url( tb_option('youtube_url')); ?>">
			<i class="fa fa-youtube-play"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('dribbble_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon dribbble" rel="external" title="<?php echo tb_option('dribbble_link_text'); ?>" href="<?php echo esc_url( tb_option('dribbble_url')); ?>">
			<i class="fa fa-dribbble"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('stumbleupon_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon stumbleupon" rel="external" title="<?php echo tb_option('stumbleupon_link_text'); ?>" href="<?php echo esc_url( tb_option('stumbleupon_url')); ?>">
			<i class="genericon genericon-stumbleupon"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('tumblr_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon tumblr" rel="external" title="<?php echo tb_option('tumblr_link_text'); ?>" href="<?php echo esc_url( tb_option('tumblr_url')); ?>">
			<i class="fa fa-tumblr"></i>
		</a>
	<?php } ?>

	<?php if ( tb_option('github_url') ) { ?>
		<a data-toggle="tooltip" data-placement="bottom" class="subicon github" rel="external" title="<?php echo tb_option('github_link_text'); ?>" href="<?php echo esc_url( tb_option('github_url')); ?>">
			<i class="fa fa-github"></i>
		</a>
	<?php } ?>

</div>