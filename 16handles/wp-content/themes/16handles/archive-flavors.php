<?php
/**
 * The template used to display flavors
 *
 * @package WordPress
 * @subpackage 16 Handels
 */

 get_header(); ?>
 <script type="javascript/template" id="location_template_short">
   <li data-slug="{{slug}}">{{title}}<span class="distance">{{distance}}<span>m</span></span></li>
 </script>
 <div class="main flavors" data-behavior="flavors" data-active-slide="">
	 <?php $remote = file_get_contents('') ?>
     <div class="main_title">
         <div class="centerModule">
             <div class="carrousel carrousel_3">
                 <div class="caroufredsel_wrapper">
                         <?php $top_terms = get_terms( 
                                                     array('type'), 
                                                     array( 'hide_empty' =>false, 
                                                            'title_li' => false, 
																														'order_by' => 'name',
																														'order' => 'DESC',
                                                            'parent'=>0)); ?>
                     <ul class="slide">
                       <?php foreach ($top_terms as $top_term): ?>
                         <li>
                             <h2><?php echo $top_term->name; ?></h2>
                             <?php $sub_terms = get_terms( 
                                                         array('type'), 
                                                         array( 'hide_empty' =>false, 
                                                                'title_li' => false, 
                                                                'parent'=>$top_term->term_id 
                                                               ));?>
                             <div class="sub_menu">
                                 <div class="subBox">
																	 <a href="#" class="selected">selected</a>
                                     <ul>
                                         <li class="first"><a class="active" data-term-id="<?php echo $top_term->term_id; ?>" href="#">All</a><span>. . . . .</span></li>
                                         <?php foreach ($sub_terms as $sub_term) : ?>
                                                 <li><a href="#" data-term-id="<?php echo $sub_term->term_id; ?>"><?php echo $sub_term->name ?></a><span>. . . . .</span></li>
                                         <?php endforeach; ?>
                                     </ul>
                                 </div>
                             </div>
                         </li>
                       <?php endforeach ?>
                     </ul>
                 </div>
                 <a id="prev" class="prev arrow arrow_left arrow_l_anim" href="#"><</a>
                 <a id="next" class="next arrow arrow_right arrow_r_anim" href="#">></a>
             </div>
         </div>
     </div>
     <div class="centerModule">
         <div class="icon_key">
             <h4>Icon Key <span class="icon"></span></h4>
             <ul>
               <li><a href="#"><img class="icon icon_1" src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_1.jpg"/><p>Low fat</p></a></li>
               <li><a href="#"><img class="icon icon_1" src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_2.jpg"/><p>Fat free</p></a></li>
               <li><a href="#"><img class="icon icon_1" src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_3.jpg"/><p>Contains gluten</p></a></li>
               <li><a href="#"><img class="icon icon_1" src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_4.jpg"/><p>Vegan</p></a></li>
               <li><a href="#"><img class="icon icon_1" src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_5.jpg"/><p>No sugar added</p></a></li>
               <li><a href="#"><img class="icon icon_1" src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_6.jpg"/><p>Contains nuts</p></a></li>
               <li><a href="#"><img class="icon icon_1" src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_7.jpg"/><p>Artisan</p></a></li>
             </ul>
         </div>
         <div class="list_items_prod flavors_list">
             <div id="list_container" class="items_prod items_info_extra">
							 <ul class="slide">
                   <?php $flavors = new WP_query(array(
                                                     'post_type' => 'flavors',
                                                     'posts_per_page' => -1,
                                                     'tax_query' => array(
                                                                         array(
                                                                             'taxonomy' => 'type',
                                                                             'field' => 'term_id',
                                                                             'terms' => array($top_terms[0]->term_id)
                                                                         )
                                                     )
                                             )); ?>
													<?php $count = 0; ?>																									 
                         <?php if ( $flavors->have_posts() ) : while ( $flavors->have_posts() ) : $flavors->the_post(); ?>
                           <?php $is_public = get_field('public', get_the_ID()); ?>
                           <?php if($is_public == "yes"){ ?>
                             <?php if($count > 0 && $count % 3 == 0){ ?>
                               <?php echo '</ul><ul class="slide">'; ?>
                             <?php } ?>
                                <?php get_template_part('content','flavor-item'); ?>
                             <?php $count++; ?>
                           <?php } ?>
                          <?php endwhile;endif; ?>                             
                 </ul>
             </div>
         </div>
     </div>
     <a class="btn_link_1" href="/locations">
         <p class="title_1 first_title">Now go get some fro-yo! find a store<span class="arrow"></span></p>
     </a>
 </div>
 <?php get_footer(); ?>