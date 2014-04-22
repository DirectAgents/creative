<?php
/**
 * Template Name: Landing Page
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
the_post();
$post_id = get_the_ID();
?>
<script type="javascript/template" id="location_template_short">
  <li data-slug="{{slug}}">{{title}}<span class="distance">{{distance}}<span>m</span></span></li>
</script>

<style type="text/css" media="screen">
  .main section.section_3 { background-color: <?php the_field('panel_3_background_color') ?>; }
</style>
<div class="main home" data-behavior="home">
<div id="navbarExample" class="navbar">
  <ul id="verticalspymenu" class="nav">
    <li><a class="s01" href="#s01">section 1</a></li>
    <li><a class="s02" href="#s02">section 2</a></li>
    <li><a class="s03" href="#s03">section 3</a></li>
    <li><a class="s04" href="#s04">section 4</a></li>
    <li><a class="s05" href="#s05">section 5</a></li>
    <li><a class="s06" href="#s06">section 6</a></li>
  </ul>
</div>
  <div data-spy="scroll" data-target="#navbarExample" id="contentcontainer" class="scrolledArea">
    <section id="s01" class="current s section_1 left">
        <div class="fixed">
	        <div class="centerModule">
	            <div class="txt big_txt">
	                <h3><?php the_field('panel_1_header_1'); ?></h3>
	                <h2><?php the_field('panel_1_header2'); ?></h2>
	                <h3 style="margin-top:3px;padding-left:3px;"><?php the_field('panel_1_header3'); ?></h3>
	            </div>
	            <a href="http://16handles.com/flavors/?yogurt"><?php $image = wp_get_attachment_image_src(intval(get_post_meta(get_the_ID(),'panel_one_background_image',true)),'full'); ?>
	            <?php if ($image) echo '<img class="right" src="'.$image[0].'"/>'; ?></a>
	        </div>
        </div>
    </section>

<section id="s02" class="s section_2 right">
        <div class="centerModule">
            <div class="btn_round_cont">
                <a class="btn_round_1" href="#">
                    <div class="arrow"></div>
                </a>
								<div id="btn-border"></div>
								
            </div>
            <div class="txt big_txt">
              <h3><a href="http://16handles.com/locations/"><?php the_field('panel_2_header1'); ?></a></h3>
              <h2><a href="http://16handles.com/locations/"><?php the_field('panel_2_header2'); ?></a></h2>
              <h3><a href="http://16handles.com/locations/"><?php the_field('panel_2_header3'); ?></a></h3>
            </div>
        </div>
        <?php $image = wp_get_attachment_image_src(intval(get_post_meta(get_the_ID(),'panel_2_background_image',true)),'full'); ?>
        <?php if ($image) echo '<img src="'.$image[0].'"/>'; ?>
    </section>

<section id="s03" class="mailing">
      <div class="centerModule">
        <div class="find-locations-home">
          <div class="txt big_txt">
            <h2>Get the Party Started</h2>  
          </div>
          <div class="left">
            <h4>We cater to or host your party</h4>
            <form class="search-by-zipcode-short">
              <input name="zipcode" type="text" placeholder="Enter a Zip Code">
              <input class="arrow" type="submit" value="" style="right: 10px;">
            </form>
            <ul class="location-service-filter">
              <li><a href="#" class="catering">Catering</a></li>
              <li><a href="#" class="party">Party</a></li>
            </ul>
          </div>
          <div class="right">
            <div class="locations_short_result_msg">
              <h4>Here are the locations near you</h4>
            </div>
            <ul id="locations_results_short" class="locations_results_short">
            </ul>
          </div>                    
        </div>
      </div>	
    </section>
    
    <section id="s04" class="s section_3 left">
      <div class="centerModule">
          <div class="txt big_txt">
            <h3><a href="https://synergyloyalty.net/16handles/" target="_blank"><?php the_field('panel_3_header1'); ?></a></h3>
            <h2><a href="https://synergyloyalty.net/16handles/" target="_blank"><?php the_field('panel_3_header2'); ?></a></h2>
            <h3><a href="https://synergyloyalty.net/16handles/" target="_blank"><?php the_field('panel_3_header3'); ?></a></h3>
          </div>
          <?php $image = wp_get_attachment_image_src(intval(get_post_meta(get_the_ID(),'panel_3_background_image',true)),'full'); ?>
          <?php if ($image) echo '<a href="https://synergyloyalty.net/16handles/" target="_blank"><img class="right" src="'.$image[0].'"/></a>'; ?>
      </div>
    </section>
    <section id="s05" class="s section_4 center">
      <div class="centerModule">
          <div class="txt big_txt">
              <h2><?php echo of_get_option('trees_planted'); ?></h2>
              <p>Trees planted</p>
          </div>
      </div>
      <img src="<?php bloginfo('template_url'); ?>/img/landing_tree.jpg"/>
    </section>
    <section id="s06" class="s section_5">
      <div class="tw">
		    <div class="tw">
		        <?php $feed = new WP_Query(array('post_type'=>'landing_slides','posts_per_page'=>-1)) ?>
		        <?php if ( $feed->have_posts() ) : while ( $feed->have_posts() ) : $feed->the_post(); ?>
		            <?php $type = get_post_meta(get_the_ID(),'type',true); ?>
		            <?php switch ($type) {
		              case 'image':
		                    $image = wp_get_attachment_image_src( intval(get_post_meta(get_the_ID(),'image',true)), 'slide_feed'); ?>
		                    <?php if ($image): ?>
		                    <img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>"/>
		                    <?php endif;
		                break;
		              case 'tweet': ?>
		                <div class="box color<?php echo ($xyz++%2); ?> <?php the_field('tweet_background_color'); ?>">
		                    <div class="cont">
		                        <div class="txt">
		                            <?php the_field('tweet_copy'); ?>
		                        </div>
		                        <p class="info">
		                            <span class="name"><?php the_field('tweet_handle'); ?> | </span>
		                            <span class="sep timeago" title="<?php the_field('time_tweeted'); ?>"><?php the_field('time_tweeted'); ?></span>
		                        </p>
		                    </div>
		                </div>
		              <?php
		                break;
		              default:
		                break;
		            } ?>
		        <?php endwhile; ?>
		        <?php endif; ?>
					</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
