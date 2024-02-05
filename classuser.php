<?php

class User {
  public $db;
  public $firstName;
  public $lastName;
  public $email;
  public $phoneNumber;
  public $address;
  
  public function __construct($db) {
    $this->db = $db;
  }
  
  public function register($firstName, $lastName, $email, $phoneNumber, $address, $password) {
    $query = "INSERT INTO user (first_name, last_name, email, phon_number, placeaddress, password ) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$address', '$password')";
    $result = $this->db->query($query);
    
    if ($result) {
      echo "تم تسجيل المستخدم بنجاح.";
    } else {
      echo "حدث خطأ أثناء تسجيل المستخدم.";
    }
  }
}

?>

