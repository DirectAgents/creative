<?php 

    /**
	 * Enqueue a custom script
	 *
	 */
    add_action( 'wp_enqueue_scripts', 'rs_include_custom_js' );
	function rs_include_custom_js() {
		wp_enqueue_script( 'customjs', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ));
	}

	add_filter('wpseo_breadcrumb_single_link', 'rs_bc_change');
	function rs_bc_change ($link_output, $link)
	{
		$string = '<a href="http://www.pos.com/dasite"';
		$replace = '<a href="http://www.pos.com"';
		return str_replace($string, $replace, $link_output);

	}
	
	/* --------- [TEMPORARY] Get Rid of DA in the links --------- */
	add_filter('post_link', 'format_url');
	add_filter('the_permalink', 'format_url');
	add_filter('term_link', 'format_url');
	add_filter('category_link', 'format_url');
	add_filter('author_link', 'format_url');
	add_filter('search_link', 'format_url');


	function format_url($url) 
	{
    	return str_replace('/dasite', '', $url);
	}

	add_action( 'template_redirect', 'fb_change_search_url_rewrite' );
	function fb_change_search_url_rewrite() 
	{
		if ( is_search() && ! empty( $_GET['s'] ) ) 
		{
			wp_redirect( "http://www.pos.com/search/" . urlencode( get_query_var( 's' ) ) );
			exit();
		}	
	}
	

	/* ----- Create a shortcode for the POS System sidebar Ad ------ */
	
	function render_pos_ad() {
		 $string = "
		<ul class='step-list' id='step-list'>
    		<li class='step step1'>
    			<div class='step-icon'></div>
    			<div class='step-cont'>
	        		<h4>Step 1</h4>
          			<p>
	          		Answer a Few Simple Questions
	          		</p>
	         	 <div class='step-cont'>
		    </li>

		    <li class='step step2'>
		   	 	<div class='step-icon'></div>
				<div class='step-cont'>		    
		          <h4>Step 2</h4>
		          <p>
		          Browse The Directory
		          </p>
		        <div class='step-cont'>
		    </li>

		    <li class='step step3'>
		    	<div class='step-icon'></div>
		    	<div class='step-cont'>
		          <h4>Step 3</h4>
		          <p>
		          Free POS Specialist Assistance
		          </p>
		        </div>
		    </li>
		   
		   <li class='bottom-module'>
		   		<h3 class='tagline-title'>The #1 Way to Find the Right POS System for your Business</h3>
		          <a class='button sc large blue' href='http://www.pos.com'>Find a System Now!</a>
		 	</li>
		</ul>";

	return $string;
}
add_shortcode ('pos_system_ad', 'render_pos_ad');
add_filter('widget_text', 'do_shortcode');

?>