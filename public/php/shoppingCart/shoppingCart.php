<?php

    include("../conn.php");

   
    


        $shopping = json_decode(file_get_contents("php://input"), true);

        $memberId =  $shopping['memberID'];
       
     
    // $sql = "SELECT * FROM member where Account =? and PWD =?";
    $sql = "SELECT  CART.ID,P.PRICE,P.PIC ,CART.`COUNT`,P.PERCENT
            from CART join 
                    (select PRODUCT.ID ,PRODUCT.PRICE ,PRODUCT.PIC,DISCOUNT.PERCENT
					from PRODUCT  join DISCOUNT  on PRODUCT.DISCOUNT_ID = DISCOUNT.ID) as P 
		        on CART.PRODUCT_ID = P.ID
            where MEMBER_ID = ?";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1 , $memberId);

    $statement->execute();



    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

 
      
    
        echo json_encode($data);




   


 



    
?>