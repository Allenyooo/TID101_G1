<?php

require_once '../conn.php';

$data = json_decode(file_get_contents("php://input"), true);

$memberId = $data['memberId'];
$newNickname = $data['newNickname'];

$sql = 'UPDATE MEMBER SET NICKNAME = :newNickname WHERE ID = :memberId';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':newNickname', $newNickname);
$stmt->bindParam(':memberId', $memberId);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'error' => 'Error updating nickname');
}

echo json_encode($response);
?>