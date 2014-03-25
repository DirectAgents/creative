<?php

/*-----------------------------------------------------------------------------------*/
// ENQUEUE SCRIPTS AND STYLES FOR THE FRONT END
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'themebeagle_scripts_styles' );
function themebeagle_scripts_styles() {

	// Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads Bootstrap JavaScript file.
	if( !is_admin() ) 
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.1.0', true );

	// Loads Javascript plugins needed to run the theme.
	if( !is_admin() )		
		wp_deregister_script('hoverIntent'); // remove wordpress built-in hoverintent.js and replace it with our own so it works with Superfish.
		wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '1.0', false);
		wp_enqueue_script('jquery-effects-core');
		wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), '5.26', true);
		wp_enqueue_script('infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array( 'jquery' ), '2.0b2.120519', true);
		wp_enqueue_script('manual-trigger', get_template_directory_uri() . '/js/manual-trigger.js', array( 'jquery' ), '2.0b2.110617', true);
		wp_enqueue_script('sloppy-masonry', get_template_directory_uri() . '/js/jquery.isotope.sloppy-masonry.min.js', array( 'jquery' ), '1.0', true);
		wp_enqueue_script( 'themebeagle-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '1.0', true );

}

add_action( 'wp_footer', 'tb_infinite_scroll_js', 100 );
function tb_infinite_scroll_js() { ?>

	<!-- Infinite Scroll + Isotope JS -->
	<script>
		jQuery(window).load(function(){

			var $container = jQuery('.article-container');

			$container.imagesLoaded(function(){
				$container.isotope({
<?php if (
	(is_home() && tb_option('post_layout') == 'masonry_2') || 
	(is_home() && tb_option('post_layout') == 'masonry_3') || 
	(is_home() && tb_option('post_layout') == 'masonry_4') || 
	(is_archive() && tb_option('post_layout_archive') == 'masonry_2') || 
	(is_archive() && tb_option('post_layout_archive') == 'masonry_3') || 
	(is_archive() && tb_option('post_layout_archive') == 'masonry_4') || 
	is_page_template('page-archive-images.php') || 
	is_page_template('page-masonry-4-column.php') || 
	is_page_template('page-masonry-3-column.php') || 
	is_page_template('page-masonry-2-column.php') || 
	is_page_template('page-portfolio-4-column.php') || 
	is_page_template('page-portfolio-3-column.php') || 
	is_page_template('page-portfolio-2-column.php') || 
	is_page_template('page-portfolio-1-column.php')
) { ?>
					layoutMode: 'sloppyMasonry', // ref: https://github.com/cubica/isotope-sloppy-masonry
<?php } else { ?>
 					layoutMode: 'fitRows',
<?php } ?>
 					itemSelector : 'article',
				});
			});

			jQuery('.cat-filter a').click(function(){
  				var selector = jQuery(this).attr('data-filter');
  				$container.isotope({ filter: selector });
				return false;
			});

			var $optionSets = jQuery('.option-set'),
			$optionLinks = $optionSets.find('a'); 
			$optionLinks.click(function(){
				var $this = jQuery(this);
				if ( $this.hasClass('selected') ) {
					return false;
				}
				var $optionSet = $this.parents('.option-set');
				$optionSet.find('.selected').removeClass('selected');
				$this.addClass('selected'); 
			});

<?php if ( tb_option('infinite_scroll') ) { ?>
			$container.infinitescroll({
				nextSelector: "#next-posts a",
				navSelector: "#next-posts a",
				itemSelector: ".post",
				contentSelector: ".article-container",
				behavior: "twitter",
				loading: {
					img: "<?php echo get_template_directory_uri(); ?>/images/loader.gif",
					msgText: "<?php _e( 'Loading More Entries', 'themebeagle' ); ?>",
					finishedMsg: "<?php _e( 'All Entries Loaded.', 'themebeagle' ); ?>"
				},
			},

			function( newElements ) {
				var $newElems = jQuery(newElements).css({ opacity: 0 });
				$newElems.imagesLoaded(function(){
					// show elems now they're ready
					$newElems.animate({ opacity: 1 });
					$container.isotope( 'appended', jQuery( $newElems ) );
				});
			});
		<?php } ?>
		});
	</script>

<?php } 

?>