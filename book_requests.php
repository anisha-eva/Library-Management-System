<?php
include 'db_connect.php';

$requests = mysqli_query($conn, "
SELECT book_requests.*, member.Name, books.Book_Name
FROM book_requests
JOIN member ON book_requests.Member_ID = member.ID
JOIN books ON book_requests.Book_ID = books.Book_ID
ORDER BY book_requests.Request_ID DESC
");
?>

<h2>Book Requests</h2>

<table border="1" width="100%" cellpadding="10">
<tr>
    <th>Member</th>
    <th>Book</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($requests)){ ?>

<tr>
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['book_id']; ?></td>
    <td><?php echo $row['request_date']; ?></td>
    <td><?php echo $row['status']; ?></td>

    <td>

        <?php if($row['status'] == 'Pending'){ ?>

            <a href="approve_request.php?id=<?php echo $row['request_id']; ?>">
                <button style="background:green;color:white;padding:5px 10px;">Approve</button>
            </a>

            <a href="reject_request.php?id=<?php echo $row['request_id']; ?>">
                <button style="background:red;color:white;padding:5px 10px;">Reject</button>
            </a>

        <?php } else { ?>

            Done

        <?php } ?>

    </td>
</tr>

<?php } ?>

</table>