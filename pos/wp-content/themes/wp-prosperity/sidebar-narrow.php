<?php
/*-----------------------------------------------------------------------------------*/
// Narrow Sidebar (sidebar-narrow.php) - Sidebar containing sidebar-narrow widget area.
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

global $tb_options;
if ( $tb_options['layout'] == "c-sn-sw" || $tb_options['layout'] == "sn-c-sw" || $tb_options['layout'] == "sw-sn-c" || $tb_options['layout'] == "sw-c-sn" || $tb_options['layout'] == "sn-c" || $tb_options['layout'] == "c-sn" ) :
?>

				<!-- SIDEBAR NARROW (.sidebar-narrow) -->
				<aside class="sidebar sidebar-narrow" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-narrow') ) : ?>

						<section class="widget widget_text">
							<div class="widget-wrap">
								<h2 class="widget-title widgettitle"><?php _e("Default Text Widget", "themebeagle"); ?></h2>
								<div class="textwidget">
									<?php _e("This is a simple text widget. Visit the Widgets page in your WordPress Dashboard to add your own sidebar widgets.", "themebeagle"); ?>
								</div>
							</div>
						</section>

						<section class="widget widget_archives">
							<div class="widget-wrap">
								<h2 class="widget-title widgettitle"><?php _e("Archives", "themebeagle"); ?></h2>
								<ul><?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?></ul>
							</div>
						</section>

						<section class="widget widget_categories">
							<div class="widget-wrap">
								<h2 class="widget-title widgettitle"><?php _e("Categories", "themebeagle"); ?></h2>
								<ul><?php wp_list_categories('orderby=name&hierarchical=0&title_li='); ?></ul>
							</div>
						</section>

					<?php endif; ?>
				</aside><!-- END SIDEBAR NARROW (.sidebar-narrow) -->

<?php endif; ?>