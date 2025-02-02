<?php  include('session.php');  

if(isset($_GET['ap'])) {
    $event_id = $_GET['ap'];
    // Delete event from the database
    $ap_query = "UPDATE event_pt SET admin_remark='Approved' WHERE id = $event_id";
    if(mysqli_query($con, $ap_query)) {
        echo "<script>alert('Event Approved successfully!');</script>";
        // Redirect to the same page or any other desired page after deletion
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event_pt.php';</script>";
        exit();
    } else {
        // Handle deletion error
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        // Redirect to the same page or any other desired page after deletion
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event_pt.php';</script>";
        exit();
    }
}
if(isset($_GET['del'])) {
    $event_id = $_GET['del'];
    // Delete event from the database
    $delete_query = "UPDATE event_pt SET admin_remark='Rejected' WHERE id = $event_id";
    if(mysqli_query($con, $delete_query)) {
        echo "<script>alert('Event Rejected successfully!');</script>";
        // Redirect to the same page or any other desired page after deletion
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event_pt.php';</script>";
        exit();
    } else {
        // Handle deletion error
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        // Redirect to the same page or any other desired page after deletion
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event_pt.php';</script>";
        exit();
    }
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

    <title>Event Participation</title>

    <!-- Custom fonts for this template-->
    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>
</head>

<body id="page-top">

<?php  include('sidebar.php'); ?>

<?php  include('header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Event Participation</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Event ID</th>
                                            <th>Title of Participation</th>
                                            <th>Additional Info</th>
                                            <th>Employee Name</th>
                                            <th>Event Date</th>
                                            <th>Status</th>
                                            <!-- <th>Details</th> -->
                                            <th>Approve</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            $q = "SELECT * FROM event_pt";
                            $result = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                    
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['title_of_participation'];?></td>
                                            <td><?php echo $row['additional_information'];?></td>
                                            <td><?php echo $row['employee_name'];?></td>
                                            <td><?php echo $row['event_date'];?></td>
                                            <td><?php echo $row['admin_remark']; ?></td>
                                            <!-- <td>
                                                <a href="event_details.php" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td> -->
                                            <td>
                                                <a href="event_pt.php?ap=<?php echo $row[0]; ?>" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="event_pt.php?del=<?php echo $row[0]; ?>" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
<?php } ?>


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
                        href="http://localhost/Employee%20Management%20System/admin_panel/logout.php">Logout</a>
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