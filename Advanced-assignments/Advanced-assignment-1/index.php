<?php

require './api.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Advanced Task 1</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <section class="container services flex-all space-between flex-column">
    <?php for ($i = 0; $i < count($texts); $i++) : ?>
      <?php
      $class = 'service-item flex-all';
      if ($i % 2 != 0){
        $class .= ' row-reverse';
        // if instance is odd reverse directions
      }
      ?>
      <div class="<?=$class?>">
        <div class="service-content flex-all flex-column">
          <h2><?= $texts[$i][0] ?></h2>
          <div class="icons flex-all">
            <?php for ($j = 0; $j < count($icons[$i]); $j++) : ?>
              <div class="icon-holder">
                <img src="<?= $icons[$i][$j] ?>" alt="icon">
              </div>
            <?php

            endfor;
            ?>
          </div>
          <?= $texts[$i][1] ?>
          <a href="https://innoraft.com/services" class="btn">EXPLORE MORE  </a>
        </div>
        <div class="service-image">
          <img src="<?= $images[$i] ?>" alt="drupal">
        </div>
      </div>
    <?php

    endfor;
    ?>
  </section>
</body>
</html>
