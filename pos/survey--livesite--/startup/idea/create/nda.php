<?php
require_once '../../../config.php';
session_start();
$session_id='1'; //$session id


$profileimage = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$rowimage = mysql_fetch_array($profileimage);

?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>

  <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?php echo BASE_PATH; ?>/css/font-awesome.css" rel="stylesheet" media="screen">




<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css"> 


<script type="text/javascript">
    $(document).ready(function() {
    $('#myModal').modal('show');

});
</script>






</head>
    
    <body>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Image</h4>
      </div>
      <div class="modal-body">
        <p>
          
          

<div ng-include="'agreements/edit/_' + view + '.html'" class=""><div id="edit" class="edit" ng-controller="EditController">
  <!-- ngInclude: 'edit.html' --><div ng-include="'edit.html'" class=""><!-- ngInclude: 'subnav.html' --><div class="subnav" ng-include="'subnav.html'" ng-controller="SubnavController"><!-- ngIf: displaySubnav -->
</div>
<h1>Non-Disclosure Agreement</h1>
<div class="edit-terms" contenteditable="true"><p><span contenteditable="false"><input type="text" name="names[party_1]" data-question="What are the names of the parties entering into this NDA? (e.g. 'John Smith,' 'Acme, Inc.')" data-help="If the signer is an individual, enter their full name. If a person is signing on behalf of a company, enter the company's full legal name." placeholder="Party 1" value="Franz Peter"></span> and <span contenteditable="false"><input type="text" name="names[party_2]" placeholder="Party 2" value="Alper D"></span> are the parties to this agreement. They expect to disclose confidential information to each other for the following purpose:</p>

<textarea name="purpose" data-question="What is the reason that confidential information is being shared?" data-help="Examples include 'to discuss a potential partnership' or 'to discuss a potential transaction.'" placeholder="Purpose of disclosure"></textarea>

<p>The parties are only allowed to use the confidential information for the above purpose.</p>
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


<canvas id="signature" width="250" height="150" style="border: 1px solid #ddd;"></canvas>
<br>
<button id="clear-signature">Clear</button>
<button class="post-button">Submit</button>





        </p>
      </div>
      <div class="modal-footer">
        <div class="photo-buttons">
        <button type="button" class="btn btn-cancel-photo" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-save-photo" disabled>Save</button>
       </div>
      </div>
    </div>

  </div>
</div>



<script src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<script>
jQuery(document).ready(function($){
    
    var canvas = document.getElementById("signature");
    var signaturePad = new SignaturePad(canvas);
    
    $('#clear-signature').on('click', function(){
        signaturePad.clear();
    });
    
    $('.post-button').on('click', function(){
        var dataURI = signaturePad.toDataURL("image/jpg")
        
        $.ajax({
            method: "POST",
            url: "signatures/process.php",
            data: { signature: dataURI }
        })
        .success(function( response ) {
            $('body').append(response);
        });
        
    });
    
});
</script>


    


  </body>

</html>

