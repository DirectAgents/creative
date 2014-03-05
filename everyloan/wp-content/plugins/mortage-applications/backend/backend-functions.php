<?php

function mortgageapp_commercialloan_labels() {
    $labels = array();
    $labels[] = "Type";
    $labels[] = "Term Rate";
    $labels[] = "Amortization";
    $labels[] = "When";
    $labels[] = "Loan Amount";
    $labels[] = "Property Type";
    $labels[] = "Property Address";
    $labels[] = "Property City";
    $labels[] = "Property State";
    $labels[] = "Property ZipCode";
    $labels[] = "First Name";
    $labels[] = "Last Name";
    $labels[] = "Address";
    $labels[] = "State";
    $labels[] = "City";
    $labels[] = "ZipCode";
    $labels[] = "Email";
    $labels[] = "Day Phone";
    $labels[] = "Evening Phone";
    $labels[] = "Business Name";
    $labels[] = "Business Phone";
    $labels[] = "Business Fax";
    $labels[] = "Business Address";
    $labels[] = "Business City";
    $labels[] = "Business ZipCode";
    $labels[] = "Business Established";
    $labels[] = "Business Employees";
    $labels[] = "Business State";
    $labels[] = "Business Type";
    $labels[] = "Business Owner Name 1";
    $labels[] = "Business Owner Title 1";
    $labels[] = "Business Owner Shares 1";
    $labels[] = "Business Owner Partnership 1";
    $labels[] = "Business Owner Name 2";
    $labels[] = "Business Owner Title 2";
    $labels[] = "Business Owner Shares 2";
    $labels[] = "Business Owner Partnership 2";
    $labels[] = "Business Owner Name 3";
    $labels[] = "Business Owner Title 3";
    $labels[] = "Business Owner Shares 3";
    $labels[] = "Business Owner Partnership 3";
    $labels[] = "Trade Reference Name 1";
    $labels[] = "Trade Reference Address 1";
    $labels[] = "Trade Reference City 1";
    $labels[] = "Trade Reference ZipCode 1";
    $labels[] = "Trade Reference Phone 1";
    $labels[] = "Trade Reference State 1";
    $labels[] = "Trade Reference Name 2";
    $labels[] = "Trade Reference Address 2";
    $labels[] = "Trade Reference City 2";
    $labels[] = "Trade Reference ZipCode 2";
    $labels[] = "Trade Reference Phone 2";
    $labels[] = "Trade Reference State 2";
    $labels[] = "Trade Reference Name 3";
    $labels[] = "Trade Reference Address 3";
    $labels[] = "Trade Reference City 3";
    $labels[] = "Trade Reference ZipCode 3";
    $labels[] = "Trade Reference Phone 3";
    $labels[] = "Trade Reference State 3";
    $labels[] = "Loan Purpose";
    $labels[] = "Heard From";
    $labels[] = "Date";
    return $labels;
}

function get_commercialloan_apps($page=1, $count=10, $returnCount=false, $where='', $orderby='`app_added` DESC, `app_fname` ASC', $select='*') {
    global $wpdb;

    $page = intval($page);
    if($page<1) $page = 1;
    $count = intval($count);
    $limitStart = ($page * $count) - $count;
    if($limitStart<0)   $limitStart = 0;
    $limit = "limit {$limitStart}, {$count}";
    if($count==-1)  $limit = "";
    if($where!='') {
        $where = "where {$where}";
    } else {
        $where = '';
    }
    if($orderby=='')    $orderby='`app_added` DESC, `app_fname` ASC';
    $orderby = "order by {$orderby}";
    if($select=='') $select = "*";

    if($returnCount) {
        $select = "count(app_id) as total";
        $limit = "";
    }

    $query = "select {$select} from {$wpdb->mortgageapp_commercialloan_tbl} {$where} {$orderby} {$limit}";
    $results = $wpdb->get_results($query);
    if($returnCount) {
        $record = $results[0];
        return $record->total;
    }
    return $results;
}

function get_commercialloan_app($id=0) {
    global $wpdb;

    $app = array();
    $id = intval($id);
    if($id>0) {
        $query = "select * from {$wpdb->mortgageapp_commercialloan_tbl} where `app_id`={$id} limit 1";
        $results = $wpdb->get_results($query);
        if(sizeof($results)>0) {
            $app = $results[0];
        }
    }
    return $app;
}

function is_valid_commercialloan_app($id=0) {
    global $wpdb;
    $valid = false;
    $id = intval($id);
    $query = "select app_id as id from {$wpdb->mortgageapp_commercialloan_tbl} where `app_id`={$id}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $record = $results[0];
        $id = $record->id;
        if($id>0)   $valid = true;
    }
    return $valid;
}

function delete_commercialloan_app($id=0) {
    global $wpdb;
    $id = intval($id);
    if($id>0) {
        $query = "delete from {$wpdb->mortgageapp_commercialloan_tbl} where `app_id`={$id}";
        $wpdb->query($query);
    }
}

function show_commercialloan_app_details($id=0) {
    $app = get_commercialloan_app($id);
    unset($app->app_id);
?>
<table class="wide-fat" border="0" cellspacing="0" cellpadding="10" style="font-size:14px;">
    <?php
    $count = 0;
    $labels = mortgageapp_commercialloan_labels();
    foreach($app as $val) {
?>
    <tr>
        <th align="right"><?php echo $labels[$count]; ?>:</th>
        <td><?php echo $val; ?></td>
    </tr>
<?php
        $count++;
    }
?>
</table>
<a href="javascript:history.go(-1);">Go Back</a>
<?php
}

function export_commercialloan_apps() {
    global $paged, $wpdb;

    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;
    $use_page = ((isset($_GET["paged"]) && $_GET["paged"]!='') ? true : false);
    $start = 0;
    $count = MORTGAGEAPPS_PER_PAGE;
    $limit = '';
    if($use_page) {
        $start = ($page * $count) - $count;
        if($start<0)    $start = 0;
        $limit = "limit {$start}, {$count}";
    }
    if($app_id>0) {
        $where = "where app_id={$app_id}";
        $limit = "limit 0, 1";
    }
    else {
        if(isset($_GET["q"]) && $_GET["q"]!='')
            $where = "where (`app_fname` like '%{$_GET["q"]}%' or `app_lname` like '%{$_GET["q"]}%' or `app_email` like '%{$_GET["q"]}%')";
        else
            $where = '';
    }
    $query = "select * from {$wpdb->mortgageapp_commercialloan_tbl} {$where} order by `app_added` DESC {$limit}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $csvExport = new CSVExport();

        //  Get Labels
        $labels = mortgageapp_commercialloan_labels();

        //  Add Data Start
        $csvExport->openRow();
        foreach($labels as $label) {
            $csvExport->addData($label);
        }
        $csvExport->closeRow();
        foreach($results as $app) {
            $csvExport->openRow();
            foreach($app as $key=>$val) {
                if($key!='app_id')  $csvExport->addData($val);
            }
            $csvExport->closeRow();
        }
        //  Add Data End

        $csvExport->downloadFile("mortgageapp_commercialloan_export_" . time());
    }
}

function mortgagestat_commercial_loan_admin_init() {
    if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"]=="export") {
        export_commercialloan_apps();
    }

    global $paged;
    $redirect = false;
    $action = (isset($_GET["action"])) ? $_GET["action"] : "";
    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;

    $msg = "";
    $pagedata = "page=mortgagestat_commercial_loan";
    $invalidId = false;
    if($action!="" && $action=="view" && !is_valid_commercialloan_app($app_id)) {
        $invalidId = true;
    }
    if($invalidId) {
        $redirect = true;
        $msg = "invalidId";
    } else {
        if($action=="delete") {
            $msg = "deleted";
            $redirect = true;
            delete_commercialloan_app($app_id);
        }
    }
    if($action=="view") {
        $pagenumdata = "";
    } else {
        $pagenumdata = "&paged={$paged}";
    }

    if($redirect)   wp_redirect(admin_url() . "admin.php?{$pagedata}&msg={$msg}");
}

function mortgageapp_loanmodification_labels() {
    $labels = array();
    $labels[] = "First Name";
    $labels[] = "Last Name";
    $labels[] = "Phone";
    $labels[] = "Phone 2";
    $labels[] = "Email";
    $labels[] = "Address";
    $labels[] = "City";
    $labels[] = "State";
    $labels[] = "ZipCode";
    $labels[] = "Employment";
    $labels[] = "Lender";
    $labels[] = "History";
    $labels[] = "Hardship";
    $labels[] = "Comments";
    $labels[] = "Heard From";
    $labels[] = "Date";
    return $labels;
}

function get_loanmodification_apps($page=1, $count=10, $returnCount=false, $where='', $orderby='`app_added` DESC, `app_fname` ASC', $select='*') {
    global $wpdb;

    $page = intval($page);
    if($page<1) $page = 1;
    $count = intval($count);
    $limitStart = ($page * $count) - $count;
    if($limitStart<0)   $limitStart = 0;
    $limit = "limit {$limitStart}, {$count}";
    if($count==-1)  $limit = "";
    if($where!='') {
        $where = "where {$where}";
    } else {
        $where = '';
    }
    if($orderby=='')    $orderby='`app_added` DESC, `app_fname` ASC';
    $orderby = "order by {$orderby}";
    if($select=='') $select = "*";

    if($returnCount) {
        $select = "count(app_id) as total";
        $limit = "";
    }

    $query = "select {$select} from {$wpdb->mortgageapp_loanmodification_tbl} {$where} {$orderby} {$limit}";
    $results = $wpdb->get_results($query);
    if($returnCount) {
        $record = $results[0];
        return $record->total;
    }
    return $results;
}

function get_loanmodification_app($id=0) {
    global $wpdb;

    $app = array();
    $id = intval($id);
    if($id>0) {
        $query = "select * from {$wpdb->mortgageapp_loanmodification_tbl} where `app_id`={$id} limit 1";
        $results = $wpdb->get_results($query);
        if(sizeof($results)>0) {
            $app = $results[0];
        }
    }
    return $app;
}

function is_valid_loanmodification_app($id=0) {
    global $wpdb;
    $valid = false;
    $id = intval($id);
    $query = "select app_id as id from {$wpdb->mortgageapp_loanmodification_tbl} where `app_id`={$id}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $record = $results[0];
        $id = $record->id;
        if($id>0)   $valid = true;
    }
    return $valid;
}

function delete_loanmodification_app($id=0) {
    global $wpdb;
    $id = intval($id);
    if($id>0) {
        $query = "delete from {$wpdb->mortgageapp_loanmodification_tbl} where `app_id`={$id}";
        $wpdb->query($query);
    }
}

function show_loanmodification_app_details($id=0) {
    $app = get_loanmodification_app($id);
    unset($app->app_id);
?>
<table class="wide-fat" border="0" cellspacing="0" cellpadding="10" style="font-size:14px;">
    <?php
    $count = 0;
    $labels = mortgageapp_loanmodification_labels();
    foreach($app as $val) {
?>
    <tr>
        <th align="right"><?php echo $labels[$count]; ?>:</th>
        <td><?php echo $val; ?></td>
    </tr>
<?php
        $count++;
    }
?>
</table>
<a href="javascript:history.go(-1);">Go Back</a>
<?php
}

function export_loanmodification_apps() {
    global $paged, $wpdb;

    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;
    $use_page = ((isset($_GET["paged"]) && $_GET["paged"]!='') ? true : false);
    $start = 0;
    $count = MORTGAGEAPPS_PER_PAGE;
    $limit = '';
    if($use_page) {
        $start = ($page * $count) - $count;
        if($start<0)    $start = 0;
        $limit = "limit {$start}, {$count}";
    }
    if($app_id>0) {
        $where = "where app_id={$app_id}";
        $limit = "limit 0, 1";
    }
    else {
        if(isset($_GET["q"]) && $_GET["q"]!='')
            $where = "where (`app_fname` like '%{$_GET["q"]}%' or `app_lname` like '%{$_GET["q"]}%' or `app_email` like '%{$_GET["q"]}%')";
        else
            $where = '';
    }
    $query = "select * from {$wpdb->mortgageapp_loanmodification_tbl} {$where} order by `app_added` DESC {$limit}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $csvExport = new CSVExport();

        //  Get Labels
        $labels = mortgageapp_loanmodification_labels();

        //  Add Data Start
        $csvExport->openRow();
        foreach($labels as $label) {
            $csvExport->addData($label);
        }
        $csvExport->closeRow();
        foreach($results as $app) {
            $csvExport->openRow();
            foreach($app as $key=>$val) {
                if($key!='app_id')  $csvExport->addData($val);
            }
            $csvExport->closeRow();
        }
        //  Add Data End

        $csvExport->downloadFile("mortgageapp_loanmodification_export_" . time());
    }
}

function mortgagestat_loan_modification_admin_init() {
    if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"]=="export") {
        export_loanmodification_apps();
    }

    global $paged;
    $redirect = false;
    $action = (isset($_GET["action"])) ? $_GET["action"] : "";
    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;

    $msg = "";
    $pagedata = "page=mortgagestat_loan_modification";
    $invalidId = false;
    if($action!="" && $action=="view" && !is_valid_loanmodification_app($app_id)) {
        $invalidId = true;
    }
    if($invalidId) {
        $redirect = true;
        $msg = "invalidId";
    } else {
        if($action=="delete") {
            $msg = "deleted";
            $redirect = true;
            delete_loanmodification_app($app_id);
        }
    }
    if($action=="view") {
        $pagenumdata = "";
    } else {
        $pagenumdata = "&paged={$paged}";
    }

    if($redirect)   wp_redirect(admin_url() . "admin.php?{$pagedata}&msg={$msg}");
}

function mortgageapp_loanstatus_labels() {
    $labels = array();
    $labels[] = "First Name";
    $labels[] = "Last Name";
    $labels[] = "Email";
    $labels[] = "Question";
    $labels[] = "Phone";
    $labels[] = "Comments";
    $labels[] = "Date";
    return $labels;
}

function get_loanstatus_apps($page=1, $count=10, $returnCount=false, $where='', $orderby='`app_added` DESC, `app_fname` ASC', $select='*') {
    global $wpdb;

    $page = intval($page);
    if($page<1) $page = 1;
    $count = intval($count);
    $limitStart = ($page * $count) - $count;
    if($limitStart<0)   $limitStart = 0;
    $limit = "limit {$limitStart}, {$count}";
    if($count==-1)  $limit = "";
    if($where!='') {
        $where = "where {$where}";
    } else {
        $where = '';
    }
    if($orderby=='')    $orderby='`app_added` DESC, `app_fname` ASC';
    $orderby = "order by {$orderby}";
    if($select=='') $select = "*";

    if($returnCount) {
        $select = "count(app_id) as total";
        $limit = "";
    }

    $query = "select {$select} from {$wpdb->mortgageapp_loanstatus_tbl} {$where} {$orderby} {$limit}";
    $results = $wpdb->get_results($query);
    if($returnCount) {
        $record = $results[0];
        return $record->total;
    }
    return $results;
}

function get_loanstatus_app($id=0) {
    global $wpdb;

    $app = array();
    $id = intval($id);
    if($id>0) {
        $query = "select * from {$wpdb->mortgageapp_loanstatus_tbl} where `app_id`={$id} limit 1";
        $results = $wpdb->get_results($query);
        if(sizeof($results)>0) {
            $app = $results[0];
        }
    }
    return $app;
}

function is_valid_loanstatus_app($id=0) {
    global $wpdb;
    $valid = false;
    $id = intval($id);
    $query = "select app_id as id from {$wpdb->mortgageapp_loanstatus_tbl} where `app_id`={$id}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $record = $results[0];
        $id = $record->id;
        if($id>0)   $valid = true;
    }
    return $valid;
}

function delete_loanstatus_app($id=0) {
    global $wpdb;
    $id = intval($id);
    if($id>0) {
        $query = "delete from {$wpdb->mortgageapp_loanstatus_tbl} where `app_id`={$id}";
        $wpdb->query($query);
    }
}

function show_loanstatus_app_details($id=0) {
    $app = get_loanstatus_app($id);
    unset($app->app_id);
?>
<table class="wide-fat" border="0" cellspacing="0" cellpadding="10" style="font-size:14px;">
    <?php
    $count = 0;
    $labels = mortgageapp_loanstatus_labels();
    foreach($app as $val) {
?>
    <tr>
        <th align="right"><?php echo $labels[$count]; ?>:</th>
        <td><?php echo $val; ?></td>
    </tr>
<?php
        $count++;
    }
?>
</table>
<a href="javascript:history.go(-1);">Go Back</a>
<?php
}

function export_loanstatus_apps() {
    global $paged, $wpdb;

    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;
    $use_page = ((isset($_GET["paged"]) && $_GET["paged"]!='') ? true : false);
    $start = 0;
    $count = MORTGAGEAPPS_PER_PAGE;
    $limit = '';
    if($use_page) {
        $start = ($page * $count) - $count;
        if($start<0)    $start = 0;
        $limit = "limit {$start}, {$count}";
    }
    if($app_id>0) {
        $where = "where app_id={$app_id}";
        $limit = "limit 0, 1";
    }
    else {
        if(isset($_GET["q"]) && $_GET["q"]!='')
            $where = "where (`app_fname` like '%{$_GET["q"]}%' or `app_lname` like '%{$_GET["q"]}%' or `app_email` like '%{$_GET["q"]}%')";
        else
            $where = '';
    }
    $query = "select * from {$wpdb->mortgageapp_loanstatus_tbl} {$where} order by `app_added` DESC {$limit}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $csvExport = new CSVExport();

        //  Get Labels
        $labels = mortgageapp_loanstatus_labels();

        //  Add Data Start
        $csvExport->openRow();
        foreach($labels as $label) {
            $csvExport->addData($label);
        }
        $csvExport->closeRow();
        foreach($results as $app) {
            $csvExport->openRow();
            foreach($app as $key=>$val) {
                if($key!='app_id')  $csvExport->addData($val);
            }
            $csvExport->closeRow();
        }
        //  Add Data End

        $csvExport->downloadFile("mortgageapp_loanstatus_export_" . time());
    }
}

function mortgagestat_loan_status_admin_init() {
    if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"]=="export") {
        export_loanstatus_apps();
    }

    global $paged;
    $redirect = false;
    $action = (isset($_GET["action"])) ? $_GET["action"] : "";
    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;

    $msg = "";
    $pagedata = "page=mortgagestat_loan_status";
    $invalidId = false;
    if($action!="" && $action=="view" && !is_valid_loanstatus_app($app_id)) {
        $invalidId = true;
    }
    if($invalidId) {
        $redirect = true;
        $msg = "invalidId";
    } else {
        if($action=="delete") {
            $msg = "deleted";
            $redirect = true;
            delete_loanstatus_app($app_id);
        }
    }
    if($action=="view") {
        $pagenumdata = "";
    } else {
        $pagenumdata = "&paged={$paged}";
    }

    if($redirect)   wp_redirect(admin_url() . "admin.php?{$pagedata}&msg={$msg}");
}

function mortgageapp_online_labels() {
    $labels = array();
    $labels[] = "Borrower";
    $labels[] = "Co Borrower";
    $labels[] = "Type";
    $labels[] = "Purpose";
    $labels[] = "Residence";
    $labels[] = "Property Type";
    $labels[] = "Units";
    $labels[] = "Duration";
    $labels[] = "Price";
    $labels[] = "Loan Amount";
    $labels[] = "First Name";
    $labels[] = "Last Name";
    $labels[] = "Phone";
    $labels[] = "Phone 2";
    $labels[] = "Social Security Number";
    $labels[] = "Dependents";
    $labels[] = "Date of Birth";
    $labels[] = "Dependent Ages";
    $labels[] = "Schooling";
    $labels[] = "Email";
    $labels[] = "Co First Name";
    $labels[] = "Co Last Name";
    $labels[] = "Co Phone";
    $labels[] = "Co Phone 2";
    $labels[] = "Co Social Security Number";
    $labels[] = "Co Dependents";
    $labels[] = "Co Date of Birth";
    $labels[] = "Co Dependent Ages";
    $labels[] = "Co Schooling";
    $labels[] = "Co Email";
    $labels[] = "Co Address";
    $labels[] = "Co City";
    $labels[] = "Co State";
    $labels[] = "Co ZipCode";
    $labels[] = "Co Time";
    $labels[] = "Employment Name";
    $labels[] = "Employment Position";
    $labels[] = "Employment Years";
    $labels[] = "Employment Years in Same Field";
    $labels[] = "Employment Income";
    $labels[] = "Co Employment Name";
    $labels[] = "Co Employment Position";
    $labels[] = "Co Employment Years";
    $labels[] = "Co Employment Years in Same Field";
    $labels[] = "Co Employment Income";
    $labels[] = "Other Income";
    $labels[] = "Co Other Income";
    $labels[] = "Assets Account Type";
    $labels[] = "Assets Account Amount";
    $labels[] = "Financial Institution Name 1";
    $labels[] = "Financial Institution Amount 1";
    $labels[] = "Financial Institution Accoun Number 1";
    $labels[] = "Financial Institution Name 2";
    $labels[] = "Financial Institution Amount 2";
    $labels[] = "Financial Institution Accoun Number 2";
    $labels[] = "Stock Description 1";
    $labels[] = "Stock Amount 1";
    $labels[] = "Stock Description 2";
    $labels[] = "Stock Amount 2";
    $labels[] = "Stock Description 3";
    $labels[] = "Stock Amount 3";
    $labels[] = "Life Insurance";
    $labels[] = "Face Amount";
    $labels[] = "Automobile Type 1";
    $labels[] = "Automobile Amount 1";
    $labels[] = "Automobile Type 2";
    $labels[] = "Automobile Amount 2";
    $labels[] = "Automobile Type 3";
    $labels[] = "Automobile Amount 3";
    $labels[] = "Other Assets Name 1";
    $labels[] = "Other Assets Amount 1";
    $labels[] = "Other Assets Name 2";
    $labels[] = "Other Assets Amount 2";
    $labels[] = "Other Assets Name 3";
    $labels[] = "Other Assets Amount 3";
    $labels[] = "Expenses 1st Mortgage";
    $labels[] = "Expenses 2nd Mortgage";
    $labels[] = "Expenses Taxes";
    $labels[] = "Expenses Home Owners Insurance";
    $labels[] = "Expenses Mortgage Insurance";
    $labels[] = "Monthly Rent Payment";
    $labels[] = "Approx. 1st Mortgage Balance";
    $labels[] = "Approx. 2nd Mortgage Balance";
    $labels[] = "Max Line of Credit";
    $labels[] = "Approx. Home Value";
    $labels[] = "Home is to Be";
    $labels[] = "Liability Type 1";
    $labels[] = "Liability Account Number 1";
    $labels[] = "Liability Balance 1";
    $labels[] = "Liability Payment 1";
    $labels[] = "Liability Type 2";
    $labels[] = "Liability Account Number 2";
    $labels[] = "Liability Balance 2";
    $labels[] = "Liability Payment 2";
    $labels[] = "Liability Type 3";
    $labels[] = "Liability Account Number 3";
    $labels[] = "Liability Balance 3";
    $labels[] = "Liability Payment 3";
    $labels[] = "Liability Type 4";
    $labels[] = "Liability Account Number 4";
    $labels[] = "Liability Balance 4";
    $labels[] = "Liability Payment 4";
    $labels[] = "Liability Type 5";
    $labels[] = "Liability Account Number 5";
    $labels[] = "Liability Balance 5";
    $labels[] = "Liability Payment 5";
    $labels[] = "Furnish";
    $labels[] = "Ethinicity";
    $labels[] = "Race";
    $labels[] = "Gender";
    $labels[] = "Marital Status";
    $labels[] = "Projected Closing";
    $labels[] = "Projected Around";
    $labels[] = "Contact";
    $labels[] = "Comments";
    $labels[] = "Heard From";
    $labels[] = "Agree";
    $labels[] = "Co Agree";
    $labels[] = "Date";
    return $labels;
}

function get_online_apps($page=1, $count=10, $returnCount=false, $where='', $orderby='`app_added` DESC, `app_fname` ASC', $select='*') {
    global $wpdb;

    $page = intval($page);
    if($page<1) $page = 1;
    $count = intval($count);
    $limitStart = ($page * $count) - $count;
    if($limitStart<0)   $limitStart = 0;
    $limit = "limit {$limitStart}, {$count}";
    if($count==-1)  $limit = "";
    if($where!='') {
        $where = "where {$where}";
    } else {
        $where = '';
    }
    if($orderby=='')    $orderby='`app_added` DESC, `app_fname` ASC';
    $orderby = "order by {$orderby}";
    if($select=='') $select = "*";

    if($returnCount) {
        $select = "count(app_id) as total";
        $limit = "";
    }

    $query = "select {$select} from {$wpdb->mortgageapp_online_tbl} {$where} {$orderby} {$limit}";
    $results = $wpdb->get_results($query);
    if($returnCount) {
        $record = $results[0];
        return $record->total;
    }
    return $results;
}

function get_online_app($id=0) {
    global $wpdb;

    $app = array();
    $id = intval($id);
    if($id>0) {
        $query = "select * from {$wpdb->mortgageapp_online_tbl} where `app_id`={$id} limit 1";
        $results = $wpdb->get_results($query);
        if(sizeof($results)>0) {
            $app = $results[0];
        }
    }
    return $app;
}

function is_valid_online_app($id=0) {
    global $wpdb;
    $valid = false;
    $id = intval($id);
    $query = "select app_id as id from {$wpdb->mortgageapp_online_tbl} where `app_id`={$id}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $record = $results[0];
        $id = $record->id;
        if($id>0)   $valid = true;
    }
    return $valid;
}

function delete_online_app($id=0) {
    global $wpdb;
    $id = intval($id);
    if($id>0) {
        $query = "delete from {$wpdb->mortgageapp_online_tbl} where `app_id`={$id}";
        $wpdb->query($query);
    }
}

function show_online_app_details($id=0) {
    $app = get_online_app($id);
    unset($app->app_id);
?>
<table class="wide-fat" border="0" cellspacing="0" cellpadding="10" style="font-size:14px;">
    <?php
    $count = 0;
    $labels = mortgageapp_online_labels();
    foreach($app as $val) {
?>
    <tr>
        <th align="right"><?php echo $labels[$count]; ?>:</th>
        <td><?php echo $val; ?></td>
    </tr>
<?php
        $count++;
    }
?>
</table>
<a href="javascript:history.go(-1);">Go Back</a>
<?php
}

function export_online_apps() {
    global $paged, $wpdb;

    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;
    $use_page = ((isset($_GET["paged"]) && $_GET["paged"]!='') ? true : false);
    $start = 0;
    $count = MORTGAGEAPPS_PER_PAGE;
    $limit = '';
    if($use_page) {
        $start = ($page * $count) - $count;
        if($start<0)    $start = 0;
        $limit = "limit {$start}, {$count}";
    }
    if($app_id>0) {
        $where = "where app_id={$app_id}";
        $limit = "limit 0, 1";
    }
    else {
        if(isset($_GET["q"]) && $_GET["q"]!='')
            $where = "where (`app_fname` like '%{$_GET["q"]}%' or `app_lname` like '%{$_GET["q"]}%' or `app_email` like '%{$_GET["q"]}%')";
        else
            $where = '';
    }
    $query = "select * from {$wpdb->mortgageapp_online_tbl} {$where} order by `app_added` DESC {$limit}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $csvExport = new CSVExport();

        //  Get Labels
        $labels = mortgageapp_online_labels();

        //  Add Data Start
        $csvExport->openRow();
        foreach($labels as $label) {
            $csvExport->addData($label);
        }
        $csvExport->closeRow();
        foreach($results as $app) {
            $csvExport->openRow();
            foreach($app as $key=>$val) {
                if($key!='app_id')  $csvExport->addData($val);
            }
            $csvExport->closeRow();
        }
        //  Add Data End

        $csvExport->downloadFile("mortgageapp_online_export_" . time());
    }
}

function mortgagestat_online_admin_init() {
    if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"]=="export") {
        export_online_apps();
    }

    global $paged;
    $redirect = false;
    $action = (isset($_GET["action"])) ? $_GET["action"] : "";
    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;

    $msg = "";
    $pagedata = "page=mortgagestat_online";
    $invalidId = false;
    if($action!="" && $action=="view" && !is_valid_online_app($app_id)) {
        $invalidId = true;
    }
    if($invalidId) {
        $redirect = true;
        $msg = "invalidId";
    } else {
        if($action=="delete") {
            $msg = "deleted";
            $redirect = true;
            delete_online_app($app_id);
        }
    }
    if($action=="view") {
        $pagenumdata = "";
    } else {
        $pagenumdata = "&paged={$paged}";
    }

    if($redirect)   wp_redirect(admin_url() . "admin.php?{$pagedata}&msg={$msg}");
}

function mortgageapp_quickonline_labels() {
    $labels = array();
    $labels[] = "Type";
    $labels[] = "Loan Length";
    $labels[] = "Loan by When";
    $labels[] = "Property Type";
    $labels[] = "Property State";
    $labels[] = "Loan Amount";
    $labels[] = "Property Value";
    $labels[] = "Credit Rate";
    $labels[] = "Mortgage Amount";
    $labels[] = "Mortgage Interest";
    $labels[] = "Mortgage Type";
    $labels[] = "Mortgage Duration";
    $labels[] = "Mortgage Monthly Payment";
    $labels[] = "Mortgage Payment Late";
    $labels[] = "First Name";
    $labels[] = "Middle Name";
    $labels[] = "Last Name";
    $labels[] = "Address";
    $labels[] = "State";
    $labels[] = "City";
    $labels[] = "ZipCode";
    $labels[] = "Email";
    $labels[] = "Day Phone";
    $labels[] = "Evening Phone";
    $labels[] = "Employment Gross Income";
    $labels[] = "Employment Years";
    $labels[] = "Co Name";
    $labels[] = "Co Gross Income";
    $labels[] = "Prefered";
    $labels[] = "Comments";
    $labels[] = "Heard From";
    $labels[] = "Date";
    return $labels;
}

function get_quickonline_apps($page=1, $count=10, $returnCount=false, $where='', $orderby='`app_added` DESC, `app_fname` ASC', $select='*') {
    global $wpdb;

    $page = intval($page);
    if($page<1) $page = 1;
    $count = intval($count);
    $limitStart = ($page * $count) - $count;
    if($limitStart<0)   $limitStart = 0;
    $limit = "limit {$limitStart}, {$count}";
    if($count==-1)  $limit = "";
    if($where!='') {
        $where = "where {$where}";
    } else {
        $where = '';
    }
    if($orderby=='')    $orderby='`app_added` DESC, `app_fname` ASC';
    $orderby = "order by {$orderby}";
    if($select=='') $select = "*";

    if($returnCount) {
        $select = "count(app_id) as total";
        $limit = "";
    }

    $query = "select {$select} from {$wpdb->mortgageapp_quickonline_tbl} {$where} {$orderby} {$limit}";
    $results = $wpdb->get_results($query);
    if($returnCount) {
        $record = $results[0];
        return $record->total;
    }
    return $results;
}

function get_quickonline_app($id=0) {
    global $wpdb;

    $app = array();
    $id = intval($id);
    if($id>0) {
        $query = "select * from {$wpdb->mortgageapp_quickonline_tbl} where `app_id`={$id} limit 1";
        $results = $wpdb->get_results($query);
        if(sizeof($results)>0) {
            $app = $results[0];
        }
    }
    return $app;
}

function is_valid_quickonline_app($id=0) {
    global $wpdb;
    $valid = false;
    $id = intval($id);
    $query = "select app_id as id from {$wpdb->mortgageapp_quickonline_tbl} where `app_id`={$id}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $record = $results[0];
        $id = $record->id;
        if($id>0)   $valid = true;
    }
    return $valid;
}

function delete_quickonline_app($id=0) {
    global $wpdb;
    $id = intval($id);
    if($id>0) {
        $query = "delete from {$wpdb->mortgageapp_quickonline_tbl} where `app_id`={$id}";
        $wpdb->query($query);
    }
}

function show_quickonline_app_details($id=0) {
    $app = get_quickonline_app($id);
    unset($app->app_id);
?>
<table class="wide-fat" border="0" cellspacing="0" cellpadding="10" style="font-size:14px;">
    <?php
    $count = 0;
    $labels = mortgageapp_quickonline_labels();
    foreach($app as $val) {
?>
    <tr>
        <th align="right"><?php echo $labels[$count]; ?>:</th>
        <td><?php echo $val; ?></td>
    </tr>
<?php
        $count++;
    }
?>
</table>
<a href="javascript:history.go(-1);">Go Back</a>
<?php
}

function export_quickonline_apps() {
    global $paged, $wpdb;

    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;
    $use_page = ((isset($_GET["paged"]) && $_GET["paged"]!='') ? true : false);
    $start = 0;
    $count = MORTGAGEAPPS_PER_PAGE;
    $limit = '';
    if($use_page) {
        $start = ($page * $count) - $count;
        if($start<0)    $start = 0;
        $limit = "limit {$start}, {$count}";
    }
    if($app_id>0) {
        $where = "where app_id={$app_id}";
        $limit = "limit 0, 1";
    }
    else {
        if(isset($_GET["q"]) && $_GET["q"]!='')
            $where = "where (`app_fname` like '%{$_GET["q"]}%' or `app_lname` like '%{$_GET["q"]}%' or `app_email` like '%{$_GET["q"]}%')";
        else
            $where = '';
    }
    $query = "select * from {$wpdb->mortgageapp_quickonline_tbl} {$where} order by `app_added` DESC {$limit}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $csvExport = new CSVExport();

        //  Get Labels
        $labels = mortgageapp_quickonline_labels();

        //  Add Data Start
        $csvExport->openRow();
        foreach($labels as $label) {
            $csvExport->addData($label);
        }
        $csvExport->closeRow();
        foreach($results as $app) {
            $csvExport->openRow();
            foreach($app as $key=>$val) {
                if($key!='app_id')  $csvExport->addData($val);
            }
            $csvExport->closeRow();
        }
        //  Add Data End

        $csvExport->downloadFile("mortgageapp_quickonline_export_" . time());
    }
}

function mortgagestat_quick_online_admin_init() {
    if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"]=="export") {
        export_quickonline_apps();
    }

    global $paged;
    $redirect = false;
    $action = (isset($_GET["action"])) ? $_GET["action"] : "";
    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;

    $msg = "";
    $pagedata = "page=mortgagestat_quick_online";
    $invalidId = false;
    if($action!="" && $action=="view" && !is_valid_quickonline_app($app_id)) {
        $invalidId = true;
    }
    if($invalidId) {
        $redirect = true;
        $msg = "invalidId";
    } else {
        if($action=="delete") {
            $msg = "deleted";
            $redirect = true;
            delete_quickonline_app($app_id);
        }
    }
    if($action=="view") {
        $pagenumdata = "";
    } else {
        $pagenumdata = "&paged={$paged}";
    }

    if($redirect)   wp_redirect(admin_url() . "admin.php?{$pagedata}&msg={$msg}");
}

function mortgageapp_reverse_labels() {
    $labels = array();
    $labels[] = "First Name";
    $labels[] = "Last Name";
    $labels[] = "Social Security Number";
    $labels[] = "Date of Birth";
    $labels[] = "Marital Status";
    $labels[] = "Years at Present Address";
    $labels[] = "Email";
    $labels[] = "Income";
    $labels[] = "Real Estate Assets";
    $labels[] = "Available Assets";
    $labels[] = "Alternate Contact";
    $labels[] = "Address";
    $labels[] = "City";
    $labels[] = "State";
    $labels[] = "ZipCode";
    $labels[] = "Phone";
    $labels[] = "Co First Name";
    $labels[] = "Co Last Name";
    $labels[] = "Co Social Security Number";
    $labels[] = "Co Date of Birth";
    $labels[] = "Co Marital Status";
    $labels[] = "Co Years at Present Address";
    $labels[] = "Co Email";
    $labels[] = "Co Income";
    $labels[] = "Co Real Estate Assets";
    $labels[] = "Co Available Assets";
    $labels[] = "Co Alternate Contact";
    $labels[] = "Co Address";
    $labels[] = "Co City";
    $labels[] = "Co State";
    $labels[] = "Co ZipCode";
    $labels[] = "Co Phone";
    $labels[] = "Applied For";
    $labels[] = "Special Features";
    $labels[] = "Amortization Type";
    $labels[] = "Loan Payment Plan";
    $labels[] = "Lender Case No.";
    $labels[] = "ARM. Type";
    $labels[] = "Property Address";
    $labels[] = "Property State";
    $labels[] = "Property City";
    $labels[] = "Property ZipCode";
    $labels[] = "Property Legal Description";
    $labels[] = "Property Title";
    $labels[] = "Number of Units";
    $labels[] = "Estimate of Appraised Value";
    $labels[] = "Property Built Year";
    $labels[] = "Resident Type";
    $labels[] = "Property Title Held As";
    $labels[] = "Living Trust";
    $labels[] = "Creditor Name 1";
    $labels[] = "Creditor State 1";
    $labels[] = "Creditor Address 1";
    $labels[] = "Creditor Balance 1";
    $labels[] = "Creditor Account Number 1";
    $labels[] = "Creditor City 1";
    $labels[] = "Creditor ZipCode 1";
    $labels[] = "Creditor Name 2";
    $labels[] = "Creditor State 2";
    $labels[] = "Creditor Address 2";
    $labels[] = "Creditor Balance 2";
    $labels[] = "Creditor Account Number 2";
    $labels[] = "Creditor City 2";
    $labels[] = "Creditor ZipCode 2";
    $labels[] = "Creditor Name 3";
    $labels[] = "Creditor State 3";
    $labels[] = "Creditor Address 3";
    $labels[] = "Creditor Balance 3";
    $labels[] = "Creditor Account Number 3";
    $labels[] = "Creditor City 3";
    $labels[] = "Creditor ZipCode 3";
    $labels[] = "Non-Real Estate Debts";
    $labels[] = "Outstanding Judgements";
    $labels[] = "Co Outstanding Judgements";
    $labels[] = "Bankcruptcy";
    $labels[] = "Co Bankcruptcy";
    $labels[] = "Party to Lawsuit";
    $labels[] = "Co Party to Lawsuit";
    $labels[] = "Federal Debt";
    $labels[] = "Co Federal Debt";
    $labels[] = "Occupy as Primary Residence";
    $labels[] = "Co Occupy as Primary Residence";
    $labels[] = "Endorser";
    $labels[] = "Co Endorser";
    $labels[] = "US Citizen";
    $labels[] = "Co US Citizen";
    $labels[] = "Resident Alien";
    $labels[] = "Co Resident Alien";
    $labels[] = "Heard From";
    $labels[] = "Do not Furnish Information";
    $labels[] = "Ethinicity";
    $labels[] = "Race";
    $labels[] = "Gender";
    $labels[] = "Co Do not Furnish Information";
    $labels[] = "Co Ethinicity";
    $labels[] = "Co Race";
    $labels[] = "Co Gender";
    $labels[] = "Agree";
    $labels[] = "Date";
    return $labels;
}

function get_reverse_apps($page=1, $count=10, $returnCount=false, $where='', $orderby='`app_added` DESC, `app_fname` ASC', $select='*') {
    global $wpdb;

    $page = intval($page);
    if($page<1) $page = 1;
    $count = intval($count);
    $limitStart = ($page * $count) - $count;
    if($limitStart<0)   $limitStart = 0;
    $limit = "limit {$limitStart}, {$count}";
    if($count==-1)  $limit = "";
    if($where!='') {
        $where = "where {$where}";
    } else {
        $where = '';
    }
    if($orderby=='')    $orderby='`app_added` DESC, `app_fname` ASC';
    $orderby = "order by {$orderby}";
    if($select=='') $select = "*";

    if($returnCount) {
        $select = "count(app_id) as total";
        $limit = "";
    }

    $query = "select {$select} from {$wpdb->mortgageapp_reverse_tbl} {$where} {$orderby} {$limit}";
    $results = $wpdb->get_results($query);
    if($returnCount) {
        $record = $results[0];
        return $record->total;
    }
    return $results;
}

function get_reverse_app($id=0) {
    global $wpdb;

    $app = array();
    $id = intval($id);
    if($id>0) {
        $query = "select * from {$wpdb->mortgageapp_reverse_tbl} where `app_id`={$id} limit 1";
        $results = $wpdb->get_results($query);
        if(sizeof($results)>0) {
            $app = $results[0];
        }
    }
    return $app;
}

function is_valid_reverse_app($id=0) {
    global $wpdb;
    $valid = false;
    $id = intval($id);
    $query = "select app_id as id from {$wpdb->mortgageapp_reverse_tbl} where `app_id`={$id}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $record = $results[0];
        $id = $record->id;
        if($id>0)   $valid = true;
    }
    return $valid;
}

function delete_reverse_app($id=0) {
    global $wpdb;
    $id = intval($id);
    if($id>0) {
        $query = "delete from {$wpdb->mortgageapp_reverse_tbl} where `app_id`={$id}";
        $wpdb->query($query);
    }
}

function show_reverse_app_details($id=0) {
    $app = get_reverse_app($id);
    unset($app->app_id);
?>
<table class="wide-fat" border="0" cellspacing="0" cellpadding="10" style="font-size:14px;">
    <?php
    $count = 0;
    $labels = mortgageapp_reverse_labels();
    foreach($app as $val) {
?>
    <tr>
        <th align="right"><?php echo $labels[$count]; ?>:</th>
        <td><?php echo $val; ?></td>
    </tr>
<?php
        $count++;
    }
?>
</table>
<a href="javascript:history.go(-1);">Go Back</a>
<?php
}

function export_reverse_apps() {
    global $paged, $wpdb;

    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;
    $use_page = ((isset($_GET["paged"]) && $_GET["paged"]!='') ? true : false);
    $start = 0;
    $count = MORTGAGEAPPS_PER_PAGE;
    $limit = '';
    if($use_page) {
        $start = ($page * $count) - $count;
        if($start<0)    $start = 0;
        $limit = "limit {$start}, {$count}";
    }
    if($app_id>0) {
        $where = "where app_id={$app_id}";
        $limit = "limit 0, 1";
    }
    else {
        if(isset($_GET["q"]) && $_GET["q"]!='')
            $where = "where (`app_fname` like '%{$_GET["q"]}%' or `app_lname` like '%{$_GET["q"]}%' or `app_email` like '%{$_GET["q"]}%')";
        else
            $where = '';
    }
    $query = "select * from {$wpdb->mortgageapp_reverse_tbl} {$where} order by `app_added` DESC {$limit}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $csvExport = new CSVExport();

        //  Get Labels
        $labels = mortgageapp_reverse_labels();

        //  Add Data Start
        $csvExport->openRow();
        foreach($labels as $label) {
            $csvExport->addData($label);
        }
        $csvExport->closeRow();
        foreach($results as $app) {
            $csvExport->openRow();
            foreach($app as $key=>$val) {
                if($key!='app_id')  $csvExport->addData($val);
            }
            $csvExport->closeRow();
        }
        //  Add Data End

        $csvExport->downloadFile("mortgageapp_reverse_export_" . time());
    }
}

function mortgagestat_reverse_admin_init() {
    if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"]=="export") {
        export_reverse_apps();
    }

    global $paged;
    $redirect = false;
    $action = (isset($_GET["action"])) ? $_GET["action"] : "";
    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;

    $msg = "";
    $pagedata = "page=mortgagestat_reverse";
    $invalidId = false;
    if($action!="" && $action=="view" && !is_valid_reverse_app($app_id)) {
        $invalidId = true;
    }
    if($invalidId) {
        $redirect = true;
        $msg = "invalidId";
    } else {
        if($action=="delete") {
            $msg = "deleted";
            $redirect = true;
            delete_reverse_app($app_id);
        }
    }
    if($action=="view") {
        $pagenumdata = "";
    } else {
        $pagenumdata = "&paged={$paged}";
    }

    if($redirect)   wp_redirect(admin_url() . "admin.php?{$pagedata}&msg={$msg}");
}

function mortgageapp_step_labels() {
    $labels = array();
    $labels[] = "Borrower";
    $labels[] = "Co Borrower";
    $labels[] = "Loan Type";
    $labels[] = "Loan Purpose";
    $labels[] = "Residence Type";
    $labels[] = "Property Type";
    $labels[] = "Payment Term";
    $labels[] = "Number of Units";
    $labels[] = "Loan Amount";
    $labels[] = "Amortization Type";
    $labels[] = "Interest Rate";
    $labels[] = "Sales Price";
    $labels[] = "Property Address";
    $labels[] = "Property City";
    $labels[] = "Property State";
    $labels[] = "Property ZipCode";
    $labels[] = "First Name";
    $labels[] = "Last Name";
    $labels[] = "Address";
    $labels[] = "City";
    $labels[] = "State";
    $labels[] = "ZipCode";
    $labels[] = "Phone";
    $labels[] = "Phone 2";
    $labels[] = "Email";
    $labels[] = "Social Security Number";
    $labels[] = "Own - Rent";
    $labels[] = "Years at Present Address";
    $labels[] = "Date of Birth";
    $labels[] = "Years of Schooling";
    $labels[] = "Dependents No.";
    $labels[] = "Mail Street Address";
    $labels[] = "Mail City";
    $labels[] = "Mail State";
    $labels[] = "Mail ZipCode";
    $labels[] = "Co First Name";
    $labels[] = "Co Last Name";
    $labels[] = "Co Address";
    $labels[] = "Co City";
    $labels[] = "Co State";
    $labels[] = "Co ZipCode";
    $labels[] = "Co Phone";
    $labels[] = "Co Phone 2";
    $labels[] = "Co Email";
    $labels[] = "Co Social Security Number";
    $labels[] = "Co Own - Rent";
    $labels[] = "Co Years at Present Address";
    $labels[] = "Co Date of Birth";
    $labels[] = "Co Years of Schooling";
    $labels[] = "Co Dependents No.";
    $labels[] = "Agree";
    $labels[] = "Co Agree";
    $labels[] = "Employer Name";
    $labels[] = "Employer Position";
    $labels[] = "Employer Address";
    $labels[] = "Employed";
    $labels[] = "Years Employed";
    $labels[] = "Employer City";
    $labels[] = "Employer State";
    $labels[] = "Employer ZipCode";
    $labels[] = "Years in Same Field";
    $labels[] = "Monthly Income before Taxes";
    $labels[] = "Other Income Source";
    $labels[] = "Monthly Amount Other Income";
    $labels[] = "Jointly";
    $labels[] = "Cash Dept Towards Puschase";
    $labels[] = "Cash Dept Amount";
    $labels[] = "Financial Institution 1";
    $labels[] = "Financial Institution Account Number 1";
    $labels[] = "Financial Institution Account Type 1";
    $labels[] = "Financial Institution Amount 1";
    $labels[] = "Financial Institution 2";
    $labels[] = "Financial Institution Account Number 2";
    $labels[] = "Financial Institution Account Type 2";
    $labels[] = "Financial Institution Amount 2";
    $labels[] = "Financial Institution 3";
    $labels[] = "Financial Institution Account Number 3";
    $labels[] = "Financial Institution Account Type 3";
    $labels[] = "Financial Institution Amount 3";
    $labels[] = "Retirement Account";
    $labels[] = "Retirement Account Number";
    $labels[] = "Retirement Amount";
    $labels[] = "Life Insurance";
    $labels[] = "Life Insurance Amount";
    $labels[] = "Real Estate Owned";
    $labels[] = "Real Estate Owned Value";
    $labels[] = "Business Owned";
    $labels[] = "Business Owned Value";
    $labels[] = "Automobiles Year 1";
    $labels[] = "Automobiles Make 1";
    $labels[] = "Automobiles Amount 1";
    $labels[] = "Automobiles Year 2";
    $labels[] = "Automobiles Make 2";
    $labels[] = "Automobiles Amount 2";
    $labels[] = "Automobiles Year 3";
    $labels[] = "Automobiles Make 3";
    $labels[] = "Automobiles Amount 3";
    $labels[] = "Other Assets Description 1";
    $labels[] = "Other Assets Amount 1";
    $labels[] = "Other Assets Description 2";
    $labels[] = "Other Assets Amount 2";
    $labels[] = "Other Assets Description 3";
    $labels[] = "Other Assets Amount 3";
    $labels[] = "Other Assets Description 4";
    $labels[] = "Other Assets Amount 4";
    $labels[] = "Rent Monthly Payment";
    $labels[] = "1st Mortgage Monthly Payment";
    $labels[] = "2nd Mortgage Monthly Payment";
    $labels[] = "Home Owners Ins. Mon. Pmt.";
    $labels[] = "Real Estate Taxes Mon. Pmt.";
    $labels[] = "Mortgage Ins. Mon. Pmt.";
    $labels[] = "Home Owners Assoc. Mon. Dues";
    $labels[] = "Mtg Balance";
    $labels[] = "2nd Mtg Balance";
    $labels[] = "Liability Type 1";
    $labels[] = "Liability Company 1";
    $labels[] = "Liability Account Number 1";
    $labels[] = "Liability Balance 1";
    $labels[] = "Liability Monthly Payment 1";
    $labels[] = "Liability Type 2";
    $labels[] = "Liability Company 2";
    $labels[] = "Liability Account Number 2";
    $labels[] = "Liability Balance 2";
    $labels[] = "Liability Monthly Payment 2";
    $labels[] = "Liability Type 3";
    $labels[] = "Liability Company 3";
    $labels[] = "Liability Account Number 3";
    $labels[] = "Liability Balance 3";
    $labels[] = "Liability Monthly Payment 3";
    $labels[] = "Liability Type 4";
    $labels[] = "Liability Company 4";
    $labels[] = "Liability Account Number 4";
    $labels[] = "Liability Balance 4";
    $labels[] = "Liability Monthly Payment 4";
    $labels[] = "Liability Type 5";
    $labels[] = "Liability Company 5";
    $labels[] = "Liability Account Number 5";
    $labels[] = "Liability Balance 5";
    $labels[] = "Liability Monthly Payment 5";
    $labels[] = "Liability Type 6";
    $labels[] = "Liability Company 6";
    $labels[] = "Liability Account Number 6";
    $labels[] = "Liability Balance 6";
    $labels[] = "Liability Monthly Payment 6";
    $labels[] = "Real Estate Address 1";
    $labels[] = "Real Estate City 1";
    $labels[] = "Real Estate State 1";
    $labels[] = "Real Estate ZipCode 1";
    $labels[] = "Real Estate Status 1";
    $labels[] = "Real Estate Type 1";
    $labels[] = "Real Estate Value 1";
    $labels[] = "Real Estate Mortgage 1";
    $labels[] = "Real Estate Rental Income 1";
    $labels[] = "Real Estate Mortgage Payments 1";
    $labels[] = "Real Estate Misc 1";
    $labels[] = "Real Estate Net Rental Income 1";
    $labels[] = "Real Estate Address 2";
    $labels[] = "Real Estate City 2";
    $labels[] = "Real Estate State 2";
    $labels[] = "Real Estate ZipCode 2";
    $labels[] = "Real Estate Status 2";
    $labels[] = "Real Estate Type 2";
    $labels[] = "Real Estate Value 2";
    $labels[] = "Real Estate Mortgage 2";
    $labels[] = "Real Estate Rental Income 2";
    $labels[] = "Real Estate Mortgage Payments 2";
    $labels[] = "Real Estate Misc 2";
    $labels[] = "Real Estate Net Rental Income 2";
    $labels[] = "Real Estate Address 3";
    $labels[] = "Real Estate City 3";
    $labels[] = "Real Estate State 3";
    $labels[] = "Real Estate ZipCode 3";
    $labels[] = "Real Estate Status 3";
    $labels[] = "Real Estate Type 3";
    $labels[] = "Real Estate Value 3";
    $labels[] = "Real Estate Mortgage 3";
    $labels[] = "Real Estate Rental Income 3";
    $labels[] = "Real Estate Mortgage Payments 3";
    $labels[] = "Real Estate Misc 3";
    $labels[] = "Real Estate Net Rental Income 3";
    $labels[] = "Alternate First Name 1";
    $labels[] = "Alternate Middle Name 1";
    $labels[] = "Alternate Last Name 1";
    $labels[] = "Alternate Creditor Name 1";
    $labels[] = "Alternate Account Number 1";
    $labels[] = "Alternate First Name 2";
    $labels[] = "Alternate Middle Name 2";
    $labels[] = "Alternate Last Name 2";
    $labels[] = "Alternate Creditor Name 2";
    $labels[] = "Alternate Account Number 2";
    $labels[] = "Alternate First Name 3";
    $labels[] = "Alternate Middle Name 3";
    $labels[] = "Alternate Last Name 3";
    $labels[] = "Alternate Creditor Name 3";
    $labels[] = "Alternate Account Number 3";
    $labels[] = "Outstanding Judgements";
    $labels[] = "Bankrupt in last 7 years";
    $labels[] = "Party to Lawsuit";
    $labels[] = "Forclosure";
    $labels[] = "Federal Debt";
    $labels[] = "Obligated";
    $labels[] = "Payment Borrowed";
    $labels[] = "Endorser";
    $labels[] = "US Citizen";
    $labels[] = "Resident Alien";
    $labels[] = "Occupy Property as Permanent Residence";
    $labels[] = "Ownership Interest in Property";
    $labels[] = "Ownership Property Type";
    $labels[] = "Ownership Hold Title to Home";
    $labels[] = "Explainations";
    $labels[] = "Do not Furnish Information";
    $labels[] = "Ethinicity";
    $labels[] = "Race";
    $labels[] = "Gender";
    $labels[] = "Marital Status";
    $labels[] = "Heard From";
    $labels[] = "Date";
    return $labels;
}

function get_step_apps($page=1, $count=10, $returnCount=false, $where='', $orderby='`app_added` DESC, `app_fname` ASC', $select='*') {
    global $wpdb;

    $page = intval($page);
    if($page<1) $page = 1;
    $count = intval($count);
    $limitStart = ($page * $count) - $count;
    if($limitStart<0)   $limitStart = 0;
    $limit = "limit {$limitStart}, {$count}";
    if($count==-1)  $limit = "";
    if($where!='') {
        $where = "where {$where}";
    } else {
        $where = '';
    }
    if($orderby=='')    $orderby='`app_added` DESC, `app_fname` ASC';
    $orderby = "order by {$orderby}";
    if($select=='') $select = "*";

    if($returnCount) {
        $select = "count(app_id) as total";
        $limit = "";
    }

    $query = "select {$select} from {$wpdb->mortgageapp_step_tbl} {$where} {$orderby} {$limit}";
    $results = $wpdb->get_results($query);
    if($returnCount) {
        $record = $results[0];
        return $record->total;
    }
    return $results;
}

function get_step_app($id=0) {
    global $wpdb;

    $app = array();
    $id = intval($id);
    if($id>0) {
        $query = "select * from {$wpdb->mortgageapp_step_tbl} where `app_id`={$id} limit 1";
        $results = $wpdb->get_results($query);
        if(sizeof($results)>0) {
            $app = $results[0];
        }
    }
    return $app;
}

function is_valid_step_app($id=0) {
    global $wpdb;
    $valid = false;
    $id = intval($id);
    $query = "select app_id as id from {$wpdb->mortgageapp_step_tbl} where `app_id`={$id}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $record = $results[0];
        $id = $record->id;
        if($id>0)   $valid = true;
    }
    return $valid;
}

function delete_step_app($id=0) {
    global $wpdb;
    $id = intval($id);
    if($id>0) {
        $query = "delete from {$wpdb->mortgageapp_step_tbl} where `app_id`={$id}";
        $wpdb->query($query);
    }
}

function show_step_app_details($id=0) {
    $app = get_step_app($id);
    unset($app->app_id);
?>
<table class="wide-fat" border="0" cellspacing="0" cellpadding="10" style="font-size:14px;">
    <?php
    $count = 0;
    $labels = mortgageapp_step_labels();
    foreach($app as $val) {
?>
    <tr>
        <th align="right"><?php echo $labels[$count]; ?>:</th>
        <td><?php echo $val; ?></td>
    </tr>
<?php
        $count++;
    }
?>
</table>
<a href="javascript:history.go(-1);">Go Back</a>
<?php
}

function export_step_apps() {
    global $paged, $wpdb;

    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;
    $use_page = ((isset($_GET["paged"]) && $_GET["paged"]!='') ? true : false);
    $start = 0;
    $count = MORTGAGEAPPS_PER_PAGE;
    $limit = '';
    if($use_page) {
        $start = ($page * $count) - $count;
        if($start<0)    $start = 0;
        $limit = "limit {$start}, {$count}";
    }
    if($app_id>0) {
        $where = "where app_id={$app_id}";
        $limit = "limit 0, 1";
    }
    else {
        if(isset($_GET["q"]) && $_GET["q"]!='')
            $where = "where (`app_fname` like '%{$_GET["q"]}%' or `app_lname` like '%{$_GET["q"]}%' or `app_email` like '%{$_GET["q"]}%')";
        else
            $where = '';
    }
    $query = "select * from {$wpdb->mortgageapp_step_tbl} {$where} order by `app_added` DESC {$limit}";
    $results = $wpdb->get_results($query);
    if(sizeof($results)>0) {
        $csvExport = new CSVExport();

        //  Get Labels
        $labels = mortgageapp_step_labels();

        //  Add Data Start
        $csvExport->openRow();
        foreach($labels as $label) {
            $csvExport->addData($label);
        }
        $csvExport->closeRow();
        foreach($results as $app) {
            $csvExport->openRow();
            foreach($app as $key=>$val) {
                if($key!='app_id')  $csvExport->addData($val);
            }
            $csvExport->closeRow();
        }
        //  Add Data End

        $csvExport->downloadFile("mortgageapp_step_export_" . time());
    }
}

function mortgagestat_step_admin_init() {
    if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"]=="export") {
        export_step_apps();
    }

    global $paged;
    $redirect = false;
    $action = (isset($_GET["action"])) ? $_GET["action"] : "";
    $app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;

    $msg = "";
    $pagedata = "page=mortgagestat_step";
    $invalidId = false;
    if($action!="" && $action=="view" && !is_valid_step_app($app_id)) {
        $invalidId = true;
    }
    if($invalidId) {
        $redirect = true;
        $msg = "invalidId";
    } else {
        if($action=="delete") {
            $msg = "deleted";
            $redirect = true;
            delete_step_app($app_id);
        }
    }
    if($action=="view") {
        $pagenumdata = "";
    } else {
        $pagenumdata = "&paged={$paged}";
    }

    if($redirect)   wp_redirect(admin_url() . "admin.php?{$pagedata}&msg={$msg}");
}
?>