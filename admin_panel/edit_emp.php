<?php  include('session.php');  ?>
<?php
include('connection.php');
if(isset($_GET['edit']))
{
    $a=$_GET['edit'];
    $res=mysqli_query($con,"select * from employees where id='$a'");
    $rec=mysqli_fetch_array($res);
}

if(isset($_GET['del'])) {
    $id = $_GET['del'];
    $delete_query = "delete from employees where id=$id";
    if(mysqli_query($con, $delete_query)) {
        echo "<script>alert('Employee deleted successfully!');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/view_emp.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/view_emp.php';</script>";
        exit();
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

    <title>Edit Employees</title>

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
        <form id="registrationForm" method="POST" enctype="multipart/form-data">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Edit Employees</h2>


                            <label>NID</label>
                            <div class="input-group1">
                                <input class="input--style-1" type="number" placeholder="NID" name="nid"
                                    value="<?php echo $rec[0]; ?>" readonly />
                                <span id="nid_err" class="error1 p-1"></span>
                            </div>

                            <label>First Name</label>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="First Name" name="fn"
                                    value="<?php echo $rec[2]; ?>" />
                                <span id="fn_err" class="error1 p-1"></span>
                            </div>

                            <p>Last Name</p>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="Last Name" name="ln"
                                    value="<?php echo $rec[3]; ?>" />
                                <span id="ln_err" class="error1 p-1"></span>
                            </div>

                            <p>Email</p>
                            <div class="input-group1">
                                <input class="input--style-1" type="email" placeholder="Email" name="em"
                                    value="<?php echo $rec['email']; ?>" readonly>
                                <span id="em_err" class="error1 p-1"></span>
                            </div>


                            <p>Username</p>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="UserName" name="un"
                                    value="<?php echo $rec['user_name']; ?>" readonly>
                            </div><br>

                            <div class="row">
                                <div class="col-6">
                                    <p>Birthday</p>
                                    <div class="input-group1">
                                        <input class="input--style-1" type="date" placeholder="BIRTHDATE" name="bd"
                                            value="<?php echo $rec['birthday']; ?>" />
                                        <span id="bd_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <p>Gender</p>
                                    <div class="input-group1">
                                        <label class="radio-container">Male
                                            <input type="radio" name="gender" value="Male"
                                                <?php if($rec['gender'] == 'Male') echo 'checked'; ?>>
                                            <span class="checkmark"></span>
                                        </label><br>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female"
                                                <?php if($rec['gender'] == 'Female') echo 'checked'; ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <span id="gender_err" class="error1 p-1"></span>
                                    </div>
                                </div>
                            </div>

                            <p>Contact Number</p>
                            <div class="input-group1">
                                <input class="input--style-1" type="number" placeholder="Contact Number" name="pn"
                                    value="<?php echo $rec['contact']; ?>" />
                                <span id="pn_err" class="error1 p-1"></span>
                            </div>


                            <p>Address</p>
                            <div class="input-group1">
                                <input class="input--style-1" type="text" placeholder="Address" name="ad"
                                    value="<?php echo $rec['address']; ?>" />
                                <span id="ad_err" class="error1 p-1"></span>
                            </div>

                            <div class="field-column">
                                <div>
                                    <label for="department">
                                        Department
                                    </label>
                                </div>
                                <div>
                                    <select name="department" class="input--style-1" id="department"
                                        class="demo-input-box">
                                        <option value="IT" <?php if($rec['department'] == 'IT') {echo 'selected';} ?>>IT
                                        </option>
                                        <option value="HR" <?php if($rec['department'] == 'HR') {echo 'selected';} ?>>HR
                                        </option>
                                        <option value="Finance"
                                            <?php if($rec['department'] == 'Finance') {echo 'selected';} ?>>Finance
                                        </option>
                                        <option value="Marketing"
                                            <?php if($rec['department'] == 'Marketing') {echo 'selected';} ?>>
                                            Marketing</option>
                                        <option value="Operations"
                                            <?php if($rec['department'] == 'Operations') {echo 'selected';} ?>>
                                            Operations</option>
                                    </select>
                                    <span id="department_err" class="error-msg"></span><br><br>
                                </div>
                            </div>

                            <div class="field-column">
                                <div>
                                    <label for="degree">
                                        Degree
                                    </label>
                                </div>
                                <div>
                                    <select name="degree" class="input--style-1" id="degree" class="demo-input-box">
                                        <option value="BTech" <?php if($rec['degree'] == 'BTech') {echo 'selected';} ?>>
                                            BTech</option>
                                        <option value="BSc" <?php if($rec['degree'] == 'BSc') {echo 'selected';} ?>>
                                            BSc</option>
                                        <option value="BCA" <?php if($rec['degree'] == 'BCA') {echo 'selected';} ?>>
                                            BCA</option>
                                        <option value="MCA" <?php if($rec['degree'] == 'MCA') {echo 'selected';} ?>>
                                            MCA</option>
                                        <option value="MTech" <?php if($rec['degree'] == 'MTech') {echo 'selected';} ?>>
                                            MTech</option>
                                        <option value="MSc" <?php if($rec['degree'] == 'MSc') {echo 'selected';} ?>>
                                            MSc</option>
                                        <option value="PhD" <?php if($rec['degree'] == 'PhD') {echo 'selected';} ?>>
                                            PhD</option>
                                        <option value="Diploma"
                                            <?php if($rec['degree'] == 'Diploma') {echo 'selected';} ?>>Diploma
                                        </option>
                                        <option value="Associate Degree"
                                            <?php if($rec['degree'] == 'Associate Degree') {echo 'selected';} ?>>
                                            Associate Degree</option>
                                        <option value="PG Diploma"
                                            <?php if($rec['degree'] == 'PG Diploma') {echo 'selected';} ?>>PG
                                            Diploma</option>
                                    </select>
                                    <span id="degree_err" class="error-msg"></span><br><br>
                                </div>
                            </div>

                            <div>
                                <label for="status">
                                    Status
                                </label>
                            </div>

                            <div>
                                <select name="status" class="input--style-1" id="status" class="demo-input-box">
                                    <option value="active" <?php if($rec['status'] == 'active') {echo 'selected';} ?>>
                                        active</option>
                                    <option value="inactive"
                                        <?php if($rec['status'] == 'inactive') {echo 'selected';} ?>>inactive
                                    </option>
                                </select>
                            </div><br>

                            <p>Profile picture</p>

                            <?php
if(isset($_GET['edit']))
{
$id= $_GET['edit'];
$q = "select * from employees where id='$id'";
$res = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($res)) { ?>
                            <img class="img-profile rounded-circle" height="100px" width="100px"
                                src="img/Uploads/<?php echo "profile.jpg" ?>" /><?php  }}  ?>

                            <div class="input-group1">
                                <input class="input--style-1" type="file" placeholder="Upload Image" name="f1"
                                    id="f1" />
                            </div> 
                            <?php

$dir = "img/Uploads/";
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
    $unique_filename = $file_name;
    $target_path = $dir . "/" . $unique_filename;
    // $user_panel_target_path = $dir1 . "/" . $unique_filename; // Second path

    // Move uploaded file to the first target directory
    $a=move_uploaded_file($tmp_name, $target_path);
    // $b=move_uploaded_file($tmp_name, $user_panel_target_path);
    if($a)
    {
        $file_uploaded = true;
    } else {
        echo "<span style='color:red'>Error uploading file '$file_name' to the first path. Please try again</span><br>";
    }
}
 else {
    echo "<span style='color:red'>Please select one file in JPG or PNG format</span><br>";
}

}
} else {
// No file selected, proceed with form submission without updating the image
$file_uploaded = true;

}

if ($file_uploaded) {
    $first_name = $_POST['fn'];
    $last_name = $_POST['ln'];
    $email = $_POST['em'];
    $contact = $_POST['pn'];
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $full_name = $first_name . " " . $last_name;
    $birthday = $_POST['bd']; 
    $gender = $_POST['gender'];
    $address = $_POST['ad'];
    $degree = $_POST['degree']; 
    $status = $_POST['status'];

    $ins = "UPDATE employees SET 
    first_name='$first_name', 
    last_name='$last_name', 
    email='$email', 
    contact='$contact', 
    department='$department', 
    birthday='$birthday', 
    gender='$gender', 
    full_name='$full_name',
    address='$address', 
    degree='$degree', 
    status='$status' WHERE `id`='$a'";

        
if (mysqli_query($con, $ins)) {
echo "<script>alert('Form updated successfully!');</script>";
echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/view_emp.php';</script>";
} else {
echo "Error: " . mysqli_error($con);
}
    }
}

?>

                            <div class="p-t-20 p-2">
                                <button class="btn btn--radius btn-success" name="submit" type="submit">Submit</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>

    </div>


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


    <script src="js/edit_emp.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>