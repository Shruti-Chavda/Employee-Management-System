<?php  include('session.php'); 
if(isset($_GET['id'])) {
    $a = $_GET['id'];
    if(empty($a)) {
        echo "<script>alert('You haven't applied for any events');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/event.php';</script>";
    } else {
        $res = mysqli_query($con, "SELECT * FROM event_pt 
        INNER JOIN events ON event_pt.id = events.id 
        WHERE event_pt.id = '$a'");
        if(mysqli_num_rows($res) > 0) {
            $rec = mysqli_fetch_array($res);
            // Proceed with processing the event data
        } else {
            echo "<script>alert('Event not found');</script>";
            echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/event.php';</script>";
        }
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

    <title>Event Details</title>

    
    <link href="img/favicon.png" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <!-- <script src="js/event_details.js"></script> -->


</head>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<body id="page-top">

<?php  include('sidebar.php'); ?>

<?php  include('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Event Detials</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                    <tr>
                                            <td>Event Name</td>
                                            <td><?php echo $rec['name']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Description</td>
                                            <td><?php echo $rec['description']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Employee Name</td>
                                            <td><?php echo $rec['employee_name']; ?></td>
                                        </tr>
                                      
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td><?php echo $rec['mobile_number']; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Email</td>
                                            <td><?php //echo $_SESSION['email']; ?></td>
                                        </tr> -->
                                        <tr>
                                            <td>Event Date</td>
                                            <td><?php echo $rec['event_date']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Event Starting Time</td>
                                            <td><?php echo $rec['event_starting_time']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Event Ending Time</td>
                                            <td><?php echo $rec['event_ending_time']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Venue Address</td>
                                            <td><?php echo $rec['venue_address']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Title of participation</td>
                                            <td><?php echo $rec['title_of_participation']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Additional Information</td>
                                            <td><?php echo $rec['additional_information']; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Admin Remark</td>
                                            <td><?php echo $rec['admin_remark']; ?></td>
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

</body>

</html>