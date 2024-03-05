<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/styles1.css">
</head>
<body>
  <div class="success">
    <?php

    require 'form_validate.php';
    $is_correct=TRUE;
    // Validate the form.
    // If errors are encountered during validation display them.
    if (!empty($errors)) {
      $is_correct=FALSE;
    ?>
      <ul><?php foreach ($errors as $i): ?>
            <li><?php echo $i; ?></li>
        <?php

          endforeach;
        ?>
      </ul>
    <?php
    }
// When no issues are detected display the content.
    else {
      require './set_variables.php';
    ?>
      <p>Hello <?= $name ?><p>
      <img src=<?= $image ?> alt='User Image'>
      <table class='marks'>
        <thead>
          <tr>
            <th>Subjects</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>
          <?php

          foreach ($score as $i) {
            $subject = explode('|', $i);
          ?>
            <tr>
              <td><?= $subject[0] ?></td>
              <td><?= $subject[1] ?></td>
          <?php

          }
          ?>
            </tr>
        </tbody>
      </table>
      <p>The number is <?= $phone ?>
      <p>
      <p><?= $email ?></p>
      <p>Valid Email ID</p>
<?php

}
?>
      <a href="./task1.php">Go Back</a>
  </div>
</body>
<?php

if ($is_correct) {
  require './generate_pdf.php';
  // Saves pdf in server side. and downloads pdf at client side.
}
?>
</html>
