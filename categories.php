<?php include'include/header.php'; ?>
    <div id="wrapper">
<?php include'include/navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                          Categories
                          <small><?php echo $_SESSION['fullname'] ?></small>
                      </h1>
                  </div>
              </div>
                <!-- /.row -->
                <!-- *********************************************************************
                                TO ADD A CATEGORIES ..
                                ************************************************** -->
              <div class="main-category">
                          <div class="col-xs-6">
                <?php Add_Categories(); ?>
                            <form class="" action="" method="POST"  enctype="multipart/form-data">

                              <div class="form-group">
                                  <label for="cat_title"> Add Category </label>
                                  <div class="add_cat">
                                    <input type="text" class="form-control" name="cat_title_add">
                                    <input type="file" class="form-control" name="cat_image_add">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <input type="submit" name="add_cat" class="btn btn-primary" value="Add Category">
                              </div>
                            </form>
                            <hr>
                            <!--   ************************************************************************************
                                                    TO UPDATE THE CATEGORIES IN DATABASE ..
                                                    ******************************************** -->
                <?php //UpdateCategories(); ?>
                <?php include 'include/Update_category.php'; ?>



                          </div>
                        <!--   ************************************************************************************
                                  TO READ AND DELETE END UPDATE THE CATEGORIES  ..
                                  ******************************************** -->
                          <div class="col-xs-6">

                              <div class="category-table">
                              <table class="table table-hover table-bordered">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Type</th>
                                          <th>Image</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                <!--   ***************************************************************************************
                TO READ THE CATEGORIES FROM DATABASE TO TABLE ..
                ************************************************ -->
                <?php ReadAllCategories(); ?>
                <!-- *****************************************************************************************
                TO DELETE A CATEGORIES FROM DATABASE (DELETE BUTTON INCLUDED IN TABLE)..
                ********************************************************************* -->
                <?php DeleteCategories(); ?>
                                  </tbody>
                              </table>
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
