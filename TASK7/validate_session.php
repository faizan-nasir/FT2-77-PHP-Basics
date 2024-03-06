<?php

require './session_config.php';

start_session();
if (isset($_POST['username']) && isset($_POST['password'])) {
  if ($_POST['username'] === 'Faizan' && $_POST['password'] === '1234') {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
  }
  else {
    header('location:is_invalid.php');
  }
  if (isset($_SESSION['password'])) {
    header('location:is_valid.php');
  }
}
else {
  header('location:is_invalid.php');
}
