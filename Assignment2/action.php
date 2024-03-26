<?php

require './creds.php';
require './Database.php';
require './validator.php';

$validation_obj = new Validator();
$db_obj = new Database($server_name, $user_name, $password, $db_name);
$message = '';
$class = 'red';

if (!$validation_obj->validateData()) {
  $message = $validation_obj->getMessage();
}
else {
  if ($db_obj->insertToData()) {
    $message = 'Insertion Successful!';
    $class = 'green';
    $db_obj->dbClose();
  }
  else {
    $message = 'Insertion unsuccessful!';
  }
}

?>
