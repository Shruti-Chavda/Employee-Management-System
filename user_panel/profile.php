<?php  include('session.php');  ?>

<?php
include('connection.php');
if(isset($_GET['edit']))
{
    $a=$_GET['edit'];
    $res=mysqli_query($con,"select * from employees where id='$a'");
    $rec=mysqli_fetch_array($res);
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


    <title>Update profile</title>
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

    <?php include('sidebar.php'); ?>


    <?php include('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        
    <form id="registrationForm" method="POST" enctype="multipart/form-data">
        <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">

                            <!-- Other form elements -->
                            <h2 class="title">Update Profile</h2>

                            <!-- NID -->
                            <div>
                                <p>NID</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="NID" name="nid" id="nid"
                                        value="<?php echo $rec['1']; ?>" readonly />
                                    <span id="nid_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div>
                                <p>User Name</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="User Name" name="un" id="un"
                                        value="<?php echo $rec['5']; ?>" readonly />
                                    <span id="un_err" class="error1 p-1"></span>
                                </div>
                            </div>


                            <!-- First Name -->
                            <div>
                                <p>First Name</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="First Name" name="fn"
                                        id="firstName" value="<?php echo $rec['2']; ?>" />
                                    <span id="fn_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div>
                                <p>Last Name</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="Last Name" name="ln"
                                        id="lastName" value="<?php echo $rec['3']; ?>" />
                                    <span id="ln_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <p>Email</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="email" placeholder="Email" name="email"
                                        id="email" value="<?php echo $rec['6']; ?>" readonly />
                                    <span id="email_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <p>Date of Birth</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="date" name="dob" id="dob"
                                        value="<?php echo $rec['8']; ?>" />
                                    <span id="dob_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div>
                                <p>Gender</p>
                                <div class="input-group1">
                                    <?php $gender = $rec['9']; ?>
                                    <select class="input--style-1" name="gender" id="gender">
                                        <option value="Male" <?php if($gender == 'Male') echo 'selected'; ?>>Male
                                        </option>
                                        <option value="Female" <?php if($gender == 'Female') echo 'selected'; ?>>Female
                                        </option>
                                    </select>
                                    <span id="gender_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <!-- Contact Number -->
                            <div>
                                <p>Contact Number</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="Contact Number"
                                        name="contactNumber" id="contactNumber" value="<?php echo $rec['10']; ?>" />
                                    <span id="contactNumber_err" class="error1 p-1"></span>
                                </div>
                            </div>


                            <!-- Address -->
                            <div>
                                <p>Address</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="Address" name="address"
                                        id="address" value="<?php echo $rec['11']; ?>" />
                                    <span id="address_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div>
                                <p> Department</p>
                                <div class="input-group1">
                                    <?php $dept = $rec['12']; ?>
                                    <select name="department" id="department" class="input--style-1">
                                        <option value="IT" <?php if($dept == 'IT') echo 'selected';?>>IT</option>
                                        <option value="HR" <?php if($dept == 'HR') echo 'selected';?>>HR</option>
                                        <option value="Finance" <?php if($dept == 'Finance') echo 'selected';?>>Finance
                                        </option>
                                        <option value="Marketing" <?php if($dept == 'Marketing') echo 'selected';?>>
                                            Marketing</option>
                                        <option value="Operations" <?php if($dept == 'Operations') echo 'selected';?>>
                                            Operations</option>
                                    </select>
                                    <span id="department_err" class="error-msg"></span><br><br>
                                </div>
                            </div>

                            <!-- Degree -->
                            <div>
                                <p> Degree</p>
                                <?php $deg = $rec['13']; ?>
                                <div class="input-group1">
                                    <select id="degree" name="degree" class="input--style-1">
                                        <option value="BTech" <?php if($deg == 'BTech') echo 'selected';?>>BTech
                                        </option>
                                        <option value="BSc" <?php if($deg == 'BSc') echo 'selected';?>>BSc</option>
                                        <option value="BCA" <?php if($deg == 'BCA') echo 'selected';?>>BCA</option>
                                        <option value="MCA" <?php if($deg == 'MCA') echo 'selected';?>>MCA</option>
                                        <option value="MTech" <?php if($deg == 'MTech') echo 'selected';?>>MTech
                                        </option>
                                        <option value="MSc" <?php if($deg == 'MSc') echo 'selected';?>>MSc</option>
                                        <option value="PhD" <?php if($deg == 'PhD') echo 'selected';?>>PhD</option>
                                        <option value="Diploma" <?php if($deg == 'Diploma') echo 'selected';?>>Diploma
                                        </option>
                                        <option value="Associate Degree"
                                            <?php if($deg == 'Associate Degree') echo 'selected';?>>Associate Degree
                                        </option>
                                        <option value="PG Diploma" <?php if($deg == 'PG Diploma') echo 'selected';?>>PG
                                            Diploma</option>
                                    </select>
                                    <span id="degree_err" class="error-msg"></span><br><br>
                                </div>
                            </div>


                          
                            <p>Profile picture</p>

<?php
if(isset($_GET['edit']))
{
$id= $_GET['edit'];
$q = "select * from employees where id='$id'";
$res = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($res)) { ?>
<img class="img-profile rounded-circle" height="100px" width="100px" src="Uploads/<?php echo $row['14']; ?>"/><?php  }}  ?>

<div class="input-group1">
    <input class="input--style-1" type="file" placeholder="Upload Image" name="f1"
        id="f1" />
</div>
<?php


$dir = "Uploads";

if (isset($_POST['submit'])) {
$file_uploaded = false;

// Check if a file is selected
if (!empty($_FILES['f1']['name'])) {
// Process file upload if a file is selected
if (!is_dir($dir)) {
mkdir($dir);
}

$total_files = is_array($_FILES['f1']['name']) ? count($_FILES['f1']['name']) : 1;

// Loop through each uploaded file
for ($i = 0; $i < $total_files; $i++) {
$file_name = is_array($_FILES['f1']['name']) ? $_FILES['f1']['name'][$i] : $_FILES['f1']['name'];
$file_type = is_array($_FILES['f1']['type']) ? $_FILES['f1']['type'][$i] : $_FILES['f1']['type'];
$tmp_name = is_array($_FILES['f1']['tmp_name']) ? $_FILES['f1']['tmp_name'][$i] : $_FILES['f1']['tmp_name'];

if ($file_type == 'image/jpeg' || $file_type == 'image/png') {
// Generate unique filename
$unique_filename = uniqid() . '_' . $file_name;
$target_path = $dir . "/" . $unique_filename;

// Move uploaded file to target directory
if (move_uploaded_file($tmp_name, $target_path)) {
$file_uploaded = true;
} else {
echo "<span style='color:red'>Error uploading file '$file_name'. Please try again</span><br>";
}
} else {
echo "<span style='color:red'>Please select one file in JPG or PNG format</span><br>";
}
}
} else {
// No file selected, proceed with form submission without updating the image
$file_uploaded = true;
}

if ($file_uploaded) {
    $un = $_SESSION['username'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $contactNumber = $_POST['contactNumber'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $degree = $_POST['degree'];
    $full_name = $fn . " " . $ln;

// Include the code to update other fields in the database
$ins = "UPDATE `employees` SET `first_name`='$fn',`last_name`='$ln', `birthday`='$dob',`gender`='$gender',`contact`='$contactNumber',`address`='$address',`department`='$department',`degree`='$degree'";
if (!empty($unique_filename)) {
// If a new file is uploaded, include it in the update query
$ins .= ", `profile_pic`='$unique_filename'";
}
$ins .= " WHERE `id`='$id'";

if (mysqli_query($con, $ins)) {
echo "<script>alert('Form updated successfully!');</script>";
echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/Manage_profile.php';</script>";
} else {
echo "Error: ";
}
}
}

?>


                            <div class="p-t-20">
                                <button class="btn btn--radius btn-success" name="submit" type="submit">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    </form>


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

    <script src="js/update_profile.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>