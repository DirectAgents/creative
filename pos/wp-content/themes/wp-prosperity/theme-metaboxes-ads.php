<?php

// Begin Ad Mangement Theme Metaboxes Array

return array(

/*-----------------------------------------------------------------------------------*/
// Ad Management
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'manage_ads',
		'label' => __('Manage Advertisements for this Page', 'themebeagle'),
		'description' => __('Check the box to override the ad management settings entered on the Theme Settings page.', 'themebeagle'),
		'default' => '',
	),
	array(
		'type' => 'toggle',
		'name' => 'hide_ads',
		'label' => __('Hide All Ads', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_ads',
			'function' => 'tb_is_manage_ads',
		),
		'description' => __('Check the box to hide All Ads on the Post/Page.', 'themebeagle'),
		'default' => '',
	),
	array(
		'type' => 'textarea',
		'name' => 'ad_header_code',
		'label' => __('Header Ad Code', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_ads',
			'function' => 'tb_is_manage_ads',
		),
		'description' => __('Enter the HTML code for the ad on this Post/Page. You may also use Google Adsense or shortcodes.', 'themebeagle'),
	),
	array(
		'type' => 'textarea',
		'name' => 'ad_content_top_code',
		'label' => __('Top Content Ad Code', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_ads',
			'function' => 'tb_is_manage_ads',
		),
		'description' => __('Enter the HTML code for the ad on this Post/Page. You may also use Google Adsense or shortcodes.', 'themebeagle'),
	),

	array(
		'type' => 'textarea',
		'name' => 'ad_content_bottom_code',
		'label' => __('Bottom Content Ad Code', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_ads',
			'function' => 'tb_is_manage_ads',
		),
		'description' => __('Enter the HTML code for the ad on this Post/Page. You may also use Google Adsense or shortcodes.', 'themebeagle'),
	),
	array(
		'type' => 'textarea',
		'name' => 'ad_below_header_code',
		'label' => __('Below Header Ad Code', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_ads',
			'function' => 'tb_is_manage_ads',
		),
		'description' => __('Enter the HTML code for the ad on this Post/Page. You may also use Google Adsense or shortcodes.', 'themebeagle'),
	),
	array(
		'type' => 'textarea',
		'name' => 'ad_above_footer_code',
		'label' => __('Above Footer Ad Code', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_ads',
			'function' => 'tb_is_manage_ads',
		),
		'description' => __('Enter the HTML code for the ad on this Post/Page. You may also use Google Adsense or shortcodes.', 'themebeagle'),
	),
	array(
		'type' => 'textarea',
		'name' => 'ad_below_post_code',
		'label' => __('Below Post Footer Ad Code', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_ads',
			'function' => 'tb_is_manage_ads',
		),
		'description' => __('Enter the HTML code for the ad on this Post/Page. You may also use Google Adsense or shortcodes.', 'themebeagle'),
	),

);

/**
 * EOF
 */