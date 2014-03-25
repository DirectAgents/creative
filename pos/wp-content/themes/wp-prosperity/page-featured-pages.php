<?php
/*
Template Name: Featured Pages
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

						<?php if ( ! empty( $content ) ) : ?>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
						<?php endif; ?>

					</article><!-- article -->

					<div class="featpages">

<?php
$count = 1;
$pageids = '';
$pageids = tb_option('feat_pages_ids');
if ( get_post_meta($post->ID, 'tb_featured_pages_ids', true) ) { 
	$pageids = get_post_meta($post->ID, 'tb_featured_pages_ids', true); 
}

foreach ( $pageids as $pageid ) {
	$my_query = new WP_Query(array(
		'ignore_sticky_posts' => 1,
		'post_type' => array('post', 'page'),
		'page_id' => $pageid
	));
	while ($my_query->have_posts()) : $my_query->the_post();

	global $more; 
	$more = 0;
	$nothumb = '';
	if ( get_post_meta($post->ID, 'tb_hide_stuff', true) && in_array('hide_thumb', get_post_meta($post->ID, 'tb_hide_stuff', true)) ) {
		$nothumb = ' nothumb';
	}
	if ( !has_post_thumbnail() && !tb_option('defthumb') ) {
		$nothumb = ' nothumb';
	}
?>

						<article id="post-<?php the_ID(); ?>" <?php post_class($nothumb); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

							<div class="entry-media">
								<?php themebeagle_large_thumbnail(); ?>
							</div>

							<div class="entry-wrap">

								<div class="entry-container">

									<header class="entry-header">
										<?php themebeagle_entry_title(); ?>
									</header><!-- .entry-header -->

									<div class="entry-content" itemprop="text">
										<?php the_excerpt(); ?>
										<p class="read-more-link">
											<a href="<?php echo esc_url( get_permalink() ); ?>">
												<?php _e( 'Continue Reading &raquo;', 'themebeagle' ); ?>
											</a>
										</p>
									</div><!-- .entry-content -->

								</div> <!-- .entry-container -->

							</div> <!-- .entry-wrap -->

						</article> <!-- article.post -->


<?php 
	$count = $count + 1;
	endwhile; 
	wp_reset_query(); }
					echo '</div><!-- .featpages -->'; 
	edit_post_link( __( 'Edit', 'themebeagle' ), '<p class="edit-link">', '</p>' );
	get_footer(); 
?>