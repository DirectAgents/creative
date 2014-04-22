<?php
/**
 * @package WordPress
 * @subpackage Ajax Heroes
 */

 if ( isset($_GET['fb']) && ($_GET['fb'] == 1) ) { 
    get_header('fb'); 
  } else {
    get_header(); 
  } ?>
<div class="hero-detail top-content">
  <div class="float-left ajax-hero">
      <?php $heroes_page_object = get_page_by_path('ajax-heroes'); ?>
      <h1><?php echo get_the_title($heroes_page_object->ID); ?></h1>
      <?php echo apply_filters('the_content',$heroes_page_object->post_content);?>
  </div>
  <div class="hero-detail-top">
      <a href="<?php bloginfo('url') ?>/nominate-your-hero" class="red-icon-button" <?php echo (isset($_GET['fb'])) ? 'target="_blank"' : ''; ?>>Nominate Your Hero</a>
      <form method="get" id="searchForm" action="/" role="search">
          <?php if ( isset($_GET['fb']) && $_GET['fb'] == 1 ) echo '<input type="hidden" name="fb" value="1">'; ?>
          <input type="text" class="field" id="search_box" name="s" value="<?php echo get_search_query() ?>" placeholder="Find a Hero">
          <input type="submit" class="submit" id="searchSubmit" value="GO!">
      </form>
  </div>
  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 global $query_string;
 query_posts($query_string.'&paged='. $paged ); ?>
</div>
<div class="hero-list-bottom">
  <div class="heroes-pagination">
    <?php global $wp_query; ?>
    <h2 class="result_str">Your search returned <span><?php echo $wp_query->post_count ?></span> matches for <span><?php echo get_search_query() ?>:</span></h2>    
      <div class="wp-pagenavi-wrap">
        <?php if (function_exists('wp_pagenavi') && have_posts() ) wp_pagenavi(); ?>
      </div>
  </div>  
      <?php if ( have_posts() ) : ?>
        <ul>
          <?php $counter = 1; ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li class="hero-profile float-left hero-page <?php echo 'hero_id_'.$post->ID ?>" data-hero-link="<?php the_permalink(); ?>">
                <div class="frame">
                  <?php $thumb_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'hero_thumb'); ?>
                  <?php if (trim($thumb_data[0]) != '') {
                    $img_src = $thumb_data[0];
                  } else {
                    $img_src =  get_bloginfo('template_url').'/img/upload-image-unknown.png';
                  } ?>
                  <img src="<?php echo $img_src; ?>" alt="<?php the_title(); ?> <?php echo substr(get_post_meta($post->ID,'hero_last_name',true), 0, 1);?>.">
                  <span class="vote-amount"><?php echo intval(get_post_meta($post->ID,'hero_votes',true)) ?> Votes</span>
                  <p><span><?php the_title(); ?> <?php echo substr(get_post_meta($post->ID,'hero_last_name',true), 0, 1);?>.</span> - <?php echo get_post_meta($post->ID,'hero_state',true) ?></p>
                  <p><?php echo get_post_meta($post->ID,'hero_quick_summary',true) ?></p>
                </div>
                <a href="javascript:;" data-hero-id="<?php echo $post->ID; ?>" data-nonce="<?php echo wp_create_nonce( 'vote_for_hero' ) ?>" class="red-button-small vote-action">Vote</a>
                <a href="javascript:;" data-link="<?php the_permalink(); ?>" data-title="<?php the_title(); ?> <?php echo substr(get_post_meta($post->ID,'hero_last_name',true), 0, 1);?>." class="share-link blue-link">Share</a>
                <div class="addthis_share_box center">
                  <div id="addthis_toolbox_<?php echo rand(0,10000); ?>" class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?> <?php echo substr(get_post_meta($post->ID,'hero_last_name',true), 0, 1);?>.">
                  </div>
                </div>
                <a href="<?php the_permalink(); ?>" data-hero-id="<?php echo $post->ID; ?>" class="red-link read-hero-story">Read their Story</a>
            </li>
            <?php if ($counter % 3 == 0): ?>
            <li class="h_devider"></li>
            <?php endif; ?>
            <?php $counter++; ?>
            <?php endwhile; endif; ?>
            <?php
            global $wp_query;  
            $total_pages = $wp_query->max_num_pages;  
            $current_page = max(1, get_query_var('paged'));
            if ($current_page < $total_pages) : ?>
                <li class="hero-profile float-left hero-page next-link">
                  <a href="<?php echo get_pagenum_link($current_page+1); ?>"><img src="<?php bloginfo('template_url') ?>/img/next-page.png" alt="next page"></a>
                </li>
            <?php endif; ?>          
        </ul>
    <?php endif; ?>
    <div class="heroes-pagination">
        <div class="wp-pagenavi-wrap">
          <?php if (function_exists('wp_pagenavi') && have_posts() ) wp_pagenavi(); ?>
        </div>
    </div>
</div>
<?php
if ( isset($_GET['fb']) && ($_GET['fb'] == 1) ) { 
  get_footer('fb'); 
} else {
  get_footer(); 
} ?>