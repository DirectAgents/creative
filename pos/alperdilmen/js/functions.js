(function($) {
  "use strict";

  $(document).foundation({
    equalizer : {
      // Specify if Equalizer should make elements equal height once they become stacked.
      equalize_on_stack: true
    },
    accordion: {
      // allow multiple accordion panels to be active at the same time
      multi_expand: false,
      // allow accordion panels to be closed by clicking on their headers
      // setting to false only closes accordion panels when another is opened
      toggleable: true
    }
  });

  //Run When Document Ready
  $(document).on('ready', function() {
    initPageFx();
    initSwitcher();
    initFullScreen();
    initAutoHideNav();
    initMegaMenu();
    initOnePageScroll();
    initPogo();
    initCounters();
    initWow();
    initProgressBars();
    initMailChimp();
    initBackTop();
    initLightboxGallery();
    initSharingButtons();
  });

  //Animsition - Page Effects
  //===================================
  function initPageFx() {
    $('.animsition').animsition({
      inClass: 'fade-in',
      outClass: 'fade-out-down-sm',
      inDuration: 1000,
      outDuration: 800,
      linkElement: '#primaryMenu a:not([target="_blank"]):not([href^=#])',
      loading: true,
      loadingParentElement: 'body', //animsition wrapper element
      loadingClass: 'loadSpinner',
      unSupportCss: [
                      'animation-duration',
                      '-webkit-animation-duration',
                      '-o-animation-duration'
                    ],
      overlay : false,
      overlayClass : 'animsition-overlay-slide',
      overlayParentElement : 'body'
    });
  }

  //Style Switcher
  function initSwitcher() {
    $('#switcherIcon').on('click', function() {   
      $('#switcher').toggleClass('open');
    });

    $('#buyIcon').on('click', function() {   
      $('#buy').toggleClass('open');
    });
  }

  //Full Screen Hero
  //===============================================================================
  function initFullScreen() { //Set hero wrapper to window height
    var wHeight = $(window).height();
    if (wHeight > 480 && !$('.heroWrapper').hasClass('no-window')) {
        $('.heroWrapper .heroFullScreen').height(wHeight);
    }
  }

  //Auto Hide Navigation
  //===============================================================================
  function initAutoHideNav() {
    var header = document.querySelector('#autoHide');

    new Headroom(header, {
      tolerance: {
        down : 2,
        up : 5
      },
      offset : 100,
      classes: {
        initial: 'slide',
        pinned: 'slideReset',
        unpinned: 'slideUp'
      }
    }).init();
  }

  //MegaMenu - Superfish
  //===============================================================================
  function initMegaMenu() {
    $('body #primaryMenu > ul').superfish({
      popUpSelector: 'ul,.megaMenuContent',
      delay: 250,
      speed: 350,
      animation: {opacity:'show'},
      animationOut:  {opacity:'hide'},
      cssArrows: false // disable generation of arrow mark-up
    });

    $('#mobileMenuTrigger').on('click', function() {
      $( '#primaryMenu' ).toggleClass('show');
      return false;
    });
  }

  //One Page Scroll
  //===============================================================================
  function initOnePageScroll() {
    $('a[href^="#section"]').smoothScroll({
        easing: 'easeOutCubic',
        speed: 1200,
        exclude: ['#trigger-overlay', '.overlay-close']
    });
  }

  //Pogo Slider
  //===============================================================================
  function initPogo() {
    $('#heroSlider').pogoSlider({
      autoplay: true,
      autoplayTimeout: 6000,
      displayProgess: true,
      preserveTargetSize: false,
      targetWidth: 1000,
      targetHeight: 300,
      responsive: true,
      pauseOnHover: false
    }).data('plugin_pogoSlider');
  }

  //Counters
  //===============================================================================
  function initCounters() {
    $('.timer').appear(function () {
      $(this).countTo();
    });   
  }

  //WOW Animation
  //===============================================================================
  function initWow() {
    new WOW().init();
  }

  //Progress Bars
  //===============================================================================
  function initProgressBars() {
    $('.pro-bar').each(function(i, elem) {
      var $elem = $(this),
        percent = $elem.attr('data-pro-bar-percent'),
        delay = $elem.attr('data-pro-bar-delay');

      if (!$elem.hasClass('animated'))
      $elem.css({ 'width' : '0%' });

      $(elem).appear(function () {
        setTimeout(function() {
          $elem.animate({ 'width' : percent + '%' }, 2000, 'easeInOutExpo').addClass('animated');
        }, delay);
      });
    });
  }

  //MailChimp
  //===============================================================================
  function initMailChimp() {
    $('#mc_form').ajaxChimp({
        language: 'pix',
        // Replace url with your unique list
        url: 'http://pixelosaur.us3.list-manage.com/subscribe/post?u=1056582cdc91fdd7076a2fe2d&id=2ca5725d55'
    });

    //Mailchimp translation
      //
      // Defaults:
      //'submit': 'Submitting...',
      //  0: 'We have sent you a confirmation email',
      //  1: 'Please enter a value',
      //  2: 'An email address must contain a single @',
      //  3: 'The domain portion of the email address is invalid (the portion after the @: )',
      //  4: 'The username portion of the email address is invalid (the portion before the @: )',
      //  5: 'This email address looks fake or invalid. Please enter a real email address'

    $.ajaxChimp.translations.pix = {
        'submit': 'Submitting...',
        0: '<i class="icon-check"></i> Thank you! We have sent you a confirmation email!',
        1: '<i class="icon-cross"></i> You must enter a valid e-mail address.',
        2: '<i class="icon-cross"></i> E-mail address is not valid.',
        3: '<i class="icon-cross"></i> E-mail address is not valid.',
        4: '<i class="icon-cross"></i> E-mail address is not valid.',
        5: '<i class="icon-cross"></i> E-mail address is not valid.'
    };
  }

  //Back To Top
  //===============================================================================
  function initBackTop() {
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 500,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.backTop');

    //hide or show the "back to top" link
    $(window).on('scroll', function() {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('is-visible') : $back_to_top.removeClass('is-visible fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function (event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, scroll_top_duration
      );
    });
  }

  //Lightbox Gallery
  //===============================================================================
  function initLightboxGallery() {
    $('.lightboxGallery').magnificPopup({
      delegate: 'a',
      type: 'image',
      closeOnContentClick: false,
      mainClass: 'mfp-with-zoom mfp-img-mobile',
      fixedContentPos: true,
      overflowY: 'hidden',
      closeBtnInside: false,
      image: {
        verticalFit: true,
        titleSrc: function(item) {
          return item.el.attr('title');
        }
      },
      gallery: {
        enabled: true,
        navigateByImgClick: true
      },
      zoom: {
        enabled: true,
        duration: 300, // don't foget to change the duration also in CSS
        easing: 'ease-in-out',
        opener: function(element) {
          return element.find('img');
        }
      }
      
    });
  }
  
  //Pretty Social (Sharing Buttons)
  //===============================================================================
  function initSharingButtons() {
    $('.prettySocial').prettySocial();
  }

})(jQuery);
