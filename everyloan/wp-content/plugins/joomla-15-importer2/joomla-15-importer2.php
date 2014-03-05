<?php
/*
Plugin Name: Joomla 1.5 Importer 2
Plugin URI: http://wordpress.org/extend/plugins/joomla-15-importer/
Description: Migrate posts from a Joomla 1.5 2 database into Wordpress
Author: Eric Peterson (ePeterso2)
Author URI: http://www.epeterso2.com/
Version: 1.0.0
License: MIT - http://www.opensource.org/licenses/mit-license.php
*/

if ( !defined('WP_LOAD_IMPORTERS') )
	return;

// Load Importer API
require_once ABSPATH . 'wp-admin/includes/import.php';

if ( !class_exists( 'WP_Importer' ) ) {
	$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	if ( file_exists( $class_wp_importer ) )
		require_once $class_wp_importer;
}

/**
 * Joomla Importer
 *
 * @package WordPress
 * @subpackage Importer
 */

/**
 * Joomla Importer
 *
 * Will transfer posts from a single category in a Joomla database
 * to a single category of a Wordpress database.
 */
if ( class_exists( 'WP_Importer' ) ) {
class Joomla_Import2 extends WP_Importer {

	var $option_prefix = 'joomla-importer2.';

	var $posts = array ();
	var $file;

	function header()
	{
		$plugin_name = basename( dirname( __FILE__ ) );

		echo '<div style="background-color: #ffffff; float: right; width: 160px; margin: 5px; padding: 5px; border: 1px solid black;">';
		echo '<p align="center"><a href="http://www.girlchoir.org" target="_blank"><img src="' . WP_PLUGIN_URL . '/' . $plugin_name . '/gcsf-logo.gif" border="0"/></a></p>';
		echo <<<EOF
<p align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="P7U8C4L5QHT4Y">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img style="margin: 0 auto;" alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></p>

<p style="font-size: 10px;">
I wrote this plugin to migrate the website of <b><a href="http://www.girlchoir.org">The Girl Choir of South Florida</a></b>.
You can see and hear the choir in action at
their <b><a href="http://www.youtube.com/girlchoir" target="_blank">YouTube channel</a></b>.
They're amazing!
</p><p style="font-size: 10px;">
The best way to say "thank you" is to make a donation to the choir by clicking the <u>Donate</u> button above.
You and the choir will both be glad you did.
All donations received from this plugin
will go towards scholarships for needy families.
</p><p style="font-size: 10px;">
If you're not sure what to contribute, ask yourself what you would have paid someone to convert or retype <u>all</u> of your migrated articles for you,
and donate that amount. Or $10 (US) ... whichever is greater.
</p><p style="font-size: 10px;">
The Girl Choir of South Florida is a nonprofit 501(c)(3) organization, and your contribution may be tax-deductible.
Details of the choir's charitable status are available at <b><a href="http://www.girlchoir.org" target="_blank">http://www.girlchoir.org</a></b>.
</p>
EOF;
		echo '</div>';

		echo '<div class="wrap" style="float: left;">';

		screen_icon();
		echo '<h2>'.__('Import Joomla 1.5 2', 'joomla-importer').'</h2>';
	}

	function footer() {
		echo '</div>';
	}

	function dispatch()
	{
		if (empty ($_POST['step']))
			$step = 0;
		else
			$step = (int) $_POST['step'];

		$this->header();

		switch ($step) {
			case 0 :
				$this->controller_process_db_info();
				break;
			case 1 :
				$this->controller_process_category_info();
				break;
		}

		$this->footer();
	}

	function Joomla_Import() {
		// Nothing.
	}

	function controller_process_db_info()
	{
		$db_info_option = $this->option_prefix . 'db_info';

		add_option( $db_info_option, array(), null, 'no' );

		if ( empty( $_POST[ 'action' ] ) )
		{
			$this->view_db_page( get_option( $db_info_option ), null );
			return;
		}

		$step   = $_POST[ 'step' ];
		$action = $_POST[ 'action' ];

		if ( ! check_admin_referer( 'connect', 'step0' ) )
		{
			$this->view_db_page( get_option( $db_info_option ), 'Authorization failure' );
			return;
		}

		update_option( $this->option_prefix . 'db_info', $this->get_db_info() );

		$this->view_category_page($this->get_wordpress_categories(), get_users_of_blog() );
	}

	function get_db_info()
	{
		$info = array();

		$info[ 'hostname' ] = empty( $_POST[ 'hostname' ] ) ? 'localhost' : $_POST[ 'hostname' ];
		$info[ 'port' ]     = empty( $_POST[ 'port' ] )     ? 3306        : (int) $_POST[ 'port' ];
		$info[ 'database' ] = empty( $_POST[ 'database' ] ) ? null        : $_POST[ 'database' ];
		$info[ 'username' ] = empty( $_POST[ 'username' ] ) ? null        : $_POST[ 'username' ];
		$info[ 'password' ] = empty( $_POST[ 'password' ] ) ? null        : $_POST[ 'password' ];
		$info[ 'prefix'   ] = empty( $_POST[ 'prefix' ] )   ? ''      : $_POST[ 'prefix' ];
                $info[ 'update_existing'   ] = empty( $_POST[ 'update_existing' ] )   ? 0      : $_POST[ 'update_existing' ];
		
		return $info;
	}

	function controller_process_category_info()
	{
		if ( ! check_admin_referer( 'import', 'step1' ) )
		{
			$this->view_error_message( 'Authorization failure' );
			return;
		}

		$wordpress_category_ids = $this->get_wordpress_category_ids();
		$user_id = $_POST[ 'username' ];
		$areyousure = $_POST[ 'areyousure' ] == 'yes' ? 1 : 0;

		$db_info = get_option( $this->option_prefix . 'db_info' );

		$wordpress_categories = $this->get_wordpress_categories();
		$users = get_users_of_blog();

		$result = array();
		$error = array();

		if ( ! $areyousure )
		{
			$error[] = 'You must check the confirmation box to begin the import.';
		}

		elseif ( sizeof( $wordpress_category_ids ) == 0 )
		{
			$error[] = 'No Wordpress categories were selected for import.';
		}
		
		else
		{
			$wp_cats = array();

			foreach ( $wordpress_category_ids as $wp_cat_id )
			{
				$wp_cats[] = get_category( $wp_cat_id )->name;
			}

			$result[] = 'Exporting from Joomla section/category:</p><p>Importing into Wordpress categories: ' . implode( ', ', $wp_cats ) . '</p><p>Setting author to Wordpress user: ' . get_userdata( $user_id )->display_name;

			$export_result = $this->export_content();

			foreach ( $export_result[ 'result' ] as $result_msg )
			{
				$result[] = $result_msg;
			}

			foreach ( $export_result[ 'error' ] as $error_msg )
			{
				$error[] = $error_msg;
			}

			if ( sizeof( $export_result[ 'error' ] ) == 0 )
			{
				$import_result = $this->import_content( $db_info, $export_result[ 'articles' ], $wordpress_category_ids, $user_id );

				foreach ( $import_result[ 'result' ] as $result_msg )
				{
					$result[] = $result_msg;
				}

				foreach ( $import_result[ 'error' ] as $error_msg )
				{
					$error[] = $error_msg;
				}
			}
		}
		
		$this->view_category_page( $wordpress_categories, $users, $result, $error );
	}

	function get_wordpress_category_ids()
	{
		$ids = array();

		$categories = (int) $_POST[ 'wp_categories' ];

		for ( $c = 0; $c < $categories; ++$c )
		{
			if ( isset( $_POST[ 'wp_category_' . $c ] ) )
			{
				$ids[] = (int) $_POST[ 'wp_category_' . $c ];
			}
		}

		return $ids;
	}

	function export_content()
	{
		$result = array( 'result' => array(), 'error' => array(), 'articles' => array() );

		$db_info = get_option( $this->option_prefix . 'db_info' );
		$prefix = $db_info[ 'prefix' ];
		$db = new mysqli( $db_info[ 'hostname' ], $db_info[ 'username' ], $db_info[ 'password' ], $db_info[ 'database' ], $db_info[ 'port' ] );

		if ( mysqli_connect_errno() )
		{
			$result[ 'error' ][] = 'Unable to connect to database: ' . mysqli_connect_error();
			return result;
		}

		if ( ! $stmt = $db->prepare( "SET NAMES utf8" ) )
		{
			$result[ 'error' ][] = 'Cannot set system to use UTF8: ' . $db->error;
			return $result;
		}

		$stmt->execute();

		$query = "SELECT con.article_id as id, con.title, con.created, con.summary, con.content, cat.section_id as section_id FROM `" . $prefix . 'news` con INNER JOIN `'
			. $prefix . 'news_sections` cat ON con.section = cat.section ORDER BY con.created ASC';

		if ( ! $stmt = $db->prepare( $query ) )
		{
			$result[ 'error' ][] = 'Error in query: ' . $db->error;
			return $result;
		}

		$stmt->execute();
		$stmt->bind_result( $id, $title, $created, $summary, $content, $section_id );

		while ( $stmt->fetch() )
		{
			$article = array(
                            'id' => $id,
                            'title' => $title,
                            'created' => $created,
                            'summary' => $summary,
                            'content' => $content,
                            'section_id' => $section_id
			);

			$result[ 'articles' ][ $id ] = $article;
		}

		$stmt->close();
		$db->close();

		$result[ 'result' ][] = 'Exported ' . sizeof( $result[ 'articles' ] ) . ' articles from Joomla';

		return $result;
	}

	function import_content( $db_info, $articles, $wordpress_category_ids, $user_id )
	{
                $update_existing = (bool)$db_info["update_existing"];
		$result = array( 'result' => array(), 'error' => array() );

		$count = 0;
                $count2 = 0;
		foreach ( $articles as $article )
		{	
			$post = array(
				'post_status' => 'publish',
				'post_type' => 'post',
				'post_author' => $user_id,
				'post_title' => $article[ 'title' ],
				'post_content' => $article[ 'summary' ] . "<br/>" . $article[ 'content' ],
				'post_category' => $wordpress_category_ids,
				'post_date' => $article[ 'created' ],
			);

                        if($update_existing && $this->post_already_exists($article["title"])) {
                            $insert_post = false;
                            $post["ID"] = $this->get_post_id_by_name($article["title"]);
                            $post_id = wp_update_post($post);
                            $count2++;
                        } else {
                            $post_id = wp_insert_post( $post );
                            if($post_id>0)	add_post_meta($post_id, "imported_joomla_link", "http://www.everyloan.com/news.php?x=" . $article["section_id"] . "&article=" . $article['id'], true);
                            $count++;
                        }
		}

		$result[ 'result' ][] = 'Inserted ' . $count . ' new posts';
                if($update_existing) {
                    $result[ 'result' ][] = 'Updated ' . $count2 . ' existing posts';
                }

		return $result;
	}

        function post_already_exists($page_title) {
            $post = $this->get_post_by_name($page_title);
            if($post)   return true;
            return false;
        }

        function get_post_by_name($page_title, $output = OBJECT) {
            global $wpdb;
            $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='post'", $page_title ));
            if ( $post )
                return get_post($post, $output);
            return null;
        }

        function get_post_id_by_name($page_title, $output = OBJECT) {
            global $wpdb;
            $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='post'", $page_title ));
            if ( $post )    return $post;
            return null;
        }

	function get_wordpress_categories()
	{
		return get_categories( array (
			'orderby' => 'name',
			'order' => 'asc',
			'hide_empty' => 0,
		));
	}

	function view_db_page( $db_info = array(), $error = null )
	{
		if ( ! is_null( $error ) )
		{
			$this->view_error_message( $error );
		}

		echo '<h3>Joomla Database Connection Info</h3>';

		echo '<form action="" method="post">';

		echo '<table class="form-table">';
		echo '<tr><th scope="row">Hostname</th><td><input name="hostname" type="text" size="50" value="' . $db_info[ 'hostname' ] . '" /></td></tr>';
		echo '<tr><th scope="row">Port</th><td><input name="port" type="text" size="50" value="' . $db_info[ 'port' ] . '" /></td></tr>';
		echo '<tr><th scope="row">Database</th><td><input name="database" type="text" size="50" value="' . $db_info[ 'database' ] . '" /></td></tr>';
		echo '<tr><th scope="row">Username</th><td><input name="username" type="text" size="50" value="' . $db_info[ 'username' ] . '" /></td></tr>';
		echo '<tr><th scope="row">Password</th><td><input name="password" type="password" size="50" value="' . $db_info[ 'password' ] . '" /></td></tr>';
		echo '<tr><th scope="row">Joomla Table Prefix</th><td><input name="prefix" type="text" size="50" value="' . $db_info[ 'prefix' ] . '" /></td></tr>';
                echo '<tr><th scope="row">Update Existing Posts</th><td><input name="update_existing" type="checkbox" value="1" ' . ((bool)$db_info["update_existing"] ? "checked" : "") . '/></td></tr>';
		echo '<tr><th scope="row">&nbsp;</th><td><input class="button-primary" name="submit" value="Connect to Joomla Database" type="submit" /></td></tr>';
		echo '</table>';

		echo '<input name="step" type="hidden" value="0" />';
		echo '<input name="action" type="hidden" value="connect" />';
		wp_nonce_field( 'connect', 'step0' );

		echo '</form>';
	}

	function view_category_page( $wordpress_categories = array(), $users = array(), $result = array(), $error = array() )
	{
		foreach ( $result as $result_msg )
		{
			$this->view_warning_message( $result_msg );
		}

		foreach ( $error as $error_msg )
		{
			$this->view_error_message( $error_msg );
		}

		echo '<h3>Select Import and Export Categories</h3>';

		echo '<form action="" method="post">';

		echo '<table class="form-table">';

		echo '<tr><th scope="row">Import into Wordpress Categories</th><td>';

		$cat_num = 0;
		foreach ( $wordpress_categories as $cat )
		{
			echo '<input name="wp_category_' . $cat_num++ . '" type="checkbox" value="' . $cat->cat_ID . '"> ' . $cat->name . '<br />';
		}

		echo '</td></tr>';

		echo '<tr><th scope="row">Import as Wordpress User</th><td><select name="username">';

		foreach ( $users as $user )
		{
			echo '<option value="' . $user->user_id . '">' . $user->display_name . ' (' . $user->user_login . ')</option>';
		}

		echo '<tr><th scope="row">Confirm Your Selections</th><td><input name="areyousure" value="yes" type="checkbox" /> My selections are correct</td></tr>';
		echo '<tr><th scope="row">&nbsp;</th><td><input class="button-primary" name="submit" value="Import Content" type="submit" /></td></tr>';
		echo '</table>';

		echo '<input name="wp_categories" type="hidden" value="' . $cat_num . '" />';
		echo '<input name="step" type="hidden" value="1" />';
		echo '<input name="action" type="hidden" value="import" />';
		wp_nonce_field( 'import', 'step1' );

		echo '</form>';

		echo '<form action="" method="post">';
		echo '<table class="form-table">';
		echo '<tr><th scope="row">&nbsp;</th><td><input name="submit" value="Edit Joomla Database Info" type="submit" /></td></tr>';
		echo '</table>';
		echo '</form>';
	}

	function view_error_message( $message )
	{
		echo '<div id="message" class="error"><p>' . $message . '</p></div>';
	}

	function view_warning_message( $message )
	{
		echo '<div id="message" class="updated"><p>' . $message . '</p></div>';
	}
}

$joomla_import = new Joomla_Import2();

register_importer('joomla2', __('Joomla 1.5 2', 'joomla-importer2'), __('Import articles from a Joomla 1.5 2 database into Wordpress categories.', 'joomla-importer2'), array ($joomla_import, 'dispatch'));

} // class_exists( 'WP_Importer' )

function joomla_importer_init2() {
    load_plugin_textdomain( 'joomla-importer2', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'init', 'joomla_importer_init2' );

