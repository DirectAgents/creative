<?php
/*-----------------------------------------------------------------------------------*/
// The template for displaying search results pages (search.php)
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

get_header(); ?>

					<header class="archive-header">
						<h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'themebeagle' ), get_search_query() ); ?></h1>	
					</header><!-- .archive-header -->

					<?php get_template_part( 'index1' );

get_footer(); ?>