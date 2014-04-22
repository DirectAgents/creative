var is_touch_device = 'ontouchstart' in document.documentElement;

$(function(){
  globalInit();
  b = $('div.main').data('behavior');
  if(b == 'careers') {
    careersInit();
  } else if(b == 'home') {
    homeInit();
  } else if(b == 'about') {
    aboutInit();
  } else if(b == 'flavors') {		
    flavorsInit();
  } else if(b == 'franchise') {
    franchiseInit();
  } else if(b == 'franchise-apply') {
    franchiseApplyInit();
  } else if(b == 'franchise-how') {
    franchiseHowInit();
  } else if(b == 'franchise-testimonials') {
    franchiseTestimonialsInit();
  } else if(b == 'shop') {
		shopInit();
  } else if(b == 'press') {
    pressInit();
  }	
	
});
 	
	//center a div
	function CenterItem(theItem){
	    var winWidth=$(window).width();
	    var winHeight=$(window).height();
	    var windowCenter=winWidth/2;
	    var itemCenter=$(theItem).width()/2;
	    var theCenter=windowCenter-itemCenter;
	    var windowMiddle=winHeight/2;
	    var itemMiddle=$(theItem).height()/2;
	    var theMiddle=windowMiddle-itemMiddle;
	    if(winWidth>$(theItem).width()){ //horizontal
	        $(theItem).css('left',theCenter);
	    } else {
	        $(theItem).css('left','0');
	    }
	    if(winHeight>$(theItem).height()){ //vertical
	        $(theItem).css('top',theMiddle);
	    } else {
	        $(theItem).css('top','0');
	    }
	}
	
	function animateHeader() {
		
		if(Modernizr.touch) return;		
		var $header = $("header"),
    		speed = 200,
		    open = true,
        scrollPos = $(window).scrollTop();

		function shrinkHeader(){			
			$header.animate({height: 75}, {duration: speed, queue:false}).css({overflow : "visible"}).addClass('small');
			$('.ajax-logo.large', $header).hide();
			$("nav", $header).animate({height: 75}, {duration: speed, queue:false});
			$("#logo", $header).animate({ width:42, left: 34}, {duration: speed, queue:false});
			$("#logo-mini,#handles", $header).animate({opacity: 1}, {duration: speed-100, queue:false})
			$("#logo", $header).animate({opacity: 0}, {duration: speed, queue:false});
			$("#handles", $header).animate( {left:82, opacity: 1}, {duration: speed-100, queue:false});
			$("nav > ul p", $header).animate({opacity: 1}, {duration:speed, queue:false});
			$("nav > ul > li", $header).animate({paddingTop: 5}, {duration:speed, queue:false});
			$("nav > ul li > ul", $header).animate({top: 30}, {duration:speed, queue:false});		
			$('.main').animate({marginTop : 46
			}, {duration:speed, queue:false});
			open = false;
		}

		function expandHeader(){
			$('.ajax-logo.large', $header).show();
			$header.animate({height: 100}, {duration: speed, queue:false}).css({overflow : "visible"}).removeClass('small');
			$("#handles", $header).animate({left:-125, opacity : 0}, {duration:speed-100, queue:false});
			$("#logo-mini", $header).animate({opacity: 0}, {duration: speed, queue:false});
			$("#logo", $header).animate({opacity: 1, width:115,left: 0}, {duration: speed, queue:false});
			$("nav", $header).animate({height: 100}, {duration: speed, queue:false});
			$("nav > ul p", $header).animate({opacity: 1}, {duration:speed, queue:false});
			$("nav > ul > li", $header).animate({paddingTop: 15}, {duration:speed, queue:false});
			$("nav > ul li > ul", $header).animate({top: 45}, {duration:speed, queue:false});		
			$('.main').animate({marginTop : 72}, {duration:speed, queue:false});
			open = true;
		};		

		if(scrollPos > 100){
			shrinkHeader();
		} else {
			expandHeader();    
		}
	};

function renderMobileNumbers(){
	if(is_touch_device){
		$('.mobile_tel').each(function(){
			var num = $(this).text();
			$(this).wrap('<a href="tel:'+num+'"/>')
		})	
	}	
}

function animateFooter () {

  var $numberContainer = $('footer .txt .number'),
			finalCount = $numberContainer.text().replace(",", ""),
			startingNumber = parseInt(finalCount - 1800);

	var increaseTrees = setInterval(function(){
			
			$numberContainer.text(prettyNumber(startingNumber));
			startingNumber++;
			
				if(startingNumber >= finalCount ){
					clearInterval(increaseTrees);
				}			 			 						
			}, 1000);				
};

function setupGforms() {
	
	if($('.gfield_list_cell').length > 0){
		$('.gfield_list_cell').each(function(){
			var $this = $(this),
					$tr = $('tr', $this.parent().parent().prev()),
					i = $this.index();
					$('input', $this).attr('placeholder', $('th:eq('+i+')', $tr).text());		
		});	
	}
	
	
  //Add required element to the requiered fields
  $(".gfield_contains_required").each(function(){
	  $(".ginput_container", this).prepend('<div class="req">*</div>');
  });
   
  if($(".ginput_container select").length > 0){
    $(".ginput_container select").each(function(){
      var $this = $(this),
          firstSelectVal = $("option:first-child", $this).text()      
          $this.hide();        
          $this.after('<div class="select btn_select"><div class="box btn_link_2"><p class="state first_title">' + firstSelectVal +'</p><div class="arrow"></div></div><div class="options"><div class="arrow"></div><div class="box gfModifiedSelect"></div></div></div>');        
      })

    $(".ginput_container select option").each(function(){
      var val = $(this).val();
      var $parentSelect = $(this).parent().next();    
      $('.gfModifiedSelect', $parentSelect).append('<div class="option"><p class="data">'+val+'</p><p>'+val+'</p></div>');
    })
    
    $('.gfModifiedSelect .option').on('click',function(){
        val = $(this).children('.data').html();
        $formEl = $(this).closest('.ginput_container');      
        $('select', $formEl).val(val);
    });    
  }

}

function renderDropDownOnTemplate(){
	
	$('.options.select_fill_in').each(function(){		
		var gf_type = $(this).attr('data-gf-field'),
			$select_wrap = $('<div class="box" />');			
		$('.'+gf_type+'.select_sync option').each(function(){
			val = $(this).val();
			$select_wrap.append('<div class="option" data-gf-field="'+gf_type+'"><p class="data">'+val+'</p><p>'+val+'</p></div>');				
		});
		$(this).append($select_wrap);
    });
	$('.options.select_fill_in .option').on('click',function(){
	  gf_type = $(this).attr('data-gf-field');
	  val = $(this).children('.data').html();
	  $('.'+gf_type+'.select_sync select').val(val);
    });
}

function setupHeaderAnimation () {
  clearTimeout($.data(this, 'timer'));
  $.data(this, 'timer', setTimeout(function(){
    animateHeader();
  }, 75));
};

// Hide and show txt and arrow.
function hideTxtArrow(item){
    item.find(".arrow").fadeOut();
    item.find(".txt").fadeOut().css('height', 'auto');
}
function showTxtArrow(item){
    item.find(".arrow").fadeIn();
    item.find(".txt").fadeIn().css('height', 'auto');
}

$.prototype.animateMinHeight = function(minHeight, height) {
  opts = {
    'min-height': minHeight,
  }
  if(typeof height != 'undefined') {
    opts.height = height;
  }
  this.animate(opts, {duration:300, queue:false});
}

function prettyNumber(val){
  while (/(\d+)(\d{3})/.test(val.toString())) {
    val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
  }

  return val;
}

var hitTheBottom    = 0;
var baseNumberCache = $('footer .txt .number').text();

function scrollbarInit() {
    
  //scrollbar
	// destroy existing 
	$('.btn_select .options .box').mCustomScrollbar("destroy");
	// init
  $(".btn_select .options .box").mCustomScrollbar();

  //select
  $(".btn_select").click(function(e){
        e.stopImmediatePropagation();
				var $this = $(this);
				if($this.find(".box").hasClass('active')){
					$this.find(".options").css('visibility','hidden');
					$this.find(".box").removeClass("active");
				} else {
	        $this.find(".options").css('visibility','visible');
	        $this.find(".box").addClass("active");
	        e.stopPropagation();
				}
  });

    //Set the selects always up
    // Change this selector to find whatever your 'boxes' are
    var boxes = $(".btn_select");

    // Set up click handlers for each box
    boxes.click(function() {
        var el = $(this), // The box that was clicked
            max = 0;

        // Find the highest z-index
        boxes.each(function() {
            // Find the current z-index value
            var z = parseInt( $( this ).css( "z-index" ), 10 );
            // Keep either the current max, or the current z-index, whichever is higher
            max = Math.max( max, z );
        });

        // Set the box that was clicked to the highest z-index plus one
        el.css("z-index", max + 2 );
    });
        
  $(".btn_select .options .option").click(function(e){
      value = $(this).find(".data").text();
      label = $(this).find("p:last-child").text();
      $(this).closest(".btn_select").find(".state").html(label);
      $(".btn_select .box").removeClass("active");
      $(".btn_select .options").css('visibility', 'hidden');
      e.stopPropagation();
  });

  $(document).mouseup(function (e){
      var container = $(".btn_select .options");

      if (container.has(e.target).length === 0){
          container.css('visibility','hidden');
      }

      var container = $(".btn_select .box");

      if (container.has(e.target).length === 0){
          container.removeClass('active');
      }
  });

    //select colors
  $(".btn_select_color .options .option").click(function(){
        color = $(this).find("span").attr('style');
        $(this).closest(".btn_select_color").children(".box").find(".color").attr('style', color);
  });

}

function fixDatePickerPos(textbox, instance) {
  instance.dpDiv.css({
      marginTop: '-76px'
  });
}      

function globalInit() {
	
	if(is_touch_device){
		$('body').addClass('touch');
		
	}
	
	// Listen to dom changes and render drop downs if form changes and popup for confirmation.

  if($('html').hasClass('ie9')){
      document.body.addEventListener("DOMNodeInserted", function(e) {
      var nodeTag = e.target.tagName;
      var $target = $(e.target);
      if(nodeTag === 'FORM'){
        setupGforms();
        scrollbarInit();
      }
          
      if($target.attr('id') === "gforms_confirmation_message"){
        CenterItem('.msg');         
        // dont hide the form on the home page.
        if (! $target.hasClass('gform_confirmation_message_1')){
          $target.hide();     
        }

        $('.msg .cont').html($target.html());
        $('.msg').fadeIn();
      }
          
    }, false);
  }
	
	
	
	$('.confirm.close').on('click', function(){
		$(this).parent().fadeOut();
	});
	
	$(document).ajaxStart(function(){
		$('.ajax-logo').addClass('show');
	});
	
	$(document).ajaxStop(function(){
		$('.ajax-logo').removeClass('show');
	});
		 
		 
  $('.accordion').accordion({
      icon: false,
      active: true,
      header: '.head',
      collapsible: true,
      heightStyle: "content"
  });
    
  $('.accordion .head').click(function(){
      scrollbarInit();
  });

  $('.accordion .head').click(function(){
      $(this).next().find(".slide").carouFredSel({
          items: 4,
          direction: "left",
          pagination: "#pager",
          prev: {
              button: ".prev",
              key: "left"
          },
          next: {
              button: ".next",
              key: "right"
          },
          height : "auto",
          padding : 10,
          scroll : {
              items: 1,
              easing: "easeInOutCubic",
              duration: 1000,
              pauseOnHover: true
          },
          auto: { play: false }
      });
  });

  //mailing main arrow animation
  $(".main .mailing form").hover(function() {
      $(this).find("input[type='submit']").animate({"background-position-x": "16px"}, { duration: 300 });
  }, function () {
      $(this).find("input[type='submit']").animate({"background-position-x": "11px"}, { duration: 300 });
  });

  //mailing footer arrow animation
  $("footer .mailing form").hover(function() {
      $(this).find("input[type='submit']").animate({"right": "7px"}, { duration: 300 });
  }, function () {
      $(this).find("input[type='submit']").animate({"right": "12px"}, { duration: 300 });
  });

  $(window).scroll(function(){
    setupHeaderAnimation();
  });

  $(".main_accordion > li > a").click(function(e){
    // need to add hover intent and animation for color backgrounds.
    e.preventDefault();
		

	
    var $this = $(this),
    liW = 0,
    speed = 400;
						
		if($this.hasClass('skip-open')){
			window.location.href = $this.attr('href');
			return;
		
		}
		
	  if (!$this.next().length > 0 || $this.hasClass('open')){
	     window.location.href = $this.attr('href');
	     return;
	   } 	

    function openMenu (el) {
      $(".open").parent().animate({width: 75})
      el.parent().siblings().children('a').removeClass('open');
      el.next().children().each(function(e){
        liW = liW + $(this).width() + 33;
        speed = speed + 100;

        if($(this).next().length === 0){
          var $parentLi = $(this).parent(),
              bgColor = ["#13ada8", "#8dc640", "#ee2a7b", "#fbb040", "#04726e"];

          $parentLi.parent().siblings().removeClass('active').css({backgroundColor : ""});
          $parentLi.parent().addClass('active').css({backgroundColor : bgColor[$parentLi.parent().index()]});
          $parentLi.width(liW)
          $parentLi.parent().animate({width : liW + 75 }, speed);
        }
      });
    }

    if ($this.hasClass('open')) return;
    $this.addClass('open');
    openMenu($this);
  });


  //btn_lin_1, btn_link_2 arrow animation
  $(".btn_link_1, .btn_link_2 .first_title").hover(function() {
      $(this).find(".arrow").animate({"left": "5px"}, { duration: 300 });
  }, function () {
      $(this).find(".arrow").animate({"left": "0px"}, { duration: 300 });
  });

  //btn_submit arrow animation
  $(".btn_submit").hover(function() {
      $(this).find(".arrow").animate({"right": "5px"}, { duration: 300 });
  }, function () {
      $(this).find(".arrow").animate({"right": "10px"}, { duration: 300 });
  });

  //validate forms
  $("form.form_1").validate({
    focusCleanup: true,
    rules: {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      city: {
        required: true
      },
      message: {
        required: false
      }
    },
    wrapper: 'span',
    errorPlacement: function(error, element) {
      error.addClass('errorbox');
      error.insertAfter(element);
    },
    messages: {
      name:    "Please enter your full first name",
      email:   "Please enter your full first email",
      city:    "Please enter your full first city",
      message: "Please enter your full message"
    }
  });

  setupGforms();
  renderDropDownOnTemplate();
	scrollbarInit();	
	animateFooter();



};

// Begin Sections
function homeInit() {
	
	

	
	function animateHomeButton(){
		var $btnBorder = $('#btn-border');
		$btnBorder.animate({
			width : "80px",
			top: "-40px",
			left: "5px"						
		}, function(){
		$btnBorder.animate({
			width : "100px",
			top: "-45px",
			left: "-5px"
			}
		)
		})	
	}
	setInterval(animateHomeButton, 5000);
	
	$(".timeago").timeago();
	
  var treesPlantedContainer = $('.section_4 .txt h2');
  var treesPlanted  = treesPlantedContainer.text();
  var treesPlantedNumber = parseFloat(treesPlanted.replace(",", "")).toFixed(3) * 1;
  var initialNumber = 0;
  var section4      = $('.section_4');
  var sectionOffset = section4.offset().top;
  var sectionEnd    = sectionOffset + section4.height();
	var lastScrollTop = 0;

  treesPlantedContainer.text(prettyNumber(initialNumber));

  function calculateNumber(currentPos) {
    finalHeight = $('.section_5').offset().top;

    var newPercentage = (currentPos / finalHeight).toFixed(3) * 1;
    if (newPercentage > 1) {
      newPercentage = 1
    }
    return (treesPlantedNumber * newPercentage).toFixed(3) * 1;
  }
	
  function animateTreesPlanted () {
    scrollPos    = $(window).scrollTop();
    fullPos      = scrollPos + $(window).height();
    newNumber    = Math.ceil( calculateNumber(fullPos).toFixed(3) * 1 );				
    treesPlantedContainer.text(prettyNumber(newNumber));
  };


  $(window).scroll(function(e){		
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
			animateTreesPlanted();
   }
   lastScrollTop = st;
  });
	


  // infinite carrousel
  $("div.tw").smoothDivScroll({
    manualContinuousScrolling: true,
    touchScrolling: true,
    autoScrollingMode: "onStart"
  });

  //btn_round_1 arrow animation
  $(".btn_round_1").hover(function() {
      $(this).animate({"top": "-41px"}, { duration: 300 });
  }, function () {
      $(this).animate({"top": "-45px"}, { duration: 300 });
  });

  function adjustScrollPosition() {
    viewportHeight = $(window).height();
    newBottom      = viewportHeight - 630;
    heightPages    = viewportHeight;
    heightMailingPage = viewportHeight / 2;
		
    //$('.scrolledArea').offset({top: newBottom , left: 0 });
    //$('footer').css('top', newBottom);
    $('.section_1,.section_3,.section_4').height(heightPages)
    $('.section_2').height($('#s02 img').height());
    $('.section_1 .centerModule').height(heightPages - 100)
    $('section.mailing').height(heightMailingPage + 35)
    $('.section_3 img').css('top',heightPages - 455)
    $('#verticalspymenu').css('top', heightMailingPage - 76)
  }
	
	function centerStoreFinder() {
		var $storeFinderPanel = $(".find-locations-home"),
		topPos =  parseInt($("#s03").height() / 2 - 160);
		$storeFinderPanel.css({top : topPos});
	}

  setTimeout(centerStoreFinder, 500);
  adjustScrollPosition();
	
 // set width of scrollable div for touch devices on load.
	if(is_touch_device){
		$(".scrollableArea").css({width : window.innerWidth})
		$("div.tw").smoothDivScroll("recalculateScrollableArea");
	}

	

		
  $(window).resize(function () {
		centerStoreFinder;
    adjustScrollPosition();
		var winW = $(window).width()
		if(is_touch_device){
			winW = window.innerWidth;
		}
		
		// set width of scrollable div
		$(".scrollableArea").css({width : winW });
		// recalculate scroll.
		$("div.tw").smoothDivScroll("recalculateScrollableArea");
  });


  var current;

  $(function() {
    $('.btn_round_1').click(function(event, delta){
      event.preventDefault();
      $('body').scrollTo( $('.section_2'), 1000);
      $('section').removeClass('current');
      $('.section_2').addClass('current');
    })
    $('#verticalspymenu li a').click(function(event, delta) {
      event.preventDefault();
      if ($(this).hasClass("s01")){
        $('body').scrollTo( $('.section_1'), 1000);
        $('section').removeClass('current');
        $('.section_1').addClass('current');
      }
      if ($(this).hasClass("s02")){
        $('body').scrollTo( $('.section_2'), 1000);
        $('section').removeClass('current');
        $('.section_2').addClass('current');
      }
      if ($(this).hasClass("s03")){
        $('body').scrollTo( $('.mailing'), 1000);
        $('section').removeClass('current');
        $('.mailing').addClass('current');
      }
      if ($(this).hasClass("s04")){
        $('body').scrollTo( $('.section_3'), 1000);
        $('section').removeClass('current');
        $('.section_3').addClass('current');
      }
      if ($(this).hasClass("s05")){
        $('body').scrollTo( $('.section_4'), 1000);
        $('section').removeClass('current');
        $('.section_4').addClass('current');
      }
      if ($(this).hasClass("s06")){
        $('body').scrollTo( $('.section_5'), 1000);
        $('section').removeClass('current');
        $('.section_5').addClass('current');
      }
      // event.preventDefault();
    });
  });

  

}

function aboutInit() {
  about = this
  $('.main_accordion .m03 > a').removeClass('skip-open').trigger('click');

  //carrousel_1
  $(".carrousel_1 ul > li").click(function(){
    if($(this).hasClass('active')){
      displacement = $(this).prevAll().length*333
      $(this).parent().animate({"left": "+=" + displacement}, {duration: 300, queue:false})
      $(this).find(".txt").css('display','none');
      $(this).animate({"width": "205"}, {duration:300, queue:false});
      $(this).removeClass('active');
    }else{
      displacement = $(this).prevAll().length*333
      $(this).parent().animate({"left": "-=" + displacement}, {duration: 300, queue:false})
      $(this).animate({"width": "835"}, {duration:300, queue:false, complete: function(){
          $(this).find(".txt").fadeTo('fast', 1);
      }});
      $(this).addClass('active');
    }
  });

  $(".carrousel_1 #pager").click(function(){
      $('.carrousel_1 ul > li').find(".txt").css('display','none');
      $('.carrousel_1 ul > li').animate({"width": "205"}, {duration:300, queue:false});
      $('.carrousel_1 ul > li').removeClass('active');
  });

  $(".carrousel_1 .prev, .carrousel_1 .next").click(function(){
      $('.carrousel_1 ul > li').find(".txt").css('display','none');
      $('.carrousel_1 ul > li').animate({"width": "205"}, {duration:300, queue:false});
      $('.carrousel_1 ul > li').removeClass('active');
  });


    $(".carrousel .prev").hover(function() {
        $(this).animate({"left": "2px"}, { duration: 300 });
    }, function () {
        $(this).animate({"left": "7px"}, { duration: 300 });
    });

    $(".carrousel .next").hover(function() {
        $(this).animate({"right": "2px"}, { duration: 300 });
    }, function () {
        $(this).animate({"right": "7px"}, { duration: 300 });
    });

  //slide 1
  $(".carrousel_1 .slide").carouFredSel({
      items: 3,
      direction: "left",
      pagination: "#pager",
      prev: {
          button: "#prev",
          key: "left"
      },
      next: {
          button: "#next",
          key: "right"
      },
      height: 300,
      padding: 5,
      scroll: {
          items: 3,
          easing: "easeInOutCubic",
          duration: 1000,
          pauseOnHover: true
      },
      auto: { play: false }
  }).find("li").click(function(){
      var deviation = parseInt( $("#foo1_deviation").val() );
      $(".slide").trigger("slideTo", [$(this), deviation]);
  }).css("cursor", "pointer");

  //video_play 
  $("#youtube-player-container").tubeplayer({
    width: "100%", // the width of the player
    height: 450, // the height of the player
    allowFullScreen: "true", // true by default, allow user to go full screen
    initialVideo: $("#youtube-player-container").attr('data-vid'), // the video that is loaded into the player
    preferredQuality: "default",// preferred quality: default, small, medium, large, hd720
    onPlay: function(id){$("#youtube-player-container").find(".icon").hide();}, // after the play method is called
    onPause: function(){}, // after the pause method is called
    onStop: function(){}, // after the player is stopped
    onSeek: function(time){}, // after the video has been seeked to a defined point
    onMute: function(){}, // after the player is muted
    onUnMute: function(){} // after the player is unmuted
  });

}



function nutritionInformationHooks() {
  //slides extra info list_prod
  $(".list_items_prod .items_info_extra .slide > li:not('.in_toppings') .avatar").on('click', function(e){	
		var $el = $(this).parent(),
		    openH = $el.hasClass('cake') ? 920 : 762;
									
		$('html, body').animate({ scrollTop: $el.parent().offset().top-100 }, 500);

   
    if($el.hasClass("active")){
			$el.removeClass("active");
			$el.closest(".slide").animateMinHeight(420, 420);
			$el.closest(".caroufredsel_wrapper").animateMinHeight(420, 420);
			$el.find(".txt").css('height', 'auto');
			hideTxtArrow($el);
    }else{
			$(".list_items_prod .items_info_extra .slide li").removeClass("active")
      $(".slide").animateMinHeight(420, 420)
      $el.closest(".caroufredsel_wrapper").animateMinHeight(420, 420)
			hideTxtArrow($(".list_items_prod .items_info_extra .slide li"));
			$el.addClass("active");
			$el.fadeIn("slow");
			$el.closest(".items_info_extra").animateMinHeight(openH);
			$el.closest(".slide").animateMinHeight(openH);
			$el.closest(".caroufredsel_wrapper").animateMinHeight(openH);
			$el.find(".txt").animateMinHeight(160);
			showTxtArrow($el);
    }
		bindSubmitForm();
  });
	
  $(".list_items_prod .items_info_extra .slide li .txt .close").click(function(e) {
      e.stopPropagation();
      $this = $(".list_items_prod .items_info_extra .slide li");
      $this.removeClass("active");
      $this.closest(".slide").animateMinHeight(420, 420);
      $this.closest(".caroufredsel_wrapper").animateMinHeight(420, 420);
      $this.find(".txt").animateMinHeight(0, 0);
      hideTxtArrow($this);
  });

}





function flavorsInit() {	
	$('.main_accordion .m02 > a').removeClass('skip-open').trigger('click');
		
  $(".carrousel_3 .prev").hover(function() {
      $(this).animate({"left": "275px"}, { duration: 300 });
  }, function () {
      $(this).animate({"left": "280px"}, { duration: 300 });
  });

  $(".carrousel_3 .next").hover(function() {
      $(this).animate({"right": "235px"}, { duration: 300 });
  }, function () {
      $(this).animate({"right": "240px"}, { duration: 300 });
  });


  nutritionInformationHooks();



  $.fn.slideFadeToggle  = function(speed, easing, callback) {
    return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
  };

  $('.icon_key').click(function() {
    $(this).toggleClass('active');
    $('.icon_key ul').slideToggle();
  })
	$(".icon_key").trigger('click');
	
	$('.sub_menu li a').click(function(e) {		
		e.preventDefault();
		$('.sub_menu li a').removeClass('active');
		$cur_link = $(this);  
		var term_id = $(this).attr('data-term-id');				
		var container = $("#list_container");
		
		$.ajax({
			type: "post",
			context: this,
			dataType: "json",
			url: headJS.ajaxurl,
			data: {
				action: "load_flavors",
				term_id: term_id
			},
			success: function(response) {							
					container.fadeOut('slow', function() {
					container.html(response['html']).fadeIn('slow');
					nutritionInformationHooks();
				});
				$cur_link.addClass('active');
			}
		});
	});


  function initializeFilter() {
    var firstElement   = $('.subBox > ul > li').first().find('a');
    var firstLinkTxt   = firstElement.html();
    var selectedFilter = $('.selected');
		
		console.log(firstElement.position().top);
		console.log(firstElement.position().left);
		
    selectedFilter.offset(firstElement.position());
    selectedFilter.html(firstLinkTxt);
    selectedFilter.show();				
  }

  function enableFilterSelection() {
    $('.subBox > ul > li > a').click(function (e) {
      e.preventDefault();

      var pickedFilter   = $(this);
      var pickedLinkTxt  = pickedFilter.html();
      var selectedFilter = $('.selected');

      selectedFilter.html(pickedLinkTxt);
      selectedFilter.animate({"left": pickedFilter.position().left-10}, { duration: 100 });
    });
  }
	
  if($(".carrousel_3").length > 0) {
      $(".carrousel_3 .slide").carouFredSel({
          items: 1,
          direction: "left",
          prev: {
              button: "#prev",
              key: "left"
          },
          next: {
              button: "#next",
              key: "right"
          },
          height: 345,
          padding: 5,
          scroll: {
              items: 1,
              easing: "easeInOutCubic",
              duration: 1000,
              pauseOnHover: true,
              onAfter: function(data) {
                oldElement = data.items.old.first().attr('id');
                selectedElement = data.items.visible.first().attr('id');
								visibleElement = data.items.visible.first();
                $('.' + oldElement + '_list').fadeOut("slow");
                $('.' + selectedElement + '_list').fadeIn("slow");							
								$('.subBox li.first a', visibleElement).trigger('click');
								thisCat = $('h2', visibleElement).text();
								$('.m02 a').removeClass('active');
								if(thisCat === "Yogurt"){
									$('a[href="/flavors/?yogurt"]').addClass('active');								
								} else if(thisCat === "Toppings") {
									$('a[href="/flavors/?toppings"]').addClass('active');								
								} else if(thisCat === "Cakes"){
									$('a[href="/flavors/?cakes"]').addClass('active');							
								}								
              }
          },
          auto: { play: false }
      });
  }
	
	var url = window.location.href;
	// 
	if(url.indexOf("toppings") > 0)
	{
		$(".carrousel_3 .slide").trigger("slideTo", 1);		
		$('a[href="/flavors/?toppings"]').addClass('active');
		$(".slide li:eq(1) a.active").trigger('click');				
	} 
	  else if(url.indexOf("yogurt") > 0)
	{
		$('a[href="/flavors/?yogurt"]').addClass('active');	
		$(".slide li:eq(0) a.active").trigger('click');				
	} else if(url.indexOf("cakes") > 0){
		$(".carrousel_3 .slide").trigger("slideTo", 2)
		$('a[href="/flavors/?cakes"]').addClass('active');
		$(".slide li:eq(2) a.active").trigger('click');				
	}
	
  initializeFilter();
  enableFilterSelection();

}

function franchiseInit() {
	$('.main_accordion .m04 > a').removeClass('skip-open').trigger('click');
  //slide 2
  if($(".carrousel_2").length > 0) {
      $(".carrousel_2 .slide").carouFredSel({
          responsive: false,
					width: 590,
					align: 'center',
          items: 1,
          direction: "left",
          pagination: "#pager",
          prev: {
              button: "#prev",
              key: "left"
          },
          next: {
              button: "#next",
              key: "right"
          },
          height : 190,
          padding : 5,
          scroll : {
              items: 1,
              easing: "easeInOutCubic",
              duration: 1000,
              pauseOnHover: true
          },
          auto: { play: false }
      });
  }
}

function minutesToHours(minutes) {
    var hours_dec = minutes / 60;
    var hours = parseInt(hours_dec);
    var dec = parseInt((hours_dec - hours) * 100);
    if(dec == 0) {
        dec = '00';
    } else if (dec == 25) {
        dec = '15';
    } else if (dec == 50) {
        dec = '30';
    } else if (dec == 75) {
        dec = '45';
    }
    return "" + hours + ":" + dec;
};

function startAndEnd(start, end) {
    return "" + minutesToHours(start) + " - " + minutesToHours(end);
};

function dateTimeSliderInit(minHour, maxHour, start, end) {

  if(is_touch_device) return;
	
  var min_hour = minHour * 60;
  var max_hour = maxHour * 60;

  $(".ranges").slider({
      range: true,
      min: min_hour,
      max: max_hour,
      step: 30,
      values: [start * 60, end * 60],
      slide: function( event, ui ) {				 
          text = startAndEnd(ui.values[0], ui.values[1]);
          $(this).parent().find('.amount').val(text);
      }
  });
  $(".amount").val(
      startAndEnd(
          $( ".ranges" ).slider( "values", 0 ),
          $( ".ranges" ).slider( "values", 1 )
  ));

}

function careersInit() {

	if($('body').hasClass('page-id-273')){
		$('.main_accordion .m04 > a').removeClass('skip-open').trigger('click');
	}
			
	$(".gf_step").each(function(){
		$(this).append('<div class="box_2"><div class="box icon icon_1"></div></div>')
	});    
	
	$('.gf_step_pending').each(function(){
		var $clone = $(this).prop('outerHTML');          
		$('<div class="gf_page_steps">' + $clone + '</div>').insertBefore('.btn_link_1');
	}); 

  var jobCounter = 0, 
    jobTemplate = $('#emp_history_template').html(),
    jobContainer = $('#emp_history_container');

  var edCounter = 0, 
    edTemplate = $('#ed_history_template').html(),
    edContainer = $('#ed_history_container');

  var refCounter = 0, 
    refTemplate = $('#ref_history_template').html(),
    refContainer = $('#ref_history_container');

  function addJobElement() {
    jobCounter = jobCounter + 1;
    output = Mustache.render(jobTemplate, {n: jobCounter});
    jobContainer.append(output);
  }

  function addEducationElement() {
    edCounter = edCounter + 1;
    output = Mustache.render(edTemplate, {n: edCounter});
    edContainer.append(output);
  }

  function addReferencesElement() {
    refCounter = refCounter + 1;
    output = Mustache.render(refTemplate, {n: refCounter});
    refContainer.append(output);
  }

  function setupLabel() {
      if ($('.label_check input').length) {
          $('.label_check').each(function(){
              $(this).removeClass('c_on');
          });
          $('.label_check input:checked').each(function(){
              $(this).parent('label').addClass('c_on');
          });
      };
  };


  function careersDatePickersInit() {
    $(".from").datepicker({
      dayNamesMin: [ "S", "M", "T", "W", "T", "F", "S" ],
      firstDay: 1,
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( ".to" ).datepicker( "option", "minDate", selectedDate );
      },
      beforeShow: fixDatePickerPos
    });
    $(".to").datepicker({
      dayNamesMin: [ "S", "M", "T", "W", "T", "F", "S" ],
      firstDay: 1,
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( ".from" ).datepicker( "option", "maxDate", selectedDate );
      },
      beforeShow: fixDatePickerPos
    });
  }

  function leaveFormOnVisiblePosition() {
    $(window).scrollTo({ top: 640, left: 0}, 800);
  }

  $('#section1_next').click(function(e) {
    $('#section2').click();
    leaveFormOnVisiblePosition();
    e.preventDefault();
  });
  $('#section2_next').click(function(e) {
    $('#section3').click();
    leaveFormOnVisiblePosition();
    e.preventDefault();
  });
  $('#section3_next').click(function(e) {
    $('#section4').click();
    leaveFormOnVisiblePosition();
    e.preventDefault();
  });

  $('.label_check input').click(function(e){
    e.stopPropagation();
    var checked = $(this).is(':checked');
    var containerLabel = $(this).parent();
    var containerDiv = containerLabel.parent();
    var sliderElement = containerDiv.find('.ranges');

    if(checked) {
      containerLabel.removeClass('c_off').addClass('c_on');
      containerDiv.find(".amount").val(startAndEnd(
          sliderElement.slider( "values", 0),
          sliderElement.slider( "values", 1)
    ));
    } else {
      containerLabel.removeClass('c_on').addClass('c_off');
      containerDiv.find(".amount").val('N/A');
    }
    sliderElement.slider('option', 'disabled', !checked);

  });



  $('#more_job').click(function(e) {
    e.preventDefault();
    addJobElement();
    careersDatePickersInit();
  });

  $('#more_school').click(function(e) {
    e.preventDefault();
    addEducationElement();
    careersDatePickersInit();
  });

  $('#more_references').click(function(e) {
    e.preventDefault();
    addReferencesElement();
    careersDatePickersInit();
  });

  dateTimeSliderInit(6, 19, 9, 17);
  addJobElement();
	setupLabel();
  addEducationElement();
  addReferencesElement();
  careersDatePickersInit();

}

function franchiseApplyInit() {
  //validate forms
  $("form.form_2").validate({
    focusCleanup: true,
    rules: {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      city: {
        required: true
      },
      message: {
        required: false
      }
    },
    messages: {
      name:    "Please enter your full first name",
      email:   "Please enter your full first email",
      city:    "Please enter your full first city",
      message: "Please enter your full message"
    }
  });
}

function franchiseHowInit() {
		$('.main_accordion .m04 > a').removeClass('skip-open').trigger('click');
}
function franchiseTestimonialsInit() {
		$('.main_accordion .m04 > a').removeClass('skip-open').trigger('click');
}

function shopInit(){
	
	$('.btn_shop').click(function(e){
		e.preventDefault();
		
		var parent = $(this).data('parent');
			  $parent = $(parent),
				amt = $.trim($('.size .first_title', $parent).text()),
				$opts = $('.pp-select', $parent),
				$ppForm	= $('form', $parent);
				
				if(amt === "Choose"){
					alert("Please make a selection before proceeding");
				} else {				
					$opts.empty().append('<option value="'+amt+'">'+amt+'</option>');																
					$ppForm.submit();				
				}																														
	});
}


// Adding text to franchise apply form
$("#gform_9 > .gform_heading > .gform_description").html("<span class='tell-us'>Think you can handle the sweet reward of financial freedom? Tell us why:<br><span>*Please answer all questions. This is not a contract, and supplying or completing this form incurs no obligation on either party.</span></span>");

$("#s03 .left ul li a").click(function(e) {
      e.preventDefault();
      $(this).toggleClass('active');
    });


