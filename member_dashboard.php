<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['member'])){
    header("Location:index.php");
}

$member_id = $_SESSION['member'];

$member = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM member WHERE ID='$member_id'")
);
$books = mysqli_query($conn,
    "SELECT * FROM books
     WHERE Status='Available'
     AND Quantity > 0"
);
$issued_books = mysqli_query($conn,"
SELECT issued_books.*, books.Book_Name
FROM issued_books
JOIN books ON issued_books.Book_ID = books.Book_ID
WHERE issued_books.Member_ID='$member_id'
");

$due_books = mysqli_query($conn,"
SELECT issued_books.*, books.Book_Name
FROM issued_books
JOIN books ON issued_books.Book_ID = books.Book_ID
WHERE issued_books.Member_ID='$member_id'
AND issued_books.Return_Date < CURDATE()
AND issued_books.Status='Issued'
");

$borrow_history = mysqli_query($conn,"
SELECT issued_books.*, books.Book_Name
FROM issued_books
JOIN books ON issued_books.Book_ID = books.Book_ID
WHERE issued_books.Member_ID='$member_id'
ORDER BY issued_books.Issue_ID DESC
");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Member Dashboard</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f1f5f9;
    display:flex;
}

/* Sidebar */

.sidebar{
    width:250px;
    height:100vh;
    background:#1e293b;
    color:white;
    padding:20px;
    position:fixed;
}

.sidebar h2{
    text-align:center;
    margin-bottom:40px;
    color:#38bdf8;
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    padding:15px;
    margin:10px 0;
    border-radius:8px;
    background:#334155;
}

.sidebar ul li a{
    text-decoration:none;
    color:white;
    display:block;
}

/* Main */

.main{
    margin-left:250px;
    width:100%;
    padding:20px;
}

/* Topbar */

.topbar{
    background:white;
    padding:20px;
    border-radius:12px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.topbar h1{
    color:#1e293b;
}

/* Cards */

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-top:25px;
}

.card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.card h3{
    margin-bottom:10px;
    color:#1e293b;
}

.card p{
    font-size:18px;
    color:#0f172a;
}

/* Section */

.section{
    background:white;
    margin-top:30px;
    padding:20px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.section h2{
    margin-bottom:20px;
    color:#1e293b;
}

/* Table */

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

/* Status */

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

.due{
    background:red;
}

/* Buttons */

.btn{
    padding:8px 14px;
    border:none;
    border-radius:6px;
    cursor:pointer;
    color:white;
}

.request{
    background:#2563eb;
}

.return{
    background:#ef4444;
}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

    <h2>Member Panel</h2>

    <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="member_issued_books.php">Issued Books</a></li>
        <li><a href="member_due_books.php">Due Books</a></li>
        <li><a href="borrow_history.php">Borrow History</a></li>
        <li><a href="">Request Book</a></li>
        <li><a href="b&s.php">Buy & Sell Book</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

</div>

<!-- Main -->

<div class="main">

    <!-- Topbar -->

    <div class="topbar">

        <h1>Welcome, <?php echo $member['Name']; ?></h1>

        <p>Member ID: <?php echo $member['ID']; ?></p>

    </div>

    <!-- Profile Information -->

    <div class="cards">

        <div class="card">
            <h3>Name</h3>
            <p><?php echo $member['Name']; ?></p>
        </div>

        <div class="card">
            <h3>Address</h3>
            <p><?php echo $member['Address']; ?></p>
        </div>

        <div class="card">
            <h3>Email</h3>
            <p><?php echo $member['Email']; ?></p>
        </div>

        <div class="card">
            <h3>Phone Number</h3>
            <p><?php echo $member['Phone_number']; ?></p>
        </div>

        <div class="card">
            <h3>Membership Date</h3>
            <p><?php echo $member['Membership_date']; ?></p>
        </div>

        <div class="card">
            <h3>Status</h3>
            <p><?php echo $member['STATUS']; ?></p>
        </div>

    </div>

    <!-- Issued Books -->

    <div class="section">

        <h2>Issued Books</h2>

        <table>

            <tr>
                <th>Book Name</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($issued_books)){ ?>

            <tr>

                <td><?php echo $row['Book_Name']; ?></td>

                <td><?php echo $row['Issue_Date']; ?></td>

                <td><?php echo $row['Return_Date']; ?></td>

                <td>
                    <span class="status issued">
                        <?php echo $row['Status']; ?>
                    </span>
                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

    <!-- Due Books -->

    <div class="section">

        <h2>Due Books & Fine</h2>

        <table>

            <tr>
                <th>Book Name</th>
                <th>Return Date</th>
                <th>Fine Amount</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($due_books)){ 

                $today = strtotime(date("Y-m-d"));
                $return = strtotime($row['Return_Date']);

                $days = floor(($today - $return)/(60*60*24));

                $fine = $days * 10;
            ?>

            <tr>

                <td><?php echo $row['Book_Name']; ?></td>

                <td><?php echo $row['Return_Date']; ?></td>

                <td><?php echo $fine; ?> Tk</td>

            </tr>

            <?php } ?>

        </table>

    </div>

    <!-- Borrow History -->

    <div class="section">

        <h2>Borrow History</h2>

        <table>

            <tr>
                <th>Book Name</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($borrow_history)){ ?>

            <tr>

                <td><?php echo $row['Book_Name']; ?></td>

                <td><?php echo $row['Issue_Date']; ?></td>

                <td><?php echo $row['Return_Date']; ?></td>

                <td>

                    <?php if($row['Status']=="Returned"){ ?>

                        <span class="status returned">
                            Returned
                        </span>

                    <?php } else { ?>

                        <span class="status issued">
                            Issued
                        </span>

                    <?php } ?>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

    <!-- Request Book -->

  <div class="section">

    <h2>Request a Book</h2>

    <!-- BOOK LIST -->
    <table>
        <tr>
            <th>Book Name</th>
            <th>Author</th>
            <th>Action</th>
        </tr>

        <?php while($book = mysqli_fetch_assoc($books)){ ?>

        <tr>
            <td><?php echo $book['Book_Name']; ?></td>
            <td><?php echo $book['Author']; ?></td>

            <td>
                <form method="POST" action="request_book.php">
                    <input type="hidden" name="book_id" value="<?php echo $book['Book_ID']; ?>">
                    <button class="btn request" type="submit">Request</button>
                </form>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</div>

</body>
</html>