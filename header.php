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
session_start();
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

if(!isset($_SESSION['username'])) {
    header("location:/teaching/");
}

include "header_nosession.php";
?>


