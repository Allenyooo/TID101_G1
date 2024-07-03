<?php
     include("../conn.php");
    

        // $ID = 6;
    
        $Bkrevuae = json_decode(file_get_contents("php://input"), true);

        // $Input = $Bksearh['Input'];
        // $BkInput = '%'.$Input.'%';

        // $Start = $Bksearh['Start'];
        // $End = $Bksearh['End'];

        $BkrevuaeID = $Bkrevuae['ID'];
    


       


     


            $sql = "SELECT `NAME`
                from MANAGER
                where ID = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1 , $BkrevuaeID);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($data);
    
?>