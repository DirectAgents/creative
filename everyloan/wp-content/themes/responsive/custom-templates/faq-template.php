<?php 

/*
	Template Name: FAQ Template
*/

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

get_header(); 

?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
	
	<div class='loan-module'>
		<h1 class="loan-title">
			<?php the_title(); ?>
		</h1>
	</div>
		
	<?php $fquery = new WP_Query( array( 'post_type' => 'rs_faq', 'posts_per_page' => -1, 'order' => 'ASC' ) );
	if ( $fquery->have_posts() ) : while ( $fquery->have_posts() ) : $fquery->the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('loan-module'); ?>> 
		
			<h3 class="small-title faq-title">
				 <a href="#"><span>+</span><span style="display:none;">-</span> <?php the_title(); ?></a>
			</h3>
			<div style='display:none;' class='faq-text'>
				<?php the_content(); ?>
			</div>
		
		</div>

	<?php endwhile;endif;wp_reset_postdata(); ?>
		
	<?php responsive_entry_after(); ?>
	
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>

<?php get_footer(); ?>
