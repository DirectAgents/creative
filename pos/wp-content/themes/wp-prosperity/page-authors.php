<?php
/*
Template Name: All Authors
 *
 * The template for displaying Author social media icons.
 *
 * @since 1.0
*/

global $page_template;
$page_template = 'all-authors';
get_header(); 
the_post(); 
$content = get_the_content(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

						<header class="entry-header">
							<h1 class="entry-title page"><?php the_title(); ?></h1>
						</header><!-- .archive-header -->

						<?php
							edit_post_link( __( 'Edit', 'themebeagle' ), '<p class="edit-link">', '</p>' );
							if ( ! empty( $content ) ) : ?>
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
							<?php endif;
						?>

					</article><!-- article -->

					<?php
						// Get the authors from the database ordered by user display name
						global $wpdb;
						$query = "SELECT ID, display_name from $wpdb->users ORDER BY display_name";
						$author_ids = $wpdb->get_results($query);

						// Loop through each author
						foreach( $author_ids as $author ) :

							// Get user data
							global $curauth;
							$curauth = get_userdata($author->ID);

							// If user level is above 0 or login name is "admin", display profile
							if ( $curauth->user_level > 0 && $curauth->description || $curauth->user_login == 'admin' && $curauth->description ) :

							// Get link to author page
							$user_link = get_author_posts_url($curauth->ID); ?>

							<article class="entry-content author-info authors" itemscope="itemscope" itemtype="http://schema.org/Person">

								<?php
									 /* Get author gravatar */ 
									$author_bio_avatar_size = tb_option('author_gravsize');
									echo get_avatar( $curauth->user_email, $author_bio_avatar_size );
								?>

								<?php /* Get author name */ ?>
								<h2><?php echo $curauth->first_name . ' ' . $curauth->last_name; ?></h2>

								<?php /* Get author bio info */ ?>
								<p><?php echo $curauth->description; ?></p>

								<?php /* Get author icons */ 
								get_template_part( 'icons-author' ); ?>

								<?php /* Link to author archive page */ ?>
								<a class="all-authors-bio" href="<?php echo esc_url( $user_link ); ?>" title="<?php echo $curauth->display_name; ?>"><?php _e("Author Archive Page", "themebeagle"); ?></a>

							</article><!-- .author-info -->

						<?php endif;

					endforeach; /* END THE ALL AUTHORS PAGE TEMPLATE CONTENT */

get_footer(); ?>