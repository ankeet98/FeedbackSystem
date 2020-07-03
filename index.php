<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Feedback System</title>
  <link rel="stylesheet" href="css/indexstyle.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <?php include('links.php');
  include('footer.php'); ?>

</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent">
    <div class="container">
      <!-- Brand tag -->
      <a class="navbar-brand" href="index.php">Student Feedback System</a>
      <!-- About -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
      </ul>
      <!-- Register -->
      <div class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="student/studentRegistration.php">Student Register</a>
        </li>
        <!-- Login dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
            Login
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="admin/adminLogin.php">Admin</a>
            <a class="dropdown-item" href="faculty/facultyLogin.php">Faculty</a>
            <a class="dropdown-item" href="student/studentLogin.php">Student</a>
          </div>
        </li>
      </div>

    </div>
  </nav>