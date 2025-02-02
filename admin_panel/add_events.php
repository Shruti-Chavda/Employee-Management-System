<?php include('session.php');  ?>
<?php
include('connection.php');
if (isset($_POST['submit'])) {
    $en = $_POST['evn'];
    $des = $_POST['des'];
    $date = $_POST['dt'];
    $st = $_POST['st'];
    $et = $_POST['et'];
    $add = $_POST['ad'];
    $q = "INSERT INTO events (name, description, date, starting_time, ending_time, address) 
    VALUES ('$en', '$des', '$date', '$st', '$et', '$add')";
  if (mysqli_query($con, $q)) {
        echo "<script>alert('Submitted successfully!');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Employees</title>

    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="css/main.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/event.js"></script>
</head>

<body id="page-top">
    <?php include('sidebar.php'); ?>

    <?php include('header.php'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <form id="registrationForm" action="add_events.php" method="POST" enctype="multipart/form-data">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Add Events</h2>

                            <div>
                                <label>Event Name</label>
                                    <input class="input--style-1" type="text" placeholder="Event Name" name="evn" />
                                    <span id="evn_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <label>Description</label>
                                    <textarea class="input--style-1" type="text" placeholder="Description" name="des"></textarea>
                                    <span id="des_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <label>Event Date</label>
                                <input class="input--style-1" type="date" placeholder="Due date" name="dt" />
                                <span id="dt_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <label>Starting Time</label>
                                <input id="st" class="input--style-1" type="time" placeholder="Starting Time" name="st" />
                                <span id="st_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <label>Ending Time</label>
                                <input id="et" class="input--style-1" type="time" placeholder="Ending Time" name="et" />
                                <span id="et_err" class="error1 p-1"></span>
                            </div>


                            <div>
                                <label>Address</label>
                                <textarea class="input--style-1" type="text" placeholder="Enter the Address" name="ad"></textarea>
                                <span id="ad_err" class="error1 p-1"></span>
                            </div>

                            <div class="p-t-20">
                                <button class="btn btn--radius btn-success" type="submit" name="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
        </form>

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

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
