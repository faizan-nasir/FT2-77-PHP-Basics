<?php

// Check if submit is set in post method then display hello fullname.
if (isset($_POST['submit']) && (isset($_FILES))) {

  // If files are uploaded on submit then.
  $file_name = './images/' . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  if (move_uploaded_file($tmp_name, $file_name)) {
    // If upload was successful render the image.
    ?>
    <img src=<?=$file_name?> alt='User Image'>
  <?php
  } else {
    // If upload failed show unsuccessful message.
    ?>
    <p>Image Upload Unsuccessful<p>
    <?php
  }
}
