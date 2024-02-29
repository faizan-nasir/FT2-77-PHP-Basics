 <?php

  // Check if submit is set in post method then display hello fullname.
  if (isset($_POST['submit'])) {
    // Render hello fullname
    echo 'Hello ' . $_POST['firstname'] . " " . $_POST['lastname'];
  }

  ?>
