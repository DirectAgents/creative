<?php
/**
 * @package WordPress
 * @subpackage Ajax Heroes
 */

get_header(); ?>
<?php the_post(); ?>
<div class="single-page contact">
    <h2 class="page-title"><?php the_title() ?></h2>
    <div class="single-page-full-width">
      <?php the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>