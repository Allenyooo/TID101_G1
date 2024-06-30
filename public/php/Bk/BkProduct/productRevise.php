<?php
    header("Access-Control-Allow-Origin: *");

    header("Access-Control-Allow-Headers: Content-Type");

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
    

        // $ID = 6;
    
        $Bkrevuae = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BkrevuaeID = $Bkrevuae['reviseBd']['編號'];
        $Bkrevuae2 = $Bkrevuae['reviseBd']['店家名稱'];
        $Bkrevuae3 = $Bkrevuae['reviseBd']['地區'];
   


       


        $sql = "UPDATE
                STORE
                set
                ID = ?,
                NAME  = ?,
                REGION = ?
           
                where ID = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BkrevuaeID);
            $statement->bindValue(2 , $Bkrevuae2);
            $statement->bindValue(3 , $Bkrevuae3);
            $statement->bindValue(4 , $BkrevuaeID);
            $statement->execute();

    
?>