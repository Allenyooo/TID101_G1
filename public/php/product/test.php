<?php


       include('conn.php');
       //---------------------------------------------------


 
    


     
    // $sql = "SELECT * FROM member where Account =? and PWD =?";
    $sql = "SELECT PRODUCT.ID ,PRODUCT.PRICE ,PRODUCT.PIC,DISCOUNT.PERCENT
from PRODUCT  join DISCOUNT  on PRODUCT.DISCOUNT_ID = DISCOUNT.ID";

    $statement = $pdo->prepare($sql);

  
    // $statement->bindValue(1 ,$mail);
    // $statement->bindValue(2 ,$password);
    // 丟給資料庫執行
    $statement->execute();



    $data = $statement->fetchAll();

    // if(count($data) > 0){
    //     echo "登入成功";
    // }else{
    //     echo "帳號或密碼錯誤";
    // }


    // foreach($data as $index => $row){
    //     echo $row["Account"];   //欄位名稱
    //     echo " / ";
    //     echo $row["PWD"];    //欄位名稱
    //     echo " / ";
    //     echo $row["CreateDate"];    //欄位名稱
    //        echo "<br>";
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