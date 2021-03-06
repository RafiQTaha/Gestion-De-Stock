  <div class="responsive-table">
  <table class="table table-striped table-bordered ">
    <thead>
      <tr>
        <th>#</th>
        <th>Type</th>
        <th>Prix</th>
        <th>Quantite</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM `stock`";
      $select_stock = mysqli_query($db , $query);
      while ($row = mysqli_fetch_array($select_stock)) {
        ?>
        <tr>
          <th><?php echo $row['id_produit'] ?></th>
          <?php
          $id_cat = $row['id_cat'];
          $query = "select cat_title from category WHERE id_cat = {$id_cat}";
          $select_type = mysqli_query($db , $query);
          $row_type = mysqli_fetch_array($select_type);
          ?><td><?php echo $row_type['cat_title'] ?></td>
          <td><?php echo $row['prix_achat'] ?></td>
          <td><?php echo $row['quantite'] ?></td>
          <td><?php echo $row['date'] ?></td>
          <td> <a onClick="javascript: return confirm('voulez vous vraiment suppeimer ce produit ?!');"  href="stock_produit.php?source=achat&delete=<?php echo $row['id_produit']; ?>">Supprimer</a> </td>
        </tr>
        <?php
      }
       ?>

    </tbody>
  </table>

  <?php
  if (isset($_GET['delete'])) {
      $id_produit = $_GET['delete'];
      $query = "DELETE FROM stock WHERE id_produit={$id_produit}";
      $delete_prod_Query = mysqli_query($db,$query);
        if (!$delete_prod_Query) {
            die("Querry Failed !!" . mysqli_error($db));
        }
      header("Location: stock_produit.php?source=achat");
  }

   ?>
</div>
