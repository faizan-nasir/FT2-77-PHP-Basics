<?php

require_once '../creds.php';
require './action.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/signup_styles.css">
</head>

<body>
  <div class="signupFrm">
    <form action="./signup.php" class="form" method="post">
      <?php

      if ($message != ''):
      ?>
        <p class=<?= $class ?>><?= $message ?></p>
      <?php

      endif;
      ?>
      <h1 class="title">Sign up</h1>

      <div class="inputContainer">
        <input type="text" class="input" name="email" placeholder="a" />
        <label for="" class="label">Email</label>
      </div>

      <div class="inputContainer">
        <input type="password" class="input" name="password" placeholder="a" />
        <label for="" class="label">Password</label>
      </div>

      <div class="inputContainer">
        <input type="password" class="input" name="confirm" placeholder="a" />
        <label for="" class="label">Confirm Password</label>
      </div>

      <input type="submit" name="submit" class="submitBtn" value="Sign up" />
    </form>
  </div>
</body>

</html>
