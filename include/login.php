<?php
$error = false;
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //
    $username = mysqli_real_escape_string($db,$username);
    $password = mysqli_real_escape_string($db,$password);
    //
    $query = "select * from user where username = '{$username}'";
    $select_user = mysqli_query($db , $query);
    $count = mysqli_num_rows($select_user);
    if ($count > 0) {
      while ($row = mysqli_fetch_array($select_user)) {
        $db_id_user = $row['id_user'];
        $db_fullname = $row['fullname'];
        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_role = $row['role'];
      }
      if ($password === $db_password) {
        $_SESSION['id_user'] = $db_id_user;
        $_SESSION['fullname'] = $db_fullname;
        $_SESSION['username'] = $db_username;
        $_SESSION['role'] = $db_role;
            if ($db_role == 'Admin') {
              header("Location: ./");
            }
            else {
              header("Location: agent.php");
            }
      }
      else {
        $error = true;
      }
    }
    else {
      $error = true;
    }
  }
?>
