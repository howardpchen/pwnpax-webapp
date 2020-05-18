<?php 
error_reporting(E_ALL); 
include_once "teachinglib.php"; 
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="<?php echo $URL_root; ?>css/jquery-ui.css" />
<link href="<?php echo $URL_root; ?>css/chardinjs.css" rel="stylesheet">
<script src="<?php echo $URL_root; ?>js/jquery-1.9.1.js"></script>
<script src="<?php echo $URL_root; ?>js/jquery-ui.js"></script>
<script src="<?php echo $URL_root; ?>js/highcharts.js"></script>
<script src="<?php echo $URL_root; ?>js/collapseTable.js"></script>
<script type='text/javascript' src="<?php echo $URL_root; ?>js/chardinjs.min.js"></script>
<Title>Teaching Files - Home</title>
</head>
<?php include "header.php"; ?>

<H2> Welcome to Our Teaching File </H2>
<!-- Under construction -->


<FORM METHOD="GET" ACTION=""><SELECT NAME="cat" onchange='forms[0].submit()'>
<OPTION>Select a case type</OPTION>

<?php
$sqlquery = "SELECT DISTINCT category FROM teachingfiledata;";
try {
    $results = $resdbConn->query($sqlquery);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
while ($row = $results->fetch()) {
    echo ("<OPTION>" . $row['category'] . "</OPTION>");
}
?>
</SELECT></FORM>

<?php
$host = $_SERVER['SERVER_ADDR'].":8042";

if (isset($_GET['cat'])) $category = $_GET['cat'];
else $category = null;

if ($category) {
    tableStartSection("Case Selector");
    echo ("<H1>$category</H1>");
    $sqlquery = "SELECT * FROM teachingfiledata WHERE category='$category' ORDER BY description;";
    try {
        $results = $resdbConn->query($sqlquery);
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
    while ($row = $results->fetch()) {
        $desc = $row['description'];
        $uuid = $row['caseuuid'];
        echo "<LI><a href='#' onclick='document.getElementById(\"viewer\").src=\"http://$host/app/explorer.html#study?uuid=$uuid\";'>$desc</a></LI>";
    }
tableEndSection();
tableStartSection("DICOM Viewer");

echo <<< EOF

<div class="12u">
    <iframe id='viewer' src="defaultviewer.html" width="100%" height="720" marginwidth="0" marginheight="0" frameborder="no" scrolling="yes" style="border-width:2px; border-color:#333; background:#FFF; border-style:solid;">
    </iframe>
    </div>

EOF;
}


?>

<?php
if ($category) tableEndSection();
?>


<center>Good job for making this far! pwnpax{5a593a7f-ec85-44e0-9c0d-8a01022c3066}</center>
<p align=center><?php echo $inclusionNote ?></p>
<p align=center><A HREF="logout.php">Log Out</A></P></div>

<?php include "footer.php"; ob_end_flush(); ?>
