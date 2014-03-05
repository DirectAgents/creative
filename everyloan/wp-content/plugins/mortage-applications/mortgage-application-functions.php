<?php

add_shortcode('mortgageapp', 'show_mortgage_apps_shortcode');

function show_mortgage_apps_shortcode($atts=array()) {
    extract(shortcode_atts(array(
        'type' => 'default',
        'protocol' => '',
        'mailto' => ''
    ), $atts));

    if($protocol!='http' && $protocol!='https') $protocol = get_mortgage_app_default_protocol($type);
    if($protocol=="https")   switchToHTTPs();
    else    switchToHTTP();
    if(!$mailto || $mailto=='') $mailto = get_mortgage_app_default_mailto($type);

    $contents = '';
    $type = str_ireplace(array(" ", "-", "_"), "", $type);
    if($type=="" || !function_exists("show_mortgage_" . $type . "_app"))    $type = "default";
    $func = "show_mortgage_" . $type . "_app";
    if(sizeof($_POST)>2) {
        require_once("frontend/responses/app." . $type . ".php");
        return '';
    } else {
        $contents = $func();
        return $contents;
    }
}

function show_mortgage_default_app() {
    return load_mortgage_app_file("default");
}

function show_mortgage_commercialloan_app() {
    return load_mortgage_app_file("commercialloan");
}

function show_mortgage_loanmodification_app() {
    return load_mortgage_app_file("loanmodification");
}

function show_mortgage_loanstatus_app() {
    return load_mortgage_app_file("loanstatus");
}

function show_mortgage_onlineapplication_app() {
    return load_mortgage_app_file("onlineapplication");
}

function show_mortgage_quickapplication_app() {
    return load_mortgage_app_file("quickapplication");
}

function show_mortgage_reverseapplication_app() {
    return load_mortgage_app_file("reverseapplication");
}

function show_mortgage_stepapplication_app() {
    return load_mortgage_app_file("stepapplication");
}

function load_mortgage_app_file($file='') {
    if(!$file || $file==null || $file=='')  $file = "default";

    $applicationPath = MORTGAGEAPPS_FDIR . "frontend/applications/";
    if(!file_exists($applicationPath . "app.{$file}.php"))    $file = "default";
    $filePath = $applicationPath . "app.{$file}.php";

    $contents = "";
    ob_start();
    include_once($filePath);
    $contents = ob_get_contents();
    ob_end_clean();

    return $contents;
}

function get_mortgage_app_default_protocol($type='') {
    if(!$type || !is_string($type) || $type=='')    return "http";
    $settings = get_option("mortgage_apps_options");
    if(isset($settings[$type])) return $settings[$type]["protocol"];
    return "http";
}

function get_mortgage_app_default_mailto($type='') {
    if(!$type || !is_string($type) || $type=='')    return get_bloginfo("admin_email");
    //$type = str_ireplace(array(" ", "-", "_"), "", $type);
    $settings = get_option("mortgage_apps_options");
    if(isset($settings[$type])) return $settings[$type]["mailto"];
    return get_bloginfo("admin_email");
}

function mortgage_admin_enqueue_scripts() {
    wp_enqueue_style('thickbox');
    wp_enqueue_style('dirlistings-ui-styles', MORTGAGEAPPS_WDIR . 'backend/backend.css');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
}
add_action('admin_enqueue_scripts', 'mortgage_admin_enqueue_scripts');

function mortgage_apps_init() {
    wp_enqueue_style('mortgage_apps_css', MORTGAGEAPPS_WDIR . 'frontend/mortgage.application.style.css');
    wp_enqueue_script('mortgage_apps_js', MORTGAGEAPPS_WDIR . 'frontend/mortgage.application.script.js');
}
add_action('init', 'mortgage_apps_init');

function mortgage_apps_admin_init() {
    $page = $_GET["page"];
    $func = $page . "_admin_init";
    if($page!='' && function_exists($func)) {
        $func();
    }
}
add_action('admin_init', 'mortgage_apps_admin_init');

function dirlistings_admin_pagination_format($total, $page=1, $perpage=10, $link='%s') {
    $count = 0;
    $page = intval($page);
    if($page<1) $page = 1;
    $perpage = intval($perpage);
    if($perpage<1) $perpage = 10;
    $total = intval($total);
    $total_pages = intval($total / $perpage);
    if(($total_pages * $perpage)<$total)    $total_pages++;

    $pagination = "";

    $beforeStart = $page - 5;
    if($beforeStart<1)  $beforeStart = 1;
    $beforeEnd = $page - 1;
    if($beforeEnd<1)  $beforeEnd = 1;
    for($i=$beforeStart; $i<=$beforeEnd; $i++) {
        if($i<$page) {
            $label = $i;
            if($i==($page-1))   $label = "Prev";
            if($i==1)    $label = "First";
            if($i==1)    $pagination .= "<a href=\"" . str_ireplace("&paged=%s", '', $link) . "\" title=\"Go to Page {$i}\">{$label}</a>";
            else    $pagination .= sprintf("<a href=\"{$link}\" title=\"Go to Page {$i}\">{$label}</a>", '' . $i);
        }
    }

    if($total_pages>0) {
        if($page==1)    $pagination .= "<a href=\"" . str_ireplace("&paged=%s", '', $link) . "\" class=\"current-page\" title=\"Current Page\">{$page}</a>";
        else    $pagination .= sprintf("<a href=\"{$link}\" class=\"current-page\" title=\"Current Page\">{$page}</a>", '' . $page);
    }

    $afterStart = $page + 1;
    if($afterStart>$total_pages)  $afterStart = $total_pages;
    $afterEnd = $afterStart + 4;
    if($afterEnd>$total_pages)  $afterEnd = $total_pages;
    if($total_pages>0) {
        $total_listing_pages = 1;
        $total_listing_pages += $beforeEnd - $beforeStart;
        $total_listing_pages++;
        $total_listing_pages += $afterEnd - $afterStart;
        $total_listing_pages++;
        if($total_listing_pages<10) {
            $diff = 10 - $total_listing_pages;
            $afterEnd += $diff;
            if($afterEnd>$total_pages)  $afterEnd = $total_pages;
        }
    }
    for($i=$afterStart; $i<=$afterEnd; $i++) {
        if($i>$page) {
            $label = $i;
            if($i==($page+1))   $label = "Next";
            if($i==$total_pages)    $label = "Last";
            $pagination .= sprintf("<a href=\"{$link}\" title=\"Go to Page {$i}\">{$label}</a>", '' . $i);
        }
    }

    if($pagination!='') $pagination = "<em>Pages:</em>&nbsp;&nbsp;" . $pagination;
    return $pagination;
}

?>
