<?php
	global $catid;
	global $postclass;

	global $do_not_duplicate;
	if ( ! tb_option('hide_dupes') ) { $do_not_duplicate = NULL; }

	global $postcount;
	$postcount = get_option('posts_per_page');

	if (is_front_page()) { 
		$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	} 
?>

	<ul class="option-set cat-filter clearfix">
		<li class="all"><a data-filter="*" href="#" class="selected"><?php _e("All", "themebeagle"); ?></a></li>
		<?php
			$categories = get_categories(array(
				//'include' => $catid,

				'taxonomy' => 'case_studies_tax',
				'hide_empty' => true
			));
			//var_dump($categories);
			foreach ( $categories as $cat ) {
				echo '<li><a data-filter=".'.$cat->slug.'" href="#">'.$cat->name.'</a></li>'."\n";
			}
		?>
	</ul> <!-- .cat-filter -->

	<?php $args = array( 
		'post_type' => 'rs_case_studies',
		'posts_per_page' => $postcount,
		//'category__in' => $catid,
		'paged' => $paged,
		'post__not_in' =>  $do_not_duplicate
	);

	$q = new WP_Query($args);
	if ($q->have_posts()) : ?>
		
		<div class="article-container portfolio-container">

			<?php while ($q->have_posts()) : $q->the_post();
				// get the term from the CTP and use it in the post clas
				// Otherwise the sorting on the front end doesn't work
				$t = '';

				$terms = get_the_terms(get_the_id(), 'case_studies_tax');
				
				if ( $terms && ! is_wp_error( $terms ) ) : 
					foreach ($terms as $term)
					{	
						//print_r($term);
						$t = $term->slug;
					}
				endif;
			?>
				<!-- Add in 'post' class for padding styles and add in the term for sorting -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(array($postclass, $t, 'post')); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<div class="entry-block">

						<?php themebeagle_large_thumbnail(); ?>

						<div class="entry-hidden-block">
							<div class="entry-hidden-block-content">
								<a href="<?php echo esc_url( get_permalink() ); ?>" class="hidden-link"><i class="fa fa-link"></i></a>
								<?php themebeagle_entry_title(); ?>
							</div>
						</div>

					</div>

				</article> <!-- article.post -->
			 
		<?php endwhile; themebeagle_paging_nav();?>

		</div><!-- .article-container -->
	
	<?php endif;wp_reset_postdata(); ?>