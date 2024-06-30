<?php

    include("../conn.php");

    $user = json_decode(file_get_contents("php://input"),true);

    $sql = "SELECT MAIL FROM `MEMBER` where ID = ?";

    $statement = $pdo -> prepare($sql);
    $statement -> bindValue(1, $user['memberId']);
    $statement -> execute();

    $data = $statement -> fetch();

    echo json_encode($data);

?>