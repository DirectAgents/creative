<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 
$terms =  get_the_terms(get_the_ID(), 'category');
$term = '';
$slug = '';

foreach($terms as $key=>$val)
{
	$term = $val->name;
	$slug = $val->slug;
	break; 
}
print_r($slug);
?>

<div id="content-archive" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

	<?php if (have_posts()) : ?>
        
        <div class='loan-module'>
			<h1 class="loan-title">
				News: <?php echo $term; ?>
			</h1>
		</div>
                    
        <?php 
        	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$q = new WP_Query( array( 'post_type' => 'post', 'category' => $slug, 'paged' => $paged, 'posts_per_page' => 6 ) );
        	
        	if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();
			
			responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>

               <h2 class="secondary-title">
						
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
						
					</h2>
                
                <div class="post-entry">
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                <?php do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>
                
                <?php get_template_part( 'post-data' ); ?>
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
            
        <?php 
		
		endwhile;endif; 

		if (  $q->max_num_pages > 1 ) : 
			?>
			<div class="navigation">
			<?php
				
				$big = 999999999; // need an unlikely integer

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $q->max_num_pages,
					'next_text' => "<span class='triangle-next-cont'><div class='triangle-right triangle-next'></div></span>",
					'prev_text' => "<span class='triangle-prev-cont'><div class='triangle-left triangle-prev'></div></span>"
				) );
			?>
			</div><!-- end of .navigation -->
			<?php 
		endif;

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content-archive -->
        
<?php get_sidebar('how-it-works'); ?>
<?php get_footer(); ?>
