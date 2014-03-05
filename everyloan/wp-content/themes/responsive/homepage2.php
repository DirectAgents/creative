<?php



// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Homepage2
 *
 * @file           homepage2.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/homepage2.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 





?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>


<?php

if (isset($_POST['submit2'])){
	
if($_POST['"i-want-to-borrow-money-select'] == 'Personal Loan') {header("location:http://termlifequotetoday.com/everyloan/loans/personal/");}	
if($_POST['"i-want-to-borrow-money-select'] == 'Business Loan') {header("location:http://termlifequotetoday.com/everyloan/loans/business/");}	
	echo "asdfasdf";
	
}

?>

 


<table border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="padding: 10px; float: left;"><img id="find-the-right-loan" alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/find-the-right-loan.png" /><img id="personal-loan" alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/personal-loan.png" width="100%" />

<img id="home-refinance" alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/home-refinance.png" width="100%" />

<img id="student-loan" alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/student-loan.png" width="100%" />

<img id="vacation" alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/vacation.png" width="100%" />

<img class="find-the-right-loan-mobile" alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/find-the-right-loan-mobile.png" /></td>
<td style="padding: 10px; float: left;">
<div class="widget-wrapper-homepage-desktop">

<form action="http://wwww.google.com" method="post">

<div class="widget-title-rates-homepage">I want to borrow money</div>
<ul id="i-want-to-borrow-money">
	<li><label>Why do you want to borrow money?</label></li>
	<li>
<div class="styled-select"><select id="i-want-to-borrow-money-select">
<option>Select loan type</option><option value="Home Loan">Home Loan</option><option value="Business Loan">Business Loan</option><option value="Personal Loan">Personal Loan</option></select></div></li>
	<li><label>What is your credit quality like?</label></li>
	<li>
<div class="styled-select"><select><option>Select credit quality</option><option>Excellent (720+)</option><option>Good (660-720)</option><option>Fair (600-660)</option><option>Some Problem (below 600)</option></select></div></li>
</ul>
<div class="start-here-btn">

<input type="image" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/start-here-btn.gif" name="submit2" />

<!--<a href="#"><img alt="Start Here" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/start-here-btn.gif" /></a>-->


</div>
</form>

</div>


<!-- end of .widget-wrapper --></td>
</tr>
<tr>
<td style="padding: 0px;" colspan="3">
<div class="learn-box-home-desktop">
<div class="learn-title-top">Learn</div>
<div class="lightbulb-box-home">Keep up with industry news, latest rates and much more.</div>
<div class="read-news"><a href="http://termlifequotetoday.com/everyloan/news/"><img alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/read-news.jpg" width="119" /></a></div>
<div class="news-stories-title-home-title">News Stories</div>
<ul>
	<li class="arrow"><a href="#">Mortgage Rates Going Lower in 2013?</a></li>
	<li class="arrow"><a href="#">President to Fix Housing Market 2013</a></li>
	<li class="arrow"><a href="#">Home Owner Tax Credits and Deductions</a></li>
	<li class="arrow"><a href="#">Lowest Mortgage Rates Feb 2013</a></li>
</ul>
<div class="view-all"><a href="#">View All News</a></div>
</div>
<div class="widget-wrapper-homepage-mobile">
<div class="widget-title-rates-homepage">I want to borrow money</div>
<ul id="i-want-to-borrow-money">
	<li><label>Why do you want to borrow money?</label></li>
	<li>
<div class="styled-select"><select id="i-want-to-borrow-money-select"><option>Select loan type</option><option value="Home Loan">Home Loan</option><option value="Business Loan">Business Loan</option><option value="Personal Loan">Personal Loan</option></select></div></li>
	<li><label>What is your credit quality like?</label></li>
	<li>
<div class="styled-select"><select><option>Select credit quality</option><option>Excellent (720+)</option><option>Good (600-720)</option><option>Fair (600-660)</option><option>Some Problem (below 600)</option></select></div></li>
</ul>
<div class="start-here-btn">


<!--<a href="#"><img alt="Start Here" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/start-here-btn.gif" /></a>-->


</div>
</div>
<div class="learn-box-home-mobile">
<div class="learn-title-top-mobile">Learn</div>
<div class="left-column">
<div class="lightbulb-box-home-mobile">Keep up with industry news, latest rates and much more.</div>
<div class="read-news-mobile"><a href="http://termlifequotetoday.com/everyloan/news/"><img alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/read-news.jpg" /></a></div>
</div>
<div class="right-column">
<ul>
	<li class="arrow-mobile2"><a href="#">Mortgage Rates Going Lower in 2013?</a></li>
	<li class="arrow-mobile2"><a href="#">President to Fix Housing Market 2013</a></li>
	<li class="arrow-mobile2"><a href="#">Home Owner Tax Credits and Deductions</a></li>
	<li class="arrow-mobile2"><a href="#">Lowest Mortgage Rates Feb 2013</a></li>
</ul>
<div class="view-all"><a href="#">View All News</a></div>
</div>
</div>
<div class="calculate-box-home-desktop">
<div class="calculate-title-top">Calculate</div>
<div class="calculator-box-home">Run the numbers, compare &amp; visualize your loan.</div>
<div class="read-news"><a href="#"><img alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/calculate.jpg" width="119" /></a></div>
<div class="calculators-title-home-title">More Calculators</div>
<ul>
	<li class="arrow"><a href="#">Monthly Payment Calculator</a></li>
	<li class="arrow"><a href="#">Mortgage Refinancing Calculator</a></li>
	<li class="arrow"><a href="#">Mortgage Term Comparison Calculator</a></li>
	<li class="arrow"><a href="#">Interest Only Loan Payment Calculator</a></li>
</ul>
<div class="view-all-calculators"><a href="#">View All Calculators</a></div>
</div>
<div class="calculate-box-home-mobile">
<div class="calculate-title-top-mobile">Calculate</div>
<div class="left-column">
<div class="calculator-box-home-mobile">Run the numbers, compare &amp; visualize your loan.</div>
<div class="read-news-mobile"><a href="#"><img alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/calculate.jpg" /></a></div>
</div>
<div class="right-column">
<ul>
	<li class="arrow-mobile"><a href="#">Monthly Payment Calculator</a></li>
	<li class="arrow-mobile"><a href="#">Mortgage Refinancing Calculator</a></li>
	<li class="arrow-mobile"><a href="#">Mortgage Term Comparison Calculator</a></li>
	<li class="arrow-mobile"><a href="#">Interest Only Loan Payment Calculator</a></li>
</ul>
<div class="view-all"><a href="#">View All News</a></div>
</div>
</div>
<div class="borrow-box-home-desktop">
<div class="borrow-title-top">Borrow</div>
<div class="borrow-box-home-icon">View an overview of all loans and find helpful resources to get started.</div>
<div class="read-news"><a href="#"><img alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/view-loans.jpg" width="119" /></a></div>
<div class="calculators-title-home-title">More Borrowers</div>
<ul>
	<li class="arrow"><a href="#">The Loan Process</a></li>
	<li class="arrow"><a href="#">Refinance</a></li>
	<li class="arrow"><a href="#">Home Purchase</a></li>
	<li class="arrow"><a href="#">Home Equity</a></li>
</ul>
<div class="view-all-calculators"><a href="#">View More Resources</a></div>
</div>
<div class="calculate-box-home-mobile">
<div class="calculate-title-top-mobile">Borrow</div>
<div class="left-column">
<div class="borrow-box-home-icon-mobile">View an overview of all loans and find helpful resources to get started.</div>
<div class="read-news-mobile"><a href="#"><img alt="" src="http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/core/images/view-loans.jpg" /></a></div>
</div>
<div class="right-column">
<ul>
	<li class="arrow-mobile"><a href="#">The Loan Process</a></li>
	<li class="arrow-mobile"><a href="#">Refinance</a></li>
	<li class="arrow-mobile"><a href="#">Home Purchase</a></li>
	<li class="arrow-mobile"><a href="#">Home Equity</a></li>
</ul>
<div class="view-all"><a href="#">View More Resources</a></div>
</div>
</div></td>
</tr>
</tbody>
</table>



</body>
</html>
