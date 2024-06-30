<?php
// 包含資料庫連接資訊
include("../conn.php");

$dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
$pdo = new PDO($dsn, $db_user, $db_pass);

try {
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $sql = "SELECT QUESTION, ANSWER FROM TID101_G1.FAQ WHERE QUESTION LIKE :keyword OR ANSWER LIKE :keyword";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
