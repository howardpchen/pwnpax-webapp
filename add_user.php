<?php
/*
    Vulnerable Testing Server for Imaging Informatics (PwnPax)
    This application is designed to be intentionally vulnerable to
    cybersecurity attacks for educational purposes.  
    DO NOT DEPLOY IN PRODUCTION

    Copyright (C) 2020 (Howard) Po-Hao Chen

    Based on Capricorn - Open-source analytics tool for radiology residents.
    https://github.com/howardpchen/capricorn

    PwnPax is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

$mypassword = $_GET['mypassword'];
$mypasswordhash = password_hash($mypassword, PASSWORD_DEFAULT);
if (isset($_GET['mypassword'])) {
  echo $mypassword;
  echo "<br>";
  echo $mypasswordhash;
}
else {
echo <<< EOF
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>There's nothing here.  Don't bother looking.</p>
</body></html>
EOF;
}

?>
