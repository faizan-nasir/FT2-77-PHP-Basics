<?php

require './creds.php';
require './Database.php';

$message = '';
$class = 'red';
if (isset($_POST['submit'])) {
  if (
    !empty($_POST['employee_code']) &&
    !empty($_POST['employee_code_name']) &&
    !empty($_POST['employee_domain']) &&
    !empty($_POST['employee_id']) &&
    !empty($_POST['employee_first_name']) &&
    !empty($_POST['employee_last_name']) &&
    !empty($_POST['employee_salary']) &&
    !empty($_POST['graduation_percentile'])
  ) {
    $obj = new Database($server_name, $user_name, $password, $db_name);
    if ($obj->insertToData()) {
      $message = 'Insertion Successful!';
      $class =
        'green';
    } else {
      $message = 'Insertion unsuccessful!';
    }
    $obj->dbClose();
  } else {
    $message = 'All fields are required!';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Form</title>
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <div class="container">
    <form class="form" action="./index.php" method="post">
      <?php

      if ($message != '') {
      ?>
        <p class="<?= $class ?>"><?= $message ?></p>
      <?php

      }
      ?>
      <input type="text" name="employee_code" placeholder="Employee Code" required />
      <input type="text" name="employee_code_name" placeholder="Employee Code Name" required />
      <input type="text" name="employee_domain" placeholder="Employee Domain" required />
      <input type="text" name="employee_id" placeholder="Employee ID" required />
      <input type="text" name="employee_salary" placeholder="Employee Salary" required />
      <input type="text" name="employee_first_name" placeholder="Employee First Name" required />
      <input type="text" name="employee_last_name" placeholder="Employee Last Name" required />
      <input type="text" name="graduation_percentile" placeholder="Employee Graduation Percentile" required />
      <input class="btn" name="submit" type="submit" value="Submit" />
    </form>
  </div>
</body>

</html>
