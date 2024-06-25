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
    $statement -> bindValue(1,$promoCode["enterCode"]);   // $v-model["前端自定義的變數名稱"] 來獲取 input value
    $statement -> execute();

    $data = $statement->fetchAll();

    if (count($data) == 1) {

        $startDate = $data[0]['STARTDATE'];
        $endDate = $data[0]['ENDDATE'];
        $currentDate = date("Y-m-d");

        if($startDate <= $currentDate && $currentDate <= $endDate){
            $voucher_discount = $data[0]['voucher_discount'];
            echo json_encode(array('voucher_discount' => $voucher_discount));
        }else if($currentDate > $endDate){
            echo json_encode(array('error' => '優惠代碼已過期！'));
        }else{
            echo json_encode(array('error' => '優惠活動尚未開始'));
        }

    } else {
        echo json_encode(array('error' => '找不到此優惠券！'));
    }

    // print_r($data);

    // echo json_encode($data);

?>