<?php

//include db configuration file
include_once("../../../config.php");

mysqli_query($connecDB,"DELETE FROM tbl_startup_project WHERE ProjectID = '86935' AND Industry_Interest IN ('Startups')")


  
?>
