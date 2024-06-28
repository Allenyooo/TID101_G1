<?php

require_once '../conn.php';

$data = json_decode(file_get_contents("php://input"), true);

$memberId = $data['memberId'];
$newPassword = $data['newPassword'];

$sql = 'UPDATE MEMBER SET PASSWORD = :newPassword WHERE ID = :memberId';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':newPassword', $newPassword);
$stmt->bindParam(':memberId', $memberId);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'error' => 'Error updating password');
}

echo json_encode($response);
?>