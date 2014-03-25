<?php
	global $catid;
	global $postclass;
	if (is_home() && tb_option('post_layout') == 'masonry_2') { $postclass = 'col-sm-6'; }
	if (is_home() && tb_option('post_layout') == 'masonry_3') { $postclass = 'col-sm-4'; }
	if (is_home() && tb_option('post_layout') == 'masonry_4') { $postclass = 'col-sm-3'; }
	if (is_archive() && tb_option('post_layout_archive') == 'masonry_2') { $postclass = 'col-sm-6'; }
	if (is_archive() && tb_option('post_layout_archive') == 'masonry_3') { $postclass = 'col-sm-4'; }
	if (is_archive() && tb_option('post_layout_archive') == 'masonry_4') { $postclass = 'col-sm-3'; }

	global $do_not_duplicate;
	if ( ! tb_option('hide_dupes') ) { $do_not_duplicate = NULL; }

	global $postcount;
	$postcount = get_option('posts_per_page');

	if (is_front_page()) { 
		$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	if ( !is_archive() && tb_option('cat_filter') ) {
?>
					<ul class="option-set cat-filter clearfix">
						<li class="all"><a data-filter="*" href="#" class="selected"><?php _e("All", "themebeagle"); ?></a></li>
						<?php
							$categories = get_categories(array(
								'include' => $catid,
								'type' => 'post',
								'hierarchical' => 0 
							));
							foreach ( $categories as $cat ) {
								echo '<li><a data-filter=".'.$cat->slug.'" href="#">'.$cat->name.'</a></li>'."\n";
							}
						?>
					</ul> <!-- .cat-filter -->
<?php }

	// IF THIS IS A CATEGORY-SPECIFIC BLOG PAGE, GRAB THE 'tempcatid' CUSTOM FIELD VALUE AND RUN THE PROPER QUERY
	if ( !is_archive() && !is_home() ) {
		query_posts(array(
			'posts_per_page' => $postcount,
			'category__in' => $catid,
			'paged' => $paged,
			'post__not_in' =>  $do_not_duplicate
		));
	}

	if (have_posts()) : 
					echo '<div class="article-container masonry-container">';
	while (have_posts()) : the_post();
?>

						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<?php get_template_part( 'content', get_post_format() ); ?>
						</article> <!-- article.post -->

<?php 
	endwhile; 
					echo '</div> <!-- .article-container -->';
					themebeagle_paging_nav();
	endif; 
	wp_reset_query();  
?>