<?php include('studentHeader.php'); ?>

<link rel="stylesheet" href="../css/feedbackPageStyle.css">

<section class="container-fluid">
  <section class="row justify-content-center">
    <section class="col-11">

      <form class="box" action="feedbackPage.php" method="POST">

        <h2>Give a feedback to your teacher</h2>
        <?php if (count($errors) > 0) : ?>
          <div class="alert alert-danger">
            <?php foreach ($errors as $errors) : ?>
              <li><?php echo $errors; ?></li>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <table class="table">
          <thread class="thread-light">
            <tr>
              <th scope="col"><label><i class="fa fa-commenting"></i>&nbsp;&nbsp;Select the faculty to give feedback:</label></th>
              <td>
                <select class="custom-select" name="select-faculty" required>
                  <option value="" selected>-- Select A Faculty --</option>
                  <?php
                  $sql = 'SELECT id, name FROM faculty WHERE status=1';
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) : ?>
                      <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php endwhile;
                  else : ?>
                    <option>-- No Faculty Available --</option>
                  <?php endif; ?>
                </select>
              </td>
            </tr>
          </thread>
        </table>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Course Material</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Teacher provided the course outline having weekly content plan with list of required text book.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question1" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question1" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question1" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question1" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question1" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Course objectives, learning outcomes and grading criteria are clear to me.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question2" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question2" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question2" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question2" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question2" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Course integrates theoritical concepts with the real world examples.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question3" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question3" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question3" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question3" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question3" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
          </tbody>
        </table>

        <br>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Class teaching</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">4</th>
              <td>Teacher is puntual, arrives on time and leaves on time.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question4" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question4" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question4" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question4" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question4" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Teacher is good at stimulating the interest in the course content.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question5" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question5" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question5" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question5" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question5" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Teacher is good at explaning the subject matter.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question6" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question6" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question6" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question6" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question6" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">7</th>
              <td>Teacher's presentation was clear, loud and easy to understand.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question7" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question7" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question7" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question7" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question7" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">8</th>
              <td>Teacher is good at using innovative teaching methods.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question8" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question8" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question8" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question8" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question8" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">9</th>
              <td>Teacher is availabe and helpful during counseling hours.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question9" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question9" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question9" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question9" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question9" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">10</th>
              <td>Teacher has completed the whole course as per course outline.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question10" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question10" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question10" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question10" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question10" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
          </tbody>
        </table>

        <br>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Class Assessment</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">11</th>
              <td>Teacher was always fair and impartial.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question11" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question11" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question11" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question11" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question11" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
              </td>
            </tr>
            <tr>
              <th scope="row">12</th>
              <td>Assesments conduct are clearly connected to maximize learning objectives.</td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question12" id="inlineRadio" value="5" required>
                  <label class="form-check-label" for="inlineRadio">5</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question12" id="inlineRadio" value="4" required>
                  <label class="form-check-label" for="inlineRadio">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question12" id="inlineRadio" value="3" required>
                  <label class="form-check-label" for="inlineRadio">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question12" id="inlineRadio" value="2" required>
                  <label class="form-check-label" for="inlineRadio">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="question12" id="inlineRadio" value="1" required>
                  <label class="form-check-label" for="inlineRadio">1</label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

        <br>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Write your personal review:</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">13</th>
              <td>Write here:</td>
              <td>
                <textarea name="review" cols="70" rows="5" placeholder=" . . . .anything you would like to write about your teacher. . . ."></textarea>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Submit tag -->
        <div class="form-group">
          <input class="btn btn-primary " type="submit" name="feedback" value="Submit Your Feedback">
          <!-- Reset tag -->
          <input class="btn btn-warning" type="reset" name="reset" value="Reset Above Selection">
        </div>

      </form>
    </section>
  </section>
  </div>