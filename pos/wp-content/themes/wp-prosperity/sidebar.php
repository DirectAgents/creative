<?php
/*-----------------------------------------------------------------------------------*/
// Wide Sidebar - The sidebar containing the following sidebar areas:
// Sidebar-Wide Top;
// Sidebar-Wide Bottom-Left;
// Sidebar-Wide Bottom-Right
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

global $tb_options;
if ( $tb_options['layout'] != "fw" && $tb_options['layout'] != "sn-c" && $tb_options['layout'] != "c-sn") :
?>


			<!-- SECONDARY CONTENT AREA (#secondary) -->
			<div id="secondary" class="sidebar-area">

				<!-- SIDEBAR-WIDE TOP (.sidebar-wide-top) -->
				<aside class="sidebar sidebar-wide-top" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-wide-top') ) : ?>

						<section class="widget widget_text">
							<div class="widget-wrap">
								<h2 class="widget-title widgettitle"><?php _e("Default Text Widget", "themebeagle"); ?></h2>
								<div class="textwidget">
									<?php _e("This is a simple text widget. Visit the Widgets page in your WordPress Dashboard to add your own sidebar widgets. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi quis risus at nisl blandit feugiat. Ut vel orci quis sem dapibus iaculis. Aliquam ut nunc quis nisi tincidunt tincidunt.", "themebeagle"); ?>
								</div>
							</div>
						</section>

						<section class="widget widget_search">
							<div class="widget-wrap">
								<?php get_search_form(); ?>
							</div>
						</section>

					<?php endif; ?>
				</aside><!-- END SIDEBAR-WIDE TOP (.sidebar-wide-top) -->

				<?php if ( is_active_sidebar('sidebar-wide-bottom-left') || is_active_sidebar('sidebar-wide-bottom-right') ) { ?>

					<!-- SIDEBAR-WIDE BOTTOM (.sidebar-wide-bottom) -->
					<div class="sidebar-wide-bottom">

						<!-- SIDEBAR-WIDE BOTTOM-LEFT (.sidebar-wide-bottom-left) -->
						<aside class="sidebar sidebar-wide-bottom-left" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
							<?php dynamic_sidebar( 'sidebar-wide-bottom-left' ); ?>
						</aside><!-- END SIDEBAR-WIDE BOTTOM-LEFT (.sidebar-wide-bottom-left) -->

						<!-- SIDEBAR-WIDE BOTTOM-RIGHT (.sidebar-wide-bottom-right) -->
						<aside class="sidebar sidebar-wide-bottom-right" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
							<?php dynamic_sidebar( 'sidebar-wide-bottom-right' ); ?>
						</aside><!-- END SIDEBAR-WIDE BOTTOM-RIGHT (.sidebar-wide-bottom-right) -->

					</div><!-- END SIDEBAR-WIDE BOTTOM (.sidebar-wide-bottom) -->

				<?php } ?>

			</div><!-- END SECONDARY CONTENT AREA (#secondary) -->

<?php endif; ?>