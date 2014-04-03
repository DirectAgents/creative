<?php 

/*
	Template Name: Business Loans Template
*/

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

get_header(); 

global $more; $more = 0; 
?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

	<div <?php post_class(); ?>>       
		
		<?php the_content(); ?>
		<a href='<?php echo site_url(); ?>/wp-content'>Hello</a>
	
	<?php //do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>

	</div><!-- end of #post-<?php the_ID(); ?> -->       
	
	<?php responsive_entry_after(); ?>
	
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>

<?php get_footer(); ?>
