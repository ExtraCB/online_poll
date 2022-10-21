<?php
$localhost  = 'localhost';
$username = "root";
$password = "";
$dbname = "poll_online";

$conn = mysqli_connect($localhost, $username, $password, $dbname) or die("Error 405");


if (!$conn) {
  die("Connect failed" . mysqli_connect_error());
} else {
  // echo "connect success";
}