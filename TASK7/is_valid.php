<?php

require './session_config.php';
start_session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valid</title>
</head>
<body>
  <div class="details">
    <p>Name: <?=$_SESSION['username']?></p>
    <p>Password: <?=$_SESSION['password']?></p>
    <?php
    parse_str($_SERVER['QUERY_STRING'], $params);
    if (isset($params['q']) && !empty($params['q'])){
      if (($params['q'] >= '1') && ($params['q'] <= '7')){
        // If query is valid then show the question.
        include "./question{$params['q']}.php";
      }
      else {
        ?>
        <h1>Invalid Query.</h1>
        <?php
      }
    }
    ?>
    <a href="./logout.php">Logout</a>
  </div>
</body>
</html>
