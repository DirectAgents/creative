<?php



// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Personal Loans Steps
 *
 * @file           personal-loans-steps.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/personal-loans-steps.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 
?>


<div id="content-personal-loans" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
<div class="personal-loans-box-step-desktop">
<div class="personal-loans-box-step1-desktop-title">i want a personal loan</div>

<div class="progress-steps2">
<div style="float:left">Process:</div>	

<div id="progress_bar">
        <div id="progress"></div>
        <div id="progress_text">0% Complete</div>
	</div>

</div>

<div class="personal-loans-box-step-desktop-left-column">
<div class="rates-business-loans-steps">Rates start at 3.16% APR</div>
<div class="content-left">

Borrow up to $35,000* at lower rates. No need to compare rates we are always locking in the best rates.
<p><div class="title">Lower Rates</div></p>
<p class="personal-inner-text">Low cost and complexity to lending allows us to pass the savings to you.</p>
<p><div class="title">Quick, Easy, Online Process</div></p>
<p class="personal-inner-text">Apply in minutes, get an instant rate quote.</p>
<p><div class="title">Secure and Confidential</div></p>
<p class="personal-inner-text">Your identity and personal information are protected and never shared with investors</p>
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
<option value="Personal Loan">Personal Loan</option>
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
                <input class="submit" type="submit" name="submit_first" id="submit_first" value="" />
            </div>      

</div>


            <!-- #second_step -->
            <div id="second_step"<?php if($_GET['pass'] == 'y') { ?>style="display:block" <? } ?>>
                

<div class="previous-personal"><a href="#" class="previous-second-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<div class="next-personal"><a href="#" class="next-second-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>


 <div id="second_step_personal">

                <div class="form">




<table cellpadding="0" cellspacing="0" border="1">

<tr>
<td><label>Zip Code</label></td>
</tr>

<tr>
<td>                
                
 <input type="text" name="username" id="username" value=""/>

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

<div class="next-third-personal"><a href="#" class="next-third-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>

   <div id="third_step_personal"> 
               
                <div class="form">
                   
                 <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td valign="top">&nbsp;</td>
<td><label>Loan amount you are seeking for!</label></td>
</tr>

    

<tr>
<td>&nbsp;</td>
<td>                
                
<select id="loan_amount" name="loan_amount">
<option value="$1 - $5,000">$1 - $5,000</option>
<option value="$5,001 - $25,000">$5,001 - $25,000</option>
<option value="$25,001 - $35,000">$25,001 - $35,000</option>
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

<div class="next-fourth-personal"><a href="#" class="next-fourth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>
               



<div id="fourth_step_personal"> 

                <div class="form">
               
 
                    
                    
                     <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td valign="top">&nbsp;</td>
<td><div class="title-fourth">Purpose of Loan?</div></td>
</tr>

    

<tr>
<td>&nbsp;</td>
<td>                
                
<select id="purpose_of_loan" name="purpose_of_loan" style="width:400px;">
<option value="Debt consolidation">Debt consolidation</option>
<option value="Home improvement">Home improvement</option>
<option value="Business">Business</option>
<option value="Auto">Auto</option>
<option value="Baby & adoption loans">Baby & adoption loans</option>
<option value="Boat">Boat</option>
<option value="Cosmetic procedures">Cosmetic procedures</option>
<option value="Engagement ring financing">Engagement ring financing</option>
<option value="Green loans">Green loans</option>
<option value="Household Expenses">Household Expenses</option>
<option value="Large purchases">Large purchases</option>
<option value="Medical/Dental">Medical/Dental</option>
<option value="Motorcycle">Motorcycle</option>
<option value="RV">RV</option>
<option value="Taxes">Taxes</option>
<option value="Vacation">Vacation</option>
<option value="Wedding loans">Wedding loans</option>
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

<div class="next-fifth-personal"><a href="#" class="next-fifth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>



<div id="fifth_step_personal"> 


                <div class="form">
               
               
               
               
 <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td valign="top">&nbsp;</td>
<td><div class="title">Employment Status?</div></td>
</tr>

    

<tr>
<td>&nbsp;</td>
<td>                
                
<select id="EmploymentStatusId" name="EmploymentStatusId" style="width:330px;">
<option value="Self Employed">Self Employed</option>
<option value="Not Employed">Not Employed</option>
<option value="Employed">Employed</option>
<option value="Other">Other</option>
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

<div class="next-sixth-personal"><a href="#" class="next-sixth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>               


<div id="sixth_step_personal"> 

                <div class="form">
               
                    
                    
                    <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td valign="top">&nbsp;</td>
<td><div class="title-sixth">Salary Frequency?</div></td>
</tr>

    

<tr>
<td>&nbsp;</td>
<td>                
                
<select id="SalaryFrequency" name="SalaryFrequency" style="width:350px;">
<option value="Monthly">Monthly</option>
<option value="Yearly">Yearly</option>
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

<div class="next-seventh-personal"><a href="#" class="next-seventh-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>                              



<div id="seventh_step_personal"> 

                <div class="form">
               
                    
                    
                    <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td valign="top">&nbsp;</td>
<td><div class="title">Residence Type?</div></td>
</tr>

    

<tr>
<td>&nbsp;</td>
<td>                
                
<select id="ResidenceType" name="ResidenceType" style="width:350px;">
<option value="own">own</option>
<option value="rent">rent</option>
<option value="mortgage">mortgage</option>
<option value="other">other</option>
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

<div class="next-eight-personal"><a href="#" class="next-eight-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>                              
               


<div id="eight_step_personal"> 

                <div class="form">
               
                    
                    
                    <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td valign="top">&nbsp;</td>
<td><div class="title">Current Salary?</div></td>
</tr>

    

<tr>
<td valign="top">&nbsp;</td>
<td><input type="text" name="CurrentSalary" id="CurrentSalary" value=""/></td>
</tr>  
</table>     







           
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_eight_personal" type="submit" name="submit_eight" id="submit_eight" value="" />             
            </div>    
     
     </div>
     
      
      
  <!-- #ninth_step -->
            <div id="ninth_step">


<div class="previous-ninth-personal"><a href="#" class="previous-ninth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<div class="next-ninth-personal"><a href="#" class="next-ninth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>                                             



<div id="ninth_step_personal"> 


                <div class="form">
               
                    
                    
                     <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td valign="top">&nbsp;</td>
<td><div class="title">Yearly Income?</div></td>
</tr>

    

<tr>
<td valign="top">&nbsp;</td>
<td><input type="text" name="YearlyIncome" id="YearlyIncome" value=""/></td>
</tr>  
</table>     
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_ninth_personal" type="submit" name="submit_ninth" id="submit_ninth" value="" />             
            </div>  
            
  </div>          
  
  
 
            
            
            
            
  
  
 
   <!-- #tenth_step -->
            <div id="tenth_step">
               

<div class="previous-tenth-personal"><a href="#" class="previous-tenth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<div class="next-tenth-personal"><a href="#" class="next-tenth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>                                   



<div id="tenth_step_personal"> 

                <div class="form">
               
                    
                    
                    <table cellpadding="0" cellspacing="0" border="1">




    

<tr>
<td><label>First Name</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="FirstName" id="FirstName" value=""/>
  </td>
</tr> 



<tr>
<td><label>Last Name</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="LastName" id="LastName" value=""/>
  </td>
</tr> 
 
</table>                
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_tenth" type="submit" name="submit_tenth" id="submit_tenth" value="" />             
            </div>                             
            
     </div>       





 <!-- #eleventh_step -->
            <div id="eleventh_step">
               


<div class="previous-eleventh-personal"><a href="#" class="previous-eleventh-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<div class="next-eleventh-personal"><a href="#" class="next-eleventh-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/next-arrow.png"/></a></div>                     



<div id="eleventh_step_personal"> 

                <div class="form">
               
                    
                    
                    <table cellpadding="0" cellspacing="0" border="1">


<tr>
<td><label>Email Address</label></td>
</tr>

<tr>
<td>                
                
<input type="text" value=""/>
  </td>
</tr> 



<tr>
<td><label>Date of Birth</label></td>
</tr>

<tr>
<td>                
                
<input type="text" value="mm/dd/yyyy"/>
  </td>
</tr> 
 
</table>                
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_eleventh" type="submit" name="submit_eleventh" id="submit_eleventh" value="" />             
            </div>                                         
            
      </div>      
  
  
  
  <!-- #twelth_step -->
            <div id="twelth_step">


<div class="previous-twelth-personal"><a href="#" class="previous-twelth-step"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>


<div id="twelth_step_personal"> 

                <div class="form">
               
 
 <table cellpadding="0" cellspacing="0" border="1">




    

<tr>
<td><label>Street Address</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="Street" id="Street" value=""/>
  </td>
</tr> 



<tr>
<td><label>ZipCode</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="PostalCode" id="PostalCode" value=""/>
  </td>
</tr> 
 
</table>                
 


                    
                    
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_twelth_personal" type="submit" name="submit_twelth" id="submit_twelth" value="" />             
            </div>                                                   
                       
  </div>
  
  
 
 
 
  <!-- #last_step -->
            <div id="last_step">
               
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
Lorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque. Quam euismod sem, semper ut potenti pellentesque quisque. In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel. Quam euismod sem, semper ut potenti pellentesque quisque. 
In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel.
</div>

<div class="bbb-secured-desktop"><img src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/bbb-secured-desktop.gif"/></div>
   
      
</div><!-- end of #content -->

<?php get_footer(); ?>

