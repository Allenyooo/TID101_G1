<?php
// 包含資料庫連接資訊
include("../conn.php");

try {
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $sql = "SELECT * FROM TID101_G1.FAQ WHERE QUESTION LIKE :keyword OR ANSWER LIKE :keyword";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
