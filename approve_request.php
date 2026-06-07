<?php
include 'db_connect.php';

$id = $_GET['id'];

// get request info
$request = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM book_requests WHERE Request_ID='$id'")
);

$member_id = $request['member_id'];
$book_id   = $request['book_id'];

// get current book quantity
$book = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT Quantity FROM books WHERE Book_ID='$book_id'")
);

$quantity = $book['Quantity'];

// check if book available
if($quantity <= 0){

    mysqli_query($conn,
        "UPDATE books
         SET Status='Unavailable'
         WHERE Book_ID='$book_id'"
    );

    echo "Book is unavailable";
    exit();
}

// approve request
mysqli_query($conn,
    "UPDATE book_requests
     SET Status='Approved'
     WHERE Request_ID='$id'"
);

// issue book
mysqli_query($conn, "
INSERT INTO issued_books(Member_ID, Book_ID, Issue_Date, Return_Date, Status)
VALUES(
    '$member_id',
    '$book_id',
    CURDATE(),
    DATE_ADD(CURDATE(), INTERVAL 14 DAY),
    'Issued'
)
");

// decrease quantity
$new_quantity = $quantity - 1;

// update quantity & status
if($new_quantity <= 0){

    mysqli_query($conn,
        "UPDATE books
         SET Quantity='$new_quantity',
             Status='Unavailable'
         WHERE Book_ID='$book_id'"
    );

}else{

    mysqli_query($conn,
        "UPDATE books
         SET Quantity='$new_quantity',
             Status='Available'
         WHERE Book_ID='$book_id'"
    );
}

header("Location: book_requests.php");
?>