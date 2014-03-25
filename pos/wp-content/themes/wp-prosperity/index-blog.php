<?php
	global $thumbclass;
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

	query_posts(array(
		'posts_per_page' => $postcount,
		'category__in' => $catid,
		'paged' => $paged,
		'post__not_in' =>  $do_not_duplicate
	));

	if (have_posts()) : 
					echo '<div class="article-container ' . $thumbclass . '">';
	while (have_posts()) : the_post();

	$nothumb = '';
	if ( get_post_meta($post->ID, 'tb_hide_stuff', true) && in_array('hide_thumb', get_post_meta($post->ID, 'tb_hide_stuff', true)) )
		$nothumb = ' nothumb';
	if ( function_exists('get_the_image') )
		$hasimg = get_the_image(array( 'default_image' => false, 'image_scan' => true, 'echo' => false ));
	if ( !$hasimg && !has_post_thumbnail() && !tb_option('defthumb') )
		$nothumb = ' nothumb';
?>

						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass . $nothumb); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<?php get_template_part( 'content', get_post_format() ); ?>
						</article><!-- article.post -->

<?php 
	endwhile;
					echo '</div> <!-- .article-container -->';
					themebeagle_paging_nav();
	endif; 
	wp_reset_query();
?>