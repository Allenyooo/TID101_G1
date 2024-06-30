<?php
     include("../../conn.php");

        // $ID = 6;
    
        $Bkstate = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BkstateID = $Bkstate['STATEID'];
        $BkstateNew = $Bkstate['NEWSTATE'];
   
       

        
        $sql = "UPDATE
				MEMBER
                set
				STATUS = ?
				where ID = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BkstateNew);
            $statement->bindValue(2 , $BkstateID);
       
       

            $statement->execute();

    
?>s