<div class="row post-by-cat">

<?php
	// GATHER THE CATEGORIES AND OTHER INFO FROM THEME SETTINGS
	if ( is_singular() && get_post_meta($post->ID, 'tb_cats', true) ) { 
		$cats = get_post_meta($post->ID, 'tb_cats', true); 
	} else { 
		$cats = tb_option('posts_by_cat_cats'); 
	}
	$catpostcount = tb_option('posts_by_cat_count');
	$catmeta = tb_option('post_by_cat_meta');
	$catbox_layout = tb_option('post_by_cat_layout');
	$cat_title = tb_option('post_by_cat_title');
	$cat_title_icon = tb_option('post_by_cat_icon');

	global $page_template;
	if ( $page_template == 'blog-by-cat' || (!is_singular() && $catbox_layout == 'post_by_cat_side') ) { 
		$catgroupclass = 'col-sm-6'; 
	} elseif ( $page_template == 'blog-by-cat-stacked' || (!is_singular() && $catbox_layout == 'post_by_cat_stacked') ) { 
		$catgroupclass = 'col-sm-12'; 
	}

	$post_class = '';

	// CREATE A SEPARATE LOOP FOR EACH CATEGORY BOX
	foreach ($cats as $cat) {
		global $do_not_duplicate;
		if ( ! tb_option('hide_dupes') ) { $do_not_duplicate = null; }
		$my_query = new WP_Query(array(
			'cat' => $cat,
			'posts_per_page' => $catpostcount,
			'post__not_in' => $do_not_duplicate			
		));

		if ($my_query->have_posts()) :
		$post_class = ($post_class == 'odd') ? 'even' : 'odd';
?>

				<?php /* SHOW THE INDIVIDUAL CATEGORY BOXES */ ?>

				<div class="<?php echo $catgroupclass; ?>">

					<div class="cat-box <?php echo $post_class; ?>">

						<h2 class="feat-title">
							<a data-toggle="tooltip" title="<?php echo __('Read More in ', 'themebeagle') . get_cat_name($cat); ?>" href="<?php echo esc_url(get_category_link($cat)); ?>">
								<?php 
									if ($cat_title_icon) { echo '<i class="fa ' . $cat_title_icon . '"></i>'; }
									if ($cat_title) { echo stripslashes($cat_title) . ' '; }
									echo get_cat_name($cat);
								?>
							</a>
						</h2>

						<div class="cat-box-wrap">

						<?php /* SHOW THE INDIVIDUAL POSTS IN EACH CATEGORY BOX */
							$count = 1;
							while ($my_query->have_posts()) : $my_query->the_post();
							$firstpost = '';
							if ( $count == 1 ) { $firstpost = 'first-post'; }
						?>

							<article id="post-<?php the_ID(); ?>" <?php post_class($firstpost); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

								<?php if ( $firstpost || ($post_class == 'even' && $catgroupclass == 'col-sm-12') ) { 
									themebeagle_large_thumbnail(); 
								} else { 
									themebeagle_post_thumbnail(); 
								} ?>

								<div class="entry-content" itemprop="text">
									<?php
										themebeagle_entry_title();
										the_excerpt();
									?>
								</div><!-- .entry-content -->

								<?php if ($catmeta) { themebeagle_entry_meta(); } ?>

							</article><!-- article.post -->

							<?php if ( $post_class == 'even' && $count%2 == 0 ) {
								echo '<div class="post-clear col-md-12 "></div>';
							} ?>

						<?php $count = $count + 1; endwhile; ?>

						</div> <!-- .cat-box-wrap -->

					</div> <!-- .cat-box -->

				</div> <!-- .<?php echo $catgroupclass; ?> -->

				<?php if ( $post_class == 'even') {
					echo '<div class="post-clear col-md-12 "></div>';
				}

endif; 
wp_reset_query(); } ?>

</div> <!-- .post-by-cat .row -->