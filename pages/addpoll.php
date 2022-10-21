<?php
require_once("./../services/connect.php");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query_delete = "DELETE FROM polls WHERE poll_id = $id";
  mysqli_query($conn, $query_delete);
  $_SESSION['success'] = "ลบสำเร็จ !";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add poll</title>
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
        session_start();
        include("./components/error.php");
        require_once("./../services/functions/poll_myself.php");

        ?>
        <h3>Add Poll</h3>
        <form action="./../services/addpoll.php" method="post">
          <div class="input-group mb-3">
            <span for="" class="input-group-text">Poll title</span>
            <input type="text" name="poll_title" class="form-control" id="">
          </div>
          <div class="input-group mb-3">
            <span for="" class="input-group-text">Poll content</span>
            <input type="text" name="poll_content" class="form-control" id="">
          </div>
          <div class="input-group mb-3">
            <input type="submit" class="btn btn-outline-primary" name="submit" value="submit">
          </div>
        </form>
      </div>
      <div class="col-3"></div>
    </div>
    <div class="row mt-5">
      <div class="col-3"></div>
      <div class="col-6">
        <table class="table hover">
          <tr>
            <th>รหัส Poll</th>
            <th>Poll title</th>
            <th>Poll Content</th>
            <th>Poll timestamp</th>
            <th>Poll Action</th>
          </tr>
          <?php if ($result_fetch_poll) {
            foreach ($result_fetch_poll as $poll) {
          ?>
          <tr>
            <td><?= $poll['0'] ?></td>
            <td><?= $poll['1'] ?></td>
            <td><?= $poll['2'] ?></td>
            <td><?= $poll['5'] ?></td>
            <td><a href="./addpoll.php?id=<?= $poll['0'] ?>" class="btn btn-outline-primary">Delete</a></td>
          </tr>
          <?php }
          } ?>
        </table>
      </div>
      <div class="col-3"></div>
    </div>
  </div>
</body>

</html>