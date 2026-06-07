<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['member'])){
    header("Location:index.php");
}

$member_id = $_SESSION['member'];

// Available books
$books = mysqli_query($conn,
    "SELECT * FROM books
     WHERE Status='Available'
     AND Quantity > 0"
);

// Buy request
if(isset($_POST['buy_book'])){

    $book_id = $_POST['book_id'];

    mysqli_query($conn,
        "INSERT INTO buy_requests(member_id, book_id, request_date, status)
         VALUES('$member_id','$book_id',CURDATE(),'Pending')"
    );

    echo "<script>alert('Book order request sent successfully');</script>";
}

// Sell request
if(isset($_POST['sell_book'])){

    $book_name = $_POST['book_name'];
    $author    = $_POST['author'];
    $edition   = $_POST['edition'];
    $price     = $_POST['price'];

    mysqli_query($conn,
        "INSERT INTO sell_requests(member_id, book_name, author, edition, price, request_date, status)
         VALUES(
            '$member_id',
            '$book_name',
            '$author',
            '$edition',
            '$price',
            CURDATE(),
            'Pending'
         )"
    );

    echo "<script>alert('Sell request sent successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Buy & Sell Books</title>

<style>

body{
    font-family:Arial;
    background:#f1f5f9;
    margin:0;
    padding:20px;
}

.container{
    width:90%;
    margin:auto;
}

h1{
    text-align:center;
    margin-bottom:30px;
}

.section{
    background:white;
    padding:20px;
    border-radius:10px;
    margin-bottom:40px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th,
table td{
    border:1px solid #ddd;
    padding:12px;
    text-align:center;
}

table th{
    background:#2563eb;
    color:white;
}

.btn{
    padding:8px 16px;
    border:none;
    border-radius:5px;
    color:white;
    cursor:pointer;
}

.buy{
    background:green;
}

.sell{
    background:#2563eb;
}

input{
    width:100%;
    padding:10px;
    margin-bottom:15px;
}

</style>

</head>

<body>

<div class="container">

<h1>Buy & Sell Books</h1>

<div class="section">

<h2>Available Books To Buy</h2>

<table>

<tr>
<th>Book Name</th>
<th>Author</th>
<th>Edition</th>
<th>Price</th>
<th>Action</th>
</tr>

<?php while($book=mysqli_fetch_assoc($books)){ ?>

<tr>

<td><?php echo $book['Book_Name']; ?></td>
<td><?php echo $book['Author']; ?></td>
<td><?php echo $book['Edition']; ?></td>
<td><?php echo $book['Price']; ?></td>

<td>

<form method="POST">

<input type="hidden"
name="book_id"
value="<?php echo $book['Book_ID']; ?>">

<button class="btn buy"
type="submit"
name="buy_book">

Order Book

</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</div>

<div class="section">

<h2>Sell Your Book</h2>

<form method="POST">

<input type="text"
name="book_name"
placeholder="Book Name"
required>

<input type="text"
name="author"
placeholder="Author Name"
required>

<input type="text"
name="edition"
placeholder="Edition"
required>

<input type="number"
name="price"
placeholder="Price"
required>

<button class="btn sell"
type="submit"
name="sell_book">

Send Sell Request

</button>

</form>

</div>

</div>

</body>
</html>