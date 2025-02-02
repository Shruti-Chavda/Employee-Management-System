<?php

session_start();

// Include your database connection
include('connection.php');

// Check if user is logged in
if (isset($_SESSION['username'])) {
    // Update user status to "inactive" in the database
    $username = $_SESSION['username'];
    $sql_update_status = "UPDATE emp_login SET status = 'inactive' WHERE user_name = '$username'";
    mysqli_query($con, $sql_update_status);
    unset($_SESSION['username']);
}

// Destroy the session
// session_destroy();

// Redirect the user to the login page
header("Location: http://localhost/Employee%20Management%20System/login.php");
exit();
?>