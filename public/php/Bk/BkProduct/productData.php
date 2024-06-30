<?php
      include("../../conn.php");

     
    
        $sql = "SELECT PRODUCT.ID  ,PRICE, PERCENT,round(PRICE * PERCENT) as DP ,STARTDATE,ENDDATE 
                from  PRODUCT
                join DISCOUNT on PRODUCT.DISCOUNT_ID = DISCOUNT.ID";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    // PIC as 商品圖片
        $sql2 = "SELECT PRODUCT.ID as 編號,PRICE as 價格, PERCENT as 折扣,round(PRICE * PERCENT) as 折扣後價格 ,STARTDATE as 折扣開始日期,ENDDATE as 折扣結束日期
                 from  PRODUCT
                 join DISCOUNT on PRODUCT.DISCOUNT_ID = DISCOUNT.ID";

    $statement2 = $pdo->prepare($sql2);
    $statement2->execute();
    $data2 = $statement2->fetchAll(PDO::FETCH_ASSOC);



        $sql3 = "SELECT ID , STATUS from PRODUCT";

    $statement3 = $pdo->prepare($sql3);
    $statement3->execute();
    $data3 = $statement3->fetchAll(PDO::FETCH_ASSOC);



    
        $sql4 = "SELECT PIC from PRODUCT";

    $statement4 = $pdo->prepare($sql4);
    $statement4->execute();
    $data4 = $statement4->fetchAll(PDO::FETCH_ASSOC);


    $allData = array(
        "data" => $data,
        "data2" => $data2,
        "data3" => $data3,
        "data4" => $data4,
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