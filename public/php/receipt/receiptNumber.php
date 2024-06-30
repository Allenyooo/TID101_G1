<?php

    include("../conn.php");

    $receipt = json_decode(file_get_contents("php://input"),true);

    $sql = "SELECT 
                r.`NUMBER` as id,
                p.`NAME`as `name`
            FROM RECEIPT as r
                left join PRODUCT as p
                    on r.PRODUCT_ID = p.ID
            where r.ORDER_ID = ?";

    $statement = $pdo -> prepare($sql);
    $statement -> bindValue(1,$receipt["orderID"]);
    $statement -> execute();

    $data = $statement -> fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);

?>