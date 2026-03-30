<?php
include("../config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="sidebar">
    <h3>Attendance</h3>
    <a href="#">Dashboard</a>
    <a href="#">My Records</a>
    <a href="../auth/login.php">Logout</a>
</div>


<div class="main">

    <h2>Employee Dashboard </h2>
    <h5>Current Time: <span id="time"></span></h5>

    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h5>Clock In</h5>
                <form action="../actions/clockin.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <input type="file" name="selfie" class="form-control mb-2" onchange="previewImage(this)" required>
                    <img id="preview" style="width:100px; display:none; margin-top:10px;">
                    <button class="btn btn-success w-100">Clock In</button>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-box">
                <h5>Clock Out</h5>
                <form action="../actions/clockout.php" method="POST" enctype="multipart/form-data" onsubmit="return confirmLogout()">
                    <input type="file" name="selfie" class="form-control mb-2" required>
                    <button class="btn btn-danger w-100">Clock Out</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card-box mt-3">
        <h5>Attendance Records</h5>

        <table class="table table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $user_id = $_SESSION['user_id'];
            $result = $conn->query("SELECT * FROM attendance WHERE user_id='$user_id'");

            while($row = $result->fetch_assoc()){
                echo "<tr>
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
<script src="../assets/js/app.js"></script>
</body>

</html>