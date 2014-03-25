<?php
/*
Template Name: Archives by Month
 *
 * @since 1.0
*/

get_header(); 
the_post(); 
$content = get_the_content(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

						<header class="entry-header">
							<h1 class="entry-title page"><?php the_title(); ?></h1>
						</header><!-- .archive-header -->

						<?php
							edit_post_link( __( 'Edit', 'themebeagle' ), '<p class="edit-link">', '</p>' );
							if ( ! empty( $content ) ) : ?>
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
							<?php endif;
						?>

<?php
$numposts = -1;
$previous_year = $year = 0;
$previous_month = $month = 0;
$div_open = false;
$myposts = get_posts(array(
	'numberposts' => $numposts,
	'orderby' => 'post_date',
	'order' => 'DESC'
));

foreach ( $myposts as $post ) :  
	setup_postdata($post);
	$year = mysql2date('Y', $post->post_date);
	$month = mysql2date('n', $post->post_date);
	$day = mysql2date('j', $post->post_date);

	if ($year != $previous_year || $month != $previous_month) :

	if ($div_open == true) :
						echo '</div>';
	endif; ?>
 
 						<div class="archives-by-cat">

							<h3><?php the_time('F Y'); ?></h3>

 							<?php 
								$div_open = true;
								endif;
 								$previous_year = $year; 
								$previous_month = $month; 
							?>

 							<p>
								<span class="archive-entry-date"><?php themebeagle_entry_date(); ?>:</span>
								<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
							</p>

<?php endforeach; ?>

						</div>

					</article><!-- article -->

<?php get_footer(); ?>