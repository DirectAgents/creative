<?php
/*-----------------------------------------------------------------------------------*/
// Theme Footer - The template for displaying the footer. Contains footer content and
// the closing of the .site-main and .site-container div elements.
//
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 
?>

					<?php themebeagle_site_content_bottom(); // action hook ?>

				</main><!-- END CONTENT AREA (.site-content) -->

				<?php get_template_part( 'sidebar', 'narrow' ); ?>

			</div><!-- END PRIMARY CONTENT AREA (#primary) -->

<?php get_sidebar(); ?>

		</div><!-- .site-inner-wrap -->

		</div><!-- END INNER SITE CONTAINER (.site-inner) -->

		<?php themebeagle_above_footer(); // action hook ?>

		<?php //get_template_part( 'footer-widgets' ); ?>
		<div id='footer-widgets' class='lp-footer-widgets'>
			<div class='wrap'>
				© POS.com | <a href="#">Privacy Policy link</a>
			</div>
		</div>

		<!-- SITE FOOTER (.site-footer) -->
		<footer class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter" style='display:none;'>

			<div class="wrap">

				<?php 
					$showicons = tb_option('show_icons');
					if ( $showicons && in_array('icons_footer', $showicons) ) { ?>
						<?php get_template_part( 'icons-site' ); ?>
					<?php } 
				?>

				<div class="site-info" >
					&copy;  <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <a href="<?php echo esc_url('http://michaeldpollock.com/'); ?>" title="<?php esc_attr_e( 'Online Business Coach', 'themebeagle' ); ?>"><?php printf( __( 'WordPress Theme by %s', 'themebeagle' ), 'Michael Pollock' ); ?></a>
				</div><!-- .site-info -->

			</div><!-- .wrap -->

		</footer><!-- END SITE FOOTER (.site-footer) -->

	</div><!-- END OUTER SITE CONTAINER (.site-container) -->

	<?php wp_footer(); ?>

	<div id="backtotop"><span class="genericon genericon-collapse"></span></div>
	
	<?php do_action('rs_slide_contact_form'); ?>

</body>

</html>