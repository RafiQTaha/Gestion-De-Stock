<?php include'include/header.php'; ?>
    <div id="wrapper">
<?php include'include/navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small><?php echo $_SESSION['fullname'] ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-lg-3 col-md-6">
                   <div class="panel panel-red">
                       <div class="panel-heading">
                           <div class="row">
                               <div class="col-xs-3">
                                   <i class="fa fa-list fa-3x"></i>
                               </div>
                               <div class="col-xs-9 text-right">
                                 <?php
                                 $query = "select * from category";
                                 $number = mysqli_query($db,$query);
                                 $category_count = mysqli_num_rows($number);
                                  ?>
                             <div style="font-size:20px"><?php echo $category_count ?>  Types</div>
                                    <div>Nombre des types</div>
                               </div>
                           </div>
                       </div>
                       <a href="categories.php">
                           <div class="panel-footer">
                               <span class="pull-left">View Details</span>
                               <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                               <div class="clearfix"></div>
                           </div>
                       </a>
                   </div>
            </div>

                      <div class="col-lg-3 col-md-6">
                       <div class="panel panel-green">
                           <div class="panel-heading">
                               <div class="row">
                                   <div class="col-xs-3">
                                       <i class="fas fa-box-open fa-3x"></i>
                                   </div>
                                   <div class="col-xs-9 text-right">
                                     <?php
                                     $query = "select SUM(quantite) as SUM from stock";
                                     $quantite = mysqli_query($db,$query);
                                     $sum = mysqli_fetch_assoc($quantite);
                                      ?>
                                 <div style="font-size:20px"><?php echo $sum['SUM']?>  Pieces</div>
                                     <div>Quantite En Stock</div>
                                   </div>
                               </div>
                           </div>
                           <a href="stock_produit.php">
                               <div class="panel-footer">
                                   <span class="pull-left">View Details</span>
                                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                   <div class="clearfix"></div>
                               </div>
                           </a>
                       </div>
                      </div>

                      <div class="col-lg-3 col-md-6">
                       <div class="panel panel-primary">
                           <div class="panel-heading">
                               <div class="row">
                                   <div class="col-xs-3">
                                       <i class="fas fa-shopping-cart fa-3x"></i>
                                   </div>
                                   <div class="col-xs-9 text-right">
                                     <?php
                                     $query = "select 'id_cmd' from commande";
                                     $quantite = mysqli_query($db,$query);
                                     $count = mysqli_num_rows($quantite);
                                      ?>
                                 <div style="font-size:20px"><?php echo $count ?>  Vendu</div>
                                     <div>Nombre de Commande</div>
                                   </div>
                               </div>
                           </div>
                           <a href="stock_produit.php?source=commande">
                               <div class="panel-footer">
                                   <span class="pull-left">View Details</span>
                                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                   <div class="clearfix"></div>
                               </div>
                           </a>
                       </div>
                      </div>

                      <div class="col-lg-3 col-md-6">
                       <div class="panel panel-succes">
                           <div class="panel-heading">
                               <div class="row">
                                   <div class="col-xs-3">
                                       <i class="fas fa-clipboard-check fa-3x"></i>
                                   </div>
                                   <div class="col-xs-9 text-right">
                                     <?php
                                     $query = "select SUM(prix) as SUM from commande";
                                     $quantite = mysqli_query($db,$query);
                                     $sum = mysqli_fetch_assoc($quantite);
                                      ?>
                                 <div style="font-size:20px"><?php echo $sum['SUM'] ?> DH</div>
                                     <div>Somme Vendu</div>
                                   </div>
                               </div>
                           </div>
                           <!-- <a href="stock_produit.php">
                               <div class="panel-footer">
                                   <span class="pull-left">View Details</span>
                                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                   <div class="clearfix"></div>
                               </div>
                           </a> -->
                       </div>
                    </div>


                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php include'include/js.php'; ?>



</body>

</html>
