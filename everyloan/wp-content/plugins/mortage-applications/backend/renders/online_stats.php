<?php
global $paged;

//  Per Page
$per_page = MORTGAGEAPPS_PER_PAGE;

//  Get Action
$action = (isset($_GET["action"])) ? strtolower($_GET["action"]) : false;

//  Validate Action
if($action!='view' && $action!='delete')    $action = false;

//  Get ID
$app_id = (isset($_GET["app_id"])) ? intval($_GET["app_id"]) : 0;

//  Check if Action Available
if(!$action) {

    //  Where
    $where = array();

    if(isset($_GET["q"]) && $_GET["q"]!='') $where[] = "(`app_fname` like '%{$_GET["q"]}%' or `app_lname` like '%{$_GET["q"]}%' or `app_email` like '%{$_GET["q"]}%')";
    $where = implode(" and ", $where);

    //  Get Apps Total
    $apps_total = get_online_apps($paged, $per_page, true, $where);

    //  Get Apps
    $apps = get_online_apps($paged, $per_page, false, $where);

    //  Check fo Msg & Type
    $msg_type = "success";
    $msg = (isset($_GET["msg"]) && $_GET["msg"]!="") ? $_GET["msg"] : "";

    //  Switch Msg
    switch(strtolower($msg)) {
        case "deleted":
            $msg = "Application Successfully Deleted";
            break;
        case "invalidid":
            $msg_type = "error";
            $msg = "Invalid Application ID";
            break;
        default:
            $msg = "";
            break;
    }

    //  Check Msg
    if($msg!="") {
        echo "<p class=\"output-msg output-msg-{$msg_type}\">{$msg}</p>";
    }

    //  Get Pagination
    $pagination = dirlistings_admin_pagination_format($apps_total, $paged, $per_page, admin_url() . "admin.php?page=mortgagestat_online&" . ((isset($_GET["q"]) && $_GET["q"]!='') ? "q=" . $_GET["q"] . "&" : "") . "paged=%s");
?>

<div class="table-nav">
    <div class="tablenav-pages">
        <span class="pagination-links apps-paginations">
            <?php echo $pagination; ?><br/><br/>
        </span>
    </div>
</div>

<table class="wp-list-table widefat fixed">
<thead>
    <tr>
        <th width="5%">S.N.</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Date</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th width="5%">S.N.</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Date</th>
    </tr>
</tfoot>
<tbody>
    <?php
    if(sizeof($apps)>0) {
        $count = 0;
        $classes = array("alternate", "");
        foreach($apps as $app) {
            $rowClass = $classes[$count%2];
    ?>
    <tr class="<?php echo $rowClass; ?>">
        <td><?php echo intval($count + 1); ?>.</td>
        <td>
            <?php echo $app->app_fname . " " . $app->app_lname; ?>
            <div class="row-actions">
                <span class="view">
                    <a href="<?php echo admin_url() . "admin.php?page=mortgagestat_online&action=view&app_id=" . $app->app_id; ?>" title="View Application Details">View Details</a> |
                </span>
                <span class="view">
                    <a href="<?php echo admin_url() . "admin.php?page=mortgagestat_online&action=export&app_id=" . $app->app_id; ?>" title="Export Application to CSV" target="_blank">Export</a> |
                </span>
                <span class="trash">
                    <a href="<?php echo admin_url() . "admin.php?page=mortgagestat_online&action=delete&app_id=" . $app->app_id; ?>" title="Delete Application" onclick="return confirm('Are you sure to delete this application?');">Delete</a>
                </span>
            </div>
        </td>
        <td><?php echo $app->app_email; ?></td>
        <td><?php echo $app->app_added; ?></td>
    </tr>
    <?php
            $count++;
        }
    } else {
    ?>
    <tr>
        <td colspan="4" align="center"><em>No Applications Found</em><div class="row-actions"></div></td>
    </tr>
    <?php
    }
    ?>
</tbody>
</table>

<br/>
<div class="table-nav">
    <div class="tablenav-pages">
        <span class="pagination-links apps-paginations">
            <?php echo $pagination; ?><br/><br/>
        </span>
    </div>
</div>

<?php
} else {

    //  Check if View
    if($action=="view") {
        show_online_app_details($app_id);
    }
}
?>