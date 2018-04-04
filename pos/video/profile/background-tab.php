<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


 if($_GET){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);

$skills = explode(', ', $row['Skills']);


$words = explode(" ", $row['Fullname']);
$firstname = $words[0];

 ?>
   

  
    

   

    <!--User Logged in Starts-->
<?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row['userID']) { ?>

    <input type="hidden" name="userid" id="userid" value="<?php echo $_GET['userid']; ?>"/>
   
    
<!--About Start-->
  <div class="col-sm-12" style="padding-left: 0px;">   
     <div class="col-sm-5"><strong>Brief description about yourself</strong><br><br></div>
     <div class="col-sm-3"><a href="#/" id="edit-about"><i class="ti-pencil"></i></a></div>
  </div>   
   <div class="col-sm-12"> 
   	 <div class="show-about"><?php if($row['About'] != ''){ ?><?php echo $row['About']; ?><?php } ?></div>
	 <textarea class="about-textarea <?php if($row['About'] != ''){ ?> hidden <?php } ?>" id="about-textarea" placeholder="Tell a little about yourself"><?php echo $row['About']; ?></textarea>
	 <div class="error-about"></div>
   </div>
   <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-about <?php if($row['About'] != ''){ ?> hidden <?php } ?>" tabindex="11" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-about <?php if($row['About'] != ''){ ?> hidden <?php } ?>" tabindex="12">Cancel</button>
                                    </div>
                                </div>
   <p>&nbsp;</p>
<!--About End-->    

<!--Skills Start-->
    <div class="col-sm-12" style="padding-left: 0px;"> 
        <div class="col-sm-3"><strong>Skills</strong></div>
        <!--<div class="col-sm-3"><a href="#/" id="edit-skills"><i class="ti-pencil"></i></a></div>-->
        <br><br>
    </div>
   


<div class="col-md-9" style="padding-bottom:20px;">
  <select data-placeholder="Select your skills..." id="fm_skills" name="fm_skills" class="form-control form-control-line chosen-select" multiple>

<?php 

$sql_skills = mysqli_query($connecDB,"SELECT * FROM skills ORDER BY id ASC");  
while($row_skills = mysqli_fetch_array($sql_skills)){

?>
                <option value="<?php echo $row_skills['skill'];?>" <?php if (in_array($row_skills['skill'],$skills)){ echo "selected"; } ?>>
                    <?php echo $row_skills['skill'];?></option>
              
       
<?php } ?>


 </select>


  </div>

 




 <div class="col-sm-12">

                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-skills hidden" tabindex="11" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-skills hidden" tabindex="12">Cancel</button>
                                        <br><br>
                                    </div>
                                </div>                                                

  



   <!--Skills End--> 

  



<!--Social Starts-->

 <div class="col-sm-12" style="padding-left: 0px;"> 
        <div class="col-sm-3"><strong>Social</strong></div>
        <br><br>
    </div>

    <div class="form-group">
                                                <div class="col-md-4">
                                                    <div class="form-group" style="padding-left:0px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook" name="fm_facebook" value="<?php echo $row['Facebook'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" style="padding-left:0px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter" name="fm_twitter" value="<?php echo $row['Twitter'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" style="padding-left:0px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Linkedin</label>
                                                        <input type="text" id="fm_linkedin" name="fm_linkedin" value="<?php echo $row['Linkedin'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                            </div>

<!--Social Edns-->



<!--Resume Starts--> 

 <div class="col-sm-12" style="padding-left: 0px;"> 
        <div class="col-sm-3"><strong>Resume</strong></div>
        <?php if($row['Resume'] != ''){ ?><div class="col-sm-3"><a href="#/" id="edit-resume"><i class="ti-pencil"></i></a></div><?php } ?>
        <br><br>
    </div>

   <?php if($row['Resume'] != ''){ ?>



<div class="col-sm-12 view-resume-box"> 
    <a href="http://res.cloudinary.com/dgml9ji66/image/upload/v1519605264/<?php echo $row['Resume']; ?>.pdf" target="_blank">
View Resume
</a>
</div>

<div class="edit-resume-box hidden">

<div class="form-group">
                                            <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_resume">Upload Resume</a>
                                                           <br>
                                                            <br>
                                                            (Note.: only .pdf file is allowed)
                                                            <br>
                                                            <br>
                                                            <ul id="preview_resume"></ul>
                                                            <div id="url_preview_resume"><input type="checkbox" style="display:none" name="resume[]" value="" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                            

                                                </div>
                                           </div>





                <div class="col-sm-12">
<br>
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-resume hidden" tabindex="11" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-resume hidden" tabindex="12">Cancel</button>
                                    </div>                              



</div>





    <?php }else{ ?>


   <div class="form-group">
                                            <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_resume">Upload Resume</a>
                                                           <br>
                                                            <br>
                                                            (Note.: only .pdf file is allowed)
                                                            <br>
                                                            <br>
                                                            <ul id="preview_resume"></ul>
                                                            <div id="url_preview_resume"><input type="checkbox" style="display:none" name="resume[]" value="" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                             <?php if($row['Resume'] != '') { ?>
                                                             <a href="http://res.cloudinary.com/dgml9ji66/image/upload/v1519605264/<?php echo $row['Resume']; ?>.pdf" target="_blank" class="view-resume">View Resume</a>
                                                            <?php } ?>

                                                </div>
                                           </div>

                <div class="col-sm-12">
<br>
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-resume hidden" tabindex="11" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-resume hidden" tabindex="12">Cancel</button>
                                    </div>                              

  
  <?php } ?>  

<!--Resume Ends-->   




    <?php } ?>


	<!--User Logged in Ends-->





<!--Visitor Starts-->

<?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] != $row['userID'] || !isset($_SESSION['entrepreneurSession'])) { ?>
<!--About Start-->
 <!-- <div class="col-sm-12" style="padding-left: 0px;">   
     <div class="col-sm-3"><strong>About <?php echo $firstname; ?></strong><br><br></div>
  </div> -->

<?php if($row['About'] == '' && $row['Skills'] == ''){ ?>  
  <div class="col-sm-12" style="padding-left: 0px;"> 
     <div class="col-sm-3" style="padding-left: 0px;">Nothing to see here!</div>
  </div> 
    
<?php } ?>  


<?php if($row['About'] != ''){ ?>  
  <div class="col-sm-12"> 
     <div class="col-sm-12" style="padding-left: 0px;">   
     <div class="col-sm-3" style="padding-left: 0px;"><strong>About <?php echo $firstname; ?></strong><br><br></div>
  </div> 
   	 <?php echo $row['About']; ?>
   	 <br><br><br>
  </div>
<?php } ?>  
<!--About Ends-->  

<!--Skills Start-->
<?php if($row['Skills'] != ''){ ?>  
  <div class="col-sm-12" style="padding-left: 0px;">   
     <div class="col-sm-3"><strong><?php echo $firstname; ?>'s Skills</strong><br><br></div>
  </div> 
  <div class="col-sm-12"> 
   <?php 

$sql_skills = mysqli_query($connecDB,"SELECT * FROM skills ORDER BY id ASC");  
while($row_skills = mysqli_fetch_array($sql_skills)){

if (in_array($row_skills['id'],$skills)){
echo '<div class="skillsdiv_teammember">';
echo $row_skills['skill'];
echo '</div>';

}

}

 ?>
  </div>
<?php } ?>  
<!--Skills Ends-->  

<?php if($row['Resume'] != ''){ ?>

<!--Resume-->
 <div class="col-sm-12" style="padding-left: 0px;">  
     <div class="col-sm-3"><strong><?php echo $firstname; ?>'s Resume</strong><br><br></div>
  </div> 
  <div class="col-sm-12"> 
    <a href="http://res.cloudinary.com/dgml9ji66/image/upload/v1519605264/<?php echo $row['Resume']; ?>.pdf" target="_blank">
View Resume
</a>
</div>

<?php } ?>

<!--Resume Ends-->
<?php } ?>

<!--Visitor Ends-->


     





<script>

$(document).ready(function() {

var url_link = 'http://localhost/creative/pos/video/profile/';	

$('.save-about').click(function() {
//alert("asdfasfd");

var userid = $('input[name=userid]').val();
var about = document.getElementById('about-textarea').value;

if(about.length < 3) { 
$(".error-about").show();	
$(".error-about").html("Tell us a little more about yourself (200 characters min.)"); 
return false; 

}else{
$(".error-about").hide();	



$.ajax({
            url: url_link+"save-about.php", 
            method: "POST",
            data: { userid: userid, about : about },
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();

                $('#saved').fadeIn("fast");
                $('#saved').delay(2000).fadeOut("slow");
                
                $(".show-about").html(response);
                
                $( ".about-textarea" ).addClass( "hidden" );
				        $( ".show-about" ).removeClass( "hidden" );
                $( ".save-about" ).addClass( "hidden" );
				        $( ".cancel-about" ).addClass( "hidden" );
                
               

            }
        });


}

 });


$('#edit-about').click(function() {

$( ".about-textarea" ).removeClass( "hidden" );
$( ".show-about" ).addClass( "hidden" );
$( ".save-about" ).removeClass( "hidden" );
$( ".cancel-about" ).removeClass( "hidden" );

});


$('.cancel-about').click(function() {

$( ".about-textarea" ).addClass( "hidden" );
$( ".show-about" ).removeClass( "hidden" );
$( ".save-about" ).addClass( "hidden" );
$( ".cancel-about" ).addClass( "hidden" );

});



////////////////Skills//////////////////////

$('#edit-skills').click(function() {

$( ".skills-background" ).addClass( "hidden" );
$( ".edit-skills-box" ).removeClass( "hidden" );
$( ".save-skills" ).removeClass( "hidden" );
$( ".cancel-skills" ).removeClass( "hidden" );

});


$('.cancel-skills').click(function() {

$( ".skills-background" ).removeClass( "hidden" );
$( ".edit-skills-box" ).addClass( "hidden" );
$( ".save-skills" ).addClass( "hidden" );
$( ".cancel-skills" ).addClass( "hidden" );

});






$('.save-skills').click(function() {
 
 var userid = $('input[name=userid]').val();
 var skill = $("select[name='fm_skills']").val();
        //var skill_level_percentage = $('input[name=skill_level]').val();
        //alert(skill);
      
      

        $.ajax({
            url: url_link+"edit.php",
            method: "POST",
            data: { content: skill, column_name: 'Skills' },
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills_count = $(response).filter('#theskills').text();
                //$('#skills-count').html(skills_count);
                //alert(skills_count);  


                $('#saved').fadeIn("fast");
                $('#saved').delay(2000).fadeOut("slow");

				
                
            }
            
        });

       


 });


////////////////Social////////////////////// 


$('#fm_facebook, #fm_twitter, #fm_linkedin').blur(function(){

  var userid = $('input[name=userid]').val();
  var facebook = $('input[name=fm_facebook]').val();
  var twitter = $('input[name=fm_twitter]').val();
  var linkedin = $('input[name=fm_linkedin]').val();

      $.ajax({
            url: url_link+"edit.php",
            method: "POST",
            data: { facebook: facebook, twitter: twitter, linkedin: linkedin, column_name: 'Social' },
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills_count = $(response).filter('#theskills').text();
                //$('#skills-count').html(skills_count);
                //alert(skills_count);  

            }
            
        });

});


////////////////Resume////////////////////// 




$('#edit-resume').click(function() {

$( ".edit-resume-box" ).removeClass( "hidden" );
$( ".cancel-resume" ).removeClass( "hidden" );
$( ".view-resume-box" ).addClass( "hidden" );

});

$('.cancel-resume').click(function() {

$( ".edit-resume-box" ).addClass( "hidden" );
$( ".cancel-resume" ).addClass( "hidden" );
$( ".view-resume-box" ).removeClass( "hidden" );

});


$('.save-resume').click(function() {
 
 var resume = $('input[name="resume[]"]:checked').map(function() { return this.value; }).get().join(",");
        //var skill_level_percentage = $('input[name=skill_level]').val();
        //alert(resume);
      if(resume != ''){
        $.ajax({
            url: url_link+"edit.php",
            method: "POST",
            data: { content: resume, column_name: 'Resume' },
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills_count = $(response).filter('#theskills').text();
                //$('#skills-count').html(skills_count);
                //alert(skills_count);  

         $(".edit-resume-box" ).addClass( "hidden" );
			   $(".cancel-resume" ).addClass( "hidden" );
			   $(".view-resume-box" ).removeClass( "hidden" );
			   $(".view-resume-box").load(url_link+"view-resume.php");
               
            }
        });
      }


 });


});

</script>


<?php } ?>


