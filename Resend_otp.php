<?php
session_start();
include('connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');

$em = $_SESSION['em'];

        date_default_timezone_set("Asia/Kolkata");
        $s_time = date("Y-m-d G:i:s", strtotime("+ 1 min"));

        $token = hash('sha512', $s_time);
        $otp = mt_rand(100000, 999999);
        $ins_token = "INSERT INTO token1 VALUES ('','$em','$s_time','$token',$otp)";
        
        if (mysqli_query($con, $ins_token)) {
            $link = "http://localhost/Employee%20Management%20System/verify_otp.php?email=$em&token=$token";

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'chavdashruti516@gmail.com'; // SMTP username
                $mail->Password = 'xwig fjqp gnea fqml'; // SMTP password
                $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465; // TCP port to connect to
                $mail->SMTPDebug = 0; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('chavdashruti516@gmail.com', 'Employeeshub');
                $mail->addAddress($em, 'Shruti'); //Add a recipient
                $mail->addReplyTo('chavdashruti516@gmail.com', 'Reply');

                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'Password reset link for Employees';
                $mail->Body    = 'OTP for password reset is ' . $otp . ' <br/>This is the password reset link for your account. The link is valid for 1 minute.=> ' . @$link .  "<br/> Please use forgot password facility again if the link has expired";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if ($mail->send()) {
                    echo "<script type='text/javascript'>alert('Password reset link has been sent to your registered email. Please check the spam folder as well.');</script>";
                    echo "<script type='text/javascript'> window.location.href='http://localhost/Employee%20Management%20System/login.php';</script>'";
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

?>
