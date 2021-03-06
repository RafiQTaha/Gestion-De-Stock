<div class="responsive-table">
  <table class="table table-striped table-bordered ">
    <thead>
      <tr>
        <th>#</th>
        <th>FullName</th>
        <th>Username</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "select * from user";
      $select_user = mysqli_query($db , $query);
      while ($row = mysqli_fetch_array($select_user)) {
        ?>
        <tr>
          <th><?php echo $row['id_user'] ?></th>
          <td><?php echo $row['fullname'] ?></td>
          <td><?php echo $row['username'] ?></td>
          <td><?php echo $row['role'] ?></td>
          <td> <a href="users.php?source=edit_user&id_u=<?php echo $row['id_user'] ?>"> <i class="fas fa-user-edit"></i></a> </td>
          <td> <a onClick="javascript: return confirm('Voulez Vous Continuer ?!');" href="users.php?delete=<?php echo $row['id_user'] ?>"> <i class="fas fa-user-minus"></i> </a> </td>
        </tr>
        <?php
      }

      if (isset($_GET['delete'])) {
          $id_user = $_GET['delete'];
          $query = "DELETE FROM user WHERE id_user={$id_user}";
          $delete_user_Query = mysqli_query($db,$query);
            if (!$delete_user_Query) {
                die("Querry Failed !!" . mysqli_error($db));
            }
          header("Location: users.php");
      }

       ?>



    </tbody>
  </table>
</div>
