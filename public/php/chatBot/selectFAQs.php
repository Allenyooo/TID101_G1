<?php
// 包含資料庫連接資訊
include("../conn.php");

try {
    // 檢查資料庫連接是否成功
    if ($pdo) {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $sql = "SELECT QUESTION, ANSWER FROM TID101_G1.FAQ WHERE QUESTION LIKE :keyword OR ANSWER LIKE :keyword";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['message' => 'No data found']);
        }
    } else {
        echo json_encode(['error' => 'Database connection failed']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
