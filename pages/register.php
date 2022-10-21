<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-3"></div>
      <div class="col-6">
        <?php
        session_start();
        include("./components/error.php");
        ?>
        <h3>Register</h3>
        <form action="./../services/register.php" method="post">
          <div class="input-group mb-3">
            <span for="" class="input-group-text">Username</span>
            <input type="text" name="username" class="form-control" id="">
          </div>
          <div class="input-group mb-3">
            <span for="" class="input-group-text">Password</span>
            <input type="text" name="password" class="form-control" id="">
          </div>
          <div class="input-group mb-3">
            <span for="" class="input-group-text">Password Confirm</span>
            <input type="text" name="password-confirm" class="form-control" id="">
          </div>
          <div class="input-group mb-3">
            <input type="submit" class="btn btn-outline-primary" name="submit" value="submit">
            <a href="./../pages/login.php" class="mx-3">มีสมาชิกอยู่แล้ว</a>
          </div>
        </form>
      </div>
      <div class="col-3"></div>
    </div>
  </div>
</body>

</html>