<?php
/*-----------------------------------------------------------------------------------*/
// Main Index File (index.php)
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

get_header();
					if ( tb_option('post_layout') == 'posts_by_cat' ) {
						get_template_part( 'index2' );
					} elseif ( tb_option('post_layout') == 'masonry_2' || tb_option('post_layout') == 'masonry_3' || tb_option('post_layout') == 'masonry_4' ) {
						get_template_part( 'index-masonry' );
					} else {
						get_template_part( 'index1' );
					}

get_footer(); ?>