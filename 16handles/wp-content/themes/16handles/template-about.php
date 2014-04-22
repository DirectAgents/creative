<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
the_post();
$post_id = get_the_ID();
?>
<div class="main about" data-behavior="about">
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
            <div class="custom_video video_main" id="youtube-player-container" data-vid="<?php the_field('yt_video_id'); ?>">
                <div class="icon" onClick='jQuery("#youtube-player-container").tubeplayer("play")'></div>
            </div>
						<h3><?php the_field('secondary_title'); ?></h3>
               <div class="col about-content">
				   <p><?php the_field('left_side_text'); ?></p>
               </div>
							 <?php if(get_field('show_corp_leadership') === "yes") { ?>
            <h3 style="clear: both;">Corporate Leadership</h3>
            <?php $people = get_post_meta(get_the_ID(),'corporate_leadership',true);  ?>            
            <?php if ( is_array($people) && isset($people[0])): ?>
                <?php $args = array('post_type'=>'people', 'posts_per_page'=>-1, 'post__in'=>$people); ?>
                <?php $people_query = new WP_Query($args) ?>
                <?php if ( $people_query->have_posts() ) : ?>
			          <div class="carrousel carrousel_1">
                    <ul class="slide">                  
                        <?php while ( $people_query->have_posts() ) : $people_query->the_post(); ?>
                            <li>
                                <div class="avatar">
                                    <?php $image = wp_get_attachment_image_src( intval(get_post_meta(get_the_ID(),'avatar',true)), 'people_avatar'); ?>
                                    <?php if ($image): ?>
                                    <img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>"/>
                                    <?php endif; ?>
                                    <h6><?php the_title(); ?></h6>
                                    <p><?php the_field('title'); ?></p>
                                </div>
                                <div class="txt">
                                    <?php the_field('about');?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <div id="pager"></div>
                    <a class="prev" id="prev" href="#"><span>prev</span></a>
                    <a class="next" id="next" href="#"><span>next</span></a>
              </div> 
              <?php endif; ?>
            <?php endif; ?>
						<?php }; ?>
        </div>
    </div> 
    <a class="btn_link_1" href="<?php the_field('bottom_link_url', $post_id); ?>">		
        <p class="title_1 first_title"><?php the_field('bottom_link_text', $post_id); ?><span class="arrow"></span></p>
    </a>
</div>
<?php get_footer(); ?>