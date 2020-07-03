<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About us</title>
  <?php
  include('links.php');
  include('footer.php'); ?>

  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@1,700&display=swap" rel="stylesheet" />
  <style type="text/css">
    body {
      background: linear-gradient(rgba(255, 255, 255, 0.4),
          rgba(255, 255, 255, 0.4)),
        url(css/classroom-min.jpg);
      background-size: cover;
      background-position: center;
      width: 100%;
      margin-top: 100px;
    }

    html {
      height: 100%;
    }

    .container {
      margin-left: 8%;
    }

    h1 {
      text-align: center;
      text-transform: uppercase;
    }

    p {
      font-family: "Comic Neue", cursive;
      font-size: larger;
      text-align: justify;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>About Student Feedback System</h1>
    <hr />
    <p>
      Student Feedback System for college students have been developed which
      aims to rate and analyse the college faculty’s performance. This type of
      Feedback system reduces the strenuous work of physically examining the
      feedback pages of each and every student. The system also reduces the
      burden of efforts and burden of keeping and maintaining the records
      on a manual base, it requires a lot of space and to keep up
      such records. This system can also be used to update subject related
      queries and allow students to interact with them and stay updated. Also
      the students feedbacks can be tempted for wrong reasons in case of paper
      based feedbacks wherein the SFS will always ensure of feedbacks privacy.
      Another important feature of the SFS is that physical presence of
      neither the admin nor the student is required for the either giving
      the feedback nor the assessing the feedback.
    </p>
    <hr />
    <a class="btn btn-primary btn-lg" href="index.php">
      Back To Home Page
    </a>
  </div>