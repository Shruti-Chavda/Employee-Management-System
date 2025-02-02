<?php  include('session.php');  ?>
<?php
include('connection.php');
 if(isset($_GET['edit']))
 {
    $id=$_GET['edit'];
// Fetch data from the projects table
$query = "SELECT * FROM projects where p_id=$id";
$result = mysqli_query($con, $query);
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

    <title>Details</title>
    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- <script src="js/jquery-3.6.4.min.js"></script> -->
    <script src="js/search.js"></script>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="css/main.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/submit.js"></script>
</head>

<body id="page-top">

    <?php include('sidebar.php'); ?>


    <?php include('topbar.php'); ?>

    <div class="container-fluid">
        <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h2 class="title">Project Details</h2>

                        <?php
                        // Check if there are any projects
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            if($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div>
                                    <p>Project Name: <?php echo $row['p_name']; ?></p>
                                </div>
                                <div>
                                    <p>Leader: <?php echo $row['leader_name']; ?></p>
                                </div>
                                <div>
                                    <p>Due Date: <?php echo $row['due_date']; ?></p>
                                </div>
                                <div>
                                    <p>Submission Date: <?php echo $row['sub_date']; ?></p>
                                </div>
                                <div>
                                    <p>Points: <?php echo $row['points']; ?></p>
                                </div>
                                <div>
                                    <p>Description: <?php echo $row['p_description']; ?></p>
                                </div>
                                <div>
                                    <p>Status: <?php echo $row['status']; ?></p>
                                </div>
                                <hr>
                        <?php
                            }
                        } 
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
                    </div>

    <?php
          include_once('footer.php');
          ?>

    </div>
    <!-- End of Main Content -->

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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>