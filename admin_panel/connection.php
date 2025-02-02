<?php
$con=mysqli_connect("localhost","root","","employees_management");
// $q="create database employees_management";


// $q="employees_management";

// $q="CREATE TABLE admin (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     first_name VARCHAR(50),
//     last_name VARCHAR(10),
//     email VARCHAR(50),
//     gender VARCHAR(10),
//     contact INT(10)
// );
// ";

// $q="CREATE TABLE contact (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(100),
//     email VARCHAR(50),
//     subject VARCHAR(200),
//     message VARCHAR(1000)
// );
// ";

// $q="CREATE TABLE employees (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     nid VARCHAR(10),
//     first_name VARCHAR(100),
//     last_name VARCHAR(100),
//     full_name VARCHAR(100),
//     user_name VARCHAR(200),
//     email VARCHAR(50),
//     password VARCHAR(50),
//     birthday DATE,
//     gender VARCHAR(10),
//     contact INT(10),
//     address VARCHAR(200),
//     department VARCHAR(20),
//     degree VARCHAR(100),
//     profile_pic TEXT
// );
// ";


// $q="CREATE TABLE emp_login (
//     id INT(11),
//     user_name VARCHAR(200),
//     password VARCHAR(50),
//     status VARCHAR(20),
//     FOREIGN KEY (id) REFERENCES employees(id)
// );
// ";

// $q="CREATE TABLE leaves (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     emp_id INT(11),
//     user_name VARCHAR(200),
//     reason VARCHAR(100),
//     start_date DATE,
//     end_date DATE,
//     total_days INT(10),
//     status VARCHAR(10)
// );
// ";

// $q="CREATE TABLE projects (
//     p_id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     p_name VARCHAR(100),
//     leader_name VARCHAR(100),
//     leader_email_id VARCHAR(50),
//     p_description VARCHAR(200),
//     due_date DATE,
//     sub_date DATE,
//     points INT(11),
//     status VARCHAR(20)
// );
// ";

// $q="CREATE TABLE salary (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     emp_id INT(11),
//     email VARCHAR(50),
//     base_salary FLOAT,
//     bonus FLOAT,
//     total_salary FLOAT
// );
// ";

// $q="ALTER TABLE salary
// ADD CONSTRAINT fk_salary_details_employees
// FOREIGN KEY (emp_id) REFERENCES employees(id);
// ";

// $q="CREATE TABLE subscription (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     email VARCHAR(50)
// );
// ";

// $q="CREATE TABLE tours (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     emp_id INT(11),
//     nid VARCHAR(50),
//     emp_name VARCHAR(100),
//     email VARCHAR(50),
//     department VARCHAR(20),
//     contact INT(10),
//     start_date DATE,
//     end_date DATE,
//     description VARCHAR(200),
//     address VARCHAR(500),
//     mode_of_travel VARCHAR(50),
//     total_cost DOUBLE
// );
// ";

// $q="DELIMITER //
// CREATE TRIGGER after_employee_insert
// AFTER INSERT ON employees
// FOR EACH ROW
// BEGIN
//     INSERT INTO emp_login (user_name, password, status)
//     VALUES (NEW.user_name, NEW.password, 'Inactive');
// END;
// //
// DELIMITER ;";


// $q="ALTER TABLE employees
// ADD COLUMN role VARCHAR(50) DEFAULT 'user'";

// $q="UPDATE admin
// SET role = 'admin';";


// if(mysqli_query($con,$q))          
// {
//      echo "Database is created succesfully.";
// }
// else
// {
//     echo "Database is not created.";
// }

// if(mysqli_select_db($con,$q))          
// {
//      echo "Database is selected.";
// }
// else
// {
//     echo "Database is not selected.";
// }

// if(mysqli_query($con,$q))          
// {
//      echo "Table is created.";
// }
// else
// {
//     echo "Table is not created";
// }

?>