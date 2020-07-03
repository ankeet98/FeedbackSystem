<?php include('adminHeader.php'); ?>

<link rel="stylesheet" href="../css/editContent.css">

<h2>Add New Faculty</h2>
<hr>
<form action="addFaculty.php" method="POST">
  <table class="table table-borderless">
    <tbody>
      <?php if (count($errors) > 0) : ?>
        <section class="alert alert-danger">
          <?php foreach ($errors as $errors) : ?>
            <li><?php echo $errors; ?></li>
          <?php endforeach; ?>
        </section>
      <?php endif; ?>
      <tr>
        <td><i class="fa fa-user"></i> Faculty Name :</td>
        <td>
          <input type="text" name="name" placeholder="Enter Full Name" required>
        </td>
        <td><i class="fa fa-envelope"></i> Faculty Email :</td>
        <td>
          <input type="email" name="email" placeholder="Enter Faculty Email" required>
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
        <td><i class="fa fa-book"></i> Programme :</td>
        <td>
          <input type="text" name="programme" placeholder="Enter Department" required>
        </td>
        <td><i class="fa fa-id-badge"></i> Designation :</td>
        <td>
          <input type="text" name="designation" placeholder="Enter Designation" required>
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
        <td><i class="fa fa-phone"></i> Phone :</td>
        <td>
          <input type="number" name="phone" placeholder="Enter Phone Number" required>
        </td>
      </tr>
      <tr>
        <td>
          <input class="btn btn-primary" type="submit" name="add-faculty" value="Add New Faculty">
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