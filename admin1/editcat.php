<?php
include('isvalid.php');
include('connection.php');

if (isset($_GET['cid'])) {
    $cd = $_GET['cid'];
    $sql = "select * from category where catid='$cd'";
    $res = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_assoc($res);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Category</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('menu.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="login-form bg-light mt-p-4">
                                <form action="editcat_sub.php" method="POST" class="row-g-3">
                                    <div class="text-center">
                                        <h4>Edit Category</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <input type="hidden" value="<?php echo $row['catid'];  ?>" name="cid" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label>Category Name</label>
                                        <input type="text" name="cname" class="form-control" value="<?php echo $row['catname'];  ?>">
                                    </div><br>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary mx-auto w-100" name="submit" value="Edit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include('footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

</html>