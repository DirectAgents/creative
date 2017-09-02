<?php


require_once '../../../config.php';
require_once '../../../config.inc.php';

if (isset($_POST['selectedData'])) {
    $sql2 = mysqli_query("SELECT * FROM `events` WHERE `date`='{$_POST['selectedData']}'");
    $row2 = mysqli_fetch_array($sql2);
    if ($row2['date'] == $_POST['selectedData']) {
        $sql = mysqli_query("SELECT * FROM `events` WHERE `date`='{$_POST['selectedData']}'");
        while ($row = mysqli_fetch_array($sql)) {
            $data = array(
                "date" => $row['date'],
                "event" => utf8_encode($row['event'])
            );
            echo json_encode($data);
        }
    } else {
        $data = array(
            "none" => "Inget event denna dag!"
        );
        echo json_encode($data);
    }
}

?>