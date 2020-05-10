<?php

include_once "teachinglib.php";

$t = $_GET['test'];

try {
    $sqlquery = "SELECT username FROM loginmember WHERE username=\"$t\";";
    $results = $resdbConn->query($sqlquery);
    $row = $results->fetch();
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

if (sizeof($row) > 0) {
    print_r($row);
}
else {
    echo "failed";
}

?>
