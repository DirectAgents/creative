<div id="mytabs-widget" class="mytabs clearfix">

	<ul class="nav nav-tabs">
  		<li class="active"><a href="#tabs-recent" data-toggle="tab"><i class="fa fa-file"></i><?php _e("Latest", "themebeagle"); ?></a></li>
  		<li><a href="#tabs-archives" data-toggle="tab"><i class="fa fa-folder"></i><?php _e("Archives", "themebeagle"); ?></a></li>
  		<li><a href="#tabs-comments" data-toggle="tab"><i class="fa fa-comments"></i><?php _e("Comments", "themebeagle"); ?></a></li>
	</ul>

	<div class="tab-content">

		<div id="tabs-recent" class="tab-pane active fade in">

			<!-- RECENT POSTS TAB -->
			<?php
				$numposts = 5;
				$cats = '';
				$cats = tb_option('exclude_cats');
				$my_query = new WP_Query(array(
					'category__not_in' => $cats,
					'posts_per_page' => $numposts
				));
				while ($my_query->have_posts()) : $my_query->the_post(); 
			?>

				<div class="recent-excerpt-wrap">
					<div class="recent-excerpt clearfix">
						<?php themebeagle_post_thumbnail(); ?>
						<p class="title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></p>
						<?php the_excerpt(); ?>
					</div>
				</div>

			<?php endwhile; wp_reset_query(); ?>

		</div>

		<div id="tabs-comments" class="tab-pane fade">

			<!-- RECENT COMMENTS SLIDE -->			
			<?php
				$comments = get_comments(array('status' => 'approve','number' => '5'));
				$output = "\n<div>";
				foreach ($comments as $comment) {
					$comment_text = strip_tags($comment->comment_content);
					$num_words = 11;
					$blah = explode(' ', $comment_text);
					if (count($blah) > $num_words) {
						$k = $num_words;
						$use_dotdotdot = 1;
					} else {
						$k = count($blah);
						$use_dotdotdot = 0;
					}
					$excerpt = '';
					for ($i=0; $i<$k; $i++) { $excerpt .= $blah[$i] . ' '; }
					$excerpt .= ($use_dotdotdot) ? '[...]' : '';
					$output .= "\n<div class='recent-excerpt-wrap'><div class='recent-excerpt clearfix'>" . get_avatar($comment,'96') . "<span class='title'>" . strip_tags($comment->comment_author) ."</span><br /><a href=\"" . get_permalink($comment->comment_post_ID)."#comment-" . $comment->comment_ID . "\">" . strip_tags($excerpt)."</a></div></div>";
				}
				$output .= "\n</div>";
				if ( $comment ) { 
					echo $output; 
				} else { 
					echo "<p class='recent-excerpt'>No Comments Yet</p>";
				}
			?>

		</div>

		<div id="tabs-archives" class="tab-pane fade">

			<!-- ARCHIVES SLIDE -->
			<div class='recent-excerpt-wrap'>
				<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
					<option value=""><?php echo esc_attr(__('Select a Month', 'themebeagle')); ?></option>
					<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
				</select>
				<noscript><input type="submit" value="<?php _e("Go", "themebeagle"); ?>" /></noscript>
			</div>

			<div class='recent-excerpt-wrap'>
				<form action="<?php echo home_url(); ?>/" method="get">
					<?php 
						$select = wp_dropdown_categories('show_option_none=' . __('Select a Category', 'themebeagle') .'&show_count=1&orderby=name&echo=0&hierarchical=1&id=catdrop');
						$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
						echo $select;
					?>
					<noscript><input type="submit" value="<?php _e("Go", "themebeagle"); ?>" /></noscript>
				</form>
			</div>

			<?php $hastags = get_tags(); if ($hastags) { ?>
				<div class='recent-excerpt-wrap'>
					<select name="tag-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
						<option value=""><?php echo esc_attr(__('Select a Tag', 'themebeagle')); ?></option>
						<?php $posttags = get_tags('orderby=count&order=DESC&number=50'); ?>
						<?php if ($posttags) {
							foreach($posttags as $tag) {
								echo "<option value='";
								echo get_tag_link($tag);
								echo "'>";
								echo $tag->name;
								echo " (";
								echo $tag->count;
								echo ")";
								echo "</option>"; }
							} 
						?>
					</select>
					<noscript><input type="submit" value="<?php _e("Go", "themebeagle"); ?>" /></noscript>
				</div>
			<?php } ?>

		</div>

	</div>

</div>