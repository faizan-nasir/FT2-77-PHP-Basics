<?php

// Check if submit is set in post method then display hello fullname.
if (isset($_POST['submit'])) {
  if (isset($_FILES)) {
    // If files are uploaded on submit then.
    $fileName = './images/' . $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($tmpName, $fileName)) {
      // If upload was successful render the image.
      echo "<img src='$fileName' alt='User Image'>";
    } else {
      // If upload failed show unsuccessful message.
      echo "Image Upload Unsuccessful";
    }
  }
}

?>
