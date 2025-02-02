<?php  include('session.php');  ?>
<?php 
include('connection.php'); // Include your database connection file

if(isset($_POST['submit'])) {
    // Retrieve data from the form
    $leader_id = $_POST['nid'];
    $project_name = $_POST['nm'];
    $description = $_POST['des'];
    $due_date = $_POST['dt'];

    // Fetch leader_name and leader_email from employees table based on leader_id
    $query = "SELECT * FROM employees WHERE id = $leader_id";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        // Fetch the row
        $row = mysqli_fetch_assoc($result);
        $leader_name = $row['full_name'];
        $leader_email = $row['email'];

        // Insert data into projects table
        $insert_query = "INSERT INTO projects (p_name, leader_id, leader_name, leader_email, p_description, due_date, sub_date, points, status)
                        VALUES ('$project_name', '$leader_id', '$leader_name', '$leader_email', '$description', '$due_date', '', 0, 'pending')";

        if(mysqli_query($con, $insert_query)) {
            echo "<script>alert('Project assigned successfully!');</script>";
            echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/project_status.php';</script>";
        } else {
            echo "<script>alert('Error: ".mysqli_error($con)."');</script>";
        }
    } else {
        echo "<script>alert('Leader with ID $leader_id does not exist');</script>";
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

    <title>Assign Project</title>

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
    <script src="js/assign_task.js"></script>

</head>

<body id="page-top">

    <?php  include('sidebar.php'); ?>

    <?php  include('header.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <form id="registrationForm" action="assign_project.php" method="POST">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Assign Project</h2>

                            <div>
                                <label>Select Employee</label>
                            </div>
                            <div>
                                <select class="input--style-1" name="nid">
                                    <?php
            // Fetch data from the employees table
            $query = "SELECT id, full_name FROM employees";
            $result = mysqli_query($con, $query);

            // Check if query was successful
            if ($result) {
                // Loop through each row and display id and full_name as options in the dropdown
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['id'] . " - " . $row['full_name'] . "</option>";
                }
            } else {
                // Display an error message if the query fails
                echo "<option value=''>Error fetching data</option>";
            }
            ?>
                                </select>
                                <span id="nid_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <label>Project Name</label>
                            </div>
                            <div>
                                <input class="input--style-1" type="text" placeholder="Project Name" name="nm" />
                                <span id="nm_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <label>Description</label>
                            </div>
                            <div>
                                <textarea class="input--style-1" type="text" placeholder="Description"
                                    name="des"></textarea>
                                <span id="des_err" class="error1 p-1"></span>
                            </div>

                            <div>
                                <label>Due Date</label>
                            </div>
                            <div>
                                <input class="input--style-1" type="date" placeholder="Due date" name="dt" />
                                <span id="dt_err" class="error1 p-1"></span>
                            </div>

                            <div id="a1">
                                <div>
                                    <label>Starting time</label>
                                </div>
                                <div>
                                    <input id="st" class="input--style-1" type="time" placeholder="Starting Time"
                                        name="st" />
                                    <span id="st_err" class="error1 p-1"></span>
                                </div>

                                <div>
                                    <label>End time</label>
                                </div>
                                <div>
                                    <input id="et" class="input--style-1" type="time" placeholder="Ending Time"
                                        name="et" />
                                    <span id="et_err" class="error1 p-1"></span>
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