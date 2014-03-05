<?php

$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
<SubmitApplicationRequest xmlns="http://xml.submit.application.webconnect.odc.com/XMLSchema" xmlns:xs="http://xml.webconnect.odc.com/XMLSchema">
    <RequestHeader>
      <xs:RequestID>WC_1333378625666</xs:RequestID>
      <xs:RequestDate>2014-02-07</xs:RequestDate>
      <xs:APIUserID>172</xs:APIUserID>
    </RequestHeader>
    <ContactEmail>foo@bar.com</ContactEmail>
    <Business>
      <Name>Corner BBQ, INC.</Name>
      <DoingBusinessAs>Hanks BBQ Pit</DoingBusinessAs>
      <SelfReportedCashFlow>
        <AnnualRevenue>900000.0</AnnualRevenue>
        <AverageBankBalance>10051.12</AverageBankBalance>
        <AverageCreditCardVolume>23334.23</AverageCreditCardVolume>
      </SelfReportedCashFlow>
      <Industry>Accommodation and Food Services</Industry>
      <SubIndustry>Full-Service Restaurants</SubIndustry>
      <LoanPurpose>Business Expansion</LoanPurpose>
      <Address>
        <Address1>12 Emmet Street</Address1>
        <City>Charlottesville</City>
        <State>VA</State>
        <Zip>22904</Zip>
      </Address>
      <TaxID>555988320</TaxID>
      <Phone>2025745716</Phone>
</Business>
￼￼￼
<Owner1>
      <Name>Hank Mardukas</Name>
      <Address>
        <Address1>7965 Rugby</Address1>
        <Address2>APT 2</Address2>
        <City>Charlottesville</City>
        <State>VA</State>
        <Zip>22903</Zip>
      </Address>
      <SSN>526877726</SSN>
      <Phone>6035551383</Phone>
      <DateOfBirth>1982-04-02</DateOfBirth>
      <OwnershipPercentage>100</OwnershipPercentage>
    </Owner1>
   
   <Owner2>
      <Name>Hank Mardukas</Name>
      <Address>
        <Address1>7965 Rugby</Address1>
        <Address2>APT 2</Address2>
        <City>Charlottesville</City>
        <State>VA</State>
        <Zip>22903</Zip>
      </Address>
      <SSN>526877726</SSN>
      <Phone>6035551383</Phone>
      <DateOfBirth>1982-04-02</DateOfBirth>
      <OwnershipPercentage>100</OwnershipPercentage>
    </Owner2>
	
	
  </SubmitApplicationRequest>
';
 
 //test mode

$URL = "https://loans.ondeckcapital.com/webconnect/application/submit";


//live mode
//$URL = "https://legs.eassuranthealth.com/eai_enu/start.swe?SWEExtSource=LEGSLeadImport&SWEExtCmd=Execute&UserName=MERCURYMEDIA&Password=mM537wio";
 
 
$username = "everyloan@ondeck.com";
$password = "Ev$r8L@5n!";

$str22 = 'everyloan@ondeck.com:Ev$r8L@5n!';
//echo base64_encode($str);

// initialize curl session and get handle
 
 
			$ch = curl_init($URL);
			
// set authentication, content type and post options
curl_setopt($ch, CURLOPT_USERPWD, $str22);
			curl_setopt($ch, CURLOPT_MUTE, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml;charset=UTF-8'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			
			//var_dump($xml_data);
			print_r($output);
			
			curl_close($ch);


?>