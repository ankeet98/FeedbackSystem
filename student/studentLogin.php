<?php
require_once('../controller/studentController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <link rel="stylesheet" href="../css/studentStyle.css">
</head>

<body>

  <form action="studentLogin.php" method="POST">
    <div class="login-box">
      <h1>Student Login</h1>

      <?php if (count($errors) > 0) :
        foreach ($errors as $errors) :
          echo $errors;
        endforeach;
      endif; ?>

      <div class="textbox">
        <i class="fa fa-user" aria-hidden="true"></i>
        <input type="email" placeholder="Email" name="email" required>
      </div>

      <div class="textbox">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" placeholder="Password" name="password" required>
      </div>

      <input class="btn" type="submit" name="student-login" value="Sign In">
      <div id="click">
        Back to home page?<a href="../index.php?"> @Click Here</a>
      </div>
    </div>
  </form>
  <?php include('../footer.php'); ?>

</body>

</html>