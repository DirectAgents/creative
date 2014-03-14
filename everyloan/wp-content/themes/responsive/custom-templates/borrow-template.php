<?php 

/*
	Template Name: Borrow Template
*/

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

get_header(); 

global $more; $more = 0; 
?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

	<div <?php post_class(); ?>>       
		
		<h1 class="entry-title post-title everyloan-title">
			
			<a href="<?php the_permalink(); ?>">
				<?php the_title( ); ?>
			</a>
						
		</h1>

		<div class='loan-module'>

			<h2 class="secondary-title">Home Loan</h2>

			<ul class="loan-list">
				
				<li>
					<strong>Home Purchase Loan.</strong> Finance the home of your dreams with competitive home mortgage loans from EveryLoan! Use these loans for new home purchases, buy that vacation home you've always wanted or purchase an investment property.</li>
 
				<li>
					<strong>Home Refinance Loan.</strong> Home Refinance Loans from EveryLoan help homeowners obtain more favorable loan terms and save money. Find out what kind of refinancing offers are available to you today!
				</li>
 
				
			</ul>

		</div>

		<div class='loan-module'>

			<h2 class="secondary-title">Business Loans</h2>

			<ul class="loan-list">
				
				<li>
					<strong>Small Business Loan.</strong> Need funding to get your business up and running? Small Business Loans from EveryLoan can provide you with the financial backing you need to get your business off to a smooth start.</li>
 
				<li>
					<strong>Equipment Loan.</strong> Businesses need equipment. Equipment is expensive. Apply for a Business Equipment Loan to get the tools you need to do the job right.
				</li>
 
				
			</ul>

		</div>

		<div class='loan-module'>

			<h2 class="secondary-title">Personal Loans</h2>

			<ul class="loan-list">
				
				<li>
					<strong>Debt Consolidation Loan.</strong> Tired of making multiple payments to multiple lenders? Want to consolidate credit card debt? A Debt Consolidation Loan from EveryLoan can turn all of your current debt payments into one affordable, monthly payment.
				</li>

 				<li>
					<strong>Home Improvement Loan.</strong> Finance home repairs and improvements with EveryLoan's Home Improvement Loans. Compare our rates with those offered by your contractor and you'll see why EveryLoan is a leader in Home Improvement Loans.
				</li>

				<li>
					<strong>Vacation Loan.</strong> Head off on your dream vacation, celebrate a honeymoon or anniversary or take the kids to Disney with a Vacation Loan from EveryLoan. Our lenders are eager to help you make happy vacation memories!
				</li>
 
				
			</ul>

		</div>

		<div class='loan-module'>

			<h2 class="secondary-title">Personal Loans</h2>

			<ul class="loan-list">
				
				<li>
					<strong>Student Loan.</strong> EveryLoan lenders provide Student Loans that are competitive and don't have the same payback requirements as federal student loans. Apply online and explore your student loan financing options today.
				</li>
 
				<li>
					<strong>Student Loan Refinance.</strong> Refinance high-interest rate student loans into lower monthly payments, consolidate student loans or spread your loan out over a longer payback period. Contact our lenders to learn more about Student Loan Refinancing and see if you qualify.
				</li>
 
			</ul>

		</div>

		<div class='loan-module'>

			<h2 class="secondary-title">Auto Loans</h2>

			<ul class="loan-list">
				
				<li><strong>Auto Purchase Loan.</strong> EveryLoan offers an alternative to bank and auto company Auto Purchase Loans. Our loans are affordable and competitive and we finance drivers with bad credit who can't get a loan elsewhere.
				</li>
 
			</ul>

		</div>



		

			 
		<?php //do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>

		</div><!-- end of #post-<?php the_ID(); ?> -->       
	
	<?php responsive_entry_after(); ?>
	
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>

<?php get_footer(); ?>
