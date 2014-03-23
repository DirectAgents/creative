<?php 

/*
	Template Name: How it Works Template
*/

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

get_header(); 

global $more; $more = 0; 
?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

	<div <?php post_class(); ?>>       
		
		 <div class="loan-module">
			<h1 class='loan-title'><?php the_title(); ?></h1>

			<p>
				EveryLoan is for everyone and we make the process as easy as possible. Using a secure, online form, your loan application is sent to hundreds of private lenders and investors who want to give you money! You'll receive multiple offers back and can compare them side-by-side with no sales pressure and no obligation, ever!
			</p>

			<p>
				EveryLoan eliminates the need to research lenders and lending institutions on your own, searching for the right loan. We bring lenders to you! By answering just a few simple questions you will be paired up with lenders who meet your specific needs and are ready to make loans happen! Now you can borrow money for any reason…EveryLoan.com!
			</p>
		</div>
	
		<div class="grey-cont" style='text-align:center'>

			<div class='inner-grey-cont'>
				<?php //print_r(); ?>
				<ul class="apply">
					<li>
						<!-- <img id="how-it-works-1-pic" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/apply.png" /> -->
						<img id="how-it-works-1-pic" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/apply.png" />

					</li>
					
					<li>
						<div class="apply-title">Apply</div>
					</li>
						
					<li>
						Answer a few questions about your loan needs using our online loan application.
					</li>
				</ul>

				<ul class="fund">
					<li>
						<img id="how-it-works-2-pic" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/offers.png" />
					</li>

					<li>
						<div class="fund-title">Get Offers</div>
					</li>
					
					<li>A system of lenders and investors is queried to match you with real loan</li>

				</ul>
					
				<ul class="repay">
					<li><img id="how-it-works-3-pic" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/funding.png" /></li>
					<li>
						<div class="repay-title">Get Funding</div>
					</li>
					
					<li>Receive multiple offers, select the one that works best for you and get funded.</li>
				</ul>

			</div>

		</div>
		
	
		<p></p>
		<div class="loan-module">
			<h2 class='secondary-title'>Why Everyloan?</h2>
				
				<p>
					EveryLoan provides loans for everyone with any need. You can apply for every type of loan imaginable from home, auto and business loans to personal and student loans and more. Best of all, you can do this all from one website, from the comfort of home. No more driving around to different banks, filling out the same application and answering the same questions over and over again only to be rejected or find similar, unattractive loan terms. Save time and money with EveryLoan!
				</p>

				<p>
					At EveryLoan we match you with the right loan for your needs. We work with private, carefully screened lenders and banking institutions all over the country that want to loan you money. The EveryLoan process is quick, convenient and 100% confidential. You never have to worry about your data being sold or shared outside of EveryLoan.
				</p>
				
				<p>
					EveryLoan puts you control. YOU decide when to apply. YOU decide which type of loan to apply for. YOU decide which offer you will accept.  
				</p>
				
				<p>
					Find the right loan every time. EveryLoan.com!!
				</p>
			
		</div> 
		
		<?php //do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>

	</div><!-- end of #post-<?php the_ID(); ?> -->       
	
	<?php responsive_entry_after(); ?>
	
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>

<?php get_footer(); ?>
