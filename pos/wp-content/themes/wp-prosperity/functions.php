<?php
/*-----------------------------------------------------------------------------------*/
// THEME FUNCTIONS FILE
//
// Sets up the theme and provides some helper functions, which are used in the
// theme as custom template tags. Others are attached to action and filter
// hooks in WordPress to change core functionality.
//
// When using a child theme (see http://codex.wordpress.org/Theme_Development
// and http://codex.wordpress.org/Child_Themes), you can override certain
// functions (those wrapped in a function_exists() call) by defining them first
// in your child theme's functions.php file. The child theme's functions.php
// file is included before the parent theme's file, so the child theme
// functions would be used.
//
// Functions that are not pluggable (not wrapped in function_exists()) are
// instead attached to a filter or action hook.
//
// For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
//
// @since 1.0
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
// LOCATE AND REQUIRE FILES NEEDED TO RUN THE THEME
// @since 1.0
/*-----------------------------------------------------------------------------------*/

locate_template('theme-admin.php', true, true );
locate_template('theme-styles.php', true, true );
locate_template('theme-widgets.php', true, true );
locate_template('theme-js.php', true, true );
locate_template('theme-images.php', true, true );
locate_template('theme-custom-functions.php', true, true );
locate_template('theme-shortcodes.php', true, true );



/*-----------------------------------------------------------------------------------*/
// THEME SET-UP
// Sets up theme defaults and registers the various WordPress features that the theme supports.
// @uses load_theme_textdomain() for translation/localization support.
// @uses add_theme_support() to add support for automatic feed links, post formats, and post thumbnails.
// @uses register_nav_menu() to add support for a navigation menu.
// @uses set_post_thumbnail_size() To set a custom post thumbnail size.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('after_setup_theme', 'themebeagle_setup');
function themebeagle_setup() {

	 // Makes WP-Prosperity available for translation.
	 // Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'themebeagle', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Adds support for Jetpack Infinite Scroll
	add_theme_support( 'infinite-scroll', array(
		'footer_widgets'	=> true,
		'container'		=> 'content'
	) );

	// Switches default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// This theme supports all available post formats by default - see http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array( 'audio', 'gallery', 'image', 'link', 'quote', 'video' ));

	// Register Nav Menus
	register_nav_menus(array(
		'topnav' => __( 'Top Bar Navigation', 'themebeagle' ),
		'catnav' => __( 'Header Navigation', 'themebeagle' ),
		'fixednav' => __( 'Fixed Navigation Bar', 'themebeagle' )
	));

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}



/*-----------------------------------------------------------------------------------*/
// ACTION HOOKS
// @since 1.0
/*-----------------------------------------------------------------------------------*/

// This hook executes just before the </head> tag.
function themebeagle_head() { do_action('themebeagle_head'); }

// This hook executes just after the .site-branding div class closing tag.
function themebeagle_after_branding() { do_action('themebeagle_after_branding'); }

// This hook executes just before the .site-container div class.
function themebeagle_before_site_container() { do_action('themebeagle_before_site_container'); }

// This hook executes just before the .site-inner div class.
function themebeagle_before_site_inner() { do_action('themebeagle_before_site_inner'); }

// This hook executes just after the .site-content div class opening tag.
function themebeagle_site_content() { do_action('themebeagle_site_content'); }

// This hook executes just before the .site-content div class closing tag.
function themebeagle_site_content_bottom() { do_action('themebeagle_site_content_bottom'); }

// This hook executes just before the .footer-widgets div class opening tag.
function themebeagle_above_footer() { do_action('themebeagle_above_footer'); }

// This hook executes just before the #comments div class opening tag.
function themebeagle_before_comments() { do_action('themebeagle_before_comments'); }



/*-----------------------------------------------------------------------------------*/
// REGISTER WIDGET AREAS
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'themebeagle_widgets_init' );
function themebeagle_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Sidebar-Wide Top', 'themebeagle' ),
		'id'            => 'sidebar-wide-top',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title widgettitle">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Sidebar-Wide Bottom-Left', 'themebeagle' ),
		'id'            => 'sidebar-wide-bottom-left',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title widgettitle">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Sidebar-Wide Bottom-Right', 'themebeagle' ),
		'id'            => 'sidebar-wide-bottom-right',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title widgettitle">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Sidebar-Narrow', 'themebeagle' ),
		'id'            => 'sidebar-narrow',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title widgettitle">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Footer Widgets Left', 'themebeagle' ),
		'id'            => 'footer-widgets-left',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title widgettitle">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Footer Widgets Center', 'themebeagle' ),
		'id'            => 'footer-widgets-center',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title widgettitle">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Footer Widgets Right', 'themebeagle' ),
		'id'            => 'footer-widgets-right',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title widgettitle">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Single Post - Bottom', 'themebeagle' ),
		'id'            => 'single-post-bottom',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title widgettitle">',
		'after_title'   => '</h2>',
	));
}



/*-----------------------------------------------------------------------------------*/
// FEATURED PAGES SLIDER
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('themebeagle_before_site_inner', 'tb_featured_pages');
function tb_featured_pages() {

	global $post;

	if ( is_singular() )
		$featpageon = get_post_meta($post->ID, 'tb_featured_pages', true);

	if ( is_home() && !is_paged() && tb_option('featured_pages') )
		get_template_part( 'featured-pages' );

	if ( is_singular() && $featpageon )
		get_template_part( 'featured-pages' );
}



/*-----------------------------------------------------------------------------------*/
// WIDE FEATURED CONTENT SLIDER
// @since 1.0
/*----------------------------------------------------------------------------------*/

add_action('themebeagle_before_site_inner', 'tb_featured_wide');
function tb_featured_wide() {

	global $post;
	$featuredposts = tb_featuredposts();

	if ( is_singular() )
		$featpostson = get_post_meta($post->ID, 'tb_featured_slider', true);

	if ( is_singular() )
		$slidertype = get_post_meta($post->ID, 'tb_featured_slider_type', true);

	if ( is_home() && !is_paged() && $featuredposts && tb_option('home_featured_posts') == 'wide-slider' )
		get_template_part( 'featured-wide' );

	if ( is_singular() && $featuredposts && $featpostson && $slidertype == 'wide-slider' )
		get_template_part( 'featured-wide' );

}



/*-----------------------------------------------------------------------------------*/
// NARROW FEATURED CONTENT SLIDER
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('themebeagle_site_content', 'tb_featured_narrow');
function tb_featured_narrow() {

	global $post;
	$featuredposts = tb_featuredposts();

	if ( is_singular() )
		$featpostson = get_post_meta($post->ID, 'tb_featured_slider', true);

	if ( is_singular() )
		$slidertype = get_post_meta($post->ID, 'tb_featured_slider_type', true);

	if ( is_home() && !is_paged() && $featuredposts && tb_option('home_featured_posts') == 'narrow-slider' )
		get_template_part( 'featured' );

	if ( is_singular() && $featuredposts && $featpostson && $slidertype == 'narrow-slider' )
		get_template_part( 'featured' );
}



/*-----------------------------------------------------------------------------------*/
// ADD SOCIAL MEDIA LINKS TO USER PROFILE PAGE
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('user_contactmethods','add_custom_contactmethod',10,1);
function add_custom_contactmethod( $contactmethods ) {

	// Remove AIM, Yahoo and Jabber
	if ( isset( $contactmethods['aim'] ) )
		unset( $contactmethods['aim'] );
	if ( isset( $contactmethods['yim'] ) )
		unset( $contactmethods['yim'] );
	if ( isset( $contactmethods['jabber'] ) )
		unset( $contactmethods['jabber'] );

	// Add New Contact Fields
	if ( !isset( $contactmethods['twitter'] ) )
		$contactmethods['twitter'] = __( 'Twitter Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['facebook'] ) )
		$contactmethods['facebook'] = __( 'Facebook Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['googleplus'] ) )
		$contactmethods['googleplus'] = __( 'Google+ Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['linkedin'] ) )
		$contactmethods['linkedin'] = __( 'LinkedIn Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['instagram'] ) )
		$contactmethods['instagram'] = __( 'Instagram Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['pinterest'] ) )
		$contactmethods['pinterest'] = __( 'Pinterest Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['flickr'] ) )
		$contactmethods['flickr'] = __( 'Flickr Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['youtube'] ) )
		$contactmethods['youtube'] = __( 'Youtube Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['dribble'] ) )
		$contactmethods['dribbble'] = __( 'Dribbble Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['stumbleupon'] ) )
		$contactmethods['stumbleupon'] = __( 'StumbleUpon Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['tumblr'] ) )
		$contactmethods['tumblr'] = __( 'Tumblr Profile URL', 'themebeagle' );
	if ( !isset( $contactmethods['github'] ) )
		$contactmethods['github'] = __( 'GitHub Profile URL', 'themebeagle' );

	return $contactmethods;
}



/*-----------------------------------------------------------------------------------*/
// ADD EXCERPT FIELD TO PAGES
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_post_type_support( 'page', 'excerpt' );



/*-----------------------------------------------------------------------------------*/
// FUNCTIONS TO ADD TAGS FIELD TO PAGES
// @since 1.0
/*-----------------------------------------------------------------------------------*/

// add tag support to pages
function tb_tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tb_tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tb_tags_support_all');
add_action('pre_get_posts', 'tb_tags_support_query');



/*-----------------------------------------------------------------------------------*/
// LIMIT NUMBER OF WORDS IN POST EXCERPT
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter( 'excerpt_length', 'tb_excerpt_length', 999 );
function tb_excerpt_length( $length ) {
	$excerpt = tb_option('excerpt_length');
	return $excerpt;
}

add_filter('excerpt_more', 'tb_new_excerpt_more');
function tb_new_excerpt_more( $more ) {
	return ' [...]';
}



/*-----------------------------------------------------------------------------------*/
// LIST PINGS/TRACKBACKS
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function list_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
        <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> | <?php comment_date(); ?>
<?php }



/*-----------------------------------------------------------------------------------*/
// ADD CATEGORY SLUG IN BODY AND POST CLASS.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('post_class', 'cat_slug_class');
function cat_slug_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes[] = $category->slug;
       	 	return $classes;
}



/*-----------------------------------------------------------------------------------*/
// DISPLAY NAVIGATION TO NEXT/PREVIOUS SET OF POSTS
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'themebeagle_paging_nav' ) ) :
function themebeagle_paging_nav() {

	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;

	if ( tb_option('infinite_scroll') ) { ?>
		<div id="next-posts">
			<?php next_posts_link( __( 'Load More Entries', 'themebeagle' ) ); ?>
		</div>
	<?php } else { ?>
		<nav id="nav-below" class="pagination paging-navigation" role="navigation">
			<?php if ( function_exists('wp_pagenavi') ) { ?>
				<?php wp_pagenavi(); ?>
			<?php } else { ?>
				<div class="nav-links clearfix">
					<?php if ( get_next_posts_link() ) : ?>
						<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older Posts', 'themebeagle' ) ); ?></div>
					<?php endif; ?>
					<?php if ( get_previous_posts_link() ) : ?>
						<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer Posts <span class="meta-nav">&rarr;</span>', 'themebeagle' ) ); ?></div>
					<?php endif; ?>
				</div><!-- .nav-links -->
			<?php } ?>
		</nav><!-- .pagination -->
	<?php }
}
endif;



/*-----------------------------------------------------------------------------------*/
// DISPLAY NAVIGATION TO NEXT/PREVIOUS POSTS
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'themebeagle_post_nav' ) ) :
function themebeagle_post_nav() {

	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>

	<nav class="pagination post-navigation" role="navigation">
		<div class="nav-links">
			<?php if ( !empty($next) ) { ?>
				<div class="alignleft">
					<a href="<?php echo get_permalink($next->ID); ?>" title="<?php echo $next->post_title; ?>">
						<i class="fa fa-chevron-left"></i><span class="nav-link-text"><?php echo $next->post_title; ?></span>
					</a>
				</div>
			<?php }
			if ( !empty($previous) ) { ?>
				<div class="alignright">
					<a href="<?php echo get_permalink($previous->ID); ?>" title="<?php echo $previous->post_title; ?>">
						<span class="nav-link-text"><?php echo $previous->post_title; ?></span><i class="fa fa-chevron-right"></i>
					</a>
				</div>
			<?php } ?>
		</div><!-- .nav-links -->
	</nav><!-- .pagination -->

<?php }
endif;



/*-----------------------------------------------------------------------------------*/
// ENTRY DATE
// Print HTML with date information for current post.
// Create your own themebeagle_entry_date() to override in a child theme.
// @since 1.0
// @param boolean $echo (optional) Whether to echo the date. Default true.
// @return string The HTML-formatted post date.
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'themebeagle_entry_date' ) ) :
function themebeagle_entry_date( $echo = true ) {

	$format_prefix = '%2$s';

	$date = sprintf(
		'<time class="entry-date" itemprop="datePublished" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;



/*-----------------------------------------------------------------------------------*/
// ENTRY META TOP
// Print HTML with meta information for current post: categories, tags, comments, 
// author, and date.
// Create your own themebeagle_entry_meta() to override in a child theme.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'themebeagle_entry_meta' ) ) :
function themebeagle_entry_meta() {

	$postmeta = tb_option('postmeta');

	echo '<div class="entry-meta">';

		// Post author
		if ( in_array('authorname', $postmeta) && 'page' != get_post_type() ) {
			printf('<span class="author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">' . __('', 'themebeagle') . '<a class="entry-author-link" href="%1$s" title="%2$s" itemprop="url" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'themebeagle' ), get_the_author() ) ),
				get_the_author()
			);
		}

		// Post Date
		if ( in_array('date', $postmeta) ) {
			echo '<span class="date">';
			themebeagle_entry_date();
			echo '</span>';
		}

		// Post Categories.
		if ( in_array('cats', $postmeta) ) {
			$categories_list = get_the_category_list(', ');
			if ( $categories_list ) {
				echo '<span class="categories-links">' . $categories_list . '</span>';
			}
		}

		//  Post Tags.
		if ( in_array('tags', $postmeta) && 'page' != get_post_type() ) {
			$tag_list = get_the_tag_list(', ');
			if ( $tag_list ) {
				echo '<span class="tags-links">' . $tag_list . '</span>';
			}
		}

		// Comments Link
		if ( comments_open() && in_array('comments', $postmeta) && 'page' != get_post_type() ) {
			echo '<span class="comments-link">';
			comments_popup_link( __('Comments', 'themebeagle'), __('1 Comment', 'themebeagle'), __('% Comments', 'themebeagle') );
			echo '</span>';
		}

		// Edit Post Link
		if ( in_array('edit', $postmeta) ) {
			edit_post_link( __( 'Edit', 'themebeagle' ), '<span class="edit-link">', '</span>' );
		}

	echo '</div><!-- .entry-meta -->';

}
endif;



/*-----------------------------------------------------------------------------------*/
// ENTRY META BOTTOM
// Print HTML with meta information for current post: categories, tags, comments, 
// author, and date.
// Create your own themebeagle_entry_meta_bottom() to override in a child theme.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'themebeagle_entry_meta_bottom' ) ) :
function themebeagle_entry_meta_bottom() {

	$postmeta = tb_option('bottom_postmeta');

	echo '<div class="entry-meta">';

		// Post author
		if ( in_array('authorname', $postmeta) && 'page' != get_post_type() ) {
			printf('<span class="author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">' . __('', 'themebeagle') . '<a class="entry-author-link" href="%1$s" title="%2$s" itemprop="url" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'themebeagle' ), get_the_author() ) ),
				get_the_author()
			);
		}

		// Post Date
		if ( in_array('date', $postmeta) ) {
			echo '<span class="date">';
			themebeagle_entry_date();
			echo '</span>';
		}

		// Post Categories.
		if ( in_array('cats', $postmeta) ) {
			$categories_list = get_the_category_list( __( ', ', 'themebeagle' ) );
			if ( $categories_list ) {
				echo '<span class="categories-links">' . $categories_list . '</span>';
			}
		}

		//  Post Tags.
		if ( in_array('tags', $postmeta) && 'page' != get_post_type() ) {
			$tag_list = get_the_tag_list( '', __( ', ', 'themebeagle' ) );
			if ( $tag_list ) {
				echo '<span class="tags-links">' . $tag_list . '</span>';
			}
		}

		// Comments Link
		if ( comments_open() && in_array('comments', $postmeta) && 'page' != get_post_type() ) {
			echo '<span class="comments-link">';
			comments_popup_link( __('Comments', 'themebeagle'), __('1 Comment', 'themebeagle'), __('% Comments', 'themebeagle') );
			echo '</span>';
		}

		// Edit Post Link
		if ( in_array('edit', $postmeta) ) {
			edit_post_link( __( 'Edit', 'themebeagle' ), '<span class="edit-link">', '</span>' );
		}

		// Read More Link
		if ( !is_single() && in_array('read-more', $postmeta) ) {
			printf('<a class="entry-more-link" href="%1$s" title="%2$s" itemprop="url">%3$s</a>',
				esc_url( get_permalink() ),
				esc_attr( __('Read the Rest of this Post', 'themebeagle') ),
				__('Read More &raquo;', 'themebeagle')
			);
		}

	echo '</div><!-- .entry-meta -->';

}
endif;



/*-----------------------------------------------------------------------------------*/
// ENTRY TITLE
// Print entry Title.
// Create your own themebeagle_entry_title() to override in a child theme.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'themebeagle_entry_title' ) ) :
function themebeagle_entry_title() {
	global $post;
	$format = get_post_format();
	if ( false === $format ) {
		$format = 'standard';
	}
	$format_link = get_post_format_link($format);
	$formaticon = '';
	if ( tb_option('formaticons') )
		$formaticon = '<a class="formaticon" href="' . $format_link . '" title="' . __("Post Format: ", "themebeagle") . $format . '"><span class="screen-reader-text">'.$format.'</span></a>';

	if ( is_single() ) { ?>
		<h1 class="entry-title" itemprop="headline">
			<span>
				<?php echo $formaticon; ?>
				<?php the_title(); ?>
			</span>
		</h1>
	<?php } else { ?>
		<h2 class="entry-title" itemprop="headline">
			<span>
				<?php echo $formaticon; ?>
				<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
			</span>
		</h2>
	<?php }
}
endif;



/*-----------------------------------------------------------------------------------*/
// FEATURED POST IDs
// Function to collect the Post IDs for Posts and Pages tagged as featured.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function tb_featuredposts() {
	$featurecount = tb_option('featurecount');
	$featuretags = array( 'featured', 'featured-2', 'featured-3' );
	$featuredposts = get_posts( array(
		'post_type' => array('post', 'page'),
		'tax_query' => array(
			array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => $featuretags
			)
		),
		'posts_per_page' => $featurecount
	));

	$posts = array();

	foreach ($featuredposts as $post) {
		$posts[] += $post->ID;
	}

	if ($posts) {
		return $posts;
	}

}



/*-----------------------------------------------------------------------------------*/
// EXCLUDE POSTS
// Functions to exclude home page posts and categories based on theme settings.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('pre_get_posts', 'tb_exclude_posts_cats');
function tb_exclude_posts_cats( $query ) {
	if( $query->is_main_query() && $query->is_home() && tb_option('hide_dupes') && tb_option('home_featured_posts') != 'none' ) {
		$do_not_duplicate = tb_featuredposts();
		$query->set( 'post__not_in', $do_not_duplicate);
	}
	if( $query->is_main_query() && ($query->is_home() || $query->is_archive()) && tb_option('exclude_cats') ) {
		$cats = tb_option('exclude_cats');
		$query->set( 'category__not_in', $cats);
	}
}

add_filter( 'widget_categories_args', 'widget_categories_args_filter', 10, 1 );
function widget_categories_args_filter( $cat_args ) {
	$exclude_arr = tb_option('exclude_cats');
	if( isset( $cat_args['exclude'] ) && !empty( $cat_args['exclude'] ) )
		$exclude_arr = array_unique( array_merge( explode( ',', $cat_args['exclude'] ), $exclude_arr ) );
	$cat_args['exclude'] = implode( ',', $exclude_arr );
	return $cat_args;
}



/*-----------------------------------------------------------------------------------*/
// GOOGLE PLUS META TAG
// Function that adds google plus link to page head.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts', 'tb_googplus');
function tb_googplus() {
	if ( tb_option('google_url')) { ?>
		<!-- Google Plus Link -->
		<link rel="author" href="<?php echo stripslashes(tb_option('google_url')); ?>" />
	<?php } 
}



/*-----------------------------------------------------------------------------------*/
// HEADER BANNER AD
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('themebeagle_after_branding', 'tb_ad_header');
function tb_ad_header() {

	$adcode = '';

	if ( is_singular() ) {
		global $post;
		$adcode = get_post_meta($post->ID, 'tb_ad_header_code', true);
		if ( ! $adcode && tb_option('ad_header') ) {
			$adcode = tb_option('ad_header_code');
		}
	}

	if ( !is_singular() && tb_option('ad_header') ) {
		$adcode = tb_option('ad_header_code');
	}

	if ( $adcode ) { ?>
		<!-- HEADER BANNER -->
		<div class="banner-ad ad-header" style="background-color:<?php echo tb_option('ad_header_bg'); ?>">
			<?php echo do_shortcode(stripslashes($adcode)); ?>
		</div>
	<?php }
}



/*-----------------------------------------------------------------------------------*/
// CONTENT TOP BANNER AD
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('themebeagle_site_content', 'tb_ad_content_top');
function tb_ad_content_top() {

	$adcode = '';

	if ( is_singular() ) {
		global $post;
		$adcode = get_post_meta($post->ID, 'tb_ad_content_top_code', true);
		if ( ! $adcode && tb_option('ad_content_top') ) {
			$adcode = tb_option('ad_content_top_code');
		}
	}

	if ( !is_singular() && tb_option('ad_content_top') ) {
		$adcode = tb_option('ad_content_top_code');
	}

	if ( $adcode ) { ?>
		<!-- TOP CONTENT BANNER -->
		<div class="banner-ad ad-content-top" style="background-color:<?php echo tb_option('ad_content_top_bg'); ?>">
			<?php echo do_shortcode(stripslashes($adcode)); ?>
		</div>
	<?php }
}



/*-----------------------------------------------------------------------------------*/
// CONTENT BOTTOM BANNER AD
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('themebeagle_site_content_bottom', 'tb_ad_content_bottom');
function tb_ad_content_bottom() {

	$adcode = '';

	if ( is_singular() ) {
		global $post;
		$adcode = get_post_meta($post->ID, 'tb_ad_content_bottom_code', true);
		if ( ! $adcode && tb_option('ad_content_bottom') ) {
			$adcode = tb_option('ad_content_bottom_code');
		}
	}

	if ( !is_singular() && tb_option('ad_content_bottom') ) {
		$adcode = tb_option('ad_content_bottom_code');
	}

	if ( $adcode ) { ?>
		<!-- BOTTOM CONTENT BANNER -->
		<div class="banner-ad ad-content-bottom" style="background-color:<?php echo tb_option('ad_content_bottom_bg'); ?>">
			<?php echo do_shortcode(stripslashes($adcode)); ?>
		</div>
	<?php }
}



/*-----------------------------------------------------------------------------------*/
// BELOW HEADER BANNER AD
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('themebeagle_before_site_inner', 'tb_ad_below_header', 9);
function tb_ad_below_header() {

	$adcode = '';

	if ( is_singular() ) {
		global $post;
		$adcode = get_post_meta($post->ID, 'tb_ad_below_header_code', true);
		if ( ! $adcode && tb_option('ad_below_header') ) {
			$adcode = tb_option('ad_below_header_code');
		}
	}

	if ( !is_singular() && tb_option('ad_below_header') ) {
		$adcode = tb_option('ad_below_header_code');
	}

	if ( $adcode ) { ?>
		<!-- BELOW HEADER BANNER -->
		<div class="banner-ad ad-below-header" style="background-color:<?php echo tb_option('ad_below_header_bg'); ?>">
			<div class="wrap">
				<?php echo do_shortcode(stripslashes($adcode)); ?>
			</div>
		</div>
	<?php }
}



/*-----------------------------------------------------------------------------------*/
// ABOVE FOOTER BANNER AD
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('themebeagle_above_footer', 'tb_ad_above_footer');
function tb_ad_above_footer() {

	$adcode = '';

	if ( is_singular() ) {
		global $post;
		$adcode = get_post_meta($post->ID, 'tb_ad_above_footer_code', true);
		if ( ! $adcode && tb_option('ad_above_footer') ) {
			$adcode = tb_option('ad_above_footer_code');
		}
	}

	if ( !is_singular() && tb_option('ad_above_footer') ) {
		$adcode = tb_option('ad_above_footer_code');
	}

	if ( $adcode ) { ?>
		<!-- ABOVE FOOTER BANNER -->
		<div class="banner-ad ad-above-footer" style="background-color:<?php echo tb_option('ad_above_footer_bg'); ?>">
			<div class="wrap">
				<?php echo do_shortcode(stripslashes($adcode)); ?>
			</div>
		</div>
	<?php }
}



/*-----------------------------------------------------------------------------------*/
// BELOW POST BANNER AD
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('themebeagle_before_comments', 'tb_ad_below_post_footer');
function tb_ad_below_post_footer() {

	$adcode = '';

	if ( is_singular() ) {
		global $post;
		$adcode = get_post_meta($post->ID, 'tb_ad_below_post_code', true);
		if ( ! $adcode && tb_option('ad_below_post') ) {
			$adcode = tb_option('ad_below_post_code');
		}
	}

	if ( !is_singular() && tb_option('ad_below_post') ) {
		$adcode = tb_option('ad_below_post_code');
	}

	if ( $adcode ) { ?>
		<!-- BELOW POST FOOTER BANNER -->
		<div class="banner-ad ad-below-post" style="background-color:<?php echo tb_option('ad_below_post_bg'); ?>">
			<?php echo do_shortcode(stripslashes($adcode)); ?>
		</div>
	<?php }
}



/*-----------------------------------------------------------------------------------*/
// POST EXCERPT
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function themebeagle_excerpt() {

	if ( is_search() ) {
		the_excerpt();
	} elseif ( has_post_format('quote') || is_single() || tb_option('post_excerpt') == 'content' ) {
		the_content( __( '', 'themebeagle' ) );
	} else {
		the_excerpt(); ?>
	<?php }

	if ( is_single() ) {
		wp_link_pages(array(
			'before' => '<p class="link-pages">',
			'after' => '</p>',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'separator' => ''
		));
	}

}



/*-----------------------------------------------------------------------------------*/
// RELATED POSTS
// @since 1.0
/*-----------------------------------------------------------------------------------*/

function themebeagle_related_posts() {

	global $post;
	$hidestuff = array();
	if ( get_post_meta($post->ID, 'tb_hide_stuff', true) ) { $hidestuff = get_post_meta($post->ID, 'tb_hide_stuff', true); }
	if ( !tb_option('single_related') || in_array('hide_related', $hidestuff) )
		return;

	$postid = array($post->ID);
	$cats = get_the_category();
	$numposts = '3';
	$numposts = tb_option('related_count');
	$related = new WP_Query(array(
		'category__in' => wp_get_post_categories($post->ID),
		'posts_per_page' => $numposts,
		'orderby' => 'rand',
		'post__not_in' => $postid
	));

	
	if ( $numposts == '4' ) { $numclass = ' four';
	} elseif ( $numposts == '5' ) { $numclass = ' five';
	} elseif ( $numposts == '6' ) { $numclass = ' six';
	} else { $numclass = ''; }

	if ( $related->have_posts() ) :
		echo '<div class="tb-related-posts' . $numclass . '">';
		echo '<h3 class="related-title">' . tb_option('related_title') . '</h3>';
		echo '<div class="related-wrap">';
		while ($related->have_posts()) : $related->the_post();
			themebeagle_related_thumbnail();
		endwhile;
		echo '</div>';
		echo '</div>';
	endif;
	wp_reset_query();
}



/*-----------------------------------------------------------------------------------*/
// SET CONTENT WIDTH BASED ON THEME'S DESIGN
// See themebeagle_content_width() for adjustments based on page layout.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 1280;



/*-----------------------------------------------------------------------------------*/
// Adjust $content_width based on theme settings and page layout.
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action( 'template_redirect', 'themebeagle_content_width' );
function themebeagle_content_width() {

	global $content_width;
	$layout = '';
	$layout = tb_option('default_layout');

	if ( is_home() || is_front_page()  ) {
		$layout = tb_option('home_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}
	}

	if ( is_single() ) {
		global $post;
		$layout = get_post_meta($post->ID, 'tb_page_layout', true);
		if ( ! $layout || $layout == "default" )
			$layout = tb_option('single_layout');

		if ( ! $layout || $layout == "default" ) 
			$layout = tb_option('default_layout');
	}

	if ( is_page() ) {
		global $post;
		$layout = get_post_meta($post->ID, 'tb_page_layout', true);
		if ( ! $layout || $layout == "default" )
			$layout = tb_option('page_layout');
		if ( ! $layout || $layout == "default" ) 
			$layout = tb_option('default_layout');
	}

	if ( is_archive() ) {
		$layout = tb_option('archive_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}
	}

	if ( function_exists('is_bbpress') && is_bbpress() ) {
		$layout = tb_option('bbpress_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}
	}

	if ( is_404() ) {
		$layout = tb_option('404_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}
	}

	if ( $layout == 'c-sw' || $layout == 'sw-c' )
		$content_width = 740;
	elseif ( $layout == 'fw' )
		$content_width = 520;

}



/*-----------------------------------------------------------------------------------*/
// WOOCOMMERCE SUPPORT
// @since 1.1
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'woocommerce' );

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'tb_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'tb_theme_wrapper_end', 10);

function tb_theme_wrapper_start() {
	get_header();
}

function tb_theme_wrapper_end() {
	get_footer();
}