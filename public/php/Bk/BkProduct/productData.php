<?php
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header('Content-Type: application/json; charset=UTF-8');
    

// include('/php/conn.php');
       //---------------------------------------------------


        //MySQL相關資訊
        $db_host = "127.0.0.1";
        $db_user = "root";
        $db_pass = "password";
        $db_select = "TID101_G1";
    
        //建立資料庫連線物件
        $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
    
        //建立PDO物件，並放入指定的相關資料
        $pdo = new PDO($dsn, $db_user, $db_pass);

     
    
        $sql = "SELECT PRODUCT.ID , PIC ,PRICE, PERCENT,round(PRICE * PERCENT) as DP ,STARTDATE,ENDDATE 
                from  PRODUCT
                join DISCOUNT on PRODUCT.DISCOUNT_ID = DISCOUNT.ID";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);


        $sql2 = "SELECT PRODUCT.ID as 編號,PRICE as 價格, PERCENT as 折扣,round(PRICE * PERCENT) as 折扣後價格 ,STARTDATE as 折扣開始日期,ENDDATE as 折扣結束日期,PIC as 商品圖片
                 from  PRODUCT
                 join DISCOUNT on PRODUCT.DISCOUNT_ID = DISCOUNT.ID";

    $statement2 = $pdo->prepare($sql2);
    $statement2->execute();
    $data2 = $statement2->fetchAll(PDO::FETCH_ASSOC);



        $sql3 = "SELECT ID , status from PRODUCT";

    $statement3 = $pdo->prepare($sql3);
    $statement3->execute();
    $data3 = $statement3->fetchAll(PDO::FETCH_ASSOC);


    $allData = array(
        "data" => $data,
        "data2" => $data2,
        "data3" => $data3
    );
    

    // if(count($data) > 0){
      
    
    //     echo json_encode($data);
    // }else{
    //     echo echojson_encode(["message" => "抓取失敗"]);

    // }

    echo json_encode($allData);



    // foreach($data as $index => $row){
    //     echo "<br>";
    //     echo $row["ID"];   //欄位名稱
    //     echo "<br>";
    //     echo $row["PRICE"];    //欄位名稱
    //     echo "<br>";
    //     echo $row["PIC"];    //欄位名稱
    //     echo "<br>";
    //     echo $row["PERCENT"]; 
    // }

   


 


       //執行
    //    exec就是執行
    //    $affectedRow = $pdo->exec($sql);
    //    if($affectedRow > 0){
    //         //   echo "新增成功!";
    //         header("Location: Select.php");
    //    }else{
    //           echo "新增失敗!";
    //    }


    
?>