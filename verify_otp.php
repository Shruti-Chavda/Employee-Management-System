<?php
session_start();
include_once("connection.php");

$_SESSION['token'] = isset($_REQUEST['token']) ? $_REQUEST['token'] : '';
$_SESSION['em'] = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';

if (!isset($_POST['submit'])) {

    date_default_timezone_set("Asia/Kolkata");
    $db_time = date("Y-m-d G:i:s");
    $q = "DELETE FROM token1 WHERE s_time<'$db_time'";
    mysqli_query($con, $q);

    $token = isset($_REQUEST['token']) ? $_REQUEST['token'] : '';
    $em = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';

    $q = "select * from token1 WHERE email='$em' and token='$token'";
    $t = mysqli_query($con, $q);
    $count = mysqli_num_rows($t);
    if ($count == 0) {
        ?>
        <script type="text/javascript">
            alert("Password reset token expired.");
            window.location.href = "login.php";
        </script>
        <?php
    }
    ?>
<?php include('header.php'); ?>

<section id="about">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <header class="section-header text-center">
                    <h3>Verify OTP</h3>
                </header>
                <form action="check_otp.php" method="post">
                    <div class="form-group">
                        <label for="password">Enter OTP</label>
                        <input type="text" class="form-control" placeholder="Enter OTP" name="otp" id="pass">
                        <div id="error" style="color: red;"></div><br>
                        <div>OTP will expire in 01:00<span id="timer" hidden></span></div><br>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                    </div>
                </form>
                <center>
                <a href="Resend_otp.php?email=<?php echo $_SESSION['em']; ?>"><button class="btn btn-primary" id="r_btn" hidden>Resend OTP</button></a>
                </center>
            </div>
        </div>
    </div>
</section>
<?php include("footer.php");  ?>

<script>
    var timerInterval; // Variable to hold the interval reference
    var initialTime; // Variable to store the initial time

    function startTimer(duration, display) {
        var timer = duration,
            minutes, seconds;
        
        initialTime = duration; // Store the initial time

        timerInterval = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(timerInterval); // Clear the interval when the timer reaches 00:00
                showAlert(); // Show alert when timer runs out
            }
        }, 1000);
    }

    window.onload = function () {
        var oneMinute = 60,
            display = document.getElementById('timer'); // Remove '#' from ID

        startTimer(oneMinute, display);
    };

    function enable_reset_btn() {
        document.getElementById("r_btn").hidden = false;
        document.getElementById("submit").hidden = true;
        document.getElementById("pass").disabled = true;
    }

    function showAlert() {
        alert("Token has expired");
        enable_reset_btn(); // Call enable_reset_btn to enable the reset button
    }

    document.getElementById("pass").addEventListener("blur", function () {
        var otpInput = this.value;
        var errorDiv = document.getElementById("error");
        if (otpInput.length === 0) {
            errorDiv.textContent = "";
        } 
    });
</script>
<?php  } ?>