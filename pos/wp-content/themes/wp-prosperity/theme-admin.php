<?php

// require VafPress
require_once('vafpress-framework/bootstrap.php');

define('TB_ADMIN', get_template_directory() . '/admin');
define('TB_ADMIN_URI', get_template_directory_uri() . '/admin');

// Path to theme-options template array file
$theme_options_array = locate_template('theme-options.php', true, true);

// Initialize the Theme Options object
$theme_options = new VP_Option(array(
	'is_dev_mode' 	=> false,
	'option_key' 	=> 'tb_options',
	'page_slug'	=> 'theme_settings',
	'template'	=> $theme_options_array,
	'menu_page' 	=> array(
		'position' => '59.9'
	),
	'minimum_role'	=> 'edit_theme_options',
	'layout'	=> 'fluid',
	'page_title'	=> __( 'Theme Settings Page', 'themebeagle' ),
	'menu_label'	=> __( 'Theme Settings', 'themebeagle' ),
));

if ( tb_option('allow_ad_manage') ) {
	// Path to theme-metaboxes template array file
	$theme_metabox_ads_array  = locate_template('theme-metaboxes-ads.php', true, true);
	// Initialize Ad Management Metabox object
	$theme_metaboxes_ads = new VP_Metabox(array(
		'id'		=> 'themebeagle_meta_boxes_ads',
		'types'		=> array('post','page'),
		'title'		=> __('WP-Prosperity Ad Management Options', 'themebeagle'),
		'priority'	=> 'high',
		'template'	=> $theme_metabox_ads_array,
		'mode'		=> WPALCHEMY_MODE_EXTRACT,
		'prefix'	=> 'tb_'
	));
}

// Path to theme-metaboxes template array file for Posts
$theme_metabox_array  = locate_template('theme-metaboxes.php', true, true);

// Initialize Main Theme Metabox object
$theme_metaboxes = new VP_Metabox(array(
	'id'		=> 'themebeagle_meta_boxes',
	'types'		=> array('post'),
	'title'		=> __('WP-Prosperity Post Options', 'themebeagle'),
	'priority'	=> 'high',
	'template'	=> $theme_metabox_array,
	'mode'		=> WPALCHEMY_MODE_EXTRACT,
	'prefix'	=> 'tb_'
));


// Path to theme-metaboxes template array file for Pages
$theme_metabox_array_page  = locate_template('theme-metaboxes-page.php', true, true);

// Initialize Main Theme Metabox object
$theme_metaboxes_page = new VP_Metabox(array(
	'id'		=> 'themebeagle_meta_boxes_page',
	'types'		=> array('page'),
	'title'		=> __('WP-Prosperity Page Options', 'themebeagle'),
	'priority'	=> 'high',
	'template'	=> $theme_metabox_array_page,
	'mode'		=> WPALCHEMY_MODE_EXTRACT,
	'prefix'	=> 'tb_'
));

global $tb_options;
$tb_options = get_option('tb_options');

// function to retrieve theme option values via tb_option("option_name").
function tb_option($key) {
	return vp_option( 'tb_options.' . $key );
}

// require theme options data sources file
locate_template('theme-sources.php', true, true );

// Load custom CSS for Theme Settings page
add_action( 'admin_enqueue_scripts', 'tb_settings_css' );
function tb_settings_css() {
	if (strpos($_SERVER['REQUEST_URI'], 'admin.php?page=theme_settings') !== false) {
		wp_enqueue_style( 'theme_settings', TB_ADMIN_URI . '/theme-settings.css', array(), '1.0' );
	}
}


/*
 * EOF
 */