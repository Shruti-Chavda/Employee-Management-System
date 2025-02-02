
<?php
    include('session.php');
    include('connection.php');

    if(isset($_GET['edit'])) {
        $event_id = $_GET['edit'];
        // Fetch event details from the database
        $query = "SELECT * FROM events WHERE id='$event_id'";
        $result = mysqli_query($con, $query);
        $event_details = mysqli_fetch_assoc($result);
        
    if (isset($_POST['submit'])) {
        
        $event_id = isset($_GET['edit']) ? $_GET['edit'] : '';
        
        // Retrieve form data
        $event_name = $_POST['event_name'];
        $description = $_POST['description'];
        $event_date = $_POST['event_date'];
        $starting_time = $_POST['starting_time'];
        $ending_time = $_POST['ending_time'];
        $address = $_POST['address'];

        // Update query
        $update_query = "UPDATE events SET name='$event_name', description='$description', date='$event_date', starting_time='$starting_time', ending_time='$ending_time', address='$address' WHERE id='$event_id'";

        // Execute query
        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Record updated successfully!');</script>";
            echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
            echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event.php';</script>";
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
    <title>Add Events</title>
    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/edit_events.js"></script>

</head>

<body id="page-top">

    <?php include('sidebar.php'); ?>
    <?php include('header.php'); ?>

    <div class="container-fluid">
        <form id="editEventForm" method="POST" enctype="multipart/form-data">
            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Edit Event</h2>
                     
                            <p>Event Name</p>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="Event Name" name="event_name"
                                    value="<?php echo $event_details['name']; ?>" />
                                    <span id="en_err" class="error1 p-1"></span>

                            </div>

                            <p>Description</p>
                            <div class="input-group1">
                                <textarea class="input--style-1" placeholder="Description"
                                    name="description"><?php echo $event_details['description']; ?></textarea>
                                    <span id="ds_err" class="error1 p-1"></span>

                            </div>

                            <p>Event Date</p>
                            <div class="input-group1">
                                <input class="input--style-1" type="date" name="event_date"
                                    value="<?php echo $event_details['date']; ?>" />
                                    <span id="dt_err" class="error1 p-1"></span>

                            </div>
                            <div id="a1">
                            <p>Event Starting Time</p>
                            <div class="input-group1">
                                <input class="input--style-1" id="starting_time" type="time" name="starting_time"
                                    value="<?php echo $event_details['starting_time']; ?>" />
                                    <span id="st_err" class="error1 p-1"></span>

                            </div>
                            <p>Event Ending Time</p>
                            <div class="input-group1">
                                <input class="input--style-1" id="ending_time" type="time" name="ending_time"
                                    value="<?php echo $event_details['ending_time']; ?>" />
                                    <span id="et_err" class="error1 p-1"></span>

                            </div>
                            </div>
                            <p>Address</p>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="Address" name="address"
                                    value="<?php echo $event_details['address']; ?>" />
                                    <span id="ad_err" class="error1 p-1"></span>

                            </div>
                            <div class="p-t-20">
                                <button type="submit" class="btn btn--radius btn-success" name="submit">Update
                                    Event</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

    <?php include_once('footer.php'); ?>
    
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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

</body>

</html>
