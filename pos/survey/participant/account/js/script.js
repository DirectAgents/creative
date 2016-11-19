function selectAllages(source) {
    checkboxes = document.getElementsByName('ageselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function selectAllgender(source) {
    checkboxes = document.getElementsByName('genderselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function selectAlllocation(source) {
    checkboxes = document.getElementsByName('locationselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function selectAllstatus(source) {
    checkboxes = document.getElementsByName('statusselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function selectAllethnicity(source) {
    checkboxes = document.getElementsByName('ethnicityselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function selectAllsmoke(source) {
    checkboxes = document.getElementsByName('smokeselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function selectAlldrinks(source) {
    checkboxes = document.getElementsByName('drinkselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}


function selectAlldiet(source) {
    checkboxes = document.getElementsByName('dietselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}


function selectAllreligion(source) {
    checkboxes = document.getElementsByName('religionselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}


function selectAlleducation(source) {
    checkboxes = document.getElementsByName('educationselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function selectAlljob(source) {
    checkboxes = document.getElementsByName('jobselection[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}


function selectAllages(source) {
    checkboxes = document.getElementsByName('emailnotifications[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}





$(document).ready(function(){


$('#in-person').on('change', function() {
    var val = this.checked ? this.value : '';
    //if(val == 'on'){alert("yap");}
    //$("#age-options").css({ display: "block" });
});


$('#age').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#age').is(":checked"))
{
$("#age-options").css({ display: "block" });
}else{
	$("#age-options").css({ display: "none" });
	$('#age-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#gender').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#gender').is(":checked"))
{
$("#gender-options").css({ display: "block" });
}else{
	$("#gender-options").css({ display: "none" });
	$('#gender-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#height').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#height').is(":checked"))
{
$("#height-options").css({ display: "block" });
}else{
	$("#height-options").css({ display: "none" });
	//$('#height-options').find('input[type=checkbox]:checked').removeAttr('checked');
    $("#minheight").val($("#minheight option:first").val());
    $("#maxheight").val($("#maxheight option:first").val());
}
   
});


$('#location').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#location').is(":checked"))
{
$("#location-options").css({ display: "block" });
}else{
	$("#location-options").css({ display: "none" });
	$('#location-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#status').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#status').is(":checked"))
{
$("#status-options").css({ display: "block" });
}else{
	$("#status-options").css({ display: "none" });
	$('#status-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#ethnicity').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#ethnicity').is(":checked"))
{
$("#ethnicity-options").css({ display: "block" });
}else{
	$("#ethnicity-options").css({ display: "none" });
	$('#ethnicity-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#smoke').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#smoke').is(":checked"))
{
$("#smoke-options").css({ display: "block" });
}else{
	$("#smoke-options").css({ display: "none" });
	$('#smoke-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#drinks').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#drinks').is(":checked"))
{
$("#drinks-options").css({ display: "block" });
}else{
	$("#drinks-options").css({ display: "none" });
	$('#drinks-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#diet').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#diet').is(":checked"))
{
$("#diet-options").css({ display: "block" });
}else{
	$("#diet-options").css({ display: "none" });
	$('#diet-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#religion').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#religion').is(":checked"))
{
$("#religion-options").css({ display: "block" });
}else{
	$("#religion-options").css({ display: "none" });
	$('#religion-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});




$('#education').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#education').is(":checked"))
{
$("#education-options").css({ display: "block" });
}else{
	$("#education-options").css({ display: "none" });
	$('#education-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});



$('#job').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#job').is(":checked"))
{
$("#job-options").css({ display: "block" });
}else{
	$("#job-options").css({ display: "none" });
	$('#job-options').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});


$('#screening').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#screening').is(":checked"))
{
$("#potential-answers").css({ display: "block" });
$('#screeningquestion').prop('disabled',false);
}else{
    $("#potential-answers").css({ display: "none" });
    $('#screeningquestion').prop('disabled',true);
    $('#potential-answers').find('input[type=checkbox]:checked').removeAttr('checked');
}
   
});



$('#public').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#public').is(":checked"))
{
$('#private').not(this).prop('checked', false);  
}
   
});

$('#private').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#public').is(":checked"))
{
$('#public').not(this).prop('checked', false);  
}
   
});








/**Project Summary Step 1**/


 $("#saveprojectsummary, #saveandcontinueprojectsummary").click(function() {  
//alert("aads"); 
var btn= $(this).find("input[type=submit]:focus").val();



        //get input field values
        
        var bio = $("textarea[name='bio']").val();
        var street  = $('input[name=street').val();
        var city  = $('input[name=city').val();
        var state  = $('input[name=state').val();
        var zip  = $('input[name=zip').val();
        var country = $("select[name='country']").val();

         if($('input[type=file').val() != ''){
        var fileToUpload = $('input[type=file]')[0].files[0].name;
        var imagestatus  = $('input[name=imagestatus').val(); 
        //alert(imagestatus);
        }
       
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
      
         

        //everything looks good! proceed...
        if(proceed) 
        {

          $( ".processing" ).show();
            //data to be sent to server

             if($('input[type=file').val() != ''){
            post_data = {'bio':bio,'street':street,'city':city,'state':state,'zip':zip,'country':country,'fileToUpload':fileToUpload,'imagestatus':imagestatus};
            }else{
            post_data = {'bio':bio,'street':street,'city':city,'state':state,'zip':zip,'country':country,'fileToUpload':'','imagestatus':''};
            }
            
            //Ajax post data to server
            $.post('target.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
          if(btn == 'Save'){
          output = '<div class="success">'+response.text+'</div>';
          }

          if(btn == 'Save And Continue'){
            window.location.href = "personal.php";
          }
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });





/**Project Summary Step 2**/


 $("#savesteptwo, #savesteptwocontinue").click(function() {  
//alert("1111"); 
var btn= $(this).find("input[type=submit]:focus").val();



        //get input field values
        
        var age = $("select[name='age']").val();
        var gender = $("select[name='gender']").val();
        var height = $("select[name='height']").val();
        var status = $("select[name='status']").val();
        var ethnicity = $("select[name='ethnicity']").val();
        var smoke = $("select[name='smoke']").val();
        var drink = $("select[name='drink']").val();
        var diet = $("select[name='diet']").val();
        var religion = $("select[name='religion']").val();
        var education = $("select[name='education']").val();
        var job = $("select[name='job']").val();
        //var languages = $("select[name='languages']").val();
        var industry_interest = $('input[name="industry_interest[]"]:checked').map(function () {return this.value;}).get().join(",");

       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
      
         //alert(languages);

        //everything looks good! proceed...
        if(proceed) 
        {


          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'age':age,'gender':gender,'height':height,'status':status,'ethnicity':ethnicity,'smoke':smoke,'drink':drink,'diet':diet,'religion':religion,'education':education,'job':job,'industry_interest':industry_interest};
            
            //Ajax post data to server
            $.post('personalform.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
          if(btn == 'Save'){
          output = '<div class="success">'+response.text+'</div>';
          }

          if(btn == 'Save And Continue'){
            window.location.href = "step3.php";
          }
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });







/**Project Summary Step 3**/


 $("#submitproject").click(function() {  
//alert("aads"); 
var btn= $(this).find("input[type=submit]:focus").val();

 

        //get input field values
        
        var submitok  = $('input[name=submitok').val();
        var projectstatus = $('input[name="projectstatus[]"]:checked').map(function () {return this.value;}).get().join(",");

         if($('input[type=file').val() != ''){
        var fileToUpload = $('input[type=file]')[0].files[0].name;
        var imagestatus  = $('input[name=imagestatus').val(); 
        //alert(imagestatus);
        }
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
      
         

        //everything looks good! proceed...
        if(proceed) 
        {

          $( ".processing" ).show();
            //data to be sent to server

            if($('input[type=file').val() != ''){
            post_data = {'submitok':submitok,'projectstatus':projectstatus,'fileToUpload':fileToUpload,'imagestatus':imagestatus};
            }else{
            post_data = {'submitok':submitok,'projectstatus':projectstatus,'fileToUpload':'','imagestatus':''};
            }
         
            //Ajax post data to server
            $.post('confirm.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         
            //output = '<div class="success">'+response.text+'</div>';
            window.location.href = "../../index.php";
          
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });






/**Save Project Step 3**/


 $("#saveproject").click(function() {  
//alert($('input[type=file').val()); 
var btn= $(this).find("input[type=submit]:focus").val();

 

        //get input field values

        var submitok  = $('input[name=submitok').val();
        var projectstatus = $('input[name="projectstatus[]"]:checked').map(function () {return this.value;}).get().join(",");

        if($('input[type=file').val() != ''){
        var fileToUpload = $('input[type=file]')[0].files[0].name;
        var imagestatus  = $('input[name=imagestatus').val(); 
        //alert(imagestatus);
        }
        
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
      
         

        //everything looks good! proceed...
        if(proceed) 
        {

          $( ".processing" ).show();
            //data to be sent to server
            if($('input[type=file').val() != ''){
            post_data = {'submitok':submitok,'projectstatus':projectstatus,'fileToUpload':fileToUpload,'imagestatus':imagestatus};
            }else{
            post_data = {'submitok':submitok,'projectstatus':projectstatus,'fileToUpload':'','imagestatus':''};
            }
            //Ajax post data to server
            $.post('confirm.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         
            output = '<div class="success">'+response.text+'</div>';
            //window.location.href = "../index.php";
          
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });





//<![CDATA[
window.onload=function(){
$('#tabs')
    .tabs()
    .addClass('ui-tabs-vertical ui-helper-clearfix');

}//]]> 






/**Request to Participate**/


 $("#requesttoparticipate").click(function() {  





        var userid  = $("input[name=userid]").val();
        var firstname  = $("input[name=firstname]").val();
        var projectid  = $("input[name=projectid]").val();

        var projectid  = $("input[name=projectid]").val();
        var monday = $('input[name="monday"]:checked').map(function () {return this.value;}).get().join(",");
        var tuesday = $('input[name="tuesday"]:checked').map(function () {return this.value;}).get().join(",");
        var wednesday = $('input[name="wednesday"]:checked').map(function () {return this.value;}).get().join(",");
        var thursday = $('input[name="thursday"]:checked').map(function () {return this.value;}).get().join(",");
        var friday = $('input[name="friday"]:checked').map(function () {return this.value;}).get().join(",");
        var saturday = $('input[name="saturday"]:checked').map(function () {return this.value;}).get().join(",");
        var sunday = $('input[name="sunday"]:checked').map(function () {return this.value;}).get().join(",");

        
        var locationmonday  = $("input[name=choose-location-map-monday]").val();
        var locationtuesday  = $("input[name=choose-location-map-tuesday]").val();
        var locationwednesday  = $("input[name=choose-location-map-wednesday]").val();
        var locationthursday  = $("input[name=choose-location-map-thursday]").val();
        var locationfriday  = $("input[name=choose-location-map-friday]").val();
        var locationsaturday  = $("input[name=choose-location-map-saturday]").val();
        var locationsunday  = $("input[name=choose-location-map-sunday]").val();


        if(locationmonday!=""){ var location  = $("input[name=choose-location-map-monday]").val(); }
        if(locationtuesday!=""){ var location  = $("input[name=choose-location-map-tuesday]").val(); }
        if(locationwednesday!=""){ var location  = $("input[name=choose-location-map-wednesday]").val(); }
        if(locationthursday!=""){ var location  = $("input[name=choose-location-map-thursday]").val(); }
        if(locationfriday!=""){ var location  = $("input[name=choose-location-map-friday]").val(); }
        if(locationsaturday!=""){ var location  = $("input[name=choose-location-map-saturday]").val(); }
        if(locationsunday!=""){ var location  = $("input[name=choose-location-map-sunday]").val(); }
    
           
        //alert(location);
       
        var proceed = true;
      
         

        if(proceed) 
        {

         
         
            post_data = {"userid":userid,"firstname":firstname,"projectid":projectid,"monday":monday,"tuesday":tuesday,
            "wednesday":wednesday,"thursday":thursday,"friday":friday,"saturday":saturday,"sunday":sunday};
            
            
            $.post("requesttoparticipate.php", post_data, function(response){  
              

        
          
          //alert("adf");
          
          $("#requestbutton")[0].click();

        
       
        

         $("#resultpopup").html(response.text);
          
        
          
        
       
        
            }, "json");
      
        }




 });   


$(".location-monday").click(function() { 
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();
    $("#location-map-monday").toggle();
});

$(".location-tuesday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();
    $("#location-map-tuesday").toggle();
});

$(".location-wednesday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();
    $("#location-map-wednesday").toggle();
});

$(".location-thursday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();
    $("#location-map-thursday").toggle();
});

$(".location-friday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();
    $("#location-map-friday").toggle();
});

$(".location-saturday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-sunday").hide();
    $("#location-map-saturday").toggle();
});

$(".location-sunday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").toggle();
});


$(".choose-location-monday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();

    $("#choose-location-map-monday").toggle();
    $("#choose-location-map-tuesday").hide();
    $("#choose-location-map-wednesday").hide();
    $("#choose-location-map-thursday").hide();
    $("#choose-location-map-friday").hide();
    $("#choose-location-map-saturday").hide();
    $("#choose-location-map-sunday").hide();
});

$(".choose-location-tuesday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();

    $("#choose-location-map-monday").hide();
    $("#choose-location-map-tuesday").toggle();
    $("#choose-location-map-wednesday").hide();
    $("#choose-location-map-thursday").hide();
    $("#choose-location-map-friday").hide();
    $("#choose-location-map-saturday").hide();
    $("#choose-location-map-sunday").hide();
});

$(".choose-location-wednesday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();

    $("#choose-location-map-monday").hide();
    $("#choose-location-map-tuesday").hide();
    $("#choose-location-map-wednesday").toggle();
    $("#choose-location-map-thursday").hide();
    $("#choose-location-map-friday").hide();
    $("#choose-location-map-saturday").hide();
    $("#choose-location-map-sunday").hide();
});

$(".choose-location-thursday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();

    $("#choose-location-map-monday").hide();
    $("#choose-location-map-tuesday").hide();
    $("#choose-location-map-wednesday").hide();
    $("#choose-location-map-thursday").toggle();
    $("#choose-location-map-friday").hide();
    $("#choose-location-map-saturday").hide();
    $("#choose-location-map-sunday").hide();
});

$(".choose-location-friday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();

    $("#choose-location-map-monday").hide();
    $("#choose-location-map-tuesday").hide();
    $("#choose-location-map-wednesday").hide();
    $("#choose-location-map-thursday").hide();
    $("#choose-location-map-friday").toggle();
    $("#choose-location-map-saturday").hide();
    $("#choose-location-map-sunday").hide();
});

$(".choose-location-saturday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();

    $("#choose-location-map-monday").hide();
    $("#choose-location-map-tuesday").hide();
    $("#choose-location-map-wednesday").hide();
    $("#choose-location-map-thursday").hide();
    $("#choose-location-map-friday").hide();
    $("#choose-location-map-saturday").toggle();
    $("#choose-location-map-sunday").hide();
});

$(".choose-location-sunday").click(function() { 
    $("#location-map-monday").hide();
    $("#location-map-tuesday").hide();
    $("#location-map-wednesday").hide();
    $("#location-map-thursday").hide();
    $("#location-map-friday").hide();
    $("#location-map-saturday").hide();
    $("#location-map-sunday").hide();

    $("#choose-location-map-monday").hide();
    $("#choose-location-map-tuesday").hide();
    $("#choose-location-map-wednesday").hide();
    $("#choose-location-map-thursday").hide();
    $("#choose-location-map-friday").hide();
    $("#choose-location-map-saturday").hide();
    $("#choose-location-map-sunday").toggle();
});
  


/**Save Profile**/




    $(".save-profile").click(function() { 
    //alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields       
        $("#profile-form input[required=true], #profile-form textarea[required=true]").each(function(){
            $(this).css('border-color',''); 
            if(!$.trim($(this).val())){ //if this field is empty 
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag
            }
            //check invalid email
            var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
            if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag              
            }   
        });
        
       
        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'firstname'     : $('input[name=firstname]').val(),
                'lastname'     : $('input[name=lastname]').val(),
                'email'     : $('input[name=email]').val(),
                'phone_number'     : $('input[name=phone_number]').val(),
                'city'     : $('input[name=city]').val(),
                'state'     : $("select[name='state']").val(),
                'bio'     : $("textarea[name='bio']").val(),
                'age'     : $("select[name='age']").val(),
                'gender'     : $("select[name='gender']").val(),
                'height'     : $("select[name='height']").val(),
                'status'     : $("select[name='status']").val(),
                'ethnicity'     : $("select[name='ethnicity']").val(),
                'smoke'     : $("select[name='smoke']").val(),
                'drink'     : $("select[name='drink']").val(),
                'diet'     : $("select[name='diet']").val(),
                'religion'     : $("select[name='religion']").val(),
                'education'     : $("select[name='education']").val(),
                'job'     : $("select[name='job']").val(),
                'emailnotifications'     : $('input[name="emailnotifications[]"]:checked').map(function () {return this.value;}).get().join(",")

            };
 
            //alert(post_data['gender']);

            //Ajax post data to server
            $.post('save-profile.php', post_data, function(response){  
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#profile-form input[required=true], #profile-form textarea[required=true]").val(''); 
                    $("#profile-form #contact_body").slideUp(); //hide form after success
                }
                $("#profile-form #profile_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#profile-form input[required=true], #profile-form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });






/**Image Upload**/


 $("#image_upload").click(function() {  
//alert("aads"); 



        //get input field values
        
        var image_upload  = $('input[name=image_upload').val();
        var images = $('input[name=images').val();

        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
      
         

        //everything looks good! proceed...
        if(proceed) 
        {

          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'image_upload':image_upload,'images':images};
            
            //Ajax post data to server
            $.post('ajax.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         
            window.location.href = "../index.php";
          
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });




});
