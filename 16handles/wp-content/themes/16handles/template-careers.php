<?php
/**
 * Template Name: Careers / Franchise Apply
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
the_post();
$post_id = get_the_ID();
?>
<div class="main careers" data-behavior="careers">
    <?php $attachment_id = get_field('header_background_image');
    $size = "page_header_image";
    $img = wp_get_attachment_image_src($attachment_id, $size);                      
    ?>
    <div class="main_title" style="background-image: url('<?php echo $img[0]; ?>')">
        <div class="centerModule">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="career-border">&nbsp;</div>
    <?php the_content(); ?>
    <a class="btn_link_1" href="/about">
        <p class="title_1 first_title">Still Have Questions?<span class="arrow"></span></p>
    </a>
</div>
</div>
<?php get_footer(); ?>