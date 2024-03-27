<?php

/**
 * Establish database connection and perform insertion.
 */
class Database
{

  // Instance variables to store credentials.
  private $server_name;
  private $user_name;
  private $password;
  private $db_name;

  // Connection object.
  public $conn;

  // Variables for holding queries.
  public $q1;
  public $q2;

  /**
   * Constructor to initialize credentials and establish connection.
   *
   * @param string $server
   *   Server name.
   * @param string $user
   *   Username.
   * @param string $pwd
   *   User password.
   * @param string $db
   *   Database name to connect to.
   */
  function __construct(string $server, string $user, string $pwd, string $db)
  {
    $this->server_name = $server;
    $this->user_name = $user;
    $this->password = $pwd;
    $this->db_name = $db;
    try {
      $this->conn = new mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);
    } catch (Exception $e) {
      die('Connection Failed' . $e);
    }
  }

  /**
   * Function to insert form data to database.
   *
   * @param string $email
   *   Email provided by user.
   *
   * @param string $password
   *   Password provided by the user.
   *
   * @return bool
   *   Returns TRUE on data insertion success and false otherwise.
   */
  function insertUser($email, $password)
  {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $this->q1 = "INSERT INTO creds (email_id, password) values ('{$email}','{$hash}')";

    return ($this->conn->query($this->q1) === TRUE);
  }

  /**
   * Check if user exists in the database.
   *
   * @return bool
   *   Returns true if user exists and false otherwise.
   */
  function isValidUser($email) {
    $this->q2 = " SELECT * FROM creds WHERE email_id = '{$email}'";
    $val = $this->conn->query($this->q2);
    $val = mysqli_fetch_assoc($val);
    return !($val == NULL);
  }

  /**
   * Check if the password is correct for the user.Undocumented function
   *
   * @return bool
   *   Returns true if password is correct and false otherwise.
   */
  function isValidPassword(){
    $this->q2 = " SELECT * FROM creds WHERE email_id = '{$_POST["email"]}'";
    $val = $this->conn->query($this->q2);
    $val = mysqli_fetch_assoc($val);
    if ($val == NULL) {
      return false;
    }
    return password_verify($_POST['password'],$val['password']);
  }

  /**
   * Function to close database.
   */
  function dbClose()
  {
    $this->conn->close();
  }
}
