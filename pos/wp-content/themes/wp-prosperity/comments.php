<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @since 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */

$showcomments = tb_option('show_comments');

if ( post_password_required() || is_404() || ( is_single() && ! in_array('posts', $showcomments) ) || ( is_page() && ! in_array('pages', $showcomments) ) )
	return;
?>

<div id="comments" class="entry-comments">

	<?php if ( have_comments() ) : ?>

		<div class="comments-container">

			<h3 class="comments-title">
				<?php comments_number(__("No Comments", "themebeagle"), __("1 Comment", "themebeagle"), __("% Comments", "themebeagle")); ?>
			</h3>

			<?php if ( ! empty($comments_by_type['pings']) ) : // list pings/trackbacks separately ?>
				<div class="pings">
					<h3><?php _e("Sites That Link to this Post", "themebeagle"); ?></h3>
					<ol class="ping-list">
						<?php 
							wp_list_comments( array(
								'type'		=> 'pings',       		
								'style'		=> 'ol',
								'callback'	=> list_pings,
							) );
						?>
					</ol>
				</div><!--.pings -->
			<?php endif; ?>

			<ol class="comment-list">
				<?php
					$gravsize = tb_option('comments_gravsize');
					wp_list_comments( array(
						'type'		=> 'comment',       		
						'style'		=> 'ol',
						'avatar_size'	=> $gravsize
					) );
				?>
			</ol><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav class="navigation comment-navigation" role="navigation">
					<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'themebeagle' ); ?></h1>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'themebeagle' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'themebeagle' ) ); ?></div>
				</nav><!-- .comment-navigation -->
			<?php endif; // Check for comment navigation ?>

			<?php if ( ! comments_open() && get_comments_number() ) : ?>
				<p class="no-comments"><?php _e( 'Comments are closed.' , 'themebeagle' ); ?></p>
			<?php endif; ?>

		</div><!-- .comments-container -->

	<?php endif; // have_comments() ?>

	<?php
		global $required_text;
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$fields = array(
			'author' => '<p class="comment-form-author"><span class="genericon genericon-user"></span><input id="author" placeholder="' . __( 'Name', 'themebeagle' ) . ' ' . ( $req ? '*' : '' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			'email' => '<p class="comment-form-email"><span class="genericon genericon-mail"></span><input id="email" placeholder="' . __( 'Email', 'themebeagle' ) . ' ' . ( $req ? '*' : '' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
			'url' => '<p class="comment-form-url"><span class="genericon genericon-home"></span><input id="url" placeholder="' . __( 'Website', 'themebeagle' ) . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
		);

		$comments_args = array(
			'comment_notes_after' => '',
			'title_reply' => __( 'Post a Comment', 'themebeagle' ),
			'title_reply_to' => __( 'Post a Reply to %s', 'themebeagle' ),
			'cancel_reply_link' => __( 'Cancel Comment', 'themebeagle' ),
			'label_submit' => __( 'Submit Your Comment', 'themebeagle' ),
			'fields' => $fields,
			'comment_field' => '<p class="comment-form-comment"><textarea placeholder="" id="comment" name="comment" cols="45" rows="4" aria-required="true">' . '</textarea></p>',
		);

		comment_form($comments_args);
	?>

</div><!-- #comments -->