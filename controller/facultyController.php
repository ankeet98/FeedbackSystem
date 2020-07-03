<?php

session_start();
require '../config/db.php';

$errors = array();

// if faculty clicks login button
if (isset($_POST['faculty-login'])) {
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
    $sql = 'SELECT * FROM faculty WHERE email=? LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $faculty = $result->fetch_assoc();

    if (password_verify($password, $faculty['password'])) {
      if ($faculty['status'] == 1) {
        $_SESSION['id'] = $faculty['id'];
        $_SESSION['name'] = $faculty['name'];
        $_SESSION['email'] = $faculty['email'];
        header('location: facultyIndex.php');
        exit();
      } else {
        $errors['login fail:'] = 'Faculty deactive';
      }
    } else {
      $errors['login fail:'] = 'Wrong credentials';
      session_destroy();
    }
  }
}

// Update faculty profile details
if (isset($_POST['update-faculty'])) {
  $name = $_POST['name'];
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

  // if no error, then procced
  if (count($errors) == 0) {
    $sql = "UPDATE faculty SET name=?, email=?, programme=?, designation=?, gender=?, phone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $name, $email, $programme, $designation, $gender, $phone, $_SESSION['id']);
    if ($stmt->execute()) {
      $_SESSION['name'] = $name;
      $_SESSION['email'] = $email;
      echo "<script>alert('Update Successful'); window.location='facultyIndex.php'</script>";
      exit();
    } else {
      $errors['db_error'] = 'Database error: failed to update';
    }
    $stmt->close();
  }
}

// update password
if (isset($_POST['updatePassword'])) {
  $old_pass = $_POST['oldPassword'];
  $new_pass = $_POST['newPassword'];
  $re_pass = $_POST['rePassword'];
  $password_query = mysqli_query($conn, "SELECT password FROM faculty WHERE id = '" . $_SESSION['id'] . "'");
  $result = $password_query->fetch_assoc();

  if (password_verify($old_pass, $result['password'])) {
    if ($new_pass == $re_pass) {
      $update_pwd = 'UPDATE faculty SET password = "' . password_hash($new_pass, PASSWORD_DEFAULT) . '" WHERE id="' . $_SESSION["id"] . '"';
      $stmt = $conn->prepare($update_pwd);
      $stmt->execute();
      echo "<script>alert('Update Sucessfully'); window.location='facultyIndex.php'</script>";
    } else {
      echo "<script>alert('Your new and retyped password does not match'); window.location='facultyPwd.php'</script>";
    }
  } else {
    echo "<script>alert('Your old password is wrong'); window.location='facultyPwd.php'</script>";
  }
}

//Logout
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['email']);
  header('location: ../faculty/facultyLogin.php');
  exit();
}
