<?php

include_once "teachinglib.php";

$t = $_GET['test'];

$sqlquery = "SELECT Username FROM LoginMember WHERE Username=\"$t\";";
$results = $resdbConn->query($sqlquery);
$row = $results->fetch_array();

if (sizeof($row) > 0) {
    print_r($row);
}
else {
    echo "failed";
}

?>
