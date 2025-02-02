<?php  include('session.php');  ?>
<?php
include('connection.php');
$id=$_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $emp_id=$_SESSION['user_id'];
    $des = $_POST['des'];
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
    $start_date = new DateTime($sd);
    $end_date = new DateTime($ed);
    $interval = $start_date->diff($end_date);
    $td = $interval->days;
    $status="pending";

      // Fetch leader_name and leader_email from employees table based on leader_id
      $query = "SELECT * FROM employees WHERE id = $emp_id";
      $result = mysqli_query($con, $query);
  
      if(mysqli_num_rows($result) > 0) {
          // Fetch the row
          $row = mysqli_fetch_assoc($result);
          $user_name = $row['full_name'];

    // echo $td;
    $q="INSERT INTO `leaves`(`emp_id`,`user_name`,`reason`, `start_date`, `end_date`, `total_days`, `status`) VALUES ('$emp_id','$user_name','$des','$sd','$ed','$td','$status')";
    // echo $q1;
    if (mysqli_query($con,$q)) {
        echo "<script>alert('Submitted successfully!');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/leaves.php';</script>";
    }
 } else {
        echo "Error: " . mysqli_error($con);
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

    <title>Request for leave</title>

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
    <script src="js/leaves.js"></script>
</head>

<body id="page-top">

    <?php include('sidebar.php'); ?>


    <?php include('topbar.php'); ?>
    <!-- Begin Page Content -->
    <?php
                            $q="select * from employees where id=$id";
                            $res=mysqli_query($con,$q);
                            while($row=mysqli_fetch_assoc($res)){
                            ?>

    <div class="container-fluid">

        <form id="registrationForm" method="POST">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Apply For leaves</h2>
                        
                            <div>
                                <label>Employee Name<label>
                            </div>
                            <div>
                                <input class="input--style-1" type="text" placeholder="Name" name="nm" value="<?php echo $row['full_name']; ?>" readonly/>
                                <span id="nm_err" class="error1 p-1"></span>
                            </div>

                            <input type="text" name="td" id="td" hidden>

                            <div>
                                <label>Reason<label>
                            </div>
                            <div>
                                <textarea class="input--style-1" type="text" placeholder="Reason" name="des"></textarea>
                                <span id="des_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <p>Start date</p>
                                <div>
                                    <input class="input--style-1" type="date" placeholder="start date" id="sd" name="sd" />
                                    <span id="sd_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div>
                                <p>End date</p>
                                <div>
                                    <input class="input--style-1" type="date" placeholder="End date" id="ed" name="ed" />
                                    <span id="ed_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div class="p-t-20">
                                <button class="btn btn--radius btn-success" name="submit" type="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>

        </form>

    </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    <?php  }  ?>


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

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>