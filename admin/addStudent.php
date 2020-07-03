<?php include('adminHeader.php'); ?>

<link rel="stylesheet" href="../css/editContent.css">

<h2>Add New Student</h2>
<hr>
<?php if (count($errors) > 0) : ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $errors) : ?>
      <li><?php echo $errors; ?></li>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<form action="addStudent.php" method="POST">
  <table class="table table-borderless">
    <tbody>
      <tr>
        <td><i class="fa fa-user"></i> Student Name :</td>
        <td>
          <input type="text" name="name" placeholder="Enter Full Name" required>
        </td>
        <td><i class="fa fa-envelope"></i> Email :</td>
        <td>
          <input type="email" name="email" placeholder="Enter Student Email" required>
        </td>
      </tr>
      <tr>
        <td><i class="fa fa-key"></i> Password :</td>
        <td>
          <input type="password" name="password" placeholder="Enter Password" required>
        </td>
        <td><i class="fa fa-lock"></i> Confirm Password :</td>
        <td>
          <input type="password" name="c_password" placeholder="Confirm Password" required>
        </td>
      </tr>
      <tr>
        <td> <i class="fa fa-graduation-cap"></i> Course :</td>
        <td>
          <input class="list" type="text" name="course" list="courseList" placeholder="Course" required>
          <datalist id="courseList">
            <option value="BCA"></option>
            <option value="BSc"></option>
            <option value="BA"></option>
            <option value="BCom"></option>
          </datalist>
        </td>
        <td><i class="fa fa-book"></i> Semester :</td>
        <td>
          <input class="list" type="text" name="semester" list="semesterList" placeholder="Semester" required>
          <datalist id="semesterList">
            <option value="I"></option>
            <option value="II"></option>
            <option value="III"></option>
            <option value="IV"></option>
            <option value="V"></option>
            <option value="VI"></option>
          </datalist>
        </td>
      </tr>
      <tr>
        <td><i class="fa fa-venus-mars"></i> Gender :</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male" value="M" required>
            <label class="form-check-label" for="male">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="female" value="F" required>
            <label class="form-check-label" for="female">Female</label>
          </div>
        </td>
        <td> <i class="fa fa-birthday-cake"></i> Date Of Birth :</td>
        <td>
          <input type="date" id="birthday" name="birthday" required>
        </td>
      </tr>
      <tr>
        <td><i class="fa fa-phone"></i> Phone :</td>
        <td>
          <input type="number" name="phone" placeholder="Enter Phone Number" required>
        </td>
      </tr>
      <tr>
        <td>
          <input class="btn btn-primary" type="submit" name="add-student" value="Add New Student">
        </td>
        <td>
          <input class="btn btn-warning" type="reset" name="reset" value="Clear Data">
        </td>
      </tr>
    </tbody>
  </table>
</form>

</div>
</div>