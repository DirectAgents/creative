<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Sidebar How it works Template
 *
 *
 * @file           sidebar-home-everyloan.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-home-everyloan.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
		<?php responsive_widgets_before(); // above widgets container hook ?>
        <div id="widgets-home" class="grid col-300 fit">
        <?php responsive_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('how-it-works-sidebar')) : ?>
            <div class="widget-wrapper">
            
              
              <div class="rates-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/rates-start.png"/></div>
               <div class="widget-wrapper-rates">
            
                <div class="widget-title-rates" style="color:#1e517f; font-size:18px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;">
                I want to borrow money</div>
					<ul>
						<li>
                        <select style="width:100%">
                        <option>Select loan type</option>
                        </select>
                        </li>
                        <li>
                        <select style="width:100%">
                        <option>Select credit quality</option>
                        </select>
                        </li>
					</ul>
                    <div style="background:#fff; padding-left:40px; padding-bottom:20px;">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/start-here-btn.gif"/>
                    </div>

            </div><!-- end of .widget-wrapper -->
            
            
            
            
            
            
         
            
            
           
            
			<?php endif; //end of right-sidebar ?>

        <?php responsive_widgets_end(); // after widgets hook ?>
        </div><!-- end of #widgets -->
		<?php responsive_widgets_after(); // after widgets container hook ?>