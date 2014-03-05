function commercial_loan_check()
{
	var x=(document.forms["commercialloanapplication"]["menu-4"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select When do you need the loan?');
	return false;
	}

	var x=(document.forms["commercialloanapplication"]["text-1"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Desired Loan Amount');
	return false;
	}
	var x=(document.forms["commercialloanapplication"]["text-5"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill first name');
	return false;
	}
	var x=(document.forms["commercialloanapplication"]["text-6"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill last name');
	return false;
	}
	var x=(document.forms["commercialloanapplication"]["email-158"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill e-mail address');
	return false;
	}
	var x=(document.forms["commercialloanapplication"]["email-158"].value);
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	alert("Not a valid e-mail address");
	return false;
	}
	var x=(document.forms["commercialloanapplication"]["text-10"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill day phone');
	return false;
	}
	var x=(document.forms["commercialloanapplication"]["text-12"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill full name of business');
	return false;
	}
	var x=(document.forms["commercialloanapplication"]["text-13"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill telephone number');
	return false;
	}
}

function loan_modification_check()
{
	var x=(document.forms["loanmodification"]["text-850"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill your first name for loan modification');
	return false;
	}

	var x=(document.forms["loanmodification"]["text-329"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill your last name');
	return false;
	}

	var x=(document.forms["loanmodification"]["text-174"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill your phone number');
	return false;
	}

	var x=(document.forms["loanmodification"]["text-174"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;
	var len=trimmed.length;
	if (isNaN(trimmed) || len!=10)
	{
	alert('please enter 10 digits in number');
	//document.forms["loanstatusform"]["cnumber"].value="Phone:";
	return false;
	}

	var x=(document.forms["loanmodification"]["email-985"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill e-mail address');
	return false;
	}
	var x=(document.forms["loanmodification"]["email-985"].value);
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	alert("Not a valid e-mail address");
	return false;
	}
	var x=(document.forms["loanmodification"]["menu-614"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select state');
	return false;
	}
	var x=(document.forms["loanmodification"]["menu-299"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select employment');
	return false;
	}
	var x=(document.forms["loanmodification"]["text-242"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Mortgage lender');
	return false;
	}
	var x=(document.forms["loanmodification"]["menu-290"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select Mortgage history');
	return false;
	}
	var x=(document.forms["loanmodification"]["menu-904"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select hardship');
	return false;
	}
}

function loanform_check()
{
	var x=(document.forms["loanstatusform"]["name"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill the first name');
	return false;
	}

	var x=(document.forms["loanstatusform"]["lastname"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill the last name');
	return false;
	}

	var x=(document.forms["loanstatusform"]["email"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill the email address');
	return false;
	}

	var x=(document.forms["loanstatusform"]["email"].value);
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	alert("Not a valid e-mail address");
	return false;
	}


	var x=(document.forms["loanstatusform"]["cnumber"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill the phone number');
	return false;
	}

	var x=(document.forms["loanstatusform"]["cnumber"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;
	var len=trimmed.length;
	if (isNaN(trimmed) || len!=10)
	{
	alert('please enter 10 digits in number');
	document.forms["loanstatusform"]["cnumber"].value="Phone:";
	return false;
	}

	var x=(document.forms["loanstatusform"]["know"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please select from drop down');
	return false;
	}


}

function online_application_check()
{
	var x=(document.forms["online_application"]["text-2"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Estimated Loan Amount');
	//document.forms["online_application"]["text-2"].style.backgroundColor="#FF0000";
	document.forms["online_application"]["text-2"].style.border="2px solid #FF0000";
	document.forms["online_application"]["text-2"].style.color="#FF0000";
	//document.forms["online_application"]["text-2"].value="Should not be blank";
	/*.style.border="thick solid #0000FF"*/
	return false;
	}

	var x=(document.forms["online_application"]["text-3"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Applicant First Name');
	document.forms["online_application"]["text-3"].style.border="2px solid #FF0000";
	document.forms["online_application"]["text-3"].style.color="#FF0000";
	//document.forms["online_application"]["text-3"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["online_application"]["text-4"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Applicant Last Name');
	document.forms["online_application"]["text-4"].style.border="2px solid #FF0000";
	document.forms["online_application"]["text-4"].style.color="#FF0000";
	//document.forms["online_application"]["text-4"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["online_application"]["text-6"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Home Phone');
	document.forms["online_application"]["text-6"].style.border="2px solid #FF0000";
	document.forms["online_application"]["text-6"].style.color="#FF0000";
	//document.forms["online_application"]["text-6"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["online_application"]["text-777"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Social Sec. No');
	document.forms["online_application"]["text-777"].style.border="2px solid #FF0000";
	document.forms["online_application"]["text-777"].style.color="#FF0000";
	//document.forms["online_application"]["text-777"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["online_application"]["text-9"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="DD/MM/YYYY" )
	{
	alert('please fill Date Of Birth');
	document.forms["online_application"]["text-9"].style.border="2px solid #FF0000";
	document.forms["online_application"]["text-9"].style.color="#FF0000";
	//document.forms["online_application"]["text-92"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["online_application"]["email-915"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill e-mail address');
	document.forms["online_application"]["email-915"].style.border="2px solid #FF0000";
	document.forms["online_application"]["email-915"].style.color="#FF0000";
	//document.forms["online_application"]["email-915"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["online_application"]["email-915"].value);
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	alert("Not a valid e-mail address");
	document.forms["online_application"]["email-915"].style.border="2px solid #FF0000";
	document.forms["online_application"]["email-915"].style.color="#FF0000";
	//;document.forms["online_application"]["email-915"].value="Not valid email";
	return false;
	}
}

function loanform_check_quick()
{
	var x=(document.forms["QuickOnlineApplication"]["menu-54"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select How soon do you need the loan?');
	return false;
	}

	var x=(document.forms["QuickOnlineApplication"]["menu-55"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select Type of Property');
	return false;
	}

	var x=(document.forms["QuickOnlineApplication"]["menu-56"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select State where the property is located');
	return false;
	}

	var x=(document.forms["QuickOnlineApplication"]["text-197"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Desired Loan Amount');
	return false;
	}

	var x=(document.forms["QuickOnlineApplication"]["text-198"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Estimated Value of the Property');
	return false;
	}

	var x=(document.forms["QuickOnlineApplication"]["menu-57"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select Rate your Credit');
	return false;
	}






	var x=(document.forms["QuickOnlineApplication"]["menu-59"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select Have you been late on your mortgage or rent?');
	return false;
	}







	var x=(document.forms["QuickOnlineApplication"]["text-202"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill First Name');
	return false;
	}
	var x=(document.forms["QuickOnlineApplication"]["text-204"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Last Name');
	return false;
	}

	var x=(document.forms["QuickOnlineApplication"]["your-email"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill e-mail address');
	return false;
	}
	var x=(document.forms["QuickOnlineApplication"]["your-email"].value);
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	alert("Not a valid e-mail address");
	return false;
	}





	var x=(document.forms["QuickOnlineApplication"]["text-208"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Day Phone');
	return false;
	}




	var x=(document.forms["QuickOnlineApplication"]["text-210"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill What is your Gross Monthly Income');
	return false;
	}



	var x=(document.forms["QuickOnlineApplication"]["menu-61"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="---")
	{
	alert('please select How long have you been at your current job');
	return false;
	}
	/*var x=(document.forms["QuickOnlineApplication"]["email"].value);
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	alert("Not a valid e-mail address");
	return false;
	}


	var x=(document.forms["QuickOnlineApplication"]["cnumber"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill the phone number');
	return false;
	}

	var x=(document.forms["QuickOnlineApplication"]["cnumber"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;
	var len=trimmed.length;
	if (isNaN(trimmed) || len!=10)
	{
	alert('please enter 10 digits in number');
	//document.forms["QuickOnlineApplication"]["cnumber"].value="Phone:";
	return false;
	}

	var x=(document.forms["QuickOnlineApplication"]["know"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please select from drop down');
	return false;
	}
	*/

}

function linktostep2_reverse()
{

	var x=(document.forms["reverse_application"]["cf6_field_4"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Applicant First Name');
	document.forms["reverse_application"]["cf6_field_4"].style.border="2px solid #FF0000";
	document.forms["reverse_application"]["cf6_field_4"].style.color="#FF0000";
	//document.forms["reverse_application"]["text-3"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["reverse_application"]["cf6_field_5"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Applicant Last Name');
	document.forms["reverse_application"]["cf6_field_5"].style.border="2px solid #FF0000";
	document.forms["reverse_application"]["cf6_field_5"].style.color="#FF0000";
	//document.forms["reverse_application"]["text-4"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["reverse_application"]["cf6_field_6"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Social Sec. Number');
	document.forms["reverse_application"]["cf6_field_6"].style.border="2px solid #FF0000";
	document.forms["reverse_application"]["cf6_field_6"].style.color="#FF0000";
	//document.forms["reverse_application"]["text-6"].value="Should not be blank";
	return false;
	}

	var x=(document.forms["reverse_application"]["cf6_field_7"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="" || trimmed=="DD/MM/YYYY" )
	{
	alert('please fill Date Of Birth');
	document.forms["reverse_application"]["cf6_field_7"].style.border="2px solid #FF0000";
	document.forms["reverse_application"]["cf6_field_7"].style.color="#FF0000";
	//document.forms["reverse_application"]["text-92"].value="Should not be blank";
	return false;
	}

	var x=(document.forms["reverse_application"]["cf6_field_10"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill e-mail address');
	document.forms["reverse_application"]["cf6_field_10"].style.border="2px solid #FF0000";
	document.forms["reverse_application"]["cf6_field_10"].style.color="#FF0000";
	//document.forms["reverse_application"]["email-915"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["reverse_application"]["cf6_field_10"].value);
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	alert("Not a valid e-mail address");
	document.forms["reverse_application"]["cf6_field_10"].style.border="2px solid #FF0000";
	document.forms["reverse_application"]["cf6_field_10"].style.color="#FF0000";
	//;document.forms["reverse_application"]["email-915"].value="Not valid email";
	return false;
	}

document.getElementById('step1').style.display = 'none';
document.getElementById('step2').style.display = 'block';
jQuery(window).scrollTop(230);
return false;
}

function linktostep3_reverse()
{
document.getElementById('step2').style.display = 'none';
document.getElementById('step3').style.display = 'block';
jQuery(window).scrollTop(230);
return false;
}

function linktostep4_reverse()
{
document.getElementById('step3').style.display = 'none';
document.getElementById('step4').style.display = 'block';
jQuery(window).scrollTop(230);
return false;
}
function linktostep5_reverse()
{
document.getElementById('step4').style.display = 'none';
document.getElementById('step5').style.display = 'block';
jQuery(window).scrollTop(230);
return false;
}

function linktostep2_stepapplication()
{
var x=(document.forms["step_application"]["cf_field_29"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill e-mail address');
	document.forms["step_application"]["cf_field_29"].style.border="2px solid #FF0000";
	document.forms["step_application"]["cf_field_29"].style.color="#FF0000";
	//document.forms["online_application"]["email-915"].value="Should not be blank";
	return false;
	}
	var x=(document.forms["step_application"]["cf_field_29"].value);
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	alert("Not a valid e-mail address");
	document.forms["step_application"]["cf_field_29"].style.border="2px solid #FF0000";
	document.forms["step_application"]["cf_field_29"].style.color="#FF0000";
	//;document.forms["online_application"]["email-915"].value="Not valid email";
	return false;
	}

	var x=(document.forms["step_application"]["cf_field_30"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Social Sec. No');
	document.forms["step_application"]["cf_field_30"].style.border="2px solid #FF0000";
	document.forms["step_application"]["cf_field_30"].style.color="#FF0000";
	//document.forms["online_application"]["text-777"].value="Should not be blank";
	return false;
	}



document.getElementById('step1').style.display = 'none';
document.getElementById('step2').style.display = 'block';
jQuery(window).scrollTop(230);
return false;
}

function linktostep3_stepapplication()
{
	var x=(document.forms["step_application"]["cf2_field_11"].value);
	var trimmed = x.replace(/^\s+|\s+$/g, '') ;

	if(trimmed==null || trimmed=="")
	{
	alert('please fill Monthly Income Amount');
	document.forms["step_application"]["cf2_field_11"].style.border="2px solid #FF0000";
	document.forms["step_application"]["cf2_field_11"].style.color="#FF0000";
	//document.forms["online_application"]["text-6"].value="Should not be blank";
	return false;
	}

document.getElementById('step2').style.display = 'none';
document.getElementById('step3').style.display = 'block';
jQuery(window).scrollTop(230);
return false;
}

function linktostep4_stepapplication()
{
document.getElementById('step3').style.display = 'none';
document.getElementById('step4').style.display = 'block';
jQuery(window).scrollTop(230);
return false;
}
function linktostep5_stepapplication()
{
document.getElementById('step4').style.display = 'none';
document.getElementById('step5').style.display = 'block';
jQuery(window).scrollTop(230);
return false;
}

function stepback_application(stepnow) {
//if(!isNaN(stepnow) || stepnow<2)    stepnow = 2;
stepnow--;
jQuery("#step1, #step2, #step3, #step4, #step5").hide(0);
jQuery("#step" + stepnow).show(0);
jQuery(window).scrollTop(230);
return false;
}

window.onload = function() {
    jQuery("#step1, #step2, #step3, #step4, #step5").hide(0);
    jQuery("#step1").show(0);
};