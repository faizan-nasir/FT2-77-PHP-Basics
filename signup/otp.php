<?php

require_once '../Database.php';
require_once '../creds.php';

$message = '';
$class = 'red';

if (isset($_POST['submit']) && !empty($_POST['otp'])) {
  session_start();
  if (strtotime('now') < $_SESSION['valid_time']) {
    if ($_POST['otp'] == $_SESSION['otp']) {
      $obj = new Database(SERVER_NAME, USER_NAME, DB_PASSWORD, DB_NAME);
      try {
        if ($obj->insertUser($_SESSION['email'], $_SESSION['password'])) {
          $message = "User created";
          $class = 'green';
          // If insertion was successful display this message.
        }
        else{
          $message = "User exists";
        }
      }
      catch (Exception $e) {
        // If user exists display this message.
        $message = 'Error! Try again.';
      }
    }
  }
  else {
    session_unset();
    session_destroy();
    header('location:signup.php');
  }
}
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Validation</title>
  <link rel="stylesheet" href="css/signup_styles.css?<?=time()?>">
</head>

<body>
  <div class="signupFrm">
    <form action="otp.php" class="form" method="post">
      <?php

      ?>
      <h1 class="title">Enter OTP</h1>
      <p class="green">Enter OTP Provided in your mail</p>
      <div class="inputContainer">
        <input type="text" class="input" name="otp" placeholder="a" />
        <label for="" class="label">OTP:</label>
      </div>
      <?php

      if ($message!=''):
      ?>
      <p class=<?=$class?>><?=$message?></p>
      <a href="../login/login.php" id="loginBtn" name='login' class="submitBtn">Login</a>
      <?php
      endif;
      ?>
      <input type="submit" name="submit" class="submitBtn" value="Submit" />
    </form>
  </div>
</body>

</html>
