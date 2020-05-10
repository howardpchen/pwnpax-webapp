<?php include_once "teachinglib.php"; ?>

<html>
<head>
<link rel="stylesheet" href="<?php echo $URL_root; ?>css/jquery-ui.css" />
<script src="<?php echo $URL_root; ?>js/jquery-1.9.1.js"></script>
<script src="<?php echo $URL_root; ?>js/jquery-ui.js"></script>
</head>
<?php
session_start();
error_reporting(E_ALL);
$db = new mysqli($mysql_host, $mysql_username, $mysql_passwd, $mysql_database);
if (mysqli_connect_errno($db)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 

function login($user, $password) {
    global $db;
    return passwordAccepted($password, $user, $db);
}


function passwordAccepted($password, $username, $database) {
    $myhash = hash("sha256", $password);
    /* 
     * Problem: Unescaped strings allowing SQL injection.
     * Better Practice: Parameterize values which will automatically escape strings.
     *
     *  $sqlquery = $database->prepare("SELECT COUNT(*) as count FROM LoginMember WHERE PasswordHash=? AND Username=?");
     *  $sqlquery->bind_param("ss", $myhash, $username);
     *  $sqlquery->execute();
     *  $results = $sqlquery->get_result();
     */

    $sqlquery = "SELECT COUNT(*) as count FROM LoginMember WHERE PasswordHash=\"$myhash\" AND Username=\"$username\";";
    $results = $database->query($sqlquery);
    if( !$results ) {
        echo $database->error;
        return false;
    }
    $row = $results->fetch_array();
    if ($row['count'] > 0) {
        return true;
    }
    return false;

}

function getTraineeID($username, $database) {
    global $USE_LDAP;

    $sqlquery = "SELECT TraineeID FROM LoginMember WHERE Username=\"$username\";";
    $results = $database->query($sqlquery);
    $row = $results->fetch_array();
    return $row['TraineeID'];
}

if (!isset($_POST['myusername']) || !isset($_POST['mypassword']))  {
    header ("location:index.php");
}
else {
// username and password sent from form 
    $myusername = "";
    $mypassword = "";
    if (isset($_POST['myusername']) && isset($_POST['mypassword'])) {
        $myusername= $_POST['myusername'];
        $mypassword=$_POST['mypassword']; 
    }
    
    $success = login($myusername, $mypassword);
    if ($success) {
        $id = getTraineeID($myusername, $db);
        $_SESSION['username'] = $myusername;
        $_SESSION['traineeid'] = $id;
    	header("location:login_success.php");
    } else {
        include "header_nosession.php";
        echo "Login failed.";
        session_destroy();
    }
}


ob_end_flush();
?>

<P>
<a href="./">Try Again</a>
<?php
include "footer.php";
ob_end_flush();
?>
</BODY>
</HTML>
