<?php
// collection.php 會員收藏進資料庫
// 連線SQL
// $db_host = "127.0.0.1";
// $db_user = "root";
// $db_pass = "password";
// $db_select = "TID101_G1";

// // 建立資料庫連線物件
// $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";

include '../conn.php';

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents("php://input"), true);

    // 讀取 POST 數據
    $storeId = $data['storeId'];
    $memberId = $data['memberId'];

    // 檢查收藏是否存在
    $sql = "SELECT * FROM COLLECT_DETAIL WHERE STORE_ID = ? AND MEMBER_ID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$storeId, $memberId]);
    $collect = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$collect) {
        // 收藏不存在，執行新增收藏
        // 取最大 ID 值
        $sql = "SELECT MAX(ID) as maxId FROM COLLECT_DETAIL";
        $stmt = $pdo->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && $row['maxId'] !== null) {
            $newId = $row['maxId'] + 1;
        } else {
            $newId = 1; // 預設值1
        }

        // 插入資料庫
        $sql = "INSERT INTO COLLECT_DETAIL (ID, STORE_ID, MEMBER_ID) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$newId, $storeId, $memberId]);

        echo json_encode(["message" => "收藏成功"]);
    } else {
        echo json_encode(["message" => "已收藏"]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

$pdo = null;
?>
