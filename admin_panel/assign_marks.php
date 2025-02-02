<?php
include('session.php');
include('connection.php');

if(isset($_GET['edit']))
{
    $a=$_GET['edit'];
    $res=mysqli_query($con,"select * from projects where p_id='$a'");
    $rec=mysqli_fetch_array($res);
    
    // Fetching leader ID and name from the employees table based on the leader_id stored in $rec
    $leader_id = $rec['leader_id'];
    $leader_query = "SELECT id, CONCAT(first_name, ' ', last_name) AS leader_name FROM employees WHERE id = '$leader_id'";
    $leader_result = mysqli_query($con, $leader_query);

    if (isset($_POST['submit'])) {
        
        $b = isset($_GET['edit']) ? $_GET['edit'] : '';
        
        // Retrieve form data
        $nid = $_POST['nid'];
        $nm = $_POST['nm'];
        $des = $_POST['des'];
        $dd = $_POST['dd'];
        $sd = $_POST['sd'];
        $p = $_POST['p'];
        $status = "Remarked";

        // Update query
        $update_query = "UPDATE projects SET p_name='$nm', p_description='$des', due_date='$dd', sub_date='$sd', points='$p', status='$status' WHERE p_id='$b'";

        // Execute query
        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Record updated successfully!');</script>";
            echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/project_status.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
            echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/project_status.php';</script>";
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

    <title>Assign Marks</title>

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
    <form id="registrationForm" method="POST" enctype="multipart/form-data">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Assign Marks</h2>

                            <input type="hidden" name="nid" value="<?php echo isset($rec['p_id']) ? $rec['p_id'] : ''; ?>" />


                            <div>
                                <p>Employee Info</p>
                                <div class="input-group1">
                                    <select class="input--style-1" name="n">
                                        <?php
            // Check if leader data is fetched successfully
            if(mysqli_num_rows($leader_result) > 0) {
                $leader_data = mysqli_fetch_array($leader_result);
                // Display the leader's ID and name as an option in the dropdown
                echo '<option value="' . $leader_data['id'] . '">' . $leader_data['id'] . ' - ' . $leader_data['leader_name'] . '</option>';
            } else {
                echo '<option value="">No leader found</option>';
            }
            ?>
                                    </select>
                                    <span id="nm_err" class="error1 p-1"></span>
                                </div>
                            </div>


                            <div>

                                <div>
                                    <p>Project Name</p>
                                    <div class="input-group1">
                                        <!-- Displaying Project Name -->
                                        <input class="input--style-1" type="text" placeholder="Project Name" name="nm"
                                            value="<?php echo isset($rec['p_name']) ? $rec['p_name'] : ''; ?>" />
                                        <span id="nm_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div>
                                    <p>Description</p>
                                    <div class="input-group1">
                                        <!-- Displaying Description -->
                                        <textarea class="input--style-1" type="text" placeholder="Description"
                                            name="des"><?php echo isset($rec['p_description']) ? $rec['p_description'] : ''; ?></textarea>
                                        <span id="des_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div>
                                    <p>Due Date</p>
                                    <div class="input-group1">
                                        <!-- Displaying Due Date -->
                                        <input class="input--style-1" type="date" placeholder="Due date" name="dd" id="dd"
                                            value="<?php echo isset($rec['due_date']) ? $rec['due_date'] : ''; ?>" />
                                        <span id="dd_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div>
                                    <p>Submission Date</p>
                                    <div class="input-group1">
                                        <!-- Displaying Submission Date -->
                                        <input class="input--style-1" type="date" placeholder="Submission date" id="sd" name="sd" value="<?php echo isset($rec['sub_date']) ? $rec['sub_date'] : ''; ?>" />
                                        <span id="sd_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div>
                                    <p>Assigned Marks</p>
                                    <div class="input-group1">
                                        <!-- Displaying Assigned Marks as a dropdown -->
                                        <select class="input--style-1" name="p">
                                            <?php
            // Loop to generate options for marks from 0 to 100
            for ($i = 0; $i <= 100; $i += 10) {
                // Check if the selected mark matches the value in $rec['points']
                $selected = isset($rec['points']) && $rec['points'] == $i ? 'selected' : '';
                echo "<option value='$i' $selected>$i</option>";
            }
            ?>
                                        </select>
                                        <span id="p_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div>
                                    <p>Status</p>
                                    <div class="input-group1">
                                        <!-- Displaying Status as a dropdown -->
                                        <select class="input--style-1" name="status">
                                            <option value="submitted"
                                                <?php echo isset($rec['status']) && $rec['status'] == 'submitted' ? 'selected' : ''; ?>>
                                                Submitted</option>
                                            <option value="pending"
                                                <?php echo isset($rec['status']) && $rec['status'] == 'pending' ? 'selected' : ''; ?>>
                                                Pending</option>
                                        </select>
                                        <span id="status_err" class="error1 p-1"></span>
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
    </div>
    <!-- End of Main Content -->

    <?php
          include_once('footer.php');
          ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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