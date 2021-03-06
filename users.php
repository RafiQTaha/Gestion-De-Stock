<?php include'include/header.php'; ?>
    <div id="wrapper">
<?php include'include/navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small><?php echo $_SESSION['fullname'] ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <?php
            if (isset($_GET['source'])) {
              $source = $_GET['source'];
            }
            else {
              $source = '';
            }
            switch ($source) {
              case 'add_user':
                include'include/add_user.php';
                break;
              case 'edit_user':
                include'include/edit_user.php';
                break;
              default:
              include'include/all_users.php';
                break;
            }
            ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include'include/js.php'; ?>



</body>

</html>
