<?php
/**
* Template Name: Toppings Template
*
* @package WordPress
* @subpackage 16 Handles
*/
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-US" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-US" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-US"> <!--<![endif]-->
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Toppings Template | 16Handles</title>

  <meta name="description" content="Just another WordPress site">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen, projection" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/print.css" type="text/css" media="print" />
  <!-- <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'/> -->
  <!--[if lt IE 9]>
    <link type="text/css" href="http://16handles.bajibot.com/wp-content/themes/16handles/css/ie-style.css" rel="stylesheet" media="screen"/>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]>
      <script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>
      <script type="text/javascript" src="js/selectivizr-min.js"></script>
  <![endif]-->
  
</head>
    <body <?php body_class('wrap'); ?>>
      <header>
        <div class="centerModule centerHeader">
          <a href="http://16handles.com/" class="ajax-logo large">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.png" id="logo">
          </a>
          <h2>Toppings Template</h2>
          <a href="#" class="toppings-instructions">info</a>
        </div>
      </header>                                                                       
      <div class="toppings-content">
        <div class="toppings-content-left">
          <h3>Toppings</h3>
          <ul class="toppings-list" id="toppings-topping">
						<li class="heading">Dry</li>
            <?php $args = array( 'post_type' => 'flavors', 'posts_per_page' => -1 );
                  $flavors = new WP_Query( $args );
            while ( $flavors->have_posts() ) : $flavors->the_post(); ?>											
    				<?php $postid = get_the_ID(); ?>																
    				<?php $in_toppings = has_term(array('Dry'), 'type', $postid); ?>
						
    				<?php if($in_toppings == 1) :?>
            <?php $icons = get_field('icon_key', $postid); ?>              					
            <?php if(empty($icons)){
              $icons = Array();
            } ?>
              <li id="tt-<?php echo $postid; ?>" data-bg="<?php echo get_field('background_color', $postid); ?>" data-icons="<?php echo implode(",", $icons); ?>"><?php the_title();?></li>                        
            <?php endif; endwhile; ?>
						<li class="heading">Fruit</li>
            <?php $args = array( 'post_type' => 'flavors', 'posts_per_page' => -1 );
                  $flavors = new WP_Query( $args );
            while ( $flavors->have_posts() ) : $flavors->the_post(); ?>											
    				<?php $postid = get_the_ID(); ?>																
    				<?php $in_toppings = has_term(array('Fruit'), 'type', $postid); ?>					
    				<?php if($in_toppings == 1) :?>
            <?php $icons = get_field('icon_key', $postid); ?>              					
            <?php if(empty($icons)){
              $icons = Array();
            } ?>
              <li id="tt-<?php echo $postid; ?>" data-bg="<?php echo get_field('background_color', $postid); ?>" data-icons="<?php echo implode(",", $icons); ?>"><?php the_title();?></li>                        
            <?php endif; endwhile; ?>
						<li class="heading">Sauces</li>
            <?php $args = array( 'post_type' => 'flavors', 'posts_per_page' => -1 );
                  $flavors = new WP_Query( $args );
            while ( $flavors->have_posts() ) : $flavors->the_post(); ?>											
    				<?php $postid = get_the_ID(); ?>																
    				<?php $in_toppings = has_term(array('Sauces'), 'type', $postid); ?>
						
    				<?php if($in_toppings == 1) :?>
            <?php $icons = get_field('icon_key', $postid); ?>              					
            <?php if(empty($icons)){
              $icons = Array();
            } ?>
              <li id="tt-<?php echo $postid; ?>" data-bg="<?php echo get_field('background_color', $postid); ?>" data-icons="<?php echo implode(",", $icons); ?>"><?php the_title();?></li>                        
            <?php endif; endwhile; ?>
          </ul>
        </div>
        <div class="toppings-content-right">
        <a href="#" class="kosher-button btn_link_2">
          <p class="first_title">Non-Kosher
          </p>
        </a>
          <div id="tabs">
            <ul>
              <li><a href="#tabs-1">2 Toppings</a></li>
              <li><a href="#tabs-2">3 Toppings</a></li>
            </ul>
            <div id="tabs-1">
              <ul class="added-toppings">   
                <div class="border-overlay">&nbsp;</div>             
              </ul>
            </div>
            <div id="tabs-2">
              <ul class="added-toppings">
                <div class="border-overlay">&nbsp;</div>
              </ul>
            </div>
          </div>
          <a class="btn_link_2 btn_link_4 clear" id="clear-toppings" href="#">
            <p class="first_title">Clear</p>
          </a>
          <a class="btn_link_2 btn_link_icon next" id="print-toppings" href="#">
            <p class="first_title">Print
              <span class="arrow"></span>
            </p>
          </a>
        </div>
      </div>
      <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery-1.9.1.min.js'></script>
      <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery-ui.js'></script>
      <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/modernizr.js'></script>
      <script>
      
      function CenterItem(theItem) {
      	var winWidth = $(window).width();
      	var winHeight = $(window).height();
      	var windowCenter = winWidth / 2;
      	var itemCenter = $(theItem).width() / 2;
      	var theCenter = windowCenter - itemCenter;
      	var windowMiddle = winHeight / 2;
      	var itemMiddle = $(theItem).height() / 2;
      	var theMiddle = windowMiddle - itemMiddle;
      	if (winWidth > $(theItem).width()) { //horizontal
      		$(theItem).css('left', theCenter);
      	} else {
      		$(theItem).css('left', '0');
      	}
      	if (winHeight > $(theItem).height()) { //vertical
      		$(theItem).css('top', theMiddle);
      	} else {
      		$(theItem).css('top', '0');
      	}
      }
      
      function resetToppings(){
        $('.toppings-list > li').removeClass('active');
        $('.added-toppings > li').remove();      
      }
      $(function() {
        
        $('.toppings-instructions').click(function(e){
          e.preventDefault();
					$(".wrap-msg").show();
    			CenterItem('.wrap-msg .msg');
    			$('.wrap-msg .msg').fadeIn();
        });
        
        $('.confirm.close').click(function(e){
          e.preventDefault();
          $('.wrap-msg, .msg').fadeOut();
        });
        
        $( "#tabs" ).tabs({
          beforeActivate : function(){
            resetToppings();
          }
        });
				
				$("#clear-toppings").click(function(e){
					e.preventDefault();
					resetToppings();				
				});
				
				$("#print-toppings").click(function(e){
					e.preventDefault();		
					window.print();
				});
				
				$(".kosher-button").click(function(e){
					e.preventDefault();
					var $toppingsTemplateUL = $('.added-toppings', $('.ui-tabs-panel:visible'));					
					if($('li:last-child div:last-child h5', $toppingsTemplateUL).length > 0){
						alert("This topping is already non-kosher");
						return;
					}					
					$('li:last-child div:last-child h4', $toppingsTemplateUL).prepend('<h5>non-kosher</h5>');				
				})
				                
        $('.toppings-list li:not(.heading)').click(function(){
          var $this = $(this),
          toppingID = $this.attr('id'),
          iconsList = ($this.data('icons').length > 0) ? $this.data('icons').split(',') : $.makeArray($this.data('icons')),
          topping = $this.text(),
          bgColor = ($this.data('bg')) ? $this.data('bg') : "#999999",
          $toppingsTemplateUL = $('.added-toppings', $('.ui-tabs-panel:visible')),
					templateIsTwoTopping = ($toppingsTemplateUL.parent().attr('id') === "tabs-1") ? true : false;  
          $toppingsTemplateLI = $('<li class="toppings-full"><span class="dotted"></span><span class="dotted-bottom"></span></li>'),
          $toppingsTemplateDIV = $('<div id="topping-'+toppingID+'" class="topping-box" style="background:url(http://placehold.it/3x3/'+bgColor.split('#')[1]+'/'+bgColor.split('#')[1]+'); border-image: url(http://placehold.it/3x3/'+bgColor.split('#')[1]+'/'+bgColor.split('#')[1]+'):" />', $toppingsTemplateLI),
          $toppingsTemplateIconsDIV = $('<div class="toppings-icons"></icons>');
					
          $this.addClass('active');     
                    
          if(templateIsTwoTopping === true && $('.toppings-full > div').length === 16  ){
            alert("The Toppings Template is Complete.")
            return;
						
          } else if(templateIsTwoTopping === false && $('li', $toppingsTemplateUL).length === 12  ) {					
						alert("The Toppings Template is Complete.")
						return;
					}
					
					if(templateIsTwoTopping === false){
						$emptyLI = $('<li class="topping"/>');
						$toppingsTemplateUL.append($emptyLI);
            $emptyLI.append($toppingsTemplateDIV)          
            $toppingsTemplateDIV.append('<h4>' + topping + '</h4>');
            $emptyLI.attr('id', 'topping-'+ $emptyLI.index());
            
						if(!iconsList[0]== ""){      
              $('div', $emptyLI).append($toppingsTemplateIconsDIV)        
              for(i = 0; i < iconsList.length; i++){
                $toppingsTemplateIconsDIV.append('<img src="<?php bloginfo('template_url'); ?>/img/toppings-images/icon_'+iconsList[i]+'.svg" class="img-'+iconsList[i]+'">');
              }                                        
            }					
						
						return;
					}
  
          if($('li:last-child > div', $toppingsTemplateUL).length > 1){                                              
            $toppingsTemplateUL.append($toppingsTemplateLI);
            $toppingsTemplateLI.append($toppingsTemplateDIV)          
            $toppingsTemplateDIV.append('<h4>' + topping + '</h4>');
      
            if(!iconsList[0]== ""){      
              $('div', $toppingsTemplateLI).append($toppingsTemplateIconsDIV)        
              for(i = 0; i < iconsList.length; i++){
                $toppingsTemplateIconsDIV.append('<img src="<?php bloginfo('template_url'); ?>/img/toppings-images/icon_'+iconsList[i]+'.svg" class="img-'+iconsList[i]+'">');
              }                                        
            }
            $toppingsTemplateDIV.addClass('top');            
          } else {
            
            if($('li', $toppingsTemplateUL).length === 0){
              $toppingsTemplateUL.append('<li class="toppings-full"><span class="dotted"></span><span class="dotted-bottom"></span></li>');
              $toppingsTemplateDIV.addClass('top');       
            } else {
              $toppingsTemplateDIV.addClass('bottom');                      
            }
            
            $('li:last-child', $toppingsTemplateUL).append($toppingsTemplateDIV);
            $toppingsTemplateDIV.append('<h4>' + topping + '</h4>');
            
            if(!iconsList[0]== ""){      
              $toppingsTemplateDIV.append($toppingsTemplateIconsDIV)            
              for(i = 0; i < iconsList.length; i++){
                $toppingsTemplateIconsDIV.append('<img src="<?php bloginfo('template_url'); ?>/img/toppings-images/icon_'+iconsList[i]+'.svg" class="img-'+iconsList[i]+'">');
              }                                        
            }
            
          }
        });        
      });
      </script>
			<link rel="stylesheet" href="http://fast.fonts.net/t/1.css?apiType=css&projectid=17226be1-e03a-442a-a215-ec02b706dff3" type="text/css" media="all" />
      <style>
			
			@font-face{
				font-family:"HelveticaNeueW01-XBlkCn 710276";
				src:url("<?php bloginfo('template_url'); ?>/fonts/helveticaneue/978fc490-bc85-49a5-a85d-d28703cdeb3b.eot?#iefix");
				src:url("<?php bloginfo('template_url'); ?>/fonts/helveticaneue/978fc490-bc85-49a5-a85d-d28703cdeb3b.eot?#iefix") format("eot"),
				url("<?php bloginfo('template_url'); ?>/fonts/helveticaneue/58310d61-40ac-4464-b817-30d9e9deb3bb.woff") format("woff"),
				url("<?php bloginfo('template_url'); ?>/fonts/helveticaneue/96017e22-70f3-4c82-9620-352a5f107d90.ttf") format("truetype"),
				url("<?php bloginfo('template_url'); ?>/fonts/helveticaneue/d7282731-5798-4d1c-90ae-efbd49632898.svg#d7282731-5798-4d1c-90ae-efbd49632898") format("svg");
			}

				.page-template-template-toppings-template-php .toppings-content-left ul li.heading{font-weight:bold;color:#EF3883;font-size:24px;margin-bottom:0; cursor:default; margin-top:25px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping,
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping .topping-box{height:110px;}

        
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-1{ position:absolute;left:0; top:0; height:120px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-1 .topping-box{height:120px !important;}

        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-2.topping{ position:absolute; left:0; top:120px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-3.topping{ position:absolute; left:0; top:230px;}

        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-4.topping{ position:absolute;left:245px; top:0; height:120px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-4.topping .topping-box{ height:120px !important;;}

        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-5.topping{ position:absolute;left:245px; top:120px}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-6.topping{ position:absolute;left:245px; top:230px}
                                                                                
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-7.topping{ position:absolute;left:0; top:340px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-8.topping{ position:absolute;left:0; top:450px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-9.topping{ position:absolute;left:0; top: 560px; height:120px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-9.topping .topping-box{height:120px !important;;}

        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-10.topping{position:absolute;left:245px; top:340px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-11.topping{position:absolute;left:245px; top:450px;}
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-12.topping{position:absolute;left:245px; top:560px; height:120px;}      
        .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-12.topping .topping-box{height:120px !important;;}      
        li.topping .toppings-icons img, .topping-box .toppings-icons img{width: 49px;height: 42px;}
        @media print {
          
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping,
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping div.topping-box{height:1.75in; width:4.25in;}
					/*.page-template-template-toppings-template-php #tabs-2 img.img-7{margin-top:.5in;}*/
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-1{ height:1.85in; position:absolute;left:0; top:0; }
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-1 .topping-box{height:1.9in !important;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-2.topping{ height:1.75in; position:absolute; left:0; top:1.91in;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-3.topping{ height:1.75in; position:absolute; left:0; top:3.68in;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-4.topping{ height:1.85in; position:absolute;left:4.3in; top:0;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-4 .topping-box{height:1.9in !important;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-5.topping{ height:1.75in; position:absolute;left:4.3in; top:1.91in}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-6.topping{ height:1.75in; position:absolute;left:4.3in; top:3.68in}                                                                                
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-7.topping{ height:1.75in; position:absolute;left:0; top:5.45in;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-8.topping{ height:1.75in; position:absolute;left:0; top:7.22in;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-9.topping{ height:1.85in; position:absolute;left:0; top: 8.99in;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-9 .topping-box{height:1.9in !important;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-10.topping{height:1.75in;  position:absolute;left:4.3in; top:5.45in;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-11.topping{height:1.75in;  position:absolute;left:4.3in; top:7.22in;}
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li#topping-12.topping{height:1.85in;  position:absolute;left:4.3in; top:8.99in;}            
          .page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-12 .topping-box{height:1.9in !important;}          
					.page-template-template-toppings-template-php #tabs-2 .added-toppings .border-overlay{width:8.5in;height:10.7in;position:absolute;z-index:9990;border-top:1px dashed #BDBCBC;border-bottom:1px dashed #BDBCBC;top:.1in;left:0;}
					
					/* borders */
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-2{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-3{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-5{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-6{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-7{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-8{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-9{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-10{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-11{border-top:1px solid #fff;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping#topping-12{border-top:1px solid #fff;}
					
					/* fonts & sizing */
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping h4{font-size:18pt; margin-bottom:.02in; font-family: Helvetica, sans-serif; font-weight:bold;}
					.page-template-template-toppings-template-php #tabs-2 ul.added-toppings li.topping .toppings-icons img{width:60px;height: 54px;}
                              
        }
				
      </style>
			<div class="wrap-msg">
	      <div class="msg">
	        <div class="cont">	
          <h4>Toppings Template Instructions</h4> 		
	          <ul>
	            <li>1 - Choose "3 Topping" or "2 Topping" format</li>
	            <li>2 - Click selections to populate template</li>
	            <li>3 - To delete all selections in template, click "Clear"</li>
	            <li>4 - Click "print" to view final template</li>
	            <li>*IMPORTANT: Please use the topping template with the latest version of your browser.</li>
	          </ul>
						<div class="meta">
							<p>Settings for your browser: <a href="http://16handles.com/wp-content/uploads/2013/09/Screen-Shot-2013-09-09-at-4.46.59-PM.png" target="blank">Chrome (PC / Mac Latest Version)</a></p>							
						</div>
	        </div>                                    
	        <a class="confirm close" href="#" >
	          <p>Close</p>
	          <div class="arrow"></div>
	        </a>
	      </div>				
			</div>
      </body>
      </html>
      
      <!-- need flavor, icons, background color to append to  -->
      
