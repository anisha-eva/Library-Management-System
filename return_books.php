<?php
include 'db_connect.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // get issued book info
    $data = mysqli_fetch_assoc(
        mysqli_query($conn,
            "SELECT * FROM issued_books WHERE Issue_ID='$id'"
        )
    );

    $book_id = $data['Book_ID'];

    // update issued book status
    mysqli_query($conn,
        "UPDATE issued_books
         SET Status='Returned'
         WHERE Issue_ID='$id'"
    );

    // get current quantity
    $book = mysqli_fetch_assoc(
        mysqli_query($conn,
            "SELECT Quantity FROM books WHERE Book_ID='$book_id'"
        )
    );

    $quantity = $book['Quantity'];

    // increase quantity
    $new_quantity = $quantity + 1;

    // update quantity & status
    mysqli_query($conn,
        "UPDATE books
         SET Quantity='$new_quantity',
             Status='Available'
         WHERE Book_ID='$book_id'"
    );

    header("Location:return_books.php");
}
?>

<h1>Return Books</h1>

<table border="1" cellpadding="10">

<tr>
<th>Issue ID</th>
<th>Member ID</th>
<th>Book ID</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,
    "SELECT * FROM issued_books WHERE Status='Issued'"
);

while($row=mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['Issue_ID']; ?></td>
<td><?php echo $row['Member_ID']; ?></td>
<td><?php echo $row['Book_ID']; ?></td>
<td><?php echo $row['Status']; ?></td>

<td>
<a href="return_books.php?id=<?php echo $row['Issue_ID']; ?>">
Return
</a>
</td>

</tr>

<?php } ?>

</table>