var geocoder;
var map;
var markers = Array();
var results = Array();
var infos = Array();
var global_radius = 160934;
var addrMarker;
var locationTemplate = $('#location_template').html();

$(".search-by-zipcode").submit(function(e) {
    var zipcode = $("input[name=zipcode]").val()
    findAddress(zipcode, 'zipcode');
    e.preventDefault();
});

$(".search_by_state .options .option").click(function(e){
    value = $(this).find(".data").text();
    label = $(this).find("p:last-child").text();
    $(this).closest(".btn_select").find(".state").html(label);
    $(".btn_select .box").removeClass("active");
    $(".btn_select .options").css('visibility', 'hidden');
    findAddress(value, 'state');
    e.stopPropagation();
});

//search field arrow animation
$(".search .field form").hover(function() {
    $(this).find(".arrow").animate({"right": "5px"}, { duration: 300 });
}, function () {
    $(this).find(".arrow").animate({"right": "10px"}, { duration: 300 });
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


$(window).resize(function() {
    CenterItem(".msg");
});

// Distance calc funtions to avoid doing API calls to Google Maps to get the distance
rad = function(x) {return x*Math.PI/180;}

distHaversine = function(p1, p2) {
  var R = 6371; // earth's mean radius in km
  var dLat  = rad(p2.lat() - p1.lat());
  var dLong = rad(p2.lng() - p1.lng());

  var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
          Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) * Math.sin(dLong/2) * Math.sin(dLong/2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  var d = R * c;

  return (d * 1.60934).toFixed(1);
}

function initialize() {
    // prepare Geocoder
    geocoder = new google.maps.Geocoder();

    // set initial position (New York)
    var myLatlng = new google.maps.LatLng(40.7143528,-74.0059731);

    var myOptions = { // default map options
        zoom: 14,
        center: myLatlng,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
}

// clear overlays function
function clearOverlays() {
    if (markers) {
        for (i in markers) {
            markers[i].setMap(null);
        }
        markers = [];
        infos = [];
        results = [];
    }
}

// clear infos function
function clearInfos() {
    if (infos) {
        for (i in infos) {
            if (infos[i].getMap()) {
                infos[i].close();
            }
        }
    }
}

// find address function
function findAddress(address, searchType) {
    // script uses our 'geocoder' in order to find location by address name
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) { // and, if everything is ok

            // we will center map
            var addrLocation = results[0].geometry.location;
            map.setCenter(addrLocation);

            // store current coordinates into hidden variables
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();

            // and then - add new custom marker
            addrMarker = new google.maps.Marker({
                position: addrLocation,
                map: map,
                title: results[0].formatted_address
            });
            clearOverlays();
            markers.push(addrMarker);

            findPlacesByField(addrLocation, address, searchType);
        } else {
            alert('No stores in that location.');
        }
    });
}

function sortLocationByDistance(l1, l2) {
  var d1 = l1.distance;
  var d2 = l2.distance;
  return ((d1 < d2) ? -1 : ((d1 > d2) ? 1 : 0));
}

function findPlacesByField(centerLocation, address, field) {
    var cnt = 1;

    $.each(locationsInfo, function(i, location) {
        if(field == 'zipcode' && location.zipcode == address || field == 'state'  && location.state == address) {
            location.position = new google.maps.LatLng(location.lat, location.lng);
            location.distance = distHaversine(centerLocation, location.position);

            setTimeout(function() {
                createMarker(centerLocation, location)
            }, cnt * 1000);
            cnt = cnt + 1;
            results.push(location);
        }
    });

    results.sort(sortLocationByDistance);

    // Destroy and re-create
    if($('#locations_results').length > 0) {
        $('#locations_results').remove();
    }
    $("<div/>", {
        id: 'locations_results',
        class: "accordion accordion_1"
    }).appendTo("#locations_results_container");
    $('.accordion_head').show()
	
	
    // Fill results using the template.
    $.each(results, function(i, location) {
        location.odd_even = (i % 2 == 0) ? 'odd' : 'even';
        output = Mustache.render(locationTemplate, location);
        $('#locations_results').append(output);
    });

	renderDropDownOnTemplate(); // prefill select dropdown 

    resetUI();

}

function createMarker(centerLocation, location) {

    // prepare new Marker object
    var mark = new google.maps.Marker({
        position: location.position,
        map: map,
        title: location.title,
        icon: headJS.templateurl+"/img/16handles_marker.png"
    });
    markers.push(mark);

    // prepare info window
    var infowindow = new google.maps.InfoWindow({
        content: '<div style="overflow: hidden"><img src="img/logo_marker.png" style="float: left; margin-right: 15px;" /><p>' + location.title + '</p><p>Address: ' + location.address + '</p></div>'
    });

    // add event handler to current marker
    google.maps.event.addListener(mark, 'click', function() {
        clearInfos();
        infowindow.open(map,mark);
    });
    infos.push(infowindow);
}
  
function resetUI() {
  dateTimeSliderInit(10, 22, 15, 18);
  Custom.init();
  scrollbarInit();

  $('#datepicker_normal_1, #datepicker_normal_2, #datepicker_normal_3').datepicker({
      minDate: 0,
      dayNamesMin: [ "S", "M", "T", "W", "T", "F", "S" ],
      firstDay: 1,
      beforeShow: fixDatePickerPos
  });
    
  //accordion
  $('.accordion').accordion({
      icon: false,
      active: true,
      header: '.head',
      collapsible: true,
      heightStyle: "content"
  });

    //arrows animation in carrousel
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

  //btn_lin_1, btn_link_2 arrow animation
  $(".btn_left").hover(function() {
      $(this).find(".arrow").animate({"left": "-5px"}, { duration: 300 });
  }, function () {
      $(this).find(".arrow").animate({"left": "0px"}, { duration: 300 });
  });

  //btn_submit arrow animation
  $(".btn_submit").hover(function() {
      $(this).find(".arrow").animate({"right": "5px"}, { duration: 300 });
  }, function () {
      $(this).find(".arrow").animate({"right": "10px"}, { duration: 300 });
  });
 
  //slide 3
  $('.accordion .head').on('click',function(){
      var location_id = $(this).data('locid');

      $(this).next().find("#cakes_slider").carouFredSel({
          items: 4,
          direction: "left",
          prev: {
              button: "#cake_prev_" + location_id,
              key: "left"
          },
          next: {
              button: "#cake_next_" + location_id,
              key: "right"
          },
          height : "variable",
          width : "100%",
          padding : 30,
          scroll: {
              items: 1,
              easing: "easeInOutCubic",
              duration: 1000,
              pauseOnHover: true
          },
          auto: { play: false }
      });

      $(this).next().find(".order_cakes_slider").carouFredSel({
          items: 4,
          direction: "left",
          prev: {
              button: "#order_cake_prev_" + location_id,
              key: "left"
          },
          next: {
              button: "#order_cake_next_" + location_id,
              key: "right"
          },
          height : "variable",
          width : "100%",
          padding : 30,
          scroll: {
              items: 1,
              easing: "easeInOutCubic",
              duration: 1000,
              pauseOnHover: true
          },
          auto: { play: false }
      });
  });

  //slide section
  $('.accordion .head').click(function(){
      $(this).next().find(".slide_section").carouFredSel({
          responsive  : true,
          items               : 1,
          direction           : "left",
          prev                : {
              button  : ".prev_slide_section",
              key     : "left"
          },
          next                : {
              button  : ".next_slide_section",
              key     : "right"
          },
          height : "variable",
          padding : 30,
          scroll : {
              items           : 1,
              easing          : "easeInOutCubic",
              duration        : 1000,
              pauseOnHover    : true
          },
          auto: { play: false }
      }).trigger("linkAnchors", "#links_below");
  });

  // Update quantity and amount for selected cakes + rush cake + delivery
  $('.custom_checkbox').click(function(e) {
    e.stopPropagation();
    $this = $(this);
	
    var total = 0, cnt = 0, tax =0, grand_total = 0;
    var parentForm = $this.closest('form.order_cake');
	var items_html = '', items_to_submit = '';
    parentForm.find('.custom_checkbox input:checked').each(function() {
	  if ($(this).attr('name')=='cake'){
		items_html = items_html + '<div class="item"><p>'+ $(this).data('name') + '""<span class="price">$'+ $(this).data('price')+'</span></p><p class="clarification">Hand Written Message &#8243;<span class="sync_in order_cake_message"></span>&#8243;</p></div>';
		items_to_submit = items_to_submit + $(this).data('name') + '\n';
	  }
	  if ( $(this).attr('name')=='reg_delivery' || $(this).attr('name')=='rush_cake' ){
		items_html = items_html + '<div class="item"><p>'+$(this).data('name')+'<span class="price">$'+ $(this).data('price')+'</span></p></div>';
		items_to_submit = items_to_submit + '+++' +$(this).data('name') + '\n';
	  }		
	  $('.cake_items').html(items_html);
      cnt   = cnt + parseInt($(this).data('cnt'));
      total = total + parseFloat($(this).data('price'));
    });
	
    parentForm.find('.qty').html('Qty: ' + cnt + ' | $' + total.toFixed(2));	
	tax = total * (parseFloat(headJS.tax_percentage) / 100 );
	grand_total = total + tax;
		
	
    $('.msg .order_cake_tax').html(tax.toFixed(2));
    $('.msg .order_cake_total').html(grand_total.toFixed(2));
    $('.input_form.order_cake .order_cake_cakes textarea').html(items_to_submit);

  });

  //slides extra info carrousel
  $(".carrousel_items_prod .items_info_extra .slide li").click(function(e){
      // console.log('uno');
      e.stopPropagation();
      $this = $(this);
      
      $(".slide_section").trigger("updateSizes");

      $this.closest(".caroufredsel_wrapper").parent().closest(".caroufredsel_wrapper").animate({"height": "1200px"}, {duration:300, queue:false});
      $this.removeClass("active");

      hideTxtArrow($this);

      $this.addClass("active");
      $this.closest(".items_info_extra").animateMinHeight(600);
      $this.closest(".slide").animateMinHeight(600);
      $this.closest(".caroufredsel_wrapper").animateMinHeight(600);
      $this.find(".txt").animateMinHeight(335);

      showTxtArrow($this);
  });

  $(".carrousel_items_prod .items_info_extra .slide li .txt .close, .carrousel_items_prod .items_info_extra .prev, .carrousel_items_prod .items_info_extra .next").click(function(e){
        e.stopPropagation();
      $item = $(".carrousel_items_prod .items_info_extra .slide li");
      
      $item.closest(".caroufredsel_wrapper").parent().closest(".caroufredsel_wrapper").animate({"height": "880px"}, {duration:300, queue:false});
      $item.removeClass("active");
      $item.closest(".items_info_extra").animateMinHeight(245, 245);
      $item.closest(".slide").animateMinHeight(245, 245);
      $item.closest(".caroufredsel_wrapper").animateMinHeight(245, 245);
      $item.find(".txt").animateMinHeight(0, 0);

      hideTxtArrow($item);
  });


  //fancy locations inquiry functionality
function SubmitForm(form){
	$form = $(form);// create jquery form object
	
	var form_type = $form.attr('data-gravity-form-type'); // party_inquiry / catering_inquiry / 
	//define gravity form for current operation:
	$gf_id = $('.'+form_type+'.input_form form').attr('id');
	
	switch ( form_type ){
		case '':
			//do something 
		break; 
		case '':
			//do something 
		break;
		default:
		
		// sync data into gravity forms!!!
		$form.find('input').each(function(){
			var field_gf_field = $(this).attr('data-gf-field'),
				field_gf_val = $(this).val();
			$('#'+$gf_id+' .'+field_gf_field+' input').val(field_gf_val);

			//filling popup box with data	
			$('.msg.'+form_type+ ' .sync_in.'+field_gf_field).html(field_gf_val);
		});

		//set location in gravity forms (possibly here need to define id from drop down P.S. use name for now)
		$('#'+$gf_id+' .location input').val($form.attr('data-form-loc-name'));
		CenterItem('.msg.'+form_type);
		$('.msg.'+form_type).fadeIn();
			
	}
	//show popup box
	
  };

  //submit gf on click + fadeout popup
  $('.confirm_gf_action').on('click',function(){
		var form_type = $(this).attr('data-form-type'); // party_inquiry / catering_inquiry / 
		//define gravity form for current operation:xx		
		var form = $('.'+form_type+'.input_form form'),
			formAction = form.attr('action'),
			str = form.serialize();
		$.ajax({
			type: "POST",
			url: formAction,
			data: str,
			complete: function() {
				//fadeout popup window
				//$('.gf_submit input:not(input[type=submit]), .input_form input:not(input[type=submit])').val(''); // reset all fields!
				$('.msg.'+form_type).fadeOut('slow',function(){
					$('.btn_left').trigger('click');
				});
				
			}
		});
		
  });

  //validate forms
  $("form.party_inquiry").validate({
    rules: {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      phone: {
        required: true
      },
      attendees: {
        required: true
      },
      party_date: {
        required: true
      }
    },
    messages: {
      name:    "Please enter your full first name",
      email:   "Please enter your full first email",
      phone:   "Please enter your phone",
      attendees: "Please enter number of attendees",
      party_date:    "Please enter party date"
    },
	submitHandler: function(form){
		SubmitForm(form);
	}
  }
);

  $("form.order_cake").validate({
    rules: {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      message: {
        required: false
      },
      phone: {
        required: true
      },
      date: {
        required: true
      }
    },
    messages: {
      name:    "Please enter your full first name",
      email:   "Please enter your full first email",
      city:    "Please enter your full first city",
      message: "Please enter your full message",
      date:    "Please enter date",
      phone:   "Please enter your phone"
    },
	submitHandler: function(form){
		SubmitForm(form);
	}
  }
);  

$("form.catering_inquiry").validate({
    rules: {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      phone: {
        required: true
      },
      address: {
        required: true
      },
      city: {
        required: true
      },
      zipcode: {
        required: true
      },
      party_date: {
        required: true
      },
    },
    messages: {
      name:    "Please enter your full first name",
      email:   "Please enter your full first email",
      phone:   "Please enter your phone",
      address: "Please enter your address",
      city:    "Please enter your city",
      zipcode: "Please enter your zipcode",
      party_date: "Please enter date",

    },
	submitHandler: function(form){
		SubmitForm(form);
	}
  }
);

	
//close message by click putside of the container
$('html').click(function() {
	$('.msg').fadeOut();
});
$('.msg').click(function(event){
    event.stopPropagation();
});

	


}
