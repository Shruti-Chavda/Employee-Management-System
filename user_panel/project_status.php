<?php include('session.php'); ?>
<?php
if(isset($_SESSION['user_id'])){
 $id=$_SESSION['user_id'];{
//  echo $id;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project Status</title>
    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>
</head>

<body id="page-top">

    <?php include('sidebar.php'); ?>


    <?php include('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Project Status</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Leader Name</th>
                                <th>Due Date</th>
                                <th>Submission Date</th>
                                <th>Points</th>
                                <th>Status</th>
                                <th>Submit</th>
                                <th>Submission</th>
                                <!-- <th>Details</th> -->

                            </tr>
                        </thead>
                        <tbody>
    <?php
    $q = "SELECT * FROM projects where leader_id=$id";
    $res = mysqli_query($con, $q);
    while ($row = mysqli_fetch_array($res)) {
    ?>
        <tr>
            <td><?php echo $row['p_name']; ?></td>
            <td><?php echo $row['leader_name']; ?></td>
            <td><?php echo $row['due_date']; ?></td>
            <td><?php echo $row['sub_date']; ?></td>
            <td><?php echo $row['points']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <a href="submit.php?submit=<?php echo $row[0]; ?>" class="btn btn-success btn-circle btn-sm">
                    <i class="fas fa-check"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-primary btn-circle btn-sm" href="download.php?project_id=<?php echo $row['p_id']; ?>">
                    <i class="fas fa-download"></i>
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
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
                            } }
                            ?>

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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-success"
                        href="http://localhost/Employee%20Management%20System/user_panel/logout.php">Logout</a>
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


</body>

</html>
