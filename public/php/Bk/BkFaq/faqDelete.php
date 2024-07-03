<?php
      include("../../conn.php");

  
        // $ID = 6;
    
        $Bkdelete = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BkdeleteID = $Bkdelete['deleteId'];
       


        $sql = "DELETE from FAQ
	                   where ID = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BkdeleteID);

            $statement->execute();

    
?>