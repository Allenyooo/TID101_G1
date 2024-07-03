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
        $BknewPrice = $Bknew['newPrice'];
        $BknewCode = $Bknew['newCode'];
        $BknewStart = $Bknew['newStart'];
        $BknewEnd = $Bknew['newEnd'];
       

        
        $sql = "INSERT into
                VOUCHER
                values
                (?,?,?,?,?,?,0,'啟用')";



        // $sql = "INSERT into VOUCHER(`NAME`,`CODE`,PRICE,STARTDATE,ENDDATE,USEDTIMES,`STATUS`)
	    //         values
        //         ( ? , ? , ? , ? , ? , 0, '啟用')";



            $statement = $pdo->prepare($sql);
            $statement->bindValue(1 , $BknewID);
            $statement->bindValue(2 , $BknewName);
            $statement->bindValue(3 , $BknewCode);
            $statement->bindValue(4 , $BknewPrice);
            $statement->bindValue(5 , $BknewStart);
            $statement->bindValue(6 , $BknewEnd);

            $statement->execute();

    
?>