<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "butopia";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if ($conn) {
} else {
    die("Database Connection Failed");
};
