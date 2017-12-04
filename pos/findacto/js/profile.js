$(document).ready(function() {


   $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var zip = $(response).filter('#zip').html();
                   var about = $(response).filter('#about').html();
                   var phone = $(response).filter('#phone').html(); 
                   var email = $(response).filter('#email').html(); 
                   //alert(zip);
                   
                   if (zip != ''){
                        $('.zip-textinput').removeClass('hidden');
                        $('.zip').html(zip);
                        $('.zip-textinput').contents().unwrap();
                        $('#edit-zip').show();
                        $('#add-zip').hide();

                    }else{
                        $('.zip-textinput').addClass('hidden');
                        $('#add-zip').show();
                    } 

                   if (about != ''){
                        $('.about-textarea').removeClass('hidden');
                        $('.about').html(about);
                        $('.about-textarea').contents().unwrap();
                        $('#edit-about').show();
                        $('#add-about').hide();

                    }else{
                        $('.about-textarea').addClass('hidden');
                        $('#add-about').show();
                    } 

                   if (phone != ''){
                        $('.phone-textinput').removeClass('hidden');
                        $('.phone').html(phone);
                        $('.phone-textinput').contents().unwrap();
                        $('#edit-phone').show();
                        $('#add-phone').hide();

                    }else{
                        $('.phone-textinput').addClass('hidden');
                        $('#add-phone').show();
                    }
                   
                   
                   if (email != ''){
                        $('.email-textinput').removeClass('hidden');
                        $('.email').html(email);
                        $('.email-textinput').contents().unwrap();
                        $('#edit-email').show();
                        $('#add-email').hide();
                    }else{
                        $('.email-textinput').addClass('hidden');
                        $('#add-email').show();

                        
                    }
                   

                   

                }
                
            });







    ////////////////////About///////////////////////

   $('#add-about').click(function() {
    //alert("111");
        $('.about-textarea').removeClass('hidden');
        $('#add-about').hide();
        $('#edit-about').hide();
        $('.about-textarea').show();
        $('#save-about').show();
        $('#cancel-about').show();

    });
     
    
 $('#edit-about').click(function() {
    //alert("www113rddttteee444333");
        



           $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var about = $(response).filter('#about').html();
                   
                   if (about != ''){
                    //$('.about input[type=text]').html(about);
                    //$('td.about').contents().wrapInner('<input type="text" class="about-textinput" value="'+about+'" placeholder="Enter your number">');
                    //alert(about);
                        $('.about-textarea').removeClass('hidden');
                        $('.about').addClass('show');
                        //$('.about-textinput').show();
                        $('.about').html('<textarea class="about-textarea" placeholder="Tell a little about yourself">'+about+'</textarea>');
                        $('#save-about').show();
                        $('#cancel-about').show();
                        //$('.about-textinput').show();
                        //$('.about-textinput').contents().wrap('<input type="text" class="about-textinput" value="'+about+'" placeholder="Enter your number">');
                        //$('td.about').html('<input type="text" class="about-textinput" value="'+about+'" placeholder="Enter your number">');
                        $('#edit-about').hide();
                        $('#add-about').hide();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.about-textinput').addClass('hidden');
                        $('.about-textinput').hide();
                        $('#edit-about').hide();
                        $('#add-about').show();
                    }
                   
                   

                }
                
            });



    });

   

    $('#save-about').click(function() {
        $('#save-about').hide();
        $('.about textarea').each(function() {
            var content = $(this).val().replace(/^\s*|\s*$/g,''); //.replace(/\n/g,"<br>");

            if (!content) {

                $('#save-about').show();
                $(this).css('border-color', 'red');

            } else {

                $(this).html(content);
                $(this).contents().unwrap();

                $.ajax({
                    url: "../edit.php",
                    method: "POST",
                    data: { content: content, column_name: 'About' },
                    dataType: "html",
                    success: function(response) {
                        //alert(data);  
                        //$('.phone').html(response);
                        var about = $(response).filter('#about').html();
                        $('.about').html(about);
                        $('#edit-about').show();
                    }
                });

                $('#edit-about').show();
                $('#cancel-about').hide();

            }

        });



    });


$('#cancel-about').click(function() {


        $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var about = $(response).filter('#about').html(); 
                   //alert(phone);
                   if (about != ''){
                        $('.about').html(about);
                        $('.about-textarea').contents().unwrap();
                        $('#edit-about').show();
                        $('#add-about').hide();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.about-textarea').hide();
                        $('#edit-about').hide();
                        $('#add-about').show();
                    }
                   
                   

                }
                
            });

           
            $('#save-about').hide();
            $('#cancel-about').hide();
         
    });



    ///////Skills/////////



    $('#save-skills').click(function() {


        //var content = $(this).val();//.replace(/\n/g,"<br>");
        var interest = $('input[name="interestselection[]"]:checked').map(function() { return this.value; }).get().join(",");
        //alert(interest);
        //$(this).html("adfasd").delay(3000).hide();
        var submit = $(this).html("<span class='glyphicon glyphicon-repeat gly-spin'></span> Saving"); //
        setTimeout(function() { $(submit).html("<span class='glyphicon glyphicon-ok'></span> Save") }, 2000);
        $.ajax({
            url: "../edit.php",
            method: "POST",
            data: { content: interest, column_name: 'Skills' },
            dataType: "text",
            success: function(response) {
                //alert(data);  
                var skills_count = $(response).filter('#theskills').text();
                $('#skills-count').html(skills_count);
                //alert(skills_count);  

            }
        });
    });








   ////////////////Email//////////////////////

    
$('#add-email').click(function() {
    //alert("111");
        $('.email-textinput').removeClass('hidden');
        $('#add-email').hide();
        $('#edit-email').hide();
        $('.email-textinput').show();
        $('#save-email').show();
        $('#cancel-email').show();

    });
     
    
 $('#edit-email').click(function() {
    //alert("www113rddttteee444333");
        



           $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var email = $(response).filter('#email').html();
                   
                   if (email != ''){
                    //$('.email input[type=text]').html(email);
                    //$('td.email').contents().wrapInner('<input type="text" class="email-textinput" value="'+email+'" placeholder="Enter your number">');
                    //alert(email);
                        $('.email-textinput').removeClass('hidden');
                        $('.email').addClass('show');
                        //$('.email-textinput').show();
                        $('.email').html('<input type="text" class="email-textinput" value="'+email+'" placeholder="Enter your number">');
                        $('#save-email').show();
                        $('#cancel-email').show();
                        //$('.email-textinput').show();
                        //$('.email-textinput').contents().wrap('<input type="text" class="email-textinput" value="'+email+'" placeholder="Enter your number">');
                        //$('td.email').html('<input type="text" class="email-textinput" value="'+email+'" placeholder="Enter your number">');
                        $('#edit-email').hide();
                        $('#add-email').hide();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.email-textinput').addClass('hidden');
                        $('.email-textinput').hide();
                        $('#edit-email').hide();
                        $('#add-email').show();
                    }
                   
                   

                }
                
            });



    });

   

    $('#save-email').click(function() {
        $('#save-email').hide();
        $('.email input[type=text]').each(function() {
            var content = $(this).val().replace(/^\s*|\s*$/g,''); //.replace(/\n/g,"<br>");

            if (!content) {

                $('#save-email').show();
                $(this).css('border-color', 'red');

            } else {

                $(this).html(content);
                $(this).contents().unwrap();

                $.ajax({
                    url: "../edit.php",
                    method: "POST",
                    data: { content: content, column_name: 'Email' },
                    dataType: "html",
                    success: function(response) {
                        //alert(data);  
                        //$('.phone').html(response);
                        var email = $(response).filter('#email').html();
                        $('.email').html(email);
                        $('#edit-email').show();
                    }
                });

                $('#edit-email').show();
                $('#cancel-email').hide();

            }

        });



    });


$('#cancel-email').click(function() {


        $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var email = $(response).filter('#email').html(); 
                   //alert(phone);
                   if (email != ''){
                        $('.email').html(email);
                        $('.email-textinput').contents().unwrap();
                        $('#edit-email').show();
                        $('#add-email').hide();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.email-textinput').hide();
                        $('#edit-email').hide();
                        $('#add-email').show();
                    }
                   
                   

                }
                
            });

           
            $('#save-email').hide();
            $('#cancel-email').hide();
         
    });





    ////////////////Phone//////////////////////

    
$('#add-phone').click(function() {
    //alert("111");
        $('.phone-textinput').removeClass('hidden');
        $('#add-phone').hide();
        $('#edit-phone').hide();
        $('.phone-textinput').show();
        $('#save-phone').show();
        $('#cancel-phone').show();

    });
     
    
 $('#edit-phone').click(function() {
    //alert("www113rddttteee444333");
        



           $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var phone = $(response).filter('#phone').html();
                   
                   if (phone != ''){
                    //$('.phone input[type=text]').html(phone);
                    //$('td.phone').contents().wrapInner('<input type="text" class="phone-textinput" value="'+phone+'" placeholder="Enter your number">');
                    //alert(phone);
                        $('.phone-textinput').removeClass('hidden');
                        $('.phone').addClass('show');
                        //$('.phone-textinput').show();
                        $('.phone').html('<input type="text" class="phone-textinput" value="'+phone+'" placeholder="Enter your number">');
                        $('#save-phone').show();
                        $('#cancel-phone').show();
                        //$('.phone-textinput').show();
                        //$('.phone-textinput').contents().wrap('<input type="text" class="phone-textinput" value="'+phone+'" placeholder="Enter your number">');
                        //$('td.phone').html('<input type="text" class="phone-textinput" value="'+phone+'" placeholder="Enter your number">');
                        $('#edit-phone').hide();
                        $('#add-phone').hide();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.phone-textinput').addClass('hidden');
                        $('.phone-textinput').hide();
                        $('#edit-phone').hide();
                        $('#add-phone').show();
                    }
                   
                   

                }
                
            });



    });

   

    $('#save-phone').click(function() {
        $('#save-phone').hide();
        $('.phone input[type=text]').each(function() {
            var content = $(this).val().replace(/^\s*|\s*$/g,''); //.replace(/\n/g,"<br>");

            if (!content) {

                $('#save-phone').show();
                $(this).css('border-color', 'red');

            } else {

                $(this).html(content);
                $(this).contents().unwrap();

                $.ajax({
                    url: "../edit.php",
                    method: "POST",
                    data: { content: content, column_name: 'Phone' },
                    dataType: "html",
                    success: function(response) {
                        //alert(data);  
                        //$('.phone').html(response);
                        var phone = $(response).filter('#phone').html();
                        $('.phone').html(phone);
                        $('#edit-phone').show();
                    }
                });

                $('#edit-phone').show();
                $('#cancel-phone').hide();

            }

        });



    });


$('#cancel-phone').click(function() {


        $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var phone = $(response).filter('#phone').html(); 
                   //alert(phone);
                   if (phone != ''){
                        $('.phone').html(phone);
                        $('.phone-textinput').contents().unwrap();
                        $('#edit-phone').show();
                        $('#add-phone').hide();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.phone-textinput').hide();
                        $('#edit-phone').hide();
                        $('#add-phone').show();
                    }
                   
                   

                }
                
            });

           
            $('#save-phone').hide();
            $('#cancel-phone').hide();
         
    });

    



    ////////////////Work//////////////////////

    $('.btn-add-work').click(function() {
        $('.list-work-box').hide();

        $('.btn-add-work').hide();
        $('.btn-list-work').fadeIn("fast");
        $('.add-work-box').fadeIn("fast");
    });


    

    $('.btn-list-work').click(function() {
        //alert("adsfasd");
        $('.list-work-box').show();

        $('.btn-add-work').fadeIn("fast");
        $('.btn-list-work').hide();
        $('.add-work-box').hide();
        $('.edit-work-box').hide();

        $.ajax({
            url: "../select-work.php",
            method: "POST",
            data: { userid: '1' },
            dataType: "html",
            success: function(response) {

                $('.list-work-box').html(response);
                //window.location.reload(false); 
                //$(".list-work-box").fadeIn('fast');
                //$(".list-work-box").show().html(response).fadeIn('fast');

            }
        });

    });

    $('#save-work').click(function() {
        //alert("asdfasd");
        $('#save-phone').hide();

        $("#add-work-form").validate({

            submitHandler: function(validator, form, submitButton) {

                var name = $("input[name=work-name]").val();
                var link = $("input[name=work-link]").val();
                var description = $("textarea[name='work-description']").val();
                var screenshots = $('input[name="screenshots[]"]:checked').map(function() { return this.value; }).get().join(",");

                $.ajax({
                    url: "../insert-work.php",
                    method: "POST",
                    data: { name: name, link: link, description: description, screenshots: screenshots },
                    dataType: "text",
                    success: function(response) {
                        //alert(data);  
                        $('#saved').fadeIn("fast");
                        $('#saved').delay(2000).fadeOut("slow");

                        $('#work-count').html(response);

                    }
                });

                $("#add-work-form")[0].reset();
                //validator.defaultSubmit();
            },
            showErrors: function(errorMap, errorList) {
                $.each(this.successList, function(index, value) {
                    $(value).css('border', '1px solid #cccccc');
                    return $(value).popover("hide");
                    proceed = true;
                });
                return $.each(errorList, function(index, value) {
                    $(value.element).css('border-color', 'red');
                    var _popover;
                    console.log(value.message);
                    _popover = $(value.element).popover({
                        trigger: "manual",
                        placement: "bottom",
                        content: value.message,
                        //template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"><p></p></div></div></div>"
                        template: "<div class=\"error-message\"><div class=\"popover-content\"></div></div>"

                    });
                    _popover.data("popover").options.content = value.message;
                    return $(value.element).popover("show");
                });
            }
        });

    });




    $('#save-edit-work').click(function() {
        //alert("234");
        $('#save-phone').hide();

        $("#edit-work-form").validate({

            submitHandler: function(validator, form, submitButton) {

                var id = $("input[name=id]").val();
                var name = $("input[name=work-name-edit]").val();
                var link = $("input[name=work-link-edit]").val();
                var description = $("textarea[name='work-description-edit']").val();
                var screenshots = $('input[name="screenshots[]"]:checked').map(function() { return this.value; }).get().join(",");

                //alert(id);

                $.ajax({
                    url: "../edit-work.php",
                    method: "POST",
                    data: { id: id, name: name, link: link, description: description, screenshots: screenshots },
                    dataType: "text",
                    success: function(response) {
                        //alert(data);  
                        $('#saved').fadeIn("fast");
                        $('#saved').delay(2000).fadeOut("slow");

                    }
                });

                //$("#add-work-form")[0].reset();
                //validator.defaultSubmit();
            },
            showErrors: function(errorMap, errorList) {
                $.each(this.successList, function(index, value) {
                    $(value).css('border', '1px solid #cccccc');
                    return $(value).popover("hide");
                    proceed = true;
                });
                return $.each(errorList, function(index, value) {
                    $(value.element).css('border-color', 'red');
                    var _popover;
                    console.log(value.message);
                    _popover = $(value.element).popover({
                        trigger: "manual",
                        placement: "bottom",
                        content: value.message,
                        //template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"><p></p></div></div></div>"
                        template: "<div class=\"error-message\"><div class=\"popover-content\"></div></div>"

                    });
                    _popover.data("popover").options.content = value.message;
                    return $(value.element).popover("show");
                });
            }
        });

    });



    


    $('.delete-screenshot').click(function(e) {

        var data = $.parseJSON($(this).attr('data-button'));
        //alert(data.screenshot);

        $.ajax({
            url: "../delete-screenshot.php",
            method: "POST",
            data: { userid: '1', id: data.id, screenshot: data.screenshot, random: data.random },
            dataType: "text",
            success: function(response) {
                //alert(data);
                $("#" + response).delay(1000).fadeOut("slow");
                $("#the-screenshots").fadeOut("fast");
                $(".upload-screenshot").delay(1000).fadeIn("slow");
                //$('.upload-screenshot').css("display", "block");


            }
        });

        e.preventDefault();

    });






////////////////Enter Zip Code to retrieve City and State//////////////////////

      
$('#add-zip').click(function() {
    //alert("111");
        $('.zip-textinput').removeClass('hidden');
        $('#add-zip').hide();
        $('#edit-zip').hide();
        $('.zip-textinput').show();
        $('#save-zip').show();
        $('#cancel-zip').show();

    });
     
    
 $('#edit-zip').click(function() {
    //alert("www113rddttteee444333");
        
           $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var zip = $(response).filter('#zip').html();
                   
                   if (zip != ''){
                    //$('.zip input[type=text]').html(zip);
                    //$('td.zip').contents().wrapInner('<input type="text" class="zip-textinput" value="'+zip+'" placeholder="Enter your number">');
                    //alert(zip);
                        $('.zip-textinput').removeClass('hidden');
                        $('.zip').addClass('show');
                        //$('.zip-textinput').show();
                        $('.zip').html('<input type="text" class="zip-textinput" value="" placeholder="Enter your Zip Code">');
                        $('#save-zip').show();
                        $('#cancel-zip').show();
                        //$('.zip-textinput').show();
                        //$('.zip-textinput').contents().wrap('<input type="text" class="zip-textinput" value="'+zip+'" placeholder="Enter your number">');
                        //$('td.zip').html('<input type="text" class="zip-textinput" value="'+zip+'" placeholder="Enter your number">');
                        $('#edit-zip').hide();
                        $('#add-zip').hide();
                        $('td.edit-zip').hide();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.zip-textinput').addClass('hidden');
                        $('.zip-textinput').hide();
                        $('#edit-zip').hide();
                        $('#add-zip').show();
                    }
                   
                   

                }
                
            });



    });

   

    $('#save-zip').click(function() {
        $('#save-zip').hide();
        $('.zip input[type=text]').each(function() {
            var content = $(this).val().replace(/^\s*|\s*$/g,''); //.replace(/\n/g,"<br>");

            if (!content) {

                $('#save-zip').show();
                $(this).css('border-color', 'red');

            } else {

                $(this).html(content);
                $(this).contents().unwrap();

                $.ajax({
                    url: "../edit.php",
                    method: "POST",
                    data: { content: content, column_name: 'Zip' },
                    dataType: "html",
                    success: function(response) {
                        //alert(data);  
                        //$('.phone').html(response);
                        var zip = $(response).filter('#zip').html();
                        $('.zip').html(zip);
                        $('#edit-zip').show();
                        $('td.edit-zip').show();
                    }
                });

                $('#edit-zip').show();
                $('#cancel-zip').hide();

            }

        });



    });


$('#cancel-zip').click(function() {


        $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var zip = $(response).filter('#zip').html(); 
                   //alert(phone);
                   if (zip != ''){
                        $('.zip').html(zip);
                        $('.zip-textinput').contents().unwrap();
                        $('#edit-zip').show();
                        $('#add-zip').hide();
                        $('td.edit-zip').show();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.zip-textinput').hide();
                        $('#edit-zip').hide();
                        $('#add-zip').show();
                        $('td.edit-zip').hide();
                    }
                   
                   

                }
                
            });

           
            $('#save-zip').hide();
            $('#cancel-zip').hide();
         
    });




});