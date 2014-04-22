<?php 
/*-----------------------------------------------------------------------------------*/
/* Load Flavors
/*-----------------------------------------------------------------------------------*/

add_action( "wp_ajax_load_flavors", "load_flavors_func" );
add_action( "wp_ajax_nopriv_load_flavors", "load_flavors_func" );
function load_flavors_func() {
  $term_id = isset($_REQUEST['term_id'])?intval($_REQUEST['term_id']):0;
  
  
  ob_start(); // buffer output instead of echoing it
  $flavos_query = new WP_Query( array(
                  'post_type' => 'flavors',
                  'posts_per_page'=>-1,
									'meta_key' => 'public',
									'meta_value' => 'yes',
                  'tax_query' => array(
                                      array(
                                          'taxonomy' => 'type',
                                          'field' => 'term_id',
                                          'terms' => array($term_id)
                                      )
                                    )
                            ));
		if ($flavos_query->have_posts()) {
			$i = 0;
			echo '<ul class="slide">';
			$result['have_posts'] = true;
			while ( $flavos_query->have_posts() ) : $flavos_query->the_post();
				get_template_part('content','flavor-item');					
				$i++;				
			if($i % 3 == 0){
				echo '</ul><ul class="slide">';
			}
		endwhile;					
		echo '</ul>';
	} else {
		echo '<h3>No Flavors Found</h3>';
	}
  $result['html'] = ob_get_clean();
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $result = json_encode($result);
            echo $result;
        }
        else {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }
  die();
}

/*-----------------------------------------------------------------------------------*/
/* Load Locations Feed
/*-----------------------------------------------------------------------------------*/

add_action( "wp_ajax_load_locations_info", "load_locations_func" );
add_action( "wp_ajax_nopriv_load_locations_info", "load_locations_func" );
function load_locations_func() {
  $field = isset($_REQUEST['field'])?$_REQUEST['field']:0;
  $address = isset($_REQUEST['address'])?$_REQUEST['address']:0;
  $loc_id = isset($_REQUEST['loc_id'])?$_REQUEST['loc_id']:0;
  $search_type = isset($_REQUEST['search_type'])?$_REQUEST['search_type']:'quick'; // full
    
  $args = array(
                  'post_type' => 'locations',
                  'posts_per_page'=>-1,
                  'orderby' => 'post_title',
                  'order' => 'ASC',
                            );
    // print_r('address'.$address);
  if ($field == 'zipcode' || $field == 'state') {
    $meta_query = array('meta_query' => array(
                                array(
                                    'key' => $field,
                                    'value' => $address,
                                    'compare' => '='
                                )));
    $args = array_merge($args, $meta_query);
  }
  if ($field == 'id' ) {
    $args = array( 'p'=>$loc_id );
  }
  ob_start(); // buffer output instead of echoing it
  $loc_query = new WP_Query( $args );
  $results_array = array();
  ?>var locationsInfo = [ <?php if ( $loc_query->have_posts() ) : while ( $loc_query->have_posts() ) : $loc_query->the_post(); ?>
            <?php switch ($search_type) {
              case 'full':
                get_template_part('content','location-js-template');
                break;
              case 'quick':
              default:
                get_template_part('content','location-js-template-short');
                break;
            } ?>
          <?php endwhile;endif; ?>] <?php
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
          echo ob_get_clean();
        }
        else {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }
  die();
} 

/*-----------------------------------------------------------------------------------*/
/* Load Locations - for index page (JSON)
/*-----------------------------------------------------------------------------------*/

add_action( "wp_ajax_load_locations_info_json", "load_locations_json_func" );
add_action( "wp_ajax_nopriv_load_locations_info_json", "load_locations_json_func" );
function load_locations_json_func() {
  global $post;
  $field = isset($_REQUEST['field'])?$_REQUEST['field']:0;
  $address = isset($_REQUEST['address'])?$_REQUEST['address']:0;
  $loc_id = isset($_REQUEST['loc_id'])?$_REQUEST['loc_id']:0;
  $result_type = isset($_REQUEST['result_type'])?$_REQUEST['result_type']:'short'; // quick or full
  $centerLocationLat = isset($_REQUEST['centerLocationLat'])?$_REQUEST['centerLocationLat']:0; // centerLocationLat
  $centerLocationLng = isset($_REQUEST['centerLocationLng'])?$_REQUEST['centerLocationLng']:0; // centerLocationLng
  $features_filter = isset($_REQUEST['features_filter'])?$_REQUEST['features_filter']:false;
  $radius = isset($_REQUEST['radius'])?$_REQUEST['radius']: intval(of_get_option('search_radius'));
  $cake_id = isset($_REQUEST['cake_id'])?$_REQUEST['cake_id']:0;
  $args = array(
                  'post_type' => 'locations',
                  'posts_per_page'=>-1,
                  'orderby' => 'title',
                  'order' => 'ASC',
                            );
  if ( $field == 'state') {
    $meta_query = array('meta_query' => array(
                                array(
                                    'key' => $field,
                                    'value' => $address,
                                    'compare' => '='
                                )));
    $args = array_merge($args, $meta_query);
  }
  ob_start(); //make sure we dont echo anything (like errors etc)
  $loc_query = new WP_Query( $args );
  if ( $loc_query->have_posts() ) : 
      while ( $loc_query->have_posts() ) : $loc_query->the_post();
          switch ($result_type) {
                  case 'full':
                    get_template_part('content','location-js-template-json');
                    break;
                  case 'extra_short':
                    $address_coordinates_string = get_field('address');
                    $location_zipcode = get_field('zipcode');
                    $coordinates = explode(',',$address_coordinates_string['coordinates']);
                    if (is_array($coordinates) && count($coordinates) == 2) {
                        //searching by zipcode:
                        if ($field=='zipcode') {
                          $distance = distHaversine( 
                                                      array('lat'=> $centerLocationLat, 'lng'=>$centerLocationLng), 
                                                      array('lat'=> $coordinates[0], 'lng'=> $coordinates[1])
                                                    );
                          //check if within radius
                          if ( $distance > $radius && intval($location_zipcode) != intval($address) ) break;
                        }
                    } else {
                      break; // break if coordinates not exist
                    }
                    $results_array = array();
                    $results_array['title'] = get_the_title();
                    $results_array['slug'] = $post->post_name;
                    $results_array['lat'] = $coordinates[0];
                    $results_array['lng'] = $coordinates[1];                    
                    $features = get_field('features');
                    $counter = 0;
                    if ($features_filter) {
                            foreach ($features_filter as $value) {                        
                                    if ( is_array($features_filter) && in_array($value,$features) ) $counter++;
                            }
                        // if has all filter features (either one or both)
                        if ($counter == count($features_filter))
                            $loc_info[] = $results_array;
                    } else {
                         $loc_info[] = $results_array;
                    }
                    break;                 

                  case 'extra_short_by_cake':
                    $address_coordinates_string = get_field('address');
                    $location_zipcode = get_field('zipcode');
                    $coordinates = explode(',',$address_coordinates_string['coordinates']);
                    if (is_array($coordinates) && count($coordinates) == 2) {
                        //searching by zipcode:
                        if ($field=='zipcode') {
                          $distance = distHaversine( 
                                                      array('lat'=> $centerLocationLat, 'lng'=>$centerLocationLng), 
                                                      array('lat'=> $coordinates[0], 'lng'=> $coordinates[1])
                                                    );
                          //check if within radius
                          if ( $distance > $radius && intval($location_zipcode) != intval($address) ) break;
                        }
                    } else {
                      break; // break if coordinates not exist
                    }
                    $results_array = array();
                    $results_array['title'] = get_the_title();
                    $results_array['slug'] = $post->post_name;
                    $results_array['lat'] = $coordinates[0];
                    $results_array['lng'] = $coordinates[1];
                    
                    $flavors_and_cakes = get_field('related_cakes');
                    $counter = 0;
                    foreach ($flavors_and_cakes as $cake) {
                            if ($cake->ID == $cake_id) {
                                $loc_info[] = $results_array;
                            }
                    }
                    // if has all filter features (either one or both)
                    // if ($counter == count($features_filter))
                    // $loc_info[] = $flavors_and_cakes;
                    break;                 
                  case 'short':
                  default:
                        $address_coordinates_string = get_field('address');
                        $location_zipcode = get_field('zipcode');
                        $coordinates = explode(',',$address_coordinates_string['coordinates']);
                        if (is_array($coordinates) && count($coordinates) == 2) {
                            //searching by zipcode:
                            if ($field=='zipcode') {
                              $distance = distHaversine( 
                                                          array('lat'=> $centerLocationLat, 'lng'=>$centerLocationLng), 
                                                          array('lat'=> $coordinates[0], 'lng'=> $coordinates[1])
                                                        );
                              //check if within radius
                              if ( $distance > $radius && ( $location_zipcode != $address) ) break;
                            }
                        } else {
                          break; // break if coordinates not exist
                        }
                        $results_array = array();
                        $results_array['id'] = get_the_ID();
                        $results_array['title'] = get_the_title();
                        $results_array['slug'] = $post->post_name;
                        $results_array['lat'] = $coordinates[0];
                        $results_array['lng'] = $coordinates[1];
                        $results_array['address'] = get_field('address_street');
                        $results_array['city'] = get_field('city');
                        $results_array['phone'] = get_field('phone');
                        $features = get_field('features');
                        $features_tmp = array('catering','party_room','cakes','delivery', 'confirm_text');
                        $features_result_array = array();
                        foreach ($features_tmp as $key => $value) {                        
                                if ( is_array($features) && in_array($value,$features) ) {
                                  $features_result_array[$value] = true;
                                } else {
                                  $features_result_array[$value] = false;
                                };
                        $results_array['features'] = $features_result_array;
                        }
                        
                        //optional data - removed to speed up loading
                        // $results_array['contact'] = str_replace(array("\n", "\r"), '', get_field('contact'));
                        // $results_array['email'] = get_field('email');
                        // $results_array['store_hours'] = get_field('store_hours');
                        // $results_array['zipcode'] = get_field('zipcode');
                        // $results_array['state'] = get_field('state');              
                        $loc_info[] = $results_array;
                    break;
          }
      endwhile;
  endif;
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
          ob_end_clean();
          // echo json_encode($features_filter);//debug
          echo json_encode($loc_info); // return JSON with locations
        }
        else {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }
  die();
} 
 


/*-----------------------------------------------------------------------------------*/
/* Load Single location (JSON)
/*-----------------------------------------------------------------------------------*/

add_action( "wp_ajax_load_single_location_data_json", "load_single_location_data_json_func" );
add_action( "wp_ajax_nopriv_load_single_location_data_json", "load_single_location_data_json_func" );
function load_single_location_data_json_func() {
  $field = isset($_REQUEST['field'])?$_REQUEST['field']:'id';
  $value = isset($_REQUEST['value'])?$_REQUEST['value']:0;
  if ( $field == 'id') {
    $args = array(
      'post_type' => 'locations',
      'p'=> $value
      );
  }
  if ( $field == 'slug'){
    $args = array(
      'post_type' => 'locations',
      'name'=> $value
      );
  }
  // debug
  // print_r($loc_query);
  ob_start(); //make sure we dont echo anything (like errors etc)
  $loc_query = new WP_Query( $args );
  if ( $loc_query->have_posts() ) : 
                        $loc_query->the_post();
                        $address = get_field('address');
                        $coordinates = explode(',',$address['coordinates']);
                        $results_array = array();
                        $results_array['id'] = get_the_ID();
                        $results_array['title'] = get_the_title();
                        $results_array['slug'] = $post->post_name;
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'location_featured' );
                        if ($image)
                              $results_array['featured_image'] =  $image[0];
                        
                        $results_array['lat'] = $coordinates[0];
                        $results_array['lng'] = $coordinates[1];
                        $results_array['address'] = get_field('address_street');
                        $results_array['city'] = get_field('city');
                        $results_array['phone'] = get_field('phone');
                        $results_array['hiring'] = intval(get_field('are_you_hiring'));
                        $features = get_field('features');
                        $features_tmp = array('catering','party_room','cakes','delivery', 'confirm_text');
                        $features_result_array = array();
                        foreach ($features_tmp as $key => $value) {                        
                                if ( is_array($features) && in_array($value,$features) ) {
                                  $features_result_array[$value] = true;
                                } else {
                                  $features_result_array[$value] = false;
                                };
                        $results_array['features'] = $features_result_array;
                        }
                        
                        $results_array['contact'] = str_replace(array("\n", "\r"), '', get_field('contact'));
                        $results_array['email'] = get_field('email');
                        $results_array['store_hours'] = get_field('store_hours');
                        $results_array['news'] = str_replace(array("\n", "\r"), '', get_field('news'));
                        $results_array['events'] = str_replace(array("\n", "\r"), '', get_field('events'));
                        $results_array['zipcode'] = get_field('zipcode');
                        $results_array['state'] = get_field('state');
												$results_array['kosher_icon'] = get_field('kosher_icon');
$results_array['custom_delivery_image'] = get_field('custom_delivery_image');
$results_array['custom_delivery_url'] = get_field('custom_delivery_url');
                        
												// seperate fields in the admin
                        $related_flavors = get_field('related_flavors');
                        $related_cakes = get_field('related_cakes');
                        
												// merge for front-end JSON
												$flavors_and_cakes = $related_flavors;
												
												// setup array for cakes												
												if($related_cakes ):
													foreach($related_cakes as $order_cake):
														setup_postdata($order_cake);
														$order_cake_array = array();                        		
														$order_cake_array['id'] = $order_cake->ID;
														$order_cake_array['name']= $order_cake->post_title;
														$image = wp_get_attachment_image_src( get_post_thumbnail_id($order_cake->ID), 'full' );
														if ($image) $order_cake_array['image'] = $image[0];
														$order_cake_array['long_name'] = $order_cake->post_title;

                            $icons = get_field('icon_key',$order_cake->ID);
                            if (is_array($icons))
                              foreach ($icons as $index => $icon_val)
                                $order_cake_array['ingredients'][] = ''.get_bloginfo('template_url').'/img/flavors_icons/flavor_icon_'.$icon_val.'.jpg';
                        		$order_cake_array['cake_description'] = get_field('cake_description',$order_cake->ID);
                        		
                        		$results_array['order_cakes'][] = $order_cake_array;
                        	 endforeach;
                        endif;
														
                        if( $flavors_and_cakes ):
                        	 foreach( $flavors_and_cakes as $cake_post): // variable must be called $post (IMPORTANT)
                        		setup_postdata($cake_post);
                        		$single_cake_array = array();                        		
                        		$single_cake_array['id'] = $cake_post->ID;
                            $single_cake_array['name']= $cake_post->post_title;
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($cake_post->ID), 'full' );
                            if ($image) $single_cake_array['image'] = $image[0];
                            $single_cake_array['long_name'] = $cake_post->post_title;
                            
                            $icons = get_field('icon_key',$cake_post->ID);
                            if (is_array($icons))
                              foreach ($icons as $index => $icon_val)
                                $single_cake_array['ingredients'][] = ''.get_bloginfo('template_url').'/img/flavors_icons/flavor_icon_'.$icon_val.'.jpg';

                            $single_cake_array['nutrition_facts'] = array(
                                'serving_size' => get_field('serving_size',$cake_post->ID),
                                'calories'=> get_field('calories',$cake_post->ID),
                                'calories_from_fat'=> get_field('calories_from_fat',$cake_post->ID),
                                'total_fat' => get_field('total_fat_g',$cake_post->ID),
                                'total_fat_dv' => get_field('total_fat_p',$cake_post->ID),
                                'saturated_fat' => get_field('saturated_fat_g',$cake_post->ID), 
                                'saturated_fat_dv' => get_field('saturated_fat_p',$cake_post->ID), 
                                'poly_fat' => get_field('polyunsaturated_fat',$cake_post->ID),
                                'mono_fat' => get_field('monounsaturated_fat',$cake_post->ID),
                                'cholesterol' => get_field('cholesterol_g',$cake_post->ID),
                                'cholesterol_dv' => get_field('cholesterol_p',$cake_post->ID),
                                'sodium' => get_field('sodium_g',$cake_post->ID),
                                'sodium_dv' => get_field('sodium_p',$cake_post->ID),
                                'total_carb' => get_field('total_carbohydrate',$cake_post->ID),
                                'dietary_fiber' => get_field('dietary_fiber_g',$cake_post->ID),
                                'dietary_fiber_dv' => get_field('dietary_fiber_p',$cake_post->ID),
                                'sugars' => get_field('sugars_g',$cake_post->ID),
                                'sugars_dv' => get_field('sugars_p',$cake_post->ID),
                                'protein' => get_field('protein',$cake_post->ID),
                                'vit_a' => get_field('vitamin_a',$cake_post->ID),
                                'vit_c' => get_field('vitamin_c',$cake_post->ID),
                                'calcium' => get_field('calcium',$cake_post->ID),
                                'iron' => get_field('iron',$cake_post->ID),
                              ); //nutrition_facts array
                        		$single_cake_array['cake_description'] = get_field('cake_description',$cake_post->ID);
                        		
                        		$results_array['flavors_and_cakes'][] = $single_cake_array;
                        	 endforeach;
                        	wp_reset_postdata();
                        endif;
  endif;
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
          ob_end_clean();
          echo json_encode($results_array); // return JSON with locations
        }
        else {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }
  die();
}

/*-----------------------------------------------------------------------------------*/
/* Load Locations By Hash
/*-----------------------------------------------------------------------------------*/
add_action( "wp_ajax_load_locations_info", "load_location_by_hash" );
add_action( "wp_ajax_nopriv_load_locations_info", "load_location_by_hash" );
function load_location_by_hash() {
  // $field = isset($_REQUEST['field'])?$_REQUEST['field']:0;
  // $address = isset($_REQUEST['address'])?$_REQUEST['address']:0;
  $slug = isset($_REQUEST['hash'])?$_REQUEST['hash']:'williamsburg';
    
  $args = array(  'name' =>  $slug,
                  'post_type' => 'locations',
                  'orderby' => 'post_title',
                  'order' => 'ASC',
                            );
  ob_start(); // buffer output instead of echoing it
  $loc_query = new WP_Query( $args );
  ?>var locationsInfo = [ <?php if ( $loc_query->have_posts() ) : while ( $loc_query->have_posts() ) : $loc_query->the_post(); ?>
            <?php get_template_part('content','location-js-template');  ?>
          <?php endwhile;endif; ?>] <?php
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {					
          echo ob_get_clean();
        }
        else {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
																echo "hello";	
        }
  die();
} 

/*-----------------------------------------------------------------------------------*/
/* Get distance between two locations
/*-----------------------------------------------------------------------------------*/
function dt_rad($x) {
  return $x * M_PI / 180;
}

function distHaversine($loc1, $loc2) {
  $R = 6371; // earth's mean radius in km
  $dLat  = dt_rad($loc2['lat'] - $loc1['lat']);
  $dLong = dt_rad($loc2['lng'] - $loc1['lng']);
  $a = sin($dLat/2) * sin($dLat/2) +
          cos(dt_rad($loc1['lat'])) * cos(dt_rad($loc2['lat'])) * sin($dLong/2) * sin($dLong/2);
  $c = 2 * atan2(sqrt($a), sqrt(1-$a));
  $d = $R * $c;
  return $d * 1.60934;
}

/*-----------------------------------------------------------------------------------*/
/* Change Markup for Select in Locations Page.
/*-----------------------------------------------------------------------------------*/
function sixteen_handles_admin_scripts(){
	wp_enqueue_script( 'moxie_admin_js', get_template_directory_uri() . '/js/moxie-admin.js', array( 'jquery' ));
}

add_action( 'admin_enqueue_scripts', 'sixteen_handles_admin_scripts' );



?>