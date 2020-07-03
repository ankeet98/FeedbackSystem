<?php include('studentHeader.php'); ?>

<link rel="stylesheet" href="../css/updateStdProfile.css">

<form class="box" action="updateStudentProfile.php" method="POST">
  <h3>update your profile details</h3>
  <hr>
  <table class="table table-borderless">
    <tr>
      <!-- Name tag -->
      <td>
        <i class="fa fa-user"></i>Student Name :
        <input class="form-control-md" type="text" name="name" placeholder="Full Name" required>
      </td>
    </tr>
    <tr>
      <!-- Email tag -->
      <td>
        <i class="fa fa-envelope"></i>Student Email :
        <input class="form-control-md" type="email" name="email" placeholder="Valid Email" required>
      </td>
    </tr>
    </tr>
    <tr>
      <!-- Contact no tag -->
      <td>
        <i class="fa fa-phone"></i>Contact Number :
        <input class="form-control-md" type="number" name="phone" placeholder="Contact Number" required>
      </td>
    </tr>
    <tr>
      <!-- Course tag -->
      <td>
        <i class="fa fa-graduation-cap"></i>Select Course :
        <input class="list form-control-md" type="text" name="course" list="courseList" placeholder="Programme" required>
        <datalist id="courseList">
          <option value="BCA"></option>
          <option value="BSc"></option>
          <option value="BA"></option>
          <option value="BCom"></option>
        </datalist>
      </td>
    </tr>
    <tr>
      <!-- Semester tag -->
      <td>
        <i class="fa fa-book"></i>Select Semester :
        <input class="list form-control-md" type="text" name="semester" list="semesterList" placeholder="Semester" required>
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
      <!-- Gender tag -->
      <td>
        <i class="fa fa-venus-mars"></i>Select Gender :
        <div id="gender">
          <i class="fa fa-male"></i>
          <input type="radio" id="male" name="gender" value="M" required>
          <label for="male">Male</label>
          <i class="fa fa-female"></i>
          <input type="radio" id="female" name="gender" value="F" required>
          <label for="female">Female</label></div>
      </td>
    </tr>
    <tr>
      <!-- DOB -->
      <td>
        <i class="fa fa-birthday-cake"></i>Birthday :
        <input type="date" name="dob">
      </td>
    </tr>
    <tr>
      <td>
        <!-- Submit btn -->
        <input class="btn btn-primary" type="submit" name="updateStudentProfile" value="Submit">
        <!-- Reset btn -->
        <input class="btn btn-warning" type="reset" name="reset" value="Reset">
      </td>
    </tr>
  </table>
</form>