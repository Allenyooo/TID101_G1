<?php
    include("../conn.php");
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type");
    


       //---------------------------------------------------


        // //MySQL相關資訊
        // $db_host = "127.0.0.1";
        // $db_user = "root";
        // $db_pass = "password";
        // $db_select = "TID101_G1";
    
        // //建立資料庫連線物件
        // $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
    
        // //建立PDO物件，並放入指定的相關資料
        // $pdo = new PDO($dsn, $db_user, $db_pass);

        

        $shoppingCart = json_decode(file_get_contents("php://input"), true);

        $shoppingCartID = $shoppingCart['cartID'];
        $memberID = $shoppingCart['memberID'];
        $productID = $shoppingCart['productID'];
        $count = $shoppingCart['cartCount'];
     
    
    $sql = "INSERT into
            CART
            values
            (?,?,?,?)";

    
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1 , $shoppingCartID);
    $statement->bindValue(2 , $memberID);
    $statement->bindValue(3 , $productID);
    $statement->bindValue(4 , $count);

    $statement->execute();

    echo   $shoppingCartID;


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