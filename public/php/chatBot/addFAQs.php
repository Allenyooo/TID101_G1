<?php
// 包含資料庫連接資訊
include("../conn.php");

try {
    // 檢查是否有POST參數
    if (isset($_POST['id']) && isset($_POST['type']) && isset($_POST['question']) && isset($_POST['answer']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $status = $_POST['status'];

        // 建立SQL語法
        $sql = "INSERT INTO TID101_G1.FAQ (ID, TYPE, QUESTION, ANSWER, STATUS) VALUES (:id, :type, :question, :answer, :status)";

        // 準備查詢
        $statement = $pdo->prepare($sql);

        // 綁定參數
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':type', $type, PDO::PARAM_STR);
        $statement->bindValue(':question', $question, PDO::PARAM_STR);
        $statement->bindValue(':answer', $answer, PDO::PARAM_STR);
        $statement->bindValue(':status', $status, PDO::PARAM_STR);

        // 執行查詢
        $statement->execute();

        // 檢查是否有資料插入
        if ($statement->rowCount() > 0) {
            echo "常見問題已新增完成！";
        } else {
            echo "無法輸入空直，並請檢查ID是否有重複";
        }
    } else {
        echo "新增完成";
    }
} catch (Exception $e) {
    // 顯示錯誤訊息
    echo "Error: " . $e->getMessage();
}
?>
