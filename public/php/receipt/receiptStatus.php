<?php

    include("../conn.php");

    $receipt = json_decode(file_get_contents("php://input"),true);

    $sql = "SELECT`NUMBER` as sn FROM RECEIPT 
            where ORDER_ID = ? and `STATUS` = '已使用'";

    $statement = $pdo-> prepare($sql);
    $statement -> bindValue(1,$receipt["orderID"]);
    $statement -> execute();

    $data = $statement->fetchAll();

    echo json_encode($data);

?>