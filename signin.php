<?php
// Show error details
error_reporting(E_ALL);
ini_set('display_errors', 1);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$conn = new mysqli('127.0.0.1', 'root', '', 'test');

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed!"]);
    exit();
}

// Check if the email exists in the database
$stmt = $conn->prepare("SELECT password FROM registration WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "The password you entered is incorrect!"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Email not found!"]);
}

// Close statement and connection
$stmt->close();
$conn->close();
exit();
?>
