<?php

// Page Layout Options Array
$layout_options = array(
	array(
		'value' => 'default',
		'label' => __('Default Site-Wide Page Layout', 'themebeagle'),
		'img' => TB_ADMIN_URI . '/img/default-layout.jpg',
	),
	array(
		'value' => 'c-sw',
		'label' => __('Content | Sidebar-Wide', 'themebeagle'),
		'img' => TB_ADMIN_URI . '/img/c-sw.jpg',
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
		'value' => 'sw-c',
		'label' => __('Sidebar-Wide | Content', 'themebeagle'),
		'img' => TB_ADMIN_URI . '/img/sw-c.jpg',
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
);

// Default Page Layout
$default_layout = array(
	'value' => 'default',
);

// Begin Main Theme Settings Array
return array(
	'title' => __('Theme Settings Page', 'themebeagle'),
	'page' => __('Theme Settings Page', 'themebeagle'),
	'logo' => TB_ADMIN_URI . '/img/wp-pro-logo.png',
	'menus' => array(

/*-----------------------------------------------------------------------------------*/
// Basic Site Settings
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('General Site Settings', 'themebeagle'),
			'name' => 'basic_site_settings',
			'icon' => 'font-awesome:fa-gear',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'unboxed',
							'label' => __('Use Wide/Unboxed Layout Option ', 'themebeagle'),
							'description' => __('Select "On" to use the Wide/Unboxed site layout.', 'themebeagle'),
							'default' => '0',
						),
 						array(
							'type' => 'slider',
							'name' => 'site_width',
							'label' => __('Site Container Width', 'themebeagle'),
							'description' => __('Set the size (in pixels) of main site container (default: 1280).', 'themebeagle'),
							'min' => '400',
							'max' => '2000',
							'step' => '10',
							'default' => '1280',
						),
						array(
							'type' => 'toggle',
							'name' => 'footer_widgets',
							'label' => __('Footer Widgets', 'themebeagle'),
							'description' => __('Footer Widgets are "On" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'upload',
							'name' => 'favicon_url',
							'label' => __('Favicon/Shortcut Icon', 'themebeagle'),
							'description' => __('Upload an image to serve as your site <a href="http://codex.wordpress.org/Creating_a_Favicon" target="blank">Favicon</a>.', 'themebeagle'),
							'default' => '',
						),
 						array(
							'type' => 'slider',
							'name' => 'comments_gravsize',
							'label' => __('Size of Comments Gravatar', 'themebeagle'),
							'description' => __('Set the size (in pixels) of the Gravatar used in post comments.', 'themebeagle'),
							'min' => '12',
							'max' => '300',
							'step' => '1',
							'default' => '60',
						),
 						array(
							'type' => 'slider',
							'name' => 'author_gravsize',
							'label' => __('Size of Author Bio Gravatar', 'themebeagle'),
							'description' => __('Set the size (in pixels) of the Gravatar used in the author bio box.', 'themebeagle'),
							'min' => '12',
							'max' => '300',
							'step' => '1',
							'default' => '120',
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Page Layout Options
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Page Layout Options', 'themebeagle'),
			'name' => 'default_page_layouts',
			'icon' => 'font-awesome:fa-columns',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Page Layouts', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'radioimage',
							'name' => 'default_layout',
							'label' => __('Default Site-Wide Page Layout', 'themebeagle'),
							'description' => __('Select your site-wide page layout. Layout can also be changed on individual Pages and Posts.', 'themebeagle'),
							'items' => array(
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
							'default' => 'c-sw',
						),
						array(
							'type' => 'radioimage',
							'name' => 'home_layout',
							'label' => __('Home Page Layout', 'themebeagle'),
							'description' => __('Select your Home page layout. Layout can also be changed on individual Pages and Posts.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),
						array(
							'type' => 'radioimage',
							'name' => 'archive_layout',
							'label' => __('Archive Page Layout', 'themebeagle'),
							'description' => __('Select the layout for Category, Tag, Author and Date based archive pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),
						array(
							'type' => 'radioimage',
							'name' => 'single_layout',
							'label' => __('Single Post Layout', 'themebeagle'),
							'description' => __('Select the layout for single Post pages. Layout can also be changed on individual Posts.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),
						array(
							'type' => 'radioimage',
							'name' => 'page_layout',
							'label' => __('Single Page Layout', 'themebeagle'),
							'description' => __('Select the layout for Pages. Layout can also be changed on individual Pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),
						array(
							'type' => 'radioimage',
							'name' => '404_layout',
							'label' => __('404 Error Page Layout', 'themebeagle'),
							'description' => __('Select the layout for your 404 Page. Layout can also be changed on individual Pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => 'fw',
						),
						array(
							'type' => 'radioimage',
							'name' => 'bbpress_layout',
							'label' => __('bbPress Page Layout', 'themebeagle'),
							'description' => __('Select the layout for bbPress Pages. Layout CANNOT be changed on individual Pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),

						array(
							'type' => 'radioimage',
							'name' => 'woo_shop_layout',
							'label' => __('WooCommerce Shop Page Layout', 'themebeagle'),
							'description' => __('Select the layout for the WooCommerce Shop page. Layout CANNOT be changed on individual Pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),

						array(
							'type' => 'radioimage',
							'name' => 'woo_product_layout',
							'label' => __('WooCommerce Single Product Page Layout', 'themebeagle'),
							'description' => __('Select the layout for the WooCommerce Single Product pages. Layout CANNOT be changed on individual Pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),

						array(
							'type' => 'radioimage',
							'name' => 'woo_cart_layout',
							'label' => __('WooCommerce Cart Page Layout', 'themebeagle'),
							'description' => __('Select the layout for the WooCommerce Cart page. Layout CANNOT be changed on individual Pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),

						array(
							'type' => 'radioimage',
							'name' => 'woo_checkout_layout',
							'label' => __('WooCommerce Checkout Page Layout', 'themebeagle'),
							'description' => __('Select the layout for the WooCommerce Checkout page. Layout CANNOT be changed on individual Pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),

						array(
							'type' => 'radioimage',
							'name' => 'woo_account_layout',
							'label' => __('WooCommerce Customer Account Page Layout', 'themebeagle'),
							'description' => __('Select the layout for the WooCommerce Customer Account pages. Layout CANNOT be changed on individual Pages.', 'themebeagle'),
							'items' => $layout_options,
							'default' => $default_layout,
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Body Background
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Body Background', 'themebeagle'),
			'name' => 'default_body_bg',
			'icon' => 'font-awesome:fa-picture-o',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Body Background Options', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'body_bg_color',
							'label' => __('Body Background Color ', 'themebeagle'),
							'description' => __('Click in field to activate Color Picker.', 'themebeagle'),
							'default' => '#dddddd',
						),
						array(
							'type' => 'radioimage',
							'name' => 'body_bg_pattern',
							'label' => __('Select Body Background Pattern', 'themebeagle'),
							'description' => __('Click the image to make your selection.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('No Pattern', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/none.jpg',
								),
								array(
									'value' => 'pattern1',
									'label' => __('Pattern 1', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern1-30x30.jpg',
								),
								array(
									'value' => 'pattern2',
									'label' => __('Pattern 2', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern2-30x30.jpg',
								),
								array(
									'value' => 'pattern3',
									'label' => __('Pattern 3', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern3-30x30.jpg',
								),
								array(
									'value' => 'pattern4',
									'label' => __('Pattern 4', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern4-30x30.jpg',
								),
								array(
									'value' => 'pattern5',
									'label' => __('Pattern 5', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern5-30x30.jpg',
								),
								array(
									'value' => 'pattern6',
									'label' => __('Pattern 6', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern6-30x30.jpg',
								),
								array(
									'value' => 'pattern7',
									'label' => __('Pattern 7', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern7-30x30.jpg',
								),
								array(
									'value' => 'pattern8',
									'label' => __('Pattern 8', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern8-30x30.jpg',
								),
								array(
									'value' => 'pattern9',
									'label' => __('Pattern 9', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern9-30x30.jpg',
								),
								array(
									'value' => 'pattern10',
									'label' => __('Pattern 10', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern10-30x30.jpg',
								),
								array(
									'value' => 'pattern11',
									'label' => __('Pattern 11', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern11-30x30.jpg',
								),
								array(
									'value' => 'pattern12',
									'label' => __('Pattern 12', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern12-30x30.jpg',
								),
								array(
									'value' => 'pattern13',
									'label' => __('Pattern 13', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern13-30x30.jpg',
								),
								array(
									'value' => 'pattern14',
									'label' => __('Pattern 14', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern14-30x30.jpg',
								),
								array(
									'value' => 'pattern15',
									'label' => __('Pattern 15', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern15-30x30.jpg',
								),
								array(
									'value' => 'pattern16',
									'label' => __('Pattern 16', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern16-30x30.jpg',
								),
								array(
									'value' => 'pattern17',
									'label' => __('Pattern 17', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern17-30x30.jpg',
								),
								array(
									'value' => 'pattern18',
									'label' => __('Pattern 18', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern18-30x30.jpg',
								),
								array(
									'value' => 'pattern19',
									'label' => __('Pattern 19', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern19-30x30.jpg',
								),
								array(
									'value' => 'pattern20',
									'label' => __('Pattern 20', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern20-30x30.jpg',
								),
								array(
									'value' => 'pattern21',
									'label' => __('Pattern 21', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern21-30x30.jpg',
								),
								array(
									'value' => 'pattern22',
									'label' => __('Pattern 22', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern22-30x30.jpg',
								),
								array(
									'value' => 'pattern23',
									'label' => __('Pattern 23', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern23-30x30.jpg',
								),
								array(
									'value' => 'pattern24',
									'label' => __('Pattern 24', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern24-30x30.jpg',
								),
								array(
									'value' => 'pattern25',
									'label' => __('Pattern 25', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern25-30x30.jpg',
								),
								array(
									'value' => 'pattern26',
									'label' => __('Pattern 26', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern26-30x30.jpg',
								),
								array(
									'value' => 'pattern27',
									'label' => __('Pattern 27', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/pattern27-30x30.jpg',
								),
							),
							'default' => array(
								'pattern1',
							),
						),
						array(
							'type' => 'radioimage',
							'name' => 'body_bg_image',
							'label' => __('Select Body Background Image', 'themebeagle'),
							'description' => __('Click the image to make your selection.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('No Image', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/none.jpg',
								),
								array(
									'value' => 'bg1',
									'label' => __('Image 1', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg1-30x30.jpg',
								),
								array(
									'value' => 'bg2',
									'label' => __('Image 2', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg2-30x30.jpg',
								),
								array(
									'value' => 'bg3',
									'label' => __('Image 3', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg3-30x30.jpg',
								),
								array(
									'value' => 'bg4',
									'label' => __('Image 4', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg4-30x30.jpg',
								),
								array(
									'value' => 'bg5',
									'label' => __('Image 5', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg5-30x30.jpg',
								),
								array(
									'value' => 'bg6',
									'label' => __('Image 6', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg6-30x30.jpg',
								),
								array(
									'value' => 'bg7',
									'label' => __('Image 7', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg7-30x30.jpg',
								),
								array(
									'value' => 'bg8',
									'label' => __('Image 8', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg8-30x30.jpg',
								),
								array(
									'value' => 'bg9',
									'label' => __('Image 9', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg9-30x30.jpg',
								),
								array(
									'value' => 'bg10',
									'label' => __('Image 10', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg10-30x30.jpg',
								),
								array(
									'value' => 'bg11',
									'label' => __('Image 11', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg11-30x30.jpg',
								),
								array(
									'value' => 'bg12',
									'label' => __('Image 12', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg12-30x30.jpg',
								),
								array(
									'value' => 'bg13',
									'label' => __('Image 13', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg13-30x30.jpg',
								),
								array(
									'value' => 'bg14',
									'label' => __('Image 14', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg14-30x30.jpg',
								),
								array(
									'value' => 'bg15',
									'label' => __('Image 15', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg15-30x30.jpg',
								),
								array(
									'value' => 'bg16',
									'label' => __('Image 16', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg16-30x30.jpg',
								),
								array(
									'value' => 'bg17',
									'label' => __('Image 17', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg17-30x30.jpg',
								),
								array(
									'value' => 'bg18',
									'label' => __('Image 18', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg18-30x30.jpg',
								),
								array(
									'value' => 'bg19',
									'label' => __('Image 19', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg19-30x30.jpg',
								),
								array(
									'value' => 'bg20',
									'label' => __('Image 20', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/bg20-30x30.jpg',
								),
							),
							'default' => array(
								'bg1',
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Custom Body Background Image', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'custom_bg_on',
							'label' => __('Use Custom Body Background Image', 'themebeagle'),
							'description' => __('Select "On" to use your own custom body background image', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'upload',
							'name' => 'custom_body_bg_image',
							'label' => __('Upload Custom Body Background Image', 'themebeagle'),
							'description' => __('Upload image or enter image URL.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'bg_position',
							'label' => __('Background Position', 'themebeagle'),
							'description' => __('Enter the position of your image on the X and Y axis (<a href="http://www.w3schools.com/cssref/pr_background-position.asp" target="blank">more info</a>).', 'themebeagle'),
							'default' => 'top left',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'bg_repeat',
							'label' => __('Background Repeat', 'themebeagle'),
							'description' => __('Select the background repeat property (<a href="http://www.w3schools.com/cssref/pr_background-repeat.asp" target="blank">more info</a>).', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'repeat',
									'label' => __('Repeat', 'themebeagle'),
								),
								array(
									'value' => 'no-repeat',
									'label' => __('No Repeat', 'themebeagle'),
								),
								array(
									'value' => 'repeat-x',
									'label' => __('Repeat-X', 'themebeagle'),
								),
								array(
									'value' => 'repeat-y',
									'label' => __('Repeat-Y', 'themebeagle'),
								),
							),
							'default' => array(
								'repeat',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'bg_attach',
							'label' => __('Background Attachment', 'themebeagle'),
							'description' => __('Select the background attachment property (<a href="http://www.w3schools.com/cssref/pr_background-attachment.asp" target="blank">more info</a>).', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'fixed',
									'label' => __('Fixed', 'themebeagle'),
								),
								array(
									'value' => 'scroll',
									'label' => __('Scroll', 'themebeagle'),
								),
							),
							'default' => array(
								'fixed',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'backstretch_on',
							'label' => __('Use jQuery Backstretch Function', 'themebeagle'),
							'description' => __('Select "On" stretch your image the full width and height of the screen.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'backstretch_pos_x',
							'label' => __('Backstretch Position X', 'themebeagle'),
							'description' => __('Position image along horizontal axis.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'left',
									'label' => __('Left', 'themebeagle'),
								),
								array(
									'value' => 'center',
									'label' => __('Center', 'themebeagle'),
								),
								array(
									'value' => 'right',
									'label' => __('Right', 'themebeagle'),
								),
							),
							'default' => array(
								'center',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'backstretch_pos_y',
							'label' => __('Backstretch Position Y', 'themebeagle'),
							'description' => __('Position image along vertical axis.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'top',
									'label' => __('Top', 'themebeagle'),
								),
								array(
									'value' => 'center',
									'label' => __('Center', 'themebeagle'),
								),
								array(
									'value' => 'bottom',
									'label' => __('Bottom', 'themebeagle'),
								),
							),
							'default' => array(
								'bottom',
							),
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Social Media Contact Links
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Social Media Links', 'themebeagle'),
			'name' => 'social_media_contact_links',
			'icon' => 'font-awesome:fa-twitter',
			'controls' => array(
				array(
					'type' => 'notebox',
					'name' => 'social_media_note',
					'label' => __('Theme Settings Tip', 'themebeagle'),
					'description' => __('The following links will serve as the site-wide, social media contact links. Individual authors may also enter their own social media links on their respective user profile page.', 'themebeagle'),
					'status' => 'normal',
				),
				array(
					'type' => 'section',
					'title' => __('General Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'show_icons',
							'label' => __('Select Where to Display Site-Wide Social Media Icons', 'themebeagle'),
							'description' => __('You may display the site-wide social media icons in widgetized areas, as well as any of the areas you select here.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'icons_topnav',
									'label' => __('Top Navigation Bar', 'themebeagle'),
								),
								array(
									'value' => 'icons_secnav',
									'label' => __('Secondary Navigation Bar', 'themebeagle'),
								),
								array(
									'value' => 'icons_fixednav',
									'label' => __('Fixed Navigation Bar', 'themebeagle'),
								),
								array(
									'value' => 'icons_footer',
									'label' => __('Page Footer', 'themebeagle'),
								),
							),
							'default' => 'icons_topnav',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Twitter', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'twitter_url',
							'label' => __('Twitter URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Twitter profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter_link_text',
							'label' => __('Twitter Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Twitter link text.', 'themebeagle'),
							'default' => __('Connect on Twitter', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Facebook', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'facebook_url',
							'label' => __('Facebook URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Facebook profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'facebook_link_text',
							'label' => __('Facebook Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Facebook link text.', 'themebeagle'),
							'default' => __('Connect on Facebook', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Google+', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'google_url',
							'label' => __('Google+ URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Google+ profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'google_link_text',
							'label' => __('Google+ Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Google+ link text.', 'themebeagle'),
							'default' => __('Connect on Google+', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('LinkedIn', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'linkedin_url',
							'label' => __('LinkedIn URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your LinkedIn profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'linkedin_link_text',
							'label' => __('LinkedIn Link Text', 'themebeagle'),
							'description' => __('Enter your preferred LinkedIn link text.', 'themebeagle'),
							'default' => __('Connect on LinkedIn', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Instagram', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'instagram_url',
							'label' => __('Instagram URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Instagram profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'instagram_link_text',
							'label' => __('Instagram Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Instagram link text.', 'themebeagle'),
							'default' => __('Connect on Instagram', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Pinterest', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'pinterest_url',
							'label' => __('Pinterest URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Pinterest profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'pinterest_link_text',
							'label' => __('Pinterest Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Pinterest link text.', 'themebeagle'),
							'default' => __('Connect on Pinterest', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Flickr', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'flickr_url',
							'label' => __('Flickr URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Flickr profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'flickr_link_text',
							'label' => __('Flickr Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Flickr link text.', 'themebeagle'),
							'default' => __('Connect on Flickr', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Youtube', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'youtube_url',
							'label' => __('Youtube URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Youtube profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'youtube_link_text',
							'label' => __('Youtube Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Youtube link text.', 'themebeagle'),
							'default' => __('Connect on Youtube', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Dribbble', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'dribbble_url',
							'label' => __('Dribbble URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Dribbble profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'dribbble_link_text',
							'label' => __('Dribbble Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Dribbble link text.', 'themebeagle'),
							'default' => __('Connect on Dribbble', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('StumbleUpon', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'stumbleupon_url',
							'label' => __('StumbleUpon URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your StumbleUpon profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'stumbleupon_link_text',
							'label' => __('StumbleUpon Link Text', 'themebeagle'),
							'description' => __('Enter your preferred StumbleUpon link text.', 'themebeagle'),
							'default' => __('Connect on StumbleUpon', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Tumblr', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'tumblr_url',
							'label' => __('Tumblr URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your Tumblr profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'tumblr_link_text',
							'label' => __('Tumblr Link Text', 'themebeagle'),
							'description' => __('Enter your preferred Tumblr link text.', 'themebeagle'),
							'default' => __('Connect on Tumblr', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('GitHub', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'github_url',
							'label' => __('GitHub URL', 'themebeagle'),
							'description' => __('Enter the complete URL to your GitHub profile page.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'github_link_text',
							'label' => __('GitHub Link Text', 'themebeagle'),
							'description' => __('Enter your preferred GitHub link text.', 'themebeagle'),
							'default' => __('Connect on GitHub', 'themebeagle'),
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Header, Site Title & Logo
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Header, Site Title & Logo', 'themebeagle'),
			'name' => 'menu_header_logo',
			'icon' => 'font-awesome:fa-adn',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General Header Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'slider',
							'name' => 'header_height',
							'label' => __('Header Height', 'themebeagle'),
							'description' => __('As needed, adjust the header height (in pixels).', 'themebeagle'),
							'min' => '40',
							'max' => '500',
							'step' => '1',
							'default' => '120',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Site Title and Tagline', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'site_title',
							'label' => __('Display Site Title', 'themebeagle'),
							'description' => __('Site Title is "On" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'tagline',
							'label' => __('Display Tagline', 'themebeagle'),
							'description' => __('Tagline is "Off" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'header_title_align',
							'label' => __('Site Title and Tagline Alignment', 'themebeagle'),
							'description' => __('Choose the alignment for your Site Title and Description.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'default',
									'label' => __('Stylesheet Default', 'themebeagle'),
								),
								array(
									'value' => 'left',
									'label' => __('Left', 'themebeagle'),
								),
								array(
									'value' => 'center',
									'label' => __('Center', 'themebeagle'),
								),
								array(
									'value' => 'right',
									'label' => __('Right', 'themebeagle'),
								),
							),
							'default' => array(
								'default',
							),
						),
						array(
							'type' => 'fontawesome',
							'name' => 'site_title_icon',
							'label' => __('Select Icon for Site Title', 'themebeagle'),
							'description' => __('Optional.', 'themebeagle'),
							'default' => array(
								'fa-sun-o',
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Custom Logo / Header Image', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'header_logo',
							'label' => __('Display Custom Logo / Header Image', 'themebeagle'),
							'description' => __('To use a custom logo/header image, change this setting to "On," and upload your file below.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'upload',
							'name' => 'logo_url',
							'label' => __('Upload Custom Logo / Header Image', 'themebeagle'),
							'description' => __('Upload a file to serve as your custom logo / header image, or enter the image URL.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'toggle',
							'name' => 'full_header',
							'label' => __('Activate Full-Width Header Image', 'themebeagle'),
							'description' => __('Select "Yes" to stretch your logo/header image the full-width of the header.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'logo_align',
							'label' => __('Custom Logo / Header Image Alignment', 'themebeagle'),
							'description' => __('Choose the alignment for your Custom Logo / Header Image.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'default',
									'label' => __('Stylesheet Default', 'themebeagle'),
								),
								array(
									'value' => 'left',
									'label' => __('Left', 'themebeagle'),
								),
								array(
									'value' => 'center',
									'label' => __('Center', 'themebeagle'),
								),
								array(
									'value' => 'right',
									'label' => __('Right', 'themebeagle'),
								),
							),
							'default' => array(
								'default',
							),
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Navigation Bars
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Navigation Bars', 'themebeagle'),
			'name' => 'menu_nav_bars',
			'icon' => 'font-awesome:fa-compass',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General Navigation Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'navarrows',
							'label' => __('Display Arrows for Drop-Down Navigation Links', 'themebeagle'),
							'description' => __('Select "On" to show small arrows indicating drop-down navigation links.', 'themebeagle'),
							'default' => '1',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Top Navigation Bar', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'show_topnav',
							'label' => __('Display Top Navigation Bar', 'themebeagle'),
							'description' => __('The Top Navigation Bar is "On" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'search_topnav',
							'label' => __('Display Search Form Button in Top Navigation Bar', 'themebeagle'),
							'description' => __('Select "Off" to hide the search form button in top navigation bar.', 'themebeagle'),
							'default' => '1',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Header Navigation Bar', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'show_secnav',
							'label' => __('Display Header Navigation Bar', 'themebeagle'),
							'description' => __('The Header Navigation Bar is "On" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'secnav_align',
							'label' => __('Header Navigation Location', 'themebeagle'),
							'description' => __('Choose the location of Header Navigation.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'right',
									'label' => __('Right of Site Title/Logo', 'themebeagle'),
								),
								array(
									'value' => 'below',
									'label' => __('Below Site Title/Logo', 'themebeagle'),
								),
							),
							'default' => array(
								'right',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'search_secnav',
							'label' => __('Display Search Form Button in Header Navigation Bar', 'themebeagle'),
							'description' => __('Select "On" to display the search form button in header navigation bar.', 'themebeagle'),
							'default' => '0',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Fixed Navigation Bar', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'show_fixednav',
							'label' => __('Display Fixed Navigation Bar', 'themebeagle'),
							'description' => __('The Fixed Navigation Bar is "Off" by default.', 'themebeagle'),
							'default' => '0',
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Post Settings
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Post Settings', 'themebeagle'),
			'name' => 'basic_post_settings',
			'icon' => 'font-awesome:fa-pencil-square',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General Post Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'formaticons',
							'label' => __('Show Post Format Icons', 'themebeagle'),
							'description' => __('Select "Off" to hide the post format icons that appear next to Post title.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'infinite_scroll',
							'label' => __('Use Infinite Scrolling', 'themebeagle'),
							'description' => __('Select "Off" to de-activate Infinite Scrolling. Note: this does not work for Posts Grouped by Category.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'cat_filter',
							'label' => __('Masonry Category Filter', 'themebeagle'),
							'description' => __('Select "Off" to hide the category filter at top of Masonry-style blog pages.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'checkbox',
							'name' => 'show_comments',
							'label' => __('Display Comments Section', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'posts',
									'label' => __('Posts', 'themebeagle'),
								),
								array(
									'value' => 'pages',
									'label' => __('Pages', 'themebeagle'),
								),
							),
							'default' => array(
								'{{first}}',
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Post Layout', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'post_layout',
							'label' => __('Home Page Post Layout', 'themebeagle'),
							'description' => __('Select your preferred Post layout.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'posts_by_cat',
									'label' => __('Posts Grouped by Category', 'themebeagle'),
								),
								array(
									'value' => 'posts_standard',
									'label' => __('Standard Blog - 1 Column', 'themebeagle'),
								),
								array(
									'value' => 'posts_by_two',
									'label' => __('Standard Blog - 2 Column', 'themebeagle'),
								),
								array(
									'value' => 'posts_by_three',
									'label' => __('Standard Blog - 3 Column', 'themebeagle'),
								),
								array(
									'value' => 'posts_by_four',
									'label' => __('Standard Blog - 4 Column', 'themebeagle'),
								),
								array(
									'value' => 'masonry_2',
									'label' => __('Masonry/Pinterest Style - 2 Column', 'themebeagle'),
								),
								array(
									'value' => 'masonry_3',
									'label' => __('Masonry/Pinterest Style - 3 Column', 'themebeagle'),
								),
								array(
									'value' => 'masonry_4',
									'label' => __('Masonry/Pinterest Style - 4 Column', 'themebeagle'),
								),
							),
							'default' => array(
								'posts_standard',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'post_by_cat_layout',
							'label' => __('Category Group Layout', 'themebeagle'),
							'dependency' => array(
								'field' => 'post_layout',
								'function' => 'tb_is_posts_by_cat',
							),
							'description' => __('Select how you would like the category groups to be arranged.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'post_by_cat_side',
									'label' => __('Side-by-Side Category Groups', 'themebeagle'),
								),
								array(
									'value' => 'post_by_cat_stacked',
									'label' => __('Stacked Category Groups', 'themebeagle'),
								),
							),
							'default' => array(
								'post_by_cat_side',
							),
						),
						array(
							'type'    => 'slider',
							'name'    => 'posts_by_cat_count',
							'label'   => __('Number of Posts Per Group', 'themebeagle'),
							'description' => __('For <strong>Category Groups Stacked</strong>, optimum number of posts is 4.', 'themebeagle'),
							'dependency' => array(
								'field' => 'post_layout',
								'function' => 'tb_is_posts_by_cat',
							),
							'min'     => '2',
							'max'     => '20',
							'default' => '4',
						),
						array(
							'type' => 'sorter',
							'name' => 'posts_by_cat_cats',
							'label' => __('Select Categories', 'themebeagle'),
							'dependency' => array(
								'field' => 'post_layout',
								'function' => 'tb_is_posts_by_cat',
							),
							'description' => __('Select your categories, and arrange the order as you like.', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_categories',
									),
								),
							),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_by_cat_title',
							'label' => __('Category Group Title', 'themebeagle'),
							'dependency' => array(
								'field' => 'post_layout',
								'function' => 'tb_is_posts_by_cat',
							),
							'description' => __('Optional. Enter whatever you would like to appear before each category group name. You may also leave the field blank for just the category name.', 'themebeagle'),
							'default' => __('Latest in', 'themebeagle'),
						),
						array(
							'type' => 'fontawesome',
							'name' => 'post_by_cat_icon',
							'label' => __('Icon for the Category Group Title', 'themebeagle'),
							'dependency' => array(
								'field' => 'post_layout',
								'function' => 'tb_is_posts_by_cat',
							),
							'description' => __('Optional. For no icon, leave field blank.', 'themebeagle'),
							'default' => array(
								'fa-file-text',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'post_by_cat_meta',
							'label' => __('Display Post Meta Information', 'themebeagle'),
							'dependency' => array(
								'field' => 'post_layout',
								'function' => 'tb_is_posts_by_cat',
							),
							'description' => __('Select "On" to display post meta information at the bottom of each post in the category groups.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'select',
							'name' => 'post_layout_archive',
							'label' => __('Archive Page Post Layout', 'themebeagle'),
							'description' => __('Select your preferred Post layout.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'posts_standard',
									'label' => __('Standard Blog - 1 Column', 'themebeagle'),
								),
								array(
									'value' => 'posts_by_two',
									'label' => __('Standard Blog - 2 Column', 'themebeagle'),
								),
								array(
									'value' => 'posts_by_three',
									'label' => __('Standard Blog - 3 Column', 'themebeagle'),
								),
								array(
									'value' => 'posts_by_four',
									'label' => __('Standard Blog - 4 Column', 'themebeagle'),
								),
								array(
									'value' => 'masonry_2',
									'label' => __('Masonry Blog - 2 Column', 'themebeagle'),
								),
								array(
									'value' => 'masonry_3',
									'label' => __('Masonry Blog - 3 Column', 'themebeagle'),
								),
								array(
									'value' => 'masonry_4',
									'label' => __('Masonry Blog - 4 Column', 'themebeagle'),
								),
							),
							'default' => array(
								'posts_standard',
							),
						),
						array(
							'type' => 'multiselect',
							'name' => 'exclude_cats',
							'label' => __('Exclude Categories from Homepage', 'themebeagle'),
							'description' => __('Select any Post categories that should be excluded from the Homepage.', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_categories',
									),
								),
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Post Excerpt', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'radiobutton',
							'name' => 'post_excerpt',
							'label' => __('Post Excerpt or Content', 'themebeagle'),
							'description' => __('On your home page and archive pages, you can display post excerpts or the full post content. <a href="http://codex.wordpress.org/Glossary#Excerpt" target="blank">More info</a>.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'excerpt',
									'label' => 'Excerpt',
								),
								array(
									'value' => 'content',
									'label' => 'Content',
								),
							),
							'default' => array(
								'excerpt',
							),
						),
 						array(
							'type' => 'slider',
							'name' => 'excerpt_length',
							'label' => __('Length of Auto-Generated Excerpt', 'themebeagle'),
							'description' => __('If using Excerpt above, set the excerpt length here. This field only applies to auto generated excerpts. If you use the Excerpt field, that is what will be shown as the post excerpt', 'themebeagle'),
							'min' => '0',
							'max' => '100',
							'step' => '1',
							'default' => '40',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Post Thumbnail/Featured Images', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'thumbnails',
							'label' => __('Display Thumbnail/Featured Images on Home and Archive Pages', 'themebeagle'),
							'description' => __('Select "On" to add the thumbnail/featured image to each post that appears on Home and Archive pages.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'thumb_align',
							'label' => __('Thumbnail/Featured Image Alignment', 'themebeagle'),
							'dependency' => array(
								'field' => 'thumbnails',
								'function' => 'tb_thumbs_on',
							),
							'description' => __('For "Standard Blog - 1 Column" layout only. Select where you would like the image to be aligned.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'top',
									'label' => __('Top (Large Image)', 'themebeagle'),
								),
								array(
									'value' => 'left',
									'label' => __('Left (Medium Image)', 'themebeagle'),
								),
								array(
									'value' => 'right',
									'label' => __('Right (Medium Image)', 'themebeagle'),
								),
							),
							'default' => array(
								'left',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'single_feat_img',
							'label' => __('Display Thumbnail/Featured Image Top of Single Post Pages', 'themebeagle'),
							'description' => __('Select "On" to add the thumbnail/featured image to the top of individual Post page.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'page_feat_img',
							'label' => __('Display Thumbnail/Featured Image Top of Individual Pages', 'themebeagle'),
							'description' => __('Select "On" to add the thumbnail/featured image to the top of individual Pages.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'defthumb',
							'label' => __('Default Thumbnail/Featured Image', 'themebeagle'),
							'description' => __('If your Post does not have any images attached, the theme can display a default image instead.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'upload',
							'name' => 'defthumb_url',
							'label' => __('Upload Default Image', 'themebeagle'),
							'description' => __('Enter the file URL for your default image, or click the "Choose File" button to upload an image.', 'themebeagle'),
						),
						array(
							'type' => 'toggle',
							'name' => 'gallery_slider',
							'label' => __('Replace Standard WordPress Gallery with Gallery Slider on Single Posts/Pages', 'themebeagle'),
							'description' => __('Select "Off" to use standard WordPress images galleries instead of the WP-Prosperity Gallery Slider.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'medium_thumb',
							'label' => __('Use Medium Thumbnail/Featured Image', 'themebeagle'),
							'description' => __('By default, the theme uses a large-sized thumbnail/featured image in most sections. Select "On" to use a medium-sized image.', 'themebeagle'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Author Biographical Information', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'single_auth_bio',
							'label' => __('Show Author Bio on Single Post', 'themebeagle'),
							'description' => __('Single post author bio box is "On" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'author_links',
							'label' => __('Show Author Social Media Links in Bio Box', 'themebeagle'),
							'description' => __('Author Social Media Links is "On" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'auth_bio_boxed',
							'label' => __('Boxed or Unboxed', 'themebeagle'),
							'description' => __('Boxed author bio info displays with a light gray background.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'boxed',
									'label' => 'Boxed',
								),
								array(
									'value' => 'unboxed',
									'label' => 'Unboxed',
								),
							),
							'default' => array(
								'boxed',
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Post Meta Information', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'postmeta',
							'label' => __('Top Post Meta Information', 'themebeagle'),
							'description' => __('Select the meta information to display at the top of Posts.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'date',
									'label' => __('Post Date', 'themebeagle'),
								),
								array(
									'value' => 'authorname',
									'label' => __('Author Name', 'themebeagle'),
								),
								array(
									'value' => 'cats',
									'label' => __('Post Categories', 'themebeagle'),
								),
								array(
									'value' => 'tags',
									'label' => __('Post Tags', 'themebeagle'),
								),
								array(
									'value' => 'comments',
									'label' => __('Comments', 'themebeagle'),
								),
								array(
									'value' => 'edit',
									'label' => __('Edit Link', 'themebeagle'),
								),
							),
							'default' => array(
								'date',
								'authorname',
								'comments'
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'top_postmeta_hide_border',
							'label' => __('Hide Top Post Meta Border', 'themebeagle'),
							'description' => __('Select "On" to hide the top post meta border.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'checkbox',
							'name' => 'bottom_postmeta',
							'label' => __('Bottom Post Meta Information', 'themebeagle'),
							'description' => __('Select the meta information to display at the bottom of Posts.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'date',
									'label' => __('Post Date', 'themebeagle'),
								),
								array(
									'value' => 'authorname',
									'label' => __('Author Name', 'themebeagle'),
								),
								array(
									'value' => 'cats',
									'label' => __('Post Categories', 'themebeagle'),
								),
								array(
									'value' => 'tags',
									'label' => __('Post Tags', 'themebeagle'),
								),
								array(
									'value' => 'comments',
									'label' => __('Comments', 'themebeagle'),
								),
								array(
									'value' => 'edit',
									'label' => __('Edit Link', 'themebeagle'),
								),
								array(
									'value' => 'read-more',
									'label' => __('Read More Link', 'themebeagle'),
								),
							),
							'default' => array(
								'cats',
								'tags',
								'edit',
								'read-more'
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'bottom_postmeta_hide_border',
							'label' => __('Hide Bottom Post Meta Border', 'themebeagle'),
							'description' => __('Select "On" to hide the bottom post meta border.', 'themebeagle'),
							'default' => '0',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Post Share Links', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'post_share',
							'label' => __('Display Post Share Links', 'themebeagle'),
							'description' => __('Post share links are "On" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'textbox',
							'name' => 'share_title',
							'label' => __('Post Sharing Title', 'themebeagle'),
							'description' => __('Leave blank for no title.', 'themebeagle'),
							'default' => __('Share this Entry', 'themebeagle'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'share_links',
							'label' => __('Select Share Links', 'themebeagle'),
							'description' => __('Select the share links you would like to offer.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'facebook',
									'label' => __('Facebook', 'themebeagle'),
								),
								array(
									'value' => 'google',
									'label' => __('Google+', 'themebeagle'),
								),
								array(
									'value' => 'twitter',
									'label' => __('Twitter', 'themebeagle'),
								),
								array(
									'value' => 'pinterest',
									'label' => __('Pinterest', 'themebeagle'),
								),
								array(
									'value' => 'linkedin',
									'label' => __('LinkedIn', 'themebeagle'),
								),
								array(
									'value' => 'stumbleupon',
									'label' => __('StumbleUpon', 'themebeagle'),
								),
								array(
									'value' => 'reddit',
									'label' => __('Reddit', 'themebeagle'),
								),
								array(
									'value' => 'email',
									'label' => __('Email', 'themebeagle'),
								),
							),
							'default' => array(
								'{{all}}',
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Single Post - Bottom Widget Area', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'post_bottom_bg',
							'label' => __('Widget Area Background Color', 'themebeagle'),
							'description' => __('Select the background color for this widget area.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type'    => 'slider',
							'name'    => 'post_bottom_padding',
							'label'   => __('Widget Area Padding (px)', 'themebeagle'),
							'min'     => '0',
							'max'     => '100',
							'default' => '0',
						),
						array(
							'type'    => 'slider',
							'name'    => 'post_bottom_border_size',
							'label'   => __('Widget Area Border Size (px)', 'themebeagle'),
							'min'     => '0',
							'max'     => '100',
							'default' => '0',
						),
						array(
							'type' => 'color',
							'name' => 'post_bottom_border_color',
							'label' => __('Widget Area Border Color', 'themebeagle'),
							'description' => __('Select the border color for this widget area.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'post_bottom_font_color',
							'label' => __('Widget Area Font Color', 'themebeagle'),
							'description' => __('Select the font color for this widget area.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'post_bottom_link_color',
							'label' => __('Widget Area Link Color', 'themebeagle'),
							'description' => __('Select the link color for this widget area.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'post_bottom_link_hover_color',
							'label' => __('Widget Area Link Hover Color', 'themebeagle'),
							'description' => __('Select the link hover color for this widget area.', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'post_bottom_align',
							'label' => __('Widget Area Text Alignment', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'left',
									'label' => __('Left', 'themebeagle'),
								),
								array(
									'value' => 'center',
									'label' => __('Center', 'themebeagle'),
								),
								array(
									'value' => 'right',
									'label' => __('Right', 'themebeagle'),
								),
							),
							'default' => array(
								'center',
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Related Posts', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'single_related',
							'label' => __('Display Related Posts on Single Post', 'themebeagle'),
							'description' => __('Select "On" to display related post thumbnails just above the Post Comments section.', 'themebeagle'),
							'default' => '0',
						),
 						array(
							'type' => 'slider',
							'name' => 'related_count',
							'label' => __('How Many Related Posts', 'themebeagle'),
							'description' => __('Select number of related posts to show.', 'themebeagle'),
							'min' => '2',
							'max' => '6',
							'step' => '1',
							'default' => '3',
						),
						array(
							'type' => 'textbox',
							'name' => 'related_title',
							'label' => __('Related Posts Title', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => __('You May Also Enjoy', 'themebeagle'),
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Featured Posts Slider
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Featured Posts Slider', 'themebeagle'),
			'name' => 'menu_home_featured_content',
			'icon' => 'font-awesome:fa-star',
			'controls' => array(
				array(
					'type' => 'notebox',
					'name' => 'feat_posts_settings_note',
					'label' => __('Theme Settings Tip', 'themebeagle'),
					'description' => __('The settings below will control the presentation of the Featured Posts Slider on the homepage. You may also add the Featured Posts slider to any individual Page of Post via the Add Post/Add Page settings.', 'themebeagle'),
					'status' => 'normal',
				),
				array(
					'type' => 'section',
					'title' => __('Featured Posts Slider', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'radioimage',
							'name' => 'home_featured_posts',
							'label' => __('Home Page Featured Posts Option', 'themebeagle'),
							'description' => __('The homepage featured content slider is off by default.', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('No Featured Posts Slider', 'themebeagle'),
									'img' => TB_ADMIN_URI . '/img/feature-none.jpg',
								),
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
							'default' => 'none'
						),
						array(
							'type' => 'textbox',
							'name' => 'feature_title',
							'label' => __('Featured Content Title', 'themebeagle'),
							'dependency' => array(
								'field' => 'home_featured_posts',
								'function' => 'tb_is_featured_narrow',
							),
							'description' => __('To hide title, leave field blank.', 'themebeagle'),
							'default' => __('', 'themebeagle'),
						),
						array(
							'type' => 'fontawesome',
							'name' => 'feature_title_icon',
							'label' => __('Select an Icon for the Featured Content Title', 'themebeagle'),
							'dependency' => array(
								'field' => 'home_featured_posts',
								'function' => 'tb_is_featured_narrow',
							),
							'description' => __('Optional.', 'themebeagle'),
							'default' => array(
								'fa-file-text',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'featurecount',
							'label' => __('Maximum Number of Slides/Posts', 'themebeagle'),
							'description' => __('Enter maximum number of slides/posts to show in the slider.', 'themebeagle'),
							'default' => '5',
						),
						array(
							'type' => 'toggle',
							'name' => 'post_autoslide',
							'label' => __('Activate Auto-Slide Feature', 'themebeagle'),
							'description' => __('Usability expert Jakob Nielsen <a href="http://www.nngroup.com/articles/auto-forwarding/">recommends NOT using this feature</a> as it has the potential to annoy your site visitors. That said, if you would like the slider to advance automatically, you can activate it here.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'slider',
							'name' => 'slideshowspeed',
							'label' => __('Auto-Slide Speed', 'themebeagle'),
							'description' => __('Enter how long each slide should remain visible (e.g. 7000 = 7 seconds).', 'themebeagle'),
							'min' => '1000',
							'max' => '20000',
							'step' => '1000',
							'default' => '7000',
						),
						array(
							'type' => 'toggle',
							'name' => 'post_animate',
							'label' => __('Animation Effects', 'themebeagle'),
							'description' => __('Animate the post title, excerpt and post meta information. "On" by default.', 'themebeagle'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'hide_dupes',
							'label' => __('Eliminate Duplicate Posts', 'themebeagle'),
							'description' => __('This feature, when active, prevents duplicate posts from appearing on a page. For example, if a post appears in the Featured Content Slider, it will not appear again on the same page in the normal flow of posts.', 'themebeagle'),
							'default' => '1',
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Featured Pages Slider
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Featured Pages Slider', 'themebeagle'),
			'name' => 'menu_featured_pages',
			'icon' => 'font-awesome:fa-star',
			'controls' => array(
				array(
					'type' => 'notebox',
					'name' => 'feat_pages_note',
					'label' => __('Theme Settings Tip', 'themebeagle'),
					'description' => __('The settings below will control the presentation of the Featured Pages Slider on the homepage. You may also add the Featured Pages Slider to any individual Page of Post via the Add Post/Add Page settings.', 'themebeagle'),
					'status' => 'normal',
				),
				array(
					'type' => 'section',
					'title' => __('Featured Pages Slider', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'featured_pages',
							'label' => __('Featured Pages Slider', 'themebeagle'),
							'description' => __('Select "On" to activate the Featured Pages Slider.', 'themebeagle'),
							'default' => '0'
						),
						array(
							'type' => 'sorter',
							'name' => 'feat_pages_ids',
							'label' => __('Select Pages', 'themebeagle'),
							'description' => __('Select your Pages, and arrange the order as you like.', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),
							'default' => '',
						),
						array(
							'type' => 'toggle',
							'name' => 'page_autoslide',
							'label' => __('Activate Auto-Slide Feature', 'themebeagle'),
							'description' => __('Usability expert Jakob Nielsen <a href="http://www.nngroup.com/articles/auto-forwarding/">recommends NOT using this feature</a> as it has the potential to annoy your site visitors. That said, if you would like the slider to advance automatically, you can activate it here.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'slider',
							'name' => 'page_slideshowspeed',
							'label' => __('Auto-Slide Speed', 'themebeagle'),
							'description' => __('Enter how long each slide should remain visible (e.g. 7000 = 7 seconds).', 'themebeagle'),
							'min' => '1000',
							'max' => '20000',
							'step' => '1000',
							'default' => '7000',
						),
						array(
							'type' => 'toggle',
							'name' => 'page_animate',
							'label' => __('Animation Effects', 'themebeagle'),
							'description' => __('Animate the page title and excerpt. "On" by default.', 'themebeagle'),
							'default' => '1',
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Advertisement Management
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Advertisement Settings', 'themebeagle'),
			'name' => 'menu_ad_settings',
			'icon' => 'font-awesome:fa-usd',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General Ad Management Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'allow_ad_manage',
							'label' => __('Allow Ad Mangement on Single Posts and Pages', 'themebeagle'),
							'description' => __('Select "On" to display ad management metaboxes on the Add Post/Page screens.', 'themebeagle'),
							'default' => '0',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Header Advertisement', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'ad_header',
							'label' => __('Display Ad in Header', 'themebeagle'),
							'description' => __('Select "On" to display an ad in the site header next to the site title.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'ad_header_code',
							'label' => __('Header Ad Code', 'themebeagle'),
							'description' => __('Enter the HTML code for your ad. You may also use Google Adsense or shortcodes.', 'themebeagle'),
							'mode' => 'html',
							'default' => '',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Below Header Advertisement', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'ad_below_header',
							'label' => __('Display Ad Below Header', 'themebeagle'),
							'description' => __('Select "On" to display an ad below the site header area.', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'ad_below_header_code',
							'label' => __('Below Header Ad Code', 'themebeagle'),
							'description' => __('Enter the HTML code for your ad. You may also use Google Adsense or shortcodes.', 'themebeagle'),
							'mode' => 'html',
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'ad_below_header_bg',
							'label' => __('Background Color', 'themebeagle'),
							'description' => __('Select your preferred background color for the ad block', 'themebeagle'),
							'default' => '#000000',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Top Content Advertisement', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'ad_content_top',
							'label' => __('Display Ad Above Main Content', 'themebeagle'),
							'description' => __('Select "On" to display an ad above the main content area (i.e. above Posts).', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'ad_content_top_code',
							'label' => __('Top Content Ad Code', 'themebeagle'),
							'description' => __('Enter the HTML code for your ad. You may also use Google Adsense or shortcodes.', 'themebeagle'),
							'mode' => 'html',
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'ad_content_top_bg',
							'label' => __('Background Color', 'themebeagle'),
							'description' => __('Select your preferred background color for the ad block', 'themebeagle'),
							'default' => '#000000',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Bottom Content Advertisement', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'ad_content_bottom',
							'label' => __('Display Ad Below Main Content', 'themebeagle'),
							'description' => __('Select "On" to display an ad below the main content area (i.e. beneath Posts).', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'ad_content_bottom_code',
							'label' => __('Bottom Content Ad Code', 'themebeagle'),
							'description' => __('Enter the HTML code for your ad. You may also use Google Adsense or shortcodes.', 'themebeagle'),
							'mode' => 'html',
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'ad_content_bottom_bg',
							'label' => __('Background Color', 'themebeagle'),
							'description' => __('Select your preferred background color for the ad block', 'themebeagle'),
							'default' => '#000000',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Below Single Post Footer', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'ad_below_post',
							'label' => __('Display Ad Below the Single Post Footer', 'themebeagle'),
							'description' => __('Select "On" to display an ad below the single Post footer area (just above Comments section).', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'ad_below_post_code',
							'label' => __('Below Post Footer Ad Code', 'themebeagle'),
							'description' => __('Enter the HTML code for your ad. You may also use Google Adsense or shortcodes.', 'themebeagle'),
							'mode' => 'html',
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'ad_below_post_bg',
							'label' => __('Background Color', 'themebeagle'),
							'description' => __('Select your preferred background color for the ad block', 'themebeagle'),
							'default' => '#000000',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Above Footer Advertisement', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'ad_above_footer',
							'label' => __('Display Ad Above Footer', 'themebeagle'),
							'description' => __('Select "On" to display an ad above the page footer (or footer widgets, if active).', 'themebeagle'),
							'default' => '0',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'ad_above_footer_code',
							'label' => __('Above Footer Ad Code', 'themebeagle'),
							'description' => __('Enter the HTML code for your ad. You may also use Google Adsense or shortcodes.', 'themebeagle'),
							'mode' => 'html',
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'ad_above_footer_bg',
							'label' => __('Background Color', 'themebeagle'),
							'description' => __('Select your preferred background color for the ad block', 'themebeagle'),
							'default' => '#000000',
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Color Options
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Color Settings', 'themebeagle'),
			'name' => 'menu_color_settings',
			'icon' => 'font-awesome:fa-tint',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Header Color Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'radiobutton',
							'name' => 'header_color',
							'label' => __('Dark Header or Light Header', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'dark',
									'label' => __('Dark', 'themebeagle'),
								),
								array(
									'value' => 'light',
									'label' => __('Light', 'themebeagle'),
								),
							),
							'default' => array(
								'dark',
							),
						),
						array(
							'type' => 'color',
							'name' => 'header_bg_color',
							'label' => __('Header Background Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'header_border_color',
							'label' => __('Header Border Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'site_title_color',
							'label' => __('Site Title Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'tagline_color',
							'label' => __('Tagline Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'site_title_icon_color',
							'label' => __('Icon Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Posts by Category Color Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'postbycat_bg_color',
							'label' => __('Posts by Category - Headings - Background Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '#000000',
						),
						array(
							'type' => 'color',
							'name' => 'postbycat_link_color',
							'label' => __('Posts by Category - Headings - Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '#ffffff',
						),
						array(
							'type' => 'toggle',
							'name' => 'postbycat_border',
							'label' => __('Posts by Category - Headings - Bottom Border', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '0',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Top Navigation Color Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'topnav_bg_color',
							'label' => __('TopNav Background Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'topnav_link_color',
							'label' => __('TopNav Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'topnav_link_hover_color',
							'label' => __('TopNav Link Hover Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'topnav_link_current_color',
							'label' => __('TopNav Current Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'topnav_icon_color',
							'label' => __('TopNav Social Media Icons Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'topnav_drop_border_color',
							'label' => __('TopNav Drop-Down Border Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Header Navigation Color Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'headernav_bg_color',
							'label' => __('HeaderNav Background Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'headernav_link_color',
							'label' => __('HeaderNav Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'headernav_link_hover_color',
							'label' => __('HeaderNav Link Hover Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'headernav_link_current_color',
							'label' => __('HeaderNav Current Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'headernav_icon_color',
							'label' => __('HeaderNav Social Media Icons Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'headernav_drop_border_color',
							'label' => __('HeaderNav Drop-Down Border Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Fixed Navigation Color Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'fixednav_bg_color',
							'label' => __('FixedNav Background Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'fixednav_link_color',
							'label' => __('FixedNav Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'fixednav_link_hover_color',
							'label' => __('FixedNav Link Hover Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'fixednav_link_current_color',
							'label' => __('FixedNav Current Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'fixednav_icon_color',
							'label' => __('FixedNav Social Media Icons Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'fixednav_drop_border_color',
							'label' => __('FixedNav Drop-Down Border Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Body Color Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'body_text_color',
							'label' => __('Body Text Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'body_headings_color',
							'label' => __('Body Headings Text Color', 'themebeagle'),
							'description' => __('Heading tags (e.g. h1, h2, h3, etc).', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'body_link_color',
							'label' => __('Body Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'body_link_hover_color',
							'label' => __('Body Link Hover Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'post_title_link_color',
							'label' => __('Post Title Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'post_title_link_hover_color',
							'label' => __('Post Title Link Hover Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Footer Widgets Color Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'footer_widgets_bg_color',
							'label' => __('Footer Widgets Background Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_widgets_border_color',
							'label' => __('Footer Widgets Border Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_widgets_text_color',
							'label' => __('Footer Widgets Text Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_widgets_headings_color',
							'label' => __('Footer Widgets Headings Text Color', 'themebeagle'),
							'description' => __('Heading tags (e.g. h1, h2, h3, etc).', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_widgets_link_color',
							'label' => __('Footer Widgets Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_widgets_link_hover_color',
							'label' => __('Footer Widgets Link Hover Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Footer Color Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'footer_bg_color',
							'label' => __('Footer Background Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_border_color',
							'label' => __('Footer Border Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_text_color',
							'label' => __('Footer Text Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_link_color',
							'label' => __('Footer Link Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_link_hover_color',
							'label' => __('Footer Link Hover Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'footer_icon_color',
							'label' => __('Footer Social Media Icon Color', 'themebeagle'),
							'description' => __('', 'themebeagle'),
							'default' => '',
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Google Font Settings
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Google Font Settings', 'themebeagle'),
			'name' => 'menu_google_font_settings',
			'icon' => 'font-awesome:fa-font',
			'controls' => array(
				array(
					'type' => 'notebox',
					'name' => 'goog_fonts_note',
					'label' => __('Theme Settings Tip', 'themebeagle'),
					'description' => __('By default, WP Prosperity uses Source Sans Pro for the Body font and Bitter for the Headings font. If you would like to change those settings, you simply need to activate Google Fonts below and then make your selections from the options that follow.', 'themebeagle'),
					'status' => 'normal',
				),
				array(
					'type' => 'section',
					'title' => __('Activate Google Fonts', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'use_google_fonts',
							'label' => __('Use Google Fonts', 'themebeagle'),
							'description' => __('Select "On" to use Google Fonts. Make your selections below.', 'themebeagle'),
							'default' => '0',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Site Title Font Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'site_title_font_preview',
							'binding' => array(
								'field'    => 'header_font,header_style,header_weight,header_size,header_transform',
								'function' => 'tb_site_title_preview',
							),
						),
						array(
							'type' => 'select',
							'name' => 'header_font',
							'label' => __('Site Title Font Face', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => array(
								'value' => 'Bitter',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'header_style',
							'label' => __('Site Title Font Style', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'header_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'header_weight',
							'label' => __('Site Title Font Weight', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'header_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'header_transform',
							'label' => __('Site Title Text Transform', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'themebeagle'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'themebeagle'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'themebeagle'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'themebeagle'),
								),
							),
							'default' => array(
								'value' => 'none',
							),
						),
						array(
							'type'    => 'slider',
							'name'    => 'header_size',
							'label'   => __('Site Title Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '24',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Headings Font Settings (E.G. Post Titles, Page Title, etc.)', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'headings_font_preview',
							'binding' => array(
								'field'    => 'headings_font,headings_style,headings_weight,headings_transform',
								'function' => 'tb_heading_preview',
							),
						),
						array(
							'type' => 'select',
							'name' => 'headings_font',
							'label' => __('Headings Font Face', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => array(
								'value' => 'Bitter',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'headings_style',
							'label' => __('Headings Font Style', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'headings_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'headings_weight',
							'label' => __('Headings Font Weight', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'headings_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'headings_transform',
							'label' => __('Headings Text Transform', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'themebeagle'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'themebeagle'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'themebeagle'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'themebeagle'),
								),
							),
							'default' => array(
								'value' => 'none',
							),
						),
						array(
							'type'    => 'slider',
							'name'    => 'headings_widget_title_size',
							'label'   => __('Widget Ttitle Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '18',
						),
						array(
							'type'    => 'slider',
							'name'    => 'headings_h1_size',
							'label'   => __('H1 Heading Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '30',
						),
						array(
							'type'    => 'slider',
							'name'    => 'headings_h2_size',
							'label'   => __('H2 Heading Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '28',
						),
						array(
							'type'    => 'slider',
							'name'    => 'headings_h3_size',
							'label'   => __('H3 Heading Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '26',
						),
						array(
							'type'    => 'slider',
							'name'    => 'headings_h4_size',
							'label'   => __('H4 Heading Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '24',
						),
						array(
							'type'    => 'slider',
							'name'    => 'headings_h5_size',
							'label'   => __('H5 Heading Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '20',
						),
						array(
							'type'    => 'slider',
							'name'    => 'headings_h6_size',
							'label'   => __('H6 Heading Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '18',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Body Font Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'body_font_preview',
							'binding' => array(
								'field'    => 'body_font,body_style,body_weight,body_size,body_transform,body_line_height',
								'function' => 'tb_body_preview',
							),
						),
						array(
							'type' => 'select',
							'name' => 'body_font',
							'label' => __('Body Font Face', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => array(
								'value' => 'Source Sans Pro',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'body_style',
							'label' => __('Body Font Style', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'body_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'body_weight',
							'label' => __('Body Font Weight', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'body_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'body_transform',
							'label' => __('Body Text Transform', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'themebeagle'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'themebeagle'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'themebeagle'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'themebeagle'),
								),
							),
							'default' => array(
								'value' => 'none',
							),
						),
						array(
							'type'    => 'slider',
							'name'    => 'body_size',
							'label'   => __('Body Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '16',
						),
						array(
							'type'    => 'slider',
							'name'    => 'body_line_height',
							'label'   => __('Body Line Height', 'themebeagle'),
							'min'     => '0',
							'max'     => '3',
							'default' => '1.5',
							'step'    => '0.1',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Top Navigation Font Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'topnav_font_preview',
							'binding' => array(
								'field'    => 'topnav_font,topnav_style,topnav_weight,topnav_size,topnav_transform',
								'function' => 'tb_topnav_preview',
							),
						),
						array(
							'type' => 'select',
							'name' => 'topnav_font',
							'label' => __('Top Navigation Font Face', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => array(
								'value' => 'Source Sans Pro',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'topnav_style',
							'label' => __('Top Navigation Font Style', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'topnav_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'topnav_weight',
							'label' => __('Top Navigation Font Weight', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'topnav_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'topnav_transform',
							'label' => __('Top Navigation Text Transform', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'themebeagle'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'themebeagle'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'themebeagle'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'themebeagle'),
								),
							),
							'default' => array(
								'value' => 'none',
							),
						),
						array(
							'type'    => 'slider',
							'name'    => 'topnav_size',
							'label'   => __('Top Navigation Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '14',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Header Navigation Font Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'headernav_font_preview',
							'binding' => array(
								'field'    => 'headernav_font,headernav_style,headernav_weight,headernav_size,headernav_transform',
								'function' => 'tb_headernav_preview',
							),
						),
						array(
							'type' => 'select',
							'name' => 'headernav_font',
							'label' => __('Header Navigation Font Face', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => array(
								'value' => 'Source Sans Pro',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'headernav_style',
							'label' => __('Header Navigation Font Style', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'headernav_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'headernav_weight',
							'label' => __('Header Navigation Font Weight', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'headernav_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'headernav_transform',
							'label' => __('Header Navigation Text Transform', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'themebeagle'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'themebeagle'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'themebeagle'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'themebeagle'),
								),
							),
							'default' => array(
								'value' => 'none',
							),
						),
						array(
							'type'    => 'slider',
							'name'    => 'headernav_size',
							'label'   => __('Header Navigation Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '14',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Post Meta Font Settings', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'postmeta_font_preview',
							'binding' => array(
								'field'    => 'postmeta_font,postmeta_style,postmeta_weight,postmeta_size,postmeta_transform',
								'function' => 'tb_postmeta_preview',
							),
						),
						array(
							'type' => 'select',
							'name' => 'postmeta_font',
							'label' => __('Post Meta Font Face', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => array(
								'value' => 'Source Sans Pro',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'postmeta_style',
							'label' => __('Post Meta Font Style', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'postmeta_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'value' => 'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'postmeta_weight',
							'label' => __('Post Meta Font Weight', 'themebeagle'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'postmeta_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => array(
								'value' => '600',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'postmeta_transform',
							'label' => __('Post Meta Text Transform', 'themebeagle'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'themebeagle'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'themebeagle'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'themebeagle'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'themebeagle'),
								),
							),
							'default' => array(
								'value' => 'uppercase',
							),
						),
						array(
							'type'    => 'slider',
							'name'    => 'postmeta_size',
							'label'   => __('Post Meta Font Size (px)', 'themebeagle'),
							'min'     => '8',
							'max'     => '96',
							'default' => '12',
						),
					),
				),
			),
		),

/*-----------------------------------------------------------------------------------*/
// Custom Code
/*-----------------------------------------------------------------------------------*/

		array(
			'title' => __('Custom Code Settings', 'themebeagle'),
			'name' => 'menu_custom_code_settings',
			'icon' => 'font-awesome:fa-code',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Custom CSS', 'themebeagle'),
					'fields' => array(
						array(
							'type' => 'codeeditor',
							'name' => 'custom_css',
							'label' => __('Custom CSS Code', 'themebeagle'),
							'description' => __('Custom style rules entered here will be printed in the Page Head.', 'themebeagle'),
							'mode' => 'css',
						),
					),
				),
			),
		),
	)
);

/**
 *EOF
 */