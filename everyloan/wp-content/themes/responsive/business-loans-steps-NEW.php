<?php



// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Business Loans Steps NEW
 *
 * @file           business-loans-steps-NEW.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/business-loans-steps-NEW.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 
?>



<div id="content-business-loans" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
        <?php get_template_part( 'loop-header' ); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>

                <?php get_template_part( 'post-meta-page' ); ?>
                
                <div class="post-entry">
                    <?php the_content(__('Read more &#8250;', 'responsive')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
            
				<?php get_template_part( 'post-data' ); ?>
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
            
		
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content -->

<?php get_footer(); ?>
