<?php
      include("../conn.php");
    
        // $mail = $_POST['mail'];

        $memberId = 1;
        $productId = 1;
        $count = json_decode(file_get_contents("php://input"), true);


        // if (isset($count['count'])) {
        //     echo $count['count'];
        //     
        // } else {
        //     
        //     echo "No valid data received";
        // }
        
    // $sql = "SELECT * FROM member where Account =? and PWD =?";
    $sql = "UPDATE CART 
            set count =?
            where MEMBER_ID =? and PRODUCT_ID =?";

    $statement = $pdo->prepare($sql);

  
    $statement->bindValue(1 , $count['count']);
    $statement->bindValue(2 ,$memberId);
    $statement->bindValue(3 , $productId);
    // 丟給資料庫執行
    $statement->execute();



    // $data = $statement->fetchAll();

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