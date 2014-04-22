<?php
/**
 * @package WordPress
 * @subpackage themename
 */

if ( ! function_exists( 'handcraftedwp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own handcraftedwp_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since HandcraftedWP 0.4
 */
function handcraftedwp_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID(); ?>">
	  <div class="author">
      <div class="star-rating can_vote">              
        <span class="cur_rating  rating_<?php echo intval(get_comment_meta( $comment->comment_ID, 'review_rating', true )) ?>"></span>
      </div> 
      <p class="title"><?php echo get_comment_meta( $comment->comment_ID, 'review_summary', true ); ?></p>
      <p>Written by <?php comment_author(); ?></p>
      <p><time pubdate datetime="<?php echo get_comment_time('Y-m-d g:ia'); ?>"><?php echo get_comment_time('F j, Y'); ?></time></p>
    </div>
    <div class="review">
      <p><?php comment_text(); ?></p>
    </div>
    <div class="helpful">
      <div>
        <p>Was this helpful?</p>
        <div class="thumb clearfix">
          <a href="#" data-review-id="<?php comment_ID(); ?>" data-helpful="helpful" data-product-id="<?php echo $comment->comment_post_ID; ?>" data-nonce="<?php echo wp_create_nonce( 'rate_review' ) ?>" class="thumbUp"><span></span><em><?php echo intval(get_comment_meta( $comment->comment_ID, 'helpful',true )); ?></em></a>
          <a href="#" data-review-id="<?php comment_ID(); ?>" data-helpful="not_helpful" data-product-id="<?php echo $comment->comment_post_ID; ?>" data-nonce="<?php echo wp_create_nonce( 'rate_review' ) ?>" class="thumbDown"><span></span><em><?php echo intval(get_comment_meta( $comment->comment_ID, 'not_helpful',true )); ?></em></a>
        </div>
        <a href="#" class="share share-link">Share this review</a>
        <div class="addthis_share_box center share_review">
          <div id="addthis_toolbox_<?php echo rand(0,10000); ?>" class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php echo get_comment_meta( $comment->comment_ID, 'review_summary', true ); ?>" addthis:description="<?php echo get_comment_text(); ?>">
          </div>
        </div>
      </div>
    </div>
	<?php
			break;
	endswitch;
}
endif; // ends check for handcraftedwp_comment()

?>

<div id="review_list_inside_wrap">
	  <h4>Customer Reviews &amp; Ratings</h4>
	<?php // You can start editing here -- including this comment! ?>
  
	<?php if ( have_comments() ) { ?>
		<ul class="reviewsList">
			<?php wp_list_comments( array( 'callback' => 'handcraftedwp_comment' ) ); ?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="review-nav" role="article">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Reviews', 'themename' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Reviews &rarr;', 'themename' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>		
	<?php } else { ?>
	 
	 <p class="no_reviews">There are no reviews yet. <a href="javscript:;" class="show_review_form">Be the first!</a></p>
	 
	<?php } ?>
	<?php
  $comments_args = array(
  	'id_form' => 'review_form',
  	'id_submit' => 'preview_btn',
  	'title_reply' =>'',
  	'title_reply_to' => '',
  	'cancel_reply_link' => '',
  	'label_submit' => __( 'Preview' ),
  	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __( 'Full review') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
  	'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
  	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
  	'comment_notes_before' => '',
  	'comment_notes_after' => '',
  	'fields' => apply_filters( 'comment_form_default_fields', array(
  		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
  		'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
  		'url' => null,
  		'review_summary' => '<p class="comment-form-review_summary">' . '<label for="review_summary">' . __( 'Review Summary' ) . '</label> ' . '<input id="review_summary" name="review_summary" type="text" aria-required="true" value="'.esc_attr( $commenter['review_summary'] ).'" size="30" /></p>',
  		'review_rating' => '<p class="comment-form-review_rating">' . '<label for="review_rating">' . __( 'Rating' ) . '</label> ' . '<input id="review_rating" name="review_rating" type="text" aria-required="true" value="'.esc_attr( $commenter['review_rating'] ).'" size="30" /></p>' ) 
  		 
  		) 
  	);
  	
/**
 * The following two functions are there to change the submit button name of the form. Otherwise jQuery dies.
 */
        ob_start('dt_change_submit_name');
        comment_form($comments_args);
        ob_end_flush();

function dt_change_submit_name($buffer) {
        return str_replace("name=\"submit","name=\"submit_review",$buffer);
}
?>

</div><!-- #comments -->