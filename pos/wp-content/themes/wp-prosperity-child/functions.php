<?php 

    /**
	 * Enqueue a custom script
	 *
	 */
    add_action( 'wp_enqueue_scripts', 'rs_include_custom_js' );
	function rs_include_custom_js() {
		wp_enqueue_script( 'customjs', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ));
	}

	add_filter('wpseo_breadcrumb_single_link', 'rs_bc_change');
	function rs_bc_change ($link_output, $link)
	{
		$string = '<a href="http://www.pos.com/dasite"';
		$replace = '<a href="http://www.pos.com"';
		return str_replace($string, $replace, $link_output);

	}
	
	
	
//Executed after form validation, but before any notifications are sent and the entry is stored	

add_action("gform_pre_submission", "pre_submission_handler");
function pre_submission_handler($form){


$thefirstname = $_POST["input_28"];
$firstname = str_replace(' ', '%20', $thefirstname);

$thelastname = $_POST["input_29"];    
$lastname = str_replace(' ', '%20', $thelastname);

$thecompany = $_POST["input_18"];  
$company = str_replace(' ', '%20', $thecompany);

$theemail = $_POST["input_20"]; 
$email = str_replace(' ', '%20', $theemail);

$thephone = $_POST["input_21"]; 
$phone = str_replace(' ', '%20', $thephone);

$thecountry = $_POST["input_24"];
$country = str_replace(' ', '%20', $thecountry);
   
$theaddress = $_POST["input_22"];  
$address = str_replace(' ', '%20', $theaddress);

$thecity = $_POST["input_32"];  
$city = str_replace(' ', '%20', $thecity);

$thezip = $_POST["input_23"];
$zip = str_replace(' ', '%20', $thezip);

$thebusinesstype = $_POST["input_2"];
$businesstype = str_replace(' ', '%20', $thebusinesstype);

$thecurrentlyusing = $_POST["input_12"];
$currentlyusing = str_replace(' ', '%20', $thecurrentlyusing);





if($_POST["input_2"] == 'Restaurant') { 
$thebusiness_category = $_POST["input_3"];
$business_category = str_replace(' ', '%20', $thebusiness_category);
}

if($_POST["input_2"] == 'Retail') { 
$thebusiness_category = $_POST["input_6"];
$business_category = str_replace(' ', '%20', $thebusiness_category);
}

if($_POST["input_2"] == 'E-Commerce') { 
$thebusiness_category = $_POST["input_7"];
$business_category = str_replace(' ', '%20', $thebusiness_category);
}

if($_POST["input_2"] == 'Hotel') { 
$thebusiness_category = $_POST["input_8"];
$business_category = str_replace(' ', '%20', $thebusiness_category);
}


if($_POST["input_2"] == 'Government / Non-Profit') { 
$thebusiness_category = $_POST["input_9"];
$business_category = str_replace(' ', '%20', $thebusiness_category);
}


if($_POST["input_2"] == 'Mobile / Tradeshow / Outdoor') { 
$thebusiness_category = $_POST["input_11"];
$business_category = str_replace(' ', '%20', $thebusiness_category);
}






$thelookingfor = $_POST["input_5"];
$lookingfor = str_replace(' ', '%20', $thelookingfor);

$thelocationsforsystem = $_POST["input_4"];
$locationsforsystem = str_replace(' ', '%20', $thelocationsforsystem);


$themobiletabletoptions = $_POST["input_26"];
$mobiletabletoptions = str_replace(' ', '%20', $themobiletabletoptions);

//$thelookingtoAdd = $_POST["input_5"];
//$lookingtoAdd = str_replace(' ', '%20', $thelookingtoAdd);

$thestate = $_POST["input_30"];
$state = str_replace(' ', '%20', $thestate);

$theotherdetails = $_POST["input_34"];
$otherdetails = str_replace(' ', '%20', $theotherdetails);

	
	
//Clickpoint
$restUrl = "https://leads.leadexec.net/processor/insert/general?VID=6031&LID=3984&AID=13806&OrderID=&FirstName=".$firstname."&LastName=".$lastname."&Company=".$company."&Email=".$email."&PhoneCountry=".$phone."&Country=".$country."&Address=".$address."&Province=&City=".$city."&PostalCode=".$zip."&BusinessType=".$businesstype."&LookingFor=".$lookingfor."&CurrentlyUsing=".$currentlyusing."&LocationsForSystem=".$locationsforsystem."&StationsPerLocation=&MobileTabletOptions=".$mobiletabletoptions."&PurchaseDate=&Whyareyoulooking=&WhatsImportant=&LookingtoAdd=&AccountingIntegration=&CreditCardProcessing=&CurrentProvider=&EstimatedBudget=&Howdidyouhearaboutus=&LocationPrice=&Notes=&ZipCode=".$zip."&State=".$state."&DealerRangePreference=&SearchWord=&Keyword=&POSSpecialistNotes=&Title=&AdditionalCompanyDetails=".$otherdetails."&OldBusinessCategory=&BusinessCategory=".$business_category."
"; 
        
// PHP cURL  for https connection
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $restUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

// converting
$response = curl_exec($ch); 
curl_close($ch);

//print_r( $response );

$parser = simplexml_load_string($response);

$_POST["input_33"] = $parser->LeadIdentifier;
	   
	
}
	
	
	/* --------- [TEMPORARY] Get Rid of DA in the links --------- */
	add_filter('post_link', 'format_url');
	add_filter('the_permalink', 'format_url');
	add_filter('term_link', 'format_url');
	add_filter('category_link', 'format_url');
	add_filter('author_link', 'format_url');
	add_filter('search_link', 'format_url');


	function format_url($url) 
	{
    	return str_replace('/dasite', '', $url);
	}

	add_action( 'template_redirect', 'fb_change_search_url_rewrite' );
	function fb_change_search_url_rewrite() 
	{
		if ( is_search() && ! empty( $_GET['s'] ) ) 
		{
			wp_redirect( "http://www.pos.com/search/" . urlencode( get_query_var( 's' ) ) );
			exit();
		}	
	}
	

	/* ----- Create a shortcode for the POS System sidebar Ad ------ */
	
	function render_pos_ad() {
		 $string = "
		<ul class='step-list' id='step-list'>
    		<li class='step step1'>
    			<div class='step-icon'></div>
    			<div class='step-cont'>
	        		<h4>Step 1</h4>
          			<p>
	          		Answer a Few Simple Questions
	          		</p>
	         	 <div class='step-cont'>
		    </li>

		    <li class='step step2'>
		   	 	<div class='step-icon'></div>
				<div class='step-cont'>		    
		          <h4>Step 2</h4>
		          <p>
		          Browse The Directory
		          </p>
		        <div class='step-cont'>
		    </li>

		    <li class='step step3'>
		    	<div class='step-icon'></div>
		    	<div class='step-cont'>
		          <h4>Step 3</h4>
		          <p>
		          Free POS Specialist Assistance
		          </p>
		        </div>
		    </li>
		   
		   <li class='bottom-module'>
		   		<h3 class='tagline-title'>The #1 Way to Find the Right POS System for your Business</h3>
		          <a class='button sc large blue' href='http://www.pos.com'>Find a System Now!</a>
		 	</li>
		</ul>";

	return $string;
}
add_shortcode ('pos_system_ad', 'render_pos_ad');
add_filter('widget_text', 'do_shortcode');

?>