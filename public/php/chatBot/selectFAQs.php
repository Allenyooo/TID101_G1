<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "password";
$db_select = "TID101_G1";

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
