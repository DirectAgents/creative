function initMap(){$(window).load(function(){$.each(autocompletesWraps,function(e,o){$("#"+o).length&&(autocomplete[o]=new google.maps.places.Autocomplete($("#"+o+" .autocomplete")[0]),google.maps.event.addListener(autocomplete[o],"place_changed",function(){handleGoogleEvent(this,o),$("#"+o+" #placesInput").parentsUntil($("#"+o+" #placesInput").closest(":has(button)")).nextAll("button").click()}))})})}function dumpObj(e){var o,t;for(t in e)o+=t+": "+e[t]+"; "}var places_obj={GP_Phone__c:null,Street:null,street_number:null,route:null,City:null,State:null,PostalCode:null,Company:null,GP_URL__c:null,AutoComplete_Form_Stage__c:null,GP_Location_Found__c:0,MKTO_UID__c:null,Progressive_Form_Email__c:null,Email:null,UserAgentInfo__c:null},errorIsDisplaying=null;!function(){window.formsArray=new Array,$("#top").length&&(formsArray.push("top"),$("#top .mktoForm").attr("id","mktoForm_1854")),$("#middle").length&&(formsArray.push("middle"),$("#middle .mktoForm").attr("id","mktoForm_1871")),$("#bottom").length&&(formsArray.push("bottom"),$("#bottom .mktoForm").attr("id","mktoForm_1855")),$(document.body).on("click",".js-program",function(e){console.log("event: website_event | eventCategory: Clicked Pricing Program  | eventLabel : "+$(this).attr("href")+" eventURL: "+window.location.href),dataLayer.push({event:"website_event",eventCategory:"Clicked Pricing Program",eventLabel:$(this).attr("href"),eventURL:window.location.href})})}();var autocomplete={},autocompletesWraps=formsArray,ac_obj={locality:"long_name",administrative_area_level_1:"short_name",postal_code:"short_name",street_number:"short_name",route:"long_name"},buttonCounter=0,guidEmailCreated=!1,emailPrefilled=!1,addEvent=function(e,o,t){null!=e&&"undefined"!=typeof e&&(e.addEventListener?e.addEventListener(o,t,!1):e.attachEvent?e.attachEvent("on"+o,t):e["on"+o]=t)},guid=function(){return s4()+s4()+"-"+s4()+"-"+s4()+"-"+s4()+"-"+s4()+s4()+s4()},s4=function(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1)},windowSize=function(){return $(window).width()<700?300:500},extend=function(e,o){for(var t in o)o.hasOwnProperty(t)&&(e[t]=o[t]);return e},identifyElement=function(){window.places_obj.formLocation||$.each(formsArray,function(e,o){return Company=$("#"+o+" #placesInput")[0].value,Name=$("#"+o+" #NameInput")[0].value,Email=$("#"+o+" #EmailInput")[0].value,Phone=$("#"+o+" #PhoneInput")[0].value,Company?(window.places_obj.formLocation=o,!1):Name?(window.places_obj.formLocation=o,!1):Email?(window.places_obj.formLocation=o,!1):Phone?(window.places_obj.formLocation=o,!1):void 0}),validateCompany()},validateCompany=function(){return formLocation=window.places_obj.formLocation,Company=$("#"+formLocation+" #placesInput"),Name=$("#"+formLocation+" #NameInput"),Email=$("#"+formLocation+" #EmailInput"),Phone=$("#"+formLocation+" #PhoneInput"),!(!Company.length||!Company[0].value)||void $("#"+formLocation+" #placesInput")[0].focus()},displayError=function(e,o){errorIsDisplaying||null!=!errorIsDisplaying?(field=$("#"+window.places_obj.formLocation+" .field-error")[0],field.style.visibility="hidden",errorIsDisplaying=!1):(field=$("#"+window.places_obj.formLocation+" .field-error")[0],field.textContent=o,field.style.visibility="visible",window.places_obj.formElement=$("#"+window.places_obj.formLocation+" input[id*='Input']")[btnVal],errorIsDisplaying=!0)},validateField=function(e,o){return formLocation=window.places_obj.formLocation,o=$("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal]).closest("div")[0],this.setButtonText=function(){$("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal+1])[0].innerText="Next",window.places_obj.formElement=$("#"+window.places_obj.formLocation+" input[id*='Input']")[btnVal+1]},"Company"==o.id?(Company=$("#"+formLocation+" #placesInput"),Company.val()&&Company.length?(e.submittable(!0),window.places_obj.AutoComplete_Form_Stage__c==btnVal?window.places_obj.AutoComplete_Form_Stage__c=btnVal+1:window.places_obj.AutoComplete_Form_Stage__c=btnVal,btnVal<maxFormFields&&this.setButtonText(),e.submit(),console.log("event: website_event | eventCategory: Submitted Form  | eventLabel : "+formLocation+" eventURL: "+window.location.href),dataLayer.push({event:"website_event",eventCategory:"Submitted Form",eventLabel:formLocation,eventURL:window.location.href}),!0):(e.submittable(!1),displayError(" #Company","Please select a business"),!1)):"Name"==o.id?(Name=$("#"+formLocation+" #NameInput"),Name.length&&Name[0].value?(e.submittable(!0),window.places_obj.AutoComplete_Form_Stage__c=btnVal,btnVal<maxFormFields&&this.setButtonText(),e.submit(),!0):(e.submittable(!1),displayError(" #Name","Please use your name"),!1)):"Phone"==o.id?(Phone=$("#"+formLocation+" #PhoneInput"),phoneRegex=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im,Phone[0].value.match(phoneRegex)?(e.submittable(!0),window.places_obj.AutoComplete_Form_Stage__c=btnVal,btnVal<maxFormFields&&this.setButtonText(),e.submit(),!0):(e.submittable(!1),errorIsDisplaying=!1,displayError(" #Phone","Please use a correct #"),Phone[0].placeholder="(555) 555-5555",!1)):"ProgressiveFormEmail"==o.id?(Email=$("#"+formLocation+" #EmailInput"),Email.length&&validateEmail(Email[0].value)&&"your-email@domain.com"!=Email[0].value?(e.submittable(!0),window.places_obj.AutoComplete_Form_Stage__c=btnVal,btnVal<maxFormFields&&this.setButtonText(),e.submit(),!0):(e.submittable(!1),displayError(" #ProgressiveFormEmail","Please use a valid email"),Email[0].value="",Email[0].placeholder="your-email@domain.com",!1)):void 0},validateEmail=function(e){var o=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;return!!e&&o.test(e)};topValue=0,bottomValue=0,middleValue=0;var buttonCounter=function(e){if("top"==window.places_obj.formLocation){if(!e)return topValue;topValue++}else if("bottom"==window.places_obj.formLocation){if(!e)return bottomValue;bottomValue++}else{if(!e)return middleValue;middleValue++}},getMaxFormFields=function(e){return e<8?Math.floor($(".slider-input-div").length)-1:e<12?Math.floor($(".slider-input-div").length/2)-1:e<16?Math.floor($(".slider-input-div").length/3)-1:e<20?Math.floor($(".slider-input-div").length/4)-1:e<24?Math.floor($(".slider-input-div").length/5)-1:void 0},pacWarning=!1,ignoreNextClick=!1,decimal_places=2,decimal_factor=0===decimal_places?1:Math.pow(10,decimal_places);$(window).load(function(){window.places_obj.UserAgentInfo__c=platform.parse(navigator.userAgent).description,windowSize(),addEvent(window,"resize",windowSize),maxFormFields=getMaxFormFields($(".slider-input-div").length),MktoForms2.loadForm("https://app-ab19.marketo.com","187-VFC-057",1854,function(e){topForm=e,e.onSubmit(function(o){this.mktoPreFillFields&&this.mktoPreFillFields.Email||guidEmailCreated?this.mktoPreFillFields&&this.mktoPreFillFields.Email&&!emailPrefilled?(window.places_obj.Email=this.mktoPreFillFields.Email,emailPrefilled=!0):(guidEmailCreated||emailPrefilled)&&$("#top #EmailInput")[0].value&&(window.places_obj.Progressive_Form_Email__c=$("#top #EmailInput")[0].value):(mktoGuid=guid(),window.places_obj.Email="temp-email@"+mktoGuid+".com",window.places_obj.MKTO_UID__c=mktoGuid,guidEmailCreated=!0),window.places_obj.Phone=$("#top #PhoneInput")[0].value,!window.places_obj.Phone&&window.places_obj.GP_Phone__c&&(window.places_obj.Phone=window.places_obj.GP_Phone__c);var t=$("#top #NameInput")[0].value.split(" ");window.places_obj.FirstName=t[0],window.places_obj.FirstName||(window.places_obj.FirstName="?"),window.places_obj.Company=Company.val(),1==t.length?window.places_obj.LastName="?":window.places_obj.LastName=t[t.length-1],e.vals(window.places_obj)}),e.validate(function(){return!0}),e.onSuccess(function(e,o){if(window.places_obj.AutoComplete_Form_Stage__c!=maxFormFields)return!1})}),MktoForms2.loadForm("https://app-ab19.marketo.com","187-VFC-057",1871,function(e){middleForm=e,e.onSubmit(function(o){this.mktoPreFillFields&&this.mktoPreFillFields.Email||guidEmailCreated?this.mktoPreFillFields&&this.mktoPreFillFields.Email&&!emailPrefilled?(window.places_obj.Email=this.mktoPreFillFields.Email,emailPrefilled=!0):(guidEmailCreated||emailPrefilled)&&$("#middle #EmailInput")[0].value&&(window.places_obj.Progressive_Form_Email__c=$("#middle #EmailInput")[0].value):(mktoGuid=guid(),window.places_obj.Email="temp-email@"+mktoGuid+".com",window.places_obj.MKTO_UID__c=mktoGuid,guidEmailCreated=!0),window.places_obj.Phone=$("#middle #PhoneInput")[0].value,!window.places_obj.Phone&&window.places_obj.GP_Phone__c&&(window.places_obj.Phone=window.places_obj.GP_Phone__c);var t=$("#middle #NameInput")[0].value.split(" ");window.places_obj.FirstName=t[0],window.places_obj.FirstName||(window.places_obj.FirstName="?"),window.places_obj.Company=Company.val(),1==t.length?window.places_obj.LastName="?":window.places_obj.LastName=t[t.length-1],e.vals(window.places_obj)}),e.validate(function(){return!0}),e.onSuccess(function(e,o){if(window.places_obj.AutoComplete_Form_Stage__c!=maxFormFields)return!1})}),MktoForms2.loadForm("https://app-ab19.marketo.com","187-VFC-057",1855,function(e){bottomForm=e,e.onSubmit(function(o){this.mktoPreFillFields&&this.mktoPreFillFields.Email||guidEmailCreated?this.mktoPreFillFields&&this.mktoPreFillFields.Email&&!emailPrefilled?(window.places_obj.Email=this.mktoPreFillFields.Email,emailPrefilled=!0):(guidEmailCreated||emailPrefilled)&&$("#bottom #EmailInput")[0].value&&(window.places_obj.Progressive_Form_Email__c=$("#bottom #EmailInput")[0].value):(mktoGuid=guid(),window.places_obj.Email="temp-email@"+mktoGuid+".com",window.places_obj.MKTO_UID__c=mktoGuid,guidEmailCreated=!0),window.places_obj.Phone=$("#bottom #PhoneInput")[0].value,!window.places_obj.Phone&&window.places_obj.GP_Phone__c&&(window.places_obj.Phone=window.places_obj.GP_Phone__c);var t=$("#bottom #NameInput")[0].value.split(" ");window.places_obj.FirstName=t[0],window.places_obj.FirstName||(window.places_obj.FirstName="?"),window.places_obj.Company=Company.val(),1==t.length?window.places_obj.LastName="?":window.places_obj.LastName=t[t.length-1],e.vals(window.places_obj)}),e.validate(function(){return!0}),e.onSuccess(function(e,o){if(window.places_obj.AutoComplete_Form_Stage__c!=maxFormFields)return!1})}),handleGoogleEvent=function(e,o){var t=e.getPlace();if(t.id){window.places_obj.GP_Location_Found__c=1,extend(window.places_obj,{GP_URL__c:t.id,Company:t.name,Address:t.formatted_address.split(",")[0],GP_Phone__c:t.formatted_phone_number,formLocation:o});var i=$("#"+o+" #placesInput")[0].value.split(",")[0];$("#"+o+" #placesInput").val(i);for(var n=0;n<t.address_components.length;n++){var a=t.address_components[n].types[0];if("undefined"!=typeof ac_obj[a]){var l=t.address_components[n][ac_obj[a]];"locality"==a&&extend(window.places_obj,{City:l}),"administrative_area_level_1"==a&&extend(window.places_obj,{State:l}),"postal_code"==a&&extend(window.places_obj,{PostalCode:l}),"street_number"==a&&extend(window.places_obj,{street_number:l}),"route"==a&&extend(window.places_obj,{route:l})}}window.places_obj.street_number&&window.places_obj.route&&extend(window.places_obj,{Street:window.places_obj.street_number+" "+window.places_obj.route}),identifyElement()}},$(".sliderButton, #NameInput, #EmailInput, #PhoneInput").on("keypress click",function(e){if("keypress"==e.type){if(13!==e.which)return;13===e.which&&"button"===e.currentTarget.type&&(ignoreNextClick=!0)}else if(ignoreNextClick&&"click"===e.type)return void(ignoreNextClick=!1);if(btnVal=buttonCounter(!1),identifyElement(),"Company"==this.parentElement.id&&!window.places_obj.GP_Loction_Found__c&&$(".pac-item").length&&!pacWarning)return displayError(" #Company","Oops, did you forget to select your business?"),setTimeout(function(){window.places_obj.formElement.focus()},1e3),setTimeout(function(){window.places_obj.formElement.click()},1100),void(pacWarning=!0);if(13===e.which||"click"===e.type&&this.className==$(".sliderButton").eq([btnVal])[0].className)if($("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal]).closest("div").next().length||$("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal]).closest("div").parent().next().length){var o=$("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal]);o.closest("div").length&&("top"==window.places_obj.formLocation?form=topForm:"bottom"==window.places_obj.formLocation?form=bottomForm:form=middleForm,validateField(form,$("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal]).closest("div"))&&(0==btnVal?(displayError(),o.closest("div").animate({left:"-="+windowSize()}).next("div").animate({left:"-="+windowSize()})):(displayError(),btnVal==maxFormFields-1&&($("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal+1])[0].innerText="Finish"),o.closest("div").animate({left:"-="+windowSize()}).next("div").animate({left:"-="+windowSize()})),buttonCounter(!0)),setTimeout(function(){window.places_obj.formElement.focus()},500))}else window.places_obj.formLocation?validateField(form,$("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal]).closest("div"))&&(form.submittable(!0),$("#"+window.places_obj.formLocation+" .sliderButton").eq([btnVal])[0].innerText="Done!"):($.each(["top","middle","bottom"],function(e,o){window.places_obj.formLocation=o,validateField(form,o)}),window.places_obj.formLocation=null)})});