<?php

require './action.php';

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

      if ($message != ''):
      ?>
        <p class="<?= $class ?>"><?= $message ?></p>
      <?php

      endif
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
