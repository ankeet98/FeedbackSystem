<?php

session_start();
require '../config/db.php';

$errors = array();
$email = '';

// -------------------- Registration --------------------------------------------------
// On clicking Submit button
if (isset($_POST['student-create'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $phone = $_POST['phone'];
  $course = $_POST['course'];
  $semester = $_POST['semester'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $updated = 'student';

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
  if ($password !== $confirmPassword) {
    $errors['password'] = 'The password entered does not match';
  }

  // check for duplicate email
  $emailQuery = 'SELECT * FROM students WHERE email=? LIMIT 1';
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
    $sql = 'INSERT INTO students(name, email, password, phone, course, semester, gender, dob, updated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssss', $name, $email, $password, $phone, $course, $semester, $gender, $dob, $updated);
    $stmt->execute();
    echo "<script>alert('Registration Sucessful'); window.location='studentLogin.php'</script>";
  }
}

// ---------------------------------------------------------------------------------------
// ----------------------- Student Login -------------------------------------------------
// student clicks login button
if (isset($_POST['student-login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  //Check validation
  if (empty($email)) {
    $errors['email'] = 'Email required';
  }
  if (empty($password)) {
    $errors['password'] = 'Password required';
  }

  if (count($errors) === 0) {
    $sql = 'SELECT * FROM students WHERE email=? LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      // login successful
      $_SESSION['id'] = $user['id'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      header('location: studentIndex.php');
      exit();
    } else {
      $errors['login fail:'] = 'Wrong credentials';
    }
  }
}

// ------------------------------------------------------------------------------
// ---------------- Student profile update --------------------------------------
// Update student profile details
if (isset($_POST['updateStudentProfile'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $course = $_POST['course'];
  $semester = $_POST['semester'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $updated = $_POST['name'];

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

  // check for duplicate email
  $emailQuery = 'SELECT * FROM students WHERE email=? LIMIT 1';
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0) {
    $errors['email'] = 'Email already exists';
    echo "<script>alert('Email already exists'); window.location='updateStudentProfile.php'</script>";
  }

  // if no error, then procced
  if (count($errors) == 0) {
    $sql = "UPDATE students SET name=?, email=?, phone=?, course=?, semester=?,gender=?, dob=?, updated=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssss', $name, $email, $phone, $course, $semester, $gender, $dob, $updated, $_SESSION['id']);
    if ($stmt->execute()) {
      $_SESSION['name'] = $name;
      $_SESSION['email'] = $email;
      echo "<script>alert('Update Successful'); window.location='studentIndex.php'</script>";
      exit();
    } else {
      $errors['db_error'] = 'Database error: failed to update';
    }
    $stmt->close();
  }
}

// ---------------------------------------------------------------------------------------
// ------------------------ Student password update --------------------------------------
// update password
if (isset($_POST['updatePassword'])) {
  $old_pass = $_POST['oldPassword'];
  $new_pass = $_POST['newPassword'];
  $re_pass = $_POST['rePassword'];
  $password_query = mysqli_query($conn, "SELECT password FROM students WHERE id = '" . $_SESSION['id'] . "'");
  $result = $password_query->fetch_assoc();

  if (password_verify($old_pass, $result['password'])) {
    if ($new_pass == $re_pass) {
      $update_pwd = 'UPDATE students SET password = "' . password_hash($new_pass, PASSWORD_DEFAULT) . '" WHERE id="' . $_SESSION["id"] . '"';
      $stmt = $conn->prepare($update_pwd);
      $stmt->execute();
      echo "<script>alert('Update Sucessfully'); window.location='studentIndex.php'</script>";
    } else {
      echo "<script>alert('Your new and retyped password does not match'); window.location='updateStudentPassword.php'</script>";
    }
  } else {
    echo "<script>alert('Your old password is wrong'); window.location='stdPwd.php'</script>";
  }
}

// --------------------------------------------------------------------------------
// ---------------- Feedback selection --------------------------------------------
if (isset($_POST['feedback'])) {
  $faculty_id = $_POST['select-faculty'];
  $question1 = $_POST['question1'];
  $question2 = $_POST['question2'];
  $question3 = $_POST['question3'];
  $question4 = $_POST['question4'];
  $question5 = $_POST['question5'];
  $question6 = $_POST['question6'];
  $question7 = $_POST['question7'];
  $question8 = $_POST['question8'];
  $question9 = $_POST['question9'];
  $question10 = $_POST['question10'];
  $question11 = $_POST['question11'];
  $question12 = $_POST['question12'];
  $review = $_POST['review'];
  $std_id = $_SESSION['id'];
  $updated = $_SESSION['name'];

  if (empty($faculty_id)) {
    $errors['id'] = 'No faculty selected';
  }
  // save feedback
  if (count($errors) == 0) {
    // Check if feedback exist
    $sql = "SELECT * FROM feedbacks WHERE faculty_id=?";
    $idQuery = $conn->prepare($sql);
    $idQuery->bind_param('s', $faculty_id);
    $idQuery->execute();
    $result = $idQuery->get_result();
    $row = $result->fetch_assoc();
    if ($result->num_rows == 0) {
      $insertSql = 'INSERT INTO feedbacks(faculty_id, question1, question2, question3, question4, question5, question6, question7, question8, question9, question10, question11, question12, review, std_id, updated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
      $stmt = $conn->prepare($insertSql);
      $stmt->bind_param('ssssssssssssssss', $faculty_id, $question1, $question2, $question3, $question4, $question5, $question6, $question7, $question8, $question9, $question10, $question11, $question12, $review, $std_id, $updated);
      $stmt->execute();
      echo "<script>alert('Feedback sucessfully saved!'); window.location='studentIndex.php'</script>";
      $stmt->close();
    } else {
      if ($row['std_id'] == $std_id) {
        $updateSql = 'UPDATE feedbacks SET question1=?, question2=?, question3=?, question4=?, question5=?, question6=?, question7=?, question8=?, question9=?, question10=?, question11=?, question12=?, review=?, std_id=?, updated=? WHERE faculty_id=? AND std_id=?';
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param('sssssssssssssssss', $question1, $question2, $question3, $question4, $question5, $question6, $question7, $question8, $question9, $question10, $question11, $question12, $review, $std_id, $updated, $faculty_id, $std_id);
        $stmt->execute();
        echo "<script>alert('Feedback sucessfully updated!'); window.location='studentIndex.php'</script>";
        $stmt->close();
      } else {
        $insertSql = 'INSERT INTO feedbacks(faculty_id, question1, question2, question3, question4, question5, question6, question7, question8, question9, question10, question11, question12, review, std_id, updated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param('ssssssssssssssss', $faculty_id, $question1, $question2, $question3, $question4, $question5, $question6, $question7, $question8, $question9, $question10, $question11, $question12, $review, $std_id, $updated);
        $stmt->execute();
        echo "<script>alert('Feedback sucessfully saved!'); window.location='studentIndex.php'</script>";
        $stmt->close();
      }
    }
  } else {
    $errors['db_error'] = 'Database error: failed to save';
  }
}

// -------------------------------------------------------------------------------
// ---------------------- Logout -------------------------------------------------
// logout student
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['email']);
  header('location: studentLogin.php');
  exit();
}
