<?php 
$address = get_field('address');
$coordinates = explode(',',$address['coordinates']);
$features = get_field('features');
$features_tmp = array('catering','party_room','cakes','delivery', 'confirm_text');

$results_array['id'] = $post->id;
$results_array['title'] = $post->post_title;
if (is_array($coordinates) && count($coordinates) == 2) {
    $results_array['lat'] = $coordinates[0];
    $results_array['lng'] = $coordinates[1];
}
$results_array['address'] = get_field('address_street');
$results_array['city'] = get_field('city');
$results_array['phone'] = get_field('phone');

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
$results_array['zipcode'] = get_field('zipcode');
$results_array['state'] = get_field('state');?>