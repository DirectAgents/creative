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
<div class="widget-wrapper"> 
  
  <!--<div class="rates-start"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/rates-start.png"/></div>-->
  <div class="widget-wrapper-rates">
    <div class="widget-title-rates" style="color:#414344; font-size:18px; background:url(http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;"> I want to borrow money</div>
    <ul id="i-want-to-borrow-money">
      <li>
        <label>Why do you want to borrow money?</label>
      </li>
      <li>
        <div class="styled-select">
        <select id="i-want-to-borrow-money-select">
<option>Select loan type</option>
         <option value="loans/business/">Home Purchase</option>
<option value="loans/home/">Home Refinance</option>
<option value="loans/business/">Small Business</option>
<option value="loans/personal/">Debt Consolidation</option>
<option value="loans/personal/">Home Improvement</option>
<option value="loans/personal/">Vacation</option>
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
  border-bottom-left-radius:8px;"> <a href="#" id="start-here-btn"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/start-here-btn.gif"/></a> </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <div class="widget-wrapper">
    <div class="widget-title2" style="color:#1e517f; background:url(http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;"> Learn</div>
    <div class="widget-wrapper-content">
      <ul class='bulb-list'>
        <li class="lightbulb">Keep up with industry news and the latest rates.</li>
        <li class="read-news-button-sidebar"><a href="http://termlifequotetoday.com/everyloan/news/"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/read-news.jpg"/></a></li>
      </ul>
    </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <div class="widget-wrapper">
    <div class="widget-title2" style="color:#1e517f; background:url(http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;"> Calculate</div>
    <div class="widget-wrapper-content">
      <ul class="calc-list">
        <li class="calculator">Run the numbers, compare & visualize your loan.</li>
        <li class="calculate-button-sidebar"><a href="#"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/calculate.jpg"/></a></li>
      </ul>
    </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <div class="widget-wrapper">
    <div class="widget-title2" style="color:#1e517f; background:url(http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;"> Borrow</div>
    <div class="widget-wrapper-content">
      <ul>
        <li class="borrow">View an overview of all loans & find helpful resources to get started.</li>
        <li class="view-loans-button-sidebar"><a href="loan-types"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/view-loans.jpg"/></a></li>
      </ul>
    </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <?php endif; //end of right-sidebar ?>
  <?php responsive_widgets_end(); // after widgets hook ?>
</div>
<!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>
