<?php

include ("../conn.php");

$memberId = $_GET['memberId'];

$sql = 'SELECT ID, ORDERDATE FROM `ORDER` WHERE MEMBER_ID = :memberId';

$pstmt = $pdo->prepare($sql);
$pstmt->bindValue(":memberId", $memberId);
$pstmt->execute();
$data = $pstmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>