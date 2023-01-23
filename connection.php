<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "meetingdb";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("Failed to connect to database");
};