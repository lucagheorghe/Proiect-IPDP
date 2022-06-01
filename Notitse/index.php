<?php
session_start();
include 'includes.php';
include('includes/config.php');
if (isset($_POST['signin'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM register where email ='$email' AND password ='$password'";
  $query = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query);
  if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
      $_SESSION['alogin'] = $row['user_ID'];
      echo "<script type='text/javascript'> document.location = 'notebook.php'; </script>";
    }
  } else {
    $log = "Invalid Details";
    logger($log);
    echo "<script>alert('Invalid Details');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" class="bg-dark">

<head>
  <meta charset="utf-8" />
  <title>Notitse | Proiect IPDP</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
</head>

<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="index.php">Notitse</a>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Logare</strong>
        </header>
        <form name="signin" method="post">
          <div class="panel-body wrapper-lg">
            <div class="form-group">
              <label class="control-label">E-mail</label>
              <input name="email" type="email" placeholder="exemplu@exemplu.com" class="form-control input-lg" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label">Parolă</label>
              <input name="password" type="password" id="inputPassword" placeholder="Parolă" class="form-control input-lg" autocomplete="off">
            </div>
            <div class="line line-dashed"></div>
            <button name="signin" type="submit" class="btn btn-primary btn-block">Login</button>
            <div class="line line-dashed"></div>
            <p class="text-muted text-center"><small>Nu ai cont?</small></p>
            <a href="signup.php" class="btn btn-default btn-block">Crează-ți un cont!</a>
          </div>
        </form>
      </section>
    </div>
  </section>
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Notitse | Proiect IPDP</small>
      </p>
    </div>
  </footer>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>

</body>

</html>