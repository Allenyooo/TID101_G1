<?php
    include("../../conn.php");

   
    
        $sql = "SELECT ID,NAME,PRICE,CODE,STARTDATE,ENDDATE,USEDTIMES
                from  VOUCHER
                where ID !=5";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    // ,USEDTIMES as 使用次數
        $sql2 = "SELECT ID as 編號 ,NAME as 名稱,PRICE as 折抵金額 ,CODE as 序號,STARTDATE as 開始日期,ENDDATE as 結束日期
                from  VOUCHER";

    $statement2 = $pdo->prepare($sql2);
    $statement2->execute();
    $data2 = $statement2->fetchAll(PDO::FETCH_ASSOC);


        $sql3 = "SELECT ID,NAME,PRICE,CODE,STARTDATE,ENDDATE,USEDTIMES
        from  VOUCHER";

    $statement3 = $pdo->prepare($sql3);
    $statement3->execute();
    $data3 = $statement3->fetchAll(PDO::FETCH_ASSOC);



        $sql4 = "SELECT ID , STATUS from VOUCHER";

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
    //     echo echojson_encode(["message" => "抓取失败"]);

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