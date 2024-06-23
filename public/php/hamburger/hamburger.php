<?php
// 建立連線
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "passwordpassword";
$db_select = "TID101_G1";

// 建立資料庫連線物件
$dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";

// 建立PDO物件，並放入指定的相關資料
$pdo = new PDO($dsn, $db_user, $db_pass);

// Assume this is a simplified example of a user authentication system
session_start();

// Check if the user is logged in
$stmt = $pdo->prepare("SELECT * FROM members WHERE username = :username AND password = :password");
$stmt->bindParam(":username", $_SESSION['username']);
$stmt->bindParam(":password", $_SESSION['password']);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $isMember = true;
} else {
    $isMember = false;
}

// Return the $isMember variable as a JSON response
header('Content-Type: application/json');
echo json_encode(['isMember' => $isMember]);
?>