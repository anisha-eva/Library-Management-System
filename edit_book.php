<?php
include 'db_connect.php';

$id=$_GET['id'];

$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM books WHERE Book_ID='$id'"));

if(isset($_POST['update'])){

$name=$_POST['name'];

mysqli_query($conn,"UPDATE books SET Book_Name='$name' WHERE Book_ID='$id'");

header("Location:manage_books.php");
}
?>

<form method="POST">
<input type="text" name="name" value="<?php echo $data['Book_Name']; ?>">
<button type="submit" name="update">Update</button>
</form>
