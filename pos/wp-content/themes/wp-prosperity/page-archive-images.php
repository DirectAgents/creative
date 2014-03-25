<?php
/*
Template Name: Archive - Image Gallery
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

					</article><!-- article -->

<?php
	$postclass = 'all col-sm-4'; 
	if (is_front_page()) { 
		$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	$postcount = get_option('posts_per_page');

	query_posts(array(
		'posts_per_page' => $postcount,
		'paged' => $paged,
	));


	if (have_posts()) : 

					echo '<div class="article-container no-pad archive-images">';

	while (have_posts()) : the_post(); 
	if ( has_post_thumbnail() ) {
?>
						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

							<div class="entry-block">

								<?php themebeagle_large_thumbnail(); ?>

								<div class="entry-hidden-block">
									<div class="entry-hidden-block-content">
										<a href="<?php echo esc_url( get_permalink() ); ?>" class="hidden-link"><i class="fa fa-link"></i></a>
										<?php 
											themebeagle_entry_title(); 
										?>
									</div>
								</div>
							</div>

						</article>
<?php } 
endwhile;
					echo '</div>';
					themebeagle_paging_nav();
endif; 
wp_reset_query();  
get_footer(); ?>