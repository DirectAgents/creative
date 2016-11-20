<?php
session_start();
require_once '../../../../base_path.php';


require_once '../../../../class.participant.php';
require_once '../../../../class.researcher.php';
require_once '../../../../config.php';
require_once '../../../../config.inc.php';


$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../../login');
}

if(!isset($_GET['id'])){header("Location:../../../../404.php");}



$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$sqlnda = mysqli_query($connecDB,"SELECT * FROM tbl_nda WHERE researcherID='".$_SESSION['researcherSession']."' AND ProjectID = '".$_GET['id']."' ");
$rowsqlnda = mysqli_fetch_array($sqlnda);


?>



<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../../header.php"); ?>

 

<script>
jQuery(document).ready(function($){
    
    var canvas = document.getElementById("signature");
    var signaturePad = new SignaturePad(canvas);
    
    $('#clear-signature').on('click', function(){
        signaturePad.clear();
    });
 
$("#save-nda").click(function(){

        var proceed = true;
        
        var projectid  = $('input[name=projectid').val();
        var disclosure_party  = $('input[name=disclosure_party').val();
        var researcher_sig_name  = $('input[name=researcher_sig_name').val();
        var researcher_sig_title  = $('input[name=researcher_sig_title').val();
        var researcher_sig_company  = $('input[name=researcher_sig_company').val();
        var researcher_sig_date  = $('input[name=researcher_sig_date').val();

        var dataURI = signaturePad.toDataURL("image/jpg")

         if(researcher_sig_date == ''){ 
             $("#researcher_sig_date").css('border-color','red'); //change border color to red 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a date! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }


         if(researcher_sig_name == ''){ 
             $("#researcher_sig_name").css('border-color','red'); //change border color to red 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter your Full Name! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

        if(disclosure_party == ''){ 
             $("#disclosure_party").css('border-color','red'); //change border color to red 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter your name as the Disclosure Party! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }


       if(proceed) //everything looks good! proceed...
        {  
        $.ajax({
            method: "POST",
            url: "signatures/process.php",
            data: { signature: dataURI, projectid: projectid, disclosure_party: disclosure_party, researcher_sig_name: researcher_sig_name,
            researcher_sig_title: researcher_sig_title, researcher_sig_company: researcher_sig_company, researcher_sig_date: researcher_sig_date  }
        })
        .success(function( response ) {
            output = '<div class="success">Successfully Saved!</div>';
            $("#result").hide().html(output).slideDown();
        });
        }
  });  

});
</script>      


    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">
   


<?php include("../../../../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->



 <div class="clearer"></div>


<!-- Main -->

   <div class="container">


<div class="row-fluid">
  <div class="span12">


 
      
      <div id="dashboardSurveyTargetingContainerLogic">



<div id="white-container">
 <div class="therow">
    <div class="col-lg-12">


<div ng-include="'agreements/edit/_' + view + '.html'" class=""><div id="edit" class="edit" ng-controller="EditController">
  <!-- ngInclude: 'edit.html' --><div ng-include="'edit.html'" class=""><!-- ngInclude: 'subnav.html' --><div class="subnav" ng-include="'subnav.html'" ng-controller="SubnavController"><!-- ngIf: displaySubnav -->
</div>
<h1>Non-Disclosure Agreement</h1>
<div class="edit-terms" contenteditable="true"><p><span contenteditable="false"><input type="text" name="disclosure_party" id="disclosure_party"  placeholder="Disclosure Party" value="Franz Peter"></span> and <span contenteditable="false"><input type="text" name="recipient_party" placeholder="Recipient Party" disabled></span> are the parties to this agreement. They expect to disclose confidential information to each other for the following purpose:</p><br>
<textarea name="purpose" data-question="What is the reason that confidential information is being shared?" data-help="Examples include 'to discuss a potential partnership' or 'to discuss a potential transaction.'" placeholder="Purpose of disclosure"></textarea>
The parties are only allowed to use the confidential information for the above purpose.
<p>Confidential information is information that either party has developed or obtained and has taken reasonable steps to protect from disclosure. Confidential information is NOT information that </p>
<ul class="no-bullets">
  <li>(a) the recipient of the confidential information already knew through proper means;</li>
  <li>(b) is publicly available through no fault of the recipient;</li>
  <li>(c) the recipient rightfully received or will receive from a third party with no confidentiality duty; or</li>
  <li>(d) the recipient develops independently.</li>
</ul>
<p>Both parties must use a reasonable degree of care to protect any confidential information they receive from each other. They must protect this information from unauthorized use or disclosure. They are not allowed to share this information with anyone except their employees, agents, directors or third party contractors who need to know it for the purposes of this agreement and who have agreed in writing to keep the information confidential.</p>
<p>If compelled by law or court order, either party may disclose the confidential information if it provides reasonable prior notice to the other, unless a court forbids such notice.</p>
<p>This agreement applies to information disclosed within 1 year of its signing. Each party must continue to protect the confidentiality of information disclosed during this time frame for an additional 1 year after its disclosure. This agreement does not limit the duration of an obligation to protect a trade secret.</p>
<p>The parties are under no obligation to do business together. Neither party becomes a customer, contractor, partner or agent of the other because of this agreement. Neither party acquires any intellectual property right or license under this agreement.</p>
<p>This agreement is between the two parties named above. Neither party may delegate, transfer or assign this agreement to a third party without the written consent of the other.</p>
<p>Failure to enforce any provision within this agreement does not waive that provision.</p>
<p>This is the parties' entire agreement on this matter, superseding all previous negotiations or agreements. It can only be changed by mutual written consent.</p>
<p>The laws of the state of <span contenteditable="false"><input type="text" name="state" data-question="Where are you based? (e.g., Virginia, Delaware)" data-help="This response will determine which jurisdiction's law governs the contract." value=""></span> govern this agreement and any disputes arising from it will be handled exclusively in courts in that state. The prevailing party in any dispute will be entitled to recover reasonable costs and attorneys' fees.</p>
<p>Signing a copy of this agreement, physical or electronic, will have the same effect as signing an original.</p></div>
</div>
</div>
</div>

<p>&nbsp</p>

<div style="float:left; width:100%"><label>Signature*:</label></div>
<canvas id="signature" name="signature" width="250" height="150" style="border: 1px solid #ddd;"></canvas>
<br>
<button id="clear-signature">Clear</button>


<p><div class="col-lg-12" style="padding-left:0px">
<div class="col-lg-2"><img src="<?php echo BASE_PATH; ?>/researcher/project/edit/nda/signatures/<?php echo $rowsqlnda['researcher_signature']; ?>"/>
</div></div></p>


<p><div class="col-lg-12" style="padding-left:0px"><div class="col-sm-2" style="padding-left:0px"><label>Full Name*:</label></div>
<div class="col-lg-2"><input type="text" style="width:250px" name="researcher_sig_name" id="researcher_sig_name" placeholder="Your Full Name" value="<?php echo $rowsqlnda['researcher_sig_name']; ?>" />
</div></div></p>

<br>
<p><div class="col-lg-12" style="padding-left:0px"><div class="col-lg-2" style="padding-left:0px"><label>Title:</label></div>
<div class="col-lg-2"><input type="text" style="width:250px" name="researcher_sig_title" id="researcher_sig_title" placeholder="Your Title (optional)" /></div></div></p>

<br>
<p><div class="col-lg-12" style="padding-left:0px"><div class="col-lg-2" style="padding-left:0px"><label>Company:</label></div>
<div class="col-lg-4"><input type="text" style="width:250px" name="researcher_sig_company" id="researcher_sig_company" placeholder="Your Company Name (optional)" /></div></div></p>

<br>
<p><div class="col-lg-12" style="padding-left:0px"><div class="col-lg-2" style="padding-left:0px"><label>Date*:</label></div>
<div class="col-lg-2"><input type="text" style="width:250px" name="researcher_sig_date" id="researcher_sig_date" placeholder="Today's Date" value="<?php echo $rowsqlnda['researcher_sig_date']; ?>" /></div></div></p>

<p>&nbsp;</p>



<input type="hidden" style="width:250px" name="projectid" id="projectid" value="<?php echo $_GET['id']; ?>" />

<div class="col-lg-12" style="padding-left:0px">
 <div id="save-nda">
            
        <input type="submit" value="Save Non-Disclosure Agreement"/>

            </div>
</div>

<p>&nbsp;</p>

<div class="col-lg-12" style="padding-left:0px">
             <div id="result"></div>
</div>

  </div>
 </div> 
</div>












<div class="clearer"></div>

       
        





     

          
      </div>

    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

       </div>
  <?php include("../../../../footer.php"); ?>
  </div>

    </div>

    <div class="clearer"></div>

 

  </div>





        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>