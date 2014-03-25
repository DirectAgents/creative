<?php 
/**
 * footer-widgets.php - template for displaying footer widgets.
 *
 * @since 1.0
 */
?>

		<?php if ( tb_option('footer_widgets') ) { ?>
			<!-- FOOTER WIDGETS (#footer-widgets) -->
			<div id="footer-widgets">

				<div class="wrap">

					<div class="row">

						<!-- FOOTER WIDGETS LEFT (.footer-widgets-left) -->
						<aside class="sidebar col-md-4 footer-widgets-left" role="complementary">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widgets-left') ) : ?>
								<section class="widget widget_text">
									<div class="widget-wrap">
										<h2 class="widget-title widgettitle"><?php _e("Footer Widgets Left", "themebeagle"); ?></h2>
										<div class="textwidget">
											<?php _e("Footer Widgets are activated. You can deactivate them on your Theme Settings page. If you want to keep them active, visit the Widgets page in your WordPress Dashboard to add some of your own widgets to this area.", "themebeagle"); ?>
										</div>
									</div>
								</section>
							<?php endif; ?>
						</aside><!-- END FOOTER WIDGETS LEFT (.footer-widgets-left) -->

						<!-- FOOTER WIDGETS CENTER (.footer-widgets-center) -->
						<aside class="sidebar col-md-4 footer-widgets-center" role="complementary">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widgets-center') ) : ?>
								<section class="widget widget_text">
									<div class="widget-wrap">
										<h2 class="widget-title widgettitle"><?php _e("Footer Widgets Center", "themebeagle"); ?></h2>
										<div class="textwidget">
											<?php _e("Footer Widgets are activated. You can deactivate them on your Theme Settings page. If you want to keep them active, visit the Widgets page in your WordPress Dashboard to add some of your own widgets to this area.", "themebeagle"); ?>
										</div>
									</div>
								</section>
							<?php endif; ?>
						</aside><!-- END FOOTER WIDGET CENTER (.footer-widgets-center) -->

						<!-- FOOTER WIDGETS RIGHT (.footer-widgets-right) -->
						<aside class="sidebar col-md-4 footer-widgets-right" role="complementary">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widgets-right') ) : ?>
								<section class="widget widget_text">
									<div class="widget-wrap">
										<h2 class="widget-title widgettitle"><?php _e("Footer Widgets Right", "themebeagle"); ?></h2>
										<div class="textwidget">
											<?php _e("Footer Widgets are activated. You can deactivate them on your Theme Settings page. If you want to keep them active, visit the Widgets page in your WordPress Dashboard to add some of your own widgets to this area.", "themebeagle"); ?>
										</div>
									</div>
								</section>
							<?php endif; ?>
						</aside><!-- END FOOTER WIDGETS LEFT (.footer-widgets-right) -->

					</div><!-- .row -->

				</div><!-- END .wrap -->

			</div><!-- END FOOTER WIDGETS (#footer-widgets) -->
		<?php } ?>