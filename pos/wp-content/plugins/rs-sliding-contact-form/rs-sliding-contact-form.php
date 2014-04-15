<?php
/*
	Plugin Name: RS Sliding Contact Form
	Author: Roman Sharf
	Description: Creates a sliding contact form. Needs the contact form 7 plugin
*/ 

add_action('wp_enqueue_scripts', 'rs_enqueue_scripts');
function rs_enqueue_scripts()
{
	wp_enqueue_script( 'slide_script', plugins_url( 'scripts/slide-script.js', __FILE__),array('jquery'));
	wp_enqueue_style( 'slide_styles', plugins_url( 'css/slide-styles.css', __FILE__));
}

add_action('rs_slide_contact_form', 'rs_contact_form');
function rs_contact_form ()
{	
	// If user is logged in and the contact form 7 plugin is installed
	if ( function_exists('wpcf7_install') && is_user_logged_in() )
		echo do_shortcode('[contact-form-7 id="104" title="Get Started"]');
}
?>