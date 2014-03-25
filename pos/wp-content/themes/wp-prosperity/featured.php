<?php
	$slideshowspeed = tb_option('slideshowspeed');
	$sliderid = 'slider-' . substr(md5(rand(0, 1000000)), 0, 4);  
	if ( tb_option('post_autoslide') ) {
		$slideshow = 'true';
	} else {
		$slideshow = 'false';
	}
?>

<div class="mainslider narrowslider">

	<?php if ( tb_option('feature_title') ) { ?>
		<h2 class="feat-title">
			<span>
				<?php 
					if ( tb_option('feature_title_icon') ) { echo '<i class="fa ' . tb_option('feature_title_icon') . '"></i>'; }
					echo stripslashes( tb_option('feature_title') ); ?>
			</span>
		</h2>
	<?php } ?>

	<div class="flexslider <?php echo $sliderid; ?>">

		<ul class="slides">

<?php
	$count = 1;
	$postids = '';
	$postids = tb_featuredposts();
	$featurecount = tb_option('featurecount');
	$my_query = new WP_Query(array(
		'post_type' => array('post', 'page'),
		'ignore_sticky_posts' => 1,
		'post__in' => $postids,
		'posts_per_page' => $featurecount
	));
	while ($my_query->have_posts()) : $my_query->the_post();
	$featimg_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-thumbnail');
	global $do_not_duplicate;
	$do_not_duplicate[] = $post->ID;
?>

			<li id="main-slide-<?php echo $count; ?>">

				<div class="slide-container clearfix">

					<div class="slide-overlay"></div>

					<div class="feature-image" style="background-image:url('<?php echo $featimg_url[0]; ?>')"></div>

					<div class="flex-caption">

						<?php the_title( '<h2 class="entry-title" itemprop="headline"><span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></span></h2>' ); ?>
						
						<div class="flex-excerpt">
							<div class="flex-excerpt-content">
								<?php the_excerpt(); ?>
							</div>
						</div>

						<p class="flex-read-more">
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php _e( 'Read More', 'themebeagle' ); ?>
							</a>
						</p>

					</div>


				</div>

			</li>


<?php 
	$count = $count + 1;
	endwhile;
	wp_reset_query(); 
?>

		</ul>

	</div>

</div>

<script type="text/javascript">
//<![CDATA[
	jQuery(document).ready(function() {
		jQuery('.flexslider<?php echo '.'.$sliderid; ?>').flexslider({
			animationSpeed:300,
			animation:'slide',
			animationLoop: true,
			slideshow:<?php echo $slideshow; ?>,
			slideshowSpeed: <?php echo $slideshowspeed; ?>,
			smoothHeight:true,
			useCSS:false,
			controlNav:true,
			pauseOnAction: true,
			pauseOnHover: true,
		<?php if ( tb_option('post_animate') ) { ?>
			before: function(slider) { 
				var $titleContainer = jQuery("<?php echo '.'.$sliderid; ?> .entry-title"); 
				$titleContainer.css("opacity", "0"); 
				var $marginLefty = jQuery("<?php echo '.'.$sliderid; ?> .flex-excerpt"); 
				$marginLefty.css("opacity", "0");
				var $readMore = jQuery("<?php echo '.'.$sliderid; ?> .flex-read-more"); 
				$readMore.css("opacity", "0");
			},
           		after: function(slider) { 
				var $titleContainer = jQuery("<?php echo '.'.$sliderid; ?> .entry-title"); 
				$titleContainer.css("marginTop", "0"); 
				$titleContainer.animate({ marginTop: 0, opacity: 1 }, 750);
				var $marginLefty = jQuery("<?php echo '.'.$sliderid; ?> .flex-excerpt"); 
				$marginLefty.css("marginBottom", "-350px"); 
				$marginLefty.animate({ marginBottom: 0, opacity: 1 }, 700); 
				var $readMore = jQuery("<?php echo '.'.$sliderid; ?> .flex-read-more"); 
				$readMore.css("marginBottom", "-550px"); 
				$readMore.animate({ marginBottom: 0, opacity: 1 }, 1000); 
			},
           		start: function(slider) { 
				var $titleContainer = jQuery("<?php echo '.'.$sliderid; ?> .entry-title"); 
				$titleContainer.css("marginTop", "0"); 
				$titleContainer.animate({ marginTop: 0, opacity: 1 }, 750);  
				var $marginLefty = jQuery("<?php echo '.'.$sliderid; ?> .flex-excerpt"); 
				$marginLefty.css("marginBottom", "-350px"); 
				$marginLefty.animate({ marginBottom: 0, opacity: 1 }, 700);
				var $readMore = jQuery("<?php echo '.'.$sliderid; ?> .flex-read-more"); 
				$readMore.css("marginBottom", "-550px"); 
				$readMore.animate({ marginBottom: 0, opacity: 1 }, 1000);
			}
		<?php } ?>   
		});
	});
//]]>
</script>