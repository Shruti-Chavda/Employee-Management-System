<?php  include('session.php');  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Skills</title>
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

</head>


<body id="page-top">
    <?php  include('sidebar.php'); ?>

    <?php  include('header.php'); ?>

    <div class="container-fluid">
        <form id="registrationForm" action="add_skills.php" method="POST">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Skills Form</h2>

                            <div>
                                <p>Title</p>
                                <div class="input-group1">
                                    <input class="input--style-1"
                                        value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>" type="text"
                                        placeholder="Enter a title" name="title" />
                                </div><br>
                            </div>

                            <div>
                                <p>Progress</p>
                                <div class="input-group1">
                                    <input class="input--style-1"
                                        value="<?php if(isset($_POST['progress'])) echo $_POST['progress']; ?>" type="number"
                                        placeholder="Enter a progress" name="progress" />
                                </div><br>
                            </div>

                            <div>
                                <p>Color</p>
                                <div class="input-group1">
                                    <select class="input--style-1" name="color">
                                        <option value="">Select a color</option>
                                        <option value="primary">primary</option>
                                        <option value="secondary">secondary</option>
                                        <option value="success">success</option>
                                        <option value="danger">danger</option>
                                        <option value="warning">warning</option>
                                        <option value="info">info</option>
                                        <option value="dark">dark</option>
                                        <option value="muted">muted</option>
                                    </select>
                                </div><br>
                            </div>

                            <div class="p-t-20 p-2">
                                <button class="btn btn--radius btn-success" name="btn" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

    </div>


    <?php
include('connection.php');

if(isset($_POST['btn'])) {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $progress = isset($_POST['progress']) ? $_POST['progress'] : '';
    $color = isset($_POST['color']) ? $_POST['color'] : '';

    // Insert data into the database
    $q = "INSERT INTO guest_our_skills (title, progress, color) VALUES ('$title', '$progress', '$color')";
    if(mysqli_query($con, $q)) {
        echo "<script>alert('Form submitted successfully!');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/add_skills.php';</script>";
    } else {
        echo "Error: " . $q . "<br>" . mysqli_error($con);
    }
}
?>


    </div>

    </div>

    <?php
        include_once('footer.php');
          ?>

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

    <script src="js/Guest panel js/add_skills.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>