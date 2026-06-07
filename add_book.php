<?php
include 'db_connect.php';

if(isset($_POST['save'])){

$name=$_POST['name'];
$author=$_POST['author'];
$category=$_POST['category'];
$edition=$_POST['edition'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];

$status='Available';

mysqli_query($conn,"INSERT INTO books(Book_Name,Author,Category,Edition,Price,Quantity,Status)
VALUES('$name','$author','$category','$edition','$price','$quantity','$status')");

header("Location:manage_books.php");
}
?>

<form method="POST">
<input type="text" name="name" placeholder="Book Name"><br><br>
<input type="text" name="author" placeholder="Author"><br><br>
<input type="text" name="category" placeholder="Category"><br><br>
<input type="text" name="edition" placeholder="Edition"><br><br>
<input type="number" name="price" placeholder="Price"><br><br>
<input type="number" name="quantity" placeholder="Quantity"><br><br>
<button type="submit" name="save">Save Book</button>
</form>
