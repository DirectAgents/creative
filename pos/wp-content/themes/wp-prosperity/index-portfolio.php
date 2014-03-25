<?php
	global $catid;
	global $postclass;

	global $do_not_duplicate;
	if ( ! tb_option('hide_dupes') ) { $do_not_duplicate = NULL; }

	global $postcount;
	$postcount = get_option('posts_per_page');

	if (is_front_page()) { 
		$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}
?>

					<ul class="option-set cat-filter clearfix">
						<li class="all"><a data-filter="*" href="#" class="selected"><?php _e("All", "themebeagle"); ?></a></li>
						<?php
							$categories = get_categories(array(
								'include' => $catid
							));
							foreach ( $categories as $cat ) {
								echo '<li><a data-filter=".'.$cat->slug.'" href="#">'.$cat->name.'</a></li>'."\n";
							}
						?>
					</ul> <!-- .cat-filter -->

<?php
	query_posts(array(
		'posts_per_page' => $postcount,
		'category__in' => $catid,
		'paged' => $paged,
		'post__not_in' =>  $do_not_duplicate
	));

	if (have_posts()) : 
					echo '<div class="article-container portfolio-container">';
	while (have_posts()) : the_post();
?>

						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

							<div class="entry-block">

								<?php themebeagle_large_thumbnail(); ?>

								<div class="entry-hidden-block">
									<div class="entry-hidden-block-content">
										<a href="<?php echo esc_url( get_permalink() ); ?>" class="hidden-link"><i class="fa fa-link"></i></a>
										<?php themebeagle_entry_title(); ?>
									</div>
								</div>

							</div>

						</article> <!-- article.post -->

<?php 
	endwhile; 
					echo '</div> <!-- .article-container -->';
					themebeagle_paging_nav();
	endif; 
	wp_reset_query();  
?>