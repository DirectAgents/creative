<?php
/**
 * The template for displaying Author social media icons.
 *
 * @since 1.0
 */
global $curauth;
?>

<div class="subicons author-icons">

	<?php if ( $curauth->user_url ) { ?>
		<a data-toggle="tooltip" class="subicon weblink" rel="external" title="<?php echo esc_attr($curauth->display_name . __("'s Website", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->user_url); ?>">
			<i class="fa fa-link"></i>
		</a>
	<?php } ?>

	<a data-toggle="tooltip" class="subicon rss" rel="external" title="<?php echo esc_attr($curauth->display_name . __("'s RSS Feed", "themebeagle")); ?>" href="<?php echo esc_url(get_author_feed_link($curauth->ID)); ?>">
		<i class="fa fa-rss"></i>
	</a>

	<?php if ( $curauth->twitter ) { ?>
		<a data-toggle="tooltip" class="subicon twitter" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on Twitter", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->twitter); ?>">
			<i class="fa fa-twitter"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->facebook ) { ?>
		<a data-toggle="tooltip" class="subicon facebook" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on Facebook", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->facebook); ?>">
			<i class="fa fa-facebook"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->googleplus ) { ?>
		<a data-toggle="tooltip" class="subicon googleplus" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on Google+", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->googleplus); ?>?rel=author">
			<i class="fa fa-google-plus"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->linkedin ) { ?>
		<a data-toggle="tooltip" class="subicon linkedin" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on LinkedIn", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->linkedin); ?>">
			<i class="fa fa-linkedin"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->instagram ) { ?>
		<a data-toggle="tooltip" class="subicon instagram" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on Instagram", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->instagram); ?>">
			<i class="fa fa-instagram"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->pinterest ) { ?>
		<a data-toggle="tooltip" class="subicon pinterest" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on Pinterest", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->pinterest); ?>">
			<i class="fa fa-pinterest"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->flickr ) { ?>
		<a data-toggle="tooltip" class="subicon flickr" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on Flickr", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->flickr); ?>">
			<i class="fa fa-flickr"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->youtube ) { ?>
		<a data-toggle="tooltip" class="subicon youtube" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on Youtube", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->youtube); ?>">
			<i class="fa fa-youtube-play"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->dribbble ) { ?>
		<a data-toggle="tooltip" class="subicon dribbble" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on Dribble", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->dribbble); ?>">
			<i class="fa fa-dribbble"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->stumbleupon ) { ?>
		<a data-toggle="tooltip" class="subicon stumbleupon" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on StumbleUpon", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->stumbleupon); ?>">
			<i class="genericon genericon-stumbleupon"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->tumblr ) { ?>
		<a data-toggle="tooltip" class="subicon tumblr" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on GitHub", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->tumblr); ?>">
			<i class="fa fa-tumblr"></i>
		</a>
	<?php } ?>

	<?php if ( $curauth->github ) { ?>
		<a data-toggle="tooltip" class="subicon github" rel="external" title="<?php echo esc_attr($curauth->display_name . __(" on GitHub", "themebeagle")); ?>" href="<?php echo esc_url( $curauth->github); ?>">
			<i class="fa fa-github"></i>
		</a>
	<?php } ?>

</div>