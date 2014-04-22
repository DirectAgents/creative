<?php
	
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme();
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
		
	// Background Defaults
	$background_defaults = array('color' => '#fdfdfd', 'image' => '', 'repeat' => 'repeat', 'position' => 'top left','attachment' => 'scroll');
	
	$bg_patterns = array("subtle-dots.png" => "Subtle Dots", "crossed_stripes.png" => "Crossed Stripes",
						 "small-grid.png" => "Small Grid", "medium-grid.png" => "Medium Grid", "small-crosses.png" => "Small Crosses", "small-squares.png" => "Small Squares",  
						 "diagonal-lines.png" => "Small Crosslines", 
						 "crosslines.png" => "Medium Crosslines", "cubes.png" => "Cubes", "double_lined.png" => "Double Lined", "fancy_deboss.png" => "Fancy Deboss", 
						 "pinstripe.png" => "Pinstripe", "subtle_freckles.png" => "Subtle Freckles", "subtle_orange_emboss.png" => "Subtle Emboss", "none" => "None");	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __( 'Select a page:' );
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath = get_stylesheet_directory_uri() . '/images/admin/';
		
	$options = array();

	/*-----------------------------------------------------------------------------------*/
	/* General options */
	/*-----------------------------------------------------------------------------------*/	
	
	$options[] = array( "name" => __("General"),
	          			"type" => "heading"); 
                  
    $options[] = array( "name" => __("Number of Trees Planted"),
                    "desc" => __("Trees Planted to be shown site wide."),
                    "id" => "trees_planted",
                    "std" => "96,768",
                    "type" => "text"); 
					
  $options[] = array( "name" => __("Footer Copy"),
                  "desc" => __("Copyright text"),
                  "id" => "footer_copyright",
                  "std" => "&copy; 2013 16 Handles. All RIghts Reserved",
                  "type" => "textarea"); 
				  
	  $options[] = array( "name" => __("Company Settings"),
	                  "desc" => __("Address & Phone"),
	                  "id" => "address_phone",
	                  "std" => "38 East 29th Street, 6th Floor South<br/>New York, NY 10016<br/>Franchise@16Handles.com <br/>Phone: (212) 260-4416<br/>Fax: (646) 626-6450",
	                  "type" => "textarea"); 

	  $options[] = array( "name" => __("General Info Email"),
	                  "desc" => __("General Info Email"),
	                  "id" => "general_info_email",
	                  "std" => "info@16handles.com",
	                  "type" => "text"); 
					  
	  $options[] = array( "name" => __("Franchise Info Email"),
	                  "desc" => __("Franchise Info Email"),
	                  "id" => "franchise_info_email",
	                  "std" => "franchise@16handles.com",
	                  "type" => "text"); 
					  
	  $options[] = array( "name" => __("Marketing/Advertising"),
	                  "desc" => __("Marketing/Advertising"),
	                  "id" => "marketing_email",
	                  "std" => "marketing@16handles.com",
	                  "type" => "text"); 
	  $options[] = array( "name" => __("PR/Media"),
	                  "desc" => __("PR/Media"),
	                  "id" => "pr_email",
	                  "std" => "pr@16handles.com",
	                  "type" => "text"); 

	  $options[] = array( "name" => __("Events/Catering Email"),
	                  "desc" => __("Events / Catering Email"),
	                  "id" => "events_email",
	                  "std" => "events@16handles.com",
	                  "type" => "text");
              
  /*-----------------------------------------------------------------------------------*/
  /* locations info */
  /*-----------------------------------------------------------------------------------*/ 

  $options[] = array( "name" => __("Locations info"),
                  "type" => "heading"); 
                  
  $options[] = array( "name" => __("Rush delivery Extra charge ($)"),
                  "desc" => __("Enter rush delivery extra charge. ($)"),
                  "id" => "rush_price",
                  "std" => "15.00",
                  "type" => "text"); 

  $options[] = array( "name" => __("Delivery Price ($)"),
                  "desc" => __("Enter delivery price. ($)"),
                  "id" => "reg_delivery_price",
                  "std" => "",
                  "type" => "text"); 

  $options[] = array( "name" => __("Tax(%)"),
                  "desc" => __("Enter tax amount in percent. (%)"),
                  "id" => "tax_percentage",
                  "std" => "8.75",
                  "type" => "text"); 

  $options[] = array( "name" => __("Cake price range label"),
                  "desc" => __("Enter Cake price range label"),
                  "id" => "cake_prices_range",
                  "std" => "*Cake Prices range from $29.99 – 44.99",
                  "type" => "text"); 
									
	$options[] = array( "name" => __("Locations search radius"),
									"desc" => __("Search radius for search of locations on location page."),
									"id" => "search_radius",
									"std" => "10",
									"type" => "text"); 				
									
  $options[] = array( "name" => __("Location Disclaimer"),
                  "desc" => __("Disclaimer to appear for all orders on each location page."),
                  "id" => "loc_disclaimer",
                  "std" => "Replace with disclaimer info.",
                  "type" => "textarea"); 														

  /*-----------------------------------------------------------------------------------*/
  /* Sociables options */
  /*-----------------------------------------------------------------------------------*/ 

  $options[] = array( "name" => __("Social Networking"),
                  "type" => "heading"); 

	$options[] = array( "name" => __("Twitter URL"),
			          	"desc" => __("Enter your Twitter URL here."),
			          	"id" => "twitter_url",
			          	"std" => "",
			          	"type" => "text"); 

	$options[] = array( "name" => __("Facebook URL"),
			          	"desc" => __("Enter your Facebook URL here."),
			          	"id" => "facebook_url",
			          	"std" => "",
			          	"type" => "text"); 

  $options[] = array( "name" => __("Pinterest URL"),
                  "desc" => __("Enter your Pinterest URL here."),
                  "id" => "pinterest_url",
                  "std" => "",
                  "type" => "text"); 

  $options[] = array( "name" => __("Youtube URL"),
                  "desc" => __("Enter your Youtube URL here."),
                  "id" => "youtube_url",
                  "std" => "",
                  "type" => "text"); 

  $options[] = array( "name" => __("Instagram URL"),
                  "desc" => __("Enter your Instagram URL here."),
                  "id" => "instagram_url",
                  "std" => "",
                  "type" => "text"); 

  $options[] = array( "name" => __("Foursquare URL"),
                  "desc" => __("Enter your Foursquare URL here."),
                  "id" => "foursquare_url",
                  "std" => "",
                  "type" => "text"); 				  

  $options[] = array( "name" => __("Email URL"),
                  "desc" => __("Enter your Email URL here."),
                  "id" => "email_url",
                  "std" => "",
                  "type" => "text"); 

	return $options;	
}