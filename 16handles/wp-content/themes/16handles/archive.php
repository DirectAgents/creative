<?php
/**
 * The template used to display Archive pages
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
<div id="main">
  <ul class="archive">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <li>
      <h2><?php the_title(); ?></h2>
	  <div class="content">
        <?php the_content(); ?>	  	
	  </div>
    </li>
  <?php endwhile; ?>
  <?php else: ?>
  <?php endif; ?>  
  </ul>
<?php get_footer(); ?>