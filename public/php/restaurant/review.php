<?php
header('Content-Type: application/json; charset=utf-8');
include("../conn.php");

try {
    // 获取最新的 REVIEW ID
    $sql = "SELECT MAX(ID) AS latest_id FROM REVIEW";
    $id = $pdo->prepare($sql);
    $id->execute();
    $result = $id->fetch();
    $latestId = $result['latest_id'];

    // Generate a new ID by incrementing the latest ID
    $newId = $latestId + 1;

    $storeId = $_POST['storeId']; // 从 FormData 获取 storeId
    $memberId = $_POST['memberId']; // 从 FormData 获取 memberId
    $rating = $_POST['rating']; // 从 FormData 获取 rating
    $content = $_POST['content']; // 从 FormData 获取 content

    // 插入 REVIEW 表
    $sqlReview = "INSERT INTO REVIEW (ID, MEMBER_ID, STORE_ID, STAR, CONTENT) VALUES (?, ?, ?, ?, ?)";
    $stmtReview = $pdo->prepare($sqlReview);
    $stmtReview->bindParam(1, $newId, PDO::PARAM_INT);
    $stmtReview->bindParam(2, $memberId, PDO::PARAM_INT);
    $stmtReview->bindParam(3, $storeId, PDO::PARAM_INT);
    $stmtReview->bindParam(4, $rating, PDO::PARAM_INT);
    $stmtReview->bindParam(5, $content, PDO::PARAM_STR);
    $stmtReview->execute();

    // 插入 PHOTO 表
    $sqlPhoto = "INSERT INTO PHOTO (ID, ADDRESS, REVIEW_ID, PHOTO) VALUES (?, NULL, ?, ?)";
    $stmtPhoto = $pdo->prepare($sqlPhoto);
    foreach ($_FILES['imageData']['tmp_name'] as $index => $tmpName) {
        // 生成新的 PHOTO ID
        $sql = "SELECT MAX(ID) AS latest_photo_id FROM PHOTO";
        $id = $pdo->prepare($sql);
        $id->execute();
        $result = $id->fetch();
        $latestPhotoId = $result['latest_photo_id'];
        $newPhotoId = $latestPhotoId + 1;

        // 获取文件内容
        $binaryData = file_get_contents($tmpName);

        // 插入照片数据
        $stmtPhoto->bindParam(1, $newPhotoId, PDO::PARAM_INT);
        $stmtPhoto->bindParam(2, $newId, PDO::PARAM_INT); // 使用 newId 作为 REVIEW_ID
        $stmtPhoto->bindParam(3, $binaryData, PDO::PARAM_LOB); // 使用 PARAM_LOB 存储 mediumblob
        $stmtPhoto->execute();
    }

    echo json_encode(["message" => "評價成功提交"]);

} catch (PDOException $e) {
    echo json_encode(["error" => "錯誤訊息: " . $e->getMessage()]);
}
?>
