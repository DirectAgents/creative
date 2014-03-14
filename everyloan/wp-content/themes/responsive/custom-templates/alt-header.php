<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/responsive/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
<!doctype html>
<!--[if !IE]>      <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
    <meta name="robots" content="noindex">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title><?php wp_title('&#124;', true, 'right'); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nilland-Black">-->

    <script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/js/cb.js"></script>

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/responsive/core/css/responsive-nav.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/responsive/core/css/styles.css">
    <script src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/js/responsive-nav.js"></script>

   <script type='text/javascript'>//<![CDATA[ 

    $(function() {

        var pull = $('#pull');
        menu = $('nav ul');
        menuHeight = menu.height();

        $(pull).on('click', function(e) {

            e.preventDefault();
            menu.slideToggle();

        });

        $(window).resize(function(){

            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
   
        $('#start-here-btn').click(function(){

         location.href = '<?php echo site_url(); ?>/' + $('#i-want-to-borrow-money-select').val()+'?credit='+$('#credit-score').val()+'&pass=y';

        });

    /*
    * How to detect browser width
    */

    var wi = $(window).width();  
    $("p.testp").text('Initial screen width is currently: ' + wi + 'px.');

    $(window).resize(function() {
        var wi = $(window).width();

        if (wi <= 480){
            $("p.testp").text('Screen width is less than or equal to 480px. Width is currently: ' + wi + 'px.');
        }
        else if (wi <= 767){
            $("p.testp").text('Screen width is between 481px and 767px. Width is currently: ' + wi + 'px.');
        }
        else if (wi <= 980){
            $("p.testp").text('Screen width is between 768px and 980px. Width is currently: ' + wi + 'px.');
        }
        else if (wi <= 1200){
            $("p.testp").text('Screen width is between 981px and 1199px. Width is currently: ' + wi + 'px.');
        }
        else {
            $("p.testp").text('Screen width is greater than 1200px. Width is currently: ' + wi + 'px.');
        }
    });            
});

$(window).load(function(){
    hideAllDivs = function () {

        $("#find-the-right-loan").show();
        $("#personal-loan").hide();
        $("#home-refinance").hide();
        $("#student-loan").hide();
        $("#vacation").hide();
    };

    handleNewSelection = function () {

        hideAllDivs();

        switch ($(this).val()) {
            case 'Personal Loan':
            $("#personal-loan").show();
            $("#find-the-right-loan").hide();
            break;
            case 'Home Refinance':
            $("#home-refinance").show();
            $("#find-the-right-loan").hide();
            break;
            case 'Student Loan':
            $("#student-loan").show();
            $("#find-the-right-loan").hide();
            break;
            case 'Vacation':
            $("#vacation").show();
            $("#find-the-right-loan").hide();
            break;
        }
    };

    $(document).ready(function() {

        $("#i-want-to-borrow-money-select").change(handleNewSelection);

    // Run the event handler once now to ensure everything is as it should be
    handleNewSelection.apply($("#i-want-to-borrow-money-select"));
    
    });
});//]]>  

</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="library/js/jquery-1.9.1.min.js"><\/script>')</script>

<script>
$(document).ready(function() {

    $('#menu-toggle').click(function () {
      $('#menu').toggleClass('open');
      e.preventDefault();
  });
    
});
</script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/js/jquery.inputfocus-0.9.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/js/jquery.main.js"></script>



<?php wp_head(); ?>
</head>

<body <?php body_class('alt-home'); ?>>
    
   <div id="header">
        
        <div class='alt-container'>
        
        <div class="contact-info-desktop">

            <?php if (!dynamic_sidebar('contact-info-desktop')) : ?><?php endif; //end of home-widget-2 ?>

        </div>    

        <?php responsive_header_top(); // before header content hook ?>

        <?php responsive_in_header(); // header hook ?>

        <?php if ( get_header_image() != '' ) : ?>

        <div id="header-mobile">          

            <div id="logo">
                <a href="<?php echo home_url('/'); ?>"><img src="<?php header_image(); ?>" width="<?php if(function_exists('get_custom_header')) { echo get_custom_header() -> width;} else { echo HEADER_IMAGE_WIDTH;} ?>" height="<?php if(function_exists('get_custom_header')) { echo get_custom_header() -> height;} else { echo HEADER_IMAGE_HEIGHT;} ?>" alt="<?php bloginfo('name'); ?>" /></a>
            </div><!-- end of #logo -->

        </div>
        
        <?php endif; // header image was removed ?>

        <div class="top-menu-desktop">
         <?php if (has_nav_menu('top-menu', 'responsive')) { ?>


            <?php wp_nav_menu(array(
                'container'       => '',
                'fallback_cb'     =>  false,
                'menu_class'      => 'top-menu',
                'theme_location'  => 'top-menu')
            ); 
            ?>
            <?php } ?>

        
        </div>  

        <?php if ( !get_header_image() ) : ?>

            <div id="logo">
                <span class="site-name"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></span>
                <span class="site-description"><?php bloginfo('description'); ?></span>
            </div><!-- end of #logo -->  

        <?php endif; // header image was removed (again) ?>

        <div id="header-mobile">    

            <div class="top-menu-mobile">


                <nav class="nav-collapse">
                    <?php wp_nav_menu(array(
                        'container'       => '',
                        'fallback_cb'     =>  false,
                        'menu_class'      => 'top-menu',
                        'theme_location'  => 'top-menu')
                     ); 
                     ?>
                </nav> 
         
            </div>   

            <div class="contact-info-mobile">
                <?php if (!dynamic_sidebar('contact-info-mobile')) : ?><?php endif; //end of home-widget-2 ?>
            </div>   


        </div>  

        <?php get_sidebar('top'); ?>
        <?php /*wp_nav_menu(array(
            'container'       => 'div',
                'container_class'   => 'main-nav',
                'fallback_cb'     =>  'responsive_fallback_menu',
                'theme_location'  => 'header-menu')
        ); */
        ?>

        <?php /*if (has_nav_menu('sub-header-menu', 'responsive')) { ?>
        <?php wp_nav_menu(array(
            'container'       => '',
            'menu_class'      => 'sub-header-menu',
            'theme_location'  => 'sub-header-menu')
        ); */
        ?>
        <?php //} ?>

        <?php responsive_header_bottom(); // after header content hook ?>

         </div><!-- end of responsive container -->

    </div><!-- end of #header --> 

   

<?php responsive_container(); // before container hook ?>
<div id="container" class="hfeed">

 <div id="container-inner" class="hfeed">

    <?php responsive_header(); // before header hook ?>

    <?php responsive_header_end(); // after header container hook ?>
    
    <?php responsive_wrapper(); // before wrapper container hook ?>
    <div id="wrapper" class="clearfix">
        <?php responsive_wrapper_top(); // before wrapper content hook ?>
        <?php responsive_in_wrapper(); // wrapper hook ?>