<?php
      $db = mysqli_connect('localhost','root','','gestion');
      if (!$db) {
        // echo "<h1 style='color:red'>Connection Failed!!</h1>";
        die("Probleme de connection!!".mysqli_error($db));
      }
      else {
        // echo "<h1 style='color: #fff'>Connection is good</h1>";
      }

 ?>
