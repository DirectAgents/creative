<?php 
 $address = get_field('address');
  $coordinates = explode(',',$address['coordinates']);
  $features = get_field('features');
  $features_tmp = array('catering','party_room','cakes','delivery', 'confirm_text');
  $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
  if ($image) { $image = $image[0]; } else { $image = '';};
  $features = array();    
    foreach ($features_tmp as $key => $value) {                
      if ( is_array($features) && in_array($value,$features) ) { $features[$value] = true; } else { $features[$value] = false; }
    }
  
  $single_loc = array(
    'id'=> get_the_ID(),
    'title' => get_the_title(),
    'featured_image' => $image,
    'lat' => $coordinates[0],
    'lng' =>$coordinates[1],
    'address' => get_field('address_street'),
    'city' => get_field('city'),
    'phone' => get_field('phone'),
    'contact' => str_replace(array("\n", "\r"), '', get_field('contact')),
    'email'=> get_field('email'),
    'store_hours'=> get_field('store_hours'),
    'news'=> str_replace(array("\n", "\r"), '', get_field('news')),
    'events'=> str_replace(array("\n", "\r"), '', get_field('events')),
    'zipcode'=> get_field('zipcode'),
    'kosher_icon'=> get_field('kosher_icon'),
    'state'=> get_field('state'),
    'features' => $features,
  );
?>