<?php
include 'db_connect.php';

if(isset($_POST['signup'])){

$name=$_POST['name'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];

$date=date('Y-m-d');

mysqli_query($conn,"INSERT INTO member(Name,Address,Email,Phone_number,Membership_date,STATUS,PASSWORD)
VALUES('$name','$address','$email','$phone','$date','Active','$password')");

echo "Signup Successful";
}
?>

<form method="POST">
<input type="text" name="name" placeholder="Name"><br><br>
<input type="text" name="address" placeholder="Address"><br><br>
<input type="email" name="email" placeholder="Email"><br><br>
<input type="text" name="phone" placeholder="Phone"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>
<button type="submit" name="signup">Signup</button>
</form>
