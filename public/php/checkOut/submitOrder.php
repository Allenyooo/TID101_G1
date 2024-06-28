<?php

    include("../conn.php");
    
    $order = json_decode(file_get_contents("php://input"),true);
    

    // VOUCHER表 update 折價券 usedtimes
    
    $sqlUV = "UPDATE VOUCHER set USEDTIMES = USEDTIMES + ? where `CODE` = ?";
    
    $stateUV = $pdo -> prepare($sqlUV);
    $stateUV -> bindValue(1,$order["usedtimes"]);
    $stateUV -> bindValue(2,$order["promoCode"]);
    $stateUV -> execute();
    
    $dataUV = $stateUV->fetchAll(PDO::FETCH_ASSOC);


        // VOUCHER表 select 使用的折價券 ID 
        
        $sqlSV = "SELECT * FROM VOUCHER where `code`= ?";
        $stateSV = $pdo -> prepare($sqlSV);
        $stateSV -> bindValue(1,$order["promoCode"]);
        $stateSV -> execute();
        
        $dataSV = $stateSV->fetchAll(PDO::FETCH_ASSOC);


    // ORDER表 insert 一筆訂單資料

    $orderID = time();
    $status = "正常";

    if(isset($dataSV[0]['ID'])){
        $voucherID = $dataSV[0]['ID'];
    }else{
        $voucherID = null;
    }

    echo $voucherID;

    $sqlIO = "INSERT INTO `ORDER` (ID, MEMBER_ID, ORDERDATE, PAYMENT, SUBTOTAL, AMOUNT, `STATUS`, VOUCHER_ID) 
              VALUES (?, ?, CURDATE(), ? ,?, ?, ?, ?)";

    $stateIO = $pdo -> prepare($sqlIO);
    $stateIO -> bindValue(1,$orderID);
    $stateIO -> bindValue(2,$order["memberId"]);
    $stateIO -> bindValue(3,$order["payment"]);
    $stateIO -> bindValue(4,$order["amount"]);
    $stateIO -> bindValue(5,$order["subtotal"]);
    $stateIO -> bindValue(6,$status);
    $stateIO -> bindValue(7,$voucherID);   // $voucherID = $dataSV[0]['ID'];
    $stateIO -> execute();

    // $dataIO = $stateIO->fetchAll(PDO::FETCH_ASSOC);


        // ORDERDETAIL表 select 找出 ID 序號 
        
        $sqlSOd = "SELECT max(ID) as ID FROM ORDERDETAIL";
        $stateSOd = $pdo -> prepare($sqlSOd);
        $stateSOd -> execute();
        $odMaxID = $stateSOd->fetch(PDO::FETCH_ASSOC);    // 只有一筆資料用 fetch
        $odID = $odMaxID["ID"] + 1;
        // echo (int)$odID;             // 型態為 array，需轉型為 int
        


        // ----------- PRODUCT表 select 找出 product ID ----------- 

        // $sqlSP = "SELECT * FROM PRODUCT where `NAME` = ?";
        // $stateSP = $pdo -> prepare($sqlSP);
        // $stateSP -> bindValue(1,$order["tickets"][0]["name"]);
        // $stateSP -> execute();
        
        // $product = $stateSP->fetchAll(PDO::FETCH_ASSOC);
        
        // echo $product[0]["ID"];



    // ----------- ORDERDETAIL表 insert 一筆訂單資料 ----------- 

    // $sqlIOd = "INSERT INTO ORDERDETAIL (ID, ORDER_ID, PRODUCT_ID, QUANTITY, UNIT_PRICE) 
    //           VALUES (?, ?, ?, ?, ?)";

    // $stateIOd = $pdo -> prepare($sqlIOd);
    // $stateIOd -> bindValue(1,(int)$odID);
    // $stateIOd -> bindValue(2,$orderID);
    // $stateIOd -> bindValue(3,$product[0]["ID"]);
    // $stateIOd -> bindValue(4,$order["tickets"][0]["qty"]);
    // $stateIOd -> bindValue(5,$order["tickets"][0]["salePrice"]);
    // $stateIOd -> execute();

    // $dataIOd = $stateIOd->fetchAll(PDO::FETCH_ASSOC);

    // echo count($order["tickets"]);      // 找出 array 的組數，PHP 沒有 length

    // $ticketQty = count($order["tickets"]) - 1;
    // echo $ticketQty;


    // ORDERDETAIL表 insert 多筆訂單資料

    for($i=0 ; $i < count($order["tickets"]) ; $i++){

        $sqlSP = "SELECT * FROM PRODUCT where `NAME` = ?";
        $stateSP = $pdo -> prepare($sqlSP);
        $stateSP -> bindValue(1,$order["tickets"][$i]["name"]);
        $stateSP -> execute();
        
        $product = $stateSP->fetchAll(PDO::FETCH_ASSOC);


        $sqlIOd = "INSERT INTO ORDERDETAIL (ID, ORDER_ID, PRODUCT_ID, QUANTITY, UNIT_PRICE) 
        VALUES (?, ?, ?, ?, ?)";

        $stateIOd = $pdo -> prepare($sqlIOd);
        $stateIOd -> bindValue(1,(int)$odID);
        $stateIOd -> bindValue(2,$orderID);
        $stateIOd -> bindValue(3,$product[0]["ID"]);
        $stateIOd -> bindValue(4,$order["tickets"][$i]["qty"]);
        $stateIOd -> bindValue(5,$order["tickets"][$i]["salePrice"]);
        $stateIOd -> execute();

        $dataIOd = $stateIOd->fetchAll(PDO::FETCH_ASSOC);

        $odID++;
    }


        // RECEIPT表 select 找出 ID 序號 
            
        $sqlSR = "SELECT max(ID) as ID FROM RECEIPT";
        $stateSR = $pdo -> prepare($sqlSR);
        $stateSR -> execute();
        $RMaxID = $stateSR->fetch(PDO::FETCH_ASSOC);
        $RID = $RMaxID["ID"] + 1;
        // echo (int)$RID;


        $totalQty = $order["totalQty"];
        // echo $totalQty;
        
        $receiptNumbers = [];

        for($j = 1 ; $j < $totalQty + 1; $j++){
            $Number = "$orderID". "$j";
            // echo $receiptNumber;
            // echo "<br>";
            array_push($receiptNumbers,$Number);
        };

        // echo $receiptNumbers[0];
        // print_r($receiptNumbers);


    // RECEIPT表 insert 多筆餐券資料
    
    for($k=0 ; $k < $totalQty ; $k++){

        $sqlSP = "SELECT * FROM PRODUCT where `NAME` = ?";
        $stateSP = $pdo -> prepare($sqlSP);
        $stateSP -> bindValue(1,$order["tickets"][$k]["name"]);
        $stateSP -> execute();
        
        $product = $stateSP->fetchAll(PDO::FETCH_ASSOC);

        for($a=0 ; $a < $order["tickets"][$k]["qty"] ; $a++){

            $sqlIR = "INSERT INTO RECEIPT (ID, MEMBER_ID, ORDER_ID, PRODUCT_ID, `STATUS`, `NUMBER`) 
            VALUES (?, ?, ?, ?, '未使用', 1)";

            $stateIR = $pdo -> prepare($sqlIR);
            $stateIR -> bindValue(1,(int)$RID);
            $stateIR -> bindValue(2,$order["memberId"]);
            $stateIR -> bindValue(3,$orderID);
            $stateIR -> bindValue(4,$product[0]["ID"]);
            // $stateIR -> bindValue(5,$receiptNumbers[$k]);
            $stateIR -> execute();

            $dataIR = $stateIR->fetchAll(PDO::FETCH_ASSOC);

            $RID++;
        }
        
    };
    
    for($b=0 ; $b < $totalQty ; $b++){
        $sqlSRid = "SELECT * FROM RECEIPT where ORDER_ID = ?";
        $stateSRid = $pdo -> prepare($sqlSRid);
        $stateSRid -> bindValue(1,$orderID);
        $stateSRid -> execute();
        
        $receipt = $stateSRid->fetchAll(PDO::FETCH_ASSOC);
    
    
        $sqlUR = "UPDATE RECEIPT SET `NUMBER` = ? WHERE ID = ?";
    
        $stateUR = $pdo -> prepare($sqlUR);
        $stateUR -> bindValue(1,$receiptNumbers[$b]);
        $stateUR -> bindValue(2,$receipt[$b]["ID"]);
        $stateUR -> execute();
    
        $dataUR = $stateUR->fetchAll(PDO::FETCH_ASSOC);
    }


    // CART表 update 剩餘張數

    if($status == "正常"){

        for($m=0 ; $m < count($order["tickets"]) ; $m++){

            $sqlSP2 = "SELECT * FROM PRODUCT where `NAME` = ?";
            $stateSP2 = $pdo -> prepare($sqlSP2);
            $stateSP2 -> bindValue(1,$order["tickets"][$m]["name"]);
            $stateSP2 -> execute();
            
            $product2 = $stateSP2->fetchAll(PDO::FETCH_ASSOC);

            $sqlUC = "UPDATE CART SET `COUNT` = `COUNT`- ? 
            WHERE MEMBER_ID = ? AND PRODUCT_ID = ?";

            $stateUC = $pdo -> prepare($sqlUC);
            $stateUC -> bindValue(1,$order["tickets"][$m]["qty"]);
            $stateUC -> bindValue(2,$order["memberId"]);
            $stateUC -> bindValue(3,$product2[0]["ID"]);
            $stateUC -> execute();

            $dataUC = $stateUC->fetchAll(PDO::FETCH_ASSOC);

            // CART表 delete 數量 <= 0 商品

            $sqlDC = "DELETE from CART WHERE `COUNT` <= 0";
            $stateDC = $pdo -> prepare($sqlDC);
            $stateDC -> execute();
        }
        

    }else{
        echo "交易失敗";
    }
    
    echo json_encode($orderID);
    exit(); // 避免重複 echo 重複輸出





    // 把 OrderID 存進 Session

    // session_start();
    // $_SESSION["orderID"] = $orderID;
    // // print_r($_SESSION);
    // echo $_SESSION["orderID"];
    // header("Location: orderDetails.php");
    // echo "Session variables are set. Order ID: " . $_SESSION["orderID"];

    // setcookie("orderID", $orderID ,time() + 36000);
    // echo $_COOKIE["orderID"];

?>