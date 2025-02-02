<?php
session_start();
include('connection.php');

if ($_SESSION['username']) {
    $username = $_SESSION['username'];
    // echo $username;
    $sql_status = "SELECT * FROM employees WHERE user_name = '$username'";
    $res = mysqli_query($con, $sql_status);
    if ($r = mysqli_fetch_assoc($res)) {
        $_SESSION['user_id']=$r['id'];
        // echo $_SESSION['user_id'];
        $_SESSION['contact']=$r['contact'];
        // echo $_SESSION['contact'];
        $_SESSION['full_name']=$r['full_name'];
        // echo $_SESSION['full_name'];
        $_SESSION['email']=$r['email'];
        // echo $_SESSION['email'];
        $status = $r['status']; // Fetch user status
        $_SESSION['status'] = $status; // Store user status in session
        if ($status == "inactive") {
            echo "<script>alert('The account is not activated!');</script>";
            echo "<script>window.location.replace('http://localhost/Employee%20Management%20System/login.php');</script>"; 
            exit();
        }
    }
    
}


//If the user closes the browser's window then session will get destroyed
if (!isset($_SESSION['username'])) {
    $sql_update_status = "UPDATE emp_login SET status = 'inactive'";
    mysqli_query($con, $sql_update_status);
    header("Location: http://localhost/Employee%20Management%20System/login.php");
    exit();
}

$role = ''; // Initialize role variable
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT role FROM EMPLOYEES WHERE user_name = '$username'"; 
    $result = mysqli_query($con, $sql);
    $sql_update_status = "UPDATE EMPLOYEES SET status = 'active' WHERE user_name = '$username'";
    mysqli_query($con, $sql_update_status);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['role']=$row['role'];
        // echo $_SESSION['role'];
    }
    // else{
    //     if(!isset($_SESSION['username'])=="" || !isset($_SESSION['role'])=="") {
    //     // Redirect the user to the login page
    //     header("Location:  http://localhost/Employee%20Management%20System/login.php");
    //     exit;
    // }
    // }
}

//After 60 minutes the user will automatically get destroyed
if (isset($_SESSION['timeout']) && $_SESSION['timeout'] < time()) {
    session_destroy();
    echo "<script>alert('Session Expired!');</script>";
    echo "<script>window.location.replace('http://localhost/Employee%20Management%20System/login.php');</script>"; 
    $sql_update_status = "UPDATE emp_login SET status = 'inactive'";
    mysqli_query($con, $sql_update_status);
    exit();
}
$_SESSION['timeout'] = time() + (60 * 60);
?>

