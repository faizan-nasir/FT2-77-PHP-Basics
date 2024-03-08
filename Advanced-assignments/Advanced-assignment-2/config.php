<?php

require 'creds.php';

// Define gmail smpt server
define('MAILHOST', 'smtp.gmail.com');
// Define gmail username.
define('USERNAME', $username);
// Define password.
define('PASSWORD', $password);
// Define email address from which mail will be sent.
define('SENT_FROM', $sender_email);
define('SENT_FROM_NAME', 'Faizan');
// Define reply to mail.
define('REPLY_TO', $sender_email);
// Define reply to name.
define('REPLY_TO_NAME', $reply_name);
