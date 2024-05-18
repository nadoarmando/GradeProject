<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbNmae = "grade-data";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbNmae);
if(!$conn)
{
    die("something went wrong");
}
