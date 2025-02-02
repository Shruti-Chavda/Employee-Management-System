<?php
include('connection.php');

$email = $_REQUEST['em'];
$token = $_REQUEST['token'];

// echo $email;
// echo $token;

$q = "select * from employees where email='$email' and token='$token'";
$result = mysqli_query($con, $q);
$count = mysqli_num_rows($result);


if ($count == 1) {
    while ($row = mysqli_fetch_array($result)) {
        $status = $row[16];
        if ($status == "active") {
            echo "<script>alert('Account is already activated.');</script>";
        } else {
            $updt = "update employees set `status`='active' where email='$email' and token='$token'";
            if (mysqli_query($con, $updt)) {
                echo "<script>alert('Account Activation successfull. Please login to continue');</script>";
            } else {
                echo "<script>alert('Error in activating account. Please try again later');</script>";
            }
        }
    
?>
        <script>
            window.location.href = "login.php";
        </script>
<?php
    }
} else {
    echo "Either Email is not registered or token is incorrect.";
}
