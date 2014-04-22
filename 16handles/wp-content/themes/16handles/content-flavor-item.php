<?php $postid = get_the_ID(); ?>
<?php $in_cakes = has_term('Cakes', 'type', $postid); ?>
<?php $in_toppings = (has_term('Toppings', 'type', $postid) == 1 ? 'in_toppings' : 'not_in_toppings'); ?>
<?php $in_cakes_class = ($in_cakes == 1) ? 'cake' : 'topping' ?>
<li class="<?php echo $in_toppings . " " . $in_cakes_class; ?>">
    <div class="avatar">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'flavor-item'); ?>
        <h6><?php the_title(); ?></h6>
        <div class="icons">
            <?php $icons = get_field('icon_key'); ?>
            <?php foreach ($icons as $index => $icon_val): ?>
              <img src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_<?php echo $icon_val ?>.jpg"/>
            <?php endforeach ?>
        </div>
    </div>
    <div class="txt">        
        <div class="close"></div>
        <div class="col_1_3">
            <h4><?php the_title() ?></h4>
            <?php $icons = get_field('icon_key'); ?>
            <?php foreach ($icons as $index => $icon_val) { ?>
              <img src="<?php bloginfo('template_url') ?>/img/flavors_icons/flavor_icon_<?php echo $icon_val ?>.jpg"/>
            <?php } ?>
        </div>
				<?php if($in_cakes == 1) :?>
					<div class="col_1_3 flavor-disc">
						<p>
						<?php echo the_field('cake_description'); ?>							
						</p>
					</div>
					<div class="col cake-locator">
						<div class="centerModule ">
					        <div class="big_txt">
					          <h2 class="find-cake-title">Find a Cake</h2>  
					        </div>
					        <div class="left">
					          <h4>Order your fro-yo cake now</h4>
					          <form class="search-by-zipcode-short" data-cake-id="<?php echo $postid; ?>">
					              <input name="zipcode" id="search_for_cake_<?php echo $postid ?>" type="text" placeholder="Enter a Zip Code">
					              <input class=" cake-arrow" type="submit" value="" style="right: 10px;">
					          </form>
					        </div>
					        <div class="right">
					          <div class="locations_short_result_msg cake_id_<?php echo $postid; ?>">
					              <h4>Here are the locations near you</h4>
					          </div>
					          <ul id="locations_results_short<?php echo $postid ?>" class="locations_results_short">
					          </ul>
					        </div>
					    </div>
					</div>					
				<?php elseif($in_cakes == 0): ?>					
	        <div class="col_1_3">
	            <h5>Nutrition facts</h5>
	            <div class="ing">
	                <p>Serving Size: <?php the_field('serving_size'); ?></p>
	                <hr />
	                <p>Amount Per Serving</p>
	                <p><b>Calories:</b> <?php the_field('calories'); ?><span>Calories from Fat: <?php the_field('calories_from_fat'); ?></span></p>
	                <hr />
	                <p><span>% Daily Values*</span></p>
	                <p><b>Total Fat:</b><?php the_field('total_fat_g'); ?><span><?php the_field('total_fat_p'); ?></span></p>
	                <p class="indent">Saturated Fat: <?php the_field('saturated_fat_g'); ?><span><?php the_field('saturated_fat_p'); ?></span></p>
	                <p class="indent">Transfat: <?php the_field('transfat'); ?>g</p>
	                <p class="indent">Transfat %: <?php the_field('transfat_percent'); ?></p>
	                <p><b>Cholesterol:</b> <?php the_field('cholesterol_g'); ?> <span><?php the_field('cholesterol_p'); ?></span></p>
	                <p><b>Sodium:</b> <?php the_field('sodium_g'); ?> <span><?php the_field('sodium_p'); ?></span></p>
	                <p><b>Total Carbohydrate:</b> <?php the_field('total_carbohydrate'); ?></p>
	                <p class="indent">Dietary Fiber: <?php the_field('dietary_fiber_g'); ?> <span><?php the_field('dietary_fiber_p'); ?></span></p>
	                <p class="indent">Sugars: <?php the_field('sugars_g'); ?> <span><?php the_field('sugars_p'); ?></span></p>
	                <p class="indent">Sugars Alcohols: <?php the_field('sugar_alcohols'); ?>g</span></p>
	                <p class="indent">Sugars Alcohols %: <?php the_field('sugar_alcohols_percent'); ?></span></p>
	                <p>Contains: <?php the_field('contains'); ?></p>
	            </div>
	        </div>
	        <div class="col_1_3">
	            <div class="ing">
	                <hr />
	                <p><span>% Daily Values*</span></p>
	                <p><b>Protein:</b> <?php the_field('protein') ?></p>
	                <hr />
	                <div class="col_1_2">
	                    <p>Vitamin A: <?php the_field('vitamin_a') ?></p>
	                    <p>Vitamin C: <?php the_field('vitamin_c') ?></p>
	                </div>
	                <div class="col_1_2">
	                    <p>Calcium: <?php the_field('calcium') ?></p>
	                    <p>Iron: <?php the_field('iron') ?></p>
	                </div>
	                <hr />
	            </div>
	        </div>						
				<?php endif; ?>
    </div>
    <div class="arrow"></div>
</li>