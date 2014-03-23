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

<div id="widgets-landingpage" class="grid col-300 fit">
<?php responsive_widgets(); // above widgets hook ?>
<?php if (!dynamic_sidebar('how-it-works-sidebar')) : ?>
<div class="widget-wrapper"> 
  
  <!--<div class="rates-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/rates-start.png"/></div>-->



    
    <div class="widget-wrapper-content-lp">
      
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/low-rates-from-678.jpg" width="272" height="86"/>
    <ul class="lp-credit-score">
        <li>APR Rates from 6.78% to 27.99% APR. Best APR is available to borrowers with excellent credit.</li>
      </ul>
    
    </div>
  </div>



   
   
   
   
  <!-- end of .widget-wrapper -->
  
  <div class="widget-wrapper">
    <div class="widget-title" style="color:#1e517f; background:#f5f5f5 url(http://terfmlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/widget-title-how-it-works-sidebar.gif); -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;">Personal Loans Available for:</div>
    <div class="widget-wrapper-content">
      <ul class="personal-loans-col1">
       
        <li>Debt consolidation</li>
         <li>Home improvement</li>
          <li>Major purchase</li>
           <li>Car financing</li>
            
        
      </ul>
      
      
       <ul class="personal-loans-col2">
       
       
            <li>Vacation</li>
             <li>Weddings</li>
              <li>and more</li>
        
      </ul>
      
      
    </div>
  </div>
  <!-- end of .widget-wrapper -->
  
  <div class="widget-wrapper">
    <div class="widget-title" style="color:#1e517f; background:#f5f5f5; -webkit-border-top-right-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius: 4px;">Did You Know?</div>
    <div class="widget-wrapper-content">
      <ul class="lp-credit-score">
        <li>Checking your rate will not affect your credit score.</li>
      </ul>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/excellent-credit-score.jpg" style="margin-left:3px; margin-bottom:5px; margin-top:-13px;"/>
    </div>
  </div>
  <!-- end of .widget-wrapper -->
  
 <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/questions.gif"/></p>
 
 <div style="float:left; margin-left:55px; color:#555555;">
 Call us:<br />9AM - 5PM PST<br /><br />
 
 <p>1-800-EVERYLOAN<br/>1-800-383-7956</p>
 </div>
 
 
  
  <?php endif; //end of right-sidebar ?>
  <?php responsive_widgets_end(); // after widgets hook ?>
</div>
<!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>
