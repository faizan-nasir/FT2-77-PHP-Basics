<?php

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
