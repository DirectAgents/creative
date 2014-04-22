{
    <?php 
		global $post;
		$address = get_field('address');
    $coordinates = explode(',',$address['coordinates']);
    $features = get_field('features');
    $features_tmp = array('catering','party_room','cakes','delivery', 'confirm_text');
		
		
		
		?>
    id: <?php the_ID() ?>,
    title: '<?php the_title(); ?>',
    slug: '<?php echo $post->post_name; ?>',
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
    featured_image: '<?php if ($image) echo $image[0]; ?>',
    lat: <?php echo $coordinates[0]; ?>,
    lng: <?php echo $coordinates[1]; ?>,
    address: '<?php the_field('address_street') ?>',
    city: '<?php the_field('city') ?>',
    phone: '<?php the_field('phone') ?>',
    hiring: <?php echo intval(get_field('are_you_hiring')) ?>,
    features: {
      <?php foreach ($features_tmp as $key => $value) {                
        echo ( is_array($features) && in_array($value,$features) ) ? $value.': true,':$value.': false,'; ?>
          
        <?php
      } ?>
    },
    contact: '<?php echo str_replace(array("\n", "\r"), '', get_field('contact')); ?>',
    email: '<?php the_field('email') ?>',
    store_hours: '<?php the_field('store_hours') ?>',
    news: '<?php echo str_replace(array("\n", "\r"), '', get_field('news')); ?>',
    events: '<?php echo str_replace(array("\n", "\r"), '', get_field('events')); ?>',
    zipcode: '<?php the_field('zipcode') ?>',
    state: '<?php the_field('state') ?>',
		kosher_icon: '<?php echo the_field('kosher_icon') ?>',
    flavors_and_cakes: [
      <?php
      $flavors_and_cakes = get_field('flavors_and_cakes');
      // print_r($flavors_and_cakes);
      if( $flavors_and_cakes ):
      	 foreach( $flavors_and_cakes as $post): // variable must be called $post (IMPORTANT)
      		setup_postdata($post);
      		get_template_part('content','locatios-js-flavor-template');
      	 endforeach;
      	wp_reset_postdata();
      endif;
      ?>
    ]
},