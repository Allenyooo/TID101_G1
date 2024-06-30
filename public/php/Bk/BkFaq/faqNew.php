<?php
     include("../../conn.php");
    

        // $ID = 6;
    
        $Bknew = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BknewID = $Bknew['newId'];
        $BknewType = $Bknew['newType'];
        $BknewQuestion = $Bknew['newQuestion'];
        $BknewAnswer = $Bknew['newAnswer'];

       

        
        $sql = "INSERT into
                FAQ
                values
                (?,?,?,?,'套用中');";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BknewID);
            $statement->bindValue(2 , $BknewType);
            $statement->bindValue(3 , $BknewQuestion);
            $statement->bindValue(4 , $BknewAnswer);
       

            $statement->execute();

    
?>