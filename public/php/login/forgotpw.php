<?php
// Include the database connection file
include("../conn.php");

// Get the JSON data from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Extract the email address from the request data
$account = $data['forgotAccount'];

try {
    // Query the database to retrieve the user by email
    $sql = "SELECT * FROM MEMBER WHERE MAIL =?";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $account);
    $result = $statement->execute();

    // Check if the user exists
    if ($statement->rowCount() == 0) {
        http_response_code(404);
        echo 'User not found';
        echo $data['forgotAccount'];
        exit;
    }

    // Fetch the user data
    $user_data = $statement->fetchAll();

    // Generate a 6-digit password reset code
    $code = rand(100000, 999999); // 6-digit code

    // Store the code in the database (e.g., in a separate table or column)
    $reset_code_sql = "UPDATE MEMBER SET RESET_CODE =? WHERE MAIL =?";
    $reset_code_stmt = $pdo->prepare($reset_code_sql);
    $reset_code_stmt->bindParam(1, $code);
    $reset_code_stmt->bindParam(2, $account);
    $reset_code_stmt->execute();

    // Send the password reset email
    $to = $user_data[0]['MAIL'];
    $subject = 'Password Reset Request';

    $message = '
    <p>Hello '. $user_data[0]['NAME']. ',</p>
    <p>You have requested to reset your password. Enter the code below to reset your password:</p>
    <p>Code: '. $code. '</p>
    <p>If you did not request this, please ignore this email.</p>
    ';

    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'From: 梨花殿 <lihuadian101@gmail.com>'
    ];

    mail($to, $subject, $message, implode("\r\n", $headers));

    http_response_code(200);
    echo 'Password reset email sent successfully';
} catch (PDOException $e) {
    http_response_code(500);
    echo 'Database error: '. $e->getMessage();
    exit;
}

// Close the PDO connection
$pdo = null;

?>