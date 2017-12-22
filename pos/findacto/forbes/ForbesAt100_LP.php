<?php

    session_start();

    $_SESSION['random'] = rand(5, 10000);
    $random = $_SESSION['random'];

    /*if(isset($_SESSION['random'])) {
    //$_SESSION['random'] = $_SESSION['random'];
    $random = $_SESSION['random'];
    //echo $random; 
    }else{
    $_SESSION['random'] = rand(5, 10000);
    $random = $_SESSION['random'];
    //echo $random;
    }*/

?>


<!DOCTYPE html>
<html lang="en">
  <head> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <link rel="stylesheet" href="responsive_general.css" type="text/css" />
    
    <script src="./Forbes Magazine_files/init1.js" type="text/javascript"></script>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script>


$(document).ready(function() {


$("#submit").click(function(e){
  e.preventDefault();
   //alert("adsf");

      var myData = 'firstname='+ $("#firstname").val() +'&lastname=' + $("#lastname").val() +'&email=' + $("#email").val() +'&address=' + $("#address").val() +'&address2=' + $("#address2").val() +'&city=' + $("#city").val() +'&state=' + $("#state").val() +'&zip=' + $("#zip").val() +'&country=' + $("#country").val() +'&copies=' + $("#copies").val() +'&pay_type=' + $("#pay_type").val() +'&credit_number=' + $("#credit_number").val() +'&exp_month=' + $("#exp_month").val() +'&exp_yr=' + $("#exp_yr").val() +'&random=' + $("#random").val(); 
     
     //alert(DbNumberID);

      jQuery.ajax({
      type: "POST", 
      url: "ajax.php", 
      dataType:"html", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });



    });

});



</script>   





<!-- custom css for radio buttons to show -->
      
    <style>
        input[type=radio] + label:before,
        input[type=checkbox] + label:before{
            height:7px;
            width:7px;
            margin-right: 5px;
            content: " ";
            display:inline-block;
            vertical-align: baseline;
            border:1px solid #777;
        }
        
        input[type=radio]:checked + label:before,
        input[type=checkbox]:checked + label:before{
            background:#404040;
        }
        /* CUSTOM RADIO AND CHECKBOX STYLES */
        input[type=radio] + label:before{
            border-radius:50%;
        }
        
        input[type=checkbox] + label:before{
            border-radius:2px;
        }
      
    </style>
    <title>Forbes@100</title>
</head>
  <body bgcolor="#ffffff" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" onLoad="initialize()">
    
    <!-- Start Subscription form-->
    
    <form class="forbes-form-blue" style="background-color:#FFFFFF; max-width:640px;min-width:150px" action="" method="POST" name="subform">

      <input class="large" id="random" name="random" type="hidden" style="padding-left:15px;" VALUE="<?php echo $random; ?>">
     
      <img src="forbes_100book_lp_header-employee.png" alt="Forbes@100 - $49.99!" width="100%">
      <div id="message" class="error_message" style="color:#FF0000" align="left">
        </div>
          <div>
            <p style="font-family:Arial; font-size:25px; font-weight: bold;" align="center">Send my copy of Forbes@100 to:</p>
            <p><label>First Name:</label>
              <input class="large" id="firstname" name="firstname" placeholder="First Name" type="text" style="padding-left:15px;" VALUE="Benny">
              <label>Last Name:</label>
              <input class="large" id="lastname" name="lastname" placeholder="Last Name" type="text" style="padding-left:15px;" VALUE="Johnson">
              <label>Email:</label>
              <input class="large" id="email" name="email" placeholder="Email" type="email" style="padding-left:15px;" VALUE="test@test.com">
              <label>Address 1:</label>
              <input class="large" id="address" name="address" placeholder="Address 1" type="text" style="padding-left:15px;" VALUE="14 Main Street">
              <label>Address 2:</label>
              <input class="large" id="address2" name="address2" placeholder="Address 2" type="text" style="padding-left:15px;" VALUE="">
              <label>City:</label>
              <input class="large" id="city" name="city" placeholder="City" type="text" style="padding-left:15px;" VALUE="Pecan Springs">
              <label>State:</label>
              <select name="state" id="state" size="1" class="dropdown" style="padding-left:5px;">
                <option value=""></option>
                <option value="AL"  SELECTED> Alabama</option>
                <option value="AK"  > Alaska</option>
                <option value="AZ"  > Arizona</option>
                <option value="AR"  > Arkansas</option>
                <option value="CA"  > California</option>
                <option value="CO"  > Colorado</option>
                <option value="CT"  > Connecticut</option>
                <option value="DE"  > Delaware</option>
                <option value="DC"  > District of Columbia</option>
                <option value="FL"  > Florida</option>
                <option value="GA"  > Georgia</option>
                <option value="HI"  > Hawaii</option>
                <option value="ID"  > Idaho</option>
                <option value="IL"  > Illinois</option>
                <option value="IN"  > Indiana</option>
                <option value="IA"  > Iowa</option>
                <option value="KS"  > Kansas</option>
                <option value="KY"  > Kentucky</option>
                <option value="LA"  > Louisiana</option>
                <option value="ME"  > Maine</option>
                <option value="MD"  > Maryland</option>
                <option value="MA"  > Massachusetts</option>
                <option value="MI"  > Michigan</option>
                <option value="FM"  > Micronesia</option>
                <option value="MN"  > Minnesota</option>
                <option value="MS"  > Mississippi</option>
                <option value="MO"  > Missouri</option>
                <option value="MT"  > Montana</option>
                <option value="NE"  > Nebraska</option>
                <option value="NV"  > Nevada</option>
                <option value="NJ"  > New Jersey</option>
                <option value="NM"  > New Mexico</option>
                <option value="NY"  > New York</option>
                <option value="NC"  > North Carolina</option>
                <option value="ND"  > North Dakota</option>
                <option value="OH"  > Ohio</option>
                <option value="OK"  > Oklahoma</option>
                <option value="ON"  > Ontario</option>
                <option value="OR"  > Oregon</option>
                <option value="PA"  > Pennsylvania</option>
                <option value="RI"  > Rhode Island</option>
                <option value="SC"  > South Carolina</option>
                <option value="SD"  > South Dakota</option>
                <option value="TN"  > Tennessee</option>
                <option value="TX"  > Texas</option>
                <option value="UT"  > Utah</option>
                <option value="VT"  > Vermont</option>
                <option value="VA"  > Virginia</option>
                <option value="WA"  > Washington</option>
                <option value="WV"  > West Virginia</option>
                <option value="WI"  > Wisconsin</option>
                <option value="WY"  > Wyoming</option>
              </select>
              <label>Zip Code:</label>
              <input name="zip" class="large" id="zip" placeholder="Zip Code" type="text" value="44628" style="padding-left:15px;">
              <label>Country:</label>
              <select name="country" id="country" size="1" class="dropdown" style="padding-left:15px;">
                <option value="United States" selected="selected" >United States</option>
                
              </select>

                <label>Number of copies:</label>
                <select name="copies" id="copies" size="1" class="required" style="padding-left:15px;">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  </select>
              
          
              <!-- Credit Card Information -->
              
              <p style="font-family:Arial; font-size:25px; font-weight: bold; line-height: 20px;" align="center">I'd like to Pay by:
              </p>
              <p style="font-family:Arial; font-size:15px; line-height: 15px;" align="center">($49.99+ $5 shipping &amp; handling):
              </p>
              <p style="font-size: 14px;"><label>Payment Type:</label>
                <select name="pay_type" size="1" id="pay_type" class="required" style="padding-left:15px;">
                  <option></option>
                  <option value="Visa" selected="selected">Visa</option>
                  <option value="MasterCard">MasterCard</option>
                  <option value="American Express">American Express</option>
                  <option value="Discover">Discover</option>
                  
                </select>
                <label>Card Number #:</label>
                <input name="credit_number" id="credit_number" class="large" autocomplete="off" placeholder="Credit Card No." type="text" value="4111111111111111" style="padding-left:15px;">
                <label>Exp. Month:</label>
                <select name="exp_month" id="exp_month" size="0" class="required" style="padding-left:15px;">
                  <option value=""></option>
                  <option value="01" SELECTED>01 - January</option>
                  <option value="02" >02 - February</option>
                  <option value="03" >03 - March</option>
                  <option value="04" >04 - April</option>
                  <option value="05" >05 - May</option>
                  <option value="06" >06 - June</option>
                  <option value="07" >07 - July</option>
                  <option value="08" >08 - August</option>
                  <option value="09" >09 - September</option>
                  <option value="10" >10 - October</option>
                  <option value="11" >11 - November</option>
                  <option value="12" >12 - December</option>
                </select>
                <label>Exp. Year:</label>
                <select name="exp_yr" id="exp_yr" size="1" class="required" style="padding-left:15px;">
                  <option value="">Select</option>
                  <option value="2017">2007</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028" SELECTED>2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  
                  </select>


                    
                    <!-- End Credit Card Information -->
                    
              
                    
                    
                    <center><input name="send" type="submit" id="submit" class="large" value="Submit Order" style="background-color:#e9bf24; border-radius:15px;color:#ffffff;display:inline-block; font- font-family: Arial, Helvetica, sans-serif; font-size:24px;font-weight:200;line-height:1.5em;text-align:center; -webkit-text-size-adjust:none; width:70%; height:50px;"></center>
                  </p>
                  </fieldset>
                  </div>

                  <div id="responds"></div>
<!-- Stop Forbes Subscription form-->
                    
                    
                    <div id="footer" style="text-align:left; font-family:Arial, Helvetica, sans-serif; color: #515150;font-size: 11px; padding: 20px 30px 0px 22px; ">
                      
                       <center><br><br>
                         Forbes<br><br>499 Washington Blvd. Jersey City, NJ 07310<br><br>
                         *Final Sale - No returns or refunds
                       </center>
                       
                      </div><br>
                  </form>



<script src='https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js'></script>

<script >// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='subform']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: "required",
      lastname: "required",
      lastname: "required",
      address: "required",
      city: "required",
      state: "required",
      zip: "required",
      pay_type: "required",
      credit_number: "required",
      exp_month: "required",
      exp_yr: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
   /* messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },*/
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
//# sourceURL=pen.js
</script>




                  </body>
                  </html>
