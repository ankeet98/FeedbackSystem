<?php require_once '../controller/studentController.php';
//if user has not logged in, redirect ot login page
if (!isset($_SESSION['id'])) {
  header('location: studentLogin.php');
  exit();
}
include('../links.php');
include('../footer.php');
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../css/studentHeader.css">
  <title>Student Dashboard</title>
</head>

<body>
  <div class="header">
    <div class="inner_header">
      <div class="logo_container">
        <h1>
          <a href="studentIndex.php">
            <i class="fa fa-graduation-cap"></i>&nbsp;Welcome</a>,
          <span><?php echo $_SESSION['name']; ?></span>
        </h1>
      </div>
      <!-- Nav links -->
      <ul class="navigation">
        <a href="feedbackPage.php">
          <li> <i class="fa fa-comments"></i>&nbsp;&nbsp;Give A Feedback </li>
        </a>
        <a href="updateStudentProfile.php">
          <li> <i class="fa fa-info"></i>&nbsp;&nbsp;Update Details </li>
        </a>
        </a>
        <a href="stdPwd.php">
          <li> <i class="fa fa-key"></i>&nbsp;&nbsp;Update Password </li>
        </a>
        <a href="studentLogin.php?logout=1" style="color: red !important;">
          <li class="nav-link"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout </li>
        </a>
      </ul>
    </div>
  </div>
  <div id="content">