<?php
      include("../../conn.php");
    
        // $ID = 6;
    
        $Bknew = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BknewID = $Bknew['newId'];
        $BknewName = $Bknew['newName'];
        $BknewMail = $Bknew['newMail'];
        $BknewPassword = $Bknew['newPassword'];
        $BknewAccess = $Bknew['newAccess'];
       

        
        $sql = "INSERT into MANAGER
	            values
                (?, ? , ? , ? , '啟用', ?)";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BknewID);
            $statement->bindValue(2 , $BknewName);
            $statement->bindValue(3 , $BknewMail);
            $statement->bindValue(4 , $BknewPassword);
            $statement->bindValue(5 , $BknewAccess);

            $statement->execute();

    
?>