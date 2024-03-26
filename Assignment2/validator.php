<?php

/**
 * Class to validate input fields.
 */
class Validator {

  // Public variables for status message.
  private $message;

  /**
   * Constructor to initialize status message variable.
   */
  function __construct() {
    $this->message = '';
  }

  /**
   * Function to validate input fields.
   *
   * @return bool
   *   Returns true if data is valid and false otherwise.
   */
  public function validateData() {
    if (isset($_POST['submit'])) {
      // If submitted check if any field is empty
      if (
        !empty($_POST['employee_code']) &&
        !empty($_POST['employee_code_name']) &&
        !empty($_POST['employee_domain']) &&
        !empty($_POST['employee_id']) &&
        !empty($_POST['employee_first_name']) &&
        !empty($_POST['employee_last_name']) &&
        !empty($_POST['employee_salary']) &&
        !empty($_POST['graduation_percentile'])
      ) {
        if (
          // if no fields are empty validate their pattern.
          !preg_match("/(su_[a-z])\w+/", $_POST['employee_code']) ||
          !preg_match("/(^[a-z]{2}_[a-z])\w+/", $_POST['employee_code_name']) ||
          !preg_match("/^[A-Za-z\s]*$/", $_POST['employee_domain']) ||
          !preg_match("/RU[0-9]/", $_POST['employee_id']) ||
          !preg_match("/[A-Z][a-z]/", $_POST['employee_first_name']) ||
          !preg_match("/[A-Z][a-z]/", $_POST['employee_last_name']) ||
          !preg_match("/^[0-9]*$/",$_POST['employee_salary']) ||
          !preg_match("/^[0-9]*$/",$_POST['graduation_percentile'])
          ){
            $this->message = 'Please match the pattern';
            return false;
        }
        else{
          return true;
        }
      }
      else {
        $this->message = 'All fields are required!';
        return false;
      }
    }
  }

  /**
   * Function to return current status message
   *
   * @return string
   *   Returns the status message of the object.
   */
  public function getMessage() {
    return $this->message;
  }

}

?>
