var geocoder;
var map;
var markers = Array();
var results = Array();
var infos = Array();
var global_radius = 160934;
var addrMarker;
var locationTemplate = $('#location_template').html();
var locationTemplate_short = $('#location_template_short').html();
var locationTemplate_Inside = $('#location_template_inside').html();

$(".search-by-zipcode").submit(function(e) {
	e.preventDefault();
	var zipcode = $("input[name=zipcode]").val()
	findAddress(zipcode, 'zipcode');
	location.hash = '#zipcode=' + zipcode;
	console.log("zip");
});
//home page search
if ($('.search-by-zipcode-short').length){
	bindSubmitForm();
}
function bindSubmitForm(){
	$('.search-by-zipcode-short').unbind('submit');
	
	$(".active  .search-by-zipcode-short, .page-template-template-landing-php .search-by-zipcode-short").validate({
		debug: true,
		onfocusout: function(e){
			if($(e).val() === ""){
				$('label', $(e).next()).hide()
				// console.log("empty");
			}
		},
		rules: {
			zipcode: {
				required: true,
				minlength: 5
			}		
		},
		wrapper:'span',
		errorPlacement: function(error,element){
			error.addClass('errorbox');
			error.insertAfter(element);
		},
		messages: {
			zipcode: "Please enter a new zip code",
		},		
		submitHandler: function(form) {
			if (geocoder == null) {
				geocoder = new google.maps.Geocoder();
			}

			cake_id = $(form).attr('data-cake-id'); 

			if (cake_id!=undefined) {
				var zipcode = $('#search_for_cake_'+cake_id).val();
				findAddressShortByCake(zipcode, 'zipcode',cake_id);
			} else {
				var zipcode = $("input[name=zipcode]").val();
				findAddressShort(zipcode, 'zipcode');
			}
			
		}
	});
	

}
$(".search_by_state .options .option").click(function(e) {
	value = $(this).find(".data").text();
	label = $(this).find("p:last-child").text();
	$(this).closest(".btn_select").find(".state").html(label);
	$(".btn_select .box").removeClass("active");
	$(".btn_select .options").css('visibility', 'hidden');
	findAddress(value, 'state');
	location.hash = '#state=' + value;
	e.stopPropagation();
});

function renderClickFeaturesFilter(){
	$('.locations_results_short li').click(function(e){
		e.preventDefault();
		window.location = headJS.blog_url+'/locations/#!'+$(this).attr('data-slug');
	});
}

//search field arrow animation
$(".search .field form").hover(function() {
	$(this).find(".arrow").animate({
		"right": "5px"
	}, {
		duration: 300
	});
}, function() {
	$(this).find(".arrow").animate({
		"right": "10px"
	}, {
		duration: 300
	});
});

//center a div


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


$(window).resize(function() {
	CenterItem(".msg");
});

// $(document).ajaxStart(function() {x
// 	console.log('Ajax loading...')
// }).ajaxStop(function() {
// 	console.log('Ajax stopped...');
// }).ajaxError(function(a, b, e) {
// 	throw e;
// });
// Distance calc funtions to avoid doing API calls to Google Maps to get the distance
rad = function(x) {
	return x * Math.PI / 180;
}


//p1, p2 - google maps locations
distHaversine = function(p1, p2) {
	var R = 6371; // earth's mean radius in km
	var dLat = rad(p2.lat() - p1.lat());
	var dLong = rad(p2.lng() - p1.lng());

	var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
	var d = R * c;

	return (d * 1.60934).toFixed(1);
}


function initialize() {
	// prepare Geocoder
	geocoder = new google.maps.Geocoder();
	renderDropDownOnTemplate(); // prefill select dropdown 
	resetUI(false);
	// set initial position (New York)
	var myLatlng = new google.maps.LatLng(40.7143528, -74.0059731);
	var myOptions = { // default map options
		zoom: 11,
		center: myLatlng,
		scrollwheel: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
	if(window.location.hash){
		hash = window.location.hash.split('#')[1];
		if ( hash.indexOf("zipcode=") > -1 ) { 
			hash = hash.split('zipcode=')[1];
			findAddress(hash, 'zipcode'); 
		} else if ( hash.indexOf("state=") > -1 ) {
			hash = hash.split('state=')[1];
			findAddress(hash, 'state'); 
		} else {
			loadLocationByHash(hash);
		}
	} else {
		//load all
		findPlacesByField(myLatlng, '', '');
	}
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
	geocoder.geocode({
		'address': address
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) { // and, if everything is ok
			// we will center map
			var addrLocation = results[0].geometry.location;
			// and then - add new custom marker
			addrMarker = new google.maps.Marker({
				position: addrLocation,
				map: map,
				title: results[0].formatted_address
			});
			clearOverlays();
			// markers.push(addrMarker);
			findPlacesByField(addrLocation, address, searchType);
			$("body").addClass('show-search')
		} else {
			switch(searchType)
			{
			case 'zipcode':
			  alert('Wrong zipcode');
			  break;
			case 'state':
			  alert('Wrong state');
			  break;
			default:
			  alert('Address Error');
			}
			
		}
	});
}

// find address function short - no google maps
function findAddressShort(address, searchType) {
	var features_filter = [];
	if ($('.location-service-filter .catering.active').length) features_filter.push("catering");
	if ($('.location-service-filter .party.active').length) features_filter.push("party_room");
	
	// script uses our 'geocoder' in order to find location by address name
	geocoder.geocode({
		'address': address
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) { // and, if everything is ok
			findPlacesByField(results[0].geometry.location, address, searchType, 'extra_short', features_filter);
		} else {
			switch(searchType)
			{
			case 'zipcode':
			  alert('Wrong zipcode');
			  break;
			case 'state':
			  alert('Wrong state');
			  break;
			default:
			  alert('Address Error');
			}
			
		}
	});
}

// find address function short - no google maps
function findAddressShortByCake(address, searchType,cake) {
	// script uses our 'geocoder' in order to find location by address name
	geocoder.geocode({
		'address': address
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) { // and, if everything is ok
				findPlacesByField(results[0].geometry.location, address, searchType, 'extra_short_by_cake', null, cake);
		} else {
			switch(searchType)
			{
			case 'zipcode':
			  alert('Wrong zipcode');
			  break;
			case 'state':
			  alert('Wrong state');
			  break;
			default:
			  alert('Address Error');
			}
			
		}
	});
}

function sortLocationByDistance(l1, l2) {
	var d1 = parseFloat(l1.distance);
	var d2 = parseFloat(l2.distance);
	return d1 - d2;
}

/*create single marker 
return: marker data
*/
function createMarker(location) {

	// prepare new Marker object
	var mark = new google.maps.Marker({
		position: location.position,
		map: map,
		title: location.title,
		icon: headJS.templateurl + "/img/16handles_marker.png"
	});
	markers.push(mark);

	// prepare info window
	var infowindow = new google.maps.InfoWindow({
		content: '<div style="overflow: hidden" class="location-marker"><img src="/wp-content/themes/16handles/img/logo_marker.png" style="float: left; margin-right: 15px;" class="location-marker-image"/><p class="location-marker-title">' + location.title + '</p><p>Address: ' + location.address + '</p></div>'
	});

	// add event handler to current marker
	google.maps.event.addListener(mark, 'click', function() {
		clearInfos();
		infowindow.open(map, mark);
	});
	infos.push(infowindow);
	return mark;
}

//render markers on the map
function createMarkers(locations) {
	//create empty LatLngBounds object
	var bounds = new google.maps.LatLngBounds();

	for (i = 0; i < locations.length; i++) {
		marker = createMarker(locations[i]);
		//extend the bounds to include each marker's position
		bounds.extend(marker.position);
	}

	//now fit the map to the newly inclusive bounds
	map.fitBounds(bounds);
}

/* 
function applyLocationData 
@description: 
add location coordinates, calculate distance and then sort array by distance
@input:
var centerLocation - array with coordinates
var locations - JSON feed
@return: sorted locations
*/
function applyLocationData(centerLocation, locations) {
	var NewSortedLocations = Array();		
	$.each(locations, function(i, location) {
		location.position = new google.maps.LatLng(location.lat, location.lng); // add GMAP data
		location.distance = distHaversine(centerLocation, location.position); // get distance from centerLoc				
		NewSortedLocations.push(location);
	});	NewSortedLocations.sort(sortLocationByDistance);

	return NewSortedLocations;
}

function renderIndexLocations(InputSortedLocations) {	
	// Destroy and re-create
	if ($('#locations_results').length > 0) {
		$('#locations_results').remove();
	}
	$('<div id="locations_results" class="accordion accordion_1" />').appendTo("#locations_results_container");
	$('.accordion_head').show();

	// Fill results using the template.
	$.each(InputSortedLocations, function(i, location) {
		location.odd_even = (i % 2 == 0) ? 'odd' : 'even';
		output = Mustache.render(locationTemplate, location);
		$('#locations_results').append(output);
	})	
	if (InputSortedLocations.length > 0) {
		renderAccordion();
		resetUI(false);
	}
	if(is_touch_device){
		$('#datepicker_normal_1, #datepicker_normal_1, #datepicker_normal_2, #datepicker_normal_3').attr('type', 'date');
	}

	
}

function renderIndexLocationsExtraShort(InputSortedLocations, number_to_output) {
	if (number_to_output === undefined ) {
		number_to_output = 3;
	}
	// Destroy and re-create
	if ($('#locations_results_short').length > 0) {
		$('#locations_results_short').html('');
	}
	if (InputSortedLocations.length > 0) {
		$('.locations_short_result_msg').fadeOut(200,function(){
			$(this).fadeIn(400).html('<h4>Here are the locations near you</h4>');
		});		
		// $("<div/>", {
		// 	id: 'locations_results_short'
		// }).appendTo("#locations_results_container_short");

		// Fill results using the template.
		$.each(InputSortedLocations, function(i, location) {
			if (i > number_to_output - 1 ) return false;
			output = Mustache.render(locationTemplate_short, location);
			$('#locations_results_short').append(output);
		});
		renderClickFeaturesFilter();
	} else {
			$('.locations_short_result_msg').append('<h4 class="none-near">We’re sorry! None near you</h4>');
	}	
}

function renderIndexLocationsExtraShortByCake(InputSortedLocations, number_to_output, cake_id) {
	if (number_to_output === undefined ) {
		number_to_output = 3;
	}
	// Destroy and re-create
	if ($('#locations_results_short'+cake_id).length > 0) {
		$('#locations_results_short'+cake_id).html('');
		// console.log('clear section cake_id='+cake_id);
	}
	if (InputSortedLocations.length > 0) {
		$('.cake_id_'+cake_id+'.locations_short_result_msg').fadeOut(200,function(){
			$(this).fadeIn(400).html('<h4>Here are the locations near you</h4>');
		});		
		// $("<div/>", {
		// 	id: 'locations_results_short'
		// }).appendTo("#locations_results_container_short");

		// Fill results using the template.
		$.each(InputSortedLocations, function(i, location) {
			if (i > number_to_output - 1 ) return false;
			output = Mustache.render(locationTemplate_short, location);
			$('#locations_results_short'+cake_id).append(output);
		});
		renderClickFeaturesFilter();
	} else {
			$('.cake_id_'+cake_id+'.locations_short_result_msg').html('<h4 class="none-near">We’re sorry! None near you</h4>');
	}
}

function renderSingleLocation(InputLocation) {
	// Destroy and re-create
	if ($('#locations_results').length > 0) {
		$('#locations_results').remove();
	}
	$('<div id="locations_results" class="accordion accordion_1" />').appendTo("#locations_results_container");
	$('.accordion_head').show();

		output = Mustache.render(locationTemplate, InputLocation);
		content = Mustache.render(locationTemplate_Inside, InputLocation);
		$('#locations_results').append(output);
		$('#locations_results .cont').append(content);
		resetInsideUI($('#locations_results .head'));
		renderAccordion();
		resetUI(true);
		renderMobileNumbers();
		
	//setup location
	InputLocation.position = new google.maps.LatLng(InputLocation.lat, InputLocation.lng); // add GMAP data
	createMarker(InputLocation);
	map.setCenter(InputLocation.position);
	map.setZoom(15);
	
	if(is_touch_device){
		$('#datepicker_normal_1, #datepicker_normal_2, #datepicker_normal_3').attr('type', 'date');
		$('.time input.amount').attr('type', 'time');
		
	}
	
	
}



function findPlacesByField(centerLocation, address, field, result_type, features_filter,cake_id) {	
	if (result_type === undefined) { result_type = 'short' };
	$.ajax({
		type: "post",
		context: this,
		dataType: "json",
		url: headJS.ajaxurl,
		data: {
			action: "load_locations_info_json",
			field: field,
			address: address,
			features_filter : features_filter,
			result_type : result_type,
			centerLocationLat: centerLocation.lat(),
			centerLocationLng: centerLocation.lng(),
			cake_id:cake_id
		},
		beforeSend: function() {
			// console.log(result_type);
		},
		success: function(response) {
			//debug
			// console.log(response);
			if (response) { //if locations found
				SortedResponse = applyLocationData(centerLocation, response);
				
				// sort by dist if zip or state
				if(field === "zipcode"  || field === "state"){
					SortedResponse = applyLocationData(centerLocation, response);				
				} else {
					SortedResponse = response;
				}
				
				

				//switch rendering function based on search type
				switch (result_type){
					case 'extra_short':
						//console.log('extra_short');
						//run different rendering for "extra_short" (form on landing tempalte)
						renderIndexLocationsExtraShort(SortedResponse);
						break;
					case 'extra_short_by_cake':
						renderIndexLocationsExtraShortByCake(SortedResponse,3,cake_id);
						break;
					default:
						renderIndexLocations(SortedResponse);
						createMarkers(SortedResponse);					
				}
			} else {				
				switch (result_type){
					case 'extra_short':
						$('#locations_results_short').html('');
						$('.locations_short_result_msg').fadeOut(200,function(){
							$(this).html('');
							$(this).append('<h4>Here are the locations near you</h4><h4 class="none-near">We’re sorry! None near you</h4>');
							$(this).fadeIn(400);
						});
						break;
					case 'extra_short_by_cake':
						$('#locations_results_short'+cake_id).html('');
						$('.locations_short_result_msg').fadeOut(200,function(){
							$(this).html('');
							$(this).append('<h4>Here are the locations near you</h4><h4 class="none-near">We’re sorry! None near you</h4>');
							$(this).fadeIn(400);
						});
						break;
					default:
						alert('No stores in that location.');	
				}
			}
		},
		error: function(error) {
			//debug
			console.log("findPlacesByField")
			console.log(error);
		},
		ajaxStart: function() {
			$(".ajax-logo.large").addClass('show');
		},
		ajaxStop: function() {
			$(".ajax-logo.large").removeClass('show');
		}
	})
};

// head - jquery element
function preloadSingleLocation( head ){
	loc_id = head.attr('data-locid');
	$.ajax({
		type: "post",
		context: this,
		dataType: "json",
		url: headJS.ajaxurl,
		data: {
			action: "load_single_location_data_json",
			field: 'id',
			value: loc_id
		},
		beforeSend: function() {
			//debug
			// console.log('loc='+ loc_id);
		},
		success: function(response) {
			if (response) { //if locations found
				output = Mustache.render(locationTemplate_Inside, response);
				head.next().html(output);
				//TODO improve animation
				renderDropDownOnTemplate();
				renderMobileNumbers();
				resetInsideUI(head);
				resetUI(true);
			} else {
				alert('An error occurred while loading a location data');
			}
		},
		error: function(error) {
			//debug
			console.log("preloadingSingleLocation");
			console.log(error);
		},
		ajaxStart: function() {
			$(".ajax-logo.large").addClass('show');
		},
		ajaxStop: function() {
			$(".ajax-logo.large").removeClass('show');
		}
	})
	
}

function loadLocationByHash(hash) {
	$.ajax({
		type: "post",
		context: this,
		dataType: "json",
		url: headJS.ajaxurl,
		data: {
			action: "load_single_location_data_json",
			field: 'slug',
			value: hash,
		},
		success: function(response) {
			//debug
			// console.log(response)
			if (response) { //if locations found
				renderSingleLocation(response);
				renderDropDownOnTemplate();
				$("body").addClass("show-search");
			} else {
				alert('Sorry... There is no store with the name "'+hash+'". Search may help.');
			}
		},
		error: function(error) {
			//debug
			console.log("loadLocatonByHash");
			console.log(error);
		}
	});
	resetUI(true);	

}

function resetInsideUI(currentHead) {
	
	var location_id = currentHead.attr('data-locid');
	
	currentHead.next().find("#cakes_slider").carouFredSel({
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
		height: "variable",
		width: "100%",
		padding: 30,
		scroll: {
			items: 1,
			easing: "easeInOutCubic",
			duration: 1000,
			pauseOnHover: true
		},
		auto: {
			play: false
		}
	});

	currentHead.next().find(".order_cakes_slider").carouFredSel({
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
		height: "variable",
		width: "100%",
		padding: 30,
		scroll: {
			items: 1,
			easing: "easeInOutCubic",
			duration: 1000,
			pauseOnHover: true
		},
		auto: {
			play: false
		}
	});

	currentHead.next().find(".slide_section").carouFredSel({
		responsive: true,
		items: 1,
		direction: "left",
		prev: {
			button: ".prev_slide_section",
			key: "left"
		},
		next: {
			button: ".next_slide_section",
			key: "right"
		},
		width:1000,
		height: "variable",
		padding: 30,
		scroll: {
			items: 1,
			easing: "easeInOutCubic",
			duration: 1000,
			pauseOnHover: true
		},
		auto: {
			play: false
		},
		
	}).trigger("linkAnchors", "#links_below");
	
	// accordion
	$('.ui-accordion').accordion('refresh');
};

function renderAccordion(){
	// $( ".ui-accordion" ).accordion( "destroy" );
	if ($('.accordion .head').length == 1) {
		active = 0;
		collapsible = false
	} else {
		active = null;
		collapsible = true
	}
	$('.accordion').accordion({
		icon: false,
		active: true,
		header: '.head',
		collapsible: collapsible,
		heightStyle: "content",
		active : active
	});
}

function goToTop(topPosition){
	$('body, html').animate({ scrollTop: topPosition}, 500);							
}

function resetUI(flag) {
	dateTimeSliderInit(10, 22, 15, 18);
	Custom.init();
	scrollbarInit();

	if (flag == undefined) { flag = false; }
	
	// $('.accordion .head').unbind('click'); //trick to run accordion manually
	if (!flag) {
		$('.accordion .head').click(function(event) {
			// event.stopImmediatePropagation();
			
				$this = $(this);
				
				var openAccordions = $this.siblings('.ui-state-active').length,
				  	topPos = $this.position().top;
									
			openAccordions > 0 ? goToTop($this.position().top - 850) : goToTop($this.position().top)
			
			if ( ! $(this).next().has('.content').length ) {
				preloadSingleLocation($this);				
			}
			location.hash = '#!' + $this.attr('data-slug');

		});

	}
	
	if(!is_touch_device){
		$('#datepicker_normal_1, #datepicker_normal_2, #datepicker_normal_3').datepicker({
			minDate: +3,
			dayNamesMin: ["S", "M", "T", "W", "T", "F", "S"],
			firstDay: 1,
			beforeShow: fixDatePickerPos
		});
	}
	
	$('.date_icon').click(function(e) {
		e.preventDefault();
		$(this).next().focus();
	});

	//arrows animation in carrousel
	$(".carrousel .prev").hover(function() {
		$(this).animate({
			"left": "2px"
		}, {
			duration: 300
		});
	}, function() {
		$(this).animate({
			"left": "7px"
		}, {
			duration: 300
		});
	});

	$(".carrousel .next").hover(function() {
		$(this).animate({
			"right": "2px"
		}, {
			duration: 300
		});
	}, function() {
		$(this).animate({
			"right": "7px"
		}, {
			duration: 300
		});
	});

	//btn_lin_1, btn_link_2 arrow animation
	$(".btn_left").hover(function() {
		$(this).find(".arrow").animate({
			"left": "-5px"
		}, {
			duration: 300
		});
	}, function() {
		$(this).find(".arrow").animate({
			"left": "0px"
		}, {
			duration: 300
		});
	});

	//btn_submit arrow animation
	$(".btn_submit").hover(function() {
		$(this).find(".arrow").animate({
			"right": "5px"
		}, {
			duration: 300
		});
	}, function() {
		$(this).find(".arrow").animate({
			"right": "10px"
		}, {
			duration: 300
		});
	});

	// Update quantity and amount for selected cakes + rush cake + delivery		
	$('.custom_checkbox').click(function(e) {
		
		e.stopPropagation();
		var $this = $(this);

		var total = 0,
			cnt = 0,
			tax = 0,
			grand_total = 0;
		var parentForm = $this.closest('form.order_cake');
		var items_html = '',
			items_to_submit = '';
		parentForm.find('.custom_checkbox input:checked').each(function() {
			if ($(this).attr('name') == 'cake') {
				items_html = items_html + '<div class="item"><p>' + $(this).data('name') + '</span></p><p class="clarification">Hand Written Message &#8243;<span class="sync_in order_cake_message"></span>&#8243;</p></div>';
				items_to_submit = items_to_submit + $(this).data('name') + '\n';
			}
			if ($(this).attr('name') == 'reg_delivery' || $(this).attr('name') == 'rush_cake') {
				items_html = items_html + '<div class="item"><p>' + $(this).data('name') + '</span></p></div>';
				items_to_submit = items_to_submit + '+++' + $(this).data('name') + '\n';
			}
			$('.cake_items').html(items_html);
			cnt = cnt + parseInt($(this).data('cnt'));
		});

		parentForm.find('.qty').html('Qty: ' + cnt );
		grand_total = total;
		
		$('.msg .order_cake_tax').html(tax.toFixed(2));
		$('.msg .order_cake_total').html(grand_total.toFixed(2));
		$('.input_form.order_cake .order_cake_cakes textarea').html(items_to_submit);
	});


	//slides extra info carrousel
	$(".carrousel_items_prod .items_info_extra .slide li").click(function(e) {
		e.stopPropagation();
		var $this = $(this),
			$liSibs = $('.slide li.active');

		$(".slide_section").trigger("updateSizes");

		if ($this.hasClass("active")) {
			$this.removeClass("active");
			$this.closest(".carrousel_items_prod").parent().closest(".caroufredsel_wrapper").animateMinHeight(852, 852);
			$this.closest(".slide").animateMinHeight(243, 243);
			$this.closest(".caroufredsel_wrapper").animateMinHeight(215, 215);
			// $this.find(".txt").animateMinHeight(0, 0);
			hideTxtArrow($this);

		} else {

			$liSibs.removeClass("active");
			$('.txt', $liSibs).fadeOut();
			hideTxtArrow($liSibs);

			$this.addClass("active");
			showTxtArrow($this);
			$this.closest(".carrousel_items_prod").parent().closest(".caroufredsel_wrapper").animate({
				height: 1200
			});
			$this.closest(".items_info_extra").animateMinHeight(600, 600);
			$this.closest(".caroufredsel_wrapper").animateMinHeight(600, 600);
			$this.closest(".slide").animateMinHeight(600, 600);
			$this.find(".txt").animateMinHeight(160);


		}
	});
	// 
	$(".carrousel_items_prod .items_info_extra .prev, .carrousel_items_prod .items_info_extra .next").click(function(e) {
		e.stopPropagation();
		$item = $(".slide li.active");
		$item.closest(".caroufredsel_wrapper").parent().closest(".caroufredsel_wrapper").animate({
			"height": "880px"
		}, {
			duration: 300,
			queue: false
		});
		$item.removeClass("active");
		$item.closest(".items_info_extra").animateMinHeight(245, 245);
		$item.closest(".slide").animateMinHeight(245, 245);
		$item.closest(".caroufredsel_wrapper").animateMinHeight(245, 245);
		$item.find(".txt").animateMinHeight(0, 0);
		hideTxtArrow($item);
	});

	//fancy locations inquiry functionality
	function SubmitForm(form) {
		$form = $(form); // create jquery form object
		var form_type = $form.attr('data-gravity-form-type'); // party_inquiry / catering_inquiry / 
		//define gravity form for current operation:
		$gf_id = $('.' + form_type + '.input_form form').attr('id');

		switch (form_type) {
		case '':
			//do something 
			break;
		case '':
			//do something 
			break;
		default:

			// sync data into gravity forms!!!
			$form.find('input').each(function() {
				var field_gf_field = $(this).attr('data-gf-field'),
					field_gf_val = $(this).val();
				$('#' + $gf_id + ' .' + field_gf_field + ' input').val(field_gf_val);

				//filling popup box with data	
				$('.msg.' + form_type + ' .sync_in.' + field_gf_field).html(field_gf_val);
			});

			//set location in gravity forms (possibly here need to define id from drop down P.S. use name for now)
			$('#' + $gf_id + ' .location input').val($form.attr('data-form-loc-name'));
			CenterItem('.msg.' + form_type);						
			$('.msg.' + form_type).fadeIn('slow', function(){
				if(is_touch_device){
					$('confirm_gf_action').trigger('click', function(){
							alert("Thanks for contacting us");
							$('.btn_left').trigger('click');
					})
				}
			});
			
			

		}
		//show popup box
	};

	//submit gf on click + fadeout popup
	$('.confirm_gf_action').click(function() {
		var form_type = $(this).attr('data-form-type'); // party_inquiry / catering_inquiry / 
		//define gravity form for current operation:xx		
		var form = $('.' + form_type + '.input_form form'),
			formAction = form.attr('action'),
			str = form.serialize();
		$.ajax({
			type: "POST",
			url: formAction,
			data: str,
			complete: function() {
				//fadeout popup window
				//$('.gf_submit input:not(input[type=submit]), .input_form input:not(input[type=submit])').val(''); // reset all fields!
				$('.msg.' + form_type).fadeOut('slow', function() {
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
			name: "Please enter your full first name",
			email: "Please enter your full first email",
			phone: "Please enter your phone",
			attendees: "Please enter number of attendees",
			party_date: "Please enter party date"
		},
		submitHandler: function(form) {
			SubmitForm(form);
		}
	});

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
			name: "Please enter your full first name",
			email: "Please enter your full first email",
			city: "Please enter your full first city",
			message: "Please enter your full message",
			date: "Please enter date",
			phone: "Please enter your phone"
		},
		submitHandler: function(form) {
			SubmitForm(form);
		}
	});

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
			name: "Please enter your full first name",
			email: "Please enter your full first email",
			phone: "Please enter your phone",
			address: "Please enter your address",
			city: "Please enter your city",
			zipcode: "Please enter your zipcode",
			party_date: "Please enter date",

		},
		submitHandler: function(form) {
			SubmitForm(form);
		}
	});


	//close message by click putside of the container
	$('html').click(function() {
		$('.msg').fadeOut();
	});
	$('.msg').click(function(event) {
		event.stopPropagation();
	});
}