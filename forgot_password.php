<?php  include('connection.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>


    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 0px;

        }
    </style>



</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">

                                        <h1 class="h4 text-gray-900 mb-2">
                                            Forgot password
                                        </h1>
                                        <p class="mb-4">
                                            <?php  ?>
                                        </p>
                                        
                                    </div>


                                    <form method="POST" class="user" id="form1">
                                        <div class="form-group">
                                            <input type="email" name="em" id="email1"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            <span id="em_err" class="emm"></span>
                                        </div>
                                        <button type="submit" name="sub" class="btn btn-success btn-user btn-block">
                                            Reset Password
                                    </button>
                                    </form>


                                    
<?php
if (isset($_POST['sub'])) {
    $em = @$_POST['em'];
	$q = "select * from employees where email='$em'";
	$count = mysqli_num_rows(mysqli_query($con, $q));
	if ($count == 1) {
		$q1 = "select * from token1 where Email='$em'";
		$countem = mysqli_num_rows(mysqli_query($con, $q1));
		if ($countem == 1) {
			echo "<script type='text/javascript'>alert('A Password reset link is already sent to your mail please check. New link will be generated after old link expires');</script>";
		} else {
			date_default_timezone_set("Asia/Kolkata");
			$s_time = date("Y-m-d G:i:s", strtotime("+ 1 min"));

			$token = hash('sha512', $s_time);
			$otp = mt_rand(100000, 999999);
			$ins_token = "INSERT INTO token1 VALUES ('','$em','$s_time','$token',$otp)";
			// echo "$ins_token";
			//$db_time = date("Y-m-d G:i:s", strtotime("+ 1 min"));
			//$_SESSION['db_time'] = $db_time;
			if (mysqli_query($con, $ins_token)) {
				$link = "http://localhost/Employee%20Management%20System/verify_otp.php?email=$em&token=$token";
				//echo $link;
				$mail = new PHPMailer(true);
				try {
					$mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'chavdashruti516@gmail.com'; // SMTP username
                $mail->Password = 'xwig fjqp gnea fqml'; // SMTP password
                $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465; // TCP port to connect to
                $mail->SMTPDebug = 0;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

					//Recipients
					$mail->setFrom('chavdashruti516@gmail.com', 'Employeeshub');
					$mail->addAddress($em, 'Shruti');     //Add a recipient
					//$mail->addAddress('ellen@example.com');               //Name is optional
					$mail->addReplyTo('chavdashruti516@gmail.com', 'Reply');
					//$mail->addCC('cc@example.com');
					// $mail->addBCC('bcc@example.com');

					//Attachments
					// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
					//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

					//Content
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Password reset link for Employees';
					$mail->Body    = 'OTP for password reset is ' . $otp . ' <br/>This is the password reset link for your account. The link is valid for 1 minute.=>   ' . @$link .  "<br/> Please use forgot password facility again if the link has expired";
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if ($mail->send()) {
						echo '<script>alert("Password reset link has been sent to your registered email.Please check the spam also.");</script>';
					}
				}catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
			}
		}
	} else {
		echo "<script type='text/javascript'>alert('No such Email address is registered'); window.location='forgot_password.php';</script>";
	}
}
?>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>

    <script src="js/forgot_pass.js"></script>

</body>

</html>