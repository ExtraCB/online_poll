<?php
require_once("./../services/connect.php");
$userid = $_SESSION['userid'];
$query_poll = "SELECT * FROM polls WHERE poll_own = '$userid'";
$result_poll = mysqli_query($conn, $query_poll);
$result_fetch_poll = mysqli_fetch_all($result_poll);