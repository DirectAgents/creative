<?php
/**
 * @package WordPress
 * @subpackage Gardein
 */

get_header(); ?>
<?php the_post(); ?>
<style type="text/css" media="screen">
.content .copy h1{color:<?php echo get_field('color'); ?>;}
.content .headline{background-color: <?php echo get_field('color'); ?>}
</style>
<?php get_template_part('module','top_slider_single'); ?>
<div id="main">
  <div class="content">
    <?php $title = get_field('main_title'); //use custom field for title ?>
    <?php if ($title == '') $title = 'daily digest: the official gardein&#8482; blog'; //if custom field is not setup use regular title instead ?>
    <h1 class="headline"><?php echo $title; ?></h1>
      <?php get_template_part('content','single') ?>
  </div>
  <div class="sidebar">
    <h1 class="headline">about</h1>
    <div class="side_top_content">
    <?php get_template_part('module','category-list');?>
    <?php get_template_part('module','archives');?>
    </div>
    <?php get_template_part('module','newsletter-short') ?>
  </div>
<?php get_footer(); ?>

