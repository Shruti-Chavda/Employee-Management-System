<?php  
include('connection.php');
if(isset($_GET['btn'])){
    $email = $_GET['em'];

    $sql_insert = "INSERT INTO subscription (email) VALUES ('$email')";
    if (mysqli_query($con, $sql_insert)) {
        echo "<script>alert('Thanks for subscribing!!');</script>";
        echo "<script>window.location.replace('$_SERVER[PHP_SELF]');</script>"; 
        exit();
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
    }
}
?>
<form action="index.php" method="GET" id="form1" class="sub">
    <input type="text" class="form-control" name="em" placeholder="Enter your Email" data-rule="email" />
    <span id="em_err"></span><br>
    <div class="validation"></div>
    <input type="submit" value="Subscribe" name="btn">
</form>