<?php
     include("../../conn.php");
    
        $Bksearh = json_decode(file_get_contents("php://input"), true);

        $Input = $Bksearh['Input'];
        $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        if( $Bksearh['Search'] === 'ID'){
      
            // if(!empty($BkInput) && !empty($Start) && !empty($End)){
            //     $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
            //     from  MEMBER
            //     WHERE  ID like ? and
            //     JOINDATE BETWEEN ? AND ?
			// 	and	LASTLOGIN BETWEEN ? AND ? ";

            //     $statement = $pdo->prepare($sql);
            //     $statement->bindValue(1 , $BkInput);
            //     $statement->bindValue(2 , $Start);
            //     $statement->bindValue(3 , $End);
            //     $statement->bindValue(4 , $Start);
            //     $statement->bindValue(5 , $End);
            //     $statement->execute();

            // }elseif(!empty($Start) && !empty($End)){
            //     $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
            //     from  MEMBER
            //     WHERE JOINDATE BETWEEN ? AND ?
			// 	and	LASTLOGIN BETWEEN ? AND ?";

            //     $statement = $pdo->prepare($sql);
            //     $statement->bindValue(1 , $Start);
            //     $statement->bindValue(2 , $End);
            //     $statement->bindValue(3 , $Start);
            //     $statement->bindValue(4 , $End);
            //     $statement->execute();

            // }elseif(!empty($BkInput)){
            //     $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
            //     from  MEMBER
            //     where ID like ? ";

            //     $statement = $pdo->prepare($sql);
            //     $statement->bindValue(1 , $BkInput);
            //     $statement->execute();
            // }

            if(!empty($BkInput)){
                $sql = "SELECT ID,TYPE,QUESTION,ANSWER
                        from  FAQ
                        where ID like ?";

                $statement = $pdo->prepare($sql);
                $statement->bindValue(1 , $BkInput);
                $statement->execute();
            }
    
        }elseif($Bksearh['Search'] === 'QUESTION'){
            // $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
            // from  MEMBER
            // where NAME like ?";

            // if(!empty($BkInput) && !empty($Start) && !empty($End)){
            //     $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
            //     from  MEMBER
            //     WHERE  NAME like ? and
            //     JOINDATE BETWEEN ? AND ?
			// 	and	LASTLOGIN BETWEEN ? AND ? ";

            //     $statement = $pdo->prepare($sql);
            //     $statement->bindValue(1 , $BkInput);
            //     $statement->bindValue(2 , $Start);
            //     $statement->bindValue(3 , $End);
            //     $statement->bindValue(4 , $Start);
            //     $statement->bindValue(5 , $End);
            //     $statement->execute();

            // }elseif(!empty($Start) && !empty($End)){
            //     $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
            //     from  MEMBER
            //     WHERE JOINDATE BETWEEN ? AND ?
			// 	and	LASTLOGIN BETWEEN ? AND ?";

            //     $statement = $pdo->prepare($sql);
            //     $statement->bindValue(1 , $Start);
            //     $statement->bindValue(2 , $End);
            //     $statement->bindValue(3 , $Start);
            //     $statement->bindValue(4 , $End);
            //     $statement->execute();

            // }elseif(!empty($BkInput)){
            //     $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
            //     from  MEMBER
            //     where NAME like ?";

            //     $statement = $pdo->prepare($sql);
            //     $statement->bindValue(1 , $BkInput);
            //     $statement->execute();
            // }


            if(!empty($BkInput)){
                $sql = "SELECT ID,TYPE,QUESTION,ANSWER
                        from  FAQ
                        where QUESTION like ?";

                $statement = $pdo->prepare($sql);
                $statement->bindValue(1 , $BkInput);
                $statement->execute();
            }



          }


          
        //   if( $Bksearh['Search'] = 'NAME'){
      
        //     $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
        //     from  MEMBER
        //     where NAME =? ";
        
        //       }
    // $sql = "SELECT ID,MAIL,NAME,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
    //         from  MEMBER
    //         where ? =? ";

//     $statement = $pdo->prepare($sql);
    

//    if(isset($BkInput) and isset($Start) and isset($End)){
//     $statement->bindValue(1 , $BkInput);
//     $statement->bindValue(2 , $Start);
//     $statement->bindValue(3 , $End);
//     $statement->bindValue(4 , $Start);
//     $statement->bindValue(5 , $End);
//    }elseif(isset($Start) and isset($End)){
//     $statement->bindValue(1 , $Start);
//     $statement->bindValue(2 , $End);
//     $statement->bindValue(3 , $Start);
//     $statement->bindValue(4 , $End);
//    }else{
//     $statement->bindValue(1 , $BkInput);
//    }

    // $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    

    // if(count($data) > 0){
      
    
        echo json_encode($data);
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