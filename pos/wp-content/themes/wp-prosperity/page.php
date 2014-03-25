<?php
/*-----------------------------------------------------------------------------------*/
// Single Page (page.php)
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

get_header();

					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

							<?php themebeagle_entry_media(); ?>

							<header class="entry-header">
								<h1 class="entry-title page"><?php the_title(); ?></h1>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php 
									the_content();
									wp_link_pages( array( 'before' => '<p class="page-links"><span class="page-links-title">' . __( 'Pages: ', 'themebeagle' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</p>' ) );
									edit_post_link( __( 'Edit', 'themebeagle' ), '<p class="edit-link">', '</p>' ); 
								?>
							</div><!-- .entry-content -->

						</article><!-- .post -->

						<?php comments_template();

					endwhile;

get_footer(); ?>