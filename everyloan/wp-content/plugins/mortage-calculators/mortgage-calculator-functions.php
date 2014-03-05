<?php

//  Calculator Display Counts
$calc_monthlypayment_count = 0;
$calc_refinancing_count = 0;
$calc_termcomparison_count = 0;
$calc_interestonly_count = 0;
$calc_monthlypayment_inwidget = array();
$calc_refinancing_inwidget = array();
$calc_termcomparison_inwidget = array();
$calc_interestonly_inwidget = array();

add_shortcode('mortgagecal', 'show_mortgage_calc_shortcode');

function show_mortgage_calc_shortcode($atts=array()) {
    extract(shortcode_atts(array(
        'type' => 'default'
    ), $atts));

    $contents = '';
    if($type=="" || !function_exists("show_mortgage_" . $type . "_calc"))    $type = "default";
    $func = "show_mortgage_" . $type . "_calc";
    $contents = $func();
    return $contents;
}

function show_mortgage_default_calc() {
    return load_mortgage_calc_file("default");
}

function show_mortgage_monthlypayment_calc($inwidget=false) {
    global $calc_monthlypayment_count, $calc_monthlypayment_inwidget;
    $calc_monthlypayment_count++;
    $calc_monthlypayment_inwidget[$calc_monthlypayment_count] = $inwidget;
    return load_mortgage_calc_file("monthlypayment");
}

function show_mortgage_refinancing_calc($inwidget=false) {
    global $calc_refinancing_count, $calc_refinancing_inwidget;
    $calc_refinancing_count++;
    $calc_refinancing_inwidget[$calc_refinancing_count] = $inwidget;
    return load_mortgage_calc_file("refinancing");
}

function show_mortgage_termcomparison_calc($inwidget=false) {
    global $calc_termcomparison_count, $calc_termcomparison_inwidget;
    $calc_termcomparison_count++;
    $calc_termcomparison_inwidget[$calc_termcomparison_count] = $inwidget;
    return load_mortgage_calc_file("termcomparison");
}

function show_mortgage_interestonly_calc($inwidget=false) {
    global $calc_interestonly_count, $calc_interestonly_inwidget;
    $calc_interestonly_count++;
    $calc_interestonly_inwidget[$calc_interestonly_count] = $inwidget;
    return load_mortgage_calc_file("interestonly");
}

function load_mortgage_calc_file($file='') {
    if(!$file || $file==null || $file=='')  $file = "default";

    $calculatorPath = MORTGAGECAL_FDIR . "frontend/calculators/";
    if(!file_exists($calculatorPath . "calc.{$file}.php"))    $file = "default";
    $filePath = $calculatorPath . "calc.{$file}.php";

    $contents = "";
    ob_start();
    include_once($filePath);
    $contents = ob_get_contents();
    ob_end_clean();

    return $contents;
}

add_action('init', 'mortgage_calc_init');

function mortgage_calc_init() {
    wp_enqueue_style('mortgage_calc_css', MORTGAGECAL_WDIR . 'frontend/mortgage.calculator.style.css');
    wp_enqueue_script('mortgage_calc_js', MORTGAGECAL_WDIR . 'frontend/mortgage.calculator.script.js');
}

function mortage_calc_inwidget($type='', $count=0) {
    $count = intval($count);
    if($type=='' || $count<0)   return false;
    $array = array();
    switch(strtolower($type)) {
        case 'monthlypayment':
            global $calc_monthlypayment_inwidget;
            $array = $calc_monthlypayment_inwidget;
            break;
        case 'refinancing':
            global $calc_refinancing_inwidget;
            $array = $calc_refinancing_inwidget;
            break;
        case 'termcomparison':
            global $calc_termcomparison_inwidget;
            $array = $calc_termcomparison_inwidget;
            break;
        case 'interestonly':
            global $calc_interestonly_inwidget;
            $array = $calc_interestonly_inwidget;
            break;
        default:
            break;
    }
    if(sizeof($array)>0) {
        if(isset($array[$count]))   return (bool)$array[$count];
    }
    return false;
}

?>
