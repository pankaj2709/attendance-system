<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="sidebar">
    <h3>Admin Panel</h3>
    <a href="#">Dashboard</a>
    <a href="export.php">Download CSV</a>
</div>

<div class="main">

    <h2>Admin Dashboard 📊</h2>

    <div class="card-box">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>User</th>
                    <th>Date</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $result = $conn->query("SELECT users.name, attendance.* 
            FROM attendance 
            JOIN users ON users.id = attendance.user_id");

            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['clock_in_time']}</td>
                    <td>{$row['clock_out_time']}</td>
                    <td>{$row['total_hours']}</td>
                </tr>";
            }
            ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>