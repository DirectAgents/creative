<?php

ob_start();
session_start();
//if (isset($_POST["form_submitted"])) {


$link = mysql_connect('74.3.216.19', 'offsource', '0fF$0uRc3');
if (!$link) {
   die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db("discoverdirectbuy")) {
   echo "Unable to select mydbname: " . mysql_error();
   exit;
}


$result = mysql_query("SELECT * FROM  ZIPCodes WHERE ZipCode = '".$_POST['fm_zip']."'");
$row = mysql_fetch_assoc($result);

//echo $row['City'];
//echo '<br>';
//echo $row['State'];

$loanapplicationid = sprintf('%08d', mt_rand(0,99999999));


$fm_loanamount = str_replace('$', '', $_POST['fm_loanamount']);
$fm_currentsalary = str_replace('$', '', $_POST['fm_currentsalary']);




$url2 = "https://sandbox.lendingclub.com/loanlead/submitQF";
$password = "UN4wsgDs1";
$username = "prt_Every_Ln_rpt@lendingclub.com";
$product = "xxx";
 
$request = 
'<?xml version="1.0" encoding="utf-8"?>

		<LCXML>
  <Version>1.1</Version>
  <LoanApplicationID>'.$loanapplicationid.'</LoanApplicationID>
  <InitiatedBy>Everyloan</InitiatedBy>
  <EChannelUID>490526</EChannelUID>
  <Param2>ALSKJAASKJ12314</Param2>
  <TransactionType>
    <Personal>
      <LoanAmount>'.$fm_loanamount.'</LoanAmount>
      <Term>3 Years</Term>
      <LoanLineOfCredit>Personal Loan</LoanLineOfCredit>
      <LoanPurpose>'.$_POST['fm_typeofloan'].'</LoanPurpose>
      <Collateral>No</Collateral>
    </Personal>
  </TransactionType>
  
  <Borrower>
    <IsPrimaryBorrower>Yes</IsPrimaryBorrower>
    <BorrowerPersonalInformation>
      <Name>
        <FirstName>'.$_POST['fm_firstname'].'</FirstName>
        <LastName>'.$_POST['fm_lastname'].'</LastName>
        <MothersMaidenName>Baker</MothersMaidenName>
      </Name>
      <DateOfBirth>'.$_POST['fm_month'].'/'.$_POST['fm_day'].'/'.$_POST['fm_year'].'</DateOfBirth>
      <SSN>'.$_POST['fm_ssn'].'</SSN>
      <Relationship></Relationship>
    </BorrowerPersonalInformation>
   
    <ContactInformation>
      <Email>'.$_POST['fm_email'].'</Email>
    </ContactInformation>
   
    <BorrowerResidence ResidenceIndicator="Current">
      <BorrowerResidenceInformation>
        <Address>
          <Street>'.$_POST['fm_address'].'</Street>
          <City>'.$row['City'].'</City>
          <State>'.$row['State'].'</State>
          <PostalCode>'.$_POST['fm_zip'].'</PostalCode>
        </Address>
      </BorrowerResidenceInformation>
      <ResidenceType>Own</ResidenceType>
    </BorrowerResidence>
   
    <BorrowerEmployment>
      <SalaryFrequency>Monthly</SalaryFrequency>
      <CurrentSalary>'.$fm_currentsalary.'</CurrentSalary>
    </BorrowerEmployment>
  
  </Borrower>
</LCXML>
	';
 
 
echo "<pre>";
//echo htmlentities ( $request );
echo "</pre>";
 
$response = post_url ( $url2, $request, $username, $password );
 
print_r ( $response );
 
function post_url($url2, $data, $username = null, $password = null, $soap_action = 'https://sandbox.lendingclub.com/loanlead/submitQF', $timeout = 200) {
	$ch = curl_init (); //initiate the curl session
	curl_setopt ( $ch, CURLOPT_URL, $url2 ); //set to url to post to
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 ); // return data in a variable
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	curl_setopt ( $ch, CURLOPT_POST, 1 );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data ); // post the xml
	curl_setopt ( $ch, CURLOPT_TIMEOUT, ( int ) $timeout ); // set timeout in seconds
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
	//$header = array ("Content-Type: text/plain" );
	$header = array ("Content-Type: application/xml" );
	$header [] = "Content-Length: ".strlen($data);
	
	if (! is_null ( $soap_action ))
		$header [] = 'SOAPAction: "' . $soap_action . '"';
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
	
	$xmlResponse = curl_exec ( $ch );
	curl_close ( $ch );
	
	//return $xmlResponse;

	
	

function get_string($string, $start, $end){
 $string = " ".$string;
 $pos = strpos($string,$start);
 if ($pos == 0) return "";
 $pos += strlen($start);
 $len = strpos($string,$end,$pos) - $pos;
 return substr($string,$pos,$len);
}

$fullstring = $xmlResponse;
$parsed = get_string($fullstring, "<RejectReason>", "</RejectReason>");

//echo $parsed; 

 if($parsed == '') { 
	   
	   $_SESSION['loan'] = "accepted";
	   $_SESSION['name'] = $_POST['fm_firstname'];
	   //echo "accepted";
	   //echo $_SESSION['loan'];
	   
	   header('Location: confirm.php');
	   
	   }
	   
	   if($parsed != '') { 
		   
	   $_SESSION['loan'] = "denied"; 
	   $_SESSION['name'] = $_POST['fm_firstname'];
	   //echo "denied";
	   //echo $_SESSION['loan'];
	   header('Location: confirm.php');  
		   
	   }

	
	
}



	$birthdate = $_POST['fm_month'].'/'.$_POST['fm_day'].'/'.$_POST['fm_year'];


	$the_date = date('Y-m-d'); 
	date_default_timezone_set('America/New_York');
    $the_time = date('h:i:s A', time()+21600);

    

       $insert_sql = mysql_query("INSERT INTO everyloan (id, Firstname, Lastname, Birthdate, SSN, Email, Address, City, State, Zip, CurrentSalary, TypeOfLoan, Date, Time) values 
	   ('', '". $_POST['fm_firstname'] ."', '". $_POST['fm_lastname'] ."', '". $birthdate ."', '". $_POST['fm_ssn'] ."', '". $_POST['fm_email'] ."'  , 
	   '". $_POST['fm_address'] ."', '". $row['City'] ."' ,  '". $ip_address ."', '". $_SESSION["refdir2"] ."', '".$leadid."', '".$parsed."' ,'". $the_date ."', '". $the_time ."')");
       mysql_query($insert_sql);
	   
	  

//}


?>