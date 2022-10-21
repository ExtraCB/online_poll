<?php
require_once('./../services/connect.php');
$pollidforcount = $poll['0'];
$query_count_poll_vote = "SELECT COUNT(pollvote_id) FROM polls_vote WHERE pollvote_own = $pollidforcount";

$result_count_poll_vote = mysqli_query($conn, $query_count_poll_vote);
$result_fetch_count = mysqli_fetch_assoc($result_count_poll_vote);