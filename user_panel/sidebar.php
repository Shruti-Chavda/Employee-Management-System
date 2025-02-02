<?php
include('connection.php');
$url = $_SERVER['REQUEST_URI'];
// echo $url;
$url = parse_url($url, PHP_URL_PATH);
$arr_url = explode("/", $url);
// echo $arr_url[3];
?>
<!-- Page Wrapper -->
<div id="wrapper">


    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3">User Panel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "index.php") { echo "active"; } ?>">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
<!-- 
        <li class="nav-item <?php //if (isset($arr_url[3]) && $arr_url[3] == "projects.php" || $arr_url[3] == "Details.php") { echo "active"; } ?>">
            <a class="nav-link" href="projects.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>History</span></a>
        </li> -->

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "project_status.php" || $arr_url[3] == "submit.php") { echo "active"; } ?>">
            <a class="nav-link" href="project_status.php">
                <i class="fas fa-fw fa-hourglass"></i>
                <span>Projects</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "event.php" || $arr_url[3] == "apply_for_event.php" ||  $arr_url[3] == "event_details.php") { echo "active"; } ?>">
            <a class="nav-link" href="event.php">
                <i class="fas fa-fw fa-layer-group"></i>
                <span>Event</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "leaves.php" || $arr_url[3] == "request_leave.php") { echo "active"; } ?>">
            <a class="nav-link" href="leaves.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Leaves</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "salary.php") { echo "active"; } ?>">
            <a class="nav-link" href="salary.php">
                <i class="fas fa-fw fa-money-bill"></i>
                <span>Salary</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "tours.php" || $arr_url[3] == "request_tours.php") { echo "active"; } ?>">
            <a class="nav-link" href="tours.php">
                <i class="fas fa-fw fa-plane"></i>
                <span>Tours</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->