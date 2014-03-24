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

<?php if($_GET['loan'] == 'home-improvement') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a home improvement loan</div>
<? } ?>


<?php if($_GET['loan'] == 'personal') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a personal loan</div>
<? } ?>


<?php if($_GET['loan'] == 'debt-consolidation') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a debt consolidation loan</div>
<? } ?>

<?php if($_GET['loan'] == 'cash-advance') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a cash advance loan</div>
<? } ?>

<?php if($_GET['loan'] == 'vacation') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a vacation loan</div>
<? } ?>

<?php if($_GET['loan'] == 'wedding') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a wedding loan</div>
<? } ?>

<?php if($_GET['loan'] == 'medical-dental') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a medical dental loan</div>
<? } ?>

<?php if($_GET['loan'] == 'household-expenses') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a household expenses loan</div>
<? } ?>

<?php if($_GET['loan'] == 'major-purchase') { ?>
<div class="personal-loans-box-step1-desktop-title">I want a major purchase loan</div>
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
                <input class="submit_first" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_first" id="submit_first" value="" />
            </div>      

</div>


            <!-- #second_step -->
            <div id="second_step"<?php if($_GET['pass'] == 'y') { ?>style="display:block" <? } ?>>
                

<div class="previous-personal"><a href="#" class="previous-second-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-personal"><a href="#" class="next-second-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->


 <div id="second_step_personal">

                <div class="form">




<table cellpadding="0" cellspacing="0" border="0">

<tr>
<td><label>How much would you like to borrow?</label></td>
</tr>

<tr>
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
                <input class="submit_second" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_second" id="submit_second" value="" />
                
                </div>
            </div>      





            <!-- #third_step -->
            <div id="third_step">


<div class="previous-third-personal"><a href="#" class="previous-third-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-third-personal"><a href="#" class="next-third-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->

   <div id="third_step_personal"> 
               
                <div class="form">
                   
 <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>Employment Status?</label></td>
</tr>

    

<tr>

<td>                
                
<select id="EmploymentStatusId" name="EmploymentStatusId">
<option value="Self Employed">Self Employed</option>
<option value="Not Employed">Not Employed</option>
<option value="Employed">Employed</option>
<option value="Other">Other</option>
</select>
  </td>
</tr>  
</table>                
               
                   
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_third" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_third" id="submit_third_personal" value="" />
                
            </div>      
    
    </div>        
            
            <!-- #fourth_step -->
            <div id="fourth_step">
 
<div class="previous-fourth-personal"><a href="#" class="previous-fourth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-fourth-personal"><a href="#" class="next-fourth-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->
               



<div id="fourth_step_personal"> 

                <div class="form">
               
 
                    
                    
                     <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>Salary Frequency?</label></td>
</tr>

    

<tr>

<td>                
                
<select id="SalaryFrequency" name="SalaryFrequency">
<option value="Monthly">Monthly</option>
<option value="Yearly">Yearly</option>
</select>
  </td>
</tr>  
</table>                

                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_fourth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_fourth" id="submit_fourth" value="" />            
            </div>
            
       </div>     
            
   
   
    <!-- #fifth_step -->
            <div id="fifth_step">
               

<div class="previous-fifth-personal"><a href="#" class="previous-fifth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-fifth-personal"><a href="#" class="next-fifth-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->



<div id="fifth_step_personal"> 


                <div class="form">
               
               
               
               
      <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>Residence Type?</label></td>
</tr>

    

<tr>

<td>                
                
<select id="ResidenceType" name="ResidenceType">
<option value="own">own</option>
<option value="rent">rent</option>
<option value="mortgage">mortgage</option>
<option value="other">other</option>
</select>
  </td>
</tr>  
</table>   
 
               
                    
                    
                    
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_fifth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_fifth" id="submit_fifth" value="" />                      
            </div>         
            
   </div>         
            
            
           <!-- #sixth_step -->
            <div id="sixth_step">


<div class="previous-sixth-personal"><a href="#" class="previous-sixth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-sixth-personal"><a href="#" class="next-sixth-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->              


<div id="sixth_step_personal"> 

                <div class="form">
               
                    
                    
                 <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>Current Salary?</label></td>
</tr>

    

<tr>

<td><input type="text" name="CurrentSalary" id="CurrentSalary" value=""/></td>
</tr>  
</table>                    
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_sixth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_sixth" id="submit_sixth" value="" />             
            </div>         
            
     </div>       
            
     
     
      <!-- #sevents_step -->
            <div id="seventh_step">

<div class="previous-seventh-personal"><a href="#" class="previous-seventh-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-seventh-personal"><a href="#" class="next-seventh-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->                             



<div id="seventh_step_personal"> 

                <div class="form">
               
                    
                    
                   <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>Yearly Income?</label></td>
</tr>

    

<tr>

<td><input type="text" name="YearlyIncome" id="YearlyIncome" value=""/></td>
</tr>  
</table>     
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_seventh" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_seventh" id="submit_seventh" value="" />             
            </div>     
   </div>         
     
     
     
       <!-- #eight_step -->
            <div id="eight_step">
 

<div class="previous-eight-personal"><a href="#" class="previous-eight-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-eight-personal"><a href="#" class="next-eight-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->                            
               


<div id="eight_step_personal"> 

                <div class="form">
               
                    
                    
     


<table cellpadding="0" cellspacing="0" border="1">


<tr>
<td><label>Firstname</label></td>
</tr>


<tr>


<td><input type="text" name="CurrentSalary" id="CurrentSalary" value=""/></td>

</tr>   


<tr>
<td><label>Lastname</label></td>
</tr>             

<tr>
               
                
<td><input type="text" name="CurrentSalary" id="CurrentSalary" value=""/></td>
  
</tr>  
</table>                



     
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_eight" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_eight" id="submit_eight" value="" />             
            </div>    
     
     </div>
     
      
      
  <!-- #ninth_step -->
            <div id="ninth_step">


<div class="previous-ninth-personal"><a href="#" class="previous-ninth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-ninth-personal"><a href="#" class="next-ninth-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->                                           



<div id="ninth_step_personal"> 


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
               <input class="submit_ninth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_ninth" id="submit_ninth" value="" />             
            </div>  
            
  </div>          
  
  
 
            
            
            
            
  
  
 
   <!-- #tenth_step -->
            <div id="tenth_step">
               

<div class="previous-tenth-personal"><a href="#" class="previous-tenth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

<!--<div class="next-tenth-personal"><a href="#" class="next-tenth-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/next-arrow.png"/></a></div>-->                                  



<div id="tenth_step_personal"> 

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
               <input class="submit_tenth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_tenth" id="submit_tenth" value="" />             
            </div>                             
            
     </div>       





 <!-- #last_step -->
            <div id="eleventh_step">
               


<div class="previous-eleventh-personal"><a href="#" class="previous-eleventh-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>
                 



<div id="eleventh_step_personal"> 

                <div class="form">
               
                    
                    
                    <div class="content">
       <h1>Thank you!</h1>
       <p>Message here....</p>
       
       <div id="result"></div>
       </div>             
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                       
            </div>                                         
            
      </div>      
  
  
 
            
        </form>
        
    
        
	</div>
	


</div>





</div>

<div class="terms-steps-desktop">
<strong>Disclaimer for Personal Loans:</strong> Lorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque. Quam euismod sem, semper ut potenti pellentesque quisque. In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel. Quam euismod sem, semper ut potenti pellentesque quisque. 
In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel.
</div>

<div class="bbb-secured-desktop"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/bbb-secured-desktop.gif"/></div>
   
      
</div><!-- end of #content -->

<?php get_footer(); ?>

