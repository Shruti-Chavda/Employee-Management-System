-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 01:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `pic` varchar(50) DEFAULT 'undraw_profile.jpg',
  `role` varchar(50) DEFAULT 'admin',
  `password` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `email`, `gender`, `contact`, `pic`, `role`, `password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'Female', '1234567890', '661df305bab31_27.png', 'admin', '123', 'active'),
(2, 'Shruti', 'schavda684@rku.ac.in', 'Female', '1234567890', '6627949a4a0de_2.jpg', 'admin', 'SHRuti@19', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'shruti', 'schavda684@rku.ac.in', 'test test test test', 'test test test testtesttesttesttesttest'),
(2, 'Urvisha', 'ubaldha434@ru.ac.in', 'test test test test', 'test test test testtesttesttesttesttest'),
(3, 'Rutika', 'rvaghasiya328@rku.ac.in', 'test test test test', 'test test test testtesttesttesttesttest');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `nid` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `department` varchar(20) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `profile_pic` varchar(50) DEFAULT 'profile.jpg',
  `role` varchar(50) DEFAULT 'user',
  `status` varchar(255) DEFAULT 'inactive',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nid`, `first_name`, `last_name`, `full_name`, `user_name`, `email`, `password`, `birthday`, `gender`, `contact`, `address`, `department`, `degree`, `profile_pic`, `role`, `status`, `token`) VALUES
(1, 'N01', 'Shruti', 'Chavda', 'Shruti Chavda', 'schavda684', 'schavda684@rku.ac.in', 'SHRuti@19', '2005-03-10', 'Female', '1234567890', 'Gandhigram, Rajkot-360007', 'IT', 'BTech', 'profile.jpg', 'user', 'active', '66280b577199266280b577199f');

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

CREATE TABLE `emp_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`id`, `user_name`, `password`, `status`) VALUES
(1, 'schavda684', 'SHRuti@19', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_pt`
--

CREATE TABLE `event_pt` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_starting_time` time DEFAULT NULL,
  `event_ending_time` time DEFAULT NULL,
  `venue_address` text DEFAULT NULL,
  `title_of_participation` varchar(255) DEFAULT NULL,
  `additional_information` text DEFAULT NULL,
  `admin_remark` varchar(100) DEFAULT 'Applied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest_about_us`
--

CREATE TABLE `guest_about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `para` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_about_us`
--

INSERT INTO `guest_about_us` (`id`, `title`, `para`, `img`, `icon`) VALUES
(1, 'Our Mission', 'At Employeehub, we\'re all about making employee management a breeze. Our EMS Hub is designed to streamline tasks, boost productivity, and keep everyone on track.', '65fc45a1aab5b_about-mission.jpg', 'ion-ios-speedometer-outline'),
(2, 'Our Plan', 'From leave applications to project management, we\'ve got it all covered. Say goodbye to the tedious process and hello to seamless efficiency!', '65fc45f7c4899_about-plan.jpg', 'ion-ios-list-outline'),
(3, 'Our Vision', 'We on a mission to revolutionize the way businesses manage the employees. Our EMS Hub is the ultimate solution for efficient employee management.', '65fc462290374_about-vision.jpg', 'ion-ios-eye-outline');

-- --------------------------------------------------------

--
-- Table structure for table `guest_benefits`
--

CREATE TABLE `guest_benefits` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `para` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_benefits`
--

INSERT INTO `guest_benefits` (`id`, `icon`, `title`, `para`) VALUES
(1, 'ion-ios-bookmarks-outline', 'Future of Employee Management ', 'Explore the future of employee management and the role of technology in shaping the workplace of tomorrow. '),
(2, 'ion-ios-stopwatch-outline', 'Future of Employee Management', 'Explore the future of employee management and the role of technology in shaping the workplace of tomorrow.'),
(3, 'ion-ios-heart-outline', 'ion-ios-heart-outline', 'Workspace\', \'With a focus on productivity, simplicity, and innovation, we\'re here to take your workforce management to the next level.');

-- --------------------------------------------------------

--
-- Table structure for table `guest_contact`
--

CREATE TABLE `guest_contact` (
  `id` int(11) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `para` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_contact`
--

INSERT INTO `guest_contact` (`id`, `icon`, `title`, `para`) VALUES
(1, 'ion-ios-location-outline', 'Address', 'A108 Adam Street, Rajkot-Gj 360007, India'),
(2, 'ion-ios-telephone-outline', 'Phone Number', '+91 1234 567 890'),
(3, 'ion-ios-email-outline', 'Email', 'schavda684@rku.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `guest_facts`
--

CREATE TABLE `guest_facts` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_facts`
--

INSERT INTO `guest_facts` (`id`, `number`, `title`) VALUES
(1, '274', 'clients'),
(2, '421', 'projects'),
(3, '1,364', 'Hours Of Support '),
(4, '18', 'Hard Workers ');

-- --------------------------------------------------------

--
-- Table structure for table `guest_header`
--

CREATE TABLE `guest_header` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_header`
--

INSERT INTO `guest_header` (`id`, `name`, `title`, `link`) VALUES
(1, 'index.php', 'HOME', 'http://localhost/Employee%20Management%20System/index.php'),
(2, 'about.php', 'ABOUT US', 'http://localhost/Employee%20Management%20System/about.php'),
(3, 'services.php', 'SERVICES', 'http://localhost/Employee%20Management%20System/services.php'),
(4, 'portfolio.php', 'PORTFOLIO', 'http://localhost/Employee%20Management%20System/portfolio.php'),
(5, 'team.php', 'TEAM', 'http://localhost/Employee%20Management%20System/team.php'),
(6, 'contact.php', 'CONTACT', 'http://localhost/Employee%20Management%20System/contact.php'),
(7, 'login.php', 'LOGIN', 'http://localhost/Employee%20Management%20System/login.php'),
(8, 'register.php', 'REGISTER', 'http://localhost/Employee%20Management%20System/register.php');

-- --------------------------------------------------------

--
-- Table structure for table `guest_our_clients`
--

CREATE TABLE `guest_our_clients` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_our_clients`
--

INSERT INTO `guest_our_clients` (`id`, `title`, `img`) VALUES
(1, 'strider', 'client-1.png'),
(2, 'runtastic', 'client-2.png'),
(3, 'Editshare', 'client-3.png'),
(4, 'InFocus', 'client-4.png'),
(5, 'Gategroup', 'client-5.png'),
(6, 'cadent', 'client-6.png'),
(7, 'ceph', 'client-7.png'),
(8, 'alitalia', 'client-8.png');

-- --------------------------------------------------------

--
-- Table structure for table `guest_our_portfolio`
--

CREATE TABLE `guest_our_portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `para` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_our_portfolio`
--

INSERT INTO `guest_our_portfolio` (`id`, `title`, `para`, `img`, `category`) VALUES
(1, 'Android Development', 'Java and kotlin', 'app1.jpg', 'app'),
(2, 'Front-End', 'HTML & CSS', 'web3.jpg', 'web'),
(3, 'Flutter Framework', 'dart', 'app2.jpg', 'app'),
(4, 'Database', 'Oracle', 'card2.jpg', 'db'),
(5, 'Framework', 'Laravel & Codegniter', 'web2.jpg', 'web'),
(6, 'Diverse App Languages', 'Swift / Objective-C', 'app3.jpg', 'app'),
(7, 'Database', 'SQL', 'card1.jpg', 'db'),
(8, 'Database', 'MongoDB', 'card3.jpg', 'db'),
(9, 'Back-End', 'Python, Java', 'web1.jpg', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `guest_our_skills`
--

CREATE TABLE `guest_our_skills` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `progress` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_our_skills`
--

INSERT INTO `guest_our_skills` (`id`, `title`, `progress`, `color`) VALUES
(1, 'php', '100', 'success'),
(2, 'javascript', '90', 'info'),
(3, 'java', '75', 'warning'),
(4, 'ruby', '55', 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `guest_services`
--

CREATE TABLE `guest_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `para` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_services`
--

INSERT INTO `guest_services` (`id`, `title`, `para`, `icon`) VALUES
(1, 'Request leaves', 'Enable the employees to conveniently request leaves online. It streamlines the leave application process, making it efficient and accessible. Employees can specify the type of leave, duration, and any additional notes for approval.', 'ion-ios-analytics-outline'),
(2, 'Business Tour Request', 'Employees can submit travel requests for work-related trips. This streamlines the approval process for business tours, allowing staff to provide necessary details such as destination, purpose, and expected duration.', 'ion-ios-bookmarks-outline'),
(3, 'Salary Information', 'Allows employees to access detailed information about their compensation. They can view their base salary, bonus details, and the total amount, providing transparency and clarity regarding their financial remuneration.', 'ion-ios-paper-outline'),
(4, 'Task Management', 'Employees can efficiently manage their tasks and projects through this feature. It provides a centralized platform where staff can view their assigned tasks, track progress, and stay organized with their work responsibilities.', 'ion-ios-speedometer-outline'),
(5, 'Employee Leaderboard', 'Fostering a sense of healthy competition, the Employee Leaderboard allows employees to view the names and points of their colleagues, encouraging friendly competition, recognition, and motivates employees to excel in their roles.', 'ion-ios-barcode-outline'),
(6, 'View Project Details', 'Employees can access detailed information about their assigned projects, including project, descriptions, and other details. Administrators have the ability to assign the project information as needed for employees.', 'ion-ios-people-outline');

-- --------------------------------------------------------

--
-- Table structure for table `guest_slider_images`
--

CREATE TABLE `guest_slider_images` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `para` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_slider_images`
--

INSERT INTO `guest_slider_images` (`id`, `title`, `para`, `img`) VALUES
(1, 'we are professional', 'Employeeshub is the ultimate solution for efficient employee management.', '1.jpg'),
(2, 'Team Work', 'At Employeeshub, we\'re all about making employee management a breeze. Our Employeeshub is designed to streamline tasks, boost productivity, and keep everyone on track.', '2.jpg'),
(3, 'Employees leave', 'From leave applications to project management, we have all covered. Say goodbye to tedious admin work and hello to seamless efficiency!', '3.jpg'),
(4, 'Let\'s work together', 'Join us on this journey to revolutionize the way you manage your workforce.', '4.jpg'),
(5, 'Employees Hub', 'EMS Hub has transformed the way to manage the employees. It\'s a game-changer!', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guest_team`
--

CREATE TABLE `guest_team` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_team`
--

INSERT INTO `guest_team` (`id`, `name`, `position`, `img`) VALUES
(1, 'Walter White', 'Chief Executive Officer', 'team-1.jpg'),
(2, 'Sarah Jhonson', 'Product Manager', 'team-2.jpg'),
(3, 'William Anderson', 'Entrepreneur', 'team-3.jpg'),
(4, 'Amanda Jepson', 'Accountant', 'team-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guest_testimonial`
--

CREATE TABLE `guest_testimonial` (
  `id` int(11) NOT NULL,
  `person` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `para` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_testimonial`
--

INSERT INTO `guest_testimonial` (`id`, `person`, `position`, `para`, `img`) VALUES
(1, 'Saul Goodman', 'Ceo &amp; Founder', 'EMS Hub is a must-have for any organization looking to streamline employee management.', 'testimonial-1.jpg'),
(2, 'Sara Wilsson', 'Designer', 'The EMS Hub has made our HR tasks a breeze. It\'s like having a personal assistant for every employee.', 'testimonial-2.jpg'),
(3, 'Jena Karlis', 'Store Owner', 'EMS Hub is the ultimate solution for efficient employee management.', 'testimonial-3.jpg'),
(4, 'Matt Brandon', 'Freelancer', 'EMS Hub has transformed the way we manage our employees.', 'testimonial-4.jpg'),
(5, 'John Larson', 'Entrepreneur', 'I never knew employee management could be this fun and efficient.', 'testimonial-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `leader_name` varchar(100) NOT NULL,
  `leader_email` varchar(50) NOT NULL,
  `p_description` varchar(200) NOT NULL,
  `due_date` date NOT NULL,
  `sub_date` date NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `projects`
--
DELIMITER $$
CREATE TRIGGER `calculate_bonus_trigger` AFTER UPDATE ON `projects` FOR EACH ROW BEGIN
    DECLARE bonus FLOAT;
    
    -- Check if points are NULL or 0
    IF NEW.points IS NULL OR NEW.points = 0 THEN
        SET bonus = 0;
    ELSE
        -- Calculate bonus based on points
        IF NEW.points = 10 THEN
            SET bonus = 0.1 * 15000;
        ELSEIF NEW.points = 20 THEN
            SET bonus = 0.2 * 15000;
        ELSEIF NEW.points = 30 THEN
            SET bonus = 0.3 * 15000;
        ELSEIF NEW.points = 40 THEN
            SET bonus = 0.4 * 15000;
        ELSEIF NEW.points = 50 THEN
            SET bonus = 0.5 * 15000;
        ELSEIF NEW.points = 60 THEN
            SET bonus = 0.6 * 15000;
        ELSEIF NEW.points = 70 THEN
            SET bonus = 0.7 * 15000;
        ELSEIF NEW.points = 80 THEN
            SET bonus = 0.8 * 15000;
        ELSEIF NEW.points = 90 THEN
            SET bonus = 0.9 * 15000;
        ELSEIF NEW.points = 100 THEN
            SET bonus = 10 * 15000; -- Max bonus
        END IF;
    END IF;
    
    -- Update bonus and total_salary in the salary table for the respective employee
    UPDATE salary
    SET bonus = CONCAT(NEW.points,'%'),
        total_salary = 15000 + bonus
    WHERE emp_id = NEW.leader_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `base_salary` float NOT NULL DEFAULT 15000,
  `bonus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp_id`, `base_salary`, `bonus`, `total_salary`) VALUES
(1, 1, 15000, '0%', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `token1`
--

CREATE TABLE `token1` (
  `token_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `s_time` datetime DEFAULT NULL,
  `token` varchar(1000) DEFAULT NULL,
  `otp` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mode_of_travel` varchar(50) NOT NULL,
  `total_cost` double NOT NULL,
  `Status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_login`
--
ALTER TABLE `emp_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_pt`
--
ALTER TABLE `event_pt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_about_us`
--
ALTER TABLE `guest_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_benefits`
--
ALTER TABLE `guest_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_contact`
--
ALTER TABLE `guest_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_facts`
--
ALTER TABLE `guest_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_header`
--
ALTER TABLE `guest_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_our_clients`
--
ALTER TABLE `guest_our_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_our_portfolio`
--
ALTER TABLE `guest_our_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_our_skills`
--
ALTER TABLE `guest_our_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_services`
--
ALTER TABLE `guest_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_slider_images`
--
ALTER TABLE `guest_slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_team`
--
ALTER TABLE `guest_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_testimonial`
--
ALTER TABLE `guest_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token1`
--
ALTER TABLE `token1`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_login`
--
ALTER TABLE `emp_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_pt`
--
ALTER TABLE `event_pt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_about_us`
--
ALTER TABLE `guest_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guest_benefits`
--
ALTER TABLE `guest_benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guest_contact`
--
ALTER TABLE `guest_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guest_facts`
--
ALTER TABLE `guest_facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guest_header`
--
ALTER TABLE `guest_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guest_our_clients`
--
ALTER TABLE `guest_our_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guest_our_portfolio`
--
ALTER TABLE `guest_our_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guest_our_skills`
--
ALTER TABLE `guest_our_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guest_services`
--
ALTER TABLE `guest_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guest_slider_images`
--
ALTER TABLE `guest_slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guest_team`
--
ALTER TABLE `guest_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guest_testimonial`
--
ALTER TABLE `guest_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token1`
--
ALTER TABLE `token1`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
