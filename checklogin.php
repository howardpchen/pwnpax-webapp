<?php 
include_once "teachinglib.php";
session_start();
error_reporting(E_ALL);
?>

<html>
<head>
<link rel="stylesheet" href="<?php echo $URL_root; ?>css/jquery-ui.css" />
<script src="<?php echo $URL_root; ?>js/jquery-1.9.1.js"></script>
<script src="<?php echo $URL_root; ?>js/jquery-ui.js"></script>
</head>
<?php

function login($user, $password) {
    global $resdbConn;
    return passwordAccepted($password, $user, $resdbConn);
}


function passwordAccepted($password, $username, $database) {
    $myhash = hash("sha256", $password);
    /* 
     * Problem: Unescaped strings allowing SQL injection.
     * Better Practice: Parameterize values which will automatically escape strings.
     *
     *  $sqlquery = $database->prepare("SELECT COUNT(*) as count FROM loginmember WHERE passwordhash=? AND username=?");
     *  $sqlquery->bind_param("ss", $myhash, $username);
     *  $sqlquery->execute();
     *  $results = $sqlquery->get_result();
     */

    $sqlquery = "SELECT COUNT(*) as count FROM loginmember WHERE passwordhash='$myhash' AND username='$username';";
    try {
        $results = $database->query($sqlquery);
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    $row = $results->fetch();
    if ($row['count'] > 0) {
        return true;
    }
    return false;

}

function gettraineeid($username, $database) {
    global $USE_LDAP;

    $sqlquery = "SELECT traineeid FROM loginmember WHERE username='$username';";
    $results = $database->query($sqlquery);
    $row = $results->fetch();
    return $row['traineeid'];
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
        $id = gettraineeid($myusername, $resdbConn);
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
