<?php

session_start();
if (!isset(($_SESSION['email']))) {
  // If not logged in redirect to login.
  session_unset();
  session_destroy();
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link rel="stylesheet" href="css/welcome_styles.css">
</head>

<body>
  <section class="container">
    <div class="dashboard">
      <h2 class="welcome">Hi <?= $_SESSION['email'] ?></h2>
      <a class="logout" href="./logout.php">Logout</a>
    </div>
  </section>
</body>

</html>
