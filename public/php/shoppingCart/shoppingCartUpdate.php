<?php

    include("../conn.php");
   

// include('/php/conn.php');
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
    


    
        $shoppingDown = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $productid= $shoppingDown['changeD'];
        $memberid = $shoppingDown['memberID'];
       


        $sql = "UPDATE CART 
                set count = count - 1
                where MEMBER_ID = ? and ID = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $memberid);
            $statement->bindValue(2 , $productid);
       
            $statement->execute();

    
?>