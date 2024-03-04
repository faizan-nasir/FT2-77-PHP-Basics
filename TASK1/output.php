<?php

require 'form_validate.php';
// Validate the form.
// If errors are encountered during validation display them.
if (!empty($errors)) {
?>
  <ul><?php foreach ($errors as $i) : { ?>
        <li><?php echo $i; ?></li>
    <?php

        }
      endforeach;
    ?>
  </ul>
<?php
}
// When no issues are detected display the content.
else {
?>
  <p>Hello <?= $_POST['firstname'] ?> <?= $_POST['lastname'] ?>
  <p>
    <img src=<?= $file_name ?> alt='User Image'>
  <table class='marks'>
    <thead>
      <tr>
        <th>Subjects</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $subjects = explode("\n", $_POST['score']);
      foreach ($subjects as $i) {
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
  <p>The number is <?= $_POST['phone'] ?>
  <p>
  <p><?= $_POST['email'] ?></p>
  <p>Valid Email ID</p>
<?php

}
