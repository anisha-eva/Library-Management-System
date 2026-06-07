<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['member'])){
    header("Location:index.php");
    exit();
}

$member_id = $_SESSION['member'];

// get due books
$sql = "
SELECT 
    issued_books.Issue_ID,
    issued_books.Issue_Date,
    issued_books.Return_Date,
    issued_books.Status,
    books.Book_Name
FROM issued_books
INNER JOIN books ON issued_books.Book_ID = books.Book_ID
WHERE issued_books.Member_ID = '$member_id'
AND issued_books.Status = 'Issued'
AND issued_books.Return_Date < CURDATE()
ORDER BY issued_books.Return_Date ASC
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Due Books</title>

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
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    color:white;
    background:red;
}

.fine{
    color:#ef4444;
    font-weight:bold;
}
</style>
</head>

<body>

<h2>Due Books</h2>

<div class="table-box">

<table>

<tr>
    <th>Book Name</th>
    <th>Issue Date</th>
    <th>Due Date</th>
    <th>Days Late</th>
    <th>Fine</th>
</tr>

<?php
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

        $today = strtotime(date("Y-m-d"));
        $due = strtotime($row['Return_Date']);

        $days_late = floor(($today - $due) / (60*60*24));
        $fine = $days_late * 10; // 10 Tk per day
?>

<tr>

    <td><?php echo $row['Book_Name']; ?></td>

    <td><?php echo $row['Issue_Date']; ?></td>

    <td><?php echo $row['Return_Date']; ?></td>

    <td><?php echo $days_late; ?> days</td>

    <td class="fine"><?php echo $fine; ?> Tk</td>

</tr>

<?php
    }

}else{
    echo "<tr><td colspan='5'>No Due Books 🎉</td></tr>";
}
?>

</table>

</div>

</body>
</html>