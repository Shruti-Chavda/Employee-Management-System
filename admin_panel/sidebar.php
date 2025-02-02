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
            <div class="sidebar-brand-text mx-3">Admin Panel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "index.php") { echo "active"; } ?>">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            CRUD
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_emp.php" || $arr_url[3] == "view_emp.php" ||$arr_url[3] == "edit_emp.php") { echo "active"; } ?>">
            <a class="nav-link <?php if (isset($arr_url[3]) && $arr_url[3] == "add_emp.php" || $arr_url[3] == "view_emp.php") { echo ""; } else { echo "collapsed"; } ?>" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-person-booth"></i>
                <span>Employees</span>
            </a>
            <div id="collapseTwo" class="collapse <?php if (isset($arr_url[3]) && $arr_url[3] == "add_emp.php" || $arr_url[3] == "view_emp.php") { echo "show"; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Actions:</h6>
                    <a class="collapse-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_emp.php") { echo "active"; } ?>" href="add_emp.php">Add Employess</a>
                    <a class="collapse-item <?php if (isset($arr_url[3]) && $arr_url[3] == "view_emp.php") { echo "active"; } ?>" href="view_emp.php">View Employees</a>
                </div>
            </div>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Information
        </div>

        <!-- Nav Item - Charts -->

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "assign_project.php") { echo "active"; } ?>">
            <a class="nav-link" href="assign_project.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Assignment</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "project_status.php" || $arr_url[3] == "assign_marks.php") { echo "active"; } ?>">
            <a class="nav-link" href="project_status.php">
                <i class="fas fa-fw fa-hourglass"></i>
                <span>Status</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "event.php" || $arr_url[3] == "add_events.php" || $arr_url[3] == "edit_events.php" || $arr_url[3] == "event_pt.php") { echo "active"; } ?>">
            <a class="nav-link" href="event.php">
                <i class="fas fa-fw fa-layer-group"></i>
                <span>Event</span></a>
        </li>


        <!-- Nav Item - Tables -->
        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "leaves.php") { echo "active"; } ?>">
            <a class="nav-link" href="leaves.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Leaves</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "salary.php") { echo "active"; } ?>">
            <a class="nav-link" href="salary.php">
                <i class="fas fa-fw fa-money-bill"></i>
                <span>Salary</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "tours.php") { echo "active"; } ?>">
            <a class="nav-link" href="tours.php">
                <i class="fas fa-fw fa-plane"></i>
                <span>Tours</span></a>
        </li>



        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Guest Panel
        </div>

        
        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_header.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_header.php">
                <i class="fas fa-fw fa-expand"></i>
                <span>Header</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_slider.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_slider.php">
                <i class="fas fa-fw fa-image"></i>
                <span>Slider</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_benefits.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_benefits.php">
                <i class="fas fa-fw fa-smile"></i>
                <span>Benefits</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_about_us.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_about_us.php">
                <i class="fas fa-fw fa-user"></i>
                <span>About us</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_services.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_services.php">
                <i class="fas fa-fw fa-hands"></i>
                <span>Services</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_skills.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_skills.php">
                <i class="fas fa-fw fa-magic"></i>
                <span>Skills</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_facts.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_facts.php">
                <i class="fas fa-fw fa-angle-double-right"></i>
                <span>Facts</span></a>
        </li>

        
        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_portfolio.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_portfolio.php">
                <i class="fas fa-fw fa-camera-retro"></i>
                <span>Portfolio</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_clients.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_clients.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Clients</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_testimonial.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_testimonial.php">
                <i class="fas fa-fw fa-heartbeat"></i>
                <span>Testimonials</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_team.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_team.php">
                <i class="fas fa-fw fa-object-group"></i>
                <span>Team</span></a>
        </li>

        <li class="nav-item <?php if (isset($arr_url[3]) && $arr_url[3] == "add_contact.php") { echo "active"; } ?>">
            <a class="nav-link" href="add_contact.php">
                <i class="fas fa-fw fa-phone"></i>
                <span>Contact</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->