<?php
include('./connect.php');
session_start();

if (isset($_GET['pollid'])) {
  $pollid = $_GET['pollid'];
  $userid = $_SESSION['userid'];


  $query_insert  = "DELETE FROM `polls_vote` WHERE `pollvote_own` = $pollid AND `pollvote_idown` = $userid";

  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = 'ยกเลิก vote สำเร็จ !';
  header('location:./../pages/homepage.php');
}