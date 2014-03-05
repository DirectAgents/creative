<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Home Widgets Template
 *
 *
 * @file           sidebar-home.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-home.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>  
	<?php responsive_widgets_before(); // above widgets container hook ?>
    <div id="widgets" class="home-widgets">
        <div class="grid col-300">
        <?php responsive_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('home-sidebar')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title-home"><h3><?php _e('News Stories', 'responsive'); ?></h3></div>
                <div class="textwidget">


                    <?php _e('
                    <ul>
                    <li>Mortgage Rates Going Lower in 2013?</li>
                    <li>President to Fix Housing Market 2013</li>
                    <li>Home Owner Tax Credits and Deductions</li>
                    <li>Lowest Mortgage Rates Feb 2013</li>
                    </ul>','responsive'); ?>

                </div>
            
			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-1 ?>

        <?php responsive_widgets_end(); // responsive after widgets hook ?>
        </div><!-- end of .col-300 -->

        <div class="grid col-300">
        <?php responsive_widgets(); // responsive above widgets hook ?>
            
			<?php if (!dynamic_sidebar('home-widget-2')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title-home"><h3><?php _e('More Calculators', 'responsive'); ?></h3></div>
                <div class="textwidget">

                     <?php _e('
                    <ul>
                    <li>Monthly Payment Calculator</li>
                    <li>Mortgage Refinancing Calculator</li>
                    <li>Mortgage Term Comparison Calculator</li>
                    <li>Interest Only Loan Payment Calculator</li>
                    </ul>','responsive'); ?>

                </div>
            
			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-2 ?>
            
        <?php responsive_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 -->

        <div class="grid col-300 fit">
        <?php responsive_widgets(); // above widgets hook ?>
            
			<?php if (!dynamic_sidebar('home-widget-3')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title-home"><h3><?php _e('Borrower Resources', 'responsive'); ?></h3></div>
                <div class="textwidget">

                     <?php _e('
                    <ul>
                    <li>The Loan Process</li>
                    <li>Refinance</li>
                    <li>Home Purchase</li>
                    <li>Home Equity</li>
                    </ul>','responsive'); ?>


                </div>
        
			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-3 ?>
            
        <?php responsive_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 fit -->
    </div><!-- end of #widgets -->
	<?php responsive_widgets_after(); // after widgets container hook ?>