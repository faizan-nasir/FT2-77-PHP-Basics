<?php

if (isset($_POST['submit'])) {
  // If submitted then split the text area string based on new lines.
  $subjects = explode("\n", $_POST['score']);
  // Display the table for scores.
  echo '<table class="marks" cellspacing="10">
  <thead>
  <tr>
  <th>Subjects</th>
  <th>Score</th>
  </tr>
  </thead>
  <tbody>';
    // For every individual subject render the row
    foreach ($subjects as $i) {
      // Split subject name and score based on '|'.
      $subject = explode('|', $i);
      echo "<tr><td>$subject[0]</td><td>$subject[1]</td></tr>";
    }
    echo '
    </tbody>
    </table>';
  }

?>
