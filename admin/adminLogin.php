<?php
require_once('../controller/adminController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../css/adminStyle.css">
</head>

<body>

  <form action="adminLogin.php" method="POST">
    <section class="box">
      <h1>Admin Login</h1>
      <?php if (count($errors) > 0) :
        foreach ($errors as $errors) :
          echo $errors;
        endforeach;
      endif; ?>
      <input type="text" name="admin-name" placeholder="Username" required>
      <input type="password" name="admin-password" placeholder="Password" required>
      <input type="submit" name="admin-login" value="Login">
      <div>
        Back to home page?<a href="../index.php"> @Click Here</a>
      </div>
    </section>
  </form>
  <?php include('../footer.php'); ?>