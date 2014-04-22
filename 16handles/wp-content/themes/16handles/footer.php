<?php
/**
 * @package WordPress
 * @subpackage 16 Handles
 */
?>
<footer>
    <div class="social">
        <div class="centerModule">
            <ul>
                <li><a class="icon icon_1" href="<?php echo of_get_option('facebook_url') ?>"></a></li>
                <li><a class="icon icon_2" href="<?php echo of_get_option('twitter_url') ?>"></a></li>
                <li><a class="icon icon_3" href="<?php echo of_get_option('pinterest_url') ?>"></a></li>
                <li><a class="icon icon_4" href="<?php echo of_get_option('instagram_url') ?>"></a></li>
                <li><a class="icon icon_5" href="<?php echo of_get_option('youtube_url') ?>"></a></li>
                <li class="last-icon"><a class="icon icon_6" href="<?php echo of_get_option('foursquare_url') ?>"></a></li>
            </ul>
        </div>
    </div>
    <div class="centerModule">
        <div class="mailing">			
			<?php gravity_form(1, true, false, false, null, true, 32); ?>
        </div>
        <div class="trees">
            <div class="img"></div>
            <div class="txt">
                <p class="title">Trees Planted</p>
                <p class="number"><?php echo of_get_option('trees_planted'); ?></p>
            </div>
        </div>
    </div>
    <nav>		
		<?php wp_nav_menu('Footer Menu'); ?>
    </nav>
    <p class="sign"><?php echo of_get_option('footer_copyright') ?></p>
		<div class="msg">
			<div class="cont">			
			</div>                                    
			<a class="confirm close" href="#" >
				<p>Close</p>
				<div class="arrow"></div>
			</a>
		</div>
</footer>
<?php wp_footer(); ?>
<script>
    if($('#gmap_canvas').length > 0) {
        google.maps.event.addDomListener(window, 'load', initialize);
    }

    var _gaq=[['_setAccount',"UA-23336482-1"],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>