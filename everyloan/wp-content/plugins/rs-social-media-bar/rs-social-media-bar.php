<?php

/*
	Plugin Name: RS Social Media Bar
	Description: Social media bar used in conjunction with the responsive theme. Use the custom action 'rs_display_social_bar' to render the icons
*/

class RSSocial
{
	public function __construct () 
	{
		
		add_action('rs_display_social_bar', array ($this, 'social_bar'), 10, 2);
		add_action('wp_footer', array ($this, 'insert_social_js'));

	}

	/*
	 * rs_display_social_bar ()
	 * Display the date of the post and social media icons
	 * and display the post categories
	 */
	public function social_bar ($date, $link=null)
	{	
		global $post;
		$gplus = $this->rs_get_icon('gplus', $link);
		$fb = $this->rs_get_icon('fb', $link);
		$twitter = $this->rs_get_icon('twitter', $link);
		$tax = get_post_type() == 'advice_articles' ? 'advice_articles_tax' : 'category'; // Check if its advice and articles or a post
		$terms = wp_get_post_terms($post->ID, $tax, array("fields" => "all"));
		$term_links = '';

		foreach ($terms as $key=>$val)
		{	
			$link = get_term_link( $val->slug, $tax );
			$term_links .= '<a href="'. $link . '">' . $val->name . '</a> ';
		}
		
		$post_date = "<div class='post-date'><strong>Posted: </strong>" . $date . "</div><div class='post-cats'>Category: " . $term_links . "</div>";
		//$post_cats = "<div class='post-cats'>Posted in Mortgage and Information</div>";
		$social_icons = "<div class='social-icons'>" . $gplus . $fb . $twitter . "</div>";
		
		echo "<div class='social-bar'>". $post_date . $social_icons . "</div>";
		//var_dump($link);
	} 

	/*
	 * rs_get_icon ()
	 * Display social media icons
	 */
	public function rs_get_icon($icon, $link=null)
	{	
		switch ($icon):
		
			case 'gplus':
				return '<div style="display:inline-block;" class="g-plusone" data-ref="' . $link . '" data-annotation="none"></div>';
			case 'fb':
				return '<div class="fb-like" data-href="' . $link . '" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>';
			case 'twitter':
				return '<a href="https://twitter.com/share" data-url="' . $link . '" class="twitter-share-button" data-count="none">Tweet</a>';

		endswitch;
	}

	/*
	 * nsert_gplus_js ()
	 * Insert Javascript into the footer for
	 * - gplus
	 * - fb 
	 * - twitter 
	 */
	public function insert_social_js ()
	{
		echo '<script type="text/javascript">(function(){var po=document.createElement("script");po.type="text/javascript";po.async=true;po.src="https://apis.google.com/js/plusone.js?onload=onLoadCallback";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(po,s);})();</script>';
		echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script", "twitter-wjs");</script>';
		echo '<div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128547943980888";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';
	}
}

new RSSocial();
?>