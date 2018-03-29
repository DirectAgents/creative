<div class="modal fade text-center" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="container center-block">
                <div class="signup-container center-block">
                    <button type="button" data-dismiss="modal" class='exit-button'><img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/exit-icon.png" class="exit-icon center-block"></button>
                    <div class="signup-card center-block">
                        <img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="center-block signup-card-image">
                        <!--<h2 class="signup-card-title bold text-center">Sign in as a Startup!</h2>-->
                        <p class="signup-description text-center"><span class="bold">Collapsed</span> is a community that aims to provide value by providing insights on failed startups.</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="login-buttons">
                                    <a href="<?php echo htmlspecialchars($loginUrl); ?>">
                                        <div class="fb-connect connect-background" data-track="home:facebook-connect">
                                            <span class="fa fa-facebook"></span>
                                            <span class="connect-text">Connect with Facebook</span>
                                        </div>  
                                    </a>
                                </div>
                             </div>   
                                <div class="col-md-12">
                                    <div class="login-buttons">
                                    <a href="<?php echo $authUrl; ?>">
                                       <div class="google-connect connect-background" id="google-connect-button" data-track="home:google-connect">
                         <span class="fa fa-google-plus"></span>
                         <a href="<?php echo $authUrl; ?>">
                         <span class="google-connect-text connect-text">Connect with Google</span>
                         </a>
                    </div>
                                    </a>
                                </div>
                            </div>

                              <div class="col-md-12">
                                    <div class="login-buttons">
                                    <a href="<?php echo $authUrl; ?>">
                                      <div class="li-connect connect-background" data-track="home:facebook-connect">
                         <span class="fa fa-linkedin"></span>
                         <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=78x2ye1ktvzj7d&redirect_uri=<?php echo BASE_PATH; ?>/linkedin/&state=987654321&scope=r_basicprofile,r_emailaddress">
                         <span class="connect-text">Connect with Linkedin</span>
                         </a>
                         
                    </div>
                                    </a>
                                </div>
                            </div>


                            </div> 
                        </div>
                        <p class="signup-light text-center">We won't ever post anything on Facebook without your permission.</p>
                    </div>
                </div>
            </div>
        </div>



<footer class="footer text-center">2018 &copy; Ample Admin brought to you by themedesigner.in  </footer>

           
       
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/bootstrap.min.js"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/sidebar-nav.min.js"></script>
        <!--slimscroll JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/jquery.slimscroll.js"></script>
        <!--Wave Effects -->
        <script src="<?php echo BASE_PATH; ?>/js/waves.js"></script>
        <!--Counter js -->
        <script src="<?php echo BASE_PATH; ?>/js/jquery.waypoints.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/jquery.counterup.min.js"></script>
        <!--Morris JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/raphael-min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/morris.js"></script>
        <!-- chartist chart -->
        <script src="<?php echo BASE_PATH; ?>/js/chartist.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/chartist-plugin-tooltip.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/jquery.sweet-alert.custom.js"></script>
        <!-- Calendar JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/moment.js"></script>
        <script src='<?php echo BASE_PATH; ?>/js/fullcalendar.min.js'></script>
        <script src="<?php echo BASE_PATH; ?>/js/cal-init.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/custom.min.js"></script>
        <!-- Custom tab JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/cbpFWTabs.js"></script>
        <script type="text/javascript">
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
        </script>
        <script src="<?php echo BASE_PATH; ?>/js/jquery.toast.js"></script>
       

    <!-- Magnific popup JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/jquery.magnific-popup-init.js"></script>    

     <!--Style Switcher -->
    <script src="<?php echo BASE_PATH; ?>/js/jQuery.style.switcher.js"></script>    

    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
   
   <?php if($cloudinary_section == 'startups') { ?>
    <script src="<?php echo BASE_PATH; ?>/startups.js"></script>
   <?php } ?> 
   <?php if($cloudinary_section == 'investors') { ?>
    <script src="<?php echo BASE_PATH; ?>/investors.js"></script>
   <?php } ?>  

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



    <script src="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js"></script>
    
    <!--Form Validation-->
    <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/validation.js"></script>


    

    





<!--
<script>
window.onload = function() {
    var tpl, jsassets, tag, i,l;
tpl = document.getElementById('hit-template');
// At this point, ensure your template has been rendered and attached to the page
// by your template processor
jsassets = (tpl.getAttribute('data-jsassets') || '').split(',');
for(i = 0, l = jsassets.length; i < l; i++){
  tag = document.createElement('script');
  tag.type = "text/javascript";
  tag.src = jsassets[i];
  document.head.appendChild(tag);
}


}
</script>
-->

