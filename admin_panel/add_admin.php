<?php  include('session.php');  ?>

<?php
include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Admin</title>

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
    <script>
    function myFunction() {

        var y = document.getElementById("np");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }

        var z = document.getElementById("cp");
        if (z.type === "password") {
            z.type = "text";
        } else {
            z.type = "password";
        }
    }
    </script>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>

</head>

<body id="page-top">

    <?php  include('sidebar.php'); ?>

    <?php  include('header.php'); ?>

    <div class="container-fluid">
        <form id="registrationForm" method="POST" enctype="multipart/form-data">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Add admin</h2>

                                <p>First Name</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="First Name" name="fn" />
                                    <span id="fn_err" class="error1 p-1"></span>
                                </div>

                                <p>Email</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="email" placeholder="Email" name="em" />
                                    <span id="em_err" class="error1 p-1"></span>
                                </div>


                                <p>Gender</p>
                                <div class="input-group1">
                                    <label class="radio-container">Male
                                        <input type="radio" name="gender" value="Male">
                                        <span class="checkmark"></span>
                                    </label><br>
                                    <label class="radio-container">Female
                                        <input type="radio" name="gender" value="Female" checked>
                                        <span class="checkmark"></span>
                                    </label>

                                </div>


                                <p>Contact Number</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="number" placeholder="Contact Number"
                                        name="pn" />
                                    <span id="pn_err" class="error1 p-1"></span>
                                </div>


                                <p>Password</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="password" placeholder="Create a password"
                                        id="np" name="np" />
                                    <span id="ps_err" class="error1 p-1"></span>
                                </div>

                                <p>Confirm Password</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="password" placeholder="Confirm password" id="cp"
                                        name="cp" />
                                    <span id="cp_err" class="error1 p-1"></span>
                                </div>

                                <input type="checkbox" onclick="myFunction()"> Show Password <br><br>


                                <p>Profile picture</p>

                                <div class="input-group1">
                                    <input class="input--style-1" type="file" placeholder="Upload Image" name="f1"
                                        id="f1" />
                                </div>
                                <?php
include('connection.php');

$dir = "img/Uploads";


if (isset($_POST['submit'])) {

    $file_uploaded = false;

    if (!is_dir($dir)) {
        mkdir($dir);
    }

    // Check if any file is selected
    if (!empty($_FILES['f1']['name'])) {
        $total_files = is_array($_FILES['f1']['name']) ? count($_FILES['f1']['name']) : 1;

        for ($i = 0; $i < $total_files; $i++) {
            $file_name = is_array($_FILES['f1']['name']) ? $_FILES['f1']['name'][$i] : $_FILES['f1']['name'];
            $file_type = is_array($_FILES['f1']['type']) ? $_FILES['f1']['type'][$i] : $_FILES['f1']['type'];
            $tmp_name = is_array($_FILES['f1']['tmp_name']) ? $_FILES['f1']['tmp_name'][$i] : $_FILES['f1']['tmp_name'];

            if ($file_type == 'image/jpeg' || $file_type == 'image/png') {
                $unique_filename = uniqid() . '_' . $file_name;
                $target_path = $dir . "/" . $unique_filename;

                if (move_uploaded_file($tmp_name, $target_path)) {
                    $file_uploaded = true;
                } else {
                    echo "<span style='color:red'>Error: Uploading file</span><br>";
                }
            } else {
                echo "<span style='color:red'>Only Jpg and Png formats are allowed</span><br>";
            }
        }
    } else {
        echo "<span style='color:red'>Please select file</span><br>";
    }

    if ($file_uploaded) {
        $un1 = $_POST['fn'];
        $em1 = $_POST['em'];
        $cn1 = $_POST['pn'];
        $gen1 = $_POST['gender'];
        $password = $_POST['np'];

        $sql_check_email = "SELECT * FROM admin WHERE email = '$em1'";
        $result_check_email = mysqli_query($con, $sql_check_email);

        $sql_check_un = "SELECT * FROM admin WHERE user_name = '$un1'";
        $result_check_un = mysqli_query($con, $sql_check_un);

        if (mysqli_num_rows($result_check_email) > 0) {
            echo "<script>alert('Error: Admin with this email already exists');</script>";
        } elseif (mysqli_num_rows($result_check_un) > 0) {
            echo "<script>alert('Error: Admin with this username already exists');</script>";
        } else {

            $ins = "INSERT INTO admin (user_name, email, gender, contact, pic, password) VALUES ('$un1', '$em1', '$gen1', '$cn1', '$unique_filename', '$password')";

            if (mysqli_query($con, $ins)) {
                echo "<script>alert('Registered successfully!');</script>";
                echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/Manage_profile.php';</script>";
            }
        }
    }
}
?><br>
                                <div class="p-t-20">
                                    <button type="submit" class="btn btn--radius btn-success" name="submit">Submit
                                        Info</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>



    <?php
        include_once('footer.php');
          ?>

    </div>

    </div>

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

        <script src="js/profile.js"></script>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/sb-admin-2.min.js"></script>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="js/demo/datatables-demo.js"></script>

</body>

</html>