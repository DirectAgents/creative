<?php
/*-----------------------------------------------------------------------------------*/
// 404 Template (404.php)
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

get_header(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

						<header class="entry-header">
							<h1 class="entry-title page"><?php _e("Error 404: Page Not Found", "themebeagle"); ?></h1>
							<p><?php _e("We're sorry, but it seems the page you're seeking does not exist. Perhaps you can find what you seek below.", "themebeagle"); ?></p>
						</header><!-- .entry-header -->

						<div class="row">

							<div class="sitemap col-sm-6 sitemap-entries">

<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts(array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 30));
	if ( have_posts() ) :
								echo '<h4>' . __("30 Most Recent Entries", "themebeagle") . '</h4>'; 
								echo '<div class="sitemap-archives article-container">';
	while ( have_posts() ) : the_post(); 
?>

									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
										<p class="sitemap-entry-title">
											<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
										</p>

										<p class="sitemap-entry-meta">
											<?php the_author() ?> &bull; 
											<?php themebeagle_entry_date(); ?> 
											<?php if (comments_open()) { echo ' &bull; '; comments_popup_link( __('Add a Comment', 'themebeagle'), __('1 Comment', 'themebeagle'), __('% Comments', 'themebeagle') ); } ?>
										</p>

									</article>

<?php
endwhile;
								echo '</div>';
endif; 
wp_reset_query(); ?>

							</div> <!-- .sitemap -->

							<div class="sitemap col-sm-6">

								<h4><?php _e("Site Feeds", "themebeagle"); ?></h4>
								<ul class="sitemap-archives">
									<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e("Main RSS Feed", "themebeagle"); ?></a></li>
									<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e("Comments RSS Feed", "themebeagle"); ?></a></li>
								</ul>

								<h4><?php _e("Monthly Archives", "themebeagle"); ?></h4>
								<ul class="sitemap-archives">
									<?php wp_get_archives('show_post_count=0'); ?>
								</ul>

								<h4><?php _e("Pages", "themebeagle"); ?></h4>
								<ul class="sitemap-archives">
									<?php wp_list_pages('title_li='); ?>
								</ul>

								<h4><?php _e("Categories", "themebeagle"); ?></h4>
								<ul class="sitemap-archives">
									<?php wp_list_categories('title_li=&show_count=0'); ?>
								</ul>

								<?php $posttags = get_tags(); if ($posttags) { ?>
									<h4><?php _e("Popular Tags", "themebeagle"); ?></h4>
									<p class="sitemap-archives tags clearfix">
										<?php wp_tag_cloud(array(
											'unit' => 'px',
											'number' => 20,
											'smallest' => 12,
											'largest' => 12,
											'format' => 'flat',
											'orderby' => 'count',
											'order' => 'DESC'
										)); ?>
									</p>
								<?php } ?>

							</div> <!-- .sitemap -->

						</div><!-- .row -->

					</article><!-- .post -->

<?php get_footer(); ?>