<?php
  include("../../conn.php");
    

        // $ID = 6;
    
        $Bkrevuae = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BkrevuaeID = $Bkrevuae['reviseBd']['編號'];
        $Bkrevuae2 = $Bkrevuae['reviseBd']['分類'];
        $Bkrevuae3 = $Bkrevuae['reviseBd']['問題標題'];
        $Bkrevuae4 = $Bkrevuae['reviseBd']['回答內容'];
   


       


        $sql = "UPDATE
				FAQ
                set
                ID = ?,
                TYPE = ?,
				QUESTION = ?,
                ANSWER = ?
                where ID = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BkrevuaeID);
            $statement->bindValue(2 , $Bkrevuae2);
            $statement->bindValue(3 , $Bkrevuae3);
            $statement->bindValue(4 , $Bkrevuae4);
            $statement->bindValue(5 , $BkrevuaeID);
            $statement->execute();

    
?>