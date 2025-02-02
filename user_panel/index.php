<?php include('session.php'); ?>

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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>
</head>

<body id="page-top">
    <?php include('sidebar.php'); ?>
    <?php include('topbar.php'); ?>

    <div class="container-fluid">

        <div class="row">
            <!-- Base Salary Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="salary.php" style="text-decoration: none; color: inherit;">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Base Salary
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        $id = $_SESSION['user_id'];
                                        $base_salary = 0; // Initialize base salary variable
                                        $query = "SELECT * FROM salary WHERE id = $id";
                                        $result = mysqli_query($con, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $base_salary = $row['base_salary'];
                                        }
                                        echo '₹' . $base_salary;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Bonus Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="salary.php" style="text-decoration: none; color: inherit;">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Bonus
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        $total_bonus = 0; // Initialize total bonus variable
                                        $query = "SELECT SUM(bonus) AS total_bonus FROM salary";
                                        $result = mysqli_query($con, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $total_bonus = $row['total_bonus'];
                                        }
                                        echo $total_bonus . '%';
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Due Projects Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="project_status.php" style="text-decoration: none; color: inherit;">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Due Projects
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <?php 
                                                $due_projects = 0; // Initialize due projects variable
                                                $query = "SELECT COUNT(*) AS due_projects FROM projects WHERE status = 'pending'";
                                                $result = mysqli_query($con, $query);
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    $due_projects = $row['due_projects'];
                                                }
                                                echo $due_projects;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: <?php echo ($due_projects * 10) . '%' ?>"
                                                    aria-valuenow="<?php echo $due_projects; ?>" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Leave History Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="leaves.php" style="text-decoration: none; color: inherit;">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Leave History
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        $leave_history = 0; // Initialize leave history variable
                                        $query = "SELECT COUNT(*) AS leave_history FROM leaves";
                                        $result = mysqli_query($con, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $leave_history = $row['leave_history'];
                                        }
                                        echo $leave_history;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Events Card -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="event.php" style="text-decoration: none; color: inherit;">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Events
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        $total_events = 0; // Initialize total events variable
                                        $query = "SELECT COUNT(*) AS total_events FROM events";
                                        $result = mysqli_query($con, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $total_events = $row['total_events'];
                                        }
                                        echo $total_events;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tours Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="tours.php" style="text-decoration: none; color: inherit;">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Tours
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        $total_tours = 0; // Initialize total tours variable
                                        $query = "SELECT COUNT(*) AS total_tours FROM tours";
                                        $result = mysqli_query($con, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $total_tours = $row['total_tours'];
                                        }
                                        echo $total_tours;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-plane fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Employees Leaderboard -->
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Fetch all employees data for leaderboard
                            $query = "SELECT * FROM projects";
                            $result = mysqli_query($con, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                $index = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $index++; ?></td>
                                        <td><?php echo $row['leader_name']; ?></td>
                                        <td><?php echo $row['leader_email']; ?></td>
                                        <td><?php echo $row['p_name']; ?></td>
                                        <td><?php echo $row['points']; ?></td>
                                    </tr>
                                <?php 
                                } // End of while loop
                            } else {
                                echo "<tr><td colspan='5'>No data available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

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
