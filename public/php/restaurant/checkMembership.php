<?php
// main.php為連線鑰匙KEY，可以根據需要引入 fetch_users.php 來顯示用戶或會員資料。
header('Content-Type: application/json');

// 数据库连接信息
$servername = "localhost";
$username = "root";
$password = "passworpassword";
$dbname = "TID101_G1";

// 檢查連線狀態
if ($conn->connect_error) {
    die(json_encode(['isMember' => false, 'message' => 'Database connection error']));
}

$email = isset($_POST['email']) ? $_POST['email'] : '';

if (empty($email)) {
    echo json_encode(['isMember' => false, 'message' => 'No email provided']);
    $conn->close();
    exit;
}

// 查詢sql中member內mail表單
$sql = "SELECT * FROM MEMBER WHERE EMAIL = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);  //s: 字符串
$stmt->execute(); // 執行查詢
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // 取得會員資料
    $memberData = $result->fetch_assoc();
    echo json_encode(['isMember' => true, 'message' => 'User is a member', 'memberData' => $memberData]);
} else {
    echo json_encode(['isMember' => false, 'message' => 'User is not a member']);
}

$stmt->close();
$conn->close();
?>