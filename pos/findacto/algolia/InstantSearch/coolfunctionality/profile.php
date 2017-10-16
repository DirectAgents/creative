<?php
header("Access-Control-Allow-Origin: *");
session_start();
require 'main.php';
require 'config.php';

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

    <!-- Bootstrap -->

    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/style.min.css" rel="stylesheet">
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

    <link href="style2.css" media="all" rel="stylesheet" />

    <link rel="shortcut icon"
     href="<?php echo cloudinary_url("http://cloudinary.com/favicon.png",
           array("type" => "fetch")); ?>" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/vendor/jquery.ui.widget.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.iframe-transport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.fileupload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-jquery-file-upload/2.1.2/cloudinary-jquery-file-upload.js"></script>
    <?php echo cloudinary_js_config(); ?>


 

 <!--<script type="text/javascript">
    $(document).ready(function(){
        $("#count-submissions").click(function(){

            $.ajax({
                type: 'POST',
                url: 'count-submission.php',
                success: function(data) {
                    //alert(data);
                    $("#count_submission").text(data);

                }
            });
   });
});
</script>
-->

  </head>

  <body>
    <nav id="navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="svg"><object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="navbar-logo"></object>  </a><h2 class="logo-title">Collapsed</h2>
                <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-header">
                <div class="nav-search-container">
                    <input type="text" class="algolia-autocomplete light" id="search_input" placeholder="Search Startups">
                </div>
            </div>

            <div class="navbar-offcanvas navbar-offcanvas-right navbar-menubuilder" id="js-bootstrap-offcanvas">

                <ul class="nav navbar-nav navbar-left" id='submit-button'>
                    <li ><a href="/submit-startup"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Submit startup" class="button-empty"><img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/plus-dark.svg" class="center-block button-empty-image"></button></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/" class="navbar-text">Home</a></li>
                    <li><a href="/regions" class="navbar-text">Regions</a></li>
                    <li><a href="/markets" class="navbar-text">Markets</a></li>
                    <li>
                        <div class="btn-group">
                              <button type="button" class="dropdown-toggle center-block text-center elipsis-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-option-horizontal"> </i></button>
                              <ul class="dropdown-menu dropdown-menu-nav dropdown-mobile">
                                <li><a href="/faq">FAQ</a></li>
                                <li><a href="mailto:contact@collapsed.co">Email Us</a></li>
                              </ul>
                        </div>
                    </li>
                    
                     <li>
                         <p class="navbar-profile-name bold">Alper</p>
                         <div class="btn-group" id="navbar-avatar">
                              <button type="button" class="navbar-profile-avatar dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class='navbar-profile-icon' src="https://graph.facebook.com/v2.4/10158571058230062/picture?type=square&amp;height=600&amp;width=600&amp;return_ssl_resources=1" />
                              </button>
                              <ul class="dropdown-menu dropdown-menu-nav dropdown-mobile">
                                <li><a href="/dashboard">Dashboard</a></li>
                                <li><a href="/@alper-dilmen">Profile</a></li>
                                <li>
                                    <a>
                                        <form method="post" action="/accounts/logout/" style="width:100%;">
                                          <input type='hidden' name='csrfmiddlewaretoken' value='4ev7aHWL8AAXKIj60UvjisxYwAsao6DUsQeWrSUgmRI6Pvy3jGagM1wI4KOV6eu0' />
                                          
                                          <button style="border:0px; background:0px; padding:0px;" type="submit">Sign Out</button>
                                        </form>
                                    </a>
                                </li>
                              </ul>
                         </div>
                         <p class="navbar-profile-name hidden2 bold">Alper</p>
                     </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">

        

<div class="container">
    <div class="profile-container">
        <div class="row">
            <div class="col-md-6 profile-card" id="myTabs" role="tablist">
                <img src="https://graph.facebook.com/v2.4/10158571058230062/picture?type=square&amp;height=600&amp;width=600&amp;return_ssl_resources=1"
                     class="profile-container-image pull-left">
                <h3 class="profile-text bold" id="startchange">Alper Dilmen</h3>
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
                <a href="#submissions" id="count-submissions" aria-controls="#submissions" role="tab" data-toggle="tab">
                    Submissions -

                    <?php
                    $query = "SELECT COUNT(*) FROM submission WHERE userID = '911' GROUP BY userID";
$result = mysqli_query($connecDB,$query);
$rows = mysqli_fetch_row($result);
echo $rows[0];
                    ?>
                </a>

               
                <a href="#following" id='following_button' aria-controls="#following" role="tab" data-toggle="tab">
                    Following - 0
                </a>
                <a href="#followers" id='followers_button' aria-controls="#followers" role="tab" data-toggle="tab">
                    Followers - 0
                </a>

                <a href="#submit-functionality" id='followers_button' aria-controls="#submit-functionality" role="tab" data-toggle="tab">
                    Submit New
                </a>

            </div>
            <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade in" id="submit-functionality">



<iframe src="upload_backend.php" width="100%" height="600"></iframe>



            </div>

                <div role="tabpanel" class="tab-pane fade in" id="submissions">
                    
                        <p class="text-center no-contributions"> This user hasn't contributed anything yet. </p>



 


                    
                </div>
                
                <div role="tabpanel" class="tab-pane fade in" id="overview">
                    
                        <p class="text-center no-contributions"> This user hasn't contributed anything yet. </p>
                    
                </div>

               
               
                <div role="tabpanel" class="tab-pane fade in" id="followers">
                    
                        <p class="text-center no-contributions"> This user has no followers yet. </p>
                    
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
                    
                        <h4 class="profile-content-header-title bold">Share Your Profile</h4>
                    
                </div>
                <div class="profile-content-description">
                    <a class="tweet">
                        <p id="tweet-message" class="hidden">Check out @alper on @CollapsedHQ!  https://collapsed.co/@alper-dilmen </p>
                        <button type="button" class="profile-content-button twitter bold">
                        <object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/brands/twitter-icon.gif" class="center-block profile-content-button-image"></object>
                    </button>
                    </a>
                    <div class="invisible-separator-small"></div>
                    <a class="share">
                        <p id="facebook-link" class="hidden">https://collapsed.co/@/alper-dilmen</p>
                        <p id="facebook-description" class="hidden">Check out Aaron Kazah's on Collapsed!</p>
                        <button type="button" class="profile-content-button facebook bold">
                            <object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/brands/facebook-icon.png" class="center-block profile-content-button-image"></object>
                        </button>
                    </a>
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


    <footer class="footer-container">
        <div class="container">
        </div>
    </footer>

     <script>
      function prettydump(obj) {
        ret = "";
        $.each(obj, function(key, value) {
          ret += "<tr><td>" + key + "</td><td>" + value + "</td></tr>";
        });
        return ret;
      }
      
      $(function() {
        $('.cloudinary-fileupload')
        .cloudinary_fileupload({
          dropZone: '#direct_upload',
          start: function () {
            $('.status_value').text('Starting direct upload...');
          },
          progress: function () {
            $('.status_value').text('Uploading...');
          }
        })
        .on('cloudinarydone', function (e, data) {
            $('.status_value').text('Idle');
            $.post('upload_complete.php', data.result);
            var info = $('<div class="uploaded_info"/>');
            //$(info).append($('<div class="data"/>').append(prettydump(data.result)));
            $(info).append($('<div class="image"/>').append(
              $.cloudinary.image(data.result.public_id, {
                  format: data.result.format, width: 150, height: 150, crop: "fill"
              })
            ));
            $('.uploaded_info_holder').append(info);
        });
      });
    </script>




    

    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.offcanvas.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/script.min.js"></script>

    
     
 

   


  </body>
</html>