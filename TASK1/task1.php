<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Basics Task 1</title>
  <!-- Embedding external stylesheet. -->
  <link rel="stylesheet" href="css/styles1.css">
</head>

<body>
  <div class="forms">
    <!-- Container to hold the form -->
    <form action="task1.php" method="post" enctype="multipart/form-data">
      <!-- Form for taking input. -->
      <label for="firstname">First Name: </label>
      <input type="text" name="firstname" pattern="^[a-z A-Z]*$" required id="fName">
      <!-- Matching pattern in input field and making it required. -->
      <label for='lastname'>Last Name:</label>
      <input type="text" name="lastname" pattern="^[a-zA-Z]*$" required id="lName">
      <!-- Matching pattern in input field and making it required. -->
      <label for="fullname">Full Name:</label>
      <input type="text" name="fullname" disabled id="fullName">
      <!-- Disabled Field to hold full name. -->
      <input type="file" name="image" required>
      <!-- Input Image. -->
      <!-- Text Area to hold subject name and score. -->
      <textarea name="score" id="score" cols="20" rows="10" required></textarea>
      <!-- Matching pattern in input for phone number -->
      <label for="phone">Phone Number:</label>
      <input type="tel" name="phone" pattern="^\+91[0-9]{10}$" required>
      <!-- input email id -->
      <label for="email">Email ID:</label>
      <input name="submit" class="btn" type="submit" value="Submit">
      <!-- Submit button. -->
    </form>
  </div>
  <div class="success">
    <!-- Container for output. -->
    <?php

    // Required necessary files
    require './output.php';
    require './image.php';
    require './number.php';
    require './score.php';

    ?>
  </div>
  <!-- Embedding script -->
  <script src="js/script1.js"></script>
</body>

</html>
