<?php ob_start(); ?>
<?php include 'include/db.php'; ?>
<?php session_start(); ?>
<?php
    if ($_SESSION['role'] == "" ) {
      header("Location: login.php");
    }
    elseif ($_SESSION['role'] == "Admin") {
      header("Location: ./");
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" href="css/style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <title>Agent Page</title>
</head>
<body>
<div class="agent_container">
    <div class="form-style-8">
      <?php
      $combo = false;
      $cat_id="";
      if (isset($_POST['go-btn'])) {
        $value = $_POST['category'];
        $query ="select * from category where id_cat={$value}";
        $select_cat_query = mysqli_query($db , $query);
        while ($row = mysqli_fetch_assoc($select_cat_query)) {
          $cat_id = $row['id_cat'];
          $name = $row['cat_title'];
          $img = $row['cat_image'];
        }
        $combo = true;
        } ?>
        <form class="form-style-9" action="" method="post">
          <ul>
            <li >
                <select class="field-style align-left drop-cat" name="category" id="cat" required>
                <option value="" disabled selected>Select Your Type</option>
                <?php
                  $query ="select * from category";
                  $select_cat_query = mysqli_query($db , $query);
                  while ($row = mysqli_fetch_assoc($select_cat_query)) {
                    $id_cat = $row['id_cat'];
                    $cat_title = $row['cat_title'];
                    $cat_image = $row['cat_image'];
                    ?><option value=<?php echo $id_cat ?>><?php echo $cat_title ?></option><?php
                  }
                ?>
                </select>
                <input type="submit" name="go-btn" class="go-btn align-right" value="Choose">
            </li>

            <?php
            if (isset($combo) && $combo === true) {
             ?> <img src="img\<?php echo $img ?>" class="field-style align-right field-img"> <?php
            }
            ?>
          </ul>
      </form>
      <form class="form-style-9" action="" method="post">
          <ul>
            <?php
            if (isset($combo) && $combo === true) {
             ?>
             <li>
               <h3 name="chose-cat"><?php echo $name ?></h3>
               <input type="text" name="cat" value="<?php echo $cat_id ?>" style="visibility:hidden">

             </li>
             <?php
            }
            ?>
            <li>
                <input type="text" name="prix" class="field-style align-left" placeholder="DH" />
                <select class="field-style align-right" name="quantite" required>
                    <option value="" disabled selected>Qte</option>
                    <?php
                    $query ="SELECT max(quantite) as max FROM stock limit 1";
                    $select_cat_query = mysqli_query($db , $query);
                    $row = mysqli_fetch_assoc($select_cat_query);
                      for ($i=1; $i <= $row['max']; $i++) {
                        ?>
                          <option value=<?php echo $i?> >  <?php echo $i ?>  </option>
                        <?php
                      }
                      ?>
                </select>
            </li>
            <li>
                <input type="submit" name="send_cmd" class="align-left" value="Send Commande" />
                <a href="include/logout.php" class="align-right logout-btn">Log Out</a>
            </li>
          </ul>
      </form>
    </div>

    <?php
        if (isset($_POST['send_cmd'])) {
          $cat = $_POST['cat'];
            if (!empty($cat)) {
                $prix = $_POST['prix'];
                $qte = $_POST['quantite'];
                $query_cat ="SELECT `id_produit` FROM `stock` WHERE id_cat = '{$cat}'";
                $Cat_Query = mysqli_query($db,$query_cat);
                $row = mysqli_fetch_assoc($Cat_Query);
                $id_prod = $row['id_produit'];
                $cmd_query = "INSERT INTO `commande`( `id_cat`, `id_produit`, `prix`, `quantite`) VALUES ({$cat},{$id_prod},{$prix},{$qte})";
                $insrt_cmd = mysqli_query($db,$cmd_query);
                $stock_query = "UPDATE `stock` SET `quantite`=quantite - {$qte} WHERE id_produit={$id_prod}";
                $delete_cmd = mysqli_query($db,$stock_query);
                if (!$delete_cmd) {
                  ?><h1>error</h1><?php
                }
                ?>
                     <script type="text/javascript">
                       alert('commande est bien ajoute.');
                     </script>
                   <?php
            }
            else {
              ?>
                   <script type="text/javascript">
                     alert('vous devez choisir la category');
                   </script>
                 <?php
            }
        }
     ?>

</div>

<?php include'include/commande.php' ?>

</body>
</html>
