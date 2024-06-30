<?php

    include("../conn.php");

    $receipt = json_decode(file_get_contents("php://input"),true);

    // print_r($receipt);
    
    $sql = "UPDATE RECEIPT SET `STATUS`= '已使用' WHERE `NUMBER` = ?";

    $statement = $pdo -> prepare($sql);
    $statement -> bindValue(1, $receipt['receiptID']);
    $statement -> execute();

    $data = $statement -> fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);

?>