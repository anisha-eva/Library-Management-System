<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['member'])){
    header("Location:index.php");
}

$member_id = $_SESSION['member'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Issued Books</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f1f5f9;
    padding:20px;
}

.container{
    width:100%;
}

h2{
    margin-bottom:20px;
    color:#1e293b;
}

.table-box{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#e2e8f0;
    padding:14px;
    text-align:left;
}

table td{
    padding:14px;
    border-bottom:1px solid #ddd;
}

.status{
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
}

.issued{
    background:#0ea5e9;
}

.returned{
    background:green;
}

</style>

</head>

<body>

<div class="container">

<h2>My Issued Books</h2>

<div class="table-box">

<table>

<tr>
    <th>Issue ID</th>
    <th>Book Name</th>
    <th>Issue Date</th>
    <th>Return Date</th>
    <th>Status</th>
</tr>

<?php

$sql = "SELECT

            issued_books.Issue_ID,
            issued_books.Issue_Date,
            issued_books.Return_Date,
            issued_books.Status,

            books.Book_Name

        FROM issued_books

        INNER JOIN books
        ON issued_books.Book_ID = books.Book_ID

        WHERE issued_books.Member_ID = '$member_id'

        ORDER BY issued_books.Issue_Date DESC";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

    while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['Issue_ID']; ?></td>

<td><?php echo $row['Book_Name']; ?></td>

<td><?php echo $row['Issue_Date']; ?></td>

<td><?php echo $row['Return_Date']; ?></td>

<td>

<?php if($row['Status']=="Issued"){ ?>

<span class="status issued">
    Issued
</span>

<?php } else { ?>

<span class="status returned">
    Returned
</span>

<?php } ?>

</td>

</tr>

<?php
    }

}else{

echo "<tr>
        <td colspan='5'>
            No Issued Books Found
        </td>
      </tr>";

}

?>

</table>

</div>

</div>

</body>

</html>