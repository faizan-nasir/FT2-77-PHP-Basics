<?php

require './mail.php';

if (isset($_POST['submit'])) {
  $response = '';
  if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
    $response = 'All fields are required';
  }
  elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $response = 'Invalid Email ID';
  }
  else {
    $response = send_mail($_POST['email'], $_POST['subject'], $_POST['message']);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHP Advanced Assignment 2</title>
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <div class="container">
    <div class="form-container">
      <form class="form" method="post" action="./index.php">
        <label for="email">Enter your email</label>
        <input type="email" name="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required />
        <label for="subject">Enter subject</label>
        <input type="text" name="subject" />
        <label for="message">Enter your message</label>
        <textarea name="message" cols="30" rows="10" required></textarea>
        <input type="submit" class="btn" name="submit" value="Submit" />
        <?php
        if ($response == 'Success') {
        ?>
          <p class="success">Email Sent Successfully.</p>
        <?php
        }
        else {
        ?>
          <p class="error"><?= $response ?></p>
        <?php
        }
        ?>
        </p>
      </form>
    </div>
  </div>
</body>

</html>
