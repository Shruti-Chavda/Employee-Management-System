<?php  include('session.php'); 
if(isset($_GET['submit']))
{
    $a=$_GET['submit'];
    $ress=mysqli_query($con,"select * from projects where p_id='$a'");
    $rec1=mysqli_fetch_array($ress);
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

    <title>Submit</title>
    <link href="img/favicon.png" rel="icon">  
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- <script src="js/jquery-3.6.4.min.js"></script> -->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="css/main.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
</head>

<body id="page-top">
    <?php include('sidebar.php'); ?>


    <?php include('topbar.php'); ?>


    <div class="container-fluid">
        <form id="registrationForm" action="" method="POST" enctype="multipart/form-data">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Submit</h2>

                            <div>
                                <p>Employee ID</p>
                                <div class="input-group1">
                                    <input class="input--style-1"  value="<?php echo $_SESSION['user_id']; ?>" type="number" placeholder="Employee ID" name="nid" readonly/>
                                    <span id="nid_err" class="error1 p-1"></span>
                                </div>
                                <div>

                                    <div>
                                        <p>Project Name</p>
                                        <div class="input-group1">
                                            <input class="input--style-1"  value="<?php echo $rec1['p_name']; ?>" type="text" placeholder="Project Name"
                                                name="nm" readonly/>
                                            <span id="nm_err" class="error1 p-1"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <p>Description</p>
                                        <div class="input-group1">
                                            <textarea class="input--style-1" type="text" placeholder="Description"
                                                name="des" readonly><?php echo $rec1['p_description']; ?> </textarea>
                                            <span id="des_err" class="error1 p-1"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <p>Due Date</p>
                                        <div class="input-group1">
                                            <input class="input--style-1" value="<?php echo $rec1['due_date']; ?>"  type="date" placeholder="Due date" name="dd" readonly/>
                                            <span id="dd_err" class="error1 p-1"></span>
                                        </div>
                                    </div>

                                            <input type="hidden" placeholder="Submission date"
                                                name="sd" />
                                        
                                    <div>
                                        <p>Submit</p>
                                        <div class="input-group1">
                                            <input class="input--style-1" type="file" id="f" name="f" />
                                            <span id="f_err" class="error1 p-1"></span>
                                        </div>
                                    </div>

                                    <?php
include('connection.php');

if(isset($_POST['btn'])) {
    $upload_dir = "Uploads/";

    // Get project details from the form
    $project_name = mysqli_real_escape_string($con, $_POST['nm']);
    $description = mysqli_real_escape_string($con, $_POST['des']);
    $due_date = $_POST['dd'];
    $file_name = $_FILES['f']['name'];
    $file_size = $_FILES['f']['size'];

    // Get leader's details from session
    $leader_id = $_SESSION['user_id']; // Assuming 'id' is the session key for user's ID
    $leader_name = $_SESSION['full_name']; // Assuming 'full_name' is the session key for user's full name
    $leader_email = $_SESSION['email']; // Assuming 'email' is the session key for user's email

    // Check if file size is less than 1MB
    if ($file_size <= 1048576) { // 1MB in bytes
        // Move uploaded file to the Uploads folder
        if (!empty($file_name)) {
            $file_path = $upload_dir . $file_name;
            if (move_uploaded_file($_FILES['f']['tmp_name'], $file_path)) {
                // Insert project details into the database
                $current_date = date('Y-m-d');
                $status = "submitted";
                $query = "UPDATE projects 
                SET 
                    sub_date = '$current_date',
                    file_name = '$file_name',
                    status = '$status'
                WHERE 
                    p_name = '$project_name' AND
                    p_description = '$description' AND
                    leader_id = '$leader_id' AND
                    leader_name = '$leader_name' AND
                    leader_email = '$leader_email' AND
                    due_date = '$due_date';";
                if(mysqli_query($con, $query)) {
                    echo "<script>alert('Project submitted successfully!');</script>";
                    echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/project_status.php';</script>";

                } else {
                    echo "Error: " . mysqli_error($con);
                    echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/project_status.php';</script>";
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "No file uploaded.";
        }
    } else {
        echo "<p style='color:red'>File size should be less than 1MB.</p>";
    }
}
?>


                                    <div class="p-t-20">
                                        <button class="btn btn--radius btn-success" type="submit"
                                            name="btn">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
        </form>

        <?php
if(isset($_POST['btn'])) {
    $upload_dir = "Uploads/"; // Specify the correct directory path
    $file_name = $_FILES['f']['name'];

    if (!empty($file_name)) {
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['f']['tmp_name'], $file_path)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded.";
    }
}
?>

    </div>

    </div>

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
                        href="http://localhost/Employee%20Management%20System/user_panel/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="js/submit.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>