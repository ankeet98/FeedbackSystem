<?php include('adminHeader.php'); ?>

<link rel="stylesheet" href="../css/editContent.css">
<h2>Update Faculty Details</h2>
<hr>
<form action="updateFaculty.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <table class="table table-borderless">
    <tbody>
      <tr>
        <div class="alert alert-info">
          <?php echo "Update Profile For ID & NAME : " . $id . ", " . $name . " respectively."; ?>
        </div>
      </tr>
      <tr>
        <?php if (count($errors) > 0) : ?>
          <section class="alert alert-danger">
            <?php foreach ($errors as $errors) : ?>
              <li><?php echo $errors; ?></li>
            <?php endforeach; ?>
          </section>
        <?php endif; ?>
      </tr>
      <tr>
        <td><i class="fa fa-user"></i> Faculty Name :</td>
        <td>
          <input type="text" name="name" value="<?php echo $name ?>" required>
        </td>
        <td><i class="fa fa-envelope"></i> Faculty Email :</td>
        <td>
          <input type="email" name="email" value="<?php echo $email ?>" required>
        </td>
      </tr>
      <tr>
        <td><i class="fa fa-key"></i> Password :</td>
        <td>
          <input type="password" name="password" placeholder="Enter New Password" required>
        </td>
        <td><i class="fa fa-lock"></i> Confirm Password :</td>
        <td>
          <input type="password" name="c_password" placeholder="Confirm New Password" required>
        </td>
      </tr>
      <tr>
        <td><i class="fa fa-book"></i> Programme :</td>
        <td>
          <input type="text" name="programme" value="<?php echo $programme ?>" required>
        </td>
        <td><i class="fa fa-id-badge"></i> Designation :</td>
        <td>
          <input type="text" name="designation" value="<?php echo $designation ?>" required>
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
          <input type="number" name="phone" value="<?php echo $phone ?>" required>
        </td>
      </tr>
      <tr>
        <td>
          <input class="btn btn-info" type="submit" name="update-faculty" value="Update Faculty Details">
        </td>
        <td>
          <a href="manageFaculty.php" class="btn btn-warning">Cancel</a>
        </td>
      </tr>
    </tbody>
  </table>
</form>

</div>
</div>