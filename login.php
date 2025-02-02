<?php

include('header.php');
include('connection.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['un']) && isset($_POST['ps'])) {
        $username = $_POST['un'];
        $password = $_POST['ps'];

        $sql_login = "SELECT * FROM emp_login WHERE user_name = '$username' AND password = '$password'";
        $result_login = mysqli_query($con, $sql_login);

        $sql_login_admin = "SELECT * FROM admin WHERE user_name = '$username' AND password = '$password'";
        $result_login_admin = mysqli_query($con, $sql_login_admin);

        if (mysqli_num_rows($result_login) == 1) {
            $_SESSION['username'] = $username;
            header("Location: user_panel/index.php");
            exit();
        } elseif (mysqli_num_rows($result_login_admin) == 1) {
            $_SESSION['username'] = $username;
            header("Location: admin_panel/index.php");
            exit();
        } else {
            echo "<script>alert('Invalid username or password');</script>";
            echo "<script>window.location.replace('$_SERVER[PHP_SELF]');</script>"; 
            exit(); 
        }
    }
}


?>

<script src="js/login_validate.js"></script>

<section id="portfolio" class="section-bg">
  <div class="container p-5">
    <header class="section-header">
      <h3 class="section-title">
        Login
      </h3>
    </header>

    <div class="login-form-container">
      <div class="form-head">
        <img src="img/logo.png" style="height:150px;width:150px">
      </div>

      <form action="login.php" method="POST" id="form2">

        <div class="input-container">
          <div class="field-column">
            <div>
              <label for="un1">
                Username 
              </label>
            </div>
            <div>
              <input type="text" name="un" id="un1" class="demo-input-box" placeholder="Enter your username"
                autocomplete="off">
              <span id="un_err"></span>
            </div>
          </div>
          <br>

          <div class="field-column">
            <div>
              <label for="ps1">
              Password 
              </label>
            </div>
            <div>
              <input type="password" name="ps" id="ps1" class="demo-input-box" placeholder="Enter your password"
                autocomplete="new-password">
              <span id="ps_err"></span><br>
            </div>
          </div><br>

          <input type="checkbox" onclick="myFunction()"> Show Password <br><br>

          <div class="field-column">
            <div>
              <button class="btn btn--radius btn-success" type="submit" value="Login">Submit</button>
            </div>
          </div><br>

          <a href="forgot_password.php" class="fp">
          Forgot Password?
          </a>

        </div>
        <div class="login-row form-nav-row">
          <p>New User?</p>

          <a href="http://localhost/Employee%20Management%20System/register.php">
            <div class="pt-20">
              <button class="btn btn-success btn--radius1" type="button" value="Login">Sign up</button>
            </div>
          </a>
        </div>
    </div>
    </form>


</section>

<?php
     include('call-to-action.php');
  ?>

<?php
     include('testimonial.php');
  ?>

<?php
     include('footer.php');
  ?>