<?php
include 'db_connect.php';

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM books WHERE Book_ID='$id'");

header("Location:manage_books.php");
?>
