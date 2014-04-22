<?php
/**
* Template Name: Franchise Landing
*
* @package WordPress
* @subpackage 16 Handles
*/

get_header(); 
the_post();
$post_id = get_the_ID();
?>
	<div class="main franchise" data-behavior="franchise">
		<?php $attachment_id = get_field('header_background_image');
	    $size = "page_header_image";
	    $img = wp_get_attachment_image_src($attachment_id, $size);                      
	    ?>
	    <div class="main_title" style="background-image: url('<?php echo $img[0]; ?>')">
	        <div class="centerModule">
	            <h1><?php the_title(); ?></h1>
	        </div>
	    </div>		
		<?php $testomials = get_post_meta(get_the_ID(), 'testimonials',true);  ?>            
		<?php if ( is_array($testomials) && isset($testomials[0])): ?>
			<div class="carrousel carrousel_2">
				<div class="caroufredsel_wrapper">
					<ul class="slide">
					<?php $args = array('post_type'=>'people', 'posts_per_page'=>-1, 'post__in'=>$testomials); ?>
					<?php $testomials_query = new WP_Query($args) ?>
					<?php if ( $testomials_query->have_posts() ) : ?>
						<?php while ( $testomials_query->have_posts() ) : $testomials_query->the_post(); ?>
							<li>
								<div class="content">
														               
									<div class="txt">                    
										<p>	
											<span class="quote left_quote"></span>
											<span class="quote right_quote"></span>
											<?php the_field('about');?>
											
										</p>
										</div>  
									<p class="description"><?php the_field('title'); ?> <span>|</span> <span class="name"><?php the_title(); ?></span> <span>|</span> <?php the_field('location'); ?></p>          
									</div>					                            
								</li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<div id="pager"></div>
				</div>	
			</div>
			<?php endif; ?>
			<div class="centerModule">        
				<div class="cont">
					<div class="col col_special">
						<img src="<?php echo get_field('row_one_featured_image', $post_id ); ?>" alt="<?php the_title(); ?>"/>
						<div class="txt">
							<h3><?php echo get_field('row_one_title', $post_id ); ?></h3>
							<p><?php echo get_field('row_one_text', $post_id ); ?></p>
						</div>
					</div>
					<div class="col right col_special">
						<img src="<?php echo get_field('row_two_image', $post_id ); ?>" alt="<?php the_title(); ?>"/>
						<div class="txt">
							<h3><?php echo get_field('row_two_headline', $post_id ); ?></h3>
							<p><?php echo get_field('row_two_text', $post_id ); ?></p>
						</div>
					</div>
					<div class="col_wrap">
						<div class="col col_1_3">					
							<img src="<?php echo get_field('column_one_header_image', $post_id ) ?>" alt="<?php the_title(); ?>"/>
							<h3><?php echo get_field('column_one_title', $post_id ) ?></h3>
							<p><?php echo get_field('column_one_text', $post_id ) ?></p>
						</div>
						<div class="col col_1_3">
							<img src="<?php echo get_field('column_two_header_image', $post_id ) ?>" alt="<?php the_title(); ?>"/>
							<h3><?php echo get_field('column_two_title', $post_id ) ?></h3>
							<p><?php echo get_field('column_two_text', $post_id ) ?></p>
						</div>
						<div class="last-child col col_1_3">
							<img src="<?php echo get_field('column_three_header_image', $post_id ) ?>" alt="<?php the_title(); ?>"/>
							<h3><?php echo get_field('column_three_title', $post_id ) ?></h3>
							<p><?php echo get_field('column_three_text', $post_id ) ?></p>
						</div>
					</div>
					<div class="col_wrap">
						<div class="col col_left green_story">					
							<img src="<?php echo get_field('bottom_row_image', $post_id ); ?>"/>
							<div class="txt">						
								<h3><?php echo get_field('bottom_row_title', $post_id ); ?></h3>
								<p><?php echo get_field('bottom_row_text', $post_id ); ?></p>
							</div>
						</div>
					</div>
					<a class="btn_link_2 btn_link_icon" href="<?php echo get_field('pdf_url', $post_id ); ?>">
						<p class="first_title">Download Franchise Info PDF <span class="arrow"></span></p>
					</a>
					<div class="col_wrap newspappers">
						<div class="col col_1_3">
							<img src="<?php echo get_field('press_column_one_image', $post_id ); ?>" alt="<?php the_title(); ?>"/>
							<p><?php echo get_field('press_column_one_text', $post_id ); ?></p>
							<a class="btn_link_2" href="<?php echo get_field('press_column_one_link', $post_id ); ?>">
								<p class="first_title">Read More</p>
							</a>
						</div>
						<div class="col col_1_3">
							<img src="<?php echo get_field('press_column_two_image', $post_id ); ?>" alt="<?php the_title(); ?>"/>
							<p><?php echo get_field('press_column_two_text', $post_id ); ?></p>
							<a class="btn_link_2" href="<?php echo get_field('press_column_two_link', $post_id ); ?>">
								<p class="first_title">Read More</p>
							</a>
						</div>
						<div class="col col_1_3 last-child">
							<img src="<?php echo get_field('press_column_three_image', $post_id ); ?>" alt="<?php the_title(); ?>"/>
							<p><?php echo get_field('press_column_three_text', $post_id ); ?></p>
							<a class="btn_link_2" href="<?php echo get_field('press_column_three_link', $post_id ); ?>">
								<p class="first_title">Read More</p>
							</a>
						</div>
					</div>
				</div>
			</div>
			<a class="btn_link_1" href="<?php echo get_field('bottom_page_link_url', $post_id ); ?>">
				<p class="title_1 first_title"><?php echo get_field('bottom_page_link_text', $post_id ); ?><span class="arrow"></span><span class="txt">Questions?: <?php echo of_get_option('franchise_info_email'); ?></span></p>
			</a>
		</div>
		<?php get_footer(); ?>
