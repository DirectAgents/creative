<?php
/**
 * Template Name: Initiatives
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
the_post();
$post_id = get_the_ID();
?>

<div class="main initiatives" data-behavior="about">
    <?php $attachment_id = get_field('header_background_image');
    $size = "page_header_image";
    $img = wp_get_attachment_image_src($attachment_id, $size);                      
    ?>
    <div class="main_title" style="background-image: url('<?php echo $img[0]; ?>')">
        <div class="centerModule">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="centerModule">
        <div class="cont">
            <div class="col col_1_3">
                <img src="<?php echo get_field('first_column_image'); ?>"/>
                <h3><?php echo get_field('first_column_headline'); ?></h3>
                <p><?php echo get_field('first_column_text'); ?></p>
            </div>
            <div class="col col_1_3">
                <img src="<?php echo get_field('second_column_image'); ?>"/>
                <h3><?php echo get_field('second_column_headline'); ?></h3>
                <p><?php echo get_field('second_column_text'); ?></p>
            </div>
            <div class="last-child col col_1_3">
                <img src="<?php echo get_field('third_column_image'); ?>"/>
                <h3><?php echo get_field('third_column_headline'); ?></h3>
                <p><?php echo get_field('third_column_text'); ?></p>
            </div>
        </div>
        <div class="cont partners">
            <h3>Partners</h3>
            <div class="col col_1_3"><img src="<?php echo get_field('partner_one_image'); ?>"/></div>
            <div class="col col_1_3"><img src="<?php echo get_field('partner_two_image'); ?>"/></div>
						<?php if(get_field('partner_three_image')){ ?>
            	<div class="last-child col col_1_3"><img src="<?php echo get_field('partner_three_image'); ?>"/></div>								
						<?php } ?>
        </div>
    </div>
    <a class="btn_link_1" href="<?php echo get_field('bottom_link_url', $post_id); ?>">
        <p class="title_1 first_title"><?php echo get_field('bottom_link_text', $post_id); ?><span class="arrow"></span></p>
    </a>
</div>
<?php get_footer(); ?>