<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include('header.php');


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
$ress=mysqli_query($con, $insert_login_query);

$last_emp_id_query = "SELECT MAX(id) AS last_emp_id FROM employees";
$res = mysqli_query($con, $last_emp_id_query);

$row = mysqli_fetch_assoc($res);
$last_emp_id = $row['last_emp_id'];
$new_emp_id = $last_emp_id;

$insert_salary_query = "INSERT INTO salary (`emp_id`,`base_salary`,`bonus`,`total_salary`) values ('$new_emp_id','15000','0%','15000')";
$res11=mysqli_query($con, $insert_salary_query);
   
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
                    $mail->Body = 'Congratulations! ' . $first_name . ' Your account has been created successfully.<br>This email is for your account verification.<br><b>Your Username: ' . $username . '</b><br>Kindly click on the link below to verify your account. You will be able to login into your account only after account verification.<br><a href="http://localhost/Employee%20Management%20System/verify_account.php?em=' . $email . '&token=' . $token . '">Click here to verify your account</a>';

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


?>



<script src="js/register.js"></script>

<section id="portfolio" class="section-bg">
    <div class="container p-5">
        <header class="section-header">
            <h3 class="section-title">
                Register </h3>
        </header>

        <div class="login-form-container">
            <div class="form-head">
                <img src="img/logo.png" style="height:150px;width:150px">
            </div>

              <form action="http://localhost/Employee%20Management%20System/register.php" method="POST" id="form3">
                <div class="input-container">
                    <div class="field-column">
                        <div>
                            <label for="fn1">
                                First Name
                            </label>
                        </div>
                        <div>
                            <input type="text" name="fn" id="fn1" class="demo-input-box" placeholder="Enter First Name"
                                autocomplete="off">
                            <span id="fn_err" class="error-msg"></span><br><br>
                        </div>
                    </div>

                    <div class="field-column">
                        <div>
                            <label for="ln1">
                                Last Name
                            </label>
                        </div>
                        <div>
                            <input type="text" name="ln" id="ln1" class="demo-input-box" placeholder="Enter Last Name"
                                autocomplete="off">
                            <span id="ln_err" class="error-msg"></span><br><br>
                        </div>
                    </div>

                    <div class="field-column">
                        <div>
                            <label for="em3">
                                Email
                            </label>
                        </div>
                        <div>
                            <input type="email" name="em" id="em3" class="demo-input-box"
                                placeholder="Enter your Email Address" autocomplete="off">
                            <span id="em1_err" class="error-msg"></span><br><br>
                        </div>
                    </div>

                    <div class="field-column phone-field">
                        <div>
                            <label for="pn1">
                                Phone
                            </label>
                        </div>
                        <div class="phone-input">
                            <input type="number" name="pn" id="pn1" class="demo-input-box phone-number"
                                placeholder="Enter Your Phone Number" autocomplete="off">
                        </div>
                        <span id="pn_err" class="error-msg"></span>
                    </div><br>

                    <div class="field-column">
                        <div>
                            <label for="birthday">
                                Birthday
                            </label>
                        </div>
                        <div>
                            <input type="date" name="birthday" id="birthday" class="demo-input-box">
                            <span id="birthday_err" class="error-msg"></span><br><br>
                        </div>
                    </div>

                    <div class="field-column gender-field">
                        <div>
                            <label>
                                Gender
                            </label>
                        </div>
                        <div class="gender-options">
                            <input type="radio" name="gender" id="gender_male" value="Male" checked>
                            <label for="gender_male">Male</label>
                            <input type="radio" name="gender" id="gender_female" value="Female">
                            <label for="gender_female">Female</label>
                        </div>
                        <span id="gender_err" class="error-msg"></span>
                    </div><br>

                    <div class="field-column">
                        <div>
                            <label for="address">
                                Address
                            </label>
                        </div>
                        <div>
                            <textarea name="address" id="address" class="demo-input-box"
                                placeholder="Enter your Address"></textarea>
                            <span id="address_err" class="error-msg"></span><br><br>
                        </div>
                    </div>

                    <div class="field-column">
                        <div>
                            <label for="department">
                                Department
                            </label>
                        </div>
                        <div>
                            <select name="department" id="department" class="demo-input-box">
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
                            <select name="degree" id="degree" class="demo-input-box">
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


                    <div class="field-column">

                        <div>
                            <label for="ps1">
                                Password
                            </label>
                        </div>
                        <div>
                            <input type="password" name="ps" id="ps1" class="demo-input-box"
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
                            <input type="password" name="cp" id="cp1" class="demo-input-box"
                                placeholder="Enter Confirm Password" autocomplete="new-password">
                            <span id="cp_err" class="error-msg"></span><br><br>
                        </div>
                    </div>

                    <input type="text" name="token" value="<?php echo uniqid().uniqid(); ?>" id="token1" name="token"
                    hidden>

                    <input type="checkbox" onclick="myFunction()"> Show Password <br><br>

                    <div class="field-column">
                        <div>
                            <button class="btn btn--radius btn-success" name="register" type="submit"
                                value="Login">Register</button>
                        </div>
                    </div>

            </form>

        </div>
        <div class="login-row form-nav-row">
            <p>Already Have an account?</p>
            <a href="http://localhost/Employee%20Management%20System/login.php">
                <div class="pt-20">
                    <button class="btn btn-success btn--radius1" type="button" value="Login">Sign in</button>
                </div>
            </a>
        </div>
    </div>
</section>

<?php include('call-to-action.php'); ?>
<?php include('testimonial.php'); ?>
<?php include('footer.php'); ?>
