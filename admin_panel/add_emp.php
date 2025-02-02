<?php
include('session.php'); 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/Exception.php');

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) { // Changed to 'register'
    // Retrieve form data
    $first_name = $_POST['fn'];
    $last_name = $_POST['ln'];
    $email = $_POST['em'];
    $password = $_POST['ps'];
    $contact = $_POST['pn'];
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $full_name = $first_name . " " . $last_name;
    $username = explode("@", $email)[0];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];
    $token = $_POST['token'];

    // Check if email already exists
    $sql_check_email = "SELECT * FROM employees WHERE email = '$email'";
    $result_check_email = mysqli_query($con, $sql_check_email);

    if (mysqli_num_rows($result_check_email) > 0) {
        echo "<script>alert('Error: User with this email already exists');</script>";
        echo "<script>window.location.replace('$_SERVER[PHP_SELF]');</script>";
        exit();
    } else {
        // Insert into employees table
        $sql_nid = "SELECT MAX(CAST(SUBSTRING(nid, 2) AS UNSIGNED)) AS max_nid FROM employees";
        $result_nid = mysqli_query($con, $sql_nid);
        $row_nid = mysqli_fetch_assoc($result_nid);
        $max_nid = $row_nid['max_nid'];
        $new_nid = 'N' . str_pad(($max_nid + 1), 2, "0", STR_PAD_LEFT);

$sql_insert_employee = "INSERT INTO employees (nid, first_name, last_name, full_name, user_name, email, password, contact, department, birthday, gender, address, degree, profile_pic, token) 
                       VALUES ('$new_nid', '$first_name', '$last_name', '$full_name', '$username', '$email', '$password', '$contact', '$department', '$birthday', '$gender', '$address', '$degree', 'profile.jpg', '$token')";


// $insert_employee_query = "INSERT INTO emp_login (user_name, password) VALUES ('$username', '$password')";

// if (mysqli_query($con, $insert_employee_query)) {


        if (mysqli_query($con, $sql_insert_employee)) {


          
$last_emp_id_query1 = "SELECT MAX(id) AS last_emp_id FROM employees";
$res1 = mysqli_query($con, $last_emp_id_query1);

$row1 = mysqli_fetch_assoc($res1);
$last_emp_id1 = $row1['last_emp_id'];
$new_emp_id1 = $last_emp_id1;

$insert_login_query = "INSERT INTO emp_login (user_name, password) VALUES ('$username', '$password')";
$ress= mysqli_query($con, $insert_login_query);

$last_emp_id_query = "SELECT MAX(id) AS last_emp_id FROM employees";
$res = mysqli_query($con, $last_emp_id_query);

$row = mysqli_fetch_assoc($res);
$last_emp_id = $row['last_emp_id'];
$new_emp_id = $last_emp_id;

$insert_salary_query = "INSERT INTO salary (`emp_id`,`base_salary`,`bonus`,`total_salary`) values ('$new_emp_id','15000','0%','15000')";
$resss=mysqli_query($con, $insert_salary_query);
   
                $mail = new PHPMailer();

                try {
                    // Server settings
                    $mail->isSMTP(); // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'chavdashruti516@gmail.com'; // SMTP username
                    $mail->Password = 'xwig fjqp gnea fqml'; // SMTP password
                    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465; // TCP port to connect to
                    $mail->SMTPDebug = 0;

                    // Recipients
                    $mail->setFrom('chavdashruti516@gmail.com', 'Shruti Chavda'); // Sender's email address and name
                    $mail->addAddress($email, $first_name); // Recipient's email address and name

                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'Account Verification';
                    $mail->Body = 'Congratulations! ' . $first_name . ' Your account has been created successfully.<br>This email is for your account verification.<br><b>Your Username: ' . $username . '</b><br>Kindly click on the link below to verify your account. You will be able to login into your account only after account verification.<br><a href="http://localhost/Employee%20Management%20System/admin_panel/verify_account.php?em=' . $email . '&token=' . $token . '">Click here to verify your account</a>';

                    // Send the email
                    if ($mail->send()) {
                        echo "<script>alert('Registration successful');</script>";
                    } else {
                        echo "<script>alert('Email sending failed.');</script>";
                    }
                } 
                
                catch (Exception $e) {
                    echo "Email sending failed. Error: {$mail->ErrorInfo}";
                }
            } 

           // }
            else {
                echo "Error in registration: " . mysqli_error($con);
            }
    }
}


    // $salary = isset($_POST['sal']) ? $_POST['sal'] : 0; // Default salary is 0 if not provided
    // $marks = isset($_POST['marks']) ? $_POST['marks'] : 0; // Default marks is 0 if not provided
    // $bonus = $salary * ($marks / 100);
    // $total_salary = $salary + $bonus;
        
    //     // Retrieve the employee ID of the newly inserted employee
    //     $emp_id = mysqli_insert_id($con);
        
    //     $sql_insert_salary = "INSERT INTO salary (emp_id, base_salary, bonus, total_salary) 
    //                     VALUES ('$emp_id', '$salary', '$bonus', '$total_salary')";
    
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Employees</title>

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
    <script src="js/reg_emp.js"></script>

</head>

<body id="page-top">
    <?php  include('sidebar.php'); ?>

    <?php  include('header.php'); ?>

    <div class="container-fluid">
        
        <form id="registrationForm" action="add_emp.php" method="POST">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Register Employees</h2>

                            <div>
                                <p>First Name</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="First Name" name="fn" />
                                    <span id="fn_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div>
                                <p>Last Name</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" placeholder="Last Name" name="ln" />
                                    <span id="ln_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div class="field-column">
                        <div>
                            <label for="em3">
                                Email Address
                            </label>
                        </div>
                        <div>
                            <input type="email" class="input--style-1" name="em" id="em3" class="demo-input-box"
                                placeholder="Enter your Email Address" autocomplete="off">
                            <span id="em_err" class="error-msg"></span><br><br>
                        </div>
                    </div>


                            <div class="row">
                                <div class="col-6">
                                    <p>Birthday</p>
                                    <div class="input-group1">
                                        <input class="input--style-1" type="date" placeholder="BIRTHDATE" name="birthday" />
                                        <span id="bd_err" class="error1 p-1"></span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <p>Gender</p>
                                    <div class="input-group1">
                                        <label class="radio-container">Male
                                            <input type="radio" name="gender" value="Male" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female">
                                            <span class="checkmark"></span>
                                    </div>
                                </div>
                            </div>


                            <div>
                                <p>Phone Number</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="number" placeholder="Contact Number"
                                        name="pn" />
                                    <span id="pn_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div>
                                <p>Address</p>
                                <div class="input-group1">
                                    <textarea class="input--style-1" type="text" placeholder="Address"
                                        name="address"></textarea>
                                    <span id="ad_err" class="error1 p-1"></span>
                                </div>
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
                                        <option value="IT">IT</option>
                                        <option value="HR">HR</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Operations">Operations</option>
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
                                        <option value="BTech">BTech</option>
                                        <option value="BSc">BSc</option>
                                        <option value="BCA">BCA</option>
                                        <option value="MCA">MCA</option>
                                        <option value="MTech">MTech</option>
                                        <option value="MSc">MSc</option>
                                        <option value="PhD">PhD</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Associate Degree">Associate Degree</option>
                                        <option value="PG Diploma">PG Diploma</option>
                                    </select>
                                    <span id="degree_err" class="error-msg"></span><br><br>
                                </div>
                            </div>

                            <div>
                                <p>Salary</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="number" placeholder="Salary" name="sal" />
                                    <span id="sal_err" class="error1 p-1"></span>
                                </div>
                            </div>

                            <div class="field-column">

                                <div>
                                    <label for="ps1">
                                        Password
                                    </label>
                                </div>
                                <div>
                                    <input type="password" class="input--style-1" name="ps" id="ps1" class="demo-input-box"
                                        placeholder="Create a Password" autocomplete="new-password">
                                    <span id="ps_err" class="error-msg"></span><br><br>
                                </div>
                            </div>

                            <div class="field-column">
                                <div>
                                    <label for="cp1">
                                        Confirm Password
                                    </label>
                                </div>
                                <div>
                                    <input type="password" class="input--style-1" name="cp" id="cp1" class="demo-input-box"
                                        placeholder="Enter Confirm Password" autocomplete="new-password">
                                    <span id="cp_err" class="error-msg"></span><br><br>
                                </div>
                            </div>

                            <input type="text" name="token" value="<?php echo uniqid().uniqid(); ?>" id="token1" name="token"
                    hidden>

                            <input type="checkbox" onclick="myFunction()"> Show Password <br><br>


                            <div class="p-t-20 p-2">
                                <button class="btn btn--radius btn-success" name="register" type="submit">Submit</button>
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

    <script src="js/show_password1.js"></script>

    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script> 

    <script src="js/sb-admin-2.min.js"></script>

    <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script> -->
    <!-- <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->


</body>

</html>