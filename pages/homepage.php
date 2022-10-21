<?php
require_once('./../services/functions/securecheck.php');
require_once('./../services/functions/poll_all.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php') ?>
  <div class="container">
    <div class="row mt-5">
      <div class="col-3"></div>
      <div class="col-6">
        <?php
        include("./components/error.php");

        ?>
        <?php if ($result_fetch_poll) {
          foreach ($result_fetch_poll as $poll) {
            $myid = $_SESSION['userid'];
            $pollidforcount = $poll['0'];
            $query_count_poll_vote = "SELECT COUNT(pollvote_id) FROM polls_vote WHERE pollvote_own = $pollidforcount";
            $result_count_poll_vote = mysqli_query($conn, $query_count_poll_vote);
            $result_fetch_count = mysqli_fetch_assoc($result_count_poll_vote);

            $query_check_poll = "SELECT * FROM polls_vote WHERE pollvote_own = $pollidforcount AND pollvote_idown = $myid";
            $result_check_poll = mysqli_query($conn, $query_check_poll);
        ?>
        <div class="card mb-5">
          <div class="card-header"><?= $poll['2'] ?></div>
          <div class="card-body">
            <p class="card-text"><?= $poll['3'] ?></p>
            <div class="row row-cols-2">
              <?php if (mysqli_num_rows($result_check_poll) !== 0) { ?>
              <a href="./../services/unvotepoll.php?pollid=<?= $poll['0'] ?>" class="btn btn-danger">Vote</a>
              <?php  } else { ?>
              <a href="./../services/votepoll.php?pollid=<?= $poll['0'] ?>" class="btn btn-primary">Vote</a>
              <?php } ?>
              <h3>จำนวน Vote : <?= $result_fetch_count['COUNT(pollvote_id)'] ?></h3>
            </div>
          </div>
        </div>
        <?php }
        } ?>
      </div>
      <div class="col-3"></div>
    </div>
  </div>
</body>

</html>