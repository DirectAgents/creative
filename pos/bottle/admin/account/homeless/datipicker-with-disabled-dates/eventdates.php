<?php

require_once '../../../config.php';
require_once '../../../config.inc.php';

$sql = mysqli_query("SELECT * FROM `events`");

while ($row = mysqli_fetch_array($sql)) {
    echo "var selDate" . $row['event_ID'] . " = '" . $row['date'] . "';";
    echo "if (dt === selDate" . $row['event_ID'] . ") {";
    echo "return [true, 'Highlighted'];";
    echo "}";
}
?>