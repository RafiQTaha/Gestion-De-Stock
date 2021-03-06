<form class="form form-stock" action="" method="post">
  <div class="form-group">
        <label for="cat"> Prix D'achat </label>
        <select class="form-control" name="cat">
          <option value="">Select Type</option>
          <?php
          $query ="select * from category";
          $select_cat_query = mysqli_query($db , $query);
          while ($row = mysqli_fetch_assoc($select_cat_query)) {
            $cat_id = $row['id_cat'];
            $name = $row['cat_title'];
            ?> <option value="<?php echo $cat_id ?>"><?php echo $name ?></option> <?php
          }
          ?>
        </select>
  </div>
  <div class="form-group">
        <label for="prix"> Prix D'Achat </label>
        <input type="text" class="form-control" name="prix" placeholder="Entrer Le Prix">
  </div>
  <div class="form-group">
        <label for="quantite"> Quantite </label>
        <input type="text" class="form-control" name="quantite" placeholder="Entrer Le Quantite">
  </div>

  <div class="form-group">
      <input class="btn btn-success" type="submit" name="add_achat" value="Ajouter Un Produit">
      <input class="btn btn-primary" type="submit" name="update_achat" value="Ajouter Une Quantite">
  </div>
</form>
<?php include 'stock.php'; ?>


<?php
      if (isset($_POST['update_achat'])) {
        $id_cat=$_POST['cat'];
        $qte=$_POST['quantite'];
        $prix=$_POST['prix'];
        $date = date("Y-m-d H:i:s");
        // $query= "UPDATE `stock` SET `quantite`=quantite + {$qte},'date'='{$date}' WHERE id_cat={$id_cat}";
        $query = "UPDATE stock SET quantite = quantite + {$qte}, ";
        $query .="date = '{$date}' ";
        $query .=" WHERE id_cat = {$id_cat}";
        $update_achat = mysqli_query($db , $query);
        if (!$update_achat) {
          ?>  <h2> Error Connection!!</h2>  <?php
        }
        else {
          header('Location:stock_produit.php?source=achat');
        }
      }
      if (isset($_POST['add_achat'])) {
        $id_cat=$_POST['cat'];
        $qte=$_POST['quantite'];
        $prix=$_POST['prix'];
        $query= "INSERT INTO stock (`id_cat`,`prix_achat`,`quantite`) VALUES({$id_cat},{$prix},{$qte})";
        $add_achat = mysqli_query($db , $query);
        if (!$add_achat) {
          ?>  <h2> Error Connection!!</h2>  <?php
        }
        else {
          header('Location:stock_produit.php?source=achat');
        }
      }



 ?>
