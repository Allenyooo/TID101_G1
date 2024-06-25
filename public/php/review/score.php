<?php

    include ("../conn.php");
    $shop = $_GET['shop'];

    $sql = '
        select AVG(STAR) as `AVG`, COUNT(*) as num
        from REVIEW
        where STORE_ID = :shop
        group by STORE_ID;';
    $pstmt = $pdo->prepare($sql);
    $pstmt->bindValue(":shop", $shop);
    $pstmt->execute();
    $data = $pstmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        $data['AVG'] = round($data['AVG'], 1);
    } else {
        $data = ['AVG' => 0, 'num' => 0];
    }

    // print_r($data);

    echo json_encode($data);

?>
