<?php include("../config/db.php");

$user_id = $_SESSION['user_id'];
$date = date("Y-m-d");
$time = date("H:i:s");

$file = $_FILES['selfie']['name'];
$tmp = $_FILES['selfie']['tmp_name'];

move_uploaded_file($tmp, "../uploads/selfies/".$file);

// prevent duplicate
$check = $conn->query("SELECT * FROM attendance WHERE user_id='$user_id' AND date='$date'");
if($check->num_rows == 0){
    $conn->query("INSERT INTO attendance (user_id,date,clock_in_time,selfie_in) 
    VALUES ('$user_id','$date','$time','$file')");
}

header("Location: ../employee/dashboard.php");
?>