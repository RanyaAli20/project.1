<?php
include'classuser.php';
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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
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

