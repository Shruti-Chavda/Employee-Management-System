<?php
include('connection.php');
$url = $_SERVER['REQUEST_URI'];
// echo $url;
$url = parse_url($url, PHP_URL_PATH);
$arr_url = explode("/", $url);
// echo $arr_url[2];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Employee Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link src="lib/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/contact.js"></script>

</head>


<body>
    <header id="header" class="header-scrolled">
        <div class="container-fluid">
            <div id="logo" class="pull-left">
                <h1><a href="#intro" class="scrollto">
                        Employeeshub
                    </a></h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">

                    <?php
                    $q = "SELECT * FROM guest_header";
                        $res = mysqli_query($con, $q);
                        while ($row = mysqli_fetch_array($res)) {
                    ?>


                    <li class="<?php if (isset($arr_url[2]) && $arr_url[2] == $row[1]) { echo "menu-active"; } ?>"> <a
                            class="nav-link" href="<?php echo $row[3]; ?>">

                            <?php echo $row[2]; ?>
                        </a>
                    </li>

                    <?php  }  ?>
                </ul>
            </nav>

        </div>
    </header>
</body>

</html>