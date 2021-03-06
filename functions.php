<?php
function ReadAllCategories(){
  global $db;
  $query = "select * from category ORDER BY id_cat desc";
  $All_categories = mysqli_query($db,$query);
  while ($row = mysqli_fetch_assoc($All_categories))
  {
  $id_cat = $row['id_cat'];
  $cat_title = $row['cat_title'];
  $cat_image = $row['cat_image'];
   ?>
      <tr>
        <th id="<?php echo $id_cat ?>"><?php echo $id_cat ?></th>
        <td><?php echo $cat_title ?></th>
        <td> <img src="img\<?php echo $cat_image ?>" class="cat_image"> </th>
        <td><a href="categories.php?Edit=<?php echo $id_cat ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
        <td>
          <a onClick="javascript: return confirm('le produit supprimera automatiquement. Voulez Vous Continuer ?!');" href="categories.php?delete=<?php echo $id_cat ?>">
            <i class="glyphicon glyphicon-trash"></i>
          </a>
        </td>
      </tr>
   <?php
  }
}
function Add_Categories(){
 global  $db;
     if (isset($_POST['add_cat'])) {
           $cat_title_add = $_POST['cat_title_add'];
           $cat_image_add = $_FILES['cat_image_add']['name'];
           $cat_image_add_temp = $_FILES['cat_image_add']['tmp_name'];
           move_uploaded_file($cat_image_add_temp, "./img/$cat_image_add");
           if (!empty($cat_title_add) && !empty($cat_image_add)) {
           $query = "INSERT INTO `category`(`cat_title`, `cat_image`) VALUES ('{$cat_title_add}','{$cat_image_add}')";
           $add_Cat_Query = mysqli_query($db,$query);
           echo "<h5 style='color:green'>Added successfully!</h5>";
               if (!$add_Cat_Query) {
                   die("Querry Failed !!" . mysqli_error($db));
               }
           }
           else {
               echo "<h5 style='color:red'>Merci D'entre La Category!!</h5>";
           }
     }
}

function DeleteCategories(){
  global $db;
  if (isset($_GET['delete'])) {
      $the_Id_cat = $_GET['delete'];
      $query = "DELETE FROM stock WHERE id_cat={$the_Id_cat}";
      $delete_Cat_Query = mysqli_query($db,$query);
      $query = "DELETE FROM category WHERE id_cat={$the_Id_cat}";
      $delete_Cat_Query = mysqli_query($db,$query);
        if (!$delete_Cat_Query) {
            die("Querry Failed !!" . mysqli_error($db));
        }
      header("Location: categories.php");
  }
}

function ReadProfile(){
  global $db;
  $query = "select * from user WHERE id_user = {$id_user}";
  $profile = mysqli_query($db,$query);
  while ($row = mysqli_fetch_assoc($profile))
  {
  $fullname = $row['fullname'];
  $username = $row['username'];
  $password = $row['password'];
  $role = $row['role'];
  }
}
?>
