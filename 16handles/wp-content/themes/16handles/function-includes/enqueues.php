<?php
/*-----------------------------------------------------------------------------------*/
/*	Register and Enqueue Template Scripts and Styles
/*-----------------------------------------------------------------------------------*/

// <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
function dt_add_jquery() {
  
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' );
    wp_enqueue_script( 'jquery' );

} 

// <script type="text/javascript" src="js/jquery-ui.js"></script>
function dt_add_jquery_ui() {
  
  wp_register_script( 'jquery_ui', get_template_directory_uri() . '/js/jquery-ui.js', false, false, true );
  wp_enqueue_script( 'jquery_ui' );

} 
//<script type="text/javascript" src="js/jquery.ui.accordion.js"></script>
function dt_add_ui_accordion() {
  
  wp_register_script( 'ui_accordion', get_template_directory_uri() . '/js/jquery.ui.accordion.js', array( 'jquery','jquery_ui' ), false, true );
  wp_enqueue_script( 'ui_accordion' );
  
}

// <script type="text/javascript" src="js/modernizr.js"></script>
function dt_add_modernizr() {
  
  wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, false, true );
  wp_enqueue_script( 'modernizr' );
  
}

// <!-- Latest version (3.0.6) of jQuery Mouse Wheel by Brandon Aaron
//      You will find it here: http://brandonaaron.net/code/mousewheel/demos -->
// <script src="js/smooth/jquery.mousewheel.min.js" type="text/javascript"></script>

function dt_add_mousewheel() {
  
  wp_register_script( 'mousewheel', get_template_directory_uri() . '/js/smooth/jquery.mousewheel.min.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'mousewheel' );
  
}

// <!-- jQuery Kinectic (1.5) used for touch scrolling -->
// <script src="js/smooth/jquery.kinetic.js" type="text/javascript"></script>

function dt_add_kinetic() {
  
  wp_register_script( 'kinetic', get_template_directory_uri() . '/js/smooth/jquery.kinetic.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'kinetic' );
  
}

// <!-- Smooth Div Scroll 1.3 minified-->
// <script src="js/smooth/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
function dt_add_smoothdivscroll() {
  
  wp_register_script( 'smoothdivscroll', get_template_directory_uri() . '/js/smooth/jquery.smoothdivscroll-1.3-min.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'smoothdivscroll' );
  
}

// <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
function dt_add_carouFredSel() {
  
  wp_register_script( 'carouFredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'carouFredSel' );
  
}

// <script type="text/javascript" src="js/jquery.validate.js"></script>
function dt_add_validate() {
  
  wp_register_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'validate' );
  
}

// <!-- custom youtube player plugin -->
// <script type='text/javascript' src='js/jQuery.tubeplayer.min.js'></script>
function dt_add_tubeplayer() {
  
  wp_register_script( 'tubeplayer', get_template_directory_uri() . '/js/jQuery.tubeplayer.min.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'tubeplayer' );
  
}
// <!-- custom form elements plugin -->
// <script type="text/javascript" src="js/custom-form-elements.js"></script> 
function dt_add_custom_form_elements() {
  
  wp_register_script( 'custom-form-elements', get_template_directory_uri() . '/js/custom-form-elements.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'custom-form-elements' );
  
}

// <!-- center element plugin -->
// <script type="text/javascript" src="js/centreIt-1.1.5.js"></script>
function dt_add_centreIt() {
  
  wp_register_script( 'centreIt', get_template_directory_uri() . '/js/centreIt-1.1.5.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'centreIt' );
  
}

// <!-- custom scrollbars plugin -->
// <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" />
// <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
function dt_add_mCustomScrollbar() {
  //css:
  wp_register_style( 'mCustomScrollbar-css', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css');
  wp_enqueue_style( 'mCustomScrollbar-css' );
  //js:
  wp_register_script( 'mCustomScrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'mCustomScrollbar-js' );
  
}

function dt_add_scrollto() {
  
  wp_register_script( 'scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'scrollto' );
  
}

// <script src="js/jquery-scrollspy.js"></script>
function dt_add_scrollspy() {
  
  wp_register_script( 'scrollspy', get_template_directory_uri() . '/js/jquery-scrollspy.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'scrollspy' );
  
}

function dt_add_bootstrap_scrollspy() {
  
  wp_register_script( 'bootstrap-scrollspy', get_template_directory_uri() . '/js/bootstrap-scrollspy.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'bootstrap-scrollspy' );
  
}

// <!-- placeholder IE fixer plugin -->
// <script src="js/Placeholders.min.js"></script>
function dt_add_Placeholders() {
  
  wp_register_script( 'Placeholders', get_template_directory_uri() . '/js/Placeholders.min.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'Placeholders' );
  
}

function dt_add_timeago() {
  
  wp_register_script( 'timeago', get_template_directory_uri() . '/js/jquery.timeago.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'timeago' );
  
}

// <!-- Site Animations -->
// <script type="text/javascript" src="js/functions.js"></script>

function dt_add_functions() {
  
  wp_register_script( 'functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'functions' );
  wp_localize_script( 'functions', 'headJS', array( 'blog_url'=>get_bloginfo('url'), 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'templateurl' => get_template_directory_uri(), 'posts_per_page' => get_option('posts_per_page'), 'tax_percentage' => of_get_option('tax_percentage') ));
}

// <!-- This should only be included on the locations page. Should be controller by the backend. -->
// <script type="text/javascript" src="https://www.google.com/jsapi"></script>

function dt_add_google_jsapi() {
  
  wp_register_script( 'google_jsapi', 'https://www.google.com/jsapi', false, false, true );
  wp_enqueue_script( 'google_jsapi' );
  
}

// <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
function dt_add_google_maps() {
  
  wp_register_script( 'google_maps', 'http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false', false, false, true );
  wp_enqueue_script( 'google_maps' );
  
}

// <script type="text/javascript" src="js/locations.js"></script>
function dt_add_locations() {
  
  wp_register_script( 'locations', get_template_directory_uri() . '/js/locations.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'locations' );
  
}
// <!-- END OF Locations javascript -->

// <script type="text/javascript" src="js/mustache.js"></script>
function dt_add_mustache() {
  
  wp_register_script( 'mustache', get_template_directory_uri() . '/js/mustache.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'mustache' );
  
}




/*-----------------------------------------------------------------------------------*/
/*	wp_head() scripts and styles GENERAL (the rest in the header file)
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'dt_add_jquery', 5 );
add_action( 'wp_enqueue_scripts', 'dt_add_jquery_ui', 10 );
add_action( 'wp_enqueue_scripts', 'dt_add_ui_accordion', 15 );
add_action( 'wp_enqueue_scripts', 'dt_add_modernizr', 20 );
add_action( 'wp_enqueue_scripts', 'dt_add_mousewheel', 25 );
add_action( 'wp_enqueue_scripts', 'dt_add_kinetic', 30 );
add_action( 'wp_enqueue_scripts', 'dt_add_smoothdivscroll', 35 );
add_action( 'wp_enqueue_scripts', 'dt_add_carouFredSel', 40 );
add_action( 'wp_enqueue_scripts', 'dt_add_validate', 45 );
add_action( 'wp_enqueue_scripts', 'dt_add_tubeplayer', 50 );
add_action( 'wp_enqueue_scripts', 'dt_add_custom_form_elements', 55 );
add_action( 'wp_enqueue_scripts', 'dt_add_centreIt', 60 );
add_action( 'wp_enqueue_scripts', 'dt_add_mCustomScrollbar', 65 );
add_action( 'wp_enqueue_scripts', 'dt_add_scrollto', 70 );
add_action( 'wp_enqueue_scripts', 'dt_add_scrollspy', 70 );
add_action( 'wp_enqueue_scripts', 'dt_add_bootstrap_scrollspy', 70 );
add_action( 'wp_enqueue_scripts', 'dt_add_Placeholders', 75 );
add_action( 'wp_enqueue_scripts', 'dt_add_timeago', 75 );
add_action( 'wp_enqueue_scripts', 'dt_add_functions', 80 );

//locations:
// if (is_post_type_archive('locations')){
  add_action( 'wp_enqueue_scripts', 'dt_add_google_jsapi', 85 );
  add_action( 'wp_enqueue_scripts', 'dt_add_google_maps', 90 );
  add_action( 'wp_enqueue_scripts', 'dt_add_locations', 95 );  
// }
// add_action( 'wp_enqueue_scripts', 'dt_add_google_jsapi', 85 );
// add_action( 'wp_enqueue_scripts', 'dt_add_google_maps', 90 );
// add_action( 'wp_enqueue_scripts', 'dt_add_locations', 95 );


add_action( 'wp_enqueue_scripts', 'dt_add_mustache', 100 );


?>