<form class="form" action="" method="POST" enctype="multipart/form-data">

     <div class="form-group">
           <label for="cat_title"> UserName </label>
           <input type="text" class="form-control" name="username" value="" placeholder="Put Your UserName" required>
     </div>
     <div class="form-group">
           <label for="cat_title"> FullName </label>
           <input type="text" class="form-control" name="fullname" value="" placeholder="Put Your FullName" required>
     </div>
     <div class="form-group">
           <label for="cat_title"> Password </label>
           <input autocomplete="off" type="password" class="form-control" name="password" placeholder="Put Your Password" required>
     </div>
     <div class="form-group">
        <label for="user_role">User Role</label>
        <select class="form-control" name="user_role" required>
          <?php
          if ($role === 'Admin') {
            ?>
            <option value="Admin">Admin</option>
            <option value="Agent">Agent</option>
            <?php
          }
          else {
            ?>
            <option value="Subscriber">Agent</option>
            <option value="Admin">Admin</option>
            <?php
          }
           ?>
        </select>
     </div>
     <div class="form-group">
         <input class="btn btn-primary" type="submit" name="add_user" value="Ajouter Un Agent">
     </div>
</form>
<?php

  if (isset($_POST['add_user'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_role = $_POST['user_role'];
    $query="INSERT INTO `user`(`fullname`, `username`, `password`, `role`) VALUES ('{$fullname}','{$username}','{$password}','{$user_role}')";
    $add_user = mysqli_query($db,$query);
    if (!$add_user) {
      die("Error Connection!!". mysqli_error($db));
    }
    header("Location: users.php?source=add_user");
  }
 ?>
