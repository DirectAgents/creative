<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
the_post();
$post_id = get_the_ID();
?>
<div class="main contact">
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
            <div class="col col_1_2">
                <h3 class="title_2">Corporate office</h3>
                <p class="txt_1">
					<?php echo of_get_option('address_phone'); ?>
                <h3 class="title_2">Social Media</h3>
                <div class="social">
                    <div class="centerModule">
                        <ul>
                            <li><a class="icon icon_1" href="<?php echo of_get_option('facebook_url'); ?>"></a></li>
                            <li><a class="icon icon_2" href="<?php echo of_get_option('twitter_url'); ?>"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col col_1_2 col_end">            
                <h3 class="title_2">General Info</h3>
                <p class="txt_1"><a href="mailto:<?php echo of_get_option('general_info_email'); ?>"><?php echo of_get_option('general_info_email'); ?></a></p>
                <h3 class="title_2">Franchise Info</h3>
                <p class="txt_1"><a href="mailto:<?php echo of_get_option('franchise_info_email'); ?>"><?php echo of_get_option('franchise_info_email'); ?></a></p>
                <h3 class="title_2">Marketing/Advertising</h3>
                <p class="txt_1"><a href="mailto:<?php echo of_get_option('marketing_email'); ?>"><?php echo of_get_option('marketing_email'); ?></a></p>
                <h3 class="title_2">Media/Press</h3>
                <p class="txt_1"><a href="mailto:<?php echo of_get_option('pr_email'); ?>"><?php echo of_get_option('pr_email'); ?></a></p>
                <h3 class="title_2">Events/Catering</h3>
                <p class="txt_1"><a href="mailto:<?php echo of_get_option('events_email'); ?>"><?php echo of_get_option('events_email'); ?></a></p>
            </div>
        </div>
        <div class="cont send_note">
			<?php the_content(); ?>			            
        </div>
    </div>
    <div class="btn_link_multi">
        <div class="centerModule">
            <a class="btn_link_1" href="/info">
                <p class="title_1 first_title">Franchise<span class="arrow"></span><span class="txt">Open your own store</span></p>
            </a>
            <a class="btn_link_1" href="/locations">
                <p class="title_1 first_title">Locations<span class="arrow"></span><span class="txt">Find a store near you</span></p>
            </a>
            <a class="btn_link_1 btn_link_1_end" href="about">
                <p class="title_1 first_title">About<span class="arrow"></span><span class="txt">What we do</span></p>
            </a>
        </div>
    </div>
</div>
<?php get_footer(); ?>