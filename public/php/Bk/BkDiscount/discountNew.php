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
    
        $Bknew = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BknewID = $Bknew['newId'];
        $BknewName = $Bknew['newName'];
        $BknewPrice = $Bknew['newPrice'];
        $BknewCode = $Bknew['newCode'];
        $BknewStart = $Bknew['newStart'];
        $BknewEnd = $Bknew['newEnd'];
       

        
        $sql = "INSERT into
                VOUCHER
                values
                (?,?,?,?,?,?,0,'啟用');";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BknewID);
            $statement->bindValue(2 , $BknewName);
            $statement->bindValue(3 , $BknewCode);
            $statement->bindValue(4 , $BknewPrice);
            $statement->bindValue(5 , $BknewStart);
            $statement->bindValue(6 , $BknewEnd);

            $statement->execute();

    
?>