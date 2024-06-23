<?php

    include("../conn.php");

    $promoCode = json_decode(file_get_contents("php://input"),true);

    $sql = "SELECT 
                `CODE`,
                PRICE as voucher_discount,
                STARTDATE,
                ENDDATE,
                `STATUS`
            FROM VOUCHER
            WHERE `CODE` = ?";

    $statement = $pdo-> prepare($sql);
    $statement -> bindValue(1,$promoCode["checkOut_enterCode"]);
    $statement -> execute();

    $data = $statement->fetchAll();

    if(count($data) == 1){
        // $voucher_discount = $data[0]['voucher_discount'];
        echo json_encode(array('voucher_discount' => $data[0]['voucher_discount']));
    }else{
        // $data = array('error' => '找不到此優惠券！');
        echo json_encode(array('error' => '找不到此優惠券！'));
    }

    // print_r($data);

    // echo json_encode($data);

?>