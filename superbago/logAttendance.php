<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'login';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rfid = $_GET['tag'] ?? ''; // Example: log_attendance.php?tag=12837A2B
$date = date('Y-m-d');
$time = date('H:i:s');

if ($rfid != '') {
    // Check if RFID exists
    $userCheck = $conn->prepare("SELECT id FROM users WHERE rfid_tag = ?");
    $userCheck->bind_param("s", $rfid);
    $userCheck->execute();
    $result = $userCheck->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        // Check if attendance already exists for today
        $checkToday = $conn->prepare("SELECT * FROM attendance WHERE user_id = ? AND date = ?");
        $checkToday->bind_param("is", $user_id, $date);
        $checkToday->execute();
        $attendance = $checkToday->get_result();

        if ($attendance->num_rows > 0) {
            // Update time_out
            $update = $conn->prepare("UPDATE attendance SET time_out = ? WHERE user_id = ? AND date = ?");
            $update->bind_param("sis", $time, $user_id, $date);
            $update->execute();
            echo "Time Out recorded.";
        } else {
            // Insert new attendance
            $status = ($time > "08:15:00") ? "Late" : "Present";
            $insert = $conn->prepare("INSERT INTO attendance (user_id, date, time_in, status) VALUES (?, ?, ?, ?)");
            $insert->bind_param("isss", $user_id, $date, $time, $status);
            $insert->execute();
            echo "Time In recorded.";
        }
    } else {
        echo "RFID not recognized.";
    }
} else {
    echo "No RFID tag sent.";
}
$conn->close();
?>
