<?php
/*
Template Name: Blog - Masonry 2 Column
*/

global $catid;
$catid = '';
$catid = get_post_meta($post->ID, 'tb_cats', true); 
global $postclass;
$postclass = 'col-sm-6';
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

					<?php get_template_part( 'index-masonry' );

get_footer(); ?>