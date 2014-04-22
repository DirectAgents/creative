{
    id: <?php the_ID(); ?>,
    name: '<?php the_title() ?>',
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
    image: "<?php if ($image) echo $image[0]; ?>",
    long_name: '<?php the_title(); ?>',
    ingredients: [<?php 
      $icons = get_field('icon_key');
      if (is_array($icons))
      foreach ($icons as $index => $icon_val) {
        echo '"'.get_bloginfo('template_url').'/img/flavors_icons/flavor_icon_'.$icon_val.'.jpg", ';
      } ?>],
    nutrition_facts: {
        serving_size: '<?php the_field('serving_size'); ?>',
        calories: '<?php the_field('calories'); ?>',
        calories_from_fat: '<?php the_field('calories_from_fat'); ?>',
        total_fat: '<?php the_field('total_fat_g'); ?>',
        total_fat_dv: '<?php the_field('total_fat_p'); ?>',
        saturated_fat: '<?php the_field('saturated_fat_g'); ?>', 
        saturated_fat_dv: '<?php the_field('saturated_fat_p'); ?>', 
        poly_fat: '<?php the_field('polyunsaturated_fat'); ?>',
        mono_fat: '<?php the_field('monounsaturated_fat'); ?>',
        cholesterol: '<?php the_field('cholesterol_g'); ?>',
        cholesterol_dv: '<?php the_field('cholesterol_p'); ?>',
        sodium: '<?php the_field('sodium_g'); ?>',
        sodium_dv: '<?php the_field('sodium_p'); ?>',
        total_carb: '<?php the_field('total_carbohydrate'); ?>',
        dietary_fiber: '<?php the_field('dietary_fiber_g'); ?>',
        dietary_fiber_dv: '<?php the_field('dietary_fiber_p'); ?>',
        sugars: '<?php the_field('sugars_g'); ?>',
        sugars_dv: '<?php the_field('sugars_p'); ?>',
        protein: '<?php the_field('protein'); ?>',
        vit_a: '<?php the_field('vitamin_a'); ?>',
        vit_c: '<?php the_field('vitamin_c'); ?>',
        calcium: '<?php the_field('calcium'); ?>',
        iron: '<?php the_field('iron'); ?>'
    },
		cake_description : "<?php the_field('cake_description'); ?>"
},