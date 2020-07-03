<?php include('facultyHeader.php'); ?>

<link rel="stylesheet" href="../css/pwd.css">

<h2>Change Faculty Password</h2>
<hr>
<form class="box" action="facultyPwd.php" method="POST">
  <table class="table table-borderless">
    <tr>
      <td>
        <label><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;Old password :</label>
        <input type="password" name="oldPassword" placeholder="Old Password" required>
      </td>
    </tr>
    <tr>
      <td>
        <label><i class="fa fa-key"></i>&nbsp;New password :</label>
        <input type="password" name="newPassword" placeholder="New Password" required>
      </td>
    </tr>
    <tr>
      <td>
        <label><i class="fa fa-lock"></i>&nbsp;Confirm password :</label>
        <input type="password" name="rePassword" placeholder="Re-type New Password" required>
      </td>
    </tr>
    <tr>
      <td>
        <input class="btn btn-primary" type="submit" name="updatePassword" value="Update Password">
        <input class="btn btn-warning" type="reset" value="Reset Password">
    </tr>
  </table>
</form>

</div>
</div>