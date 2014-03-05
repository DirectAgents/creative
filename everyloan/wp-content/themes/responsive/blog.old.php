<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Blog Old (full posts)
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

	<?php get_template_part( 'loop-header' ); ?>
			
	<?php 
	global $wp_query, $paged;
	if( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	}
	elseif( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	}
	else {
		$paged = 1;
	}
	$blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged ) );
	$temp_query = $wp_query;
	$wp_query = null;
	$wp_query = $blog_query;

	if ( $blog_query->have_posts() ) :

			while ( $blog_query->have_posts() ) : $blog_query->the_post(); 
				?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>
					
					<?php get_template_part( 'post-meta' ); ?>
					
					<div class="post-entry">
						<?php if ( has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<?php the_post_thumbnail(); ?>
							</a>
						<?php endif; ?>
						<?php the_content(__('Read more &#8250;', 'responsive')); ?>
                         <?php the_excerpt(); ?>
                         
                         <?php
						 
						 printf( __( '<span class="%1$s">Posted: </span>%2$s ', 'responsive' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp updated">%3$s</span></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
	
	?>
	<?php if ( comments_open() ) : ?>
		<span class="comments-link">
		<span class="mdash">&mdash;</span>
	<?php comments_popup_link( __( 'No Comments &darr;', 'responsive' ), __( '1 Comment &darr;', 'responsive' ), __( '% Comments &darr;', 'responsive' ) ); ?>
		</span>
	<?php endif; ?> 
						 
						
                    
						<?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
					</div><!-- end of .post-entry -->
					
					<?php get_template_part( 'post-data' ); ?>
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
				
		<?php 
		endwhile;

        if (  $wp_query->max_num_pages > 1 ) : 
			?>
			<div class="navigation">
				<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ), $wp_query->max_num_pages ); ?></div>
				<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ), $wp_query->max_num_pages ); ?></div>
			</div><!-- end of .navigation -->
			<?php 
		endif;

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	$wp_query = $temp_query;
	wp_reset_postdata();
	?>  
      
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>
<?php get_footer(); ?>
