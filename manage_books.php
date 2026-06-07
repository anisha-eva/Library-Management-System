<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Manage Books</title></head>
<body>
<h1>Manage Books</h1>
<a href="add_book.php">Add New Book</a>
<table border="1" cellpadding="10">
<tr>
<th>ID</th>
<th>Name</th>
<th>Author</th>
<th>Category</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM books");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['Book_ID']; ?></td>
<td><?php echo $row['Book_Name']; ?></td>
<td><?php echo $row['Author']; ?></td>
<td><?php echo $row['Category']; ?></td>
<td><?php echo $row['Status']; ?></td>
<td>
<a href="edit_book.php?id=<?php echo $row['Book_ID']; ?>">Edit</a>
<a href="delete_book.php?id=<?php echo $row['Book_ID']; ?>">Delete</a>
</td>
</tr>
<?php } ?>

</table>
</body>
</html>
