<?php
     include("../../conn.php");



        $memberDetail = json_decode(file_get_contents("php://input"), true);


        $memberDetailID = $memberDetail['orderDetailid'];



     
    
        $sql = "SELECT ID,NAME,MAIL,NICKNAME,PHONE,BIRTHDAY,JOINDATE,LASTLOGIN
                from  MEMBER
                where ID = ? ";



        $statement = $pdo->prepare($sql);
        $statement->bindValue(1 , $memberDetailID);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);


        // $sql2 = "SELECT V.ID,V.ORDERDATE, (S.TOTAL - VOUCHER.PRICE) as TOTAL 
        //     from (select ID, MEMBER_ID,ORDERDATE,IFNULL(VOUCHER_ID, 5) as VOUCHER_ID ,PAYMENT from `ORDER`  group by ID) as V
        //         left join VOUCHER
        //         on V.VOUCHER_ID = VOUCHER.ID
        //         left join MEMBER
        //         on V.MEMBER_ID = MEMBER.ID
        //         left join (select SUM(ROUND(P.PRICE * O.QUANTITY * D.PERCENT) )as TOTAL,O.ORDER_ID
        //                     from PRODUCT as P
        //                     join ORDERDETAIL as O
        //                     on P.ID = O.PRODUCT_ID
        //                     join DISCOUNT as D
        //                     on P.DISCOUNT_ID = D.ID
        //                     group by O.ORDER_ID
        //                  ) as S
        //         on V.ID = S.ORDER_ID
        //         where V.MEMBER_ID = ?
        //     group by V.ID";


        $sql2 = "SELECT O.ID,O.ORDERDATE,O.SUBTOTAL as TOTAL 
            from `ORDER` as O
            join `MEMBER` as M
            on O.MEMBER_ID = M.ID
            where O.MEMBER_ID = ?";







            $statement2 = $pdo->prepare($sql2);
            $statement2->bindValue(1 , $memberDetailID);
            $statement2->execute();
            $data2 = $statement2->fetchAll(PDO::FETCH_ASSOC);




            $sql3 = "SELECT MEMBER.ID , `ORDER`.ID from MEMBER
                        join `ORDER` 
                        on MEMBER.ID =  `ORDER`.MEMBER_ID
                    where MEMBER.ID = ?";


            $statement3 = $pdo->prepare($sql3);
            $statement3->bindValue(1 , $memberDetailID);
            $statement3->execute();
            $data3 = $statement3->fetchAll(PDO::FETCH_ASSOC);






    $allData = array(
        "data" => $data,
        "data2" => $data2,
        "data3" => $data3,
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