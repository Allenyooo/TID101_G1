<?php
    include("../conn.php");
    // header("Access-Control-Allow-Origin: *");
    // // header("Content-Type: application/json; charset=UTF-8");
    // header("Access-Control-Allow-Headers: Content-Type");
    


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

        $sqlS = "SELECT * FROM CART
                where MEMBER_ID = ? and PRODUCT_ID = ?";
        
        $stateS = $pdo -> prepare($sqlS);
        $stateS -> bindValue(1, $memberID);
        $stateS -> bindValue(2, $productID);
        $stateS -> execute();
        $data = $stateS -> fetchAll(PDO::FETCH_ASSOC);

        // print_r($data);
        // echo $data[0]["COUNT"];
        
        if(count($data) > 0){
            $cartCount = settype($data[0]["COUNT"], "int");
        //     echo $cartCount;
            $totalCount = $cartCount + $count;
        //     echo $totalCount;
        //     echo $count;


            $sqlU = "UPDATE CART SET COUNT = ?
                     WHERE MEMBER_ID = ? AND PRODUCT_ID = ?";

            $stateU = $pdo -> prepare($sqlU);
            $stateU -> bindValue(1, $totalCount);
            $stateU -> bindValue(2, $memberID);
            $stateU -> bindValue(3, $productID);
            $stateU -> execute();

            echo $shoppingCartID;

        }else{
            $sql = "INSERT into CART(MEMBER_ID, PRODUCT_ID, COUNT)
                    values (?,?,?)";
            
            $statement = $pdo->prepare($sql);
            // $statement->bindValue(1 , $shoppingCartID);
            $statement->bindValue(1 , $memberID);
            $statement->bindValue(2 , $productID);
            $statement->bindValue(3 , $count);
        
            $statement->execute();
        
            echo $shoppingCartID;
        }


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