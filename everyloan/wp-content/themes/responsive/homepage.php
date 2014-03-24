<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Content/Sidebar Template
 *
   Template Name:  Homepage
 *
 * @file           homepage.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2011 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/homepage.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<!--
<div style="float:right; width:50%; height:10px;">
< Back
</div>-->

<!--<p class="testp"></p>-->

<div id="homepage" class="grid col-620">
        
	<?php get_template_part( 'loop-header' ); ?>
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>

                <?php get_template_part( 'post-meta-page' ); ?>
                
                <div class="post-entry">

                	<table border="0" cellspacing="0" cellpadding="0" class="sidebar-table">
                		<tbody class="sidebar-table">
                			
                            <tr class="sidebar-table">
                				
                                <td style="padding: 10px; float: left;">
                                    
                                    <img id="find-the-right-loan" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/find-the-right-loan.png" />

                                    <img id="personal-loan" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/personal-loan.png" width="100%" />

                                    <img id="home-refinance" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/home-refinance.png" width="100%" />

                                    <img id="student-loan" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/student-loan.png" width="100%" />

                                    <img id="vacation" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/vacation.png" width="100%" />

                					<img class="find-the-right-loan-mobile" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/find-the-right-loan-mobile.png" />
                                </td>
                					
            					<td style="padding: 10px; float: left;">
            						
                                    <div class="widget-wrapper-homepage-desktop">
            							
                                        <div class="widget-title-rates-homepage">I want to borrow money</div>
            							
                                        <ul id="i-want-to-borrow-money">
            							
                                            <li>
                                                <label>Why do you want to borrow money?</label>
                                            </li>
            								
                                            <li>
            									<div class="styled-select">
                                                   <select id="i-want-to-borrow-money-select">
                                                
                                                <option>Select loan type</option>
                                                        <option value="loans/home-purchase/">Home Purchase Loan</option>
                                                        <option value="loans/home-refinance/">Home Refinance Loan</option>
                                                        <option value="loans/home-improvement/">Home Improvement</option>
                                                        <option value="loans/business/">Business Loan</option>
                                                        <option value="loans/equipment-financing/">Equipment Financing</option>
                                                        <option value="loans/personal/">Personal Loan</option>
                                                        <option value="loans/debt-consolidation/">Debt Consolidation Loan</option>
                                                        <option value="loans/cash-advance/">Cash Advance</option>
                                                        <option value="loans/vacation/">Vacation Loan</option>
                                                        <option value="loans/wedding/">Wedding Loan</option>
                                                        <option value="loans/medical-dental/">Medical Dental</option>
                                                        <option value="loans/household-expenses/">Household Expenses</option>
                                                        <option value="loans/major-purchase/">Major Purchase</option>
                                                        <option value="loans/small-business/">Small Business Loan</option>
                                                        <option value="loans/merchant-cash-advance/">Merchant Cash Advance</option>
                                                        <option value="loans/accounts-receivable/">Accounts Receivable</option>
                                                      </select>  
                                                </div>
                                            </li>

            								<li>
                                                <label>What is your credit quality like?</label>
                                            </li>
        									
                                            <li>
        										<div class="styled-select">
                                                    <select id="credit-score">
                                                        <option>Select credit quality</option>
                                                        <option>Excellent (720+)</option>
                                                        <option>Good (660-720)</option>
                                                        <option>Fair (600-660)</option>
                                                        <option>Some Problem (below 600)</option>
                                                    </select>
                                                </div>
                                            </li>
            							</ul>
            							
                                        <div class="start-here-btn">
                                            <a id="start-here-btn" href="#">
                                                <img alt="Start Here" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/start-here-btn.gif" />
                                            </a>
                                        </div>

            						</div><!-- end of .widget-wrapper -->
            					
                                </td>
            				</tr>

							<tr class="sidebar-table">
							     
                                 <td class="sidebar-table" style="padding: 0px;" colspan="3">

									<div class="learn-box-home-desktop">

										<div class="learn-title-top">Learn</div>
										<div class="lightbulb-box-home">Keep up with industry news, latest rates and much more.</div>
										<div class="read-news"><a href="news"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/read-news.jpg" width="119" /></a></div>
										<div class="news-stories-title-home-title">News Stories</div>
										
										<?php $q = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4 ) );
										
										if ( $q->have_posts() ) : ?>
											
											<ul>
												<?php while ( $q->have_posts() ) : $q->the_post(); ?>
										          
											     <li class="arrow">
                                                    <?php //the_title(); ?>
                                                    <a href="<?php the_permalink(); ?>"><?php echo short_text(get_the_title(), 40); ?></a>
                                                 </li>
											
											<?php endwhile; ?>
											
											</ul>

										<?php 
											else: echo "No posts found";
											
											endif;
											wp_reset_postdata();
										?>

										<div class="view-all">
                                            <a href="news">View All News</a>
                                        </div>

									</div>

									<div class="widget-wrapper-homepage-mobile">

										<div class="widget-title-rates-homepage">I want to borrow money</div>
										
										<ul id="i-want-to-borrow-money">
											<li><label>Why do you want to borrow money?</label></li>
											<li>
												<div class="styled-select"><select id="i-want-to-borrow-money-select">
                                                
                                                
                                                    <select id="i-want-to-borrow-money-select">
                                                    
                                                        <option>Select loan type</option>
                                                        <option value="loans/home-purchase/">Home Purchase Loan</option>
                                                        <option value="loans/home-refinance/">Home Refinance Loan</option>
                                                        <option value="loans/home-improvement/">Home Improvement</option>
                                                        <option value="loans/business/">Business Loan</option>
                                                        <option value="loans/equipment-financing/">Equipment Financing</option>
                                                        <option value="loans/personal/">Personal Loan</option>
                                                        <option value="loans/debt-consolidation/">Debt Consolidation Loan</option>
                                                        <option value="loans/cash-advance/">Cash Advance</option>
                                                        <option value="loans/vacation/">Vacation Loan</option>
                                                        <option value="loans/wedding/">Wedding Loan</option>
                                                        <option value="loans/medical-dental/">Medical Dental</option>
                                                        <option value="loans/household-expenses/">Household Expenses</option>
                                                        <option value="loans/major-purchase/">Major Purchase</option>
                                                        <option value="loans/small-business/">Small Business Loan</option>
                                                        <option value="loans/merchant-cash-advance/">Merchant Cash Advance</option>
                                                        <option value="loans/accounts-receivable/">Accounts Receivable</option>

                                                    </select>  
                                                
                                                
                                                </div>
											</li>
											
											<li><label>What is your credit quality like?</label></li>

											<li>
												<div class="styled-select">
                                                
                                                 <select id="credit-score">
                                                        <option>Select credit quality</option>
                                                        <option>Excellent (720+)</option>
                                                        <option>Good (660-720)</option>
                                                        <option>Fair (600-660)</option>
                                                        <option>Some Problem (below 600)</option>
                                                    </select>
                                                
                                                
                                                </div>
											</li>
										</ul>
										
											<div class="start-here-btn">
												<a href="#">
													<img alt="Start Here" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/start-here-btn.gif" />
												</a>
											</div>
										</div>

										<div class="learn-box-home-mobile">
											
											<div class="learn-title-top-mobile box-home-mobile">Learn</div>

											<div class="left-column">
												<div class="lightbulb-box-home-mobile">Keep up with industry news, latest rates and much more.</div>
												<div class="read-news-mobile"><a href="http://termlifequotetoday.com/everyloan/news/"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/read-news.jpg" /></a></div>
											</div>

											<div class="right-column">
												<ul>
													<li class="arrow-mobile2"><a href="#">Mortgage Rates Going Lower in 2013?</a></li>
													<li class="arrow-mobile2"><a href="#">President to Fix Housing Market 2013</a></li>
													<li class="arrow-mobile2"><a href="#">Home Owner Tax Credits and Deductions</a></li>
													<li class="arrow-mobile2"><a href="#">Lowest Mortgage Rates Feb 2013</a></li>
												</ul>
												<div class="view-all"><a href="#">View All News</a></div>
											</div>

										</div>

										<div class="calculate-box-home-desktop">
											<div class="calculate-title-top">Calculate</div>
											<div class="calculator-box-home">Run the numbers, compare &amp; visualize your loan.</div>
											<div class="read-news"><a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/calculate.jpg" width="119" /></a></div>
											<div class="calculators-title-home-title">More Calculators</div>
											
                                            <ul>
												<li class="arrow"><a href="#">Monthly Payment Calculator</a></li>
												<li class="arrow"><a href="#">Mortgage Refinancing Calculator</a></li>
												<li class="arrow"><a href="#">Mortgage Term Comparison Calculator</a></li>
												<li class="arrow"><a href="#">Interest Only Loan Payment Calculator</a></li>
											</ul>
											<div class="view-all-calculators"><a href="#">View All Calculators</a></div>
										</div>

										<div class="calculate-box-home-mobile box-home-mobile">
											<div class="calculate-title-top-mobile">Calculate</div>
											<div class="left-column">
												<div class="calculator-box-home-mobile">Run the numbers, compare &amp; visualize your loan.</div>
												<div class="read-news-mobile"><a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/calculate.jpg" /></a></div>
											</div>
											<div class="right-column">
												<ul>
													<li class="arrow-mobile"><a href="#">Monthly Payment Calculator</a></li>
													<li class="arrow-mobile"><a href="#">Mortgage Refinancing Calculator</a></li>
													<li class="arrow-mobile"><a href="#">Mortgage Term Comparison Calculator</a></li>
													<li class="arrow-mobile"><a href="#">Interest Only Loan Payment Calculator</a></li>
												</ul>
												<div class="view-all"><a href="#">View All News</a></div>
											</div>
										</div>

										<div class="borrow-box-home-desktop">

											<div class="borrow-title-top">Borrow</div>
											<div class="borrow-box-home-icon">View an overview of all loans and find helpful resources to get started.</div>
											<div class="read-news"><a href="loan-types"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/view-loans.jpg" width="119" /></a></div>
											<div class="calculators-title-home-title">Borrowing Resources</div>
											
                                            <ul>
												<li class="arrow"><a href="advice_articles/the-loan-process/">The Loan Process</a></li>
												<li class="arrow"><a href="advice-articles/?advice=refinance">Refinance</a></li>
												<li class="arrow"><a href="advice-articles/?advice=home-purchase">Home Purchase</a></li>
												<li class="arrow"><a href="#">Home Equity</a></li>
											</ul>
											
                                            <div class="view-all-calculators"><a href="advice-articles">View More Resources</a></div>

										</div>

										<div class="calculate-box-home-mobile box-home-mobile">
											
											<div class="calculate-title-top-mobile">Borrow</div>
											<div class="left-column">
												<div class="borrow-box-home-icon-mobile">View an overview of all loans and find helpful resources to get started.</div>
												<div class="read-news-mobile"><a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/view-loans.jpg" /></a></div>
										</div>

										<div class="right-column">
											
                                            <ul>
												<li class="arrow-mobile"><a href="#">The Loan Process</a></li>
												<li class="arrow-mobile"><a href="#">Refinance</a></li>
												<li class="arrow-mobile"><a href="#">Home Purchase</a></li>
												<li class="arrow-mobile"><a href="#">Home Equity</a></li>
											</ul>

											<div class="view-all"><a href="#">View More Resources</a></div>
										
                                        </div>
									</div>
								</td>
							</tr>
                		</tbody>
                	</table>

                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>

                </div><!-- end of .post-entry -->
            
				<?php get_template_part( 'post-data' ); ?>
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
            
			<?php //responsive_comments_before(); ?>
			<?php //comments_template( '', true ); ?>
			<?php //responsive_comments_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content -->

<?php //get_sidebar('home-everyloan'); ?>

<?php get_footer(); ?>
