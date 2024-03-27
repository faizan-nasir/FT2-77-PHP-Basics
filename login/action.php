<?php

require_once '../creds.php';
require_once '../Database.php';

// Variable to show error message.
$message = '';

if (isset($_POST['submit'])) {
  if ((!empty($_POST['email']) && !empty($_POST['password']))) {
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&
      preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/", $_POST['password'])) {
        $db_obj = new Database(SERVER_NAME, USER_NAME, DB_PASSWORD, DB_NAME);
        if ($db_obj->isValidUser($_POST['email'])) {
          if ($db_obj->isValidPassword()) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            // For a valid user redirect them to 
            header('location:home.php');
          }
          else {
            $message = 'Invalid Password.';
          }
        }
        $message = 'User Does Not Exist';
      }
      else {
        $message = 'Please Check email and password format.';
      }
    }
  else {
    $message = 'All fields are required!';
  }
}
?>
