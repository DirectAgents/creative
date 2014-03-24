<?php



// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Home Loans Steps Home Purchase
 *
 * @file           home-loans-steps-home-purchase.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/home-loans-steps-home-purchase.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 
?>


<div id="content-personal-loans" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
<div class="home-loans-box-step-desktop">



<?php if($_GET['loan'] == 'home-purchase') { ?>
<div class="personal-loans-box-step1-desktop-title">Home Purchase Loan</div>
<? } ?>



<div class="progress-steps2">
<div style="float:left">Progress:&nbsp;&nbsp;</div>	

<div id="progress_bar">
        <div id="progress"></div>
        <div id="progress_text"></div>
	</div>

</div>

<div class="personal-loans-box-step-desktop-left-column">
<div class="rates-personal-loans-steps">Rates start at 3.99% APR</div>
<div class="content-left">

Everyloan has competitive rates and fees that can save you money. We close the majority of our loans in 30 days
or less, and we are highly recommended!<br /><br />
<img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/business-table.gif" style="width:100%"/>

</div>
</div>

<div class="rates-business-loans-steps1-form-desktop">




<div id="container-steps">



        <form action="https://www.leadpointdelivery.com/17483/direct.ilp" method="POST" class="" onsubmit="return onSubmit()" name="loanform">
        
        <input type="hidden" id="IsPrimaryBorrower" name="IsPrimaryBorrower" value="Yes"/>


<?php //if($_GET['step'] == "1") { ?>	
    
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

<?php  //} ?>




<?php //if($_GET['step'] == "2") { ?>

            <!-- #second_step -->
            <div id="second_step"<?php if($_GET['pass'] == 'y') { ?>style="display:block" <? } ?>>
                
<?php if($_GET['pass'] != 'y') { ?>
<div class="previous-home"><a href="#" class="previous-second-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>
<? } ?>




 <div id="second_step_home">

                <div class="form">



<table cellpadding="0" cellspacing="0" border="1">





<tr>
<td><label>Property State</label></td>
</tr>

<tr>
<td>                
                

<select name="PROP_ST" class="FormInput">

                <option value="" selected>Select one</option>

                <option value="AL"> Alabama</option>

                <option value="AK"> Alaska</option>

                <option value="AZ"> Arizona</option>

                <option value="AR"> Arkansas</option>

                <option value="CA"> California</option>

                <option value="CO"> Colorado</option>

                <option value="CT"> Connecticut</option>

                <option value="DE"> Delaware</option>

                <option value="DC"> District of Columbia</option>

                <option value="FL"> Florida</option>

                <option value="GA"> Georgia</option>

                <option value="HI"> Hawaii</option>

                <option value="IA"> Iowa</option>

                <option value="ID"> Idaho</option>

                <option value="IL"> Illinois</option>

                <option value="IN"> Indiana</option>

                <option value="KS"> Kansas</option>

                <option value="KY"> Kentucky</option>

                <option value="LA"> Louisiana</option>

                <option value="ME"> Maine</option>

                <option value="MD"> Maryland</option>

                <option value="MA"> Massachusetts</option>

                <option value="MI"> Michigan</option>

                <option value="MN"> Minnesota</option>

                <option value="MO"> Missouri</option>

                <option value="MS"> Mississippi</option>

                <option value="MT"> Montana</option>

                <option value="NE"> Nebraska</option>

                <option value="NV"> Nevada</option>

                <option value="NH"> New Hampshire</option>

                <option value="NJ"> New Jersey</option>

                <option value="NM"> New Mexico</option>

                <option value="NY"> New York</option>

                <option value="NC"> North Carolina</option>

                <option value="ND"> North Dakota</option>

                <option value="OH"> Ohio</option>

                <option value="OK"> Oklahoma</option>

                <option value="OR"> Oregon</option>

                <option value="PA"> Pennsylvania</option>

                <option value="RI"> Rhode Island</option>

                <option value="SC"> South Carolina</option>

                <option value="SD"> South Dakota</option>

                <option value="TN"> Tennessee</option>

                <option value="TX"> Texas</option>

                <option value="UT"> Utah</option>

                <option value="VT"> Vermont</option>

                <option value="VA"> Virginia</option>

                <option value="WA"> Washington</option>

                <option value="WV"> West Virginia</option>

                <option value="WI"> Wisconsin</option>

                <option value="WY"> Wyoming</option>

            </select>



  </td>
</tr> 
 
</table>     









                                 
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_second" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_second" id="submit_second" value="" />
                
                </div>
            </div>      

<?php //} ?>


<?php //if($_GET['step'] == "3") { ?>



            <!-- #third_step -->
            <div id="third_step">


<div class="previous-third-home"><a href="#" class="previous-third-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>


   <div id="third_step_personal"> 
               
                <div class="form">
                   
   
   
   

 <table cellpadding="0" cellspacing="0" border="0">

<tr>
<td><label>Property use</label></td>
</tr>

<tr>
<td>                
                
<select name="PROP_PURP" class="FormInput" id="PROP_PURP">

                            <option  value="">Select One</option>
                            
                            <option value="primary">Primary Residence</option>

                            <option  value="secondary_vactn">Second or Vacation Home</option>

                            <option value="investment">Investment Property</option>

                        </select>
                        
  

                        
                        

  </td>
</tr>  
</table>      
   
      
      
     
 
               
                   
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_third" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_third" id="submit_third_home_refinance" value="" />
                
            </div>      
    
    </div>        
    
<?php //} ?> 


<?php //if($_GET['step'] == "4") { ?>   
            
            <!-- #fourth_step -->
            <div id="fourth_step">
 
<div class="previous-fourth-home"><a href="#" class="previous-fourth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

               



<div id="fourth_step_personal"> 

                <div class="form">
               
 
 
 <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>Estimated Home Value?</label></td>
</tr>

    

<tr>

<td>                
                
<select name="EST_VAL"  class="FormInput">

				
				<option value="" selected>Select One</option>
                
                <option value="77500">75,000 - 80,000</option>

                <option value="82500">80,001 - 85,000</option>

                <option value="87500">85,001 - 90,000</option>

                <option value="92500">90,001 - 95,000</option>

                <option value="97500">95,001 - 100,000</option>

                <option value="102500">100,001 - 105,000</option>

                <option value="107500">105,001 - 110,000</option>

                <option value="112500">110,001 - 115,000</option>

                <option value="117500">115,001 - 120,000</option>

                <option value="122500">120,001 - 125,000</option>

                <option value="127500">125,001 - 130,000</option>

                <option value="132500">130,001 - 135,000</option>

                <option value="137500">135,001 - 140,000</option>

                <option value="142500">140,001 - 145,000</option>

                <option value="147500">145,001 - 150,000</option>

                <option value="152500">150,001 - 155,000</option>

                <option value="157500">155,001 - 160,000</option>

                <option value="162500">160,001 - 165,000</option>

                <option value="167500">165,001 - 170,000</option>

                <option value="172500">170,001 - 175,000</option>

                <option value="177500">175,001 - 180,000</option>

                <option value="182500">180,001 - 185,000</option>

                <option value="187500">185,001 - 190,000</option>

                <option value="192500">190,001 - 195,000</option>

                <option value="197500">195,001 - 200,000</option>

                <option value="205000">200,001 - 210,000</option>

                <option value="215000">210,001 - 220,000</option>

                <option value="225000">220,001 - 230,000</option>

                <option value="235000">230,001 - 240,000</option>

                <option value="245000">240,001 - 250,000</option>

                <option value="255000">250,001 - 260,000</option>

                <option value="265000">260,001 - 270,000</option>

                <option value="275000">270,001 - 280,000</option>

                <option value="285000">280,001 - 290,000</option>

                <option value="295000">290,001 - 300,000</option>

                <option value="305000">300,001 - 310,000</option>

                <option value="315000">310,001 - 320,000</option>

                <option value="325000">320,001 - 330,000</option>

                <option value="335000">330,001 - 340,000</option>

                <option value="345000">340,001 - 350,000</option>

                <option value="355000">350,001 - 360,000</option>

                <option value="365000">360,001 - 370,000</option>

                <option value="375000">370,001 - 380,000</option>

                <option value="385000">380,001 - 390,000</option>

                <option value="395000">390,001 - 400,000</option>

                <option value="410000">400,001 - 420,000</option>

                <option value="430000">420,001 - 440,000</option>

                <option value="450000">440,001 - 460,000</option>

                <option value="470000">460,001 - 480,000</option>

                <option value="490000">480,001 - 500,000</option>

                
            </select>
  </td>
</tr>  
</table>                  
                    
                    
                     

                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_fourth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_fourth" id="submit_fourth" value="" />            
            </div>
            
       </div>     
            

<?php //} ?>    


<?php //if($_GET['step'] == "5") { ?>  
   
    <!-- #fifth_step -->
            <div id="fifth_step">
               

<div class="previous-fifth-home"><a href="#" class="previous-fifth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>




<div id="fifth_step_personal"> 


                <div class="form">
               
               


  <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>When are you likely to buy a home?</label></td>
</tr>

    

<tr>

<td>                
                
<select name="BUY_TIMEFRAME" class="FormInput" id="BUY_TIMEFRAME">

            	<option value="" selected>Select one</option>

            	<option value="immediately">Immediately</option>

              <option value="30_days">30 Days</option>

              <option value="60_days">60 Days</option>

              <option value="90_days">90 Days</option>

              <option value="no_time_constraint">No Time Constraint</option>

            </select>
  </td>
</tr>  
</table>   
  
               
               
     
               
                    
                    
                    
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit_fifth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_fifth" id="submit_fifth" value="" />                      
            </div>         
            
   </div>         
   
<?php //} ?>     
            


<?php //if($_GET['step'] == "6") { ?>  
   

           <!-- #sixth_step -->
            <div id="sixth_step">            


<div class="previous-sixth-home"><a href="#" class="previous-sixth-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/previous-arrow.png"/></a></div>



<div id="sixth_step_home"> 

                <div class="form">
               
  
  

<table cellpadding="0" cellspacing="0" border="1">


<tr>

<td colspan="3"><label>Have you found a home?</label></td>
</tr>

    

<tr>

<td width="65" align="left"><input type="radio" name="SPEC_HOME" value="yes" id="SPEC_YES"><span class="radio-label">Yes</span></td>
<td width="135" colspan="2" align="left"><input type="radio" name="SPEC_HOME" value="no" id="SPEC_NO" checked="checked" />
  <span class="radio-label">No</span></td>
 </tr>  
</table>      
 
 


  
  
                    
                    
   
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_sixth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_sixth" id="submit_sixth" value="" />    
               
               <input class="real-estate-agent-step" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_sixth" id="real-estate-agent-step" value="" />    
                        
            </div>         
            
     </div>       
            
  <?php //} ?>     
     
      <!-- #sevents_step -->
            <div id="real-estate-agent">

<div class="previous-second-mortgage-balance"><a href="#" class="previous-second-mortgage-balance"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>




<div id="real-estate-agent_home"> 

                <div class="form">
               

<table cellpadding="0" cellspacing="0" border="1">


<tr>

<td colspan="3"><label>Do you have a signed contract to buy your home?</label></td>
</tr>

    

<tr>

<td width="65" align="left"><input type="radio" name="PURCHASE_CONTRACT" value="yes" id="RP_YES"><span class="radio-label">Yes</span></td>
<td width="135" colspan="2" align="left"><input type="radio" name="PURCHASE_CONTRACT" value="no" id="RP_NO" checked="checked" />
  <span class="radio-label">No</span></td>
 </tr>  
</table>      




                    
                    
                 
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="signed_contract" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="signed_contract" id="signed_contract" value="" />             
            </div>     
   </div>         
     
     
     
     
     
     
     
 
 
     
   



<?php //if($_GET['step'] == "7") { ?>  



<!-- #second-mortgage-interest_rate_step -->
            <div id="seventh_step">

<div class="previous-seventh-home"><a href="#" class="previous-seventh-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>




<div id="seventh_step_home"> 

                <div class="form">
               



 <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td colspan="3"><label>Do you have a real estate agent?</label></td>
</tr>

    
<tr>

<td width="65" align="left"><input type="radio" name="AGENT_FOUND" value="yes" id="AGENT_YES"><span class="radio-label">Yes</span></td>
<td width="135" colspan="2" align="left"><input type="radio" name="AGENT_FOUND" value="no" id="AGENT_NO" checked="checked" />
  <span class="radio-label">No</span></td>
 </tr>  
</table> 





                    
                    
                 
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_seventh" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_seventh" id="submit_seventh" value="" />             
            </div>     
   </div>            
         
     
 <?php //} ?>
 
 
 
 
 
 <!-- #Agent Name -->
            <div id="agent_info">

<div class="previous-seventh-home"><a href="#" class="previous-seventh-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>



<div id="agent_info_home"> 

                <div class="form">
               



 <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td colspan="3"><label>Agent name</label></td>
</tr>

    
<tr>
<td>                
                
<input type="text" name="AGENT_NAME" id="AGENT_NAME" value=""/>
  </td>
</tr> 


<tr>

<td colspan="3"><label>Agent phone</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="AGENT_PHONE" id="AGENT_PHONE" value=""/>
  </td>
</tr> 


<tr>

<td colspan="3"><label>Agent company</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="AGENT_COMPANY" id="AGENT_COMPANY" value=""/>
  </td>
</tr> 



</table> 

      
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="agent_info_btn" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="agent_info_btn" id="agent_info_btn" value="" />             
            </div>     
   </div>     
   
   
   


 
 
 <!-- #second-mortgage-interest_rate_step -->
            <div id="down_payment_step">

<div class="previous-seventh-home"><a href="#" class="previous-seventh-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>




<div id="down_payment"> 

                <div class="form">
               



 <table cellpadding="0" cellspacing="0" border="1">


<tr>

<td><label>Down payment amount</label></td>
</tr>

    
<tr>

<td>

			<select name="EST_VAL"  class="FormInput">

                <option value="77500">75,000 - 80,000</option>

                <option value="82500">80,001 - 85,000</option>

                <option value="87500">85,001 - 90,000</option>

                <option value="92500">90,001 - 95,000</option>

                <option value="97500">95,001 - 100,000</option>

                <option value="102500">100,001 - 105,000</option>

                <option value="107500">105,001 - 110,000</option>

                <option value="112500">110,001 - 115,000</option>

                <option value="117500">115,001 - 120,000</option>

                <option value="122500">120,001 - 125,000</option>

                <option value="127500">125,001 - 130,000</option>

                <option value="132500">130,001 - 135,000</option>

                <option value="137500">135,001 - 140,000</option>

                <option value="142500">140,001 - 145,000</option>

                <option value="147500">145,001 - 150,000</option>

                <option value="152500">150,001 - 155,000</option>

                <option value="157500">155,001 - 160,000</option>

                <option value="162500">160,001 - 165,000</option>

                <option value="167500">165,001 - 170,000</option>

                <option value="172500">170,001 - 175,000</option>

                <option value="177500">175,001 - 180,000</option>

                <option value="182500">180,001 - 185,000</option>

                <option value="187500">185,001 - 190,000</option>

                <option value="192500">190,001 - 195,000</option>

                <option value="197500">195,001 - 200,000</option>

                <option value="205000">200,001 - 210,000</option>

                <option value="215000">210,001 - 220,000</option>

                <option value="225000">220,001 - 230,000</option>

                <option value="235000">230,001 - 240,000</option>

                <option value="245000">240,001 - 250,000</option>

                <option value="255000">250,001 - 260,000</option>

                <option value="265000">260,001 - 270,000</option>

                <option value="275000">270,001 - 280,000</option>

                <option value="285000">280,001 - 290,000</option>

                <option value="295000">290,001 - 300,000</option>

                <option value="305000">300,001 - 310,000</option>

                <option value="315000">310,001 - 320,000</option>

                <option value="325000">320,001 - 330,000</option>

                <option value="335000">330,001 - 340,000</option>

                <option value="345000">340,001 - 350,000</option>

                <option value="355000">350,001 - 360,000</option>

                <option value="365000">360,001 - 370,000</option>

                <option value="375000">370,001 - 380,000</option>

                <option value="385000">380,001 - 390,000</option>

                <option value="395000">390,001 - 400,000</option>

                <option value="410000">400,001 - 420,000</option>

                <option value="430000">420,001 - 440,000</option>

                <option value="450000">440,001 - 460,000</option>

                <option value="470000">460,001 - 480,000</option>

                <option value="490000">480,001 - 500,000</option>

                <option value="510000">500,001 - 520,000</option>

                <option value="530000">520,001 - 540,000</option>

                <option value="550000">540,001 - 560,000</option>

                <option value="570000">560,001 - 580,000</option>

                <option value="590000">580,001 - 600,000</option>

                <option value="610000">600,001 - 620,000</option>

                <option value="630000">620,001 - 640,000</option>

                <option value="650000">640,001 - 660,000</option>

                <option value="670000">660,001 - 680,000</option>

                <option value="690000">680,001 - 700,000</option>

                <option value="710000">700,001 - 720,000</option>

                <option value="730000">720,001 - 740,000</option>

                <option value="750000">740,001 - 760,000</option>

                <option value="770000">760,001 - 780,000</option>

                <option value="790000">780,001 - 800,000</option>

                <option value="810000">800,001 - 820,000</option>

                <option value="830000">820,001 - 840,000</option>

                <option value="850000">840,001 - 860,000</option>

                <option value="870000">860,001 - 880,000</option>

                <option value="890000">880,001 - 900,000</option>

                <option value="910000">900,001 - 920,000</option>

                <option value="930000">920,001 - 940,000</option>

                <option value="950000">940,001 - 960,000</option>

                <option value="970000">960,001 - 980,000</option>

                <option value="990000">980,001 - 1,000,000</option>

                <option value="1000001">Over 1,000,000</option>
                
                </select>


</td>

 </tr>  
</table> 





                    
                    
                 
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="down_payment_btn" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="down_payment_btn" id="down_payment_btn" value="" />             
            </div>     
   </div>            
     
     
     
<?php //if($_GET['step'] == "8") { ?>      
     
       <!-- #eight_step -->
            <div id="eight_step">
 

<div class="previous-eight-home"><a href="#" class="previous-eight_step_home"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>

               


<div id="eight_step_home"> 

                <div class="form">
               
                    
                    
<table cellpadding="0" cellspacing="0" border="1">


<tr>
<td><label>Have you ever declared bankruptcy?</label></td>
</tr>


<tr>


<td><select name="BKCY" class="FormInput" id="select2">

				<option value="" selected>Select One</option>

            	<option value="no">No/Not in Past 7 Years</option>

            	<option value="years5_7">5 &ndash; 7 Years Ago</option>

            	<option value="years2_5">2 &ndash; 5 Years Ago</option>

            	<option value="years1_2">1 &ndash; 2 Years Ago</option>

            	<option value="less_1yr">Less Than 12 Months Ago</option>

            </select></td>

</tr>   


       
 
</table>                


 
     
     






     
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_eight" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_eight" id="submit_eight" value="" />             
            </div>    
     
     </div>
     
  <?php //} ?>     




<?php //if($_GET['step'] == "9") { ?>      
     
   

      
  <!-- #ninth_step -->
            <div id="ninth_step">


<div class="previous-ninth-home"><a href="#" class="previous-ninth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>




<div id="ninth_step_personal"> 


                <div class="form">
               



<table cellpadding="0" cellspacing="0" border="1">


<tr>
<td><label>First Name</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="FNAME" id="FNAME" value=""/>
  </td>
</tr> 



<tr>
<td><label>Lastname</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="LNAME" id="LNAME" value=""/>
  </td>
</tr> 
 
</table>                




                    
                    
                    
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_ninth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_ninth" id="submit_ninth" value="" />             
            </div>  
            
  </div>          
  
  
  <?php //} ?>  
            
            
            
            
  
  
 
   <!-- #tenth_step -->
            <div id="tenth_step">
               

<div class="previous-tenth-home"><a href="#" class="previous-tenth-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>




<div id="tenth_step_personal"> 

                <div class="form">
               


<table cellpadding="0" cellspacing="0" border="1">


<tr>
<td><label>Street Address</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="ADDRESS" id="ADDRESS" value=""/>
  </td>
</tr> 



<tr>
<td><label>City</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="CITY" id="CITY" value=""/>
  </td>
</tr> 
 
</table>                




                    
                    
                                  
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_tenth" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_tenth" id="submit_tenth_home" value="" />             
            </div>                             
            
     </div>    
     
     
     
     
     



<!-- #eleventh_step -->
            <div id="eleventh_step">
               

<div class="previous-eleventh-home"><a href="#" class="previous-eleventh-step"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>







<div id="eleventh_step_home"> 

                <div class="form">
               



<table cellpadding="0" cellspacing="0" border="1">




    

<tr>
<td><label>State</label></td>
</tr>

<tr>
<td>                
                

<select name="STATE" class="FormInput">

                <option value="" selected>Select one</option>

                <option value="AL"> Alabama</option>

                <option value="AK"> Alaska</option>

                <option value="AZ"> Arizona</option>

                <option value="AR"> Arkansas</option>

                <option value="CA"> California</option>

                <option value="CO"> Colorado</option>

                <option value="CT"> Connecticut</option>

                <option value="DE"> Delaware</option>

                <option value="DC"> District of Columbia</option>

                <option value="FL"> Florida</option>

                <option value="GA"> Georgia</option>

                <option value="HI"> Hawaii</option>

                <option value="IA"> Iowa</option>

                <option value="ID"> Idaho</option>

                <option value="IL"> Illinois</option>

                <option value="IN"> Indiana</option>

                <option value="KS"> Kansas</option>

                <option value="KY"> Kentucky</option>

                <option value="LA"> Louisiana</option>

                <option value="ME"> Maine</option>

                <option value="MD"> Maryland</option>

                <option value="MA"> Massachusetts</option>

                <option value="MI"> Michigan</option>

                <option value="MN"> Minnesota</option>

                <option value="MO"> Missouri</option>

                <option value="MS"> Mississippi</option>

                <option value="MT"> Montana</option>

                <option value="NE"> Nebraska</option>

                <option value="NV"> Nevada</option>

                <option value="NH"> New Hampshire</option>

                <option value="NJ"> New Jersey</option>

                <option value="NM"> New Mexico</option>

                <option value="NY"> New York</option>

                <option value="NC"> North Carolina</option>

                <option value="ND"> North Dakota</option>

                <option value="OH"> Ohio</option>

                <option value="OK"> Oklahoma</option>

                <option value="OR"> Oregon</option>

                <option value="PA"> Pennsylvania</option>

                <option value="RI"> Rhode Island</option>

                <option value="SC"> South Carolina</option>

                <option value="SD"> South Dakota</option>

                <option value="TN"> Tennessee</option>

                <option value="TX"> Texas</option>

                <option value="UT"> Utah</option>

                <option value="VT"> Vermont</option>

                <option value="VA"> Virginia</option>

                <option value="WA"> Washington</option>

                <option value="WV"> West Virginia</option>

                <option value="WI"> Wisconsin</option>

                <option value="WY"> Wyoming</option>

              </select>




  </td>
</tr> 



<tr>
<td><label>Zip</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="ZIP" id="ZIP" value=""/>
  </td>
</tr> 
 
</table>




                    
                    
                                  
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_eleventh" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_eleventh" id="submit_eleventh_home" value="" />             
            </div>                             
            
     </div>         
     
     
     


<!-- #twelth_step -->
            <div id="twelth_step">
               

<div class="previous-twelth-home"><a href="#" class="previous-twelth-step-home"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>




<div id="twelth_step_home"> 

                <div class="form">
               



<table cellpadding="0" cellspacing="0" border="1">




    

<tr>
<td><label>Email</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="EMAIL" id="EMAIL" value=""/>
  </td>
</tr> 



<tr>
<td><label>Phone</label></td>
</tr>

<tr>
<td>                
                
<input type="text" name="PRI_PHON" id="PRI_PHON" value=""/>
  </td>
</tr> 
 
</table>



                    
                    
          
                    
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
               <input class="submit_twelth_home" type="image" src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/continue-steps-desktop.png" name="submit_twelth" id="submit_twelth_home" value="" />             
            </div>                             
            
     </div>                     
     
     
     
 
 
 



   <!-- #last_step -->
            <div id="last_step_home">
               


<div class="previous-last_step_home"><a href="#" class="previous-last_step_home_btn"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/previous-arrow.png"/></a></div>




<div id="thirteen_step_home"> 

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
<strong>Disclaimer for Home Loans:</strong> Lorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque. Quam euismod sem, semper ut potenti pellentesque quisque. In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel. Quam euismod sem, semper ut potenti pellentesque quisque. 
In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel.
</div>

<div class="bbb-secured-desktop"><img src="<?php echo site_url(); ?>/wp-content/themes/responsive/core/images/bbb-secured-desktop.gif"/></div>
   
      
</div><!-- end of #content -->

<?php get_footer(); ?>

