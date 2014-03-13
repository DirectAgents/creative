<?php 

/*
	Template Name: Home Loans
*/

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

get_header(); 

global $more; $more = 0; 
?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

	<div <?php post_class(); ?>>       
		
		<div class="loan-module">
		
			<h1 class="loan-title">Home Loans</h1>

			<p>
				Home loans from Every Loan can help you get into a new home or refinance an existing home. We work with private lenders all over the country to secure you the best terms and rates available for your home loan. Our large network of lenders means you have access to the wide variety of home loans and are certain to find one that meets your needs.At Every Loan, you'll receive quotes from lenders who are eager to finance your home mortgage right away. You can compare the offers you receive from the comfort of home, with no sales pressure. We can even provide home loan financing to those with bad credit or no credit.
			</p>
		
		</div>

		<div class='loan-module'>

			<h2 class="secondary-title">Home Loan Products</h2>
				
			<p>
				Every Loan offers two primary types of home loans. Choose the one that best meets your needs, then watch the offers come in!
			</p>

			<ul class="loan-list">
				
				<li><strong>Home Purchase Loan.</strong> A Home Purchase Loan is used by buyers who need to finance the purchase of a home.</li>
				<li><strong>Home Refinance Loan.</strong> Existing homeowners can refinance their current mortgage to more favorable terms with an Every Loan Home Refinance Loan.</li>
				
			</ul>

		</div>

		<div class='loan-module'>
				
			<h3 class='small-title'>
			
			<p>
				Every Loan Home Loans feature:</h3>Every Loan offers two primary types of home loans. Choose the one that best meets your needs, then watch the offers come in!
			</p>

			<ul class="loan-list">
				
				<li>Fixed or Adjustable Rate Mortgages</li>
				<li>Easy Payment Options</li>
				<li>No Pre-Payment Penalties</li>
				<li>No Hidden Fees</li>
				<li>No Obligation</li>
				
			</ul>

		</div>

		<div class='loan-module'>

			<h3 class='small-title'>Factors That May Affect The Terms And Conditions Of Your Home Loan</h3>
			
			<p>
			Home loan terms vary widely from borrower to borrower and from lender to lender. Your specific loan terms will be affected by:
			</p>
			
			<ul class="loan-list">
				
				<li>Your credit history</li>
				<li>Your employment status and income</li>
				<li>Your financial assets</li>
				
			</ul>

		</div>

		<div class='loan-module'>
			
			<h3 class='small-title'>
				Why Every Loan?
			</h3>
			
			<p>
				Every Loan has everything you need to apply for a home loan. Use our online mortgage calculator to determine your needed loan amount, then apply online! Your application will be automatically matched with suitable lenders who will compete for your business. Compare mortgage offers from multiple lenders, just by filling out one simple, online form! Find the right loan every time. EveryLoan.com!!
			</p>
		
		</div>

			 
		<?php //do_action ( 'rs_display_social_bar', get_the_date(), get_permalink() ); ?>

		</div><!-- end of #post-<?php the_ID(); ?> -->       
	
	<?php responsive_entry_after(); ?>
	
</div><!-- end of #content-blog -->

<?php get_sidebar('how-it-works'); ?>

<?php get_footer(); ?>
