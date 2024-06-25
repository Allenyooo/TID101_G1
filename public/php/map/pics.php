<?php
    include ("../conn.php");

    $storeId = $_GET['storeId'];

    $sql = "
        select BANNERPIC from STORE
        where ID = :storeId";

    $pstmt = $pdo->prepare($sql);
    $pstmt->bindValue(":storeId", $storeId);
    $pstmt->execute();
    $data = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    $data = $data[0];

    echo $data['BANNERPIC'];
?>
