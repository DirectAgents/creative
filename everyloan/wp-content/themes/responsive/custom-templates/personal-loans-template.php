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
				Every Loan personal loans are the perfect solution for financing home improvement projects, major purchases or vacations, consolidating debt, paying off high interest credit cards or even paying for school. These general purpose loans let you borrow money when you need it, no matter what you need it for. Secured and unsecured personal loans are available from a variety of Every Loan lending partners and range in term length from just days to several years.
			</p>
		
		</div>

		<div class='loan-module'>

			<h2 class="secondary-title">Personal Loan Benefits</h2>
				
			<p>
				Personal loans from Every Loan tend to have lower rates than credit cards, which makes them an attractive option for borrowers who want to consolidate debt or ditch their high interest credit cards. These types of loans are usually easier to obtain than auto or home loans and are ideal for anyone needing cash quickly. Every Loan Personal Loans feature:
			</p>

			<ul class="loan-list">
				
				<li><strong>Easy Approval.</strong> Funds are made readily available to you</li>
				<li><strong>Wide Availability.</strong> Many lending institutions will compete to offer you a personal loan</li>
				<li><strong>No Risk.</strong> The credit rate check will not negatively impact your credit score</li>
				
			</ul>

		</div>

		<div class='loan-module'>
			
			<h2 class='secondary-title'>
				Why Every Loan?
			</h2>
			
			<p>
				Every Loan has everything you need to apply for a home loan. Use our online mortgage calculator to determine your needed loan amount, then apply online! Your application will be automatically matched with suitable lenders who will compete for your business. Compare mortgage offers from multiple lenders, just by filling out one simple, online form! 

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
