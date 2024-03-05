<?php

$name = $_POST['firstname'] . ' ' . $_POST['lastname'];
$image = './images/' . $_FILES['image']['name'];
$score = explode("\n", $_POST['score']);
$phone = $_POST['phone'];
$email = $_POST['email'];
