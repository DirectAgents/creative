<?php
/*
Plugin Name: Mortage Applications
Plugin URI: http://www.powerfuldevelopment.com
Description: Mortage Applications with Short Codes and Direct Embed
Version: 1.0
Author: Biraj Pandey
Author URI: http://www.powerfuldevelopment.com/
*/

define('MORTGAGEAPPS_FDIR', plugin_dir_path(__FILE__));
define('MORTGAGEAPPS_WDIR', plugin_dir_url(__FILE__));
define('MORTGAGEAPPS_PER_PAGE', 25);

register_activation_hook( __FILE__, 'mortgage_apps_activate');
register_deactivation_hook( __FILE__, 'mortgage_apps_deactivate');

add_action('admin_menu', 'mortgage_apps_admin_menu');

include 'setup-tables.php';
include 'mortgage-application-functions.php';
include 'csv-export.php';
include 'backend/backend-functions.php';

function mortgage_apps_activate() {
    $data = array(
        "commercial-loan" => array(
            "protocol" => "http",
            "mailto" => get_bloginfo("admin_email")
        ),
        "loan-modification" => array(
            "protocol" => "http",
            "mailto" => get_bloginfo("admin_email")
        ),
        "loan-status" => array(
            "protocol" => "http",
            "mailto" => get_bloginfo("admin_email")
        ),
        "online-application" => array(
            "protocol" => "http",
            "mailto" => get_bloginfo("admin_email")
        ),
        "quick-application" => array(
            "protocol" => "http",
            "mailto" => get_bloginfo("admin_email")
        ),
        "reverse-application" => array(
            "protocol" => "http",
            "mailto" => get_bloginfo("admin_email")
        ),
        "step-application" => array(
            "protocol" => "http",
            "mailto" => get_bloginfo("admin_email")
        ),
    );
    if(!get_option('mortgage_apps_options')){
        add_option('mortgage_apps_options' , $data);
    } else {
        update_option('mortgage_apps_options' , $data);
    }
}

function mortgage_apps_deactivate() {
    delete_option('mortgage_apps_options');
}

function mortgage_apps_admin_menu() {
    add_menu_page("Mortgage Applications", "Mortgage Apps", "manage_options", "everyloan_mortgage_apps_options", "mortgage_apps_admin_display", MORTGAGEAPPS_WDIR . "/icon.png");
    add_submenu_page("everyloan_mortgage_apps_options", "Commercial Loan Application", "Commercial Loan", "manage_options", "mortgagestat_commercial_loan", "mortgagestat_commercial_loan_render");
    add_submenu_page("everyloan_mortgage_apps_options", "Loan Modification Application", "Loan Modification", "manage_options", "mortgagestat_loan_modification", "mortgagestat_loan_modification_render");
    add_submenu_page("everyloan_mortgage_apps_options", "Loan Status Application", "Loan Status", "manage_options", "mortgagestat_loan_status", "mortgagestat_loan_status_render");
    add_submenu_page("everyloan_mortgage_apps_options", "Online Application", "Online Application", "manage_options", "mortgagestat_online", "mortgagestat_online_render");
    add_submenu_page("everyloan_mortgage_apps_options", "Quick Online Application", "Quick Online", "manage_options", "mortgagestat_quick_online", "mortgagestat_quick_online_render");
    add_submenu_page("everyloan_mortgage_apps_options", "Reverse Application", "Reverse Application", "manage_options", "mortgagestat_reverse", "mortgagestat_reverse_render");
    add_submenu_page("everyloan_mortgage_apps_options", "5 Step Application", "5 Step Application", "manage_options", "mortgagestat_step", "mortgagestat_step_render");
}

function mortgage_apps_admin_display() {
    if(sizeof($_POST)>1 && isset($_POST["action"]) && $_POST["action"]=="update") {
        $new_settings = $_POST["settings"];
        update_option("mortgage_apps_options", $new_settings);
    }

    $settings = get_option("mortgage_apps_options");
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>Mortgage Applications Settings</h2><br/>
        <form method="post" action="<?php echo admin_url() . "admin.php?page=everyloan_mortgage_apps_options"; ?>">
            <table class="wp-list-table widefat fixed pages" cellspacing="0">
                <thead>
                    <tr>
                        <th class="manage-column" scope="col" width="30%"><b>Application Name</b></th>
                        <th class="manage-column" scope="col"><b>Default Protocol</b></th>
                        <th class="manage-column" scope="col"><b>Email Address</b></th>
                        <th class="manage-column" scope="col"><b>Shortcode</b></th>
                        <th class="manage-column" scope="col"><b>Direct Use Function</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Commercial Loan</b><div class="row-actions"></div></td>
                        <td>
                            <?php echo custom_radio("settings[commercial-loan][protocol]", "http", "HTTP", "commercial-loan-protocol-http", $settings["commercial-loan"]["protocol"]); ?>
                            &nbsp;&nbsp;
                            <?php echo custom_radio("settings[commercial-loan][protocol]", "https", "HTTPs", "commercial-loan-protocol-https", $settings["commercial-loan"]["protocol"]); ?>
                        </td>
                        <td><?php echo custom_inputtext("settings[commercial-loan][mailto]", $settings["commercial-loan"]["mailto"], "Email Address", "Mail to Email Address for Commercial Loan Application"); ?></td>
                        <td><em>[mortgageapp type='commercial-loan']</em></td>
                        <td><em>show_mortgage_commercialloan_app()</em></td>
                    </tr>
                    <tr>
                        <td><b>Loan Modification</b><div class="row-actions"></div></td>
                        <td>
                            <?php echo custom_radio("settings[loan-modification][protocol]", "http", "HTTP", "loan-modification-protocol-http", $settings["loan-modification"]["protocol"]); ?>
                            &nbsp;&nbsp;
                            <?php echo custom_radio("settings[loan-modification][protocol]", "https", "HTTPs", "loan-modification-protocol-https", $settings["loan-modification"]["protocol"]); ?>
                        </td>
                        <td><?php echo custom_inputtext("settings[loan-modification][mailto]", $settings["loan-modification"]["mailto"], "Email Address", "Mail to Email Address for Loan Modification Application"); ?></td>
                        <td><em>[mortgageapp type='loan-modification']</em></td>
                        <td><em>show_mortgage_loanmodification_app()</em></td>
                    </tr>
                    <tr>
                        <td><b>Loan Status</b><div class="row-actions"></div></td>
                        <td>
                            <?php echo custom_radio("settings[loan-status][protocol]", "http", "HTTP", "loan-status-protocol-http", $settings["loan-status"]["protocol"]); ?>
                            &nbsp;&nbsp;
                            <?php echo custom_radio("settings[loan-status][protocol]", "https", "HTTPs", "loan-status-protocol-https", $settings["loan-status"]["protocol"]); ?>
                        </td>
                        <td><?php echo custom_inputtext("settings[loan-status][mailto]", $settings["loan-status"]["mailto"], "Email Address", "Mail to Email Address for Loan Status Application"); ?></td>
                        <td><em>[mortgageapp type='loan-status']</em><br/><br/></td>
                        <td><em>show_mortgage_loanstatus_app()</em></td>
                    </tr>
                    <tr>
                        <td><b>Online Application</b><div class="row-actions"></div></td>
                        <td>
                            <?php echo custom_radio("settings[online-application][protocol]", "http", "HTTP", "online-application-protocol-http", $settings["online-application"]["protocol"]); ?>
                            &nbsp;&nbsp;
                            <?php echo custom_radio("settings[online-application][protocol]", "https", "HTTPs", "online-application-protocol-https", $settings["online-application"]["protocol"]); ?>
                        </td>
                        <td><?php echo custom_inputtext("settings[online-application][mailto]", $settings["online-application"]["mailto"], "Email Address", "Mail to Email Address for Online Application"); ?></td>
                        <td><em>[mortgageapp type='online-application']</em></td>
                        <td><em>show_mortgage_onlineapplication_app()</em></td>
                    </tr>
                    <tr>
                        <td><b>Quick Online Application</b><div class="row-actions"></div></td>
                        <td>
                            <?php echo custom_radio("settings[quick-application][protocol]", "http", "HTTP", "quick-application-protocol-http", $settings["quick-application"]["protocol"]); ?>
                            &nbsp;&nbsp;
                            <?php echo custom_radio("settings[quick-application][protocol]", "https", "HTTPs", "quick-application-protocol-https", $settings["quick-application"]["protocol"]); ?>
                        </td>
                        <td><?php echo custom_inputtext("settings[quick-application][mailto]", $settings["quick-application"]["mailto"], "Email Address", "Mail to Email Address for Quick Online Application"); ?></td>
                        <td><em>[mortgageapp type='quick-application']</em></td>
                        <td><em>show_mortgage_quickapplication_app()</em></td>
                    </tr>
                    <tr>
                        <td><b>Reverse Application</b><div class="row-actions"></div></td>
                        <td>
                            <?php echo custom_radio("settings[reverse-application][protocol]", "http", "HTTP", "reverse-application-protocol-http", $settings["reverse-application"]["protocol"]); ?>
                            &nbsp;&nbsp;
                            <?php echo custom_radio("settings[reverse-application][protocol]", "https", "HTTPs", "reverse-application-protocol-https", $settings["reverse-application"]["protocol"]); ?>
                        </td>
                        <td><?php echo custom_inputtext("settings[reverse-application][mailto]", $settings["reverse-application"]["mailto"], "Email Address", "Mail to Email Address for Reverse Application"); ?></td>
                        <td><em>[mortgageapp type='reverse-application']</em></td>
                        <td><em>show_mortgage_reverseapplication_app()</em></td>
                    </tr>
                    <tr>
                        <td><b>Step Application</b><div class="row-actions"></div></td>
                        <td>
                            <?php echo custom_radio("settings[step-application][protocol]", "http", "HTTP", "step-application-protocol-http", $settings["step-application"]["protocol"]); ?>
                            &nbsp;&nbsp;
                            <?php echo custom_radio("settings[step-application][protocol]", "https", "HTTPs", "step-application-protocol-https", $settings["step-application"]["protocol"]); ?>
                        </td>
                        <td><?php echo custom_inputtext("settings[step-application][mailto]", $settings["step-application"]["mailto"], "Email Address", "Mail to Email Address for Step Application"); ?></td>
                        <td><em>[mortgageapp type='step-application']</em></td>
                        <td><em>show_mortgage_stepapplication_app()</em></td>
                    </tr>
                </tbody>
            </table>
            <em><b>Note:</b> Seperate Multiple Email(s) using seperator character '<b> ; </b>'</em>
            <div align="right">
                    <input type="hidden" name="action" value="update" />
                    <?php wp_nonce_field(); ?>
                    <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                    </p>
            </div>
        </form>
    </div>
<?php
}

function custom_inputtext($name, $value, $placeholder=null, $title=null, $id=null) {
    $input = "<input type=\"text\" name=\"{$name}\" value=\"{$value}\"";
    if($id && $id!='') $input .= " id=\"{$id}\"";
    if($title && $title!='') $input .= " title=\"{$title}\"";
    if($placeholder && $placeholder!='') $input .= " placeholder=\"{$placeholder}\"";
    $input .= " />";
    return $input;
}

function custom_radio($name, $value='', $label='', $id=null, $selected_value='') {
    $checkbox = "<input type=\"radio\" name=\"{$name}\" value=\"{$value}\"";
    if($id && $id!='') $checkbox .= " id=\"{$id}\"";
    if($selected_value!='' && $value==$selected_value) {
        $checkbox .= " checked=\"checked\"";
    }
    $checkbox .= " />";
    $checkbox .= " <label for=\"{$id}\"><strong>{$label}</strong></label>";
    return $checkbox;
}

function mortgagestat_commercial_loan_render() {
    global $paged;
    if(!$paged || $paged='')    $paged = 1;
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>
            <?php
            $title = 'Commercial Loan Stats';
            if(isset($_GET["action"])) {
                if($_GET["action"]=="view")  $title = "Application Details";
            }
            ?>
            <?php echo $title; ?>
            <?php if($_GET["action"]!="view") { ?>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_commercial_loan&action=export'; ?>" class="add-new-h2" title="Export Commercial Loan Applications to CSV" target="_blank">Export Applications to CSV</a>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_commercial_loan&action=export&paged=' . $paged; ?>" class="add-new-h2" title="Export Commercial Loan Applications to CSV (Current Page Only)" target="_blank">Export Applications to CSV (Current Page Only)</a>
            <?php } ?>
        </h2>
        <form action="<?php echo admin_url() . "admin.php"; ?>" method="get">
            <p class="search-box">
                <input type="hidden" name="page" value="mortgagestat_commercial_loan" />
                <label class="screen-reader-text" for="apps-search-input">Search Applications:</label>
                <input type="text" id="apps-search-input" name="q" value="<?php echo $_GET["q"]; ?>">
                <input type="submit" id="search-submit" class="button" value="Search Applications">
            </p>
            <div class="clear"></div>
        </form>
        <div id="content">
            <br/>
            <?php require(dirname(__FILE__) . '/backend/renders/commercial_loan_stats.php'); ?>
        </div>
    </div>
<?php
}

function mortgagestat_loan_modification_render() {
    global $paged;
    if(!$paged || $paged='')    $paged = 1;
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>
            <?php
            $title = 'Loan Modification Stats';
            if(isset($_GET["action"])) {
                if($_GET["action"]=="view")  $title = "Application Details";
            }
            ?>
            <?php echo $title; ?>
            <?php if($_GET["action"]!="view") { ?>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_loan_modification&action=export'; ?>" class="add-new-h2" title="Export Loan Modification Applications to CSV" target="_blank">Export Applications to CSV</a>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_loan_modification&action=export&paged=' . $paged; ?>" class="add-new-h2" title="Export Loan Modification Applications to CSV (Current Page Only)" target="_blank">Export Applications to CSV (Current Page Only)</a>
            <?php } ?>
        </h2>
        <form action="<?php echo admin_url() . "admin.php"; ?>" method="get">
            <p class="search-box">
                <input type="hidden" name="page" value="mortgagestat_loan_modification" />
                <label class="screen-reader-text" for="apps-search-input">Search Applications:</label>
                <input type="text" id="apps-search-input" name="q" value="<?php echo $_GET["q"]; ?>">
                <input type="submit" id="search-submit" class="button" value="Search Applications">
            </p>
            <div class="clear"></div>
        </form>
        <div id="content">
            <br/>
            <?php require(dirname(__FILE__) . '/backend/renders/loan_modification_stats.php'); ?>
        </div>
    </div>
<?php
}

function mortgagestat_loan_status_render() {
    global $paged;
    if(!$paged || $paged='')    $paged = 1;
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>
            <?php
            $title = 'Loan Status Stats';
            if(isset($_GET["action"])) {
                if($_GET["action"]=="view")  $title = "Application Details";
            }
            ?>
            <?php echo $title; ?>
            <?php if($_GET["action"]!="view") { ?>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_loan_status&action=export'; ?>" class="add-new-h2" title="Export Loan Status Applications to CSV" target="_blank">Export Applications to CSV</a>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_loan_status&action=export&paged=' . $paged; ?>" class="add-new-h2" title="Export Loan Status Applications to CSV (Current Page Only)" target="_blank">Export Applications to CSV (Current Page Only)</a>
            <?php } ?>
        </h2>
        <form action="<?php echo admin_url() . "admin.php"; ?>" method="get">
            <p class="search-box">
                <input type="hidden" name="page" value="mortgagestat_loan_status" />
                <label class="screen-reader-text" for="apps-search-input">Search Applications:</label>
                <input type="text" id="apps-search-input" name="q" value="<?php echo $_GET["q"]; ?>">
                <input type="submit" id="search-submit" class="button" value="Search Applications">
            </p>
            <div class="clear"></div>
        </form>
        <div id="content">
            <br/>
            <?php require(dirname(__FILE__) . '/backend/renders/loan_status_stats.php'); ?>
        </div>
    </div>
<?php
}

function mortgagestat_online_render() {
    global $paged;
    if(!$paged || $paged='')    $paged = 1;
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>
            <?php
            $title = 'Online Application Stats';
            if(isset($_GET["action"])) {
                if($_GET["action"]=="view")  $title = "Application Details";
            }
            ?>
            <?php echo $title; ?>
            <?php if($_GET["action"]!="view") { ?>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_online&action=export'; ?>" class="add-new-h2" title="Export Online Applications to CSV" target="_blank">Export Applications to CSV</a>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_online&action=export&paged=' . $paged; ?>" class="add-new-h2" title="Export Online Applications to CSV (Current Page Only)" target="_blank">Export Applications to CSV (Current Page Only)</a>
            <?php } ?>
        </h2>
        <form action="<?php echo admin_url() . "admin.php"; ?>" method="get">
            <p class="search-box">
                <input type="hidden" name="page" value="mortgagestat_online" />
                <label class="screen-reader-text" for="apps-search-input">Search Applications:</label>
                <input type="text" id="apps-search-input" name="q" value="<?php echo $_GET["q"]; ?>">
                <input type="submit" id="search-submit" class="button" value="Search Applications">
            </p>
            <div class="clear"></div>
        </form>
        <div id="content">
            <br/>
            <?php require(dirname(__FILE__) . '/backend/renders/online_stats.php'); ?>
        </div>
    </div>
<?php
}

function mortgagestat_quick_online_render() {
    global $paged;
    if(!$paged || $paged='')    $paged = 1;
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>
            <?php
            $title = 'Quick Online Stats';
            if(isset($_GET["action"])) {
                if($_GET["action"]=="view")  $title = "Application Details";
            }
            ?>
            <?php echo $title; ?>
            <?php if($_GET["action"]!="view") { ?>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_quick_online&action=export'; ?>" class="add-new-h2" title="Export Quick Online Applications to CSV" target="_blank">Export Applications to CSV</a>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_quick_online&action=export&paged=' . $paged; ?>" class="add-new-h2" title="Export Quick Online Applications to CSV (Current Page Only)" target="_blank">Export Applications to CSV (Current Page Only)</a>
            <?php } ?>
        </h2>
        <form action="<?php echo admin_url() . "admin.php"; ?>" method="get">
            <p class="search-box">
                <input type="hidden" name="page" value="mortgagestat_quick_online" />
                <label class="screen-reader-text" for="apps-search-input">Search Applications:</label>
                <input type="text" id="apps-search-input" name="q" value="<?php echo $_GET["q"]; ?>">
                <input type="submit" id="search-submit" class="button" value="Search Applications">
            </p>
            <div class="clear"></div>
        </form>
        <div id="content">
            <br/>
            <?php require(dirname(__FILE__) . '/backend/renders/quick_online_stats.php'); ?>
        </div>
    </div>
<?php
}

function mortgagestat_reverse_render() {
    global $paged;
    if(!$paged || $paged='')    $paged = 1;
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>
            <?php
            $title = 'Reverse Application Stats';
            if(isset($_GET["action"])) {
                if($_GET["action"]=="view")  $title = "Application Details";
            }
            ?>
            <?php echo $title; ?>
            <?php if($_GET["action"]!="view") { ?>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_reverse&action=export'; ?>" class="add-new-h2" title="Export Reverse Applications to CSV" target="_blank">Export Applications to CSV</a>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_reverse&action=export&paged=' . $paged; ?>" class="add-new-h2" title="Export Reverse Applications to CSV (Current Page Only)" target="_blank">Export Applications to CSV (Current Page Only)</a>
            <?php } ?>
        </h2>
        <form action="<?php echo admin_url() . "admin.php"; ?>" method="get">
            <p class="search-box">
                <input type="hidden" name="page" value="mortgagestat_reverse" />
                <label class="screen-reader-text" for="apps-search-input">Search Applications:</label>
                <input type="text" id="apps-search-input" name="q" value="<?php echo $_GET["q"]; ?>">
                <input type="submit" id="search-submit" class="button" value="Search Applications">
            </p>
            <div class="clear"></div>
        </form>
        <div id="content">
            <br/>
            <?php require(dirname(__FILE__) . '/backend/renders/reverse_stats.php'); ?>
        </div>
    </div>
<?php
}

function mortgagestat_step_render() {
    global $paged;
    if(!$paged || $paged='')    $paged = 1;
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>
            <?php
            $title = 'Step Application Stats';
            if(isset($_GET["action"])) {
                if($_GET["action"]=="view")  $title = "Application Details";
            }
            ?>
            <?php echo $title; ?>
            <?php if($_GET["action"]!="view") { ?>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_step&action=export'; ?>" class="add-new-h2" title="Export Step Applications to CSV" target="_blank">Export Applications to CSV</a>
            <a href="<?php echo admin_url().'admin.php?page=mortgagestat_step&action=export&paged=' . $paged; ?>" class="add-new-h2" title="Export Step Applications to CSV (Current Page Only)" target="_blank">Export Applications to CSV (Current Page Only)</a>
            <?php } ?>
        </h2>
        <form action="<?php echo admin_url() . "admin.php"; ?>" method="get">
            <p class="search-box">
                <input type="hidden" name="page" value="mortgagestat_step" />
                <label class="screen-reader-text" for="apps-search-input">Search Applications:</label>
                <input type="text" id="apps-search-input" name="q" value="<?php echo $_GET["q"]; ?>">
                <input type="submit" id="search-submit" class="button" value="Search Applications">
            </p>
            <div class="clear"></div>
        </form>
        <div id="content">
            <br/>
            <?php require(dirname(__FILE__) . '/backend/renders/step_stats.php'); ?>
        </div>
    </div>
<?php
}
?>
