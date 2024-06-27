<?php

    include ("../conn.php");
    // $shop = $_GET['shop'];

    $resp = [];

    $sql = 'select SUM(AMOUNT) from `ORDER`';
    $pstmt = $pdo->prepare($sql);
    $pstmt->execute();
    $data = $pstmt->fetch(PDO::FETCH_ASSOC);
    array_push($resp, $data['SUM(AMOUNT)']);

    $sql2 = 'select COUNT(*) from MEMBER';
    $pstmt2 = $pdo->prepare($sql2);
    $pstmt2->execute();
    $data2 = $pstmt2->fetch(PDO::FETCH_ASSOC);
    array_push($resp, $data2['COUNT(*)']);

    // print_r($resp);

    echo json_encode($resp);

?>