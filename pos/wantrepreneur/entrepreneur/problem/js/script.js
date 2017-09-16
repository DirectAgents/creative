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


function selectAllemailnotifications(source) {
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
	$('#height-options').find('input[type=checkbox]:checked').removeAttr('checked');
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



$('#yesnda').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#yesnda').is(":checked"))
{
$('#nonda').not(this).prop('checked', false);  
}
   
});

$('#nonda').on('change', function() {
    var val = this.checked ? this.value : '';
    if ($('#yesnda').is(":checked"))
{
$('#yesnda').not(this).prop('checked', false);  
}
   
});





/**Target Audience Step 1**/


 $("#saveandcontinuetargetaudience").click(function() {  
//alert("aads"); 
var btn= $(this).find("input[type=submit]:focus").val();



        //get input field values
        var projectid       = $('input[name=projectid]').val();
        var projectname       = $("textarea[name='projectname']").val();
        var stage = $("select[name='stage']").val();
        var category = $("select[name='category']").val();
        var minreq = $('input[name="minreq[]"]:checked').map(function () {return this.value;}).get().join(",");
        //var meetupchoice = $('input[name="meetupselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var age = $('input[name="ageselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var gender = $('input[name="genderselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var minheight = $("select[name='minheight']").val();
        var maxheight = $("select[name='maxheight']").val();
        //var location = $('input[name="locationselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var status = $('input[name="statusselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var ethnicity = $('input[name="ethnicityselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var smoke = $('input[name="smokeselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var drink = $('input[name="drinkselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var diet = $('input[name="dietselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var religion = $('input[name="religionselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var education = $('input[name="educationselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var job = $('input[name="jobselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var interest = $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var language = $('input[name="languageselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        //var potentialanswers = $('input[name="potentialanswers[]"]').map(function () {return this.value;}).get().join(",");
        
        var screening = $('input[name="screening[]"]:checked').map(function () {return this.value;}).get().join(",");

        var screeningquestion = $("textarea[name='screeningquestion']").val();
        var potentialanswer1      = $('input[name=potentialanswertext1]').val();
        var potentialanswer2       = $('input[name=potentialanswertext2]').val();
        var potentialanswer3       = $('input[name=potentialanswertext3]').val();
        var potentialansweraccepted = $('input[name="potentialansweraccepted[]"]:checked').map(function () {return this.value;}).get().join(",");

        
       
        //var testing       = $('input[name=meetupselection').val();
        //var testing = $('.meetupselection:checked').serialize();
        // $('input[name="meetupselection[]"]').serialize(); /* it can return true or false */


/*
for dropdowns
    $("select[name=MYFIELDNAME]").val();

for radio buttons
$("select[name=MYFIELDNAME]:checked").val();


for textareas
$("textarea[name=MYFIELDNAME]").val();
*/

        //alert(testing);



        var phone=/^(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})$/i;
        var email=/^[A-Za-z0-9]+([_\.-][A-Za-z0-9]+)*@[A-Za-z0-9]+([_\.-][A-Za-z0-9]+)*\.([A-Za-z]){2,4}$/i;
               
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        
       




     


        
       var n = $('input[name="minreq[]"]:checked').size();
       //alert(n);

          //if($('input[name="in-person"]:checked') != true){
        if (n < 1) {
        
            output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please mark at least 1 as required under "I want to reach people by"!</div>';
            $("#result").hide().html(output).slideDown();
            //$('input[name=userFirstname]').css('border-color','red'); 
            proceed = false;
        }


        if(projectname==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please state a Problem!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

         var minLength = 15;

         if(projectname.length < minLength){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least a complete sentence!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

       

        


        var screening_checkedstatus = $('input[name="screening[]"]:checked').size();
        

         if(screeningquestion =="" && screening_checkedstatus == 1){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please add your screening question!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

         if(screeningquestion!="" && potentialanswer1 == "" && potentialanswer2 == "" && potentialanswer3 == ""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least one potential answer!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }


        

        var potentialansweraccepted_checkedstatus = $('input[name="potentialansweraccepted[]"]:checked').size();

        var languages_checkedstatus = $('input[id="languageimportant"]:checked').size();
        var interest_checkedstatus = $('input[id="interestimportant"]:checked').size();

        
        if(interest_checkedstatus == 1 ){ 
            
            if(interest == ''){
                  output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter an Interest!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
            }
        }

        if(languages_checkedstatus == 1 ){ 
            
            if(language == ''){
                  output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a language!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
            }
        }
       
        
        if(screeningquestion!="" && potentialansweraccepted == 'Potential Answer 1' && screening_checkedstatus == 1 && potentialanswer1 == ""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter one potential answer for Answer 1!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

        if(screeningquestion!="" && potentialansweraccepted == 'Potential Answer 2' && screening_checkedstatus == 1 && potentialanswer2 == ""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter one potential answer for Answer 2!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

         if(screeningquestion!="" && potentialansweraccepted == 'Potential Answer 3' && screening_checkedstatus == 1 && potentialanswer3 == ""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter one potential answer for Answer 3!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }


         if(screeningquestion!="" && potentialansweraccepted_checkedstatus <1 ){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please mark at least one as the potential Answer! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

        if(potentialanswer1 != '' && potentialanswer2 == '' && potentialanswer3 == ''){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least 2 possible Answers! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

        if(potentialanswer2 != '' && potentialanswer1 == '' && potentialanswer3 == ''){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least 2 possible Answers! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

         if(potentialanswer3 != '' && potentialanswer2 == '' && potentialanswer3 == ''){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least 2 possible Answers! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }


        

            //if($('input[name="in-person"]:checked') != true){
        /*if (!$('input[name="meetupselection[]"]').is(":checked")) {
            output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please select at least one option on how to reach your participants!</div>';
            $("#result").hide().html(output).slideDown();
            //$('input[name=userFirstname]').css('border-color','red'); 
            proceed = false;
        }*/
        

          
      
         

        //everything looks good! proceed...
        if(proceed) 
        {



          //$( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid,'projectname':projectname,'stage':stage,'category':category,'minreq':minreq,'age':age,'interest':interest, 'language':language, 'gender':gender, 'minheight':minheight, 
            'maxheight':maxheight, 'status':status,'ethnicity':ethnicity,
            'smoke':smoke,'drink':drink,'diet':diet,'religion':religion,'education':education,'job':job,
            'interest':interest,'screening':screening,'screeningquestion':screeningquestion, 'potentialanswer1':potentialanswer1 , 'potentialanswer2':potentialanswer2,'potentialanswer3':potentialanswer3,
            'potentialansweraccepted':potentialansweraccepted};
            
            //Ajax post data to server
            $.post('target.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
           
         

         
            window.location.href = "step2.php?id="+projectid;
          
          
          //reset values in all input fields
          //$('#contact_form input').val(''); 
          //$('#contact_form textarea').val(''); 
        }
        
        //$("#result").hide().html(output).slideDown();
            });
      
        }
    });











$("#savetargetaudience").click(function() {  
//alert("aads"); 
var btn= $(this).find("input[type=submit]:focus").val();



        //get input field values
        var nda = $('input[name="nda[]"]:checked').map(function () {return this.value;}).get().join(",");

        var projectid       = $('input[name=projectid]').val();
        var projectname       = $('input[name=projectname]').val();
        var stage = $("select[name='stage']").val();
        var category = $("select[name='category']").val();
        var minreq = $('input[name="minreq[]"]:checked').map(function () {return this.value;}).get().join(",");
        //var meetupchoice = $('input[name="meetupselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var age = $('input[name="ageselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var gender = $('input[name="genderselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var minheight = $("select[name='minheight']").val();
        var maxheight = $("select[name='maxheight']").val();
        //var location = $('input[name="locationselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var status = $('input[name="statusselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var ethnicity = $('input[name="ethnicityselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var smoke = $('input[name="smokeselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var drink = $('input[name="drinkselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var diet = $('input[name="dietselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var religion = $('input[name="religionselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var education = $('input[name="educationselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var job = $('input[name="jobselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var interest = $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        var language = $('input[name="languageselection[]"]:checked').map(function () {return this.value;}).get().join(",");
        //var potentialanswers = $('input[name="potentialanswers[]"]').map(function () {return this.value;}).get().join(",");
        
        var screening = $('input[name="screening[]"]:checked').map(function () {return this.value;}).get().join(",");

        var screeningquestion = $("textarea[name='screeningquestion']").val();
        var potentialanswer1      = $('input[name=potentialanswertext1]').val();
        var potentialanswer2       = $('input[name=potentialanswertext2]').val();
        var potentialanswer3       = $('input[name=potentialanswertext3]').val();
        var potentialansweraccepted = $('input[name="potentialansweraccepted[]"]:checked').map(function () {return this.value;}).get().join(",");



        //alert(minreq);
    
        //var testing       = $('input[name=meetupselection').val();
        //var testing = $('.meetupselection:checked').serialize();
        // $('input[name="meetupselection[]"]').serialize(); /* it can return true or false */


/*
for dropdowns
    $("select[name=MYFIELDNAME]").val();

for radio buttons
$("select[name=MYFIELDNAME]:checked").val();


for textareas
$("textarea[name=MYFIELDNAME]").val();
*/

        //alert(testing);



        var phone=/^(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})$/i;
        var email=/^[A-Za-z0-9]+([_\.-][A-Za-z0-9]+)*@[A-Za-z0-9]+([_\.-][A-Za-z0-9]+)*\.([A-Za-z]){2,4}$/i;
               
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
         var proceed = true;
        
       




     


        
       var n = $('input[name="minreq[]"]:checked').size();
       //alert(n);

          //if($('input[name="in-person"]:checked') != true){
        if (n < 1) {
        
            output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please mark at least 1 as required under "I want to reach people by"!</div>';
            $("#result").hide().html(output).slideDown();
            //$('input[name=userFirstname]').css('border-color','red'); 
            proceed = false;
        }


          if(projectname==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a name for your Project!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }


        


        var screening_checkedstatus = $('input[name="screening[]"]:checked').size();
        

         if(screeningquestion =="" && screening_checkedstatus == 1){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please add your screening question!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

         if(screeningquestion!="" && potentialanswer1 == "" && potentialanswer2 == "" && potentialanswer3 == ""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least one potential answer!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }


        

        var potentialansweraccepted_checkedstatus = $('input[name="potentialansweraccepted[]"]:checked').size();

        var languages_checkedstatus = $('input[id="languageimportant"]:checked').size();
        var interest_checkedstatus = $('input[id="interestimportant"]:checked').size();

        
        if(interest_checkedstatus == 1 ){ 
            
            if(interest == ''){
                  output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter an Interest!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
            }
        }

        if(languages_checkedstatus == 1 ){ 
            
            if(language == ''){
                  output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a language!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
            }
        }
       
        

       
        
        if(screeningquestion!="" && potentialansweraccepted == 'Potential Answer 1' && screening_checkedstatus == 1 && potentialanswer1 == ""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter one potential answer for Answer 1!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

        if(screeningquestion!="" && potentialansweraccepted == 'Potential Answer 2' && screening_checkedstatus == 1 && potentialanswer2 == ""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter one potential answer for Answer 2!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

         if(screeningquestion!="" && potentialansweraccepted == 'Potential Answer 3' && screening_checkedstatus == 1 && potentialanswer3 == ""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter one potential answer for Answer 3!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

        if(screeningquestion!="" && potentialansweraccepted_checkedstatus <1 ){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please mark at least one as the potential Answer! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

         if(potentialanswer1 != '' && potentialanswer2 == '' && potentialanswer3 == ''){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least 2 possible Answers! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

        if(potentialanswer2 != '' && potentialanswer1 == '' && potentialanswer3 == ''){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least 2 possible Answers! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

         if(potentialanswer3 != '' && potentialanswer2 == '' && potentialanswer3 == ''){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter at least 2 possible Answers! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }


      


        

            //if($('input[name="in-person"]:checked') != true){
        /*if (!$('input[name="meetupselection[]"]').is(":checked")) {
            output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please select at least one option on how to reach your participants!</div>';
            $("#result").hide().html(output).slideDown();
            //$('input[name=userFirstname]').css('border-color','red'); 
            proceed = false;
        }*/
        


      

        //everything looks good! proceed...
        if(proceed) 
        {

          //$( ".processing" ).show();
            //data to be sent to server
            post_data = {'nda':nda,'projectid':projectid,'projectname':projectname,'stage':stage,'category':category,'minreq':minreq,'age':age,'interest':interest, 'language':language, 'gender':gender, 'minheight':minheight, 
            'maxheight':maxheight, 'status':status,'ethnicity':ethnicity,
            'smoke':smoke,'drink':drink,'diet':diet,'religion':religion,'education':education,'job':job,
            'interest':interest, 'screening':screening,'screeningquestion':screeningquestion, 'potentialanswer1':potentialanswer1 , 'potentialanswer2':potentialanswer2,'potentialanswer3':potentialanswer3,
            'potentialansweraccepted':potentialansweraccepted};
            
            //Ajax post data to server
            $.post('target.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
           
         

         
            output = '<div class="success">'+response.text+'</div>';
          
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });

    
  


/**Project Summary Step 2**/


 $("#saveandcontinueprojectsummary").click(function() {  
//alert("aads"); 
var btn= $(this).find("input[type=submit]:focus").val();

        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        //get input field values
        
        var details  = $("textarea[name='details']").val();
        var agenda_one  = $("textarea[name='agenda_one']").val();
        //var agenda_two  = $('input[name=agenda_two').val();
        //var agenda_three  = $('input[name=agenda_three').val();
       
       //alert(details);

       

        if(agenda_one==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please share more about your agenda during the feedback session!</div>';
            $("#result").hide().html(output).slideDown();
            $("#agenda_one").css('border-color','red'); //change border color to red 
            proceed = false;
        }else{
            $("#agenda_one").css('border-color','green'); //change border color to red 
           
        }


        if(details==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please share more about your idea!</div>';
            $("#result").hide().html(output).slideDown();
            $("#details").css('border-color','red'); //change border color to red 
            proceed = false;
        }else{
            $("#details").css('border-color','green'); //change border color to red 
           
        }

        
        
      
         

        //everything looks good! proceed...
        if(proceed) 
        {

          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'details':details,'agenda_one':agenda_one};
            
            //Ajax post data to server
            $.post('step2form.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         

         
            window.location.href = "step3.php";
          
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });




 $("#saveprojectsummary").click(function() {  
//alert("aads"); 
var btn= $(this).find("input[type=submit]:focus").val();



        //get input field values
        
        //var summary = $("textarea[name='summary']").val();
        var details  = $("textarea[name='details']").val();
        var agenda_one  = $("textarea[name='agenda_one']").val();
        //var agenda_two  = $('input[name=agenda_two').val();
        //var agenda_three  = $('input[name=agenda_three').val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;


        if(details==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please share more about your idea!</div>';
            $("#result").hide().html(output).slideDown();
            $("#details").css('border-color','red'); //change border color to red 
            proceed = false;
        }else{
            $("#details").css('border-color','green'); //change border color to red 
            
        }

        if(agenda_one==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please share more about your agenda during the feedback session!</div>';
            $("#result").hide().html(output).slideDown();
            $("#agenda_one").css('border-color','red'); //change border color to red 
            proceed = false;
        }else{
            $("#agenda_one").css('border-color','green'); //change border color to red 
            
        }
      
         

        //everything looks good! proceed...
        if(proceed) 
        {

          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'details':details,'agenda_one':agenda_one};
            
            //Ajax post data to server
            $.post('step2form.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         

         
            output = '<div class="success">'+response.text+'</div>';
          
          
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

        var proceed = true;
 

        //get input field values
        
        var submitok  = $('input[name=submitok]').val();
        var projectstatus = $('input[name="projectstatus[]"]:checked').map(function () {return this.value;}).get().join(",");
        var pay = $("select[name='pay']").val();
        var minutes = $("select[name='minutes']").val();
        var phone = $('input[name=phone_number]').val();

       

       var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        if(!phone.match(phoneno)) {
           
            //alert("aasfasd");
            output = '<div style="float:left; text-align:center;font-size:18px; padding:20px 10px 20px 10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please add your phone number!</div>';
            $("#result").hide().html(output).slideDown();
            $("#details").css('border-color','red'); //change border color to red 
            //alert("asdfasd");
            proceed = false;  
            }   

       

        if(phone==""){ 

         output = '<div style="float:left; text-align:center;font-size:18px; padding:20px 10px 20px 10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please add your phone number!</div>';
            $("#result").hide().html(output).slideDown();
            $("#details").css('border-color','red'); //change border color to red 
            //alert("asdfasd");
            proceed = false;
        }
        
       //alert(phone);
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        
      
         

        //everything looks good! proceed...
        if(proceed) 
        {

          $( ".processing" ).show();
            //data to be sent to server

           //alert("aad11111"); 
           post_data = {'projectstatus':projectstatus,'pay':pay,'minutes':minutes, 'phone':phone};
         
            //Ajax post data to server
            $.post('confirm.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            
            
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

       
        var projectstatus = $('input[name="projectstatus[]"]:checked').map(function () {return this.value;}).get().join(",");
        var pay = $("select[name='pay']").val();
        var minutes = $("select[name='minutes']").val();

      
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
      

        //everything looks good! proceed...
        if(proceed) 
        {

          $( ".processing" ).show();
            //data to be sent to server
         
       
            post_data = {'projectstatus':projectstatus,'pay':pay,'minutes':minutes};
          
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

        var phone = $('input[name=phone_number]').val();
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


        var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
       
             if(!phone.match(phoneno)){
                $(phone).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag                  
           
            }   

       
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
                'linkedin'     : $('input[name=linkedin]').val(),
                'twitter'     :  $('input[name=twitter]').val(),
                'facebook'     : $('input[name=facebook]').val(),
                'emailnotifications'     : $('input[name="emailnotifications[]"]:checked').map(function () {return this.value;}).get().join(",")

            };
 

            //alert(post_data['phone_number']);

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





/**Account Delete**/


 $(".delete-account").click(function() {  

        var userid = $('input[name=userid]').val();

        var proceed = true;

        //alert(userid);

     //everything looks good! proceed...
        if(proceed) 
        {

     
     post_data = {'userid':userid};
            
            //Ajax post data to server
            $.post('delete-account.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         
          output = '<div class="success">'+response.text+'</div>';
         

        var delay = 5000; //Your delay in milliseconds
        setTimeout(function(){ window.location = '../../../logout.php'; }, delay);
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        $(".result-decline").hide().html(output).slideDown();
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
        
        var image_upload  = $('input[name=image_upload]').val();
        var images = $('input[name=images]').val();

        
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





/**Save Billing Info**/



 $(".save-billinginfo_and_credit_info").click(function() { 

       alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields       
        
        
       
       
        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'billing_address_one'     : $('input[name=billing_address_one]').val(),
                'billing_address_two'     : $('input[name=billing_address_two]').val(),
                'billing-city'     : $('input[name=billing-city]').val(),
                'billing-state'     : $('input[name=billing-state]').val(),
                'billing-zip'     : $('input[name=billing-zip]').val(),
                'billing-country'     : $("select[name=billing-country]").val()

            };
 

            

            //Ajax post data to server
            $.post('save-billing.php', post_data, function(response){  
             
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    //$("#profile-form input[required=true], #profile-form textarea[required=true]").val(''); 
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





});
