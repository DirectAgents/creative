<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */


session_start();
require_once '../../../../base_path.php';
require_once '../../../../class.participant.php';
require_once '../../../../class.startup.php';
require_once '../../../../config.php';
require_once '../../../../config.inc.php';

$participant_home = new PARTICIPANT();
if($participant_home->is_logged_in())
{
  $participant_home->logout();
}
$startup_home = new startup();
if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login');
}



if(!isset($_GET['id'])){header("Location:../../../../404.php");}
$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$sqlnda = mysqli_query($connecDB,"SELECT * FROM tbl_nda WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."' ");
$rowsqlnda = mysqli_fetch_array($sqlnda);


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."' ");
$rowproject = mysqli_fetch_array($Project);



// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($rowsqlnda['startup_name']);
$pdf->SetTitle($rowproject['Name'].'-NDA');
$pdf->SetSubject($rowproject['Name'].'-NDA');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<h1>Non-Disclosure Agreement</h1>
<strong>'.$rowsqlnda['startup_name'].'</strong> and <strong>'.$rowsqlnda['participant_name'].'</strong> are the parties to this agreement. They expect to disclose confidential information to each other for the purpose of evaluating and validating the idea or product of the disclosure party.</p>

<p>The parties are only allowed to use the confidential information for the above purpose.</p>

<p>Confidential information is information that either party has developed or obtained and has taken reasonable steps to protect from disclosure. Confidential information is NOT information that</p>


<ol>
	<li>the recipient of the confidential information already knew through proper means;</li>
	<li>is publicly available through no fault of the recipient;</li>
	<li>the recipient rightfully received or will receive from a third party with no confidentiality duty; or</li>
	<li>the recipient develops independently.</li>
</ol>

<p>Both parties must use a reasonable degree of care to protect any confidential information they receive from each other. They must protect this information from unauthorized use or disclosure. They are not allowed to share this information with anyone except their employees, agents, directors or third party contractors who need to know it for the purposes of this agreement and who have agreed in writing to keep the information confidential.</p>

<p>If compelled by law or court order, either party may disclose the confidential information if it provides reasonable prior notice to the other, unless a court forbids such notice.
</p>
<p>This agreement applies to information disclosed within 1 year of its signing. Each party must continue to protect the confidentiality of information disclosed during this time frame for an additional 1 year after its disclosure. This agreement does not limit the duration of an obligation to protect a trade secret.</p>
<p>
The parties are under no obligation to do business together. Neither party becomes a customer, contractor, partner or agent of the other because of this agreement. Neither party acquires any intellectual property right or license under this agreement.
</p>
<p>
This agreement is between the two parties named above. Neither party may delegate, transfer or assign this agreement to a third party without the written consent of the other.
</p>

<p>Failure to enforce any provision within this agreement does not waive that provision.
</p>

<p>This is the parties\'s entire agreement on this matter, superseding all previous negotiations or agreements. It can only be changed by mutual written consent.

</p>

<p>The laws of the state of "NY" govern this agreement and any disputes arising from it will be handled exclusively in courts in that state. The prevailing party in any dispute will be entitled to recover reasonable costs and attorneys\' fees.</p>

<p>Signing a copy of this agreement, physical or electronic, will have the same effect as signing an original.</p>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');







// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page
$pdf->AddPage();

// create some HTML content
$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';

$html = '
<table border="0" cellspacing="3" cellpadding="4">
	
	


	<tr>
	  <td style="text-align:left;"><strong>Disclosing Party</strong></td>
	  <td rowspan="4" colspan="2"></td>
	  <td style="text-align:left;"><strong>Receiving Party</strong></td>
  </tr>
	<tr>
	  <td style="text-align:left;">Signature:</td>
	  <td style="text-align:left;">Signature:</td>
  </tr>
	<tr>
		<td style="text-align:left;"><img src="../signatures/'.$rowsqlnda['startup_signature'].'" border="0" height="100" width="250" align="top" /></td>
		<td style="text-align:left;"><img src="../signatures/'.$rowsqlnda['participant_signature'].'" border="0" height="41" width="41" align="top" /></td>
	</tr>
	<tr>
		<td>Name: '.$rowsqlnda['startup_sig_name'].'</td>
		<td>Name: '.$rowsqlnda['participant_sig_name'].'</td>
	</tr>
	<tr>
		<td>Title: '.$rowsqlnda['startup_sig_title'].'</td>
		<td></td>
		<td></td>
		<td>Date: '.$rowsqlnda['participant_sig_date'].'</td>
	</tr>
	<tr>
		<td>Company: '.$rowsqlnda['startup_sig_company'].'</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>Date: '.$rowsqlnda['startup_sig_date'].'</td>
		<td></td>
		<td></td>
		<td>&nbsp;</td>
	</tr>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');









// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(''.$rowproject['Name'].'-NDA.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
