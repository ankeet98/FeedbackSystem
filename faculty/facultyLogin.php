<?php
require_once('../controller/facultyController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Faculty Login</title>
  <link rel="stylesheet" type="text/css" href="../css/facultyStyle.css">
</head>

<body>
  <div class="login-box">
    <img src="../css/avatar.jpg" class="avatar">
    <h1>Faculty Login</h1>
    <form action="facultyLogin.php" method="POST">
      <?php if (count($errors) > 0) :
        foreach ($errors as $errors) :
          echo $errors;
        endforeach;
      endif; ?>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="faculty-login" value="Login">
      <div>Back to home page?<a href="../index.php"> @Click Here</a></div>
    </form>
  </div>
  <?php include('../footer.php'); ?>