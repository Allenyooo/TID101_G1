<?php
     include("../../conn.php");
    

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