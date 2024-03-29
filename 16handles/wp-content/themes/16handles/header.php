<?php
/**
 * @package WordPress
 * @subpackage 16 Handles
 */
?><!DOCTYPE html>
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<link rel="icon" type="image/ico" href="http://16handles.com/favicon.ico"/>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="user-scalable=yes">
<title><?php
	
	
global $page, $paged;

// custom archive title
if(!is_post_type_archive('locations')  && !is_post_type_archive('flavors')){
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );		
}

$site_description = get_bloginfo( 'description', 'display' );
if($site_description && (is_home() || is_front_page()) && !is_post_type_archive('locations') && !is_post_type_archive('flavors')){
	echo " | $site_description";	
} elseif(is_post_type_archive('flavors')) {	
	echo "Frozen Yogurt Toppings & Flavors - Flaunt Your Flavor™ at 16 Handles!";	
}	else {	
	echo "16 Handles Froyo Locations | Store Finder";
}	
?></title>
<?php if(is_post_type_archive('locations')): ?>
	
<?php endif; ?>
	<link type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" rel="shortcut icon" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
  <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'/>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/smoothDivScroll.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/form.css" />
  <!--[if lt IE 9]>
  <link type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie-style.css" rel="stylesheet" media="screen"/>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!--[if (gte IE 6)&(lte IE 8)]>
      <script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>
      <script type="text/javascript" src="js/selectivizr-min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target=".navbar" <?php body_class('wrap'); ?>>
  <header>
    <div class="centerModule centerHeader">
      <div class="logo-collapsed">
        <a href="<?php echo home_url( '/' ); ?>">
					<div class="ajax-logo small"></div>
					<img src="<?php bloginfo('template_url'); ?>/img/handles.png" id="handles"/>
					<img src="<?php bloginfo('template_url'); ?>/img/logo-mini.png" id="logo-mini"/>
        </a>
      </div>
      <a href="<?php echo home_url( '/' ); ?>" class="ajax-logo large">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" id="logo"/>
      </a>
      <nav>
        <ul class="main_accordion">
          <li class="m01">
            <a href="/locations"><span class="icon icon_1"></span><p>Locations</p></a>
          </li>
          <li class="m02">
            <a href="/flavors/?yogurt" class="skip-open"><span class="icon icon_2"></span><p>Flavors</p></a>
            <ul>
              <li><a href="/flavors/?yogurt">yogurt</a></li>
              <li><a href="/flavors/?toppings">toppings</a></li>
              <li><a href="/flavors/?cakes">cakes &amp; novelties</a></li>
            </ul>
          </li>
          <li class="m03">
            <a href="/about" class="skip-open"><span class="icon icon_3"></span><p>Our Story</p></a>
            <ul>
              <li><a href="/about">about us</a></li>
              <li><a href="/initiatives">initiatives</a></li>        
            </ul>
          </li>
          <li class="m04">
            <a href="/info" class="skip-open"><span class="icon icon_4"></span><p>Franchise</p></a>
            <ul>
              <li><a href="/info">info</a></li>
              <li><a href="/how">how</a></li>
              <li><a href="/apply">inquire</a></li>
              <li><a href="/testimonials">testimonials</a></li>        
            </ul>
          </li>
          <li class="m05">
            <a href="/shop"><span class="icon icon_5"></span><p>Shop</p></a>
          </li>
        </ul>
      </nav>
    </div>
  </header>