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

/**************************************
System-Wide Configurations
 **************************************/

$log_flag = True; // set to false to disable logging.

$timezone_string = 'America/New_York';  // Standard timezone string.
date_default_timezone_set($timezone_string);

$file_root = "/var/www/html/teaching/";  // the local file path
$URL_root = "/teaching/";  // With trailing slash (/)


// This is the PwnPax Database information
// TODY: Add flag/pts for getting access to this source code - it contains
// full read/write access to the 'teaching' database!
$db_host = 'localhost';
$db_username = 'teaching';
$db_passwd = '1$This@strongP@ssword?'; // Yes, but it's also in plain text.
$db_database = 'teaching';



// Theme colors.
$schemaColor[0] = '#000072';          // Darkest
$schemaColor[1] = '#CCDDFF';          // Table Headers
$schemaColor[2] = '#F0F0F7';          //Table background

// Graph colors based on section.
$graphColor['CHEST'] = '#088DC7';
$graphColor['BODY'] = '#50B432';
$graphColor['MSK'] = '#ED561B';
$graphColor['NEURO'] = '#24CBFF';
$graphColor['BREAST'] = '#EE3399';
$graphColor['BABY'] = '#FFF263';
$graphColor['CVI'] = '#6AF999';
$graphColor['IR'] = '#AA0000';
$graphColor['GI'] = '#008888';
$graphColor['GU'] = '#880088';
$graphColor['SPINE'] = '#8888CC';

// Dictionary to change shorthand codes to human-friendly text.
$replaceDict = [ 
    "CHEST" => "Chest", 
    "BODY" => "Body",
    "BABY" => "Babygram",
    "NEURO" => "Neuro",
    "CR" => "Radiography",
    "CT" => "Computed Tomography",
    "CTA" => "CT Angiography",
    "DEXA" => "Dual-Energy X-Ray Absorptiometry",
    "FLUO" => "Fluoroscopy",
    "FMRI" => "fMRI",
    "BREAST" => "Breast",
    "MAMMO" => "Mammography",
    "MR" => "Magnetic Resonance Imaging",
    "MRA" => "MR Angiography",
    "MRV" => "MR Venography",
    "NM" => "Nuclear Medicine",
    "PETCT" => "PET/CT",
    "PET" => "PET (without CT)",
    "PROCED" => "Procedures",
    "SPECT" => "SPECT",
    "SPINE" => "Spine (Neuro or MSK)",
    "US" => "Ultrasound", 
    "SCINT" =>"Scintigraphy",
    "MISC" => "Miscellaneous"
    ];

// This text is included in login_success.php
$inclusionNote = "PWNPAX is designed for learning purposes only. Do not deploy in production.";

// This sets the default type and Section to display under statistics.php
$statisticsDefault = array();
$statisticsDefault['Type'] = 'CHEST';
$statisticsDefault['Section'] = 'CR';
$statisticsDefault['Notes'] = '';

?>
