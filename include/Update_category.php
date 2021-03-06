<?php if (isset($_GET['Edit'])) {
  $the_Id_cat = $_GET['Edit'];
  $query = "select * from category where id_cat = {$the_Id_cat}";
  $select_category = mysqli_query($db,$query);
  while ($row = mysqli_fetch_assoc($select_category)) {
    $cat_title = $row['cat_title'];
    $cat_image = $row['cat_image'];
  }
  ?>
  <form class="" action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="cat_title"> Update Category </label>
        <div class="add_cat">
          <input type="text" class="form-control" name="cat_title_up" value="<?php echo $cat_title?>">
          <input type="file" class="form-control" name="cat_image_up">
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="Update_cat" class="btn btn-primary" value="Update Category">
        <img src="img/<?php echo $cat_image ?>" class="cat_image update_image">
    </div>
    <?php
        if (isset($_POST['Update_cat'])) {
          $cat_title_up = $_POST['cat_title_up'];
          $cat_image_up = $_FILES['cat_image_up']['name'];
          $cat_image_up_temp = $_FILES['cat_image_up']['tmp_name'];
          move_uploaded_file($cat_image_up_temp, "./img/$cat_image_up");
          if (empty($cat_image_up)) {
                      $query = "SELECT `cat_image` FROM `category` WHERE id_cat = {$the_Id_cat}";
                      $check_image = mysqli_query($db,$query);
                      $row = mysqli_fetch_assoc($check_image);
                        $cat_image_up = $row['cat_image'];
                    }
          $query = "UPDATE `category` SET `cat_title`='{$cat_title_up}', `cat_image`='{$cat_image_up}' WHERE `id_cat`={$the_Id_cat}";
          $update_category = mysqli_query($db,$query);
          if (!$update_category) {
          die("Querry Failed !!" . mysqli_error($db));
          }
          header("Location:categories.php?Edit={$the_Id_cat}&#{$the_Id_cat}");
        }
     ?>
  </form>
  <?php
} ?>
