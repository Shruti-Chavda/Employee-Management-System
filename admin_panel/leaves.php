<?php include('session.php');  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apply for leaves</title>
    <!-- Custom fonts for this template-->
    <link href="img/favicon.png" rel="icon">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>
</head>
<?php
if (isset($_POST['a_btn'])) {
    $id = $_POST['id'];
    $q = "UPDATE `leaves` SET `Status`='Approved' WHERE id=$id";
    if (mysqli_query($con, $q)) {
?>
        <script>
            window.location.href = "leaves.php";
        </script>
    <?php
    }
}
if (isset($_POST['b_btn'])) {
    $id = $_POST['id1'];
    $q = "UPDATE `leaves` SET `Status`='Rejected' WHERE id=$id";
    if (mysqli_query($con, $q)) {
    ?>
        <script>
            window.location.href = "leaves.php";
        </script>
<?php
    }
}
?>

<body id="page-top">
    <?php include('sidebar.php'); ?>

    <?php include('header.php'); ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Leaves</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Emp ID</th>
                                <th>Employee Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Approve</th>
                                <th>Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $q = "SELECT * FROM leaves";
                            $result = mysqli_query($con, $q);
                            $count = mysqli_num_rows($result);
                            while ($a = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $a[1]; ?></td>
                                    <td><?php echo $a[2]; ?></td>
                                    <td><?php echo $a['start_date']; ?></td>
                                    <td><?php echo $a['end_date']; ?></td>
                                    <td><?php echo $a['total_days']; ?></td>
                                    <td><?php echo $a['reason']; ?></td>
                                    <td><?php echo $a['status']; ?></td>
                                    <td>
                                        <form action="leaves.php" method="post">
                                            <div class="d-none">
                                                <input type="text" name="id" value="<?php echo $a[0]; ?>" id="">
                                            </div>
                                            <button type="submit" class="btn btn-success btn-circle btn-sm" name="a_btn"><i class="fas fa-check"></i></button>
                                        </form>
                                    </td>
                                    </td>
                                    <td>
                                        <form action="leaves.php" method="post">
                                            <div class="d-none">
                                                <input type="text" name="id1" value="<?php echo $a[0]; ?>" id="">
                                            </div>
                                            <button class="btn btn-danger btn-circle btn-sm" name="b_btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    </td>
                                <?php } ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    include_once('footer.php');
    ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="http://localhost/Employee%20Management%20System/admin_panel/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->


</body>

</html>