<?php

    include("../conn.php");

    $order = json_decode(file_get_contents("php://input"), true);
    $data = [];

    for ($i = 1; $i < 6; $i++) {
        $sql = "SELECT QUANTITY as qty
                FROM ORDERDETAIL 
                WHERE ORDER_ID = ? AND PRODUCT_ID = ?";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $order['orderID']);
        $statement->bindValue(2, $i);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        // print_r($result);

        if ($result == null) {
            $data[] = ["qty" => 0];
        } else {
            $data[] = $result;
        }
    }

    echo json_encode($data);

?>
