<?php
// Show error details
error_reporting(E_ALL);
ini_set('display_errors', 1);

$responseMessage = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $number = $_POST['number'] ?? '';

    if (!$firstName || !$lastName || !$gender || !$email || !$password || !$number) {
        $responseMessage = "All fields are required!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $conn = new mysqli('127.0.0.1', 'root', '', 'test');
        if ($conn->connect_error) {
            $responseMessage = "Database Connection Failed: " . $conn->connect_error;
        } else {
            $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $hashedPassword, $number);
                if ($stmt->execute()) {
                    $responseMessage = "Registration successful! Welcome, $firstName $lastName.";
                } else {
                    $responseMessage = "Error executing query: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $responseMessage = "Error preparing statement: " . $conn->error;
            }
            $conn->close();
        }
    }
} else {
    $responseMessage = "Invalid request method!";
}

session_start();
$_SESSION['responseMessage'] = $responseMessage;

header('Location: signup.php');
exit;
?>
