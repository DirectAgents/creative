<?php

/*-----------------------------------------------------------------------------------*/
// This starts the Tabs widget.
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'tabs_load_widgets' );

function tabs_load_widgets() {
	register_widget( 'Tabs_Widget' );
}

class Tabs_Widget extends WP_Widget {

	function Tabs_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tabs', 'description' => __('Adds the Tabs box for popular posts, archives, categories and tags.', "themebeagle") );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tabs-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'tabs-widget', __('WP-Prosperity Tabs', "themebeagle"), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Call the featured-tabs file. */
		get_template_part( 'featured-tabs' );

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		return $instance;
	}

}

/*-----------------------------------------------------------------------------------*/
// Social Media Icons widget
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'socialicons_load_widgets' );

function socialicons_load_widgets() {
	register_widget( 'Socialicons_Widget' );
}

class Socialicons_Widget extends WP_Widget {

	function Socialicons_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'socialicons', 'description' => __('Adds the Social Media Icons.', "themebeagle") );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'socialicons-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'socialicons-widget', __('WP-Prosperity Social Media Icons', "themebeagle"), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$intro = $instance['intro'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		printf( '<div class="textwidget">' );

		/* Display intro from widget settings if one was input. */
		if ( $intro )
			printf( '<p>' . __('%1$s', "themebeagle") . '</p>', $intro );

		get_template_part('icons-site');

		printf( '</div>' );

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and intro to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['intro'] = strip_tags( $new_instance['intro'] );

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */

		$defaults = array(
			'title' => __('Lets Connect', 'themebeagle'),
			'intro' => __("We'd love to connect with you on any of the following social media platforms.", "themebeagle")
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themebeagle'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" /></p>

		<!-- Intro: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'intro' ); ?>"><?php _e('Introduction:', 'themebeagle'); ?></label>
		<textarea style="width:100%;" rows="3" id="<?php echo $this->get_field_id( 'intro' ); ?>" name="<?php echo $this->get_field_name( 'intro' ); ?>"><?php echo $instance['intro']; ?></textarea></p>

	<?php }
}

/*-----------------------------------------------------------------------------------*/
// This starts the Category Posts widget.
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'catposts_load_widgets' );

function catposts_load_widgets() {
	register_widget( 'Catposts_Widget' );
}

class Catposts_Widget extends WP_Widget {

	function Catposts_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'catposts', 'description' => __('Adds posts from a specific category .', "themebeagle") );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'catposts-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'catposts-widget', __('WP-Prosperity Category Posts', "themebeagle"), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		global $post;
		$post_old = $post; // Save the post object.

		extract( $args );

		// If no title, use the name of the category.
		if( !$instance["title"] ) {
			$category_info = get_category($instance["cat"]);
			$instance["title"] = $category_info->name;
		}

		// Get array of post info.
		$cat_posts = new WP_Query("showposts=" . $instance["num"] . "&cat=" . $instance["cat"]);

		/* Before widget (defined by themes). */
		echo $before_widget;

		// Widget title
		echo $before_title;
		if( $instance["title_link"] )
			echo '<a href="' . get_category_link($instance["cat"]) . '">' . $instance["title"] . '</a>';
		else
			echo $instance["title"];
		echo $after_title;

		// Post list
		echo "<div class='cat-posts-widget textwidget'>\n";

		while ( $cat_posts->have_posts() ) {
			$cat_posts->the_post();
		?>
				<div class="recent-excerpt-wrap">
					<div class="recent-excerpt clearfix">
						<?php themebeagle_post_thumbnail(); ?>
						<p class="title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></p>
						<?php the_excerpt(); ?>
					</div>
				</div>
		<?php }

		echo "</div>\n";

		echo $after_widget;

		$post = $post_old; // Restore the post object.
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['cat'] = $new_instance['cat'];
		$instance['num'] = $new_instance['num'];
		$instance['title_link'] = $new_instance['title_link'];

		return $instance;
	}

	function form($instance) {

		$defaults = array(
			'title' => '',
			'cat' => '',
			'num' => 0,
			'title_link' => '',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id("title"); ?>">
				<?php _e( 'Title', 'themebeagle' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
			</label>
		</p>

		<p>
			<label>
				<?php _e( 'Category', 'themebeagle' ); ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("cat"), 'selected' => $instance["cat"] ) ); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("num"); ?>">
				<?php _e('Number of Posts to Show', 'themebeagle'); ?>:
				<input style="text-align: center;" id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="text" value="<?php echo absint($instance["num"]); ?>" size='3' />
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("title_link"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("title_link"); ?>" name="<?php echo $this->get_field_name("title_link"); ?>"<?php checked( (bool) $instance["title_link"], true ); ?> />
				<?php _e( 'Make widget title link', 'themebeagle' ); ?>
			</label>
		</p>

	<?php }
}


?>