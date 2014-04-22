<?php
/**
* Template Name: Shop
*
* @package WordPress
* @subpackage 16 Handles
*/

get_header(); 
the_post();
$post_id = get_the_ID();
?>
<div class="main shop" data-behavior="shop">
	<?php $attachment_id = get_field('background_header_image');
	$size = "page_header_image";
	$img = wp_get_attachment_image_src($attachment_id, $size);						
	?>
	<div class="main_title" style="background-image: url('<?php echo $img[0]; ?>')">
		<div class="centerModule">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<?php $args = array( 'post_type' => 'product','order' => 'ASC' );
		$loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>		
	    <div class="item" id="item-<?php echo get_the_ID(); ?>">
	        <div class="centerModule">
	            <div class="cont">										
									<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
									<input type="hidden" name="cmd" value="_s-xclick">
									<input type="hidden" name="hosted_button_id" value="<?php echo get_field('product_id'); ?>">
									<input type="hidden" name="on0" value="Card Amount">
									 <select name="os0" class="pp-select" style="visibility: hidden;">
										<!-- <option value="$10.00">$10.00</option>
										<option value="$16.00">$16.00</option>
										<option value="$20.00">$20.00</option>
										<option value="$50.00">$50.00</option> -->
									</select>
									<input type="hidden" name="currency_code" value="USD">
									</form>		
	                <div class="img">
						<?php $attachment_id = get_field('featured_image');
						$size = "product_image";
  						$img = wp_get_attachment_image_src($attachment_id, $size);						
						?>
						<img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>"/>					
	                </div>
	                <div class="txt">
	                    <h4 class="title_3"><?php the_title() ?></h4>
											<p><?php the_content(); ?></p>																																																		
		                    <div class="field field_1_2">
		                        <div class="select btn_select">
		                            <div class="box btn_link_2 btn_link_3 size">
		                                <p class="state first_title">Choose</p>
		                                <div class="arrow"></div>
		                            </div>
		                            <div class="options btn_link_3">
		                                <div class="arrow"></div>
		                                <div class="box">
											<?php 
												$opts = get_field('product_options');
												$opts = explode("\n", $opts);						
												foreach($opts as $opt){ 
													echo '<div class="option"><p class="data">' . $opt . '</p><p>' . $opt . '</p></div>';
												} 
											 ?>																				
		                                </div>
		                            </div>
		                        </div>
		                    </div>
	                        <div class="field field_1_2 field_1_2_end">
	                            <a class="btn_link_2 btn_link_3 btn_link_icon btn_shop" data-parent="#item-<?php echo get_the_ID(); ?>" href="#">
	                                <p class="first_title"><div class="icon"></div><span class="arrow"></span></p>
	                            </a>
	                        </div>													
						<?php if(get_field('rewards_card') == "yes") { ?>
		                    <div class="col_wrap">
		                        <a class="btn_link_2 btn_link_4" href="https://synergyloyalty.net/16handles/" target="_blank">
		                            <p class="first_title">Check Balance</p>
		                        </a>
		                    </div>
		                </div>														
					    <?php } ?>							                   
	                </div>
	            </div>
	        </div>
	    </div>			
<?php endwhile; ?>    
<a class="btn_link_1" href="<?php echo get_field('bottom_link_url', $post_id); ?>">
	<p class="title_1 first_title"><?php echo get_field('bottom_link_text', $post_id); ?><span class="arrow"></span></p>
</a>
</div>
<?php get_footer(); ?>