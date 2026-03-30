
<?php
include "config/koneksi.php";
session_start();
include "config/koneksi.php";

if (isset($_POST['Username'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    if (empty($Username) || empty($Password)) {
        $error = "Data Tidak Boleh kosong";
    } else {
        $query = "SELECT * FROM users WHERE Username='$Username' AND Password='$Password'";
        $result = mysqli_query($koneksi, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_array($result);

            // 🔥 SEMUA HURUF KECIL
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['Role'] = $user['Role'];

            echo "<script>window.location='index.php';</script>";
            exit;
        } else {
            $error = "Login gagal";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- FIX LINK -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <!-- ERROR -->
      <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php } ?>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="Username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="Password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>

      </form>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
