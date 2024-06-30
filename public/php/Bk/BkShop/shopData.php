<?php
  include("../../conn.php");

     
    
        $sql = "SELECT  STORE.ID , NAME ,REGION ,count(STORE_ID)
                from  COLLECT_DETAIL
                right join STORE
                on  STORE_ID= STORE.ID
                group by STORE.ID";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);


        $sql2 = "SELECT ID as 編號 ,NAME as 店家名稱 ,REGION as 地區
                from  STORE";

    $statement2 = $pdo->prepare($sql2);
    $statement2->execute();
    $data2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

        $sql3 = "SELECT ID , STATUS from STORE";

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