<?php
//     header("Access-Control-Allow-Origin: *");
//     // header("Content-Type: application/json; charset=UTF-8");


include("../conn.php");
    
    $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
            from  MEMBER";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);



    $sql3 = "SELECT ID , STATUS from MEMBER";

    $statement3 = $pdo->prepare($sql3);
    $statement3->execute();
    $data3 = $statement3->fetchAll(PDO::FETCH_ASSOC);


    $sql4 = "SELECT ID , STATUS from MEMBER";

    $statement4 = $pdo->prepare($sql4);
    $statement4->execute();
    $data4 = $statement4->fetchAll(PDO::FETCH_ASSOC);



    $allData = array(
        "data" => $data,
       
        "data3" => $data3,
        "data4" => $data4,
    );
    

      echo json_encode($allData);

    // if(count($data) > 0){
      
    
    //     echo json_encode($data);
    // }else{
    //     echo echojson_encode(["message" => "抓取失败"]);

    // }


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