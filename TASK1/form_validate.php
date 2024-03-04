<?php

require 'creds.php';
// Get the credentials for api call
$errors=array();
// Stores all error messages.
$file_name='';
$tmp_name='';
if (isset($_POST['submit'])){
  if (empty($_POST['firstname']) || empty($_POST['lastname'])){
    // Checks if name is correct.
    array_push($errors,'Name not specified');
  }
  // Check if image was right and uploaded.
  if (!isset($_FILES['image']) || empty($_FILES['image']['name'])){
    array_push($errors,'Sorry image was not suitable or not found.');
  }
  else {
    $file_name = './images/' . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    if (!move_uploaded_file($tmp_name, $file_name)) {
      array_push($errors,'Image Upload Unsuccessful');
    }
  }
  // Check for score and score format.
  if (!isset($_POST['score'])){
    array_push($errors,'Score not found');
  }
  elseif (isset($_POST['score']) && (!strpos($_POST['score'], '|'))){
    array_push($errors,'Invalid score format.');
  }
  // Phone number validation.
  if (!isset($_POST['phone']) || empty($_POST['phone']) || !preg_match('/^\+91[0-9]{10}$/',$_POST['phone'])){
    array_push($errors,'Phone number was either invalid or empty.');
  }
  // Email verification and validation.
  if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $ch=curl_init("https://emailvalidation.abstractapi.com/v1/?api_key=$api_key&email=$email");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
    $data=curl_exec($ch);
    curl_close($ch);
    $result = json_decode($data, true);
    if ((!$result['is_valid_format']['value']) || (!$result['is_smtp_valid'])){
      array_push($errors, 'Email Id not valid.');
    }
  }
  else {
    array_push($errors, 'Email Id not valid.');
  }
}
?>
