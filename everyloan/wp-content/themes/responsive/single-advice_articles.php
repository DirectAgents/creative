<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

	
    <div class="advice-and-article-title">
		<h1>Advice and Articles</h1>
	</div>
    
    <div class='advice-bc'>
		<?php echo advice_breadcrumbs(get_the_title()); ?>
	</div>

	<?php get_template_part( 'loop-header' ); ?>
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>

                <h2 class='secondary-title'>
       				<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
       			</h2>

                <div class="post-entry">

                    <?php

                    	the_post_thumbnail(); 
                    	the_content(__('Read more &#8250;', 'responsive')); 
                   
                    ?>
                    
                    
                    <?php if ( get_the_author_meta('description') != '' ) : ?>
                    
                    <div id="author-meta">
                    <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
                        <div class="about-author"><?php _e('About','responsive'); ?> <?php the_author_posts_link(); ?></div>
                        <p><?php the_author_meta('description') ?></p>
                    </div><!-- end of #author-meta -->
                    
                    <?php endif; // no description, no author's meta ?>
                    
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
               
                
                <?php get_template_part( 'post-data' ); ?>
				
				<?php do_action ('rs_display_social_bar', get_the_date()); ?>             
				
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>            
            
			<?php responsive_comments_before(); ?>
			<?php //comments_template('', true ); ?>
			<?php responsive_comments_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif;?> 

	 <div class="navigation">
        <div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
        <div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
    </div><!-- end of .navigation --> 
	 
      
</div><!-- end of #content -->

<?php get_sidebar('how-it-works'); ?>
<?php get_footer(); ?>
