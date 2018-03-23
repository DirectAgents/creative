<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


 if($_GET){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);


$words = explode(" ", $row['Fullname']);
$firstname = $words[0];

 ?>
   

  
    

   

    <!--User Logged in Starts-->
<?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row['userID']) { ?>

    <input type="hidden" name="userid" id="userid" value="<?php echo $_GET['userid']; ?>"/>
   
    
<!--About Start-->
  <div class="col-sm-12" style="padding-left: 0px;">   
     <div class="col-sm-3"><strong>About <?php echo $firstname; ?></strong><br><br></div>
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
        <div class="col-sm-3"><strong><?php echo $firstname; ?>'s Skills</strong></div>
        <div class="col-sm-3"><a href="#/" id="edit-skills"><i class="ti-pencil"></i></a></div>
        <br><br>
    </div>
     <div class="col-sm-12"> 
    <div class="skills-background">
        <?php 
                                        $ctop = $row['Skills']; 
                                        $ctop = explode(',',$ctop); 

                                        if($row['Skills'] != '' && $row['Skills'] != 'NULL' ){

                                        foreach($ctop as $skill)   { 
                                                       
                                        ?>
        <div class="skillsdiv_teammember">
            <?php echo $skill; ?>
        </div>
        <?php } } ?>
    </div>
    </div>


<div class="edit-skills-box <?php if($row['Skills'] != ''){ ?> hidden <?php } ?>">

 <div class="col-md-4">
       <input type="text" id="fm_skills" name="fm_skills" placeholder="Enter Skill" class="form-control form-control-line">
 </div>

  <div class="col-md-8">
      <button class="btn btn-add" id="add-skills"><span class="glyphicon glyphicon-plus"></span> Add</button>
  </div>



     <div class="col-md-12" style="padding:15px 0 0 0;">
                                                    <div id="responds">
                                                        <?php
                                                        //include db configuration file

                                                        echo '<input type="hidden" name="userid" id="userid" value="'.$row['userID'].'">';


                                                        //MySQL query
                                                        $Result = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$row['userID']."' ");


                                                        //get all records from add_delete_record table
                                                        $row2 = mysqli_fetch_array($Result);




                                                        $ctop = $row2['Skills']; 
                                                        $ctop = explode(',',$ctop); 



                                                        if($row2['Skills'] != '' && $row2['Skills'] != 'NULL' ){



                                                        foreach($ctop as $skill)  
                                                        { 
                                                            //Uncomment the last commented line if single quotes are showing up  
                                                            //otherwise delete these 3 commented lines 


                                                        //get skill string
                                                        $ret = explode('(', $skill);
                                                        $skill_string =  $ret[0];
                                                            

                                                        //MySQL query
                                                        $sqlskill = mysqli_query($connecDB,"SELECT * FROM skills WHERE skill = '".$skill_string."' ");
                                                        $row3 = mysqli_fetch_array($sqlskill);


                                                        echo '<div id="item_'.$row3['id'].'">';
                                                        echo '<div class="skillsdiv">';
                                                        if(in_array($skill,$ctop)){
                                                        echo '<input id="skillselection_'.$row3['id'].'" name="skillselection[]" type="checkbox"  value="'.$skill.'" style="display:none" checked/>';
                                                        }
                                                        echo '<div class="del_wrapper">';
                                                        echo '<div class="the-skill">';
                                                        echo $skill;
                                                        echo '</div>';
                                                        echo '<a href="#" class="del_button" id="del-'.$row3['id'].'">';
                                                        echo '<img src="'.BASE_PATH.'/images/icon_del.gif" border="0" class="icon_del" />';
                                                        echo '</a></div>';
                                                        //echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                        } 



                                                        }





                                                        ?>
                                                    </div>
                                                </div>

 <div class="col-sm-12">
<br>
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-skills <?php if($row['Skills'] != ''){ ?> hidden <?php } ?>" tabindex="11" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-skills <?php if($row['Skills'] != ''){ ?> hidden <?php } ?>" tabindex="12">Cancel</button>
                                        <br><br>
                                    </div>
                                </div>                                                

  



   <!--Skills End--> 

<!--Resume Starts--> 

 <div class="col-sm-12" style="padding-left: 0px;"> 
        <div class="col-sm-3"><strong><?php echo $firstname; ?>'s Resume</strong></div>
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
  <div class="col-sm-12"> 
   	 <?php echo $row['About']; ?>
   	 <br><br><br>
  </div>
<!--About Ends-->  

<!--Skills Start-->
  <div class="col-sm-12" style="padding-left: 0px;">   
     <div class="col-sm-3"><strong><?php echo $firstname; ?>'s Skills</strong><br><br></div>
  </div> 
  <div class="col-sm-12"> 
   	 <?php 
                                        $ctop = $row['Skills']; 
                                        $ctop = explode(',',$ctop); 

                                        if($row['Skills'] != '' && $row['Skills'] != 'NULL' ){

                                        foreach($ctop as $skill)   { 
                                                       
                                        ?>
        <div class="skillsdiv_teammember">
            <?php echo $skill; ?>
        </div>
        <?php } } ?>
  </div>
<!--Skills Ends-->  

<?php if($row['Resume'] != ''){ ?>

<!--Skills Resume-->
 <div class="col-sm-12" style="padding-left: 0px;">  
 <br><br> 
     <div class="col-sm-3"><strong><?php echo $firstname; ?>'s Resume</strong><br><br></div>
  </div> 
  <div class="col-sm-12"> 
    <a href="http://res.cloudinary.com/dgml9ji66/image/upload/v1519605264/<?php echo $row['Resume']; ?>.pdf" target="_blank">
View Resume
</a>
</div>

<?php } ?>

<!--Skills Ends-->
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




$("#add-skills").click(function (e) {
    //alert("adsf");
       e.preventDefault();
     if($("#fm_skills").val()==='')
      {
        //alert("Please enter a job position!");
        return false;
      }
      //alert($("#fm_skills").val());

      var myData = 'skills='+ encodeURIComponent($("#fm_skills").val())+'&skills_level='+ $("#fm_skills_level").val()+'&userid='+ $("#userid").val(); 
      //alert(myData);
      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        //alert(response);
        $("#responds").append(response);
        $("#fm_skills").val('');
        //$('#interestimportant').prop('checked', true); // checks it
       
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
      });
  });



$("body").on("click", "#responds .del_button", function(e) {
     e.preventDefault();
     var clickedID = this.id.split('-'); 
     //var DbNumberID =   $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
     var DbNumberID = clickedID[1]; 
     var myData = 'recordToDelete='+ DbNumberID; 
     
     //alert(DbNumberID);


      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills.php", 
      dataType:"text", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        $('#skillselection_'+DbNumberID).prop('checked', false); // Unchecks it
        
        $('#item_'+DbNumberID).fadeOut("slow");

        
        //alert(response);
      
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });


$("body").on("click", "#responds .del_button_teammmember_skills", function(e) {
     e.preventDefault();
     var clickedID = this.id.split('-'); 
     //var DbNumberID =   $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
     var DbNumberID = clickedID[1]; 
     var myData = 'recordToDelete='+ DbNumberID +'&projectid='+ $("#projectid").val(); 
     
     //alert(DbNumberID);


      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills.php", 
      dataType:"text", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        $('#skillselection_'+DbNumberID).prop('checked', false); // Unchecks it
        
        $('#item_'+DbNumberID).fadeOut("slow");

        
        //alert(response);
      
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });


$('.save-skills').click(function() {
 
 var userid = $('input[name=userid]').val();
 var skill = $('input[name="skillselection[]"]:checked').map(function() { return this.value; }).get().join(",");
        //var skill_level_percentage = $('input[name=skill_level]').val();
        //alert(skill);
      
      if(skill != ''){

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



                $(".skills-background" ).removeClass( "hidden" );
                $(".skills-background").load(url_link+"display-skills.php?userid="+userid);

				$( ".edit-skills-box" ).addClass( "hidden" );
				$( ".save-skills" ).addClass( "hidden" );
				$( ".cancel-skills" ).addClass( "hidden" );	
                

            }
        });

       }


 });


 $(function() {
    $( "#fm_skills" ).autocomplete({
      source: url_link+'search-skills.php'
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


