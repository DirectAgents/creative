<?php
/**
 * Shortcodes bundled for use with theme.
 * 
 * Since 1.0.
 *
 */

/* Register shortcodes. */
add_action( 'init', 'themebeagle_add_shortcodes' );

/**
 * Creates new shortcodes for use in any shortcode-ready area.  This function uses the add_shortcode() 
 * function to register new shortcodes with WordPress.
 *
 * @since 1.0
 * @access public
 * @uses add_shortcode() to create new shortcodes.
 * @link http://codex.wordpress.org/Shortcode_API
 * @return void
 */

function themebeagle_add_shortcodes() {

	/* Add theme-specific shortcodes. */
	add_shortcode( 'accordion',		'tb_accordion_wrapper' );
	add_shortcode( 'toggle',		'tb_toggle_item' );
	add_shortcode( 'alert',			'tb_alert_box' );
	add_shortcode( 'tabgroup',		'tb_tabgroup' );
	add_shortcode( 'tab',			'tb_tab' );
	add_shortcode( 'columns',		'tb_columns' );
	add_shortcode( 'one-half',		'tb_one_half' );
	add_shortcode( 'one-third',		'tb_one_third' );
	add_shortcode( 'two-third',		'tb_two_third' );
	add_shortcode( 'one-fourth',		'tb_one_fourth' );
	add_shortcode( 'three-fourth',		'tb_three_fourth' );
	add_shortcode( 'tooltip',		'tb_tooltip' );
	add_shortcode( 'youtube',		'tb_youtube' );
	add_shortcode( 'vimeo',			'tb_vimeo' );
	add_shortcode( 'slideshow',		'tb_slideshow' );
	add_shortcode( 'slideshow_item',	'tb_slideshow_item' );
	add_shortcode( 'button',		'tb_button' );
	add_shortcode( 'tedtalk',		'tb_tedtalk' );
}

/*----------------------------------------------------------------*/
// Shortcode Formatter
/*----------------------------------------------------------------*/

function tb_shortcodes_formatter($content) {
	$block = join("|",array("tedtalk", "youtube", "vimeo", "columns", "one-half", "one-third", "two-third", "one-fourth", "three-fourth", "soundcloud", "button", "dropcap", "highlight", "checklist", "tabgroup", "tab", "accordion", "alert", "toggle", "one_half", "one_third", "one_fourth", "two_third", "three_fourth", "tagline_box", "pricing_table", "pricing_column", "pricing_price", "pricing_row", "pricing_footer", "content_boxes", "content_box", "slider", "slide", "testimonials", "testimonial", "progress", "person", "recent_posts", "recent_works", "alert", "fontawesome", "social_links", "clients", "client", "title", "separator", "tooltip", "fullwidth", "map", "counters_circle", "counter_circle", "counters_box", "counter_box", "flexslider", "blog", "imageframe", "images", "image", "sharing", "featured_products_slider", "products_slider", "slideshow", "slideshow_item"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);

	return $rep;
}

add_filter('the_content', 'tb_shortcodes_formatter');
add_filter('widget_text', 'tb_shortcodes_formatter');

/*----------------------------------------------------------------*/
// Button shortcode
// @since 1.0
/*----------------------------------------------------------------*/

function tb_button($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'size' => '',
			'color' => '',
			'link' => '',
			'target' => '',
		), 
		$atts
	);

	return '<a class="button sc ' . $atts['size'] . ' ' . $atts['color'] . '" href="' . $atts['link'] . '" target="' . $atts['target'] . '">' .do_shortcode($content). '</a>';
}

/*----------------------------------------------------------------*/
// TedTalk shortcode
// @since 1.0
/*----------------------------------------------------------------*/

function tb_tedtalk($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 1280,
			'height' => 720
		), 
		$atts
	);

	return '<div class="video-shortcode" style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><iframe title="TedTalk video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://embed.ted.com/talks/' . $atts['id'] . '.html?wmode=transparent" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';

}


/*----------------------------------------------------------------*/
// Youtube shortcode
// @since 1.0
/*----------------------------------------------------------------*/

function tb_youtube($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 1280,
			'height' => 720
		), 
		$atts
	);

	return '<div class="video-shortcode" style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '?rel=0&amp;wmode=transparent" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';

}

/*----------------------------------------------------------------*/
// Vimeo shortcode
// @since 1.0
/*----------------------------------------------------------------*/

function tb_vimeo($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 1280,
			'height' => 720
		),
		 $atts
	);
		
	return '<div class="video-shortcode" style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '?title=0&byline=0&portrait=0" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';

}

/*----------------------------------------------------------------*/
// Accordion Wrapper
// @since 1.0
/*----------------------------------------------------------------*/

function tb_accordion_wrapper( $atts, $content = null  ) {
	extract( shortcode_atts( 
		array(
			'group_name' => ''	
		), 
		$atts 
	) );
	return '<div class="accordion accordion-group'. esc_attr( $group_name ) .'">' . do_shortcode($content) . '</div>' . "\n";
}

/*----------------------------------------------------------------*/
// Toggle Single Item
// @since 1.0
/*----------------------------------------------------------------*/

function tb_toggle_item( $atts, $content = null  ) {
	$panelid = substr(md5(rand(0, 1000000)), 0, 3);
	extract( shortcode_atts( 
		array(
			'title' => '',
			'open' => '',
			'group_name' => ''		
		), 
		$atts 
	) );
	$active = '';
	if ($open == 'yes') {
		$active = ' active';
		$open = ' in';
	}
	return '<div class="toggle-panel panel">
		<div class="toggle-heading">
			<div class="toggle-toggle'. $active .'" data-target="#collapse-'. $panelid .'" data-toggle="collapse" data-parent=".accordion-group'. esc_attr( $group_name ) .'">
				<span class="arrow"></span>
				' . esc_attr( $title ) . '
			</div>
		</div>
		<div id="collapse-'. $panelid .'" class="collapse'. $open .'"><div class="toggle-content clearfix">'. do_shortcode($content) .'</div></div>
	</div>' . "\n";
}

/*----------------------------------------------------------------*/
// Alert Box
// @since 1.0
/*----------------------------------------------------------------*/

function tb_alert_box( $atts, $content = null  ) {
	extract( shortcode_atts( 
		array(
			'type' => '',
			'dismiss' => ''	
		), 
		$atts 
	));

	$dismiss_link = '';
	if ( $dismiss != 'no' ) {
		$dismiss = 'alert-dismissable';
		$dismiss_link = '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">x</a>';
	}

	if ( $type == "success" ) { $icon = '<i class="fa fa-thumbs-up fa-2x"></i>'; }
	elseif ( $type == "info" ) { $icon = '<i class="fa fa-question-circle fa-2x"></i>'; }
	elseif ( $type == "warning" ) { $icon = '<i class="fa fa-warning fa-2x"></i>'; }
	elseif ( $type == "danger" ) { $icon = '<i class="fa fa-exclamation-circle fa-2x"></i>'; }
	else { $icon = '<i class="fa fa-paperclip fa-2x"></i>'; }

	return '<div class="'.$dismiss.' alert alert-'. $type .' fade in">' . $icon . $dismiss_link . '<div class="alert-message">' . $content .'</div></div>' . "\n";
}

/*----------------------------------------------------------------*/
// Tabs Wrapper
// @since 1.0
/*----------------------------------------------------------------*/

function tb_tabgroup( $atts, $content = null ) {
		
	// Display Tabs
	$defaults = array(
		'layout' => ''
	);
	extract( shortcode_atts( $defaults, $atts ) );
	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	$tab_titles = array();
	if ( isset( $matches[1] ) ) { 
		$tab_titles = $matches[1]; 
	}

	$output = '';				
	if ( count( $tab_titles ) ) {
		if ( $layout == 'tabs-left' ) {
			$output .= '<div id="mytabs-' . rand(1, 100) . '" class="mytabs tabs-left clearfix">' . "\n";
		} else {
			$output .= '<div  id="mytabs-' . rand(1, 100) . '" class="mytabs tabs-top clearfix">' . "\n";
		}
		$output .= '<ul class="nav nav-tabs">';
		foreach ($tab_titles as $tab) {
			$output .= '<li><a href="#' . sanitize_title( $tab[0] ) . '" data-toggle="tab">' . $tab[0] . '</a></li>' . "\n";
		}
		$output .= '</ul>' . "\n";
		$output .= '<div class="tab-content">' . "\n";
		$output .= do_shortcode( $content );
		$output .= '</div>' . "\n";
		$output .= '</div>' . "\n";
	} else {
		$output .= do_shortcode( $content );
	}

	return $output;

}

/*----------------------------------------------------------------*/
// Tab Single Item
// @since 1.0
/*----------------------------------------------------------------*/
function tb_tab( $atts, $content = null ) {

	$defaults = array(
		'title' => ''
	);

	extract( shortcode_atts( $defaults, $atts ) );

	return '<div id="' . sanitize_title( $title ) . '" class="tab-pane fade">' . do_shortcode( $content ) . '</div>' . "\n";

}



/*----------------------------------------------------------------*/
// Columns
// @since 1.0
/*----------------------------------------------------------------*/

function tb_columns($atts, $content = null) {
	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="columns">' .do_shortcode($content). '</div>' . "\n";
		
}

/*----------------------------------------------------------------*/
// Column one_half
// @since 1.0
/*----------------------------------------------------------------*/

function tb_one_half($atts, $content = null) {

	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-6">' .do_shortcode($content). '</div>' . "\n";

}
	
/*----------------------------------------------------------------*/
// Column one_third
// @since 1.0
/*----------------------------------------------------------------*/

function tb_one_third($atts, $content = null) {

	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-4">' .do_shortcode($content). '</div>' . "\n";

}
	
/*----------------------------------------------------------------*/
// Column two_third
// @since 1.0
/*----------------------------------------------------------------*/

function tb_two_third($atts, $content = null) {
	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-8">' .do_shortcode($content). '</div>' . "\n";
		
}
	
/*----------------------------------------------------------------*/
// Column one_fourth
// @since 1.0
/*----------------------------------------------------------------*/
	
function tb_one_fourth($atts, $content = null) {

	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-3">' .do_shortcode($content). '</div>' . "\n";

}
	
/*----------------------------------------------------------------*/
// Column three_fourth
// @since 1.0
/*----------------------------------------------------------------*/

function tb_three_fourth($atts, $content = null) {

	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-9">' .do_shortcode($content). '</div>' . "\n";

}

/*----------------------------------------------------------------*/
// Tooltip
// @since 1.0
/*----------------------------------------------------------------*/
function tb_tooltip($atts, $content = null) {
	extract( shortcode_atts(
		array(
			'title' => 'none',
			'align' => 'top'	
		), 
		$atts 
	));

	return '<a href="#" class="tb-tooltip" data-toggle="tooltip" data-placement="' . $align . '" title="' . $title . '">' . $content . '</a>';
}

/*----------------------------------------------------------------*/
// Post Slide Wrapper
// @since 1.0
/*----------------------------------------------------------------*/

function tb_slideshow( $atts, $content = null  ) {
	extract( shortcode_atts( 
		array(
			'style' => ''
		), 
		$atts 
	) );

	$alt = '';
	if ($style == 'alt')
		$alt = ' alt';

	$output = '';
	$output .= '<div class="mainslider postslider' . $alt . '">' . "\n";
	$output .= '<div class="flexslider">' . "\n";
	$output .= '<ul class="slides">' . "\n";
	$output .= do_shortcode( $content );
	$output .= '</ul>' . "\n";
	$output .= '</div>' . "\n";
	$output .= '</div>' . "\n";

	return $output;
}

/*----------------------------------------------------------------*/
// Post Slide Single Item
// @since 1.0
/*----------------------------------------------------------------*/

function tb_slideshow_item( $atts, $content = null  ) {
	extract( shortcode_atts( 
		array(), 
		$atts 
	));

	$output = '';
	$output .= '<li>' . "\n";
	$output .= '<div class="slide-container">' . "\n";
	$output .= do_shortcode( $content );
	$output .= '</div>' . "\n";
	$output .= '</li>' . "\n";

	return $output;
}




?>