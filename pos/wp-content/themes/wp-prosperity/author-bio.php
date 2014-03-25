<?php
/**
 * The template for displaying Author bio
 *
 * @since 1.0
 */


$hidestuff = array();
$unboxed = '';
if ( tb_option('auth_bio_boxed') == 'unboxed' ) { $unboxed = 'unboxed'; }
if ( get_post_meta($post->ID, 'tb_hide_stuff', true) ) { $hidestuff = get_post_meta($post->ID, 'tb_hide_stuff', true); }
if ( ! in_array('hide_bio', $hidestuff) ) :
?>

<div class="author-info <?php echo $unboxed; ?>">

	<h3 class="author-title"><?php printf( __( 'About the Author', 'themebeagle' ), get_the_author() ); ?></h3>

	<?php 
		global $curauth;
		$curauth = get_userdata(get_the_author_meta( 'ID' ));
		$authgrav = tb_option('author_gravsize');
		echo get_avatar( get_the_author_meta( 'user_email' ), $authgrav ); 
	?>

	<div class="author-description">
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p>
	</div><!-- .author-description -->

	<?php if ( is_author() || ( is_single() && tb_option('author_links') == 1 ) ) :
		get_template_part( 'icons-author' ); 
	endif; ?>

	<a class="author-archive-link" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php _e("Author Archive Page", "themebeagle"); ?></a>

</div><!-- .author-info -->
<?php endif; ?>