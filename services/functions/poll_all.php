<?php
require_once("./../services/connect.php");
$query_poll = "SELECT * FROM polls";
$result_poll = mysqli_query($conn, $query_poll);
$result_fetch_poll = mysqli_fetch_all($result_poll);