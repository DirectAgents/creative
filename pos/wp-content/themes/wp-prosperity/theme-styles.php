<?php

/*-----------------------------------------------------------------------------------*/
// Add Theme Stylesheets to Page head
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'themebeagle_enqueue_styles' );
function themebeagle_enqueue_styles() {

	// Load Font Awesome font.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css', array(), '4.0.3' );

	// Load Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons/genericons.css', array(), '3.0.3' );

	// Load Bootstrap stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap.min.css', array(), '3.0.3' );

	// Load Flexslider stylesheet.
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/flexslider.css', array(), '2.2.0' );

	// Load Shortcodes stylesheet.
	wp_enqueue_style( 'theme-shortcodes', get_template_directory_uri() . '/shortcodes.css', array(), '1.0' );

	// Load bbPress stylesheet.
	if ( function_exists( 'is_bbpress' ) ) {
		wp_enqueue_style( 'theme-bbpress', get_template_directory_uri() . '/bbpress.css', array(), '1.0' );
	}

	// Load WooCommerce stylesheet.
	if (is_woocommerce_activated()) { 
		wp_enqueue_style( 'theme-woocommerce', get_template_directory_uri(). '/woocommerce.css' );
	}

	// Load Default Google Fonts stylesheet.
	wp_enqueue_style( 'default-google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic|Bitter:400,700,400italic', array(), '1.0' );

	// Loads main stylesheet.
	wp_enqueue_style( 'theme-main-styles', get_stylesheet_uri(), array('dashicons'), '1.0' );

	// Load Custom Styles stylesheet.
	wp_enqueue_style( 'theme-custom_styles', get_template_directory_uri() . '/style-custom.css', array(), '1.0' );
}



/*-----------------------------------------------------------------------------------*/
// Add Viewport Meta Tag
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('wp_head','themebeagle_viewport_meta');
function themebeagle_viewport_meta() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
}



/*-----------------------------------------------------------------------------------*/
// Add Favicon Tag to Page Head
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('wp_head','themebeagle_favicon', 99);
function themebeagle_favicon() {
	$favicon = tb_option('favicon_url');
	if ( $favicon ) {
		echo '<link rel="Shortcut Icon" href="'.$favicon. '" type="image/x-icon" />';
	}
}



/*-----------------------------------------------------------------------------------*/
// Add layout to body_class output based on theme settings
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_layout_body_class');
function themebeagle_layout_body_class($classes) {

	$layout = '';
	$layout = tb_option('default_layout');
	global $tb_options;
	$tb_options['layout'] = $layout;


	if ( is_home() || is_front_page()  ) {
		$layout = tb_option('home_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;

	}

	if ( is_single() ) {
		global $post;
		$layout = get_post_meta($post->ID, 'tb_page_layout', true);

		if ( ! $layout || $layout == "default" )
			$layout = tb_option('single_layout');

		if ( ! $layout || $layout == "default" ) 
			$layout = tb_option('default_layout');

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_page() ) {
		global $post;
		$layout = get_post_meta($post->ID, 'tb_page_layout', true);

		if ( ! $layout || $layout == "default" )
			$layout = tb_option('page_layout');

		if ( ! $layout || $layout == "default" ) 
			$layout = tb_option('default_layout');

		global $tb_options;
		$tb_options['layout'] = $layout;
	}



	if ( is_archive() ) {
		$layout = tb_option('archive_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_404() ) {
		$layout = tb_option('404_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}


	if ( function_exists('is_bbpress') && is_bbpress() ) {
		$layout = tb_option('bbpress_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_page_template('page-landing.php') ) {
		$layout = 'fw';

		global $tb_options;
		$tb_options['layout'] = $layout;
	}



	if ( is_woocommerce_activated() && is_woocommerce() ) {
		$layout = tb_option('woo_shop_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_product() ) {
		$layout = tb_option('woo_product_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_cart() ) {
		$layout = tb_option('woo_cart_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_checkout() ) {
		$layout = tb_option('woo_checkout_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_account_page() ) {
		$layout = tb_option('woo_account_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}







	if ( $layout == 'c-sw' || $layout == 'sw-c' || $layout == 'fw' || $layout == 'sn-c' || $layout == 'c-sn' ) {
		$layout = $layout . " two-column";
	} else {
		$layout = $layout;
	}

	// Add classes to body_class() output
	$classes[] = $layout;
	return $classes;
}



/*-----------------------------------------------------------------------------------*/
// Add unboxed to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_unboxed_body_class');
function themebeagle_unboxed_body_class($classes) {

	$unboxedclass = '';

	if ( tb_option('unboxed') == 1 ) {
		$unboxedclass = 'unboxed';
	}

	if ( $unboxedclass ) {
		$classes[] = $unboxedclass;
	}

	return $classes;

}



/*-----------------------------------------------------------------------------------*/
// Add full-header to body_class output
// @since 1.1
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_full_header_body_class');
function themebeagle_full_header_body_class($classes) {

	$fullheader = '';

	if ( tb_option('full_header') && tb_option('header_logo') ) {
		$fullheader = 'full-header';
	}

	if ( $fullheader ) {
		$classes[] = $fullheader;
	}

	return $classes;

}



/*-----------------------------------------------------------------------------------*/
// Add darkheader to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_dark_header_body_class');
function themebeagle_dark_header_body_class($classes) {

	$darkheaderclass = '';

	if ( tb_option('header_color') == 'dark' ) {
		$darkheaderclass = 'darkheader';
	}

	if ( $darkheaderclass ) {
		$classes[] = $darkheaderclass;
	}

	return $classes;

}



/*-----------------------------------------------------------------------------------*/
// Add nav-arrows to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_navarrows_body_class');
function themebeagle_navarrows_body_class($classes) {

	$navarrowsclass = '';

	if ( tb_option('navarrows') ) {
		$navarrowsclass = 'nav-arrows';
	}

	if ( $navarrowsclass ) {
		$classes[] = $navarrowsclass;
	}

	return $classes;

}



/*-----------------------------------------------------------------------------------*/
// Add standard-blog classes to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_standard_blog_body_class');
function themebeagle_standard_blog_body_class($classes) {

	$blogclass = '';

	if ( (is_home() && tb_option('post_layout') == 'posts_standard') || (is_archive() && tb_option('post_layout_archive') == 'posts_standard' ) || (is_page_template('page-blog-1-column.php')) ) {
		$blogclass = 'standard-blog';
	}

	if ( $blogclass ) {
		$classes[] = $blogclass;
	}

	return $classes;
}

/*-----------------------------------------------------------------------------------*/
// Add body-background pattern class to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_body_bg_pattern_body_class');
function themebeagle_body_bg_pattern_body_class($classes) {

	$bgpattern = '';
	$bgcustom_options = '';
	$bgpattern = tb_option('body_bg_pattern');
	$bgcustom_options = tb_option('custom_bg_on');

	if ( $bgpattern != 'none' && !$bgcustom_options ) {
		$classes[] = $bgpattern;
	}

	return $classes;
}



/*-----------------------------------------------------------------------------------*/
// Custom Styling from Theme Settings
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('wp_head','themebeagle_custom_styling');
function themebeagle_custom_styling() {

	global $post;
	$output = '';

// Site Container Width

	$site_width = tb_option('site_width');

	if ( $site_width ) 
		$output .= '.site-container, .unboxed .site-inner, .unboxed .wrap { max-width:'.$site_width.'px; }' . "\n";

// Header, Site Title & Logo

	$header_height = tb_option('header_height');
	$header_logo = tb_option('header_logo');
	$title_align = tb_option('header_title_align');
	$logo_align = tb_option('logo_align');

	if ( $header_height ) 
		$output .= '.site-header .wrap { height:'.$header_height.'px;}' . "\n";
	if ( $title_align != 'default' ) 
		$output .= '.site-title, .site-description { text-align:'.$title_align.';} .site-branding { width:100%;  }' . "\n";
	if ( $logo_align != 'default' && $header_logo ) 
		$output .= '.site-title, .site-logo { text-align:'.$logo_align.';} .site-branding { width:100%;  }' . "\n";

// Hide Post Meta Border

	$top_postmeta_hide_border = tb_option('top_postmeta_hide_border');
	$bottom_postmeta_hide_border = tb_option('bottom_postmeta_hide_border');

	if ($top_postmeta_hide_border ) 
		$output .= '.entry-header .entry-meta { padding:0; background:transparent; }' . "\n";
	if ($bottom_postmeta_hide_border ) 
		$output .= '.entry-footer .entry-meta { padding:0; background:transparent; }' . "\n";

// Body Background Options

	$bgcolor = tb_option('body_bg_color');
	$bgcustom_options = tb_option('custom_bg_on');

	if ( $bgcolor ) 
		$output .= 'body { background-color:'.$bgcolor.'; }' . "\n";

// Custom Body Background Image

	$bgcustom_url = tb_option('custom_body_bg_image');
	$bgbackstretch = tb_option('backstretch_on');
	$bgposition = tb_option('bg_position');
	$bgrepeat = tb_option('bg_repeat');
	$bgattach = tb_option('bg_attach');
	$bg_custom_image = '';

	if ( $bgcustom_url )
		$bg_custom_image .= 'background-image:url("' . $bgcustom_url . '");';
	if ( $bgposition )
		$bg_custom_image .= 'background-position:' . $bgposition . ';';
	if ( $bgrepeat )
		$bg_custom_image .= 'background-repeat:' . $bgrepeat . ';';
	if ( $bgattach )
		$bg_custom_image .= 'background-attachment:' . $bgattach . ';';

	if ( $bg_custom_image != '' && $bgcustom_options == 1 && $bgbackstretch != 1 )
		$output .= 'body { ' . $bg_custom_image . ' }'. "\n";

// Header Font Styles

	$headerfont = '';
	$googfonts_on = tb_option('use_google_fonts');
	$header_font = tb_option('header_font');
	$header_style = tb_option('header_style');
	$header_weight = tb_option('header_weight');
	$header_size = tb_option('header_size');
	$header_transform = tb_option('header_transform');

	if ( $header_font )
		$headerfont .= 'font-family:"' . $header_font . '";';
	if ( $header_style )
		$headerfont .= 'font-style:' . $header_style . ';';
	if ( $header_weight )
		$headerfont .= 'font-weight:' . $header_weight . ';';
	if ( $header_size )
		$headerfont .= 'font-size:' . $header_size . 'px;';
	if ( $header_transform )
		$headerfont .= 'text-transform:' . $header_transform . ';';

	if ( $googfonts_on && $headerfont )
		$output .= 'h1.site-title { ' . $headerfont . ' }'. "\n";

// Headings Font Styles

	$headingsfont = '';
	$googfonts_on = tb_option('use_google_fonts');
	$headings_font = tb_option('headings_font');
	$headings_style = tb_option('headings_style');
	$headings_weight = tb_option('headings_weight');
	$headings_transform = tb_option('headings_transform');
	$headings_widget_title_size = tb_option('headings_widget_title_size');
	$headings_h1_size = tb_option('headings_h1_size');
	$headings_h2_size = tb_option('headings_h2_size');
	$headings_h3_size = tb_option('headings_h3_size');
	$headings_h4_size = tb_option('headings_h4_size');
	$headings_h5_size = tb_option('headings_h5_size');
	$headings_h6_size = tb_option('headings_h6_size');


	if ( $headings_font )
		$headingsfont .= 'font-family:"' . $headings_font . '";';
	if ( $headings_style )
		$headingsfont .= 'font-style:' . $headings_style . ';';
	if ( $headings_weight )
		$headingsfont .= 'font-weight:' . $headings_weight . ';';
	if ( $headings_transform )
		$headingsfont .= 'text-transform:' . $headings_transform . ';';

	if ( $googfonts_on && $headingsfont )
		$output .= 'h1,h2,h3,h4,h5,h6 { ' . $headingsfont . ' }'. "\n";

	if ( $headings_widget_title_size )
		$output .= '.widgettitle, .widget-title {font-size:' . $headings_widget_title_size . 'px;}'. "\n";
	if ( $headings_h1_size )
		$output .= 'h1 {font-size:' . $headings_h1_size . 'px;}'. "\n";
	if ( $headings_h2_size )
		$output .= 'h2 {font-size:' . $headings_h2_size . 'px;}'. "\n";
	if ( $headings_h3_size )
		$output .= 'h3 {font-size:' . $headings_h3_size . 'px;}'. "\n";
	if ( $headings_h4_size )
		$output .= 'h4 {font-size:' . $headings_h4_size . 'px;}'. "\n";
	if ( $headings_h5_size )
		$output .= 'h5 {font-size:' . $headings_h5_size . 'px;}'. "\n";
	if ( $headings_h6_size )
		$output .= 'h6 {font-size:' . $headings_h6_size . 'px;}'. "\n";

// Body Font Styles

	$bodyfont = '';
	$googfonts_on = tb_option('use_google_fonts');
	$body_font = tb_option('body_font');
	$body_style = tb_option('body_style');
	$body_weight = tb_option('body_weight');
	$body_transform = tb_option('body_transform');
	$body_size = tb_option('body_size');
	$body_line_height = tb_option('body_line_height');

	if ( $body_font )
		$bodyfont .= 'font-family:"' . $body_font . '";';
	if ( $body_style )
		$bodyfont .= 'font-style:' . $body_style . ';';
	if ( $body_weight )
		$bodyfont .= 'font-weight:' . $body_weight . ';';
	if ( $body_size )
		$bodyfont .= 'font-size:' . $body_size . 'px;';
	if ( $body_line_height )
		$bodyfont .= 'line-height:' . $body_line_height . ';';
	if ( $body_transform )
		$bodyfont .= 'text-transform:' . $body_transform . ';';

	if ( $googfonts_on && $bodyfont )
		$output .= 'body { ' . $bodyfont . ' }'. "\n";

// Top Nav Font Styles

	$topnavfont = '';
	$googfonts_on = tb_option('use_google_fonts');
	$topnav_font = tb_option('topnav_font');
	$topnav_style = tb_option('topnav_style');
	$topnav_weight = tb_option('topnav_weight');
	$topnav_transform = tb_option('topnav_transform');
	$topnav_size = tb_option('topnav_size');

	if ( $topnav_font )
		$topnavfont .= 'font-family:"' . $topnav_font . '";';
	if ( $topnav_style )
		$topnavfont .= 'font-style:' . $topnav_style . ';';
	if ( $topnav_weight )
		$topnavfont .= 'font-weight:' . $topnav_weight . ';';
	if ( $topnav_size )
		$topnavfont .= 'font-size:' . $topnav_size . 'px;';
	if ( $topnav_transform )
		$topnavfont .= 'text-transform:' . $topnav_transform . ';';

	if ( $googfonts_on && $topnavfont )
		$output .= '.nav-primary { ' . $topnavfont . ' }'. "\n";

// Heaader Nav Font Styles

	$headernavfont = '';
	$googfonts_on = tb_option('use_google_fonts');
	$headernav_font = tb_option('headernav_font');
	$headernav_style = tb_option('headernav_style');
	$headernav_weight = tb_option('headernav_weight');
	$headernav_transform = tb_option('headernav_transform');
	$headernav_size = tb_option('headernav_size');

	if ( $headernav_font )
		$headernavfont .= 'font-family:"' . $headernav_font . '";';
	if ( $headernav_style )
		$headernavfont .= 'font-style:' . $headernav_style . ';';
	if ( $headernav_weight )
		$headernavfont .= 'font-weight:' . $headernav_weight . ';';
	if ( $headernav_size )
		$headernavfont .= 'font-size:' . $headernav_size . 'px;';
	if ( $headernav_transform )
		$headernavfont .= 'text-transform:' . $headernav_transform . ';';

	if ( $googfonts_on && $headernavfont )
		$output .= '.nav-secondary { ' . $headernavfont . ' }'. "\n";

// Post Meta Font Styles

	$postmetafont = '';
	$googfonts_on = tb_option('use_google_fonts');
	$postmeta_font = tb_option('postmeta_font');
	$postmeta_style = tb_option('postmeta_style');
	$postmeta_weight = tb_option('postmeta_weight');
	$postmeta_transform = tb_option('postmeta_transform');
	$postmeta_size = tb_option('postmeta_size');

	if ( $postmeta_font )
		$postmetafont .= 'font-family:"' . $postmeta_font . '";';
	if ( $postmeta_style )
		$postmetafont .= 'font-style:' . $postmeta_style . ';';
	if ( $postmeta_weight )
		$postmetafont .= 'font-weight:' . $postmeta_weight . ';';
	if ( $postmeta_size )
		$postmetafont .= 'font-size:' . $postmeta_size . 'px;';
	if ( $postmeta_transform )
		$postmetafont .= 'text-transform:' . $postmeta_transform . ';';

	if ( $googfonts_on && $postmetafont )
		$output .= '.comment-metadata,.wp-caption,.wp-caption-text,.entry-caption,.gallery-caption,.entry-media .thumb-caption,.sitemap-entry-meta,.entry-meta { ' . $postmetafont . ' }'. "\n";

// Top Nav Colors

	$topnav_bg = tb_option('topnav_bg_color');
	$topnav_link = tb_option('topnav_link_color'); 
	$topnav_link_hover = tb_option('topnav_link_hover_color'); 
	$topnav_link_current = tb_option('topnav_link_current_color');
	$topnav_icon = tb_option('topnav_icon_color');
	$topnav_drop_border = tb_option('topnav_drop_border_color');

	if ( $topnav_bg ) 
		$output .= '.nav-primary, .nav-primary ul, .nav-primary .nav-menu a, .nav-primary.toggled-on .nav-menu a, .nav-primary.toggled-on .nav-menu ul a { border-color:'.$topnav_drop_border.'; background-color:'.$topnav_bg.'; }' . "\n";
	if ( $topnav_bg ) 
		$output .= '.darkheader .nav-primary, .darkheader .nav-primary ul, .darkheader .nav-primary .nav-menu a, .darkheader .nav-primary.toggled-on .nav-menu a, .darkheader .nav-primary.toggled-on .nav-menu ul a { border-color:'.$topnav_drop_border.' ; background-color:'.$topnav_bg.'; }' . "\n";
	if ( $topnav_link ) 
		$output .= '.nav-primary a { color:'.$topnav_link.'; }' . "\n";
	if ( $topnav_link ) 
		$output .= '.darkheader .nav-primary a { color:'.$topnav_link.'; }' . "\n";
	if ( $topnav_link_hover ) 
		$output .= '.nav-primary a:hover { color:'.$topnav_link_hover.'; }' . "\n";
	if ( $topnav_link_hover ) 
		$output .= '.darkheader .nav-primary a:hover { color:'.$topnav_link_hover.'; }' . "\n";
	if ( $topnav_link_current ) 
		$output .= '.nav-primary .current_page_item > a, .nav-primary .current_page_ancestor > a, .nav-primary .current-menu-item > a, .nav-primary .current-menu-ancestor > a { color:'.$topnav_link_current.'; }' . "\n";
	if ( $topnav_link_current ) 
		$output .= '.darkheader .nav-primary .current_page_item > a, .darkheader .nav-primary .current_page_ancestor > a, .darkheader .nav-primary .current-menu-item > a, .darkheader .nav-primary .current-menu-ancestor > a { color:'.$topnav_link_current.'; }' . "\n";
	if ( $topnav_icon ) 
		$output .= '.nav-primary a.search-button, .nav-primary .menu-toggle, .nav-primary .subicon { color:'.$topnav_icon.'; }' . "\n";
	if ( $topnav_icon ) 
		$output .= '.darkheader .nav-primary a.search-button, .darkheader .nav-primary .menu-toggle, .darkheader .nav-primary .subicon { color:'.$topnav_icon.'; }' . "\n";

// Header Nav Colors

	$headernav_bg = tb_option('headernav_bg_color');
	$headernav_link = tb_option('headernav_link_color'); 
	$headernav_link_hover = tb_option('headernav_link_hover_color'); 
	$headernav_link_current = tb_option('headernav_link_current_color');
	$headernav_icon = tb_option('headernav_icon_color');
	$headernav_drop_border = tb_option('headernav_drop_border_color');

	if ( $headernav_bg ) 
		$output .= '.nav-secondary, .nav-secondary ul, .nav-secondary .nav-menu a, .nav-secondary.toggled-on .nav-menu a, .nav-secondary.toggled-on .nav-menu ul a { border-color:'.$headernav_drop_border.'; background-color:'.$headernav_bg.'; }' . "\n";
	if ( $headernav_bg ) 
		$output .= '.darkheader .nav-secondary, .darkheader .nav-secondary ul, .darkheader .nav-secondary .nav-menu a, .darkheader .nav-secondary.toggled-on .nav-menu a, .darkheader .nav-secondary.toggled-on .nav-menu ul a { border-color:'.$headernav_drop_border.'; background-color:'.$headernav_bg.'; }' . "\n";
	if ( $headernav_link ) 
		$output .= '.nav-secondary a { color:'.$headernav_link.'; }' . "\n";
	if ( $headernav_link ) 
		$output .= '.darkheader .nav-secondary a { color:'.$headernav_link.'; }' . "\n";
	if ( $headernav_link_hover ) 
		$output .= '.nav-secondary a:hover { color:'.$headernav_link_hover.'; }' . "\n";
	if ( $headernav_link_hover ) 
		$output .= '.darkheader .nav-secondary a:hover { color:'.$headernav_link_hover.'; }' . "\n";
	if ( $headernav_link_current ) 
		$output .= '.nav-secondary .current_page_item > a, .nav-secondary .current_page_ancestor > a, .nav-secondary .current-menu-item > a, .nav-secondary .current-menu-ancestor > a { color:'.$headernav_link_current.'; }' . "\n";
	if ( $headernav_link_current ) 
		$output .= '.darkheader .nav-secondary .current_page_item > a, .darkheader .nav-secondary .current_page_ancestor > a, .darkheader .nav-secondary .current-menu-item > a, .darkheader .nav-secondary .current-menu-ancestor > a { color:'.$headernav_link_current.'; }' . "\n";
	if ( $headernav_icon ) 
		$output .= '.nav-secondary a.search-button, .nav-secondary .menu-toggle, .nav-secondary .subicon { color:'.$headernav_icon.'; }' . "\n";
	if ( $headernav_icon ) 
		$output .= '.darkheader .nav-secondary a.search-button, .darkheader .nav-secondary .menu-toggle, .darkheader .nav-secondary .subicon { color:'.$headernav_icon.'; }' . "\n";

// Fixed Nav Colors

	$fixednav_bg = tb_option('fixednav_bg_color');
	$fixednav_link = tb_option('fixednav_link_color'); 
	$fixednav_link_hover = tb_option('fixednav_link_hover_color'); 
	$fixednav_link_current = tb_option('fixednav_link_current_color');
	$fixednav_icon = tb_option('fixednav_icon_color');
	$fixednav_drop_border = tb_option('fixednav_drop_border_color');

	if ( $fixednav_bg ) 
		$output .= '.nav-fixed, .nav-fixed ul, .nav-fixed .nav-menu a, .nav-fixed.toggled-on .nav-menu a, .nav-fixed.toggled-on .nav-menu ul a { border-color:'.$fixednav_drop_border.'; background-color:'.$fixednav_bg.'; }' . "\n";
	if ( $fixednav_bg ) 
		$output .= '.darkheader .nav-fixed, .darkheader .nav-fixed ul, .darkheader .nav-fixed .nav-menu a, .darkheader .nav-fixed.toggled-on .nav-menu a, .darkheader .nav-fixed.toggled-on .nav-menu ul a { border-color:'.$fixednav_drop_border.'; background-color:'.$fixednav_bg.'; }' . "\n";
	if ( $fixednav_link ) 
		$output .= '.nav-fixed a { color:'.$fixednav_link.'; }' . "\n";
	if ( $fixednav_link ) 
		$output .= '.darkheader .nav-fixed a { color:'.$fixednav_link.'; }' . "\n";
	if ( $fixednav_link_hover ) 
		$output .= '.nav-fixed a:hover { color:'.$fixednav_link_hover.'; }' . "\n";
	if ( $fixednav_link_hover ) 
		$output .= '.darkheader .nav-fixed a:hover { color:'.$fixednav_link_hover.'; }' . "\n";
	if ( $fixednav_link_current ) 
		$output .= '.nav-fixed .current_page_item > a, .nav-fixed .current_page_ancestor > a, .nav-fixed .current-menu-item > a, .nav-fixed .current-menu-ancestor > a { color:'.$fixednav_link_current.'; }' . "\n";
	if ( $fixednav_link_current ) 
		$output .= '.darkheader .nav-fixed .current_page_item > a, .darkheader .nav-fixed .current_page_ancestor > a, .darkheader .nav-fixed .current-menu-item > a, .darkheader .nav-fixed .current-menu-ancestor > a { color:'.$fixednav_link_current.'; }' . "\n";
	if ( $fixednav_icon ) 
		$output .= '.nav-fixed a.search-button, .nav-fixed .menu-toggle, .nav-fixed .subicon { color:'.$fixednav_icon.'; }' . "\n";
	if ( $fixednav_icon ) 
		$output .= '.darkheader .nav-fixed a.search-button, .darkheader .nav-fixed .menu-toggle, .darkheader .nav-fixed .subicon { color:'.$fixednav_icon.'; }' . "\n";

// Header Color Options

	$header_bg_color = tb_option('header_bg_color');
	$header_border_color = tb_option('header_border_color');
	$title_icon_color = tb_option('site_title_icon_color');
	$title_color = tb_option('site_title_color');
	$tagline_color = tb_option('tagline_color');

	if ( $header_bg_color ) 
		$output .= '.site-header { background-color:'.$header_bg_color.' !important;}' . "\n";
	if ( $header_bg_color ) 
		$output .= '.darkheader .site-header { background-color:'.$header_bg_color.' !important;}' . "\n";
	if ( $header_border_color ) 
		$output .= '.site-header { border-color:'.$header_border_color.' !important;}' . "\n";
	if ( $header_border_color ) 
		$output .= '.darkheader .site-header { border-color:'.$header_border_color.' !important;}' . "\n";
	if ( $title_color ) 
		$output .= '.site-title { color:'.$title_color.'!important;}' . "\n";
	if ( $title_color ) 
		$output .= '.darkheader .site-title { color:'.$title_color.'!important;}' . "\n";
	if ( $tagline_color ) 
		$output .= '.site-description { color:'.$tagline_color.'!important;}' . "\n";
	if ( $tagline_color ) 
		$output .= '.darkheader .site-description { color:'.$tagline_color.'!important;}' . "\n";
	if ( $title_icon_color ) 
		$output .= '.site-title i { color:'.$title_icon_color.';}' . "\n";

// Body Color Options

	$body_text_color = tb_option('body_text_color');
	$body_headings_color = tb_option('body_headings_color');
	$body_link_color = tb_option('body_link_color');
	$body_link_hover_color = tb_option('body_link_hover_color');
	$post_title_link_color = tb_option('post_title_link_color');
	$post_title_link_hover_color = tb_option('post_title_link_hover_color');

	if ( $body_text_color ) 
		$output .= '.site-inner { color:'.$body_text_color.'; }' . "\n";
	if ( $body_headings_color ) 
		$output .= '.site-inner h1,.site-inner h2,.site-inner h3,.site-inner h4,.site-inner h5,.site-inner h6 { color:'.$body_headings_color.'; }' . "\n";
	if ( $body_link_color ) 
		$output .= '.site-inner a, .site-inner a:link, .site-inner a:visited { color:'.$body_link_color.'; }' . "\n";
	if ( $body_link_hover_color ) 
		$output .= '.site-inner a:hover, .site-inner a:active, .site-inner a:focus { color:'.$body_link_hover_color.'; }' . "\n";
	if ( $post_title_link_color ) 
		$output .= '.entry-title a, .entry-title a:link, .entry-title a:visited { color:'.$post_title_link_color.'; }' . "\n";
	if ( $post_title_link_hover_color ) 
		$output .= '.entry-title a:hover, .entry-title a:active, .entry-title a:focus { color:'.$post_title_link_hover_color.'; }' . "\n";

// Footer Widgets Color Options

	$footer_widgets_bg_color = tb_option('footer_widgets_bg_color');
	$footer_widgets_border_color = tb_option('footer_widgets_border_color');
	$footer_widgets_text_color = tb_option('footer_widgets_text_color');
	$footer_widgets_headings_color = tb_option('footer_widgets_headings_color');
	$footer_widgets_link_color = tb_option('footer_widgets_link_color');
	$footer_widgets_link_hover_color = tb_option('footer_widgets_link_hover_color');

	if ( $footer_widgets_bg_color ) 
		$output .= '#footer-widgets { background-color:'.$footer_widgets_bg_color.'; }' . "\n";
	if ( $footer_widgets_border_color ) 
		$output .= '#footer-widgets { border-color:'.$footer_widgets_border_color.'; }' . "\n";
	if ( $footer_widgets_text_color ) 
		$output .= '#footer-widgets { color:'.$footer_widgets_text_color.'; }' . "\n";
	if ( $footer_widgets_headings_color ) 
		$output .= '#footer-widgets h1, #footer-widgets h2, footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6 { color:'.$footer_widgets_headings_color.'; }' . "\n";
	if ( $footer_widgets_link_color ) 
		$output .= '#footer-widgets a, #footer-widgets a:link, #footer-widgets a:visited { color:'.$footer_widgets_link_color.'; }' . "\n";
	if ( $footer_widgets_link_hover_color ) 
		$output .= '#footer-widgets a:hover, #footer-widgets a:active, #footer-widgets a:focus { color:'.$footer_widgets_link_hover_color.'; }' . "\n";

// Footer Color Options

	$footer_bg_color = tb_option('footer_bg_color');
	$footer_border_color = tb_option('footer_border_color');
	$footer_text_color = tb_option('footer_text_color');
	$footer_link_color = tb_option('footer_link_color');
	$footer_link_hover_color = tb_option('footer_link_hover_color');
	$footer_icon_color = tb_option('footer_icon_color');

	if ( $footer_bg_color ) 
		$output .= '.site-footer { background-color:'.$footer_bg_color.'; }' . "\n";
	if ( $footer_border_color ) 
		$output .= '.site-footer { border-color:'.$footer_border_color.'; }' . "\n";
	if ( $footer_text_color ) 
		$output .= '.site-footer { color:'.$footer_text_color.'; }' . "\n";
	if ( $footer_link_color ) 
		$output .= '.site-footer a, .site-footer a:link, .site-footer a:visited { color:'.$footer_link_color.'; }' . "\n";
	if ( $footer_link_hover_color ) 
		$output .= '.site-footer a:hover, .site-footer a:active, .site-footer a:focus { color:'.$footer_link_hover_color.'; }' . "\n";
	if ( $footer_icon_color ) 
		$output .= '.site-footer .site-icons a { color:'.$footer_icon_color.' !important; } .site-footer .site-icons a:hover { color:#fff !important }' . "\n";

// Post By Cat Color Options

	$postbycat_bg_color = tb_option('postbycat_bg_color');
	$postbycat_link_color = tb_option('postbycat_link_color');
	$postbycat_border = tb_option('postbycat_border');

	if ( $postbycat_bg_color ) 
		$output .= 'h2.feat-title { background-color:'.$postbycat_bg_color.'; }' . "\n";
	if ( $postbycat_bg_color == '#fff' || $postbycat_bg_color == '#ffffff' ) 
		$output .= 'h2.feat-title { padding:0 0 3px; }' . "\n";
	if ( $postbycat_link_color ) 
		$output .= 'h2.feat-title a, h2.feat-title, h2.feat-title i { color:'.$postbycat_link_color.' !important; }' . "\n";
	if ( $postbycat_border ) 
		$output .= 'h2.feat-title { background-image:url(' . get_template_directory_uri() . '/images/dotted-line.png); background-position:bottom left; background-repeat:repeat-x; }' . "\n";

// Hide Banner Ads on Single Post or Page

	if ( is_singular() && get_post_meta($post->ID, 'tb_hide_ads', true) )
		$output .= '.banner-ad { display:none !important; }' . "\n";

// Hide Post Title or Page Title

	if ( is_single() && get_post_meta($post->ID, 'tb_hide_stuff', true) && in_array('hide_title', get_post_meta($post->ID, 'tb_hide_stuff', true) ) )
		$output .= '.entry-title, .entry-meta { display:none; }' . "\n" . '.entry-footer .entry-meta { display:block; }' . "\n";
	if ( is_page() && get_post_meta($post->ID, 'tb_hide_stuff', true) && in_array('hide_title', get_post_meta($post->ID, 'tb_hide_stuff', true) ) )
		$output .= '.entry-title.page { display:none; }' . "\n";

// Hide Read More Button is Active in Post Meta

	$postmeta = tb_option('bottom_postmeta');
	if ( in_array('read-more', $postmeta) )
		$output .= '.read-more { display:none !important; }' . "\n";

// Post Bottom Widget Area

	$postbottom = '';
	$post_bottom_bg = tb_option('post_bottom_bg');
	$post_bottom_align = tb_option('post_bottom_align');
	$post_bottom_padding = tb_option('post_bottom_padding');
	$post_bottom_border_size = tb_option('post_bottom_border_size');
	$post_bottom_border_color = tb_option('post_bottom_border_color');
	$post_bottom_font_color = tb_option('post_bottom_font_color');
	$post_bottom_link_color = tb_option('post_bottom_link_color');
	$post_bottom_link_hover_color = tb_option('post_bottom_link_hover_color');


	if ( $post_bottom_bg )
		$postbottom .= 'background-color:'.$post_bottom_bg.';';
	if ( $post_bottom_align )
		$postbottom .= 'text-align:'.$post_bottom_align.';';
	if ( $post_bottom_padding )
		$postbottom .= 'padding:'.$post_bottom_padding.'px;';
	if ( $post_bottom_border_size )
		$postbottom .= 'border-style:solid;border-width:'.$post_bottom_border_size.'px;';
	if ( $post_bottom_border_color )
		$postbottom .= 'border-color:'.$post_bottom_border_color.';';
	if ( $post_bottom_font_color )
		$postbottom .= 'color:'.$post_bottom_font_color.' !important;';
	if ( $postbottom )
		$output .= '.single-post-bottom { '.$postbottom.' }'. "\n";

	if ( $post_bottom_link_color )
		$output .= '.single-post-bottom a, .single-post-bottom a:link, .single-post-bottom a:visited { color:'.$post_bottom_link_color.' !important; }' . "\n";
	if ( $post_bottom_link_hover_color )
		$output .= '.single-post-bottom a:hover, .single-post-bottom a:active { color:'.$post_bottom_link_hover_color.' !important; }' . "\n";
	if ( $post_bottom_font_color )
		$output .= '.single-post-bottom .widgettitle { color:'.$post_bottom_font_color.' !important; }' . "\n";

// Custom CSS

	$custom_css = tb_option('custom_css');

	if ($custom_css)
		$output .= $custom_css . "\n";

// Output styles

	if ( $output )
		$output = "\n\n<!-- Custom Styles from Theme Setting Page -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
		echo $output;
}



/*---------------------------------------------------------------------------------------*/
// Font Embed Function for Google Fonts
// @since 1.0
/*---------------------------------------------------------------------------------------*/

// Here we populate the font face
$header_font = tb_option('header_font');
$header_weight = tb_option('header_weight');
$header_style = tb_option('header_style');
$headings_font = tb_option('headings_font');
$headings_weight = tb_option('headings_weight');
$headings_style = tb_option('headings_style');
$body_font = tb_option('body_font');
$body_weight = tb_option('body_weight');
$body_style = tb_option('body_style');
$topnav_font = tb_option('topnav_font');
$topnav_weight = tb_option('topnav_weight');
$topnav_style = tb_option('topnav_style');
$headernav_font = tb_option('headernav_font');
$headernav_weight = tb_option('headernav_weight');
$headernav_style = tb_option('headernav_style');
$postmeta_font = tb_option('postmeta_font');
$postmeta_weight = tb_option('postmeta_weight');
$postmeta_style = tb_option('postmeta_style');

// Add the font to the helper class
VP_Site_GoogleWebFont::instance()->add($header_font, $header_weight, $header_style);
VP_Site_GoogleWebFont::instance()->add($headings_font, $headings_weight, $headings_style);
VP_Site_GoogleWebFont::instance()->add($body_font, $body_weight, $body_style);
VP_Site_GoogleWebFont::instance()->add($topnav_font, $topnav_weight, $topnav_style);
VP_Site_GoogleWebFont::instance()->add($headernav_font, $headernav_weight, $headernav_style);
VP_Site_GoogleWebFont::instance()->add($postmeta_font, $postmeta_weight, $postmeta_style);

add_action('wp_enqueue_scripts', 'tb_embed_fonts');
function tb_embed_fonts() {
	if ( tb_option('use_google_fonts') ) {
		VP_Site_GoogleWebFont::instance()->register_and_enqueue();
	}
}



/*---------------------------------------------------------------------------------------*/
// Javascript for Backstretch Body Background Image
// @since 1.0
/*---------------------------------------------------------------------------------------*/

if ( !is_admin() ) { add_action('wp_footer', 'themebeagle_backstretch', 99); }
function themebeagle_backstretch() {

	$bgimage = tb_option('body_bg_image');
	$bgimage_url = get_template_directory_uri().'/images/'.$bgimage.'.jpg';
	$bgcustom_options = tb_option('custom_bg_on');
	$bgbackstretch = tb_option('backstretch_on');
	$bgbackstretch_pos_x = tb_option('backstretch_pos_x');
	$bgbackstretch_pos_y = tb_option('backstretch_pos_y');
	$bg_custom_backstretch_url = tb_option('custom_body_bg_image');

	if ( $bgimage != 'none' && !$bgcustom_options && !is_page_template('page-landing.php') ) { ?>

		<!-- Backstretch JS -->
		<script type="text/javascript">
			jQuery.anystretch("<?php echo $bgimage_url; ?>",{positionX:"<?php echo $bgbackstretch_pos_x; ?>",positionY:"<?php echo $bgbackstretch_pos_y; ?>",speed:500});
		</script>

	<?php }

	if ( $bgcustom_options && $bgbackstretch && !is_page_template('page-landing.php') ) { ?>

		<!-- Backstretch JS -->
		<script type="text/javascript">
			jQuery.anystretch("<?php echo $bg_custom_backstretch_url; ?>",{positionX:"<?php echo $bgbackstretch_pos_x; ?>",positionY:"<?php echo $bgbackstretch_pos_y; ?>",speed: 500});
		</script>

	<?php }
}

?>