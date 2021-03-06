
<?php
    if (isset($_GET['id_u'])) {
      $id_user = $_GET['id_u'];
      $query = "select * from user WHERE id_user = {$id_user}";
      $profile = mysqli_query($db,$query);
      while ($row = mysqli_fetch_assoc($profile))
      {
      $fullname = $row['fullname'];
      $username = $row['username'];
      $password = $row['password'];
      $role = $row['role'];
      }

    ?>

    <form class="form" action="" method="POST" enctype="multipart/form-data">

         <div class="form-group">
               <label for="cat_title"> FullName </label>
               <input type="text" class="form-control" name="fullname" value="<?php echo $fullname ?>" required>
         </div>
         <div class="form-group">
               <label for="cat_title"> UserName </label>
               <input type="text" class="form-control" name="username" value="<?php echo $username ?>" required>
         </div>
         <div class="form-group">
               <label for="cat_title"> Password </label>
               <input autocomplete="off" type="password" class="form-control" name="password" value="<?php echo $password ?>" required>
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
             <input class="btn btn-primary" type="submit" name="update_user" value="Change">
         </div>
    </form>

    <?php

    }

      if (isset($_POST['update_user'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_role = $_POST['user_role'];
        $query="UPDATE `user` SET `fullname`='{$fullname}',`username`='{$username}',`password`='{$password}',`role`='{$user_role}' WHERE `id_user`={$id_user}";
        $add_user = mysqli_query($db,$query);
        if (!$add_user) {
          die("Error Connection!!". mysqli_error($db));
        }
        header("Location: profile.php");
      }




 ?>
