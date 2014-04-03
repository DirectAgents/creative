<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Sidebar How it works Template
 *
 *
 * @file           sidebar-how-it-works.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-how-it-works.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php responsive_widgets_before(); // above widgets container hook ?>

<div id="widgets-how-it-works" class="grid col-300 fit">
<?php responsive_widgets(); // above widgets hook ?>
<?php if (!dynamic_sidebar('how-it-works-sidebar')) : ?>
<div class="widget-wrapper sidebar-widgets"> 
  
  <!--<div class="rates-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/rates-start.png"/></div>-->
  <div class="widget-wrapper-rates">
    <div class="widget-title-rates" style="color:#414344; font-size:18px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;"> I want to borrow money</div>
    <ul id="i-want-to-borrow-money">
      <li>
        <label>Why do you want to borrow money?</label>
      </li>
      <li>
        <div class="styled-select">
        <select id="i-want-to-borrow-money-select">
                                                
                                                <option>Select loan type</option>
                                                        <option value="loans/home-purchase/">Home Purchase Loan</option>
                                                        <option value="loans/home-refinance/">Home Refinance Loan</option>
                                                        <option value="loans/home-improvement/">Home Improvement</option>
                                                        <option value="loans/business/">Business Loan</option>
                                                        <option value="loans/equipment-financing/">Equipment Financing</option>
                                                        <option value="loans/personal/">Personal Loan</option>
                                                        <option value="loans/debt-consolidation/">Debt Consolidation Loan</option>
                                                        <option value="loans/cash-advance/">Cash Advance</option>
                                                        <option value="loans/vacation/">Vacation Loan</option>
                                                        <option value="loans/wedding/">Wedding Loan</option>
                                                        <option value="loans/medical-dental/">Medical Dental</option>
                                                        <option value="loans/household-expenses/">Household Expenses</option>
                                                        <option value="loans/major-purchase/">Major Purchase</option>
                                                        <option value="loans/small-business/">Small Business Loan</option>
                                                        <option value="loans/merchant-cash-advance/">Merchant Cash Advance</option>
                                                        <option value="loans/accounts-receivable/">Accounts Receivable</option>
                                                      </select>  
        </div>
      </li>
      <li>
        <label>What is your credit quality like?</label>
      </li>
      <li>
        <div class="styled-select">
          <select id="credit-score">
                                                        <option>Select credit quality</option>
                                                        <option>Excellent (720+)</option>
                                                        <option>Good (660-720)</option>
                                                        <option>Fair (600-660)</option>
                                                        <option>Some Problem (below 600)</option>
                                                    </select>
        </div>
      </li>
    </ul>
    <div style="background:#fff; padding-left:27px; padding-bottom:20px; border-bottom-right-radius:8px;
  border-bottom-left-radius:8px;"> <a href="#" id="start-here-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/start-here-btn.gif"/></a> </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <div class="widget-wrapper sidebar-module">
    <div class="widget-title2" style="color:#1e517f; background:url(<?php echo get_stylesheet_directory_uri(); ?>/core/images/widget-title-how-it-works-sidebar.gif);"> Learn</div>
    <div class="widget-wrapper-content">

      <ul class="sidebar-pic-cont">
        <li class="lightbulb">Keep up with industry news and the latest rates.</li>
        <li class="read-news-button-sidebar"><a href="<?php echo site_url(); ?>/news/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/read-news.jpg"/></a></li>
      </ul>

    </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <div class="widget-wrapper sidebar-module">
    <div class="widget-title2" style="color:#1e517f; background:url(<?php echo get_stylesheet_directory_uri(); ?>/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;"> Calculate</div>
    <div class="widget-wrapper-content">

      <ul class="sidebar-pic-cont">
        <li class="calculator">Run the numbers, compare & visualize your loan.</li>
        <li class="calculate-button-sidebar"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/calculate.jpg"/></a></li>
      </ul>

    </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <div class="widget-wrapper sidebar-module">
    <div class="widget-title2" style="color:#1e517f; background:url(<?php echo get_stylesheet_directory_uri(); ?>/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;"> Borrow</div>
    <div class="widget-wrapper-content">

      <ul class="sidebar-pic-cont">
        <li class="borrow">View an overview of all loans & find helpful resources to get started.</li>
        <li class="view-loans-button-sidebar"><a href="loan-types"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/view-loans.jpg"/></a></li>
      </ul>

    </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <?php endif; //end of right-sidebar ?>
  <?php responsive_widgets_end(); // after widgets hook ?>
</div>
<!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>
