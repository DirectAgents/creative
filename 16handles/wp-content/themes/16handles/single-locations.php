<?php
/**
 * @package WordPress
 * @subpackage 16Handles
 */

get_header(); ?>
<?php the_post(); ?>
<!-- this page is for SEO purposes only -->
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<h1><?php the_title() ?></h1>
<h1><?php echo get_field('address_street') ?> , <?php echo get_field('city') ?> |  Treat yourself to some delicious Froyo. You deserve it.</h1>
<?php get_footer(); ?>

