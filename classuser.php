<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 50px;
      }
      
      h2 {
        text-align: center;
      }
      
      form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 50px;
        border-radius: 5px;
      }
      
      label {
        display: block;
        margin-bottom: 5px;
      }
      input, select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
      }
      button[type="submit"] {
        background-color: #b61018;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }
      button[type="submit"]:hover {
        background-color: #8c0e14;
      }
      a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #999999;
      }
      a:hover {
        color: #666666;
      }
    </style>
  </head>
  <body>
   <h2>Registration</h2>
    <form action="" method="post" autocomplete="off">
       
      <label for="name">First Name:</label>
      <input type="text" id="firstname" name="firstname" required> <br>
      
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" required> <br>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required> <br>
      
      <label for="phonnumber">Phone Number:</label>
      <input type="tel" id="phonnumber" name="phonnumber" required> <br>
      
      <label for="placeaddress">Address:</label>
      <select type="ENUM" id="placeaddress" name="placeaddress" required>
        <option value="">Select Address</option>
        <option value="address1">Address 1</option>
        <option value="address2">Address 2</option>
        <option value="address3">Address 3</option>
      </select>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required> <br>
      
      <label for="confirmpassword">Confirm Password:</label>
      <input type="password" id="confirmpassword" name="confirmpassword" required> <br>
      
      <button type="submit" name="submit">Register</button>

      
      <a href="login.php">Login</a>
    </form>
    
  </body>
</html>

<?php

class User {
  private $db;
  private $id;
  private $firstName;
  private $lastName;
  private $email;
  private $phoneNumber;
  private $address;
  
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

if (isset($_POST['submit'])) {
  $db = new mysqli('localhost', 'root', '', 'test');

  if ($db->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $db->connect_error);
  }

  $user = new User($db);

  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phonnumber'];
  $address = $_POST['placeaddress'];
  $password = $_POST['password'];

  $user->register($firstName, $lastName, $email, $phoneNumber, $address, $password);

  $db->close();
}
?>