<?php


    include("../conn.php");

    // session_start();
    // print_r($_SESSION);  
    // echo $_SESSION["orderID"];

    // if (isset($_SESSION["orderID"])) {
    //     echo "Order ID: " . $_SESSION["orderID"];
    // } else {
    //     echo "No order ID found in session.";
    // }

    // echo time();
    // echo $_COOKIE["orderID"];
    
    // $orderID = time();

    $order = json_decode(file_get_contents("php://input"),true);

    $sql = "SELECT 
                o.ID as id,
                o.ORDERDATE as `date`,
                o.PAYMENT as payment,
                o.SUBTOTAL as subtotal,
                o.AMOUNT as amount,
                v.PRICE as discount,
                o.VOUCHER_ID
            FROM `ORDER` as o
                left join VOUCHER as v
                    on o.VOUCHER_ID = v.ID
            where o.MEMBER_ID = ? and o.ID = ?";

    $statement = $pdo -> prepare($sql);
    $statement -> bindValue(1,$order["memberId"]);
    $statement -> bindValue(2,$order["orderID"]);
    $statement -> execute();

    $data = $statement -> fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);


?>