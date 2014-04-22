{
    <?php $address = get_field('address');
    $coordinates = explode(',',$address['coordinates']);
    $features = get_field('features');
    $features_tmp = array('catering','party_room','cakes','delivery', 'confirm_text');?>
    id: <?php the_ID() ?>,
    title: '<?php the_title(); ?>',
    featured_image: '<?php if ($image) echo $image[0]; ?>',
    lat: <?php echo $coordinates[0]; ?>,
    lng: <?php echo $coordinates[1]; ?>,
    address: '<?php the_field('address_street') ?>',
    city: '<?php the_field('city') ?>',
    phone: '<?php the_field('phone') ?>',
    features: {
      <?php foreach ($features_tmp as $key => $value) {                
        echo ( is_array($features) && in_array($value,$features) ) ? $value.': true,':$value.': false,'; ?>
          
        <?php
      } ?>
    },
    contact: '<?php echo str_replace(array("\n", "\r"), '', get_field('contact')); ?>',
    email: '<?php the_field('email') ?>',
    store_hours: '<?php the_field('store_hours') ?>',
    zipcode: '<?php the_field('zipcode') ?>',
    state: '<?php the_field('state') ?>',
},