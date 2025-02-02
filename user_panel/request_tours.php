<?php include('session.php');  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Dashboard</title>
    <link href="img/favicon.png" rel="icon">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="css/main.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/tours.js"></script>
</head>

<body id="page-top">

    <?php include('sidebar.php'); ?>


    <?php include('topbar.php'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <form id="registrationForm" action="request_tours.php" method="POST">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Tour Request</h2>

                            <input type="hidden" name="id">

                            <LABEL>NID</LABEL>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="NID" name="nid" readonly />
                                <span id="nid_err" class="error1 p-1"></span>
                            </div>

                            <LABEL>Employee Name</LABEL>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="Employee Name" name="nm" readonly />
                                <span id="nm_err" class="error1 p-1"></span>
                            </div>

                            <LABEL>Email</LABEL>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="Email" name="em" readonly/>
                                <span id="em_err" class="error1 p-1"></span>
                            </div>

                            <LABEL>Department</LABEL>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="Department" name="dep" readonly/>
                                <span id="dep_err" class="error1 p-1"></span>
                            </div>

                            <LABEL>Contact</LABEL>
                            <div class="input-group1">
                                <input class="input--style-1" type="number" placeholder="Contact" name="pn" readonly/>
                                <span id="pn_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <p>Start date</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="date" placeholder="start date" name="sd" />
                                    <span id="sd_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div>
                                <p>End date</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="date" placeholder="End date" name="ed" />
                                    <span id="ed_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <LABEL>Description</LABEL>

                            <div class="input-group1">
                                <textarea class="input--style-1" type="text" placeholder="Description" name="des"></textarea>
                                <span id="des_err" class="error1 p-1"></span>
                            </div>



                            <label for="modeOfTravel">Mode of Travel:</label>
                            <select id="modeOfTravel" class="input--style-1" name="modeOfTravel" required>
                                <option value="airplane">Airplane</option>
                                <option value="train">Train</option>
                                <option value="bus">Bus</option>
                                <option value="car">Car</option>

                            </select><br><br>

                            <LABEL>Address</LABEL>

                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="Address" name="add"></input>
                                <span id="add_err" class="error1 p-1"></span>
                            </div>

                            <LABEL>Total Cost</LABEL>

                            <div class="input-group1">
                                <input class="input--style-1" type="number" placeholder="Total Estimated cost" name="cs"></input>
                                <span id="cs_err" class="error1 p-1"></span>
                            </div>


                            <div class="p-t-20">
                                <button class="btn btn--radius btn-success" type="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>

        </form>

    </div>
    </div>

    </div>
    <!-- /.container-fluid -->



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
                    <a class="btn btn-success" href="http://localhost/Employee%20Management%20System/user_panel/logout.php">Logout</a>
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
<?php
include('connection.php');
if (isset($_POST['submit'])) {
    // echo "hi";
    $eid = $_POST['eid'];
    $nid = $_POST['nid'];
    $nm = $_POST['nm'];
    $email = $_POST['em'];
    $dep = $_POST['dep'];
    $number = $_POST['pn'];
    $des = $_POST['des'];
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
    $address = $_POST['add'];
    $via = $_POST['modeOfTravel'];
    $cost = $_POST['cs'];
    $q = "INSERT INTO tours VALUES ('',$eid,'$nid','$nm','$email','$dep',$number,'$sd','$ed','$des','$address','$via',$cost)";
    // echo $q1;
    if (mysqli_query($con, $q)) {
        echo "<script>
    alert('Submitted successfully!');
</script>";
        echo "<script>
    window.location.href = 'http://localhost/Employee%20Management%20System/user_panel/tours.php';
</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}