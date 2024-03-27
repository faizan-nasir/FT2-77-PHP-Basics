<?php

/**
 * Class to validate form data.
 */
class Validator {

  // Variable to hold return message.
  private $message;

  /**
   * Constructor to initialize the message variable.
   */
  function __construct() {
    $this->message = '';
  }

  /**
   * Function to validate data and return success/error message.
   *
   * @return string
   *   Returns success/error message.
   */
  public function validateData(){
    if (isset($_POST['submit'])) {
      if (
        !empty($_POST['email']) &&
        !empty($_POST['password']) &&
        !empty($_POST['confirm'])
      ) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          // Email Validation
          $ch = curl_init(
            "https://emailvalidation.abstractapi.com/v1/?api_key=" . API_KEY . "&email={$_POST['email']}"
          );
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          $data = curl_exec($ch);
          curl_close($ch);
          $result = json_decode($data, true);
          if (
            (!$result['is_valid_format']['value']) ||
            (!$result['is_smtp_valid']['value'])) {
            $this->message = 'Invalid Email.';
            return $this->message;
          }
        }
        else {
          $this->message = 'Invalid Email.';
          return $this->message;
        }
        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/", $_POST['password'])) {
          $this->message = 'Password does not follow constraints.';
          // If password constraints are not matched display this message
          return $this->message;
        }
        if ($this->message == '') {
          if ($_POST['password'] == $_POST['confirm']) {
            $this->message = 'Valid';
          }
          else {
            $this->message = 'Password does not match Confirm';
          }
        }
      }
    }
    return $this->message;
  }
}
?>
