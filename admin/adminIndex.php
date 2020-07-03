<?php include('adminHeader.php');

// Display number of faculties available
$sql = 'SELECT * FROM faculty';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $dataCount = $result->num_rows;
  echo "<div class='alert alert-info'>Total number of faculties available : " . $dataCount . "</div>";
} else {
  echo "<div class='alert alert-danger'>Total number of faculties available : 0</div>";
}

// Display number of students registered
$sql = 'SELECT * FROM students';
$stmt = $conn->query($sql);

if ($stmt->num_rows > 0) {
  $dataCount = $stmt->num_rows;
  echo "<div class='alert alert-info'>Total number of students registered : " . $dataCount . "</div>";
} else {
  echo "<div class='alert alert-warning'>Total number of students registered : 0</div>";
}
?>

<hr>
<h2>student feedback system</h2>
<p>
  Student Feedback System for college students have been developed which
  aims to rate and analyse the college faculty’s performance.
  <br>
  To know more visit our <a href="about2.php" style="color: blueviolet;">@about</a> page.
</p>

</div>
</div>