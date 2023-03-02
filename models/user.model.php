<?php

class User {
    private $username;
    private $phone;
    private $email;
    private $password;
  
  // CONSTRUCTOR
  function __construct() {
    $this->set_username("");
    $this->set_phone("");
    $this->set_email("");
    $this->set_password("");
    }

  // SETTERS
  function set_username($username) {
    $this->username = $username;
  }
  function set_phone($phone) {
    $this->phone = $phone;
  }
  function set_email($email) {
    $this->email = $email;
  }
  function set_password($password) {
    $this->password = $password;
  }


  // GETTERS
  function get_username() {
    return $this->username;
  }
  function get_phone() {
    return $this->phone;
  }
  function get_email() {
    return $this->email;
  }
  function get_password() {
    return $this->password;
  }

}

?>