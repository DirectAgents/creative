<?php
/**
 * Template Name: Press
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
the_post();
$post_id = get_the_ID();
?>
<div class="main press">
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
        <div class="accordion_head">
            <div class="box_1 title">
                <h3>What's All The Buzz About&#63;</h3>
            </div>
            <div class="box_2">
                <div class="box icon icon_1"><div class="icon_graph"></div><p>Video</p></div>
                <div class="box icon icon_2"><div class="icon_graph"></div><p>Article</p></div>
                <div class="box icon icon_3"><div class="icon_graph"></div><p>Picture</p></div>
            </div>
        </div>
    </div>
    <div class="accordion accordion_1">
		<?php 
			  $args = array( 'post_type' => 'press','order' => 'ASC', 'posts_per_page' => -1 );
			  $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); 
			  ?>								
        <div class="head <?php echo $loop->current_post%2  == 0 ? 'odd' : 'even' ; ?>">
            <div class="centerModule">
                <div class="box_1 title">
                    <h2 class="title_2"><?php the_title(); ?></h2>
                    <p class="sub_title"><?php echo get_field('published_date'); ?></p>
                </div>
                <div class="box_2">
					<?php switch (get_field('type')) {
						case "Video":
							echo '<div class="box icon icon_1"></div>';
							break;
						case "Picture":
							echo '<div class="box icon icon_2"></div>';
							break;
						case "Article":
							echo '<div class="box icon icon_3"></div>';
							break;
					}?>
                    <div class="box txt txt_1"><p><?php echo get_field('publication'); ?></p></div>
                </div>
            </div>
        </div>
        <div class="cont">
            <div class="centerModule">
                <div class="content">
								<?php $attachment_id = get_field('image');
								if($attachment_id){
									if(get_field('horizontal_vertical') == "Horizontal"){
									  $size = "press_horizontal";
									  $imgAlignement = "horz";
									} else {
									  $imgAlignment = "left";
									  $size = "press_vertical";
									}
									  $img = wp_get_attachment_image_src($attachment_id, $size);												
										echo '<img class="img_main ' . $imgAlignment . '" src="' . $img[0] . '" alt ="' . get_the_title() . '"/>';
								} else {
 								 $press_video = get_field('press_video');
								 if($press_video){
										echo '<div class="img_main left""/>';
											echo wp_oembed_get($press_video, array('width'=> 437));								
										echo '</div>';
									}																		
								}
								?>
								<div class="col col_1_2">
						<p><?php echo get_field('text_column_one') ?></p>
                    </div>
					<?php if(get_field('horizontal_vertical') == "Horizontal") {?>
                    <div class="col col_1_2">
						<p><?php echo get_field('text_column_two') ?></p>
                    </div>						
					<?php } ?>
					<?php if (get_field('article_url')) { ?>
                    <a class="btn_link_2 btn_link_icon" href="<?php echo get_field('article_url'); ?>" target="_blank">
                        <p class="first_title">Read Full Story</p>
                    </a>
					<?php } ?>
                </div>
            </div>
        </div>		
		<?php endwhile; ?>
    </div>
    <a class="btn_link_1" href="<?php echo get_field('bottom_link_url', $post_id); ?>">
        <p class="title_1 first_title"><?php echo get_field('bottom_link_text', $post_id);  ?><span class="arrow"></span></p>
    </a>
</div>
<?php get_footer(); ?>