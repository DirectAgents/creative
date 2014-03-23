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
	<div <?php post_class(); ?>>       
		
	<?php

	$fquery = new WP_Query( array( 'post_type' => 'rs_faq', 'posts_per_page' => -1 ) );
	if ( $fquery->have_posts() ) : while ( $fquery->have_posts() ) : $fquery->the_post(); ?>

		<div class="loan-module">
		
			<h2 class="secondary-title"><?php the_title(); ?></h2>

			<p>
				At Every Loan we understand that small business owners don't have time to go from bank to bank, pleading their case every time just to obtain funding to start or grow their business. Our business loans are designed to get you the money you need quickly so you can get back to the basics of running your business.
			</p>
		
		</div>

		
<?php endwhile;endif;wp_reset_postdata(); ?>
		

		<?php //do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>

	</div><!-- end of #post-<?php the_ID(); ?> -->       
	
	<?php responsive_entry_after(); ?>
	
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>

<?php get_footer(); ?>
