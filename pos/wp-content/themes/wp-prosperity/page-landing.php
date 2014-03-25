<?php
/*
Template Name: Landing Page
* @since 1.0
*/

get_header();

					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

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

					<?php endwhile; ?>

				</main><!-- END CONTENT AREA (.site-content) -->

			</div><!-- END PRIMARY CONTENT AREA (#primary) -->

		</div><!-- .site-inner-wrap -->

		</div><!-- END INNER SITE CONTAINER (.site-inner) -->

		<!-- SITE FOOTER (.site-footer) -->
		<footer class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<div class="wrap">
				&copy;  <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <a href="<?php echo esc_url('http://michaeldpollock.com/'); ?>" title="<?php esc_attr_e( 'Online Business Coach', 'themebeagle' ); ?>"><?php printf( __( 'WordPress Theme by %s', 'themebeagle' ), 'Michael Pollock' ); ?></a>
			</div><!-- .wrap -->
		</footer><!-- END SITE FOOTER (.site-footer) -->

	</div><!-- END OUTER SITE CONTAINER (.site-container) -->

	<?php wp_footer(); ?>

	<div id="backtotop"><span class="genericon genericon-collapse"></span></div>

</body>

</html>