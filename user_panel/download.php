<?php
include('connection.php');

if(isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    // Fetch file name from the database based on project_id
    $query = "SELECT file_name FROM projects WHERE p_id = '$project_id'";
    $result = mysqli_query($con, $query);
    if($row = mysqli_fetch_assoc($result)) {
        $file_name = $row['file_name'];

        if (!empty($file_name)) { // Check if file name is not empty
            // Check if the file exists in the directory
            $file_path = "Uploads/" . $file_name;
            if(file_exists($file_path) && is_readable($file_path)) { // Check if the file exists and is readable
                // Set headers for file download
                header("Content-Type: application/octet-stream");
                header("Content-Disposition: attachment; filename=" . $file_name);
                header("Pragma: no-cache");
                header("Expires: 0");

                // Read the file and output it to the browser
                readfile($file_path);
                exit();
            } else {
                echo "<script>alert('File not found or cannot be accessed')</script>";
            }
        } else {
            echo "<script>alert('File not found')</script>";
            echo "<script>window.location.href='http://localhost/Employee%20Management%20System/user_panel/project_status.php';</script>";

        }
    } else {
        echo "<script>alert('File not found')</script>";
    }
} else {
    echo "<script>alert('Invalid request')</script>";
}
?>
