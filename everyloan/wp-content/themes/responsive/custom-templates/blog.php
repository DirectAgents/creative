<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Blog (full posts)
 *
 * @file           blog.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/blog.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 
?>

<div id="content-blog" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
	
	<h1 class="loan-title">
		<?php the_title(); ?>
	</h1>
	
	<?php get_template_part( 'loop-header' ); 
	 
	echo advice_breadcrumbs(get_the_title()); 
	
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 6 ) );
	
	if ( $blog_query->have_posts() ) :

			while ( $blog_query->have_posts() ) : $blog_query->the_post(); 
				?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>
					
					
					<h2 class="secondary-title">
						
						<a href="<?php the_permalink(); ?>">
							<?php the_title( ); ?>
						</a>
						
					</h2>
					
					<div class="post-entry">
						
						<?php if ( has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<?php the_post_thumbnail(); ?>
							</a>
						<?php endif; ?>
                         
                         <?php the_excerpt(); ?>


					</div><!-- end of .post-entry -->
					 
					<?php do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>

					<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
				
		<?php 
		endwhile;

        if (  $blog_query->max_num_pages > 1 ) : 
			?>
			<div class="navigation">
			<?php
				
				$big = 999999999; // need an unlikely integer

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $blog_query->max_num_pages,
					'next_text' => "<span class='triangle-next-cont'><div class='triangle-right triangle-next'></div></span>",
					'prev_text' => "<span class='triangle-prev-cont'><div class='triangle-left triangle-prev'></div></span>"
				) );
			?>
			</div><!-- end of .navigation -->
			<?php 
		endif;

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	
	wp_reset_postdata();
	
	?>  
      
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>
<?php get_footer(); ?>
