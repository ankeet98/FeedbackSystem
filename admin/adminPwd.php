<?php include('adminHeader.php'); ?>

<link rel="stylesheet" href="../css/pwd.css">

<h2>Change Admin Password</h2>
<hr>
<form class="box" action="adminPwd.php" method="POST">
  <table class="table table-borderless">
    <tr>
      <td>
        <label><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;Old password :</label>
        <input type="password" name="oldPwd" placeholder="Old Password" required>
      </td>
    </tr>
    <tr>
      <td>
        <label><i class="fa fa-key"></i>&nbsp;New password :</label>
        <input type="password" name="newPwd" placeholder="New Password" required>
      </td>
    </tr>
    <tr>
      <td>
        <label><i class="fa fa-key"></i>&nbsp;Confirm password :</label>
        <input type="password" name="rePwd" placeholder="Re-type New Password" required>
      </td>
    </tr>
    <tr>
      <td>
        <input class="btn btn-primary" type="submit" name="update-pwd" value="Update Password">
        <input class="btn btn-warning" type="reset" value="Reset Password">
    </tr>
  </table>
</form>

</div>
</div>