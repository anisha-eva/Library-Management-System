<?php
include 'db_connect.php';

$pending_requests = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM book_requests WHERE Status='Pending'")
);

$total_books = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM books"));
$total_members = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM member"));
$issued_books = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM issued_books WHERE Status='Issued'"));
$late_returns = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM issued_books WHERE Return_Date < CURDATE() AND Status='Issued'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Library Admin Dashboard</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family: Arial, sans-serif;
}

body{
background:#f4f7fc;
display:flex;
}

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
transition:0.3s;
background:#334155;
}

.sidebar ul li a{
color:white;
text-decoration:none;
display:block;
}

.main{
margin-left:250px;
width:100%;
padding:20px;
}

.topbar{
background:white;
padding:15px 20px;
border-radius:10px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.topbar input{
padding:10px;
width:250px;
border:1px solid #ccc;
border-radius:6px;
}

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
}

.card p{
font-size:28px;
font-weight:bold;
}

.table-section{
margin-top:30px;
background:white;
padding:20px;
border-radius:12px;
}

table{
width:100%;
border-collapse:collapse;
}

table th,table td{
padding:12px;
border-bottom:1px solid #ddd;
}

table th{
background:#e2e8f0;
}

.btn{
padding:8px 14px;
border:none;
border-radius:6px;
cursor:pointer;
color:white;
}

.edit{background:#0ea5e9;}
.delete{background:#ef4444;}
</style>
</head>

<body>

<div class="sidebar">
<h2>Library Admin</h2>

<ul>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="manage_books.php">Manage Books</a></li>
<li>
    <a href="book_requests.php">
        Book Requests 
        <?php if($pending_requests > 0){ ?>
            <span style="
                background:red;
                color:white;
                padding:2px 8px;
                border-radius:50%;
                font-size:12px;
                margin-left:5px;
            ">
                <?php echo $pending_requests; ?>
            </span>
        <?php } ?>
    </a>
</li>
<li><a href="return_books.php">Return Books</a></li>
<li><a href="manage_members.php">Members</a></li>
<li><a href="reports.php">Reports</a></li>
<li><a href="settings.php">Settings</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>

<div class="main">

<div class="topbar">
<h1>Admin Dashboard</h1>
<input type="text" placeholder="Search books...">
</div>

<div class="cards">

<div class="card">
<h3>Total Books</h3>
<p><?php echo $total_books; ?></p>
</div>

<div class="card">
<h3>Issued Books</h3>
<p><?php echo $issued_books; ?></p>
</div>

<div class="card">
<h3>Total Members</h3>
<p><?php echo $total_members; ?></p>
</div>

<div class="card">
<h3>Late Returns</h3>
<p><?php echo $late_returns; ?></p>
</div>

</div>

<div class="table-section">

<h2>Recently Added Books</h2>

<table>

<tr>
<th>ID</th>
<th>Book Name</th>
<th>Author</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
$result = mysqli_query($conn,"SELECT * FROM books ORDER BY Book_ID DESC");

while($row = mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['Book_ID']; ?></td>
<td><?php echo $row['Book_Name']; ?></td>
<td><?php echo $row['Author']; ?></td>
<td><?php echo $row['Status']; ?></td>

<td>
<a href="edit_book.php?id=<?php echo $row['Book_ID']; ?>">
<button class="btn edit">Edit</button>
</a>

<a href="delete_book.php?id=<?php echo $row['Book_ID']; ?>">
<button class="btn delete">Delete</button>
</a>
</td>
</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>
