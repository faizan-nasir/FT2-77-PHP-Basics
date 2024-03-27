<?php

require_once './validator.php';
require_once '../otpmail.php';

$class = 'red';
// Validate the data.
$valid = new Validator();
$message = $valid->validateData();

if ($message == 'Valid') {
  $class = 'green';
  // If data is valid send mail with otp.
  $mail = new OtpMail();
  if ($mail->sendMail($_POST['email'])) {
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    header('location:otp.php');
  }
}
