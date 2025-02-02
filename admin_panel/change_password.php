<?php
include_once('session.php');
include_once('connection.php');

$un = $_SESSION['username'];

if(isset($_GET['op']) && isset($_GET['np']) && isset($_GET['cp'])) {
    $old_password = $_GET['op'];
    $new_password = $_GET['np'];
    $confirm_password = $_GET['cp'];

    $query = "SELECT * FROM admin WHERE user_name = '$un' AND password = '$old_password'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    //echo $count;

    if ($count == 0) {
        echo "<script>alert('Old password is incorrect');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/change_password.php';</script>";
    } else {
        if ($new_password == $confirm_password) {
            $update_query = "UPDATE admin SET password = '$new_password' WHERE user_name = '$un'";
            if (mysqli_query($con, $update_query)) {
                echo "<script>alert('Password updated successfully');</script>";
                echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/change_password.php';</script>";

            } else {
                echo "<script>alert('Error in updating Password');</script>";
                echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/change_password.php';</script>";

            }
        } else {
            echo "<script>alert('New password and confirm password do not match');</script>";
            echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/change_password.php';</script>";

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

    <title>Change Password</title>

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
    <script src="js/show_password.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/cp.js"></script>

</head>

<body id="page-top">

<?php  include('sidebar.php'); ?>

<?php  include('header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <form id="registrationForm" action="" method="POST">
                            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                                <div class="wrapper wrapper--w680">
                                    <div class="card card-1">
                                        <div class="card-heading"></div>
                                        <div class="card-body">
                                            <h2 class="title">Change Password</h2>
                                         
                                            <div>
                                                <p>Enter your old password</p>
                                                <div class="input-group1">
                                                    <input class="input--style-1" type="password"
                                                        placeholder="Old password" id="old_pwd" name="op" onblur="verify_old_pwd(document.getElementById('old_pwd').value)"/>
                                                    <span id="op_err" class="error1 p-1"></span>
                                                </div>
                                            </div>

                                            <div>
                                                <p>Enter your New password</p>
                                                <div class="input-group1">
                                                    <input class="input--style-1 np" type="password"
                                                        placeholder="New password" id="np" name="np" />
                                                    <span id="np_err" class="error1 p-1"></span>
                                                </div>
                                            </div>

                                            <div>
                                                <p>Enter your Confirm password</p>
                                                <div class="input-group1">
                                                    <input class="input--style-1 cp" type="password"
                                                        placeholder="Confirm password" id="cp" name="cp" />
                                                    <span id="cp_err" class="error1 p-1"></span>
                                                </div>
                                            </div>

                                            <input type="checkbox" onclick="myFunction()"> Show Password <br><br>

                                            <div class="p-t-20">
                                                <button class="btn btn--radius btn-success" name="submit" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>