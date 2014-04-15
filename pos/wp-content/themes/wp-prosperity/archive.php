<?php
/*-----------------------------------------------------------------------------------*/
// The template for displaying Archive pages (archive.php)
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

get_header(); ?>


					<header class="archive-header">
						<?php if (is_category()) { ?>			
							<h1 class="archive-title"><?php _e("", "themebeagle"); ?><?php single_cat_title(); ?></h1>
							<?php if (category_description()) { ?>
								<div class="archive-meta"><?php echo category_description(); ?></div>
							<?php } ?>
						<?php } elseif (is_tag()) { ?>
							<h1 class="archive-title"><?php _e("", "themebeagle"); ?><?php single_tag_title(); ?></h1>
							<?php if (tag_description()) { ?>
								<div class="archive-meta"><?php echo tag_description(); ?></div>
							<?php } ?>	
						<?php } elseif (is_day()) { ?>
							<h1 class="archive-title"><?php _e("", "themebeagle"); ?><?php the_time('F jS, Y'); ?></h1>
						<?php } elseif (is_month()) { ?>
							<h1 class="archive-title"><?php _e("", "themebeagle"); ?><?php the_time('F, Y'); ?></h1>
						<?php } elseif (is_year()) { ?>
							<h1 class="archive-title"><?php _e("", "themebeagle"); ?><?php the_time('Y'); ?></h1>
						<?php } elseif (is_tax('post_format')) { ?>
							<h1 class="archive-title"><?php printf( __( '%s Archives', 'themebeagle' ), '<span>' . get_post_format_string( get_post_format() ) . '</span>' ); ?></h1>
						<?php } else { ?>
							<h1 class="archive-title"><?php _e("Archives", "themebeagle"); ?></h1>
						<?php } ?>
					</header><!-- .archive-header -->

					<?php if ( tb_option('post_layout_archive') == 'masonry_2' || tb_option('post_layout_archive') == 'masonry_3' || tb_option('post_layout_archive') == 'masonry_4' ) {
						get_template_part( 'index-masonry' );
					} else {
						get_template_part( 'index1' );
					}

get_footer(); ?>