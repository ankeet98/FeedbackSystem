<?php
require_once '../controller/facultyController.php';
//if user has not logged in, redirect ot login page
if (!isset($_SESSION['id'])) {
  header('location: facultyLogin.php');
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
  <link rel="stylesheet" href="../css/facultyHeader.css">
  <title>Faculty Dashboard</title>
</head>

<body>

  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h2><?php echo $_SESSION['name'] ?>'s Dashboard</h2>
      </div>
      <ul>
        <li class="active"> <a href="facultyIndex.php"><i class="fa fa-home"></i> HOME</a> </li>
        <li> <a href="checkFeedbacks.php"> <i class="fa fa-thumbs-up"></i>View Feedbacks</a> </li>
        <li> <a href="updateFaculty.php"><i class="fa fa-info"></i> Update Details</a> </li>
        <li> <a href="facultyPwd.php"><i class="fa fa-unlock-alt"></i> Change Password</a> </li>
      </ul>
    </nav>

    <!-- Content -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <span style="color: #DC143C;">Student Feedback System</span>
          <ul class="nav navbar-nav ml-auto">
            <li>
              <a href="facultyLogin.php?logout=1" style="color: red;"><i class="fa fa-sign-out"></i>
                Logout</a>
            </li>
          </ul>
        </div>
      </nav>