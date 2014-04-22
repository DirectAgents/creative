<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
<div id="main">
  <h1><?php the_title(); ?></h1>
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
<?php get_footer(); ?>