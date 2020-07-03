<?php include('adminHeader.php'); ?>

<link rel="stylesheet" href="../css/editContent.css">

<h2>check feedbacks</h2>
<hr>
<form class="feedbacks" action="feedbacks.php" method="POST">
  <div>
    <label>Select the faculty to review their feedback :</label>
    <select name="select-faculty" required>
      <option value="" selected>-- Select A Faculty --</option>
      <?php
      $sql = 'SELECT id, name FROM faculty WHERE status=1';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) :
        while ($row = $result->fetch_assoc()) : ?>
          <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
        <?php endwhile; ?>
      <?php endif; ?>
    </select>
    <input class="btn btn-primary" type="submit" name="check-feedback" value="Select Faculty">

    <?php if (isset($_SESSION['feedback'])) : ?>
      <div class="alert alert-danger">
        <?php
        echo $_SESSION['feedback'];
        unset($_SESSION['feedback']);
        ?>
      </div>
    <?php endif; ?>
  </div>
  <?php
  if (isset($_POST['check-feedback'])) {
    $select = $_POST['select-faculty'];
    $sql = "SELECT id, name FROM faculty WHERE id=$select";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  ?>
    <label>Faculty ID : <?php echo $row['id']; ?></label> <br>
    <label>Faculty Name : <?php echo $row['name']; ?></label>
  <?php
  }
  ?>
  <hr>
  <table class="table table-bordered">
    <thread>
      <tr>
        <th></th>
        <th>Teacher provided the course outline having weekly content plan with list of required text book.</th>
        <th>Course objectives, learning outcomes and grading criteria are clear to me.</th>
        <th>Course integrates theoritical concepts with the real world examples.</th>
        <th>Teacher is puntual, arrives on time and leaves on time.</th>
        <th>Teacher is good at stimulating the interest in the course content.</th>
        <th>Teacher is good at explaning the subject matter.</th>
        <th>Teacher's presentation was clear, loud and easy to understand.</th>
        <th>Teacher is good at using innovative teaching methods.</th>
        <th>Teacher is availabe and helpful during counseling hours.</th>
        <th>Teacher has completed the whole course as per course outline.</th>
        <th>Teacher was always fair and impartial.</th>
        <th>Assesments conduct are clearly connected to maximize learning objectives.</th>
        <th>Student's Review</th>
        <th>Student's ID</th>
        <th>Student's Name</th>
        <th>Delete Feedback</th>
      </tr>
    </thread>
    <tbody class="tbody">
      <?php
      if (isset($_POST['check-feedback'])) {
        $select = $_POST['select-faculty'];

        if (empty($select)) {
          $errors['select-faculty'] = 'Select a faculty';
        }

        if (count($errors) == 0) {

          $sql = "SELECT * FROM feedbacks WHERE faculty_id=$select";
          $result = $conn->query($sql);
          $sum = 0;
          if ($result->num_rows > 0) :
            $question1 = $question2 = $question3 = $question4 = $question5 = $question6 = $question7 = $question8 = $question9 = $question10 = $question11 = $question12 = 0;
            $rowCount = 0;
            while ($row = $result->fetch_assoc()) :
              $question1 +=  $row['question1'];
              $question2 +=  $row['question2'];
              $question3 +=  $row['question3'];
              $question4 +=  $row['question4'];
              $question5 +=  $row['question5'];
              $question6 +=  $row['question6'];
              $question7 +=  $row['question7'];
              $question8 +=  $row['question8'];
              $question9 +=  $row['question9'];
              $question10 +=  $row['question10'];
              $question11 +=  $row['question11'];
              $question12 +=  $row['question12'];
              $rowCount++;
              $percentage = ($question1 / $rowCount + $question2 / $rowCount + $question3 / $rowCount + $question4 / $rowCount + $question5 / $rowCount + $question6 / $rowCount + $question7 / $rowCount + $question8 / $rowCount + $question9 / $rowCount + $question10 / $rowCount + $question11 / $rowCount + $question12 / $rowCount) / 60 * 100;
      ?>
              <tr>
                <td></td>
                <td><?php echo $row['question1']; ?></td>
                <td><?php echo $row['question2']; ?></td>
                <td><?php echo $row['question3']; ?></td>
                <td><?php echo $row['question4']; ?></td>
                <td><?php echo $row['question5']; ?></td>
                <td><?php echo $row['question6']; ?></td>
                <td><?php echo $row['question7']; ?></td>
                <td><?php echo $row['question8']; ?></td>
                <td><?php echo $row['question9']; ?></td>
                <td><?php echo $row['question10']; ?></td>
                <td><?php echo $row['question11']; ?></td>
                <td><?php echo $row['question12']; ?></td>
                <td><?php echo $row['review']; ?></td>
                <td><?php echo $row['std_id']; ?></td>
                <td><?php echo $row['updated']; ?></td>
                <td>
                  <a href="feedbacks.php?delete=<?php echo $row['id']; ?>">
                    <i class='fa fa-ban'></i></a>
                </td>
              </tr>
            <?php
            endwhile; ?>
            <tr>
              <td>Average</td>
              <td><?php echo $question1 / $rowCount; ?></td>
              <td><?php echo $question2 / $rowCount; ?></td>
              <td><?php echo $question3 / $rowCount; ?></td>
              <td><?php echo $question4 / $rowCount; ?></td>
              <td><?php echo $question5 / $rowCount; ?></td>
              <td><?php echo $question6 / $rowCount; ?></td>
              <td><?php echo $question7 / $rowCount; ?></td>
              <td><?php echo $question8 / $rowCount; ?></td>
              <td><?php echo $question9 / $rowCount; ?></td>
              <td><?php echo $question10 / $rowCount; ?></td>
              <td><?php echo $question11 / $rowCount; ?></td>
              <td><?php echo $question12 / $rowCount; ?></td>
              <td colspan="2">Total Percentage</td>
              <td colspan="2"><?php echo $percentage; ?>%</td>
            </tr>
      <?php else :
            echo "<div class='alert alert-danger'>No Feedbacks Available</div>";
          endif;
        }
      }
      if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $conn->query("DELETE FROM feedbacks WHERE id=$id");
        $_SESSION['feedback'] = 'Feedback has been deleted!';
      }
      ?>

    </tbody>
  </table>
</form>
</div>
</div>