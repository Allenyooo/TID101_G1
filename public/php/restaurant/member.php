<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

// 引用資料庫連接
require_once '../conn.php';

// 獲取用戶 ID
$userId = 1; // 直接指定 ID 為 1

// 使用 PDO 檢查用戶是否為會員 要用PDO不是用
try {
    $stmt = $pdo->prepare("SELECT * FROM MEMBER WHERE ID = :ID");
    $stmt->bindParam(':ID', $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode(['data' => $result]);
    } else {
        echo json_encode(["message" => "User not found找不到"]);
    }
} catch (PDOException $e) {
    echo json_encode(["message" => "Database error: " . $e->getMessage()]);
}

// 關閉資料庫連接
$conn = null;
?>