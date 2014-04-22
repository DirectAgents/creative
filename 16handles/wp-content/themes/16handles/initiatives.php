<?php
/**
 * Template Name: Franchise - How
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
the_post();
$post_id = get_the_ID();
?>
<?php $attachment_id = get_field('background_header_image');
$size = "page_header_image";
$img = wp_get_attachment_image_src($attachment_id, $size);						
?>
<?php if(get_field('background_header_image')){ ?>
<style>
.main_title{background-image: url("<?php echo $img[0]; ?>");}
</style>	
<?php } ?>
<div class="main franchise_how">
    <div class="main_title">
        <div class="centerModule">
            <h1><?php the_title() ?></h1>
        </div>
    </div>
    <div class="centerModule">
        <div class="timeline">
            <h3>Franchise timeline</h3>
            <img class="img_main" src="<?php echo get_field('timeline_image') ?>" alt="<?php the_title ?>"/>
        </div>
        <div class="accordion_head">
            <div class="box_1 title">
                <h3>FAQ</h3>
            </div>
        </div>
    </div>
    <div class="accordion accordion_2">
		<?php 
		     $rows = get_field('faq_title');
			 $count = 0;
		
		if($rows)
		{
			foreach($rows as $row) 
			{ ?>
		        <div class="head <?php echo ++$count%2?"odd":"even"?>">
		            <div class="centerModule">
		                <div class="box_1 title">
		                    <h2 class="title_2"><?php echo $row['faq_question'] ?></h2>
		                </div>
		                <div class="box_2">
		                    <div class="box icon icon_1"></div>
		                </div>
		            </div>
		        </div>
		        <div class="cont">
		            <div class="centerModule">
		                <div class="content">
		                    <div class="col col_1_2">
								<?php echo $row['faq_answer'] ?>
		                    </div>
		                </div>
		            </div>
		        </div>					
		<?php }
		}	?>				
    </div>
    <div class="contact">
        <div class="centerModule">
            <h3>Contact: <span>Corporate office</span></h3>
			<p class="txt_1"><?php echo of_get_option('address_phone'); ?></p>
            <!-- <p class="txt_1">38 East 29th Street, 6th Floor South <br/>New York, NY 10016</p> 
            <p class="txt_1">Franchise@16Handles.com<br/>
            Phone: (212) 260-4416<br/>
            Fax: (646) 626-6450</p>  -->
            <a class="btn_link_2 btn_link_3 btn_link_icon btn_download" target="_blank" href="http://16handles.com/wp-content/Franchise_Brochure.pdf">
                <p class="first_title">Download Franchise Info PDF <span class="arrow"></span></p>
            </a>
        </div>
    </div>
    <a class="btn_link_1" href="<?php echo get_field('bottom_link_url', $post_id ); ?>">
        <p class="title_1 first_title"><?php echo get_field('bottom_link_text', $post_id ); ?><span class="arrow"></span><span class="txt">Questions?: <?php echo of_get_option('franchise_info_email'); ?></span></p>
    </a>
</div>
<?php get_footer(); ?>