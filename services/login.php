<?php
include('./connect.php');
session_start();

if (isset($_POST['submit'])) {
  $username  = $_POST['username'];
  $password =  $_POST['password'];

  $query_check = "SELECT * FROM users WHERE user_name = '$username' AND user_password = '$password'";
  $result = mysqli_query($conn, $query_check);
  $result_fetch = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) === 0) {
    $_SESSION['error'] = "Username and Password is wrong";
    header('location:./../pages/login.php');
  } else {
    $_SESSION['userid'] = $result_fetch['user_id'];
    $_SESSION['username'] = $result_fetch['user_name'];
    header('location:./../pages/homepage.php');
  }
}