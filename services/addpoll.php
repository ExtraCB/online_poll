<?php
include('./connect.php');
session_start();


if (isset($_POST['submit'])) {
  $ownid = $_SESSION['userid'];
  $poll_title = $_POST['poll_title'];
  $poll_content = $_POST['poll_content'];


  $query_insert = "INSERT INTO polls (poll_title,poll_content,poll_own) VALUES ('$poll_title','$poll_content','$ownid')";

  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = "เพิ่ม Poll สำเร็จ !";
  header('location:./../pages/addpoll.php');
}