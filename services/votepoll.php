<?php
include('./connect.php');
session_start();

if (isset($_GET['pollid'])) {
  $pollid = $_GET['pollid'];
  $userid = $_SESSION['userid'];


  $query_insert  = "INSERT INTO polls_vote (pollvote_own,pollvote_idown) VALUES ($pollid,$userid)";

  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = 'vote สำเร็จ !';
  header('location:./../pages/homepage.php');
}