<?php
/**
 *
 * @package WordPress
 * @subpackage 16 Handles
 */
  // some hacks to get seo working for ajaxed locations


get_header();

?>

 <div class="main locations">   
    <?php $attachment_id = get_field('header_background_image', get_ID_by_slug('locations'));
    $size = "page_header_image";
    $img = wp_get_attachment_image_src($attachment_id, $size);                      
    ?>
    <div class="main_title" style="background-image: url('<?php echo $img[0]; ?>')">
        <div class="centerModule">
            <h1>Locations</h1>
        </div>
    </div>
    <div class="map_locations">
        <div class="centerModule">
            <h3 class="find-a-store">Find a store:</h3>
            <div class="search">
                <div class="field">
                    <form class="search-by-zipcode">
                        <input name="zipcode" type="text" placeholder="Zipcode"/>
                        <input class="arrow" type="submit" value=""/>
                    </form>
                </div>
                <p>-OR-</p>
                <div class="field">
                    <div class="select btn_select search_by_state" id="search_by_state">
                        <div class="box btn_link_2">
                            <p class="state first_title">State</p>
                            <div class="arrow"></div>
                        </div>
                        <div class="options">
                            <div class="arrow"></div>
                            <div class="box">
                              <div class="option"><p class="data">AL</p><p>AL</p></div>
                              <div class="option"><p class="data">AK</p><p>AK</p></div>
                              <div class="option"><p class="data">AZ</p><p>AZ</p></div>
                              <div class="option"><p class="data">AR</p><p>AR</p></div>
                              <div class="option"><p class="data">CA</p><p>CA</p></div>
                              <div class="option"><p class="data">CO</p><p>CO</p></div>
                              <div class="option"><p class="data">CT</p><p>CT</p></div>
                              <div class="option"><p class="data">DE</p><p>DE</p></div>
                              <div class="option"><p class="data">FL</p><p>FL</p></div>
                              <div class="option"><p class="data">GA</p><p>GA</p></div>
                              <div class="option"><p class="data">HI</p><p>HI</p></div>
                              <div class="option"><p class="data">ID</p><p>ID</p></div>
                              <div class="option"><p class="data">IL</p><p>IL</p></div>
                              <div class="option"><p class="data">IN</p><p>IN</p></div>
                              <div class="option"><p class="data">IA</p><p>IA</p></div>
                              <div class="option"><p class="data">KS</p><p>KS</p></div>
                              <div class="option"><p class="data">KY</p><p>KY</p></div>
                              <div class="option"><p class="data">LA</p><p>LA</p></div>
                              <div class="option"><p class="data">ME</p><p>ME</p></div>
                              <div class="option"><p class="data">MD</p><p>MD</p></div>
                              <div class="option"><p class="data">MA</p><p>MA</p></div>
                              <div class="option"><p class="data">MI</p><p>MI</p></div>
                              <div class="option"><p class="data">MN</p><p>MN</p></div>
                              <div class="option"><p class="data">MS</p><p>MS</p></div>
                              <div class="option"><p class="data">MO</p><p>MO</p></div>
                              <div class="option"><p class="data">MT</p><p>MT</p></div>
                              <div class="option"><p class="data">NE</p><p>NE</p></div>
                              <div class="option"><p class="data">NV</p><p>NV</p></div>
                              <div class="option"><p class="data">NH</p><p>NH</p></div>
                              <div class="option"><p class="data">NJ</p><p>NJ</p></div>
                              <div class="option"><p class="data">NM</p><p>NM</p></div>
                              <div class="option"><p class="data">NY</p><p>NY</p></div>
                              <div class="option"><p class="data">NC</p><p>NC</p></div>
                              <div class="option"><p class="data">ND</p><p>ND</p></div>
                              <div class="option"><p class="data">OH</p><p>OH</p></div>
                              <div class="option"><p class="data">OK</p><p>OK</p></div>
                              <div class="option"><p class="data">OR</p><p>OR</p></div>
                              <div class="option"><p class="data">PA</p><p>PA</p></div>
                              <div class="option"><p class="data">RI</p><p>RI</p></div>
                              <div class="option"><p class="data">SC</p><p>SC</p></div>
                              <div class="option"><p class="data">SD</p><p>SD</p></div>
                              <div class="option"><p class="data">TN</p><p>TN</p></div>
                              <div class="option"><p class="data">TX</p><p>TX</p></div>
                              <div class="option"><p class="data">UT</p><p>UT</p></div>
                              <div class="option"><p class="data">VT</p><p>VT</p></div>
                              <div class="option"><p class="data">VA</p><p>VA</p></div>
                              <div class="option"><p class="data">WA</p><p>WA</p></div>
                              <div class="option"><p class="data">WV</p><p>WV</p></div>
                              <div class="option"><p class="data">WI</p><p>WI</p></div>
                              <div class="option"><p class="data">WY</p><p>WY</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="gmap_canvas"></div>
    </div>
    <div class="centerModule">
        <div class="accordion_head" style="display:none">
            <div class="box_2">
                <div class="box icon icon_4"><div class="icon_graph"></div><p>Delivery</p></div>
                <div class="box icon icon_3"><div class="icon_graph"></div><p>Cakes</p></div>
                <div class="box icon icon_2"><div class="icon_graph"></div><p>Parties</p></div>
                <div class="box icon icon_1"><div class="icon_graph"></div><p>Catering</p></div>
                
            </div>
        </div>
    </div>
    <div id="locations_results_container">
    </div>
    <a class="btn_link_1" href="/info/">
        <p class="title_1 first_title">Didn’t find a store near you? why not open your own?<span class="arrow"></span></p>
    </a>
</div>

<div id="locations_results_container" class='locations'>
    <div id="locations_results" class="accordion accordion_1 ui-accordion ui-widget ui-helper-reset" role="tablist">
    
        <?php
            
            $args = array('post_type' => 'locations', 'posts_per_page' => -1 );
            $query = new WP_Query($args);

            if ($query->have_posts()): 
                while ($query->have_posts()): $query->the_post(); ?>

        <div class="head odd slug_astoria ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" id="loc_id_<?php the_ID(); ?>" data-slug="astoria" data-locid="300" role="tab" aria-controls="ui-accordion-locations_results-panel-0" aria-selected="false" tabindex="0"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
            <div class="centerModule">
                <div class="box_1 title">
                    <h2 class="title_2"><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
                    <p class="sub_title"><?php the_field('address_street'); ?>, <?php the_field('city'); ?> | <?php the_field('phone'); ?></p>
                </div>
                <div class="box_2">
                    <div class="box txt txt_1 distance"><p>15.1<span>m</span></p></div>

                        <div class="box icon <?php echo get_icon_class('delivery'); ?>"></div>
                        <div class="box icon <?php echo get_icon_class('cakes'); ?>"></div>
                        <div class="box icon <?php echo get_icon_class('party_room'); ?>"></div>
                        <div class="box icon <?php echo get_icon_class('catering'); ?>"></div>
                
                </div>
            </div>
        </div>

        <div class="cont ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-locations_results-panel-0" aria-labelledby="loc_id_300" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
        </div>

        <?php endwhile;endif; ?>
    </div>
</div>

<?php get_footer(); ?>