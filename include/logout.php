<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php

            $_SESSION['id_user'] = "";
            $_SESSION['username'] = "";
            $_SESSION['fullname'] = "";
            $_SESSION['user_role'] = "";
            session_destroy();
        header("Location: ../Login.php");
?>
