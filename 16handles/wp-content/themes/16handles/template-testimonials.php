<?php
/**
 * Template Name: Testimonial
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
the_post();
$post_id = get_the_ID();
?>
<div class="main testimonials" data-behavior="franchise-testimonials">
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
            <div class="col">
                <div class="txt">
                    <p class="big-testimonial">
                        <span class="quote left_quote"></span>
                        <span class="large-testimonial"><?php echo get_field('testimonial_top_quote', $post_id); ?></span>
                        <span class="quote right_quote"></span>
                    </p>
                </div>
            </div>
			<?php 
				  $args = array( 'post_type' => 'testimonial','order' => 'ASC' );
				  $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); 
				  ?>								
            <div class="col">
				<?php $attachment_id = get_field('image');
					  $size = "testimonial";
					  $img = wp_get_attachment_image_src($attachment_id, $size);						
				?>
                <div class="txt">
                    <h3><?php the_title(); ?></h3>
					<h6><?php echo get_field('subtitle'); ?></h6>
					<h6><?php echo get_field('subtitle_2'); ?></h6>
                    <p>
						<span class="quote left_quote"></span>
						<?php the_content(); ?>
						<span class="quote right_quote"></span>
				    </p>
                </div>
            </div>
		<?php endwhile; ?>
            <div class="col">
                <div class="txt">
                    <p class="big-testimonial">
                        <span class="quote left_quote"></span>
                        <span class="large-testimonial"><?php echo get_field('testimonial_bottom_quote', $post_id); ?></span>
                        <span class="quote right_quote"></span>
                    </p>  
                </div>
            </div>    
        </div>
    </div>	
    <a class="btn_link_1" href="<?php echo get_field('bottom_link_url', $post_id) ?>">
        <p class="title_1 first_title"><?php echo get_field('bottom_link_text', $post_id) ?><span class="arrow"></span><span class="txt">Questions?: <?php echo of_get_option('franchise_info_email'); ?></span></p>
    </a>
</div>
<?php get_footer(); ?>