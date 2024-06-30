<?php
    include("../../conn.php");
    

        // $ID = 6;
    
        $Bkrevuae = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BkrevuaeID = $Bkrevuae['reviseBd']['編號'];
        $Bkrevuae2 = $Bkrevuae['reviseBd']['名稱'];
        $Bkrevuae3 = $Bkrevuae['reviseBd']['序號'];
        $Bkrevuae4 = $Bkrevuae['reviseBd']['折抵金額'];
        $Bkrevuae5 = $Bkrevuae['reviseBd']['開始日期'];
        $Bkrevuae6 = $Bkrevuae['reviseBd']['結束日期'];
   


       


        $sql = "UPDATE
				VOUCHER
                set
                ID = ?,
                NAME = ?,
				CODE = ?,
                PRICE = ?,
                STARTDATE =?,
                ENDDATE = ?
                where ID = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BkrevuaeID);
            $statement->bindValue(2 , $Bkrevuae2);
            $statement->bindValue(3 , $Bkrevuae3);
            $statement->bindValue(4 , $Bkrevuae4);
            $statement->bindValue(5 , $Bkrevuae5);
            $statement->bindValue(6 , $Bkrevuae6);
            $statement->bindValue(7 , $BkrevuaeID);
            $statement->execute();

    
?>