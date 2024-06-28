<?php

require_once '../conn.php';

$data = json_decode(file_get_contents("php://input"), true);

$memberId = $data['memberId'];
$newiPhone = $data['newiPhone'];

$sql = 'UPDATE MEMBER SET PHONE = :newiPhone WHERE ID = :memberId';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':newiPhone', $newiPhone);
$stmt->bindParam(':memberId', $memberId);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'error' => 'Error updating phone number');
}

echo json_encode($response);
?>