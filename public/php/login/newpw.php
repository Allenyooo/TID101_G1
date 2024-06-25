<?php

// Include the database connection file
include("../conn.php");

// Get the input data from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Check if the input data is valid
if (!isset($data['forgotAccount']) ||!isset($data['currentPassword']) ||!isset($data['newPassword'])) {
    http_response_code(400);
    echo "Invalid input data";
    exit;
}

$forgotAccount = $data['forgotAccount'];
$currentPassword = $data['currentPassword'];
$newPassword = $data['newPassword'];

try {
    // Retrieve the user's password from the database
    $query = "SELECT PASSWORD FROM MEMBER WHERE MAIL = :forgotAccount";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':forgotAccount', $forgotAccount);
    $stmt->execute();
    $dbCurrentPassword = $stmt->fetchColumn();

    // Check if the provided current password matches the one in the database
    if ($currentPassword!= $dbCurrentPassword) {
        http_response_code(401);
        echo "Invalid current password";
        exit;
    }

    // Check if the new password is the same as the current password
    if ($newPassword == $dbCurrentPassword) {
        http_response_code(400);
        echo "密碼不能與舊密碼相同";
        exit;
    }

    // Update the user's password in the database
    $query = "UPDATE MEMBER SET PASSWORD = :newPassword WHERE MAIL = :forgotAccount";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':forgotAccount', $forgotAccount);
    $stmt->bindParam(':newPassword', $newPassword);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Password updated successfully!";
    } else {
        http_response_code(500);
        echo "Error updating password";
    }
} catch (PDOException $e) {
    http_response_code(500);
    error_log("Error updating password: ". $e->getMessage());
    echo "Error updating password";
} catch (Exception $e) {
    http_response_code(400);
    error_log("Invalid input data: ". $e->getMessage());
    echo "Invalid input data";
}

// Close the database connection
$conn = null;
?>