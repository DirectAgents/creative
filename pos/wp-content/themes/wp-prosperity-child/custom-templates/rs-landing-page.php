<?php
/*
Template Name: RS Landing Page
* @since 1.0
*/

//if (!is_user_logged_in()) die('page is under construction');

global $thumbclass;
$thumbclass = '';
$thumbalign = tb_option('thumb_align');

if ( tb_option('thumbnails') ) { $thumbclass = 'thumbs-' . $thumbalign; }

if ( tb_option('thumbnails') && get_post_meta($post->ID, 'tb_thumb_align', true) != 'default' ) { $thumbclass = 'thumbs-' . get_post_meta($post->ID, 'tb_thumb_align', true); }

get_header(); ?>

<div class="entry-content col-sm-7">
	
	<h1 class='lp-title dotted-title'>The #1 Way to Find the Right POS System for your Business</h1>
	<p>
    <div style="text-align:center">
		POS.com offers an extensive list of features & services catered to both businesses & point of sale solution providers. Our primary purpose is to connect businesses with POS solution providers in order to facilitate the process of identifying & purchasing POS technology.
	</div>
    </p>

	<div class="pos-steps" id="pos-steps">
		<h3 class='lp-sub-title'>You'll be on your way in 3 simple steps:</h3>
		<img src='<?php echo site_url(); ?>/wp-content/uploads/2014/04/step1.png' class='col-sm-4'></img>
		<img src='<?php echo site_url(); ?>/wp-content/uploads/2014/04/step2.png' class='col-sm-4'></img>
		<img src='<?php echo site_url(); ?>/wp-content/uploads/2014/04/step3.png' class='col-sm-4'></img>
	</div>

	<div id='lp-logos-container'>
		<h3 class='lp-blue-title dotted-title'>POS is a Trusted Resource</h3>
		
		<div class='lp-logos'>
			<img src='<?php echo site_url(); ?>/wp-content/uploads/2014/04/bbb.png' class='col-sm-3'></img>
			<img src='<?php echo site_url(); ?>/wp-content/uploads/2014/04/nrf.png' class='col-sm-3'></img>
			<img src='<?php echo site_url(); ?>/wp-content/uploads/2014/04/rspa.png' class='col-sm-3' style="width:18%"></img>
			<img src='<?php echo site_url(); ?>/wp-content/uploads/2014/04/n-rest-f.png' class='col-sm-3'></img>
		</div>
	
	</div>
</div>

<div class="lp-form-container col-sm-5" id="lp-form-container">

	<?php echo do_shortcode('[gravityform id="1" name="Understanding your POS Needs" title="false" ajax="true" description="false"]'); ?>

	<div class='white-paper-container'>
		
		<div class='white-paper-img col-sm-4'>
			<img src='<?php echo site_url(); ?>/wp-content/uploads/2014/04/paper.png' />
		</div>

		<div class='white-paper-copy col-sm-8'>
			<h4 class='lp-blue-title'>Get your FREE white paper</h4>
			<p>
				Our exclusive white paper on POS Systems is yours free to download after you complete the sign up process.This is a free service.
A credit card is not required.
			</p>
		</div>

	</div>

</div>

<div class='wrap lp-bottom-container' id='lp-bottom-container'>
	<div class='inner-lp-bottom-container'>
		
		<div class='col-sm-7'>
			<h3 class='lp-blue-title dotted-title'>Why POS.com</h3>
			<p>
				With decades of experience in the point of sale industry, POS.com provides all the support you need when selecting or upgrading a POS system. Our proprietary matching platform, rPartner helps match you with the right POS partner for your business. Plus, POS.com provides Free live support to help ensure you make the right choice.<br/><br/>
 
Getting started with POS has never been easier, just complete the form above to browse a directory of providers and get connected with a POS specialist. Find the Right POS Partner, Right POS companies!
			</p>
		</div>

		<div class='testimonial-cont col-sm-5'>
			<h3 class='lp-blue-title dotted-title'>Testimonials</h3>
				<div class='testimonial'>
					<p>
						<span class='open'>“</span> I love how simple the process is to help me find a POS company that knows about my Business.<span class='closed'>”</span>
					</p>
					<div class='testimonial-author'> J.P. - TX</div>
				</div>

				<div class='testimonial'>
					<p>
						<span class='open'>“</span> I started my first restaurant, and the POS choices were overwhelming, thanks for making this easier.<span class='closed'>”</span>
					</p>
					<div class='testimonial-author'>M.L. - New York, NY</div>
				</div>

				<div class='testimonial'>
					<p>
						<span class='open'>“</span> It was great talking to one of your reps, he made the process much simpler, I am seeing 2 demos tomorrow.<span class='closed'>”</span>
					</p>
					<div class='testimonial-author'>W.S. - San Diego, CA</div>
				</div>
		</div>

	</div>
</div>
<?php //print_r(get_stylesheet_directory());?>

<?php get_footer(); ?>
<?php //include_once(get_stylesheet_directory() . '/lp-footer.php'); ?>