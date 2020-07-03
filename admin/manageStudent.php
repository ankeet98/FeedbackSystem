<?php include('adminHeader.php'); ?>

<link rel="stylesheet" href="../css/editContent.css">

<h2>Manage Student</h2>
<hr>
<form action="manageStudent.php" method="POST">
  <?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-danger">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>
  <?php endif; ?>
  <table class="table table-bordered table-hover table-info">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Course</th>
        <th scope="col">Semester</th>
        <th scope="col">Gender</th>
        <th scope="col">DOB</th>
        <th scope="col">Delete</th>
        <th scope="col">Updated</th>
      </tr>
    </thead>
    <tbody class="tbody">
      <?php
      $sql = 'SELECT id, name, email, phone, course, semester, gender, dob, updated FROM students';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) :
        while ($row = $result->fetch_assoc()) :
      ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td>
              <a href="manageStudent.php?delete-student=<?php echo $row['id']; ?>">
                <i class='fa fa-ban'></i></a>
            </td>
            <td><?php echo $row['updated']; ?></td>
          </tr>
      <?php
        endwhile;
      else :
        echo "<div class='alert alert-warning'>No Students Available</div>";
      endif;
      ?>
    </tbody>
  </table>
</form>

</div>
</div>