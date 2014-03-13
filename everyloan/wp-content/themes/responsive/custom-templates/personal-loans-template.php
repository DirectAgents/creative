<?php 

/*
	Template Name: Personal Loans Template
*/

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

get_header(); 

global $more; $more = 0; 
?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

	<div <?php post_class(); ?>>       
		
		<div class="loan-module">
		
			<h1 class="loan-title"><?php the_title(); ?></h1>

			<p>
				At Every Loan we understand that small business owners don't have time to go from bank to bank, pleading their case every time just to obtain funding to start or grow their business. Our business loans are designed to get you the money you need quickly so you can get back to the basics of running your business.
			</p>
		
		</div>

		<div class='loan-module'>

			<h2 class="secondary-title">Working With Every Loan</h2>
				
			<p>
				We work with private lenders and banking institutions all over the country that want to help you succeed by offering competitive business loans and fast financing. The Every Loan business loan application is:
			</p>

			<ul class="loan-list">
				
				<li><strong>Quick and convenient.</strong> Complete your business loan application online. Within minutes you'll receive quotes back from lenders who want to give you</li>money.
				<li><strong>Entirely Confidential.</strong> You will never have to worry about your personal information being shared by Every Loan or any of our lending partners.</li>
				<li><strong>No Obligation.</strong> You are never obligated to commit to any of the loan offers you receive from Every Loan.</li>
				
			</ul>

		</div>

		<div class="loan-module">
		
			<h3 class="small-title">Every Loan Business Loan Features</h3>

			<p>
				Our business loans feature:
			</p>

			<ul class="loan-list">
				
				<li><strong>Low interest rates</strong></li>
				<li><strong>Fixed terms</strong></li>
				<li><strong>Easy payment options</strong></li>
				<li><strong>No pre-payment penalties</strong></li>
				<li><strong>No hidden fees</strong></li>
				
			</ul>
		
		</div>

		<div class="loan-module">
		
			<p>
				Most of our fixed-rate loans have lower interest rates than those offered by credit card companies and traditional lenders and our minimum qualifications are more lenient than banking institutions.
			</p>

		</div>

		<div class="loan-module">
			
			<h3 class="small-title">Factors That May Affect The Terms And Conditions Of Your Business Loan</h3>

			<p>
				Just as every business is different, every business loan is different. The following factors can all impact the terms of your business loan:
			</p>

		</div>

		<?php //do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>

	</div><!-- end of #post-<?php the_ID(); ?> -->       
	
	<?php responsive_entry_after(); ?>
	
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>

<?php get_footer(); ?>
