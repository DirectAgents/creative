<?php

// Begin Page Metaboxes Array

return array(

/*-----------------------------------------------------------------------------------*/
// Page Layout
/*-----------------------------------------------------------------------------------*/
	array(
		'type' => 'radioimage',
		'name' => 'page_layout',
		'label' => __('Page Layout', 'themebeagle'),
		'description' => __('Select your preferred layout for this Page.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'default',
				'label' => __('Default to Theme Settings', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/default-settings.jpg',
			),
			array(
				'value' => 'c-sw',
				'label' => __('Content | Sidebar-Wide', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/c-sw.jpg',
			),
			array(
				'value' => 'sw-c',
				'label' => __('Sidebar-Wide | Content', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sw-c.jpg',
			),
			array(
				'value' => 'c-sn',
				'label' => __('Content | Sidebar-Narrow', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/c-sn.jpg',
			),
			array(
				'value' => 'sn-c',
				'label' => __('Sidebar-Narrow | Content', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sn-c.jpg',
			),
			array(
				'value' => 'c-sn-sw',
				'label' => __('Content | Sidebar-Narrow | Sidebar-Wide', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/c-sn-sw.jpg',
			),
			array(
				'value' => 'sn-c-sw',
				'label' => __('Sidebar-Narrow | Content | Sidebar-Wide', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sn-c-sw.jpg',
			),
			array(
				'value' => 'sw-c-sn',
				'label' => __('Sidebar-Wide | Content | Sidebar-Narrow', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sw-c-sn.jpg',
			),
			array(
				'value' => 'sw-sn-c',
				'label' => __('Sidebar-Wide | Sidebar-Narrow | Content', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sw-sn-c.jpg',
			),
			array(
				'value' => 'fw',
				'label' => __('Content Only', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/fw.jpg',
			)
		),
		'default' => 'default',
	),

/*-----------------------------------------------------------------------------------*/
// Hide Stuff
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'checkbox',
		'name' => 'hide_stuff',
		'label' => __('General Page Settings', 'themebeagle'),
		'description' => __('Make your selections as needed for this Page.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'hide_title',
				'label' => __('Hide Page Title', 'themebeagle'),
			),
			array(
				'value' => 'hide_thumb',
				'label' => __('Hide Thumbnail/Featured Image', 'themebeagle'),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// WordPress Gallery
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'default_gallery',
		'label' => __('Show Standard WordPress Gallery Instead of Gallery Slider', 'themebeagle'),
		'description' => __('', 'themebeagle'),
		'default' => '',
	),

/*-----------------------------------------------------------------------------------*/
// Thumbnail Alignment
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'radiobutton',
		'name' => 'thumb_align',
		'label' => __('Thumbnail/Featured Image Alignment', 'themebeagle'),
		'description' => __('For "Blog - 1 Column" page template only. Select where you would like the image to be aligned.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'default',
				'label' => __('Use Theme Settings', 'themebeagle'),
			),
			array(
				'value' => 'left',
				'label' => __('Left (Medium Image)', 'themebeagle'),
			),
			array(
				'value' => 'right',
				'label' => __('Right (Medium Image)', 'themebeagle'),
			),
			array(
				'value' => 'top',
				'label' => __('Top (Large Image)', 'themebeagle'),
			),
		),
		'default' => 'default',
	),

/*-----------------------------------------------------------------------------------*/
// Category Selector
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'multiselect',
		'name' => 'cats',
		'label' => __('Category Selector', 'themebeagle'),
		'description' => __('If using a Portfolio or Blog page template, select the categories you would like to display.', 'themebeagle'),
		'items' => array(
			'data' => array(
				array(
					'source' => 'function',
					'value' => 'vp_get_categories',
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// Add Featured Posts
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'featured_slider',
		'label' => __('Display Featured Posts Slider', 'themebeagle'),
		'description' => __('Check the box to display the Featured Posts slider at the top of this Page.', 'themebeagle'),
		'default' => '',
	),
	array(
		'type' => 'radioimage',
		'name' => 'featured_slider_type',
		'label' => __('Select Slider', 'themebeagle'),
		'dependency' => array(
			'field' => 'featured_slider',
			'function' => 'tb_is_featured_slider',
		),
		'description' => __('Select which slider to add.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'narrow-slider',
				'label' => __('Narrow Featured Posts Slider', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/feature.jpg',
			),
			array(
				'value' => 'wide-slider',
				'label' => __('Wide Featured Posts Slider', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/feature-wide.jpg',
			),
		),
		'default' => '',
	),

/*-----------------------------------------------------------------------------------*/
// Add Featured Pages
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'featured_pages',
		'label' => __('Display Featured Pages Slider', 'themebeagle'),
		'description' => __('Check the box to display the Featured Pages slider at the top of this Page.', 'themebeagle'),
		'default' => '',
	),

/*-----------------------------------------------------------------------------------*/
// Featured Pages Selector
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'sorter',
		'name' => 'featured_pages_ids',
		'label' => __('Featured Pages Selector', 'themebeagle'),
		'description' => __('Select the Pages you would like to feature, and arrange the order as you like. You may also use settings from the Theme Settings page, in which case, you should leave this field blank.', 'themebeagle'),
		'items' => array(
			'data' => array(
				array(
					'source' => 'function',
					'value' => 'vp_get_pages',
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// Video Embed
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'textarea',
		'name' => 'video_embed',
		'label' => __('Featured Video Embed Code', 'themebeagle'),
		'description' => __('Enter the video embed code for a featured video.', 'themebeagle'),
	),

);

/**
 * EOF
 */