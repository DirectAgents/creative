$(document).ready(function() {


var currentValue = window.location.hash.substr(1)


if(currentValue == "skills") {
$("#skills").addClass('active');
$("#about").removeClass('active');
$("#work").removeClass('active');
}

if(currentValue == "about") {
$("#about").addClass('active');
$("#skills").removeClass('active');
$("#work").removeClass('active');
}

if(currentValue == "work") {
$("#work").addClass('active');
$("#skills").removeClass('active');
$("#about").removeClass('active');
}



$("#add-skills").click(function (e) {
       e.preventDefault();
     if($("#interests").val()==='')
      {
        //alert("Please enter a job position!");
        return false;
      }
      var myData = 'interests='+ $("#interests").val()+'&userid='+ $("#userid").val(); 
      //alert(myData);
      jQuery.ajax({
      type: "POST", 
      url: "../interests.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        $("#responds").append(response);
        $("#interests").val('');
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
      url: "../interests.php", 
      dataType:"text", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        $('#interestselection_'+DbNumberID).prop('checked', false); // Unchecks it
        
        $('#item_'+DbNumberID).fadeOut("slow");

        
        //alert(response);
      
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });


   $(function() {
    $( "#interests" ).autocomplete({
      source: '../search-interest.php'
    });
  });





});  