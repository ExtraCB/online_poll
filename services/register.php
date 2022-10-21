<?php
include('./connect.php');
session_start();

if (isset($_POST['submit'])) {
  $username  = $_POST['username'];
  $password =  $_POST['password'];
  $password_confirm = $_POST['password-confirm'];

  if ($password !== $password_confirm) {
    $_SESSION['error'] = "รหัสผ่านกับรหัสผ่านยืนยันไม่ตรงกัน !";
    header('location:./../pages/register.php');
  } else {

    $query_check = "SELECT * FROM users WHERE user_name = '$username'";
    $result = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result) != 0) {
      $_SESSION['error'] = "username already exits <a href='./../pages/login.php'>Login</a> !";
      header('location:./../pages/register.php');
    } else {
      $query_insert = "INSERT INTO users (user_name,user_password) VALUES ('$username','$password')";
      mysqli_query($conn, $query_insert);
      $_SESSION['success'] = "register success";
      header('location:./../pages/register.php');
    }
  }
}