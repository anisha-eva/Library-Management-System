<?php
include 'db_connect.php';

$id = $_GET['id'];

mysqli_query($conn, "
UPDATE book_requests 
SET Status='Rejected' 
WHERE Request_ID='$id'
");

header("Location: book_requests.php");
?>