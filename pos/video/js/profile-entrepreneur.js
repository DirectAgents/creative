$(document).ready(function() {


var url_link = 'http://localhost/creative/pos/video/startup/';

var image_link = 'http://localhost/creative/pos/video/';



////////////////Load Profile//////////////////////

$("#profile-tab").click(function (e) {
    //alert("adsf");
       e.preventDefault();

    var userid = $('input[name=userid]').val();

     $.ajax({
            url: url_link+"profile-tab.php",
            method: "POST",
            data: {userid: userid},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $('#profile-tab-data').html(response);
                //alert(skills_count);  

            }
        });

});



////////////////Update Profile//////////////////////


$( "#update-profile" ).on( "submit", function(e) {
//alert("asdf");
e.preventDefault();

            $.ajax({
                url: url_link+"update.php",
                method: "POST",
                data: $(this).serialize(),
                dataType: "html",
                success: function(response) {
                    
                var submit = $(".btn-update-profile").html("<span class='glyphicon glyphicon-repeat gly-spin'></span> Saving"); //
                setTimeout(function() { $(submit).html("Update Profile") }, 2000);

                var fullname = $(response).filter('#fullname').html();
                $('#fullname').html(fullname);

                var city_state = $(response).filter('#city-state').html();
                $('#city-state').html(city_state);

                var facebook = $(response).filter('#facebook').html();
                if (facebook.indexOf("http://") == 0 || facebook.indexOf("https://") == 0) {
                  $('#facebook').html("<a href="+facebook+" target='_blank'><i class='ti-facebook'></i></a>");
                }else{
                  $('#facebook').html("<a href=http://"+facebook+" target='_blank'><i class='ti-facebook'></i></a>"); 
                }

                var twitter = $(response).filter('#twitter').html();
                if (twitter.indexOf("http://") == 0 || twitter.indexOf("https://") == 0) {
                  $('#twitter').html("<a href="+twitter+" target='_blank'><i class='ti-twitter'></i></a>");
                }else{
                  $('#twitter').html("<a href=http://"+twitter+" target='_blank'><i class='ti-twitter'></i></a>"); 
                }

                var linkedin = $(response).filter('#linkedin').html();

                if (linkedin.indexOf("http://") == 0 || linkedin.indexOf("https://") == 0) {
                  $('#linkedin').html("<a href="+linkedin+" target='_blank'><i class='ti-linkedin'></i></a>"); 
                }else{
                  $('#linkedin').html("<a href=http://"+linkedin+" target='_blank'><i class='ti-linkedin'></i></a>"); 
                }

               
               }
                
            });


        var skill = $('input[name="skillselection[]"]:checked').map(function() { return this.value; }).get().join(",");
        //var skill_level_percentage = $('input[name=skill_level]').val();
        //alert(skill);
      
        $.ajax({
            url: url_link+"edit.php",
            method: "POST",
            data: { content: skill, column_name: 'Skills' },
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills_count = $(response).filter('#theskills').text();
                //$('#skills-count').html(skills_count);
                //alert(skills_count);  

            }
        });



 });

////////////////Skills//////////////////////

$("#add-skills").click(function (e) {
    //alert("adsf");
       e.preventDefault();
     if($("#fm_skills").val()==='')
      {
        //alert("Please enter a job position!");
        return false;
      }
      var myData = 'skills='+ $("#fm_skills").val()+'&skills_level='+ $("#fm_skills_level").val()+'&userid='+ $("#userid").val(); 
      //alert(myData);
      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        $("#responds").append(response);
        $("#fm_skills").val('');
        //$('#interestimportant').prop('checked', true); // checks it
       
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
      });
  });



$("body").on("click", "#responds .del_button", function(e) {
     e.preventDefault();
     var clickedID = this.id.split('-'); 
     //var DbNumberID =   $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
     var DbNumberID = clickedID[1]; 
     var myData = 'recordToDelete='+ DbNumberID +'&projectid='+ $("#projectid").val(); 
     
     //alert(DbNumberID);


      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills.php", 
      dataType:"text", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        $('#skillselection_'+DbNumberID).prop('checked', false); // Unchecks it
        
        $('#item_'+DbNumberID).fadeOut("slow");

        
        //alert(response);
      
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });


$("body").on("click", "#responds .del_button_teammmember_skills", function(e) {
     e.preventDefault();
     var clickedID = this.id.split('-'); 
     //var DbNumberID =   $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
     var DbNumberID = clickedID[1]; 
     var myData = 'recordToDelete='+ DbNumberID +'&projectid='+ $("#projectid").val(); 
     
     //alert(DbNumberID);


      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills.php", 
      dataType:"text", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        $('#skillselectionteammember_'+DbNumberID).prop('checked', false); // Unchecks it
        
        $('#item_'+DbNumberID).fadeOut("slow");

        
        //alert(response);
      
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });








 $(function() {
    $( "#fm_skills" ).autocomplete({
      source: url_link+'search-skills.php'
    });
  });


////////////////Enter Zip Code to retrieve City and State//////////////////////


        $.ajax({
                url: url_link+"select.php",
                method: "POST",
                data: { column_name: 'Zip' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
                    
                if (zip != ''){  
                   $(".zip-textinput").hide();
                   $(".city-state-textinput").show();
                   $(".city-state-textinput").val(zip);

                  }else{

                   $(".zip-textinput").show();
                   $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
                   $(".city-state-textinput").hide();
                   
                }
               
               }
                
            });


$('.zip-textinput').keyup(function(){
    var zip_input = $(this).val();
    if(zip_input.length == 5){
        //alert("asdf");

     $.ajax({
                url: url_link+"edit.php",
                method: "POST",
                data: { content: zip_input, column_name: 'Zip' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
                   //alert(zip);
                   $(".zip-textinput").show();
                   $(".city-state-textinput").val(zip);
                   
                }
                
            });


    };
});




$('.city-state-textinput').focus(function(){

    $(".city-state-textinput").hide();
    $(".zip-textinput").show();
    $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
    
   
});





$('.zip-textinput').blur(function(){
//alert("asdf");

var zip_input = $(this).val();

$.ajax({
                url: url_link+"edit.php",
                method: "POST",
                data: { content: zip_input, column_name: 'Zip' },
                dataType: "html",
                success: function(response) {
                   
                   var zip = $(response).filter('#zip').html(); 
        
                   if (zip != ''){  
                   $(".zip-textinput").hide();
                   $(".city-state-textinput").show();
                   $(".city-state-textinput").val(zip);

                  }else{

                   $(".zip-textinput").show();
                   $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
                   $(".city-state-textinput").hide();
                   
                  }
                   
                }
                
            });

   
});



////////////////Team Members//////////////////////

$(".add-team-member").click(function (e) {
    e.preventDefault();

    var userid = $('input[name=userid]').val();
    //alert(userid);
    $.ajax({
            url: url_link+"add-new-member.php", 
            method: "POST",
            data: {userid: userid},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#existing-team-members").html(response);
                //alert(skills_count);  

            }
        });


});








$(".cancel-team-member").click(function (e) {
    e.preventDefault();

    var userid = $('input[name=userid]').val();
    //alert(userid);
    $.ajax({
            url: url_link+"existing-team-members.php", 
            method: "POST",
            data: $(this).serialize(),
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#existing-team-members").load(url_link+"existing-team-members.php?userid="+userid);
                //alert(skills_count);  

            }
        });
});



$( "#save-team-member" ).on( "submit", function(e) {  
    e.preventDefault();
    var proceed = true;

    var id = $("input[name='id']").val();
    var userid = $("input[name='userid']").val();
    var fm_about = $("textarea[name='fm_about']").val();
    var fm_fullname = $("input[name='fm_fullname']").val();
    var fm_position = $("input[name='fm_position']").val();
    var fm_facebook = $("input[name='fm_facebook']").val();
    var fm_twitter = $("input[name='fm_twitter']").val();
    var fm_linkedin = $("input[name='fm_linkedin']").val();
    var skills = $('input[name="skillselectionteammember[]"]:checked').map(function() { return this.value; }).get().join(",");
    alert(skills);
    
    if (fm_fullname == '') {
        $('input[name=fm_fullname]').css('border-bottom','1px solid red'); 
        proceed = false;
    }else{
      $('input[name=fm_fullname]').css('border-bottom','1px solid green'); 
    }

    if (fm_position == '') {
        $('input[name=fm_position]').css('border-bottom','1px solid red'); 
        proceed = false;
    }else{
      $('input[name=fm_position]').css('border-bottom','1px solid green'); 
    }

     if(proceed) 
        {   

    

    $.ajax({
            url: url_link+"save-team-members.php", 
            method: "POST",
            data: { id: id, userid: userid, fullname : fm_fullname, position : fm_position, skills : skills, about : fm_about },
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#existing-team-members").load(url_link+"existing-team-members.php?userid="+userid);
                //alert(skills_count);  

            }
        });


      }
});


$("#add-skills-team-member").click(function (e) {
    //alert("adsf");
       e.preventDefault();
     if($("#fm_skills").val()==='')
      {
        //alert("Please enter a job position!");
        return false;
      }
      var myData = 'skills='+ $("#fm_skills").val()+'&skills_level='+ $("#fm_skills_level").val()+'&userid='+ $("#userid").val(); 
      //alert(myData);
      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills-team-member.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        $("#responds").append(response);
        $("#fm_skills").val('');
        //$('#interestimportant').prop('checked', true); // checks it
       
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
      });
  });




});