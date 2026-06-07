<?php include 'db_connect.php'; ?>
<h1>Manage Members</h1>

<table border="1" cellpadding="10">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Status</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM member");

while($row=mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['ID']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Email']; ?></td>
<td><?php echo $row['Phone_number']; ?></td>
<td><?php echo $row['STATUS']; ?></td>
</tr>

<?php } ?>

</table>
