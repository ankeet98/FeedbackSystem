<?php

session_start();
require '../config/db.php';

$errors = array();

// ADMIN LOGIN WORK ---------------------------------------------------------------------

// if admin clicks login button 
if (isset($_POST['admin-login'])) {
  $admin_username = $_POST['admin-name'];
  $admin_password = $_POST['admin-password'];
  //Check validation
  if (empty($admin_username)) {
    $errors['admin-name'] = 'Username required';
  }
  if (empty($admin_password)) {
    $errors['admin-password'] = 'Password required';
  }

  if (count($errors) === 0) {
    $sql = 'SELECT * FROM admin WHERE username=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $admin_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin_password === $admin['password']) {
      // login successful
      $_SESSION['username'] = $admin['username'];
      header('location: adminIndex.php');
      exit();
    } else {
      $errors['login fail:'] = 'Wrong credentials';
    }
  }
}

// update admin password
if (isset($_POST['update-pwd'])) {
  $old_pass = $_POST['oldPwd'];
  $new_pass = $_POST['newPwd'];
  $re_pass = $_POST['rePwd'];
  $password_query = mysqli_query($conn, "SELECT password FROM admin WHERE username = '" . $_SESSION['username'] . "'");
  $result = $password_query->fetch_assoc();

  if ($old_pass === $result['password']) {
    if ($new_pass == $re_pass) {
      $update_pwd = 'UPDATE admin SET password = "' . $new_pass . '" WHERE username="' . $_SESSION["username"] . '"';
      $stmt = $conn->prepare($update_pwd);
      $stmt->execute();
      echo "<script>alert('Password update successful'); window.location='adminIndex.php'</script>";
    } else {
      echo "<script>alert('Your new and retyped password does not match'); window.location='adminPwd.php'</script>";
    }
  } else {
    echo "<script>alert('Your old password is wrong'); window.location='adminPwd.php'</script>";
  }
}

// admin logout 
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: ../admin/adminLogin.php');
  exit();
}

// ---------------------------------------------------------------------------------------

// ADD FACULTY WORK ----------------------------------------------------------------------

if (isset($_POST['add-faculty'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $email = $_POST['email'];
  $programme = $_POST['programme'];
  $designation = $_POST['designation'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];

  // check validation
  if (empty($name)) {
    $errors['name'] = 'Name required';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invaild email address';
  }
  if (empty($email)) {
    $errors['email'] = 'Email required';
  }
  if (empty($password)) {
    $errors['password'] = 'Password required';
  }
  if ($password !== $c_password) {
    $errors['password'] = 'The password entered does not match';
  }

  // check for duplicate email
  $emailQuery = 'SELECT * FROM faculty WHERE email=? LIMIT 1';
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0) {
    $errors['email'] = 'Email already exists';
  }

  //If no errors found, proceed next
  if (count($errors) === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO faculty(name, password, email, programme, designation, gender, phone) VALUES(?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $name, $password, $email, $programme, $designation, $gender, $phone);
    if ($stmt->execute()) {
      echo "<script>alert('Faculty Registration Sucessful'); window.location='manageFaculty.php'</script>";
    } else {
      echo "<script>alert('Faculty Registration Failed'); window.location='addFaculty.php'</script>";
    }
    $stmt->close();
  }
}

// update faculty details
$id = 0;
$name = '';
$email = '';
$programme = '';
$designation = '';
$phone = '';
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $sql = 'SELECT * FROM faculty WHERE id=? LIMIT 1';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $faculty = $result->num_rows;
  if ($faculty == 1) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $programme = $row['programme'];
    $designation = $row['designation'];
    $phone = $row['phone'];
  }
}
if (isset($_POST['update-faculty'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $email = $_POST['email'];
  $programme = $_POST['programme'];
  $designation = $_POST['designation'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];

  if ($password !== $c_password) {
    $errors['password'] = 'Entered password does not match!';
  }
  // execute sql
  if (count($errors) == 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE faculty SET name=?, email=?, password=?, designation=?, programme=?, gender=?, phone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss', $name, $email, $password, $designation, $programme, $gender, $phone, $id);
    if ($stmt->execute()) {
      echo "<script>alert('Update Successful'); window.location='manageFaculty.php'</script>";
      exit();
    } else {
      $errors['db_error'] = 'Database error: failed to update';
    }
    $stmt->close();
  }
}

// faculty status
if (isset($_GET['status'])) {
  $fac_id = $_GET['status'];
  $sql = $conn->query("SELECT name, status FROM faculty WHERE id=$fac_id");
  $row = $sql->fetch_assoc();
  if ($row['status'] == 1) {
    $conn->query("UPDATE faculty SET status=0 WHERE id=$fac_id");
    $_SESSION['deactivate'] = 'Faculty ' . $row['name'] . ' has been deactivated!';
  } else {
    $conn->query("UPDATE faculty SET status=1 WHERE id=$fac_id");
    $_SESSION['activate'] = 'Faculty ' . $row['name'] . ' has been activated!';
  }
}

// -------------------------------------------------------------------------------------------

// ADD STUDENT WORK --------------------------------------------------------------------------
if (isset($_POST['add-student'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $phone = $_POST['phone'];
  $course = $_POST['course'];
  $semester = $_POST['semester'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];
  $updated = $_SESSION['username'];

  // Check validation
  if (empty($name)) {
    $errors['name'] = 'Name required';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invaild email address';
  }
  if (empty($email)) {
    $errors['email'] = 'Email required';
  }
  if (empty($password)) {
    $errors['password'] = 'Password required';
  }
  if ($password !== $c_password) {
    $errors['password'] = 'The password entered does not match';
  }

  // check for duplicate email
  $emailQuery = 'SELECT * FROM students WHERE email=? LIMIT 1';
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $emailQuery);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0) {
    $errors['email'] = 'Email already exists';
  }

  // If no error, proceed next
  if (count($errors) == 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO students(name, email, password, phone, course, semester, gender, dob, updated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssss', $name, $email, $password, $phone, $course, $semester, $gender, $birthday, $updated);
    $stmt->execute();
    echo "<script>alert('Student Registration Sucessful'); window.location='manageStudent.php'</script>";
  }
}

// delete student
if (isset($_GET['delete-student'])) {
  $std_id = $_GET['delete-student'];
  $conn->query("DELETE FROM students WHERE id=$std_id");
  $_SESSION['message'] = 'Record has been deleted!';
}
