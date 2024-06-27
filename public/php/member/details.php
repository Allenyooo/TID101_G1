<?php
include ("../conn.php");
$memberId = $_GET['memberId'];

$sql = 'SELECT NAME, MAIL, PASSWORD, NICKNAME, PHONE, BIRTHDAY, PHOTO FROM MEMBER
            WHERE ID = :memberId';

$pstmt = $pdo->prepare($sql);
$pstmt->bindValue(":memberId", $memberId);
$pstmt->execute();
$data = $pstmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>