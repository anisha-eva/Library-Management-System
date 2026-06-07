<?php
include 'db_connect.php';

// Total Issued Books Count
$total_sql = "SELECT COUNT(*) AS total_issued FROM issued_books";
$total_result = mysqli_query($conn, $total_sql);
$total_data = mysqli_fetch_assoc($total_result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Issued Books</title>

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

        .count-box{
            background:#2563eb;
            color:white;
            padding:18px;
            width:260px;
            border-radius:10px;
            margin-bottom:25px;
            font-size:18px;
            box-shadow:0 2px 8px rgba(0,0,0,0.1);
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

    <h2>Issued Books Information</h2>

    <!-- Total Issued Books -->

    <div class="count-box">

        Total Issued Books:
        <?php echo $total_data['total_issued']; ?>

    </div>

    <!-- Table -->

    <div class="table-box">

        <table>

            <tr>
                <th>Issue ID</th>
                <th>Member Name</th>
                <th>Book Name</th>
                <th>Status</th>
                <th>Issue Date</th>
                <th>Return Date</th>
            </tr>

            <?php

            $sql = "SELECT

                        issued_books.Issue_ID,
                        issued_books.Status,
                        issued_books.Issue_Date,
                        issued_books.Return_Date,

                        member.Name,

                        books.Book_Name

                    FROM issued_books

                    INNER JOIN member
                    ON issued_books.Member_ID = member.ID

                    INNER JOIN books
                    ON issued_books.Book_ID = books.Book_ID

                    ORDER BY issued_books.Issue_Date DESC";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){

            ?>

            <tr>

                <td>
                    <?php echo $row['Issue_ID']; ?>
                </td>

                <td>
                    <?php echo $row['Name']; ?>
                </td>

                <td>
                    <?php echo $row['Book_Name']; ?>
                </td>

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

                <td>
                    <?php echo $row['Issue_Date']; ?>
                </td>

                <td>
                    <?php echo $row['Return_Date']; ?>
                </td>

            </tr>

            <?php

                }

            } else {

                echo "<tr>
                        <td colspan='6'>
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