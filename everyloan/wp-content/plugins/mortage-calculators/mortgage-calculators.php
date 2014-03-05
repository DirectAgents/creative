<?php
/*
Plugin Name: Mortage Calculators
Plugin URI: http://www.powerfuldevelopment.com
Description: Mortage Calcultators with Short Codes
Version: 1.0
Author: Biraj Pandey
Author URI: http://www.powerfuldevelopment.com/
*/

define('MORTGAGECAL_FDIR', plugin_dir_path(__FILE__));
define('MORTGAGECAL_WDIR', plugin_dir_url(__FILE__));

register_activation_hook( __FILE__, 'mortgage_calc_activate');
register_deactivation_hook( __FILE__, 'mortgage_calc_deactivate');

add_action('admin_menu', 'mortgage_calc_admin_menu');

include 'mortgage-calculator-functions.php';
include 'mortgage-calculator-widgets.php';

function mortgage_calc_activate() {
    $data = array();
    if(!get_option('mortgage_calc_options')){
        add_option('mortgage_calc_options' , $data);
    } else {
        update_option('mortgage_calc_options' , $data);
    }
}

function mortgage_calc_deactivate() {
    delete_option('mortgage_calc_options');
}

function mortgage_calc_admin_menu() {
    add_options_page(
        'Mortgage Calculators',
        'Mortgage Calculators',
        manage_options,
        basename(__FILE__),
        'mortgage_calc_admin_display'
    );
}

function mortgage_calc_admin_display() {
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>Mortgage Calculators Usages</h2>
        <ul style="list-style:decimal;list-style-position:inside;">
            <li>
                <strong>For Monthly Payment Calculator</strong><br/>
                <em>[mortgagecal type='monthlypayment'] on page/post or show_mortgage_monthlypayment_calc() directly on source file(i.e. PHP Files).</em>
            </li>
            <li>
                <strong>For Mortage Refinancing Calculator</strong><br/>
                <em>[mortgagecal type='refinancing'] on page/post or show_mortgage_refinancing_calc() directly on source file(i.e. PHP Files).</em>
            </li>
            <li>
                <strong>For Mortage Term Comparison Calculator</strong><br/>
                <em>[mortgagecal type='termcomparison'] on page/post or show_mortgage_termcomparison_calc() directly on source file(i.e. PHP Files).</em>
            </li>
            <li>
                <strong>For Interest Only Loan Payment Calculator</strong><br/>
                <em>[mortgagecal type='interestonly'] on page/post or show_mortgage_interestonly_calc() directly on source file(i.e. PHP Files).</em>
            </li>
        </ul>
    </div>
<?php
}
