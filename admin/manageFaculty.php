<?php include('adminHeader.php'); ?>

<link rel="stylesheet" href="../css/editContent.css">

<h2>Manage Faculty</h2>
<hr>
<form action="manageFaculty.php" method="POST" id="update_data">
  <?php if (isset($_SESSION['deactivate'])) : ?>
    <div class="alert alert-danger">
      <?php
      echo $_SESSION['deactivate'];
      unset($_SESSION['deactivate']);
      ?>
    </div>
  <?php endif; ?>
  <?php if (isset($_SESSION['activate'])) : ?>
    <div class="alert alert-success">
      <?php
      echo $_SESSION['activate'];
      unset($_SESSION['activate']);
      ?>
    </div>
  <?php endif; ?>
  <table class="table table-bordered table-hover table-info">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Programme</th>
        <th scope="col">Designation</th>
        <th scope="col">Gender</th>
        <th scope="col">Phone</th>
        <th scope="col">Update</th>
        <th scope="col" colspan="2">Status</th>
      </tr>
    </thead>
    <tbody class="tbody">
      <?php
      $sql = 'SELECT * FROM faculty';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) :
        while ($row = $result->fetch_assoc()) :
      ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['programme']; ?></td>
            <td><?php echo $row['designation']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
              <a href="updateFaculty.php?edit=<?php echo $row['id']; ?>">
                <i class='fa fa-pencil'></i></a>
            </td>
            <td>
              <a href="manageFaculty.php?status=<?php echo $row['id']; ?>">
                <i class='fa fa-user-circle'></i></a>
            </td>
            <td>
              <?php
              if ($row['status'] == 1) {
                echo 'Active';
              } else {
                echo 'Deactive';
              }
              ?>
            </td>
          </tr>
      <?php
        endwhile;
      else :
        echo "<div class='alert alert-danger'>No Faculty Available</div>";
      endif;
      ?>

    </tbody>
  </table>
</form>

<script>
  $(document).ready(function() {
    $("table a fa-user-circle").click(function() {
      $(this).toggleClass("deactive");
    });
  });
</script>
<style>
  .deactive {
    color: red;
  }
</style>

</div>
</div>