<?php

// 设置允许跨域访问的源
header("Access-Control-Allow-Origin: *");
// 设置允许的请求方法
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// 设置允许的请求头部
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With");

include '../conn.php';

// 允许 AJAX 跨域请求
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}

// collection_check.php - 取消收藏功能
// 連線SQL
// $db_host = "127.0.0.1";
// $db_user = "root";
// $db_pass = "password";
// $db_select = "TID101_G1";

// 建立資料庫連線物件
// $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";

try {
    // 建立PDO物件，並放入指定的相關資料
    $pdo = new PDO($dsn, $db_user, $db_pass);
    // 设置 PDO 错误模式为异常
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 讀取 JSON 數據並解析
    $data = json_decode(file_get_contents("php://input"), true);

    // 讀取 POST 數據
    $storeId = $data['storeId'];
    $memberId = $data['memberId'];

    // 刪除收藏該筆資料
    $sql = "DELETE FROM COLLECT_DETAIL WHERE STORE_ID = ? AND MEMBER_ID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$storeId, $memberId]);
    echo json_encode(["message" => "取消收藏成功"]);

    // 检查是否成功删除记录
    if ($stmt->rowCount() > 0) {
        echo json_encode(["message" => "取消收藏成功"]);
    } else {
        echo json_encode(["message" => "無法取消收藏，請稍後再試"]);
    }

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

// 關閉連接
$pdo = null;
?>
