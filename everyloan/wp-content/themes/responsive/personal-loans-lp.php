<?php


if (isset($_POST["form_submitted"])) {


$loanapplicationid = sprintf('%08d', mt_rand(0,99999999));



$url2 = "https://stage.lendingclub.com/loanlead/submitQF";
$password = "BGHCAKMj1";
$username = "prt_EveryLoan_rpt@lendingclub.com";
$product = "xxx";
 
$request = 
'<?xml version="1.0" encoding="utf-8"?>

		<LCXML>
  <Version>1.1</Version>
  <LoanApplicationID>'.$loanapplicationid.'</LoanApplicationID>
  <InitiatedBy>Everyloan</InitiatedBy>
  <EChannelUID>490217</EChannelUID>
  <Param2>ALSKJAASKJ12314</Param2>
  <TransactionType>
    <Personal>
      <LoanAmount>30000</LoanAmount>
      <Term>3 Years</Term>
      <LoanLineOfCredit>Personal Loan</LoanLineOfCredit>
      <LoanPurpose>Debt Consolidation</LoanPurpose>
      <Collateral>No</Collateral>
    </Personal>
  </TransactionType>
  
  <Borrower>
    <IsPrimaryBorrower>Yes</IsPrimaryBorrower>
    <BorrowerPersonalInformation>
      <Name>
        <FirstName>John</FirstName>
        <MiddleName>D</MiddleName>
        <LastName>Spiegel</LastName>
        <MothersMaidenName>Baker</MothersMaidenName>
      </Name>
      <DateOfBirth>4/30/1970</DateOfBirth>
      <SSN>'.$_POST["fm_ssn"].'</SSN>
      <Relationship></Relationship>
    </BorrowerPersonalInformation>
   
    <ContactInformation>
      <Email>'.$_POST["fm_email"].'</Email>
      <WorkPhone>408-555-3456</WorkPhone>
      <HomePhone>408-555-1234</HomePhone>
    </ContactInformation>
   
    <BorrowerResidence ResidenceIndicator="Current">
      <BorrowerResidenceInformation>
        <Address>
          <Street>123 MAIN ST</Street>
          <City>SUNNYVALE</City>
          <State>CA</State>
          <PostalCode>94085</PostalCode>
        </Address>
      </BorrowerResidenceInformation>
      <ResidenceType>Own</ResidenceType>
    </BorrowerResidence>
   
    <BorrowerEmployment>
      <PositionTitle>VP Finance</PositionTitle>
      <EmployerName>ACME COMPANY</EmployerName>
      <TimeAtJob>6</TimeAtJob>
      <UnitTimeAtJob>Years</UnitTimeAtJob>
      <SalaryFrequency>Monthly</SalaryFrequency>
      <CurrentSalary>8000</CurrentSalary>
    </BorrowerEmployment>
  
    <SelfEmployed>No</SelfEmployed>
    <SelfEmployedIncome></SelfEmployedIncome>
    <BorrowerOtherIncome>
      <OtherIncomeAmount>0</OtherIncomeAmount>
      <OtherIncomeFrequency>Monthly</OtherIncomeFrequency>
    </BorrowerOtherIncome>
  </Borrower>
</LCXML>
	';
 
 
echo "<pre>";
echo htmlentities ( $request );
echo "</pre>";
 
$response = post_url ( $url2, $request, $username, $password );
 
print_r ( $response );
 
function post_url($url2, $data, $username = null, $password = null, $soap_action = 'https://stage.lendingclub.com/loanlead/submitQF', $timeout = 200) {
	$ch = curl_init (); //initiate the curl session
	curl_setopt ( $ch, CURLOPT_URL, $url ); //set to url to post to
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 ); // return data in a variable
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	curl_setopt ( $ch, CURLOPT_POST, 1 );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data ); // post the xml
	curl_setopt ( $ch, CURLOPT_TIMEOUT, ( int ) $timeout ); // set timeout in seconds
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
	$header = array ("Content-Type: text/plain" );
	$header [] = "Content-Length: ".strlen($data);
	
	if (! is_null ( $soap_action ))
		$header [] = 'SOAPAction: "' . $soap_action . '"';
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
	
	$xmlResponse = curl_exec ( $ch );
	curl_close ( $ch );
	
	return $xmlResponse;
}


}









// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Personal Loans Landingpage
 *
 * @file           personal-loans-lp.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/personal-loans-lp.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 
?>

<div id="content-personal-loans-landingpage" class="grid col-640">
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
        <?php get_template_part( 'loop-header' ); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>

                <?php get_template_part( 'post-meta-page' ); ?>
                
                <div class="post-entry">
                    <?php the_content(__('Read more &#8250;', 'responsive')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
            
				<?php get_template_part( 'post-data' ); ?>
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
            
			<?php //responsive_comments_before(); ?>
			<?php //comments_template( '', true ); ?>
			<?php //responsive_comments_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content -->

<?php get_sidebar('landingpage'); ?>
<?php get_footer(); ?>
