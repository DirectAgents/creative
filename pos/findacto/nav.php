
<?php if(empty($_SESSION['customerSession'])){ ?>

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
                   
                     <input type="text" class="algolia-autocomplete light" id="search-input" placeholder="Search by Programming Skills or Name" />

                </div>
            </div>

            <div class="navbar-offcanvas navbar-offcanvas-right navbar-menubuilder" id="js-bootstrap-offcanvas">

               
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="faq" class="navbar-text">FAQ</a></li>
                    <li><a href="about" class="navbar-text">About</a></li>
                    <li><a href="contact" class="navbar-text">How it works</a></li>
                    <li>
                        <div class="btn-group">
                              <button type="button" class="dropdown-toggle center-block text-center elipsis-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-option-horizontal"> </i></button>
                              <ul class="dropdown-menu dropdown-menu-nav dropdown-mobile">
                                <li><a href="faq">FAQ</a></li>
                                <li><a href="contact">Contact</a></li>
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


<?php }else{ ?>



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
	
	  
  
       <input type="text" class="algolia-autocomplete light" id="search-input" placeholder="Search by Programming Skills or Name" />
   

                </div>
            </div>


            <div class="navbar-offcanvas navbar-offcanvas-right navbar-menubuilder" id="js-bootstrap-offcanvas">

                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="faq" class="navbar-text">FAQ</a></li>
                    <li><a href="about" class="navbar-text">About</a></li>
                    <li><a href="contact" class="navbar-text">Contact</a></li>
                   
                    
                        <li><a><button class="button-filled"  data-toggle="modal" data-target="#signin">Sign In</button></a></li>
                        <li><a><button class="button-filled"  data-toggle="modal" data-target="#signin">Sign Up</button></a></li>
                    
                </ul>
            </div>
        </div>
    </nav>


 <?php } ?>   