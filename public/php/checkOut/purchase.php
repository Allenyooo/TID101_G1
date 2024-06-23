<?php

    include("../conn.php");

    $sql = "SELECT 
                c.MEMBER_ID,
                p.`NAME` as name, 
                p.PRICE as price, 
                d.PERCENT as percent, 
                round(p.PRICE * d.PERCENT,0) as salePrice,
                p.PIC as imgSrc,
                c.`COUNT` as qty,
                d.STARTDATE,
                d.ENDDATE
            FROM PRODUCT as p
                join CART as c 
                    on p.ID = c.PRODUCT_ID
                join DISCOUNT as d
                    on p.DISCOUNT_ID = d.ID ";
            // WHERE c.MEMBER_ID = ?";
    
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $data = $statement->fetchAll();
    

    // print_r($data);

    // foreach($data as $index => $row){
    //     for($i=0 ; $i < 8 ;$i++){
    //         echo $row[$i]."/";
    //     }
    //     echo "<br>";
    // }

    echo json_encode($data);


?>