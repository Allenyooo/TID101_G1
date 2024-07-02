<?php
 header('Access-Control-Allow-Origin: *');

 header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE");

 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

 // 包含資料庫連接資訊
include("../conn.php");

try {
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $sql = "SELECT QUESTION, ANSWER FROM FAQ WHERE QUESTION LIKE :keyword OR ANSWER LIKE :keyword";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}









// try {
//     // 檢查資料庫連接是否成功
//     if ($pdo) {
//         $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
//         $sql = "SELECT QUESTION, ANSWER FROM TID101_G1.FAQ WHERE QUESTION LIKE :keyword OR ANSWER LIKE :keyword";
//         $statement = $pdo->prepare($sql);
//         $statement->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
//         $statement->execute();
//         $data = $statement->fetchAll(PDO::FETCH_ASSOC);






        
//         if ($data) {
//             echo json_encode($data);
//         } else {
//             echo json_encode(['message' => 'No data found']);
//         }
//     } else {
//         echo json_encode(['error' => 'Database connection failed']);
//     }
// } catch (Exception $e) {
//     echo json_encode(['error' => $e->getMessage()]);
// }
?>
