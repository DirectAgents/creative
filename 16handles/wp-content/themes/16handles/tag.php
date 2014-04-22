<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
<div class="inside">
  <h1><?php
  	printf( __( 'Tag Archives: %s', 'themename' ), '<span>' . single_tag_title( '', false ) . '</span>' );
  ?></h1>
  <ul class="post-list">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <li>
      <h2><?php the_title(); ?></h2>
      <div class="copy">
        <?php the_content(); ?>
      </div>
    </li>
  <?php endwhile; ?>
  <?php else: ?>
  <?php endif; ?>  
  </ul>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>