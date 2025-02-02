<?php 
include('session.php');
include('connection.php');

// Fetch total monthly costs from salary table
$query = "SELECT SUM(total_salary) AS total_monthly_costs FROM salary";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$total_monthly_costs = $row['total_monthly_costs'] ?? 0;

// Fetch total annual costs from salary table
$total_annual_costs = $total_monthly_costs * 12;

// Fetch total number of submitted projects
$query = "SELECT COUNT(*) AS total_submitted_projects FROM projects WHERE status = 'submitted'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$total_submitted_projects = $row['total_submitted_projects'] ?? 0;

// Calculate percentage of pending tasks
$pending_tasks_percentage = $total_submitted_projects * 20; // Each submitted project contributes 20%

// Fetch total number of pending leave requests
$query = "SELECT COUNT(*) AS total_pending_leave_requests FROM leaves WHERE status = 'pending'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$total_pending_leave_requests = $row['total_pending_leave_requests'] ?? 0;

// Fetch total number of employees
$query = "SELECT COUNT(*) AS total_employees FROM employees";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$total_employees = $row['total_employees'] ?? 0;

// Fetch total number of tours
$query = "SELECT COUNT(*) AS total_tours FROM tours";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$total_tours = $row['total_tours'] ?? 0;

// Fetch total number of events
$query = "SELECT COUNT(*) AS total_events FROM events";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$total_events = $row['total_events'] ?? 0;

$query = "SELECT * FROM projects";
$result = mysqli_query($con, $query);

// Check if 'del' parameter is set in the URL
if(isset($_GET['del'])) {
    // Get the project ID to delete
    $project_id = $_GET['del'];
    
    // Query to delete the project from the database
    $delete_query = "DELETE FROM projects WHERE p_id='$project_id'";
    
    // Execute the delete query
    if(mysqli_query($con, $delete_query)) {
        // If deletion is successful, redirect back to the same page
        echo "<script>alert('Record deleted successfully!');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/index.php';</script>";
    } else {
        // If deletion fails, display an error message
        echo "<script>alert('Error deleting record: " . mysqli_error($con) . "');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/index.php';</script>";
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
    <title>Admin Dashboard</title>
    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>
</head>

<body id="page-top">
    <?php  include('sidebar.php'); ?>
    <?php  include('header.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Total Costs (Monthly) -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="salary.php">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Costs (Monthly)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">₹<?php echo number_format($total_monthly_costs, 2); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Total Costs (Annual) -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="salary.php">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Costs (Annual)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">₹<?php echo number_format($total_annual_costs, 2); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Pending Tasks -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <a href="project_status.php">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Tasks
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $pending_tasks_percentage; ?>%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $pending_tasks_percentage; ?>%" aria-valuenow="<?php echo $pending_tasks_percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Pending Leave Requests -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="leaves.php">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Requests
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pending_leave_requests; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Total Employees -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="view_emp.php">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Employees
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_employees; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Total Tours -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="tours.php">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Tours
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_tours; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-plane fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Total Events -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="event.php">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Events
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_events; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</body>

</html>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Employees Leaderboard</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Project Name</th>
                            <th>Points</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Fetch data from projects table
                        $query = "SELECT * FROM projects";
                        $result = mysqli_query($con, $query);
                        $index = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $index++; ?></td>
                                <td><?php echo $row['leader_name']; ?></td>
                                <td><?php echo $row['leader_email']; ?></td>
                                <td><?php echo $row['p_name']; ?></td>
                                <td><?php echo $row['points']; ?></td>
                                <td>
                                    <a href="assign_marks.php?edit=<?php echo $row['p_id']; ?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?del=<?php echo $row['p_id']; ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php 
                        } // End of while loop
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>