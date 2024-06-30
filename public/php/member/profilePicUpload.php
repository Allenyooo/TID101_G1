<?php

include '../conn.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = 'UPDATE MEMBER SET PHOTO = :image WHERE ID = :memberId';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image', $data['image']);
$stmt->bindValue(':memberId', $data['memberId']);

$success = $stmt->execute();

$respBody['success']=$success;
echo json_encode($respBody);
?>