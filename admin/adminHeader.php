<?php
require_once '../controller/adminController.php';
//if user has not logged in, redirect ot login page
if (!isset($_SESSION['username'])) {
  header('location: adminLogin.php');
  exit();
}
include('../links.php');
include('../footer.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/adminHeader.css">
</head>

<body>

  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h2>Admin Dashboard</h2>
      </div>

      <ul class="list-unstyled components">
        <li> <a href="#subMenu1" data-toggle="collapse" class="dropdown-toggle">
            <i class="fa fa-user-circle-o"></i> Faculty</a>
          <ul class="collapse list-unstyled" id="subMenu1">
            <li> <a href="addFaculty.php"><i class="fa fa-user-plus"></i> Add Faculty</a> </li>
            <li> <a href="manageFaculty.php"><i class="fa fa-users"></i> Manage Faculty</a> </li>
          </ul>
        </li>
        <li>
          <a href="#subMenu2" data-toggle="collapse" class="dropdown-toggle">
            <i class="fa fa-graduation-cap"></i>Student</a>
          <ul class="collapse list-unstyled" id="subMenu2">
            <li> <a href="addStudent.php"><i class="fa fa-user-plus"></i> Add Student</a> </li>
            <li> <a href="manageStudent.php"><i class="fa fa-users"></i> Manage Student</a> </li>
          </ul>
        </li>
        <li> <a href="feedbacks.php"> <i class="fa fa-thumbs-up"></i> Feedbacks</a> </li>
        <li class="active"> <a href="adminIndex.php"><i class="fa fa-home"></i> HOME</a> </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <span style="color: #DC143C;">Student Feedback System</span>
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="adminPwd.php" style="color: #008B8B;"><i class="fa fa-unlock-alt"></i> Change Password</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminLogin.php?logout=1" style="color: red;"><i class="fa fa-sign-out"></i> Logout</a>
            </li>
          </ul>
        </div>
      </nav>