<?php

/**
 * Establish database connection and perform insertion.
 */
class Database {

  // Instance variables to store credentials.
  private $server_name;
  private $user_name;
  private $password;
  private $db_name;

  // Connection object.
  public $conn;

  // Variables for holding SQL queries.
  public $sql1;
  public $sql2;
  public $sql3;

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
  function __construct(string $server, string $user, string $pwd, string $db) {
    $this->server_name = $server;
    $this->user_name = $user;
    $this->password = $pwd;
    $this->db_name = $db;
    try {
      $this->conn = new mysqli($this->server_name,$this->user_name,$this->password,$this->db_name);
    }
    catch (Exception $e) {
      die('Connection Failed' . $e);
    }
  }

  /**
   * Function to insert form data to database.
   *
   * @return bool
   *   Returns TRUE on data insertion success and false otherwise.
   */
  public function insertToData() {
    $this->sql1 = "INSERT INTO employee_code_table (
      employee_code, employee_code_name, employee_domain) values (
        '{$_POST["employee_code"]}',
        '{$_POST["employee_code_name"]}',
        '{$_POST["employee_domain"]}'
      )";

    $this->sql2 = "INSERT INTO employee_salary_table (
      employee_id, employee_salary, employee_code) values (
        '{$_POST["employee_id"]}',
        '{$_POST["employee_salary"]}',
        '{$_POST["employee_code"]}'
      )";

    $this->sql3 = "INSERT INTO employee_details_table (
      employee_id,
      employee_first_name,
      employee_last_name,
      graduation_percentile)
      values (
        '{$_POST["employee_id"]}',
        '{$_POST["employee_first_name"]}',
        '{$_POST["employee_last_name"]}',
        '{$_POST["graduation_percentile"]}'
      )";

    return (
      $this->conn->query($this->sql1) === TRUE &&
      $this->conn->query($this->sql2) === TRUE &&
      $this->conn->query($this->sql3) === TRUE
    );
  }

  /**
   * Function to close database.
   */
  public function dbClose() {
    $this->conn->close();
  }
}
