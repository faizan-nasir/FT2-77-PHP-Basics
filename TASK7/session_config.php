<?php

/**
 * Starts the session.
 */

function start_session(){
  session_start();
}

/**
 * Unset session variables and destroy the session.
 */

function end_session(){
  session_unset();
  session_destroy();
}

?>
