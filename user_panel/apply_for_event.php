<?php  include('session.php'); 

$id = $_SESSION['user_id'];
$q1="select * from employees where id=$id";
$result = mysqli_query($con, $q1);
$employee_detail = mysqli_fetch_assoc($result);

if(isset($_GET['apply'])) {
    // Prepare a statement
    $idd=$_GET['apply'];
    $query = "SELECT * FROM events WHERE id=$idd";
    $res = mysqli_query($con, $query);
    $event_details = mysqli_fetch_assoc($res);
}

if(isset($_POST['btn'])) { 


    $i1=$_POST['id'];
    $employee_name = $_POST['emp'];
    $mobile_number = $_POST['mb'];
    $event_date = $_POST['event_date'];
    $event_starting_time = $_POST['start_time'];
    $event_ending_time = $_POST['end_time'];
    $venue_address = $_POST['venue_address'];
    $title_of_participation = $_POST['service'];
    $additional_information = $_POST['additional_info'];
    
    
    $check_query = "SELECT * FROM event_pt WHERE event_id= '$i1'";
    $check_result = mysqli_query($con, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Record already exists for this employee!');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/event.php';</script>";
    } else {
        // Insert new record
        $insert_query = "INSERT INTO event_pt (event_id, employee_name, mobile_number, event_date, event_starting_time, event_ending_time, venue_address, title_of_participation, additional_information, admin_remark) 
            VALUES ('$i1','$employee_name', '$mobile_number', '$event_date', '$event_starting_time', '$event_ending_time', '$venue_address', '$title_of_participation', '$additional_information','Applied')";
    }
        
    if(mysqli_query($con, $insert_query)) {
        if(isset($_GET['apply'])) {
            // Prepare a statement
            $idddd=$_GET['apply'];
    // Perform database update
    $u_query = "UPDATE event_pt 
    SET employee_name = '$employee_name', 
        mobile_number = '$mobile_number', 
        event_date = '$event_date', 
        event_starting_time = '$event_starting_time', 
        event_ending_time = '$event_ending_time', 
        venue_address = '$venue_address', 
        title_of_participation = '$title_of_participation', 
        additional_information = '$additional_information', 
        admin_remark = 'Applied' WHERE id=$idddd";
        }
    if(mysqli_query($con, $u_query)) {
        
if(isset($_GET['apply'])) {
    // Prepare a statement
    $id=$_GET['apply'];
        $q="UPDATE event_pt set admin_remark='Applied' where id=$id";
        $res1 = mysqli_query($con, $q);
}
        echo "<script>alert('Applid successfully!');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/event.php';</script>";
    } 
}else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/event.php';</script>";
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

    <title>Apply for Event</title>
    <link href="img/favicon.png" rel="icon">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- <script src="js/jquery-3.6.4.min.js"></script> -->
    <script src="js/search.js"></script>


    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="css/main.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/apply_for_event.js"></script>
</head>

<body id="page-top">

    <?php include('sidebar.php'); ?>


    <?php include('topbar.php'); ?>


    <div class="container-fluid">
        <form id="registrationForm" action="apply_for_event.php" method="post" enctype="multipart/form-data">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Apply for Event</h2>
                       
                            <div>
                                <p>Employee Name</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="Employee Name" name="emp"
                                        value="<?php echo $employee_detail['full_name']; ?>" readonly />
                                    <span id="emp_err" class="error1 p-1"></span>
                                </div>
                            </div>

                                <div>
                                    <p>Mobile number</p>
                                    <div class="input-group1">
                                        <input class="input--style-1" type="text" placeholder="Mobile Number" name="mb"
                                            value="<?php echo $employee_detail['contact']; ?>" readonly />
                                        <span id="mb_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?php echo $event_details['id']; ?>">

                                <div>
                                    <p>Event Date</p>
                                    <div class="input-group1">
                                        <input class="input--style-1" type="date" name="event_date"
                                            value="<?php echo $event_details['date']; ?>" readonly />
                                        <span id="event_date_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div>
                                    <p>Event Starting Time</p>
                                    <div class="input-group1">
                                        <input class="input--style-1" type="time" name="start_time"
                                            value="<?php echo $event_details['starting_time']; ?>" readonly />
                                        <span id="start_time_err" class="error1 p-1"></span>

                                    </div>
                                </div>

                                <div>
                                    <p>Event Ending Time</p>
                                    <div class="input-group1">
                                        <input class="input--style-1" type="time" name="end_time"
                                            value="<?php echo $event_details['ending_time']; ?>" readonly />
                                        <span id="end_time_err" class="error1 p-1"></span>

                                    </div>
                                </div>

                                <div>
                                    <p>Venue Address</p>
                                    <div class="input-group1">
                                        <input class="input--style-1" type="text" placeholder="Venue Address"
                                            name="venue_address" value="<?php echo $event_details['address']; ?>"
                                            readonly />
                                        <span id="venue_address_err" class="error1 p-1"></span>

                                    </div>
                                </div>

                                <div>
                                    <p>Title of participartion</p>
                                    <div class="input-group1">
                                    <?php
        // Fetch data from event_pt table
        $event_pt_query = "SELECT * FROM event_pt WHERE id = $idd";
        $event_pt_result = mysqli_query($con, $event_pt_query);
        $event_pt_row = mysqli_fetch_assoc($event_pt_result);

        // Check if data exists and assign it to variables
        $title_of_participation = isset($event_pt_row['title_of_participation']) ? $event_pt_row['title_of_participation'] : '';
        ?>
                                         <input class="input--style-1" type="text" placeholder="Title of participation" name="service"
            value="<?php echo $title_of_participation; ?>" />
                                        <span id="service_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div>
                                    <p>Additional Information</p>
                                    <div class="input-group1">
                                    <?php
        // Assign additional information to a variable
        $additional_info = isset($event_pt_row['additional_information']) ? $event_pt_row['additional_information'] : '';
        ?>
        <input class="input--style-1" type="text" placeholder="Additional Information" name="additional_info"
            value="<?php echo $additional_info; ?>" />
                                        <span id="additional_info_err" class="error1 p-1"></span>

                                    </div>
                                </div>

                                <div class="p-t-20">
                                    <button class="btn btn--radius btn-success" type="submit" name="btn">Submit</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
        </form>


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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>