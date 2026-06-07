<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['member'])){
    header("Location:index.php");
    exit();
}

$member_id = $_SESSION['member'];
$book_id = $_POST['book_id'];

// check if already requested
$check = mysqli_query($conn, "
SELECT * FROM book_requests 
WHERE Member_ID='$member_id' AND Book_ID='$book_id' AND Status='Pending'
");

if(mysqli_num_rows($check) > 0){
    echo "<script>alert('Already Requested!'); window.location='member_dashboard.php';</script>";
    exit();
}

// insert request
mysqli_query($conn, "
INSERT INTO book_requests(Member_ID, Book_ID, Status)
VALUES('$member_id', '$book_id', 'Pending')
");

echo "<script>alert('Book Requested Successfully!'); window.location='member_dashboard.php';</script>";
?>