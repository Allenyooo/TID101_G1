<?php

    // 允許來自任何來源的請求
    header("Access-Control-Allow-Origin: *");

    // 允許的方法
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

    // 允許的頭信息
    header("Access-Control-Allow-Headers: Content-Type");

    // 處理 OPTIONS 請求
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        http_response_code(204);
        exit;
    }

    // -----------------------------------------------------

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