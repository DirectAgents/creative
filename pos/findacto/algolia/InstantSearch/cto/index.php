<?php

// if you are not using composer
require_once('../../algoliasearch-client-php-master/algoliasearch.php');


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");

$index = $client->initIndex('cto');



$index->setSettings(array(
  "searchableAttributes" => [
    
    "name",
    "location",
    "lookingfor",
    "asa",
    "skills"
  ]
));


//$batch = json_decode(file_get_contents('actors.json'), true);
//$index->addObjects($batch);



?>


<!DOCTYPE html>


<html lang="en">
  <head>
    
    
    
    
    

    <meta charset="utf-8">
    <meta name="google-site-verification" content="rgCgMtwBuyPjAybTC0GwIK8RbaN8YoUTF_3K0YVXxwQ" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="We track and analyze failed startups so startups don't make the same mistakes that others have made." >
    <meta name="keywords" content= "failed startups, lessons from failed startups, failed startups 2016, startup post mortem, startup autopsy, producthunt, betalist" >
    <meta name="author" content="Collapsed">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Collapsed - Learn Lessons From Failed Startups </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">


    <!-- Bootstrap -->

    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.min.css" rel="stylesheet">
    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/reset.min.css" rel="stylesheet">
    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/bootstrap.offcanvas.min.css" rel="stylesheet">
    


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
      
    

  </head>

  <body>





    <nav id="navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="index.html" class="svg"><object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="navbar-logo"></object>  </a><h2 class="logo-title">Collapsed</h2>
                <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-header">
                <div class="nav-search-container">
	
	  
  
       <input type="text" class="algolia-autocomplete light" id="search-input" placeholder="Search Skills or Name" />
       <!-- We use a specific placeholder in the input to guides users in their search. -->
   




                </div>
            </div>


            <div class="navbar-offcanvas navbar-offcanvas-right navbar-menubuilder" id="js-bootstrap-offcanvas">

                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html" class="navbar-text">Home</a></li>
                    <li><a href="regions.html" class="navbar-text">Regions</a></li>
                    <li><a href="markets.html" class="navbar-text">Markets</a></li>
                    <li>
                        <div class="btn-group">
                              <button type="button" class="dropdown-toggle center-block text-center elipsis-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-option-horizontal"> </i></button>
                              <ul class="dropdown-menu dropdown-menu-nav dropdown-mobile">
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="mailto:contact@collapsed.co">Email Us</a></li>
                              </ul>
                        </div>
                    </li>
                    
                        <li><a><button class="button-filled"  data-toggle="modal" data-target="#signin">Sign In</button></a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">




        

    <div class="container">
        <div class="title-card text-center light" id="startchange">
            <span class="bold">Welcome to Collapsed</span>,  the best place to learn lessons from failed startups
        </div>

        <!-- Tab panes -->
        <div class="title-info-card">
            <div class="row" id="myTabs" role="tablist">
                <div class="container">


  <div id="categories"></div>
  <div id="lookingfor"></div>
  <div id="skills"></div>


                    <a href="index.html#home" aria-controls="#home" role="tab" data-toggle="tab" class="title-info-tag active text-left pull-left">
                        <object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/discover_icon.svg" class="title-info-icon"></object>
                        Recently Published
                    </a>
                    <a href="index.html#recently_closed" aria-controls="#recently_closed" role="tab" data-toggle="tab" class="title-info-tag text-left pull-left">
                        <object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/recently_pub.svg" class="title-info-icon"></object>
                        Recently Closed
                    </a>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <div class="row">






<main>


<div id="hits"></div>



<script type="text/html" id="hit-template">
<div class="col-md-4">  
  <div class="hit">
   
    <div class="hit-content">
    <a href="profile.php?id={{objectID}}">
    <div class="search-column-box">
    <div class="left-column-search"><img src="photo/{{{image_path}}}"/></div>
    <div class="right-column-search">
      <h2 class="hit-name">{{{_highlightResult.name.value}}}</h2>
      <div class="hit-location">{{{_highlightResult.location.value}}}</div>
      <div class="hit-position">Position: {{{_highlightResult.position.value}}}</div>
      <div class="hit-lookingfor">Available as a {{{_highlightResult.lookingfor.value}}}</div>
      <div class="hit-skills-title">Skills:</div>
    
     
   </a>   

		  {{#skills}}<div class="hit-skills">{{.}}</div>{{/skills}} 
   </div> 
</div>  



    </div>
  </div>
 </div>  
</script>


</main>


                    
                   
                   
                    
                 
                    
                </div>
                
                <div class="row endless_page_template">
                    


    <div class="endless_container">
        <a class="endless_more" href="index-page=2.html"
            rel="page">Show More</a>
        <div class="endless_loading" style="display: none;">Loading</div>
    </div>



                </div>
            </div>
            <div role="tabpanel" class="tab-pane fadein" id="recently_closed">
                <div class="row endless_page_template">
                    
                        
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                        <script src="https://d3tr6q264l867m.cloudfront.net/static/el-pagination/js/el-pagination.min.js"></script>
                        <script>
                            $.endlessPaginate({
                                paginateOnScroll: true,
                                paginateOnScrollMargin: 40
                            });
                        </script>
                    
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
                            <a href="https://collapsed.co/accounts/facebook/login/"><button type="button" class="center-block signup-brand-card facebook">Sign In With Facebook</button></a>
                        </div>
                        <div class="col-md-6">
                            <a href="https://collapsed.co/accounts/twitter/login/"><button type="button" class="center-block signup-brand-card twitter">Sign In With Twitter</button></a>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.offcanvas.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/mainapp_sdk.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/script.min.js"></script>
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });
    </script>



<script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
<script src="app.js"></script>
     
  </body>
</html>