<?php
include '../conn.php';

try {
    $data = json_decode(file_get_contents("php://input"), true);

    // Get the maximum ID from the REVIEW table and add 1 to it
    $stmtMaxId = $pdo->prepare("SELECT MAX(ID) FROM REVIEW");
    $stmtMaxId->execute();
    $maxId = $stmtMaxId->fetchColumn() + 1;

    // Insert the new review with the new ID
    $stmtReview = $pdo->prepare("INSERT INTO REVIEW (ID, STORE_ID, MEMBER_ID, STAR, CONTENT, TIME) VALUES (?,?,?,?,?, NOW())");
    $stmtReview->bindParam(1, $maxId);
    $stmtReview->bindParam(2, $data['storeId']);
    $stmtReview->bindParam(3, $data['memberId']);
    $stmtReview->bindParam(4, $data['rating']);
    $stmtReview->bindParam(5, $data['content']);
    $stmtReview->execute();

    // Get the maximum ID from the PHOTO table and add 1 to it
    $stmtMaxPhotoId = $pdo->prepare("SELECT MAX(ID) FROM PHOTO");
    $stmtMaxPhotoId->execute();
    $maxPhotoId = $stmtMaxPhotoId->fetchColumn() + 1;

    // Insert images into the PHOTO table
    $stmtPhoto = $pdo->prepare("INSERT INTO PHOTO (ID, REVIEW_ID, PHOTO) VALUES (?,?,?)");
    foreach ($data['imageData'] as $image) {
        $stmtPhoto->bindParam(1, $maxPhotoId);
        $stmtPhoto->bindParam(2, $maxId);
        $stmtPhoto->bindParam(3, $image, PDO::PARAM_STR);
        $stmtPhoto->execute();
        $maxPhotoId++;
    }

    echo json_encode(array('status' => 'success'));
} catch (PDOException $e) {
    echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
}
?>