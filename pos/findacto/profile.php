<?php
session_start();
require_once 'base_path.php';
include_once("config.php");
include("config.inc.php");

$firstname = explode("-", $_GET['name'])[0];
$lastname = explode("-", $_GET['name'])[1];



$sql = mysqli_query($connecDB,"SELECT * FROM profile WHERE Firstname ='".ucfirst($firstname)."' AND Lastname ='".ucfirst($lastname)."'");
$row = mysqli_fetch_array($sql);



?>


<!DOCTYPE html>


<html lang="en">
  <head>
    
    

    <meta charset="utf-8">
    <meta name="google-site-verification" content="rgCgMtwBuyPjAybTC0GwIK8RbaN8YoUTF_3K0YVXxwQ" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content= "See what kind of failed startups Alper Dilmen has submitted/contributed on Collapsed">
    <meta name="keywords" content= "Alper Dilmen contributions on Collapsed" >
    <meta name="author" content="Collapsed">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Alper Dilmen's profile on Collapsed</title>

    <!-- Include stylesheet -->
    <link href="<?php echo BASE_PATH; ?>/css/app.css" rel=stylesheet />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  
 <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo BASE_PATH; ?>/js/bootstrap.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.offcanvas.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/script.min.js"></script>



   


    <!-- Bootstrap -->

    <link href="<?php echo BASE_PATH; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_PATH; ?>/css/style.min.css" rel="stylesheet">
    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/reset.min.css" rel="stylesheet">
    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/bootstrap.offcanvas.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="https://d3tr6q264l867m.cloudfront.net/static/trumbowyg/dist/ui/trumbowyg.css">
    <link rel="stylesheet" href="https://d3tr6q264l867m.cloudfront.net/static/selectize/css/selectize.default.css">



    <link rel="apple-touch-icon" sizes="180x180" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/manifest.json">
    <link rel="mask-icon" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/favicon.ico">
    <meta name="msapplication-config" content="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/browserconfig.xml">
    <meta name="theme-color" content="#00d3aa">

    <meta property="og:image" content="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.png ">
    <meta name="og:url" content=>
    <meta name="og:title" content="">
    <meta name="og:description" content="">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content= >
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.png ">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      

 <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://res.cloudinary.com/demo/raw/upload/v1425809551/jquery.cloudinary_t0p9km.js"></script>
      <script type="text/javascript" src="https://widget.cloudinary.com/global/all.js"></script>


         <script type="text/javascript">

    //<![CDATA[
        $(window).load(function(){
          var cloud_name = 'dgml9ji66';
var preset_name = 'scnk5xom';
if (cloud_name != '' && preset_name != '') $('#message').remove();


$.cloudinary.config({ cloud_name: cloud_name});
cloudinary.setCloudName(cloud_name);
$('#upload_widget_multiple').click(function() {
  //alert("add");
  cloudinary.openUploadWidget({ upload_preset: preset_name, sources: [ 'local', 'url', 'image_search']  }, 
    function(error, result) {
      console.log(error, result);
      ids_and_ratios = {};
      $.each(result, function(i, v){
        $('#preview').append('<li><img src=\"' + $.cloudinary.url(v["public_id"], {format: 'jpg', resource_type: v["resource_type"]  ,transformation: [{width: 200, crop: "fill"}]}) + '\" />')
        $('#testing').append(v["public_id"])
        $('#url_preview').append('<input type="checkbox" name="screenshots[]" value="'+v["public_id"]+'" checked/>')
      });
    });
});


$('#upload_widget_multiple_edit').click(function() {
  //alert("edit");
  cloudinary.openUploadWidget({ upload_preset: preset_name, sources: [ 'local', 'url', 'image_search']  }, 
    function(error, result) {
      console.log(error, result);
      ids_and_ratios = {};
      $.each(result, function(i, v){
        $('#preview_edit').append('<li><img src=\"' + $.cloudinary.url(v["public_id"], {format: 'jpg', resource_type: v["resource_type"]  ,transformation: [{width: 200, crop: "fill"}]}) + '\" />')
        $('#testing_edit').append(v["public_id"])
        $('#url_preview_edit').append('<input type="checkbox" name="screenshots[]" value="'+v["public_id"]+'" checked/>')
      });
    });
});

        });
    //]]>

</script>




    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


    <script src="<?php echo BASE_PATH; ?>/js/scripts.js"></script>


  </head>

  <body>
    
       <?php include 'nav.php'; ?>


    <div class="container-fluid">

        

<div class="container">
    <div class="profile-container">
        <div class="row">
            <div class="col-md-6 profile-card" id="myTabs" role="tablist">
                <img src="https://graph.facebook.com/v2.4/10158571058230062/picture?type=square&amp;height=600&amp;width=600&amp;return_ssl_resources=1"
                     class="profile-container-image pull-left">
                <h3 class="profile-text bold" id="startchange">Alper Dilmen</h3>
                <h4 class="profile-text-city-state bold" id="startchange"><?php echo $row['City'].', '.$row['State']?></h4>
                <a href='' name="following_button"  class="profile-text-small-fix profile-text-small push-right-mid pull-left"><p>Following: <span class="bold">0</span></p></a>
                <a href='' name="followers_button"  class="profile-text-small push-right-mid pull-left"><p>Followers: <span class="bold">0</span></p></a>
            </div>
            <div class="col-md-6">
                
                    
                
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        
        <div class="col-md-9">
            <div class="profile-tabs-container over_scroll-wrapper" id="myTabs" role="tablist">
                
                <a href="#about" aria-controls="#about" role="tab" data-toggle="tab">
                   About
                </a>

                <a href="#skills" aria-controls="#skills" role="tab" data-toggle="tab">
                    Skills - 0
                </a>
               
                <a href="#work" id='following_button' aria-controls="#work" role="tab" data-toggle="tab">
                    Work - 0
                </a>
                <a href="#connections" id='followers_button' aria-controls="#connections" role="tab" data-toggle="tab">
                    Connections - 0
                </a>
            </div>
            
            <div class="tab-content">

             <div role="tabpanel" class="tab-pane fade in active" id="about">
                    
            <div class="col-md-6 about-box">
           <div class="no-contributions"> 


 <table class="table edit-profile">
    <tbody>
      <tr>
        <td class="about"><?php echo $row['About'];?></td>
      </tr>
    </tbody>
  </table>
  <button class="btn btn-info" id="edit-about"><span class="glyphicon glyphicon-edit"></span> edit</button>
  <button class="btn btn-success" id="save-about"><span class="glyphicon glyphicon-ok"></span> save</button>
  <button class="btn btn-cancel" id="cancel-about"><span class="glyphicon glyphicon-remove"></span> cancel</button>



            


                         </div>
            </div>


             <div class="col-md-5 about-box">
           <p class="text-center no-contributions"> 



            <?php echo $row['About'];?>


                         </p>
            </div>

                       
                    
                </div>


              <div role="tabpanel" class="tab-pane fade in" id="skills">
                    
                        <div class="text-center no-contributions"> 




 <div class="col-md-12" style="padding-left:0px">

<table class="table skills">
    <tbody>
      <tr>
   <td class="col-md-6"><input class="form-control"  name="interests" id="interests" type="text" placeholder="Enter here your skills (e.g Social Media)"/>
</td>
<td class="col-md-6"><button class="btn btn-add" id="add-skills"><span class="glyphicon glyphicon-plus"></span> Add</button></td>

<td><button class="btn btn-success" id="save-skills"><span class="glyphicon glyphicon-ok"></span> Save</button></td>


      </tr>
    </tbody>
  </table>

</div>


<div id="responds">
<?php
//include db configuration file

echo '<input type="hidden" name="userid" id="userid" value="1">';


//MySQL query
$Result = mysqli_query($connecDB,"SELECT * FROM profile ");


//get all records from add_delete_record table
$row2 = mysqli_fetch_array($Result);




$ctop = $row2['Skills']; 
$ctop = explode(',',$ctop); 



if($row2['Skills'] != '' && $row2['Skills'] != 'NULL' ){



foreach($ctop as $interest)  
{ 
    //Uncomment the last commented line if single quotes are showing up  
    //otherwise delete these 3 commented lines 
    

//MySQL query
$sqlinterest = mysqli_query($connecDB,"SELECT * FROM interests WHERE interest = '".$interest."' ");
$row3 = mysqli_fetch_array($sqlinterest);


echo '<div id="item_'.$row3['id'].'">';
echo '<div class="skillsdiv">';
if(in_array($interest,$ctop)){
echo '<input id="interestselection_'.$row3['id'].'" name="interestselection[]" type="checkbox"  value="'.$interest.'" style="display:none" checked/>';
}
echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row3['id'].'">';
echo $interest;
echo '<img src="../images/icon_del.gif" border="0" class="icon_del" />';
echo '</a></div>';
//echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
echo '</div>';
echo '</div>';
} 



}





?>
</div>






                        </div>
                    
                </div>

                <div role="tabpanel" class="tab-pane fade in" id="work">
                    
                    <button class="btn btn-add-work" id="add-work"><span class="glyphicon glyphicon-plus"></span> Add</button>
                    <button class="btn btn-list-work" id="list-of-work"><span class="glyphicon glyphicon-plus"></span> List of Work</button>

                        <div class="no-contributions"> 





<div class="list-work-box">
<?php 

$sql=mysqli_query($connecDB,"SELECT * FROM work ORDER BY id DESC ");

while($row_work = mysqli_fetch_array($sql))
{ 


if($row_work['screenshots'] != ''){
$screenshot = explode(",", $row_work['screenshots'], 2);
$screenshot = $screenshot[0];
}else{
  $screenshot = "https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Basketball.jpeg/220px-Basketball.jpeg";
}


 ?>


<div class="col-md-4" style="padding-left:0px">
<table class="table work-table">
    <tbody>
      <tr><td><img src="<?php 
      if($row_work['screenshots'] != ''){ 
        echo 'http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_200/v1/'.$screenshot;
        }else{
          echo $screenshot;} ?>"/></td></tr>
      <tr><td class="work-name"><?php echo $row_work['name']; ?></td></tr>
      <tr><td class="work-name">By: <?php echo $row['Firstname']; ?></td></tr>
      <tr><td class="work-btns">
      <button type="button" data-button='{"id": "<?php echo $row_work['id']; ?>"}' class="btn btn-edit-work" id="edit-work"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
      <button type="button" data-button='{"id": "<?php echo $row_work['id']; ?>"}' class="btn btn-delete-work" id="edit-delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
      </td>
     </tr>
    </tbody>
  </table>
</div>


 <?php } ?>

</div>



<!--Add Work-->

<div class="add-work-box">

<form id="add-work-form">

<div class="panel panel-default">
      
      <div class="panel-heading">Name</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p><input type="text" name="work-name" id="work-name" data-rule-required="true" data-msg-required="Please enter a name."></p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>



<div class="panel panel-default">
      
      <div class="panel-heading">Link</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p><input type="text" name="work-link" id="work-link" data-rule-required="true" data-msg-required="Please enter a link."/></p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>


<div class="panel panel-default">
      
      <div class="panel-heading">Describe your work</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p><textarea placeholder="asdf" name="work-description" data-rule-required="false"></textarea></p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>



<div class="panel panel-default">
      
      <div class="panel-heading">Screenshots</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p>
  <br>            
<a href="#work" class="cloudinary-button" id="upload_widget_multiple">Upload Screenshots</a>

<br><br>
<ul id="preview"></ul>
<div id="url_preview"></div>

<div id="testing"></div>

            </p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>






 <div class="col-md-12">

<table class="table">
    <tbody>
      <tr>


<td class="col-md-6"><button type="submit" class="btn btn-success" id="save-work"><span class="glyphicon glyphicon-ok"></span> Save</button></td>



      </tr>
    </tbody>
  </table>

</div>




</form> 

                         </div>




<!--Edit Work-->

<div class="edit-work-box">
  
<form id="edit-work-form">

<div class="edit-work-box-inner"></div>



<div class="panel panel-default">
      
      <div class="panel-heading">Screenshots</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p>
  <br>            
<a href="#work" class="cloudinary-button" id="upload_widget_multiple_edit">Upload Screenshots</a>

<br><br>
<ul id="preview_edit"></ul>
<div id="url_preview_edit"></div>

<div id="testing_edit"></div>

<p>
  


</p>


            </p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>






 <div class="col-md-12">

<table class="table">
    <tbody>
      <tr>


<td class="col-md-6"><button type="submit" class="btn btn-success" id="save-edit-work"><span class="glyphicon glyphicon-ok"></span> Save</button></td>



      </tr>
    </tbody>
  </table>

</div>



</form> 





</div>


                   </div>
                    
                </div>

                <div role="tabpanel" class="tab-pane fade in" id="answers">
                    
                        <p class="text-center no-contributions"> This user hasn't written anything yet. </p>
                    
                </div>

              
                <div role="tabpanel" class="tab-pane fade in" id="connections">
                    
                        <p class="text-center no-contributions"> This user has no connections yet. </p>
                    
                </div>

                <div role="tabpanel" class="tab-pane fade in" id="following">
                    
                        <p class="text-center no-contributions"> This user hasn't followed anyone yet. </p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="profile-content-container">
                <div class="profile-content-header-container">
                    <object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/icons/user-id-icon.png" class="pull-left profile-content-header-image"></object>
                    
                        <h4 class="profile-content-header-title bold">Get in Touch</h4>
                    
                </div>
                <div class="profile-content-description">
                   
<table class="table edit-profile">
    <tbody>
      <tr>
        <td class="email col-md-2"><?php echo $row['Email'];?></td>
        <td class="col-md-4"><button class="btn btn-info" id="edit-email"><span class="glyphicon glyphicon-edit"></span></button>
  <button class="btn btn-success" id="save-email"><span class="glyphicon glyphicon-ok"></span></button>
  <button class="btn btn-cancel" id="cancel-email"><span class="glyphicon glyphicon-remove"></span></button></td>
      </tr>
    </tbody>
  </table>


  <table class="table edit-profile">
    <tbody>
      <tr>
        <td class="phone col-md-2"><?php echo $row['Phone'];?></td>
        <td class="col-md-4"><button class="btn btn-info" id="edit-phone"><span class="glyphicon glyphicon-edit"></span></button>
  <button class="btn btn-success" id="save-phone"><span class="glyphicon glyphicon-ok"></span></button>
  <button class="btn btn-cancel" id="cancel-phone"><span class="glyphicon glyphicon-remove"></span></button></td>
      </tr>
    </tbody>
  </table>
  

                    
                  
                </div>
            </div>
        </div>
    </div>
</div>


    </div>

    <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="container center-block">
            <div class="signup-container center-block">
                <button type="button" class='exit-button'><img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/exit-icon.png" class="exit-icon center-block"></button>

                <div class="signup-card center-block">
                    <img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="center-block signup-card-image">
                    <h2 class="signup-card-title bold text-center">Sign in to become an Early Adopter!</h2>
                    <p class="signup-description text-center"><span class="bold">Collapsed</span> is a community that aims to provide value by providing insights on failed startups.</p>
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-6">
                            <a href="/accounts/facebook/login/"><button type="button" class="center-block signup-brand-card facebook">Sign In With Facebook</button></a>
                        </div>
                        <div class="col-md-6">
                            <a href="/accounts/twitter/login/"><button type="button" class="center-block signup-brand-card twitter">Sign In With Twitter</button></a>
                        </div>
                        </div>

                    </div>
                    <p class="signup-light text-center">We won't ever post anything on Facebook or Twitter without your permission.</p>
                </div>
            </div>
        </div>
    </div>



<div id="saved">Saved Successfully</div>
  
    <footer class="footer-container">
        <div class="container">
         <p class="footer-content pull-left"> &copy Collapsed 2017</p>
            <a href="/privacy-policy" target="_blank" class="footer-content2 pull-right">Terms & Privacy Policy</a>
            <a href="/cookie-policy" target="_blank" class="footer-content2 pull-right">Cookie Policy</a>
        </div>
    </footer>





<script  src="<?php echo BASE_PATH; ?>/js/profile.js"></script>





    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<script src="<?php echo BASE_PATH; ?>/js/autocomplete.js"></script>


   
    
     


  </body>
</html>