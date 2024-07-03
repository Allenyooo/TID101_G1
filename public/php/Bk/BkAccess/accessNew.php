<?php
      include("../../conn.php");
    
        // $ID = 6;
    
        $Bknew = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        // $BknewID = $Bknew['newId'];
        $BknewName = $Bknew['newName'];
        $BknewMail = $Bknew['newMail'];
        $BknewPassword = $Bknew['newPassword'];
        $BknewAccess = $Bknew['newAccess'];
       

        
        // $sql = "INSERT into MANAGER
	      //       values
        //         (?, ? , ? , ? , '啟用', ?)";


        $sql = "INSERT into MANAGER(`NAME`,MAIL,`PASSWORD`,`STATUS`,PERMISSIONS_ID)
	            values
                ( ? , ? , ? , '啟用', ?)";

            $statement = $pdo->prepare($sql);
            // $statement->bindValue(1 , $BknewID);
            $statement->bindValue(1, $BknewName);
            $statement->bindValue(2 , $BknewMail);
            $statement->bindValue(3 , $BknewPassword);
            $statement->bindValue(4 , $BknewAccess);

            $statement->execute();

    
?>