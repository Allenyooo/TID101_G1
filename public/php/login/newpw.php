<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include("../conn.php");

// Get the input data from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Check if the input data is valid
if (!isset($data['forgotAccount']) ||!isset($data['newPassword'])) {
    echo "Invalid input data";
    exit;
}

$forgotAccount = $data['forgotAccount'];
$newPassword = $data['newPassword'];

try {
    // Retrieve the user's password from the database
    $query = "SELECT PASSWORD FROM MEMBER WHERE MAIL = :forgotAccount";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':forgotAccount', $forgotAccount);
    $stmt->execute();
    $dbCurrentPassword = $stmt->fetchColumn();

    // Check if the new password is the same as the current password
    if ($newPassword == $dbCurrentPassword) {
        echo "密碼不能與舊密碼相同";
        exit;
    }

    // Update the user's password in the database
    $query = "UPDATE MEMBER SET PASSWORD = :newPassword WHERE MAIL = :forgotAccount";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':forgotAccount', $forgotAccount);
    $stmt->bindParam(':newPassword', $newPassword);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Password updated successfully!";
    } else {
        echo "Error updating password";
    }
} catch (PDOException $e) {
    error_log("Error updating password: ". $e->getMessage());
    echo "Error updating password";
}

// Close the database connection
$pdo = null;
?>