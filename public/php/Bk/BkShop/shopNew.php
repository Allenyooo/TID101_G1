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
        $BknewRegion = $Bknew['newRegion'];
  
       

        
        $sql = "INSERT into
                STORE
                values
                (?,?,?,'上架',null)";

        // $sql = "INSERT into STORE(`NAME`,REGION,`STATUS`,BANNERPIC)
	    //         values
        //         (  ? ,  ? , '上架', NULL)";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BknewID);
            $statement->bindValue(2 , $BknewName);
            $statement->bindValue(3 , $BknewRegion);
   

            $statement->execute();

    
?>