<?php
    header("Access-Control-Allow-Origin:*");
    // header("Content-Type: application/json; charset=UTF-8");
    

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

     
    
    // $sql = "SELECT O.ID , M.MAIL , M.NAME , O.ORDERDATE , sum(OD.UNIT_PRICE) - V.PRICE as TOTAL, PAYMENT 
    //         from `ORDER` as O
    //             join ORDERDETAIL as OD on O.ID = OD.ORDER_ID
    //             join MEMBER as M on O.MEMBER_ID = M.ID
    //             join VOUCHER as V on O.VOUCHER_ID = V.ID
    //         group by ID";

    $sql = "SELECT V.ID,MEMBER.MAIL,MEMBER.NAME,V.ORDERDATE, (S.TOTAL - VOUCHER.PRICE) as TOTAL ,V.PAYMENT
            from (select ID, MEMBER_ID,ORDERDATE,IFNULL(VOUCHER_ID, 5) as VOUCHER_ID ,PAYMENT from `ORDER`  group by ID) as V
                left join VOUCHER
                on V.VOUCHER_ID = VOUCHER.ID
                left join MEMBER
                on V.MEMBER_ID = MEMBER.ID
                left join (select SUM(ROUND(P.PRICE * O.QUANTITY * D.PERCENT) )as TOTAL,O.ORDER_ID
                            from PRODUCT as P
                            join ORDERDETAIL as O
                            on P.ID = O.PRODUCT_ID
                            join DISCOUNT as D
                            on P.DISCOUNT_ID = D.ID
                            group by O.ORDER_ID
                         ) as S
                on v.ID = S.ORDER_ID
            group by V.ID";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    

    if(count($data) > 0){
      
    
        echo json_encode($data);
    }else{
        echo echojson_encode(["message" => "抓取失败"]);

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