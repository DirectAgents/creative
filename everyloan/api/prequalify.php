<?php

$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
<PreQualificationRequest xmlns="http://xml.webconnect.odc.com/XMLSchema/v2"
    xmlns:xs="http://xml.webconnect.odc.com/XMLSchema">
      <RequestHeader>
        <xs:RequestID>test_1313526030222</xs:RequestID>
        <xs:RequestDate>2014-02-07</xs:RequestDate>
        <xs:APIUserID>172</xs:APIUserID>
      </RequestHeader>
      <Business>
        <Name>Corner BBQ</Name>
        <SelfReportedCashFlow>
          <AnnualRevenue>1500000</AnnualRevenue>
          <AverageBankBalance>10000</AverageBankBalance>
          <AverageCreditCardVolume>23400.12</AverageCreditCardVolume>
        </SelfReportedCashFlow>
        <Address>
          <Address1>74 Rugby Rd</Address1>
          <City>Charlottesville</City>
          <State>VA</State>
          <Zip>22903</Zip>
        </Address>
        <TaxID>555988320</TaxID>
        <Phone>4345555555</Phone>
        <BusinessInceptionDate>1997-01-30</BusinessInceptionDate>
        <NAICS>7221</NAICS>
        <Contactable>false</Contactable>
      </Business>
      <Owner>
        <Email>foo@bar.com</Email>
        <Name>hank mardukas</Name>
        <HomeAddress>
          <Address1>47 Cabel Ave</Address1>
          <Address2>APT 2</Address2>
          <City>Charlottesville</City>
          <State>VA</State>
          <Zip>22904</Zip>
        </HomeAddress>
        <SSN>555123123</SSN>
        <HomePhone>4345551234</HomePhone>
        <DateOfBirth>1979-05-13</DateOfBirth>
      </Owner>
      <OwnerTwo>
        <Email>foo@bar.com</Email>
        <Name>hank mardukas</Name>
        <HomeAddress>
          <Address1>47 Cabel Ave</Address1>
          <Address2>APT 2</Address2>
<City>Charlottesville</City>
      <State>VA</State>
      <Zip>22904</Zip>
    </HomeAddress>
    <SSN>555123123</SSN>
    <HomePhone>4345551234</HomePhone>
    <DateOfBirth>1979-05-13</DateOfBirth>
  </OwnerTwo>
</PreQualificationRequest>
';
 
 //test mode

$URL = "https://loans.ondeckcapital.com/webconnect/user/prequalifyTest";


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