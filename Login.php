<?php include 'include/db.php'; ?>
<?php session_start(); ?>
<?php include 'include/login.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/login.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <title>Login Page</title>
</head>
<body>

    <form class="form" action="" method="POST">
      <h1>Login</h1>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control password" name="password" id="password" placeholder="Password" required>
  </div>
  <?php
    if ($error === true) {
       ?><label style="color:red">Login ou Mot De Passe Est Incorrect!!</label><?php
    }
   ?>
  <input type="submit" name="login" class="btn btn-primary btn-login" value="Login">
</form>

</body>
</html>
