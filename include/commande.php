<?php
    if (isset($_POST['submit_date'])) {
      $date = $_POST['command_date'];
    }
    else {
      $date ='20'.date('y-m-d');
    }

   if (isset($_GET['delete'])) {
       $id_cmd = $_GET['delete'];
       $query = "DELETE FROM commande WHERE id_cmd={$id_cmd}";
       $delete_cmd_Query = mysqli_query($db,$query);
         if (!$delete_cmd_Query) {
             die("Querry Failed !!" . mysqli_error($db));
         }

       header("Location: stock_produit.php?source=commande");
   }

  ?>
<form action="" method="post" class="form form-stock">
  <label for="command_date">Date:</label>
  <input type="date" id="command_date" class="form-group" name="command_date" required>
  <input type="submit" class="btn btn-success" name="submit_date" value="Submit">
  <label style="float:right;"><?php echo $date ?></label>
</form>



  <?php //cmd_table($date); ?>

  <div class="responsive-table">
    <table class="table table-striped table-bordered ">
      <thead>
        <tr>
          <th>#</th>
          <th>Type</th>
          <th>Prix</th>
          <th>Quantite</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM `commande` WHERE date_cmd like '%$date%'";
        $select_stock = mysqli_query($db , $query);
        while ($row = mysqli_fetch_array($select_stock)) {
          $date = $row['date_cmd'];
          ?>
          <tr>
            <th><?php echo $row['id_cmd'] ?></th>
            <?php
            $id_cat = $row['id_cat'];
            $query = "select cat_title from category WHERE id_cat = {$id_cat}";
            $select_type = mysqli_query($db , $query);
            $row_type = mysqli_fetch_array($select_type);
            ?>
            <td><?php echo $row_type['cat_title'] ?></td>
            <td><?php echo $row['prix'] ?>  DH</td>
            <td><?php echo $row['quantite'] ?></td>
            <td> <a onClick="javascript: return confirm('voulez vous vraiment suppeimer cette commande ?!');"  href="stock_produit.php?source=commande&delete=<?php echo $row['id_cmd']; ?>">Supprimer</a> </td>
          </tr>
          <?php
        }
         ?>

      </tbody>
    </table>



  </div>
