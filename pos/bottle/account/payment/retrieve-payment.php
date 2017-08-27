<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.customer.php';



$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../login');
}

$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row_customer = $stmt->fetch(PDO::FETCH_ASSOC);



if($row_customer['account_id'] != '' && $row_customer['bank_account'] != '') {  


?>



<div id="the-container">

 <h3>Transactions</h3>





<div id="result"></div>

<script>
$(document).ready(function() {


$("#pay-in-cash").click(function (e) { //user clicks on button

e.preventDefault();

var proceed = true;


if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'userid'     : $('input[name=userid]').val()

            };


 //Ajax post data to server
            $.post('save-cash-only.php', post_data, function(response){  
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    //$("#result").slideUp();
                }
               $("#result").hide().html(output).slideDown();
            }, 'json');
        }
    });



});
    
   


</script>






  <?php }  ?>


  


</div>




      
          




