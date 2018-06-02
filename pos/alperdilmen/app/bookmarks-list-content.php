

<?php

 session_start();
 require_once 'class.entrepreneur.php';
 require_once 'class.investor.php';
 require_once 'base_path.php';
 include_once("config.php"); 


//if($_POST){


$sql_bookmarks = mysqli_query($connecDB,"SELECT * FROM tbl_bookmarks WHERE requester_id = '".$_SESSION['entrepreneurSession']."' AND Type = 'INVESTOR' ORDER BY id DESC");
//$row = mysqli_fetch_array($sql);

//echo $_GET['userid'];
//echo $row['id'];
 ?>



<!DOCTYPE html>
<html>
<head>
    <title></title>

 <!-- Footable CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/footable.core.css" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/bootstrap-select.min.css" rel="stylesheet" />
      
        

        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

</head>
<body>



     

<table id="demo-foo-addrow" class="table m-t-30 table-hover bookmarks-list" data-page-size="10">


        <thead>
            <tr>
                
                <th>INVESTOR</th>
                <th>LOCATION</th>
                <th>INDUSTRY</th>
                <td>MANAGE</td>
            </tr>
        </thead>
   
    <tbody>
        
        <tr class="advance-table-row connections-tab-inside">
            
            <td>
               
                 test
            </td>
            
            <td>
              test2
            </td>
            <td>
               test3
            </td>
            <td>
                <button type="button" id="bookmark-delete-<?php echo $row_bookmarks['requested_id']; ?>" data-requested-id="<?php echo $row_bookmarks['requested_id']; ?>" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-trash"></i></button>
            </td>
        </tr>
       
       
        </tr>
    </tbody>
   </table> 


   <!-- Footable -->
    <script src="<?php echo BASE_PATH; ?>/js/footable.all.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/bootstrap-select.min.js" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="<?php echo BASE_PATH; ?>/js/footable-init.js"></script>





<?php //} ?>    