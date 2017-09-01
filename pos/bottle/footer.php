<div class="footer">

<ul class="footer-links">
	<li>&copy; 2017 Paotastik, LLC</li>
	<li><a href="<?php echo BASE_PATH; ?>">Home</a></li>
	<li><a href="<?php echo BASE_PATH; ?>/terms/">Terms of Service</a></li>
	<li><a href="<?php echo BASE_PATH; ?>/privacy/">Privacy</a></li>
	<li><a href="<?php echo BASE_PATH; ?>/homeless/">Meet the Homeless</a></li>
	<li><a href="<?php echo BASE_PATH; ?>/faq/">FAQ</a></li>
	<li><a href="<?php echo BASE_PATH; ?>/about/">About</a></li>
	<li><a href="<?php echo BASE_PATH; ?>/contact/">Contact Us</a></li>
</ul>



<ul class="navbar-nav navbar-nav_rt"> 
<li class="navbar-nav__i">

<a class="navbar-nav__a footer__a footer__a_social footer__a_social_facebook" href="https://www.facebook.com/MrPao-1960306184214766/" target="_blank"><span class="footer__social"></span></a>
</li> 

<li class="navbar-nav__i"><a class="navbar-nav__a footer__a footer__a_social footer__a_social_twitter" href="https://twitter.com/mymisterpao" target="_blank"><span class="footer__social"></span></a>
</li> 

<li class="navbar-nav__i"><a class="navbar-nav__a footer__a footer__a_social footer__a_social_gplus" href="https://instagram.com/mymrpao" target="_blank"><span class="footer__social"></span></a></li> 
<!--
<li class="navbar-nav__i"><a class="navbar-nav__a footer__a footer__a_social footer__a_social_linkedin" href="http://www.linkedin.com/company/#"" target="_blank"><span class="footer__social"></span></a></li> 
-->

</ul>


</div>




 <script type="text/javascript" src="<?php echo BASE_PATH; ?>/assets/intro/intro.js"></script>
    <script type="text/javascript">
      function startIntro(){
        var intro = introJs();
          intro.setOptions({
            steps: [
              {
                element: '.schedule-one-here',
                intro: "<img src='<?php echo BASE_PATH; ?>/images/email/email-logo-small.jpg'/><br><br>To schedule your first pick-up"
              },
              {
                element: '.more',
                intro: "<img src='<?php echo BASE_PATH; ?>/images/email/email-logo-small.jpg'/><br><br>Manage your account here.<br>Add a bank account and check your balance",
                position: 'right'
              },
              {
                element: '#step3',
                intro: "<img src='<?php echo BASE_PATH; ?>/images/email/email-logo-small.jpg'/><br><br>Enjoy!",
                position: 'left'
              }
              /*{
                element: '#step4',
                intro: "<span style='font-family: Tahoma'>Another step with new font!</span>",
                position: 'bottom'
              },
              {
                element: '#step5',
                intro: '<strong>Get</strong> it, <strong>use</strong> it.'
              }*/
            ]
          });

          intro.start();
      }
    </script>