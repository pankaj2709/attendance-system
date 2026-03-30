<?php include("../config/db.php");

$user_id = $_SESSION['user_id'];
$date = date("Y-m-d");
$time = date("H:i:s");

$file = $_FILES['selfie']['name'];
$tmp = $_FILES['selfie']['tmp_name'];

move_uploaded_file($tmp, "../uploads/selfies/".$file);

// get clock-in
$res = $conn->query("SELECT * FROM attendance WHERE user_id='$user_id' AND date='$date'");
$row = $res->fetch_assoc();

$clock_in = $row['clock_in_time'];
$total = (strtotime($time) - strtotime($clock_in))/3600;

$conn->query("UPDATE attendance 
SET clock_out_time='$time', selfie_out='$file', total_hours='$total'
WHERE user_id='$user_id' AND date='$date'");

header("Location: ../employee/dashboard.php");
?>