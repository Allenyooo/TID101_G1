<?php

    include("../conn.php");

    // $payment = $_POST["pay"];
    // $orderDate = date("Y-m-d");
    // $code = $_POST["promoCode"];

    $order = json_decode(file_get_contents("php://input"),true);

    // $sqlV = "SELECT * FROM VOUCHER where `CODE` = ?";

    $sqlV = "UPDATE VOUCHER set USEDTIMES = USEDTIMES + ? where `CODE` = ?";

    $statement = $pdo -> prepare($sqlV);
    $statement -> bindValue(1,$order["promoCode"]);
    $statement -> execute();

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // print_r($data);

    echo json_encode($data);
?>