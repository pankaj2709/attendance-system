<?php
include("../config/db.php");

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="attendance.csv"');

$output = fopen("php://output", "w");

fputcsv($output, ['Name','Date','In','Out','Hours']);

$result = $conn->query("SELECT users.name, attendance.* 
FROM attendance 
JOIN users ON users.id = attendance.user_id");

while($row = $result->fetch_assoc()){
    fputcsv($output, [
        $row['name'],
        $row['date'],
        $row['clock_in_time'],
        $row['clock_out_time'],
        $row['total_hours']
    ]);
}

fclose($output);
?>