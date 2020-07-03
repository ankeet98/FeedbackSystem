<?php
require_once('../controller/studentController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="../css/studentRegisteration.css" />
  <?php
  include('../links.php');
  include('../footer.php'); ?>
</head>

<body>
  <div class="container">
    <div class="row">
      <!-- About Content -->
      <div class="col-md-7">
        <h1 class="text-left" id="about">About Us</h1>
        <p class="text-left">Student Feedback System aims to rate and analyse the college faculty’s performance.</p>
        <a class="btn btn-outline-primary" href="../about.php">Know More</a>
      </div>
      <!-- Form Content -->
      <div class="col-md-5">
        <h2>Register Here</h2>

        <?php if (count($errors) > 0) : ?>
          <div class="alert alert-danger">
            <?php foreach ($errors as $errors) : ?>
              <li><?php echo $errors; ?></li>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <form action="studentRegistration.php" method="POST">
          <div class="row">
            <!-- Name tag -->
            <div class="form-group">
              <i class="fa fa-user"></i> <input type="text" name="name" placeholder="Full Name" required>
            </div>
            <!-- Email tag -->
            <div class="form-group">
              <i class="fa fa-envelope"></i> <input type="email" name="email" placeholder="Email" required>
            </div>
            <!-- Password tag -->
            <div class="form-group">
              <i class="fa fa-key"></i> <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
              <i class="fa fa-lock"></i> <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
            </div>
            <!-- Contact no tag -->
            <div class="form-group">
              <i class="fa fa-phone"></i> <input type="number" name="phone" placeholder="Contact Number" required>
            </div>
            <!-- Course tag -->
            <div class="form-group">
              <i class="fa fa-graduation-cap"></i> <input class="list" type="text" name="course" list="courseList" placeholder="Course" required>
              <datalist id="courseList">
                <option value="BCA"></option>
                <option value="BSc"></option>
                <option value="BA"></option>
                <option value="BCom"></option>
              </datalist>
            </div>
            <!-- Semester tag -->
            <div class="form-group">
              <i class="fa fa-book"></i> <input class="list" type="text" name="semester" list="semesterList" placeholder="Semester" required>
              <datalist id="semesterList">
                <option value="I"></option>
                <option value="II"></option>
                <option value="III"></option>
                <option value="IV"></option>
                <option value="V"></option>
                <option value="VI"></option>
              </datalist>
            </div>
            <!-- Gender tag -->
            <div class="form-group">
              <i class="fa fa-venus-mars"></i>
              <input type="radio" id="male" name="gender" value="M" required>
              <label for="male">Male</label>
              <input type="radio" id="female" name="gender" value="F" required>
              <label for="female">Female</label>
            </div>
            <!-- Birthday tag -->
            <div class="form-group">
              <i class="fa fa-birthday-cake"></i> <input type="date" id="birthday" name="dob" required>
            </div>
            <!-- Submit tag -->
            <div class="form-group">
              <input id="std" class="btn btn-primary" type="submit" name="student-create" value="submit">
            </div>
            <!-- Reset tag -->
            <div class="form-group">
              <input class="btn btn-warning" type="reset" name="reset" value="reset">
            </div>

          </div>
        </form>
      </div>

    </div>
  </div>