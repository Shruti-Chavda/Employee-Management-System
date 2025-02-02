<?php
session_start();
include_once("connection.php");

date_default_timezone_set("Asia/Kolkata");
$db_time = date("Y-m-d G:i:s");
$q = "DELETE FROM `token1` WHERE `s_time`<'$db_time'";
mysqli_query($con, $q);

$token = $_SESSION['token'];
$em = $_SESSION['em'];

$q = "select * from token1 WHERE Email='$em' and token='$token'";
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

if (isset($_POST['submit'])) {
    $login_id = $_SESSION['em'];
    $token = $_SESSION['token'];
    $passwd = $_POST['npwd'];

    $q = "select * from token1 WHERE Email='$login_id' and token='$token'";
    $t = mysqli_query($con, $q);
    $count = mysqli_num_rows($t);
    $temp = mysqli_fetch_assoc($t);
    if ($count > 0) {
        $q = "UPDATE `employees` SET `Password`='$passwd' WHERE Email='$login_id'";
        if (mysqli_query($con, $q)) {
            $q = "DELETE FROM `token1` WHERE Email='$login_id'";
            if (mysqli_query($con, $q)) {
    ?>
                <script type="text/javascript">
                    alert("Password changed successfully.");
                    window.location.href = "login.php";
                </script>
    <?php
            }
        }
    }
}
?>
<script src="js/show_password.js"></script>


<?php include_once("header.php");  ?>

<section id="about">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Change Password</h3>
                        <form action="" method="post" id="passwordForm">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" placeholder="Enter New Password" name="npwd" id="pass">
                                <p id="passw"></p>
                            </div>

                            <div class="form-group">
                                <label for="Password">Retype New Password:</label>
                                <input type="password" class="form-control" placeholder="Retype New Password" name="rnpwd" id="password1">
                                <p id="passw1"></p>
                            </div>

                            <input type="checkbox" onclick="myFunction()"> Show Password <br><br>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $('#passwordForm').validate({
            rules: {
                npwd: {
                    required: true,
                    minlength: 8,
                    psregex: true
                },
                rnpwd: {
                    required: true,
                    equalTo: "#pass"
                }
            },
            messages: {
                npwd: {
                    required: "Please enter a password",
                    minlength: "Your password must be at least 8 characters long",
                    psregex: "Password must contain capital letters, small letters, numbers, and special characters"
                },
                rnpwd: {
                    required: "Please re-enter your password",
                    equalTo: "Passwords do not match"
                }
            }
        });
    });

    $.validator.addMethod("psregex", function (value2, element2) {
        var psgex1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return psgex1.test(value2);
    }, "Password must contain capital letters, small letters, numbers, and special characters.");
</script>

<?php
include("Footer.php");
?>
