<?php



// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Business Loans Steps
 *
 * @file           business-loans-steps.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/business-loans-steps.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 
?>



<div id="content-personal-loans" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
<div class="personal-loans-box-step-desktop">

<?php if($_GET['loan'] == 'small-business') { ?>
<div class="business-loans-box-step1-desktop-title">I want a small business loan</div>
<? } ?>

<div class="progress-steps2">
<div style="float:left">Progress:&nbsp;&nbsp;</div>	

<div id="progress_bar">
        <div id="progress"></div>
        <div id="progress_text">0% Complete</div>
	</div>

</div>

<div class="personal-loans-box-step-desktop-left-column">
<div class="rates-personal-loans-steps">Rates start at 6.73% APR</div>
<div class="content-left">

Borrow up to $35,000* at a low fixed rate from a network of trusted lenders and investors.
<ul>
<li><p class="personal-inner-text">Get cash in a lump sum</p></li>
<li><p class="personal-inner-text">No collateral required</p></li>
<li><p class="personal-inner-text">Use for unexpected expenses, home improvements or dream vacations!</p></li>
<li><p class="personal-inner-text">Rates from 6.73% to 35.36% APR</p></li>
</ul>

</div>
</div>

<div class="rates-business-loans-steps1-form-desktop">




<div id="container-steps">



        <form action="#" method="post">
        
        <input type="hidden" id="IsPrimaryBorrower" name="IsPrimaryBorrower" value="Yes"/>
	
    
            <!-- #first_step -->
            <div id="first_step" <?php if($_GET['pass'] == 'y') { ?>style="display:none" <? } ?>>
               

 <div id="first_step_personal">
 
 
                <div class="form">
                
<table cellpadding="0" cellspacing="0" border="1">


<tr>
<td><div class="title">Why do you want to borrow money?</div></td>
</tr>


<tr>
<td>

<select id="type_of_loan" name="type_of_loan">
<option value="Business Loan">Business Loan</option>
</select>
</td>
</tr>   


<tr>
<td><div class="title">What is your credit quality like?</div></td>
</tr>             

<tr>
<td>                
                
<select id="credit_score" name="credit_score">
<option>Credit Score</option>
<option>Excellent (720+)</option>
<option>Good (600-720)</option>
<option>Fair (600-660)</option>
<option>Some Problem (below 600)</option>
</select>
  </td>
</tr>  
</table>                
                    
                   
                    
                   
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_first" type="submit" name="submit_first" id="submit_first" value="" />
            </div>      

</div>


            <!-- #second_step -->
            <div id="second_step"<?php if($_GET['pass'] == 'y') { ?>style="display:block" <? } ?>>
                

<div class="previous-personal"><a href="#" class="previous-second-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-personal"><a href="#" class="next-second-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->


 <div id="second_step_personal">

                <div class="form">




<table cellpadding="0" cellspacing="0" border="0">

<tr>
<td><label>How much would you like to borrow?</label></td>
</tr>

<tr>
<td>                
                
<select id="finance_amount" name="finance_amount">
<option value="$1 - $5,000">$1 - $5,000</option>
<option value="$5,001 - $25,000">$5,001 - $25,000</option>
<option value="$25,001 - $50,000">$25,001 - $50,000</option>
<option value="$50,001 - $100,000">$50,001 - $100,000</option>
<option value="$100,001 - $250,000">$100,001 - $250,000</option>
<option value="$100,001 - $250,000">$100,001 - $250,000</option>
<option value="$250,001 - $500,000">$250,001 - $500,000</option>
<option value="$250,001 - $500,000">$500,001 - $1M</option>
<option value="Over $1M">Over $1M</option>
</select>

  </td>
</tr>  
</table>      

                                 
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_second" type="submit" name="submit_second" id="submit_second" value="" />
                
                </div>
            </div>      





            <!-- #third_step -->
            <div id="third_step">


<div class="previous-third-personal"><a href="#" class="previous-third-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-third-personal"><a href="#" class="next-third-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->

   <div id="third_step_personal"> 
               
                <div class="form">
                   
 <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>How long has your business been established?</label></td>
</tr>

    

<tr>

<td>                
                
<select id="time_in_business" name="time_in_business">
<option value="Not yet in business, still in planning stages">Not yet in business, still in planning stages</option>
<option value="Looking to buy an existing business">Looking to buy an existing business</option>
<option value="0 to 6 months">0 to 6 months</option>
<option value="7 to 12 months">7 to 12 months</option>
<option value="1-2 years">1-2 years</option>
<option value="2-3 years">2-3 years</option>
<option value="3-5 years">3-5 years</option>
<option value="5 or more years">5 or more years</option>
</select>
  </td>
</tr>  
</table>                
               
                   
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_third" type="submit" name="submit_third" id="submit_third" value="" />
                
            </div>      
    
    </div>        
            
            <!-- #fourth_step -->
            <div id="fourth_step">
 
<div class="previous-fourth-personal"><a href="#" class="previous-fourth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-fourth-personal"><a href="#" class="next-fourth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->
               



<div id="fourth_step_personal"> 

                <div class="form">
               
 
                    
                    
                     <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>What were your company's total revenues over the past 12 months?</label></td>
</tr>

    

<tr>

<td>                
                
<select id="annual_revenue" name="annual_revenue">
<option value="$0, No Revenues">$0, No Revenues</option>
<option value="Below $50,000">Below $50,000</option>
<option value="$50,001 - $100,000">$50,001 - $100,000</option>
<option value="$100,001 - $250,000">$100,001 - $250,000</option>
<option value="$250,001 - $500,000">$250,001 - $500,000</option>
<option value="$500,001 - $1M">$500,001 - $1M</option>
<option value="$1M - $5M">$1M - $5M</option>
<option value="More than $5M">More than $5M</option>
</select>
  </td>
</tr>  
</table>                

                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_fourth" type="submit" name="submit_fourth" id="submit_fourth" value="" />            
            </div>
            
       </div>     
            
   
   
    <!-- #fifth_step -->
            <div id="fifth_step">
               

<div class="previous-fifth-personal"><a href="#" class="previous-fifth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-fifth-personal"><a href="#" class="next-fifth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->



<div id="fifth_step_personal"> 


                <div class="form">
               
               
               
               
      <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>What is your monthly volume of credit card sales?</label></td>
</tr>

    

<tr>

<td>                
           
<select id="monthly_charges" name="monthly_charges">
<option value="None, I don't accept credit cards">None, I don't accept credit cards</option>
<option value="Not yet in business">Not yet in business</option>
<option value="$1,000 - $2,500">$1,000 - $2,500</option>
<option value="$2,500 - $5,000">$2,500 - $5,000</option>
<option value="$5,001 - $10,000">$5,001 - $10,000</option>
<option value="$10,001 - $25,000">$10,001 - $25,000</option>
<option value="$25,001 - $100,000">$25,001 - $100,000</option>
<option value="$100,001 +">$100,001 +</option>
</select>
  </td>
</tr>  
</table>   
 
               
                    
                    
                    
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_fifth" type="submit" name="submit_fifth" id="submit_fifth" value="" />                      
            </div>         
            
   </div>         
            
            
           <!-- #sixth_step -->
            <div id="sixth_step">


<div class="previous-sixth-personal"><a href="#" class="previous-sixth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-sixth-personal"><a href="#" class="next-sixth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->              


<div id="sixth_step_personal"> 

                <div class="form">
               
                    
                    
                 <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>What is your total monthly volume of accounts receivable orders?</label></td>
</tr>

    

<tr>

<td>

<select id="accounts_receivable_amount" name="accounts_receivable_amount">
<option value="Do not have accounts receivable">Do not have accounts receivable</option>
<option value="$1 - $999">$1 - $999</option>
<option value="$1,000 - $20,000">$1,000 - $20,000</option>
<option value="$20,001 - $ $50,000">$20,001 - $ $50,000</option>
<option value="$50,001 - $100,000">$50,001 - $100,000</option>
<option value="$100,001 - $250,000">$100,001 - $250,000</option>
<option value="$250,001">$250,001</option>
</select>


</td>
</tr>  
</table>                    
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_sixth" type="submit" name="submit_sixth" id="submit_sixth" value="" />             
            </div>         
            
     </div>       
            
     
     
      <!-- #sevents_step -->
            <div id="seventh_step">

<div class="previous-seventh-personal"><a href="#" class="previous-seventh-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-seventh-personal"><a href="#" class="next-seventh-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->                             



<div id="seventh_step_personal"> 

                <div class="form">
               
                    
                    
                   <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>Will the financing be used to purchase equipment?</label></td>
</tr>

    

<tr>

<td>


<select id="accounts_receivable_amount" name="accounts_receivable_amount">
<option value="Do not have accounts receivable">Do not have accounts receivable</option>
<option value="$1 - $999">$1 - $999</option>
<option value="$1,000 - $20,000">$1,000 - $20,000</option>
<option value="$20,001 - $ $50,000">$20,001 - $ $50,000</option>
<option value="$50,001 - $100,000">$50,001 - $100,000</option>
<option value="$100,001 - $250,000">$100,001 - $250,000</option>
<option value="$250,001">$250,001</option>
</select>


</td>
</tr>  
</table>     
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_seventh" type="submit" name="submit_seventh" id="submit_seventh" value="" />             
            </div>     
   </div>         
     
     
     
       <!-- #eight_step -->
            <div id="eight_step">
 

<div class="previous-eight-personal"><a href="#" class="previous-eight-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-eight-personal"><a href="#" class="next-eight-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->                            
               


<div id="eight_step_business"> 

                <div class="form">
               
                    
                    
     


<table cellpadding="0" cellspacing="0" border="1">


<tr>
<td><label>Will the financing be used to purchase commercial real estate?</label></td>
</tr>


<tr>


<td>

<select id="accounts_receivable_amount" name="accounts_receivable_amount">
<option value="Do not have accounts receivable">Do not have accounts receivable</option>
<option value="$1 - $999">$1 - $999</option>
<option value="$1,000 - $20,000">$1,000 - $20,000</option>
<option value="$20,001 - $ $50,000">$20,001 - $ $50,000</option>
<option value="$50,001 - $100,000">$50,001 - $100,000</option>
<option value="$100,001 - $250,000">$100,001 - $250,000</option>
<option value="$250,001">$250,001</option>
</select>


</td>

</tr>   


            


</table>                



     
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_eight" type="submit" name="submit_eight" id="submit_eight" value="" />             
            </div>    
     
     </div>
     
      
      
  <!-- #ninth_step -->
            <div id="ninth_step">


<div class="previous-ninth-personal"><a href="#" class="previous-ninth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-ninth-personal"><a href="#" class="next-ninth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->                                           



<div id="ninth_step_personal"> 


                <div class="form">
               
                    
                    
                    <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td><label>Business Name</label></td>
</tr>

<tr>
<td>                
                
<input type="text" value=""/>
  </td>
</tr> 



<tr>
<td><label>Your Full Name</label></td>
</tr>

<tr>
<td>                
                
<input type="text" value=""/>
  </td>
</tr> 
 
</table>                
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_ninth" type="submit" name="submit_ninth" id="submit_ninth" value="" />             
            </div>  
            
  </div>          
  
  
 
            
            
            
            
  
  
 
   <!-- #tenth_step -->
            <div id="tenth_step">
               

<div class="previous-tenth-personal"><a href="#" class="previous-tenth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-tenth-personal"><a href="#" class="next-tenth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>-->                                  



<div id="tenth_step_personal"> 

                <div class="form">
               
                    
                    
     <table cellpadding="0" cellspacing="0" border="1">




    

<tr>
<td><label>Email Address</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="Street" id="Street" value=""/>
  </td>
</tr> 



<tr>
<td><label>Primary Phone</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="PostalCode" id="PostalCode" value=""/>
  </td>
</tr> 
 
</table>                             
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_tenth" type="submit" name="submit_tenth" id="submit_tenth" value="" />             
            </div>                             
            
     </div>       





 <!-- #last_step -->
            <div id="eleventh_step">
               


<div class="previous-eleventh-business"><a href="#" class="previous-eleventh-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>
                 



<div id="eleventh_step_business"> 

                <div class="form">
               
                    
                    
                   <table cellpadding="0" cellspacing="0" border="1">

<tr>
<td><label>Industry</label></td>
</tr>

<tr>
<td>  

<select id="profile-industry" name="profile-industry" style="width:370px">


<option value=""></option>              
                

<optgroup label="Accommodation and Food Services">
													<option value="7224">Drinking Places (Alcoholic Beverages)</option>
													<option value="7221">Full-Service Restaurants</option>
													<option value="7222">Limited-Service Eating Places</option>
													<option value="7213">Rooming and Boarding Houses</option>
													<option value="7212">RV (Recreational Vehicle) Parks and Recreational Camps</option>
													<option value="7223">Special Food Services</option>
													<option value="7211">Traveler Accommodation</option>
												</optgroup>
								<optgroup label="Administrative and Support and Waste Management and Remediation Services">
													<option value="5614">Business Support Services</option>
													<option value="5613">Employment Services</option>
													<option value="5612">Facilities Support Services</option>
													<option value="5616">Investigation and Security Services</option>
													<option value="5611">Office Administrative Services</option>
													<option value="5619">Other Support Services</option>
													<option value="5629">Remediation and Other Waste Management Services</option>
													<option value="5617">Services to Buildings and Dwellings</option>
													<option value="5615">Travel Arrangement and Reservation Services</option>
													<option value="5621">Waste Collection</option>
													<option value="5622">Waste Treatment and Disposal</option>
												</optgroup>
																					<optgroup label="Agriculture, Forestry, Fishing and Hunting">
													<option value="1125">Animal Aquaculture</option>
													<option value="1121">Cattle Ranching and Farming</option>
													<option value="1141">Fishing</option>
													<option value="1132">Forest Nurseries and Gathering of Forest Products</option>
													<option value="1113">Fruit and Tree Nut Farming</option>
													<option value="1114">Greenhouse, Nursery, and Floriculture Production</option>
													<option value="1122">Hog and Pig Farming</option>
													<option value="1142">Hunting and Trapping</option>
													<option value="1133">Logging</option>
													<option value="1111">Oilseed and Grain Farming</option>
													<option value="1129">Other Animal Production</option>
													<option value="1119">Other Crop Farming</option>
													<option value="1123">Poultry and Egg Production</option>
													<option value="1124">Sheep and Goat Farming</option>
													<option value="1152">Support Activities for Animal Production</option>
													<option value="1151">Support Activities for Crop Production</option>
													<option value="1153">Support Activities for Forestry</option>
													<option value="1131">Timber Tract Operations</option>
													<option value="1112">Vegetable and Melon Farming</option>
												</optgroup>
																					<optgroup label="Arts, Entertainment, and Recreation">
													<option value="7114">Agents and Managers for Artists, Athletes, Entertainers, and Other Public Figures</option>
													<option value="7131">Amusement Parks and Arcades</option>
													<option value="7132">Gambling Industries</option>
													<option value="7115">Independent Artists, Writers, and Performers</option>
													<option value="7121">Museums, Historical Sites, and Similar Institutions</option>
													<option value="7139">Other Amusement and Recreation Industries</option>
													<option value="7111">Performing Arts Companies</option>
													<option value="7113">Promoters of Performing Arts, Sports, and Similar Events</option>
													<option value="7112">Spectator Sports</option>
												</optgroup>
																					<optgroup label="Construction">
													<option value="2382">Building Equipment Contractors</option>
													<option value="2383">Building Finishing Contractors</option>
													<option value="2381">Foundation, Structure, and Building Exterior Contractors</option>
													<option value="2373">Highway, Street, and Bridge Construction</option>
													<option value="2372">Land Subdivision</option>
													<option value="2362">Nonresidential Building Construction</option>
													<option value="2379">Other Heavy and Civil Engineering Construction</option>
													<option value="2389">Other Specialty Trade Contractors</option>
													<option value="2361">Residential Building Construction</option>
													<option value="2371">Utility System Construction</option>
												</optgroup>
																					<optgroup label="Educational Services">
													<option value="6114">Business Schools and Computer and Management Training</option>
													<option value="6113">Colleges, Universities, and Professional Schools</option>
													<option value="6117">Educational Support Services</option>
													<option value="6111">Elementary and Secondary Schools</option>
													<option value="6112">Junior Colleges</option>
													<option value="6116">Other Schools and Instruction</option>
													<option value="6115">Technical and Trade Schools</option>
												</optgroup>
																					<optgroup label="Finance and Insurance">
													<option value="5223">Activities Related to Credit Intermediation</option>
													<option value="5242">Agencies, Brokerages, and Other Insurance Related Activities</option>
													<option value="5221">Depository Credit Intermediation</option>
													<option value="5251">Insurance and Employee Benefit Funds</option>
													<option value="5241">Insurance Carriers</option>
													<option value="5211">Monetary Authorities - Central Bank</option>
													<option value="5222">Nondepository Credit Intermediation</option>
													<option value="5239">Other Financial Investment Activities</option>
													<option value="5259">Other Investment Pools and Funds</option>
													<option value="5231">Securities and Commodity Contracts Intermediation and Brokerage</option>
													<option value="5232">Securities and Commodity Exchanges</option>
												</optgroup>
																					<optgroup label="Health Care and Social Assistance">
													<option value="6244">Child Day Care Services</option>
													<option value="6233">Community Care Facilities for the Elderly</option>
													<option value="6242">Community Food and Housing, and Emergency and Other Relief Services</option>
													<option value="6221">General Medical and Surgical Hospitals</option>
													<option value="6216">Home Health Care Services</option>
													<option value="6241">Individual and Family Services</option>
													<option value="6215">Medical and Diagnostic Laboratories</option>
													<option value="6231">Nursing Care Facilities</option>
													<option value="6212">Offices of Dentists</option>
													<option value="6213">Offices of Other Health Practitioners</option>
													<option value="6211">Offices of Physicians</option>
													<option value="6219">Other Ambulatory Health Care Services</option>
													<option value="6239">Other Residential Care Facilities</option>
													<option value="6214">Outpatient Care Centers</option>
													<option value="6222">Psychiatric and Substance Abuse Hospitals</option>
													<option value="6232">Residential Mental Retardation, Mental Health and Substance Abuse Facilities</option>
													<option value="6223">Specialty (except Psychiatric and Substance Abuse) Hospitals</option>
													<option value="6243">Vocational Rehabilitation Services</option>
												</optgroup>
																					<optgroup label="Information">
													<option value="5175">Cable and Other Program Distribution</option>
													<option value="5152">Cable and Other Subscription Programming</option>
													<option value="5182">Data Processing, Hosting, and Related Services</option>
													<option value="5161">Internet Publishing and Broadcasting</option>
													<option value="5181">Internet Service Providers and Web Search Portals</option>
													<option value="5121">Motion Picture and Video Industries</option>
													<option value="5111">Newspaper, Periodical, Book, and Directory Publishers</option>
													<option value="5191">Other Information Services</option>
													<option value="5179">Other Telecommunications</option>
													<option value="5151">Radio and Television Broadcasting</option>
													<option value="5174">Satellite Telecommunications</option>
													<option value="5112">Software Publishers</option>
													<option value="5122">Sound Recording Industries</option>
													<option value="5173">Telecommunications Resellers</option>
													<option value="5171">Wired Telecommunications Carriers</option>
													<option value="5172">Wireless Telecommunications Carriers (except Satellite)</option>
												</optgroup>
																					<optgroup label="Management of Companies and Enterprises">
													<option value="5511">Management of Companies and Enterprises</option>
												</optgroup>
																					<optgroup label="Manufacturing">
													<option value="3364">Aerospace Product and Parts Manufacturing</option>
													<option value="3331">Agriculture, Construction, and Mining Machinery Manufacturing</option>
													<option value="3313">Alumina and Aluminum Production and Processing</option>
													<option value="3111">Animal Food Manufacturing</option>
													<option value="3116">Animal Slaughtering and Processing</option>
													<option value="3159">Apparel Accessories and Other Apparel Manufacturing</option>
													<option value="3151">Apparel Knitting Mills</option>
													<option value="3323">Architectural and Structural Metals Manufacturing</option>
													<option value="3343">Audio and Video Equipment Manufacturing</option>
													<option value="3118">Bakeries and Tortilla Manufacturing</option>
													<option value="3251">Basic Chemical Manufacturing</option>
													<option value="3121">Beverage Manufacturing</option>
													<option value="3324">Boiler, Tank, and Shipping Container Manufacturing</option>
													<option value="3273">Cement and Concrete Product Manufacturing</option>
													<option value="3271">Clay Product and Refractory Manufacturing</option>
													<option value="3328">Coating, Engraving, Heat Treating, and Allied Activities</option>
													<option value="3333">Commercial and Service Industry Machinery Manufacturing</option>
													<option value="3342">Communications Equipment Manufacturing</option>
													<option value="3341">Computer and Peripheral Equipment Manufacturing</option>
													<option value="3222">Converted Paper Product Manufacturing</option>
													<option value="3152">Cut and Sew Apparel Manufacturing</option>
													<option value="3322">Cutlery and Handtool Manufacturing</option>
													<option value="3115">Dairy Product Manufacturing</option>
													<option value="3351">Electric Lighting Equipment Manufacturing</option>
													<option value="3353">Electrical Equipment Manufacturing</option>
													<option value="3336">Engine, Turbine, and Power Transmission Equipment Manufacturing</option>
													<option value="3132">Fabric Mills</option>
													<option value="3131">Fiber, Yarn, and Thread Mills</option>
													<option value="3162">Footwear Manufacturing</option>
													<option value="3321">Forging and Stamping</option>
													<option value="3315">Foundries</option>
													<option value="3114">Fruit and Vegetable Preserving and Specialty Food Manufacturing</option>
													<option value="3272">Glass and Glass Product Manufacturing</option>
													<option value="3112">Grain and Oilseed Milling</option>
													<option value="3325">Hardware Manufacturing</option>
													<option value="3371">Household and Institutional Furniture and Kitchen Cabinet Manufacturing</option>
													<option value="3352">Household Appliance Manufacturing</option>
													<option value="3332">Industrial Machinery Manufacturing</option>
													<option value="3311">Iron and Steel Mills and Ferroalloy Manufacturing</option>
													<option value="3161">Leather and Hide Tanning and Finishing</option>
													<option value="3274">Lime and Gypsum Product Manufacturing</option>
													<option value="3327">Machine Shops; Turned Product; and Screw, Nut, and Bolt Manufacturing</option>
													<option value="3346">Manufacturing and Reproducing Magnetic and Optical Media</option>
													<option value="3391">Medical Equipment and Supplies Manufacturing</option>
													<option value="3335">Metalworking Machinery Manufacturing</option>
													<option value="3362">Motor Vehicle Body and Trailer Manufacturing</option>
													<option value="3361">Motor Vehicle Manufacturing</option>
													<option value="3363">Motor Vehicle Parts Manufacturing</option>
													<option value="3345">Navigational, Measuring, Electromedical, and Control Instruments Manufacturing</option>
													<option value="3314">Nonferrous Metal (except Aluminum) Production and Processing</option>
													<option value="3372">Office Furniture (including Fixtures) Manufacturing</option>
													<option value="3259">Other Chemical Product and Preparation Manufacturing</option>
													<option value="3359">Other Electrical Equipment and Component Manufacturing</option>
													<option value="3329">Other Fabricated Metal Product Manufacturing</option>
													<option value="3119">Other Food Manufacturing</option>
													<option value="3379">Other Furniture Related Product Manufacturing</option>
													<option value="3339">Other General Purpose Machinery Manufacturing</option>
													<option value="3169">Other Leather and Allied Product Manufacturing</option>
													<option value="3399">Other Miscellaneous Manufacturing</option>
													<option value="3279">Other Nonmetallic Mineral Product Manufacturing</option>
													<option value="3149">Other Textile Product Mills</option>
													<option value="3369">Other Transportation Equipment Manufacturing</option>
													<option value="3219">Other Wood Product Manufacturing</option>
													<option value="3255">Paint, Coating, and Adhesive Manufacturing</option>
													<option value="3253">Pesticide, Fertilizer, and Other Agricultural Chemical Manufacturing</option>
													<option value="3241">Petroleum and Coal Products Manufacturing</option>
													<option value="3254">Pharmaceutical and Medicine Manufacturing</option>
													<option value="3261">Plastics Product Manufacturing</option>
													<option value="3231">Printing and Related Support Activities</option>
													<option value="3221">Pulp, Paper, and Paperboard Mills</option>
													<option value="3365">Railroad Rolling Stock Manufacturing</option>
													<option value="3252">Resin, Synthetic Rubber, and Artificial Synthetic Fibers and Filaments Manufacturing</option>
													<option value="3262">Rubber Product Manufacturing</option>
													<option value="3211">Sawmills and Wood Preservation</option>
													<option value="3117">Seafood Product Preparation and Packaging</option>
													<option value="3344">Semiconductor and Other Electronic Component Manufacturing</option>
													<option value="3366">Ship and Boat Building</option>
													<option value="3256">Soap, Cleaning Compound, and Toilet Preparation Manufacturing</option>
													<option value="3326">Spring and Wire Product Manufacturing</option>
													<option value="3312">Steel Product Manufacturing from Purchased Steel</option>
													<option value="3113">Sugar and Confectionery Product Manufacturing</option>
													<option value="3133">Textile and Fabric Finishing and Fabric Coating Mills</option>
													<option value="3141">Textile Furnishings Mills</option>
													<option value="3122">Tobacco Manufacturing</option>
													<option value="3212">Veneer, Plywood, and Engineered Wood Product Manufacturing</option>
													<option value="3334">Ventilation, Heating, Air-Conditioning, and Commercial Refrigeration Equipment Manufacturing</option>
												</optgroup>
																					<optgroup label="Mining">
													<option value="2121">Coal Mining</option>
													<option value="2122">Metal Ore Mining</option>
													<option value="2123">Nonmetallic Mineral Mining and Quarrying</option>
													<option value="2111">Oil and Gas Extraction</option>
													<option value="2131">Support Activities for Mining</option>
												</optgroup>
																					<optgroup label="Other Services (except Public Administration)">
													<option value="8111">Automotive Repair and Maintenance</option>
													<option value="8139">Business, Professional, Labor, Political, and Similar Organizations</option>
													<option value="8134">Civic and Social Organizations</option>
													<option value="8113">Commercial and Industrial Machinery and Equipment (except Automotive and Electronic) Repair and Maintenance</option>
													<option value="8122">Death Care Services</option>
													<option value="8123">Drycleaning and Laundry Services</option>
													<option value="8112">Electronic and Precision Equipment Repair and Maintenance</option>
													<option value="8132">Grantmaking and Giving Services</option>
													<option value="8129">Other Personal Services</option>
													<option value="8114">Personal and Household Goods Repair and Maintenance</option>
													<option value="8121">Personal Care Services</option>
													<option value="8141">Private Households</option>
													<option value="8131">Religious Organizations</option>
													<option value="8133">Social Advocacy Organizations</option>
												</optgroup>
																					<optgroup label="Professional, Scientific, and Technical Services">
													<option value="5412">Accounting, Tax Preparation, Bookkeeping, and Payroll Services</option>
													<option value="5418">Advertising and Related Services</option>
													<option value="5413">Architectural, Engineering, and Related Services</option>
													<option value="5415">Computer Systems Design and Related Services</option>
													<option value="5411">Legal Services</option>
													<option value="5416">Management, Scientific, and Technical Consulting Services</option>
													<option value="5419">Other Professional, Scientific, and Technical Services</option>
													<option value="5417">Scientific Research and Development Services</option>
													<option value="5414">Specialized Design Services</option>
												</optgroup>
																					<optgroup label="Public Administration">
													<option value="9261">Administration of Economic Programs</option>
													<option value="9241">Administration of Environmental Quality Programs</option>
													<option value="9251">Administration of Housing Programs, Urban Planning, and Community Development</option>
													<option value="9231">Administration of Human Resource Programs</option>
													<option value="9211">Executive, Legislative, and Other General Government Support</option>
													<option value="9221">Justice, Public Order, and Safety Activities</option>
													<option value="9281">National Security and International Affairs</option>
													<option value="9271">Space Research and Technology</option>
												</optgroup>
																					<optgroup label="Real Estate and Rental and Leasing">
													<option value="5313">Activities Related to Real Estate</option>
													<option value="5321">Automotive Equipment Rental and Leasing</option>
													<option value="5324">Commercial and Industrial Machinery and Equipment Rental and Leasing</option>
													<option value="5322">Consumer Goods Rental</option>
													<option value="5323">General Rental Centers</option>
													<option value="5331">Lessors of Nonfinancial Intangible Assets (except Copyrighted Works)</option>
													<option value="5311">Lessors of Real Estate</option>
													<option value="5312">Offices of Real Estate Agents and Brokers</option>
												</optgroup>
																					<optgroup label="Retail Trade">
													<option value="4411">Automobile Dealers</option>
													<option value="4413">Automotive Parts, Accessories, and Tire Stores</option>
													<option value="4453">Beer, Wine, and Liquor Stores</option>
													<option value="4512">Book, Periodical, and Music Stores</option>
													<option value="4441">Building Material and Supplies Dealers</option>
													<option value="4481">Clothing Stores</option>
													<option value="4521">Department Stores</option>
													<option value="4543">Direct Selling Establishments</option>
													<option value="4541">Electronic Shopping and Mail-Order Houses</option>
													<option value="4431">Electronics and Appliance Stores</option>
													<option value="4531">Florists</option>
													<option value="4421">Furniture Stores</option>
													<option value="4471">Gasoline Stations</option>
													<option value="4451">Grocery Stores</option>
													<option value="4461">Health and Personal Care Stores</option>
													<option value="4422">Home Furnishings Stores</option>
													<option value="4483">Jewelry, Luggage, and Leather Goods Stores</option>
													<option value="4442">Lawn and Garden Equipment and Supplies Stores</option>
													<option value="4532">Office Supplies, Stationery, and Gift Stores</option>
													<option value="4529">Other General Merchandise Stores</option>
													<option value="4539">Other Miscellaneous Store Retailers</option>
													<option value="4412">Other Motor Vehicle Dealers</option>
													<option value="4482">Shoe Stores</option>
													<option value="4452">Specialty Food Stores</option>
													<option value="4511">Sporting Goods, Hobby, and Musical Instrument Stores</option>
													<option value="4533">Used Merchandise Stores</option>
													<option value="4542">Vending Machine Operators</option>
												</optgroup>
																					<optgroup label="Transportation and Warehousing">
													<option value="4855">Charter Bus Industry</option>
													<option value="4921">Couriers</option>
													<option value="4831">Deep Sea, Coastal, and Great Lakes Water Transportation</option>
													<option value="4885">Freight Transportation Arrangement</option>
													<option value="4841">General Freight Trucking</option>
													<option value="4832">Inland Water Transportation</option>
													<option value="4852">Interurban and Rural Bus Transportation</option>
													<option value="4922">Local Messengers and Local Delivery</option>
													<option value="4812">Nonscheduled Air Transportation</option>
													<option value="4869">Other Pipeline Transportation</option>
													<option value="4889">Other Support Activities for Transportation</option>
													<option value="4859">Other Transit and Ground Passenger Transportation</option>
													<option value="4861">Pipeline Transportation of Crude Oil</option>
													<option value="4862">Pipeline Transportation of Natural Gas</option>
													<option value="4911">Postal Service</option>
													<option value="4821">Rail Transportation</option>
													<option value="4871">Scenic and Sightseeing Transportation, Land</option>
													<option value="4879">Scenic and Sightseeing Transportation, Other</option>
													<option value="4872">Scenic and Sightseeing Transportation, Water</option>
													<option value="4811">Scheduled Air Transportation</option>
													<option value="4854">School and Employee Bus Transportation</option>
													<option value="4842">Specialized Freight Trucking</option>
													<option value="4881">Support Activities for Air Transportation</option>
													<option value="4882">Support Activities for Rail Transportation</option>
													<option value="4884">Support Activities for Road Transportation</option>
													<option value="4883">Support Activities for Water Transportation</option>
													<option value="4853">Taxi and Limousine Service</option>
													<option value="4851">Urban Transit Systems</option>
													<option value="4931">Warehousing and Storage</option>
												</optgroup>
																					<optgroup label="Utilities">
													<option value="2211">Electric Power Generation, Transmission and Distribution</option>
													<option value="2212">Natural Gas Distribution</option>
													<option value="2213">Water, Sewage and Other Systems</option>
												</optgroup>
																					<optgroup label="Wholesale Trade">
													<option value="4243">Apparel, Piece Goods, and Notions Merchant Wholesalers</option>
													<option value="4248">Beer, Wine, and Distilled Alcoholic Beverage Merchant Wholesalers</option>
													<option value="4246">Chemical and Allied Products Merchant Wholesalers</option>
													<option value="4242">Drugs and Druggists' Sundries Merchant Wholesalers</option>
													<option value="4236">Electrical and Electronic Goods Merchant Wholesalers</option>
													<option value="4245">Farm Product Raw Material Merchant Wholesalers</option>
													<option value="4232">Furniture and Home Furnishing Merchant Wholesalers</option>
													<option value="4244">Grocery and Related Product Wholesalers</option>
													<option value="4237">Hardware, and Plumbing and Heating Equipment and Supplies Merchant Wholesalers</option>
													<option value="4233">Lumber and Other Construction Materials Merchant Wholesalers</option>
													<option value="4238">Machinery, Equipment, and Supplies Merchant Wholesalers</option>
													<option value="4235">Metal and Mineral (except Petroleum) Merchant Wholesalers</option>
													<option value="4239">Miscellaneous Durable Goods Merchant Wholesalers</option>
													<option value="4249">Miscellaneous Nondurable Goods Merchant Wholesalers</option>
													<option value="4231">Motor Vehicle and Motor Vehicle Parts and Supplies Merchant Wholesalers</option>
													<option value="4241">Paper and Paper Product Merchant Wholesalers</option>
													<option value="4247">Petroleum and Petroleum Products Merchant Wholesalers</option>
													<option value="4234">Professional and Commercial Equipment and Supplies Merchant Wholesalers</option>
													<option value="4251">Wholesale Electronic Markets and Agents and Brokers</option>
												</optgroup>
                                                
                                                </select>

  </td>
</tr>  
</table>      
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                       <input class="submit_eleventh_business" type="submit" name="submit_eleventh" id="submit_eleventh" value="" />     
            </div>                                         
            
      </div>      
  
  
  
   <!-- #last_step -->
            <div id="last_step_business">
               
                <div class="form">
               
       
       <div class="content">
       <h1>Thank you!</h1>
       <p>Message here....</p>
       
       <div id="result"></div>
       </div>             
               
                    
                    
                    
                </div>     
                
            </div>    
  
 
            
        </form>
        
    
        
	</div>
	


</div>





</div>

<div class="terms-steps-desktop">
<strong>Disclaimer for Business Loans:</strong> Lorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque. Quam euismod sem, semper ut potenti pellentesque quisque. In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel. Quam euismod sem, semper ut potenti pellentesque quisque. 
In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel.
</div>

<div class="bbb-secured-desktop"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/bbb-secured-desktop.gif"/></div>
   
      
</div><!-- end of #content -->

<?php get_footer(); ?>

