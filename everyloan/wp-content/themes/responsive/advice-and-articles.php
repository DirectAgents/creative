<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Advice and Articles
 *
 * @file           advice-and-articles.php
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

//global $more; $more = 0; 
?>

<?php 
	// Get the terms in the 'advice_articles_tax' taxonomy
	$args = array('orderby' => 'name', 'hide_empty' => 1);
	$terms = get_terms('advice_articles_tax', $args);
	
	// Use this to mark which option will be selected
	$selected = '';
	// Store the taxonomy term we will use for quering the DB
	$use_term = '';

	$advice = $_GET['advice'];

	// Check to see if the get var matches any 
	// of the 'advice_articles_tax' taxonomy terms
	foreach ($terms as $term)
	{
		//echo $term->slug;
		if ($advice == $term->slug)
		{	
			$use_term = $term->slug;
			break;
		}
	}
	
?>

<div id="content-advice-and-articles" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
	
	<div class='loan-module'>
		<h1 class='loan-title'>Advice and Articles</h1>
	</div>
	
	<div class='advice-bc'>
		<?php echo advice_breadcrumbs($_GET['advice']); ?>
	</div>
	
	<div class="grey-cont">
	    
	    <div class='advice-choose-container'>
		
			<label class="select-category-label" for="advice-select">Select a category:</label>
			
			<div class="styled-select">
				
				<select id="advice-select">
					<option value='all-categories'>All Categories</option>
					<?php 
						foreach($terms as $term)
						{	
							//if ($use_term != '')
							$selected = ($term->slug == $_GET['advice']) ? 'selected' : '';
							echo '<option ' . $selected . ' value="'. $term->slug . '">' . $term->name . '</option>';
						} 
					?>
				</select>

			</div>
		</div>

	</div><!-- END how-everyloan-works-content -->

<?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array( 
	'paged' => $paged, 
	'posts_per_page' => 3, 
	'post_type' => 'advice_articles',
	'advice_articles_tax' => $use_term
);

/* need this for pagination to work with CPT's */
$temp = $wp_query; 
$wp_query = null;

$wp_query = new WP_Query($args);

if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>


<?php responsive_entry_before(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
		<?php responsive_entry_top(); ?>
					
		<div class="post-entry">
        
       <h2 class='secondary-title'>
       		<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
       </h2>

      	<?php if ( has_post_thumbnail()) : ?>
            <div style="float:left;">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			<?php the_post_thumbnail(); ?>
				</a>
              </div>  
			<?php endif; ?>
            
             <?php the_excerpt(); ?>
         
         </div><!-- end of .post-entry -->
			
		<?php get_template_part( 'post-data' ); ?>
				               
		<?php responsive_entry_bottom(); ?>      
	</div><!-- end of #post-<?php the_ID(); ?> --> 

	<?php do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>  

	<?php responsive_entry_after(); ?>
				
		<?php 
		endwhile;

         if (  $wp_query->max_num_pages > 1 ) : 
			?>
			<div class="navigation">
			<?php
				//global $wp_query;

				$big = 999999999; // need an unlikely integer

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
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
	$wp_query = null; 
  	$wp_query = $temp;  // Reset
	?>  
      
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>
<?php get_footer(); ?>
