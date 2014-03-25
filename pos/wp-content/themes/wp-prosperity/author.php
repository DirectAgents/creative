<?php
/*-----------------------------------------------------------------------------------*/
// The template for displaying Author archive page (author.php)
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

get_header(); ?>

					<header class="archive-header">

						<h1 class="archive-title"><?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></h1>

						<?php if ( get_the_author_meta('description') ) { ?>
							<?php get_template_part( 'author-bio' ); ?>
						<?php } ?>

					</header><!-- .archive-header -->

					<?php if ( tb_option('post_layout_archive') == 'masonry_2' || tb_option('post_layout_archive') == 'masonry_3' || tb_option('post_layout_archive') == 'masonry_4' ) {
						get_template_part( 'index-masonry' );
					} else {
						get_template_part( 'index1' );
					}

get_footer(); ?>