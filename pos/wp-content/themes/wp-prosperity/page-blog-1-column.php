<?php
/*
Template Name: Blog - 1 Column
*/

global $thumbclass;
$thumbclass = '';
$thumbalign = tb_option('thumb_align');
if ( tb_option('thumbnails') ) { $thumbclass = 'thumbs-' . $thumbalign; }
if ( tb_option('thumbnails') && get_post_meta($post->ID, 'tb_thumb_align', true) != 'default' ) { $thumbclass = 'thumbs-' . get_post_meta($post->ID, 'tb_thumb_align', true); }
global $catid;
$catid = get_post_meta($post->ID, 'tb_cats', true);
global $postclass;
$postclass = 'col-sm-12';
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

					<?php get_template_part( 'index-blog' );

get_footer(); ?>