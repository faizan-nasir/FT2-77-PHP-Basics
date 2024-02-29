<?php

// Check if submit is set in post method then display hello fullname.
if (isset($_POST['submit'])) {
  // Render hello fullname
  ?>
  <p>Hello <?= $_POST['firstname'] ?> <?= $_POST['lastname'] ?><p>
  <?php

  }

  if (isset($_POST['submit']) && (isset($_FILES['image']))) {
    // If files are uploaded on submit then save image in server
    $file_name = './images/' . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($tmp_name, $file_name)) {
      // If upload was successful render the image.
    ?>
      <img src=<?= $file_name ?> alt='User Image'>
    <?php
    
    }
    else {
      // If upload failed show unsuccessful message.
    ?>
      <p>Image Upload Unsuccessful<p>
    <?php

    }
  }
  if (isset($_POST['submit'])) {
    // If submitted then split the text area string based on new lines.
    $subjects = explode("\n", $_POST['score']);
    // Display the table for scores.
    ?>
    <table class='marks'>
      <thead>
        <tr>
          <th>Subjects</th>
          <th>Score</th>
        </tr>
      </thead>
      <tbody>
      <?php
      // For every individual subject render the row
      foreach ($subjects as $i) {
        // Split subject name and score based on '|'.
        $subject = explode('|', $i);
      }
    ?>
        <tr>
          <td><?= $subject[0] ?></td>
          <td><?= $subject[1] ?></td>
        </tr>
      </tbody>
    </table>
<?php

  }
  if (isset($_POST['submit'])) {
    // If submit is set display the phone number
?>
  <p>The number is <?= $_POST['phone'] ?>
  <p>
  <?php

  }
