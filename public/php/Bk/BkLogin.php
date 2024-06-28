<?php

include("../conn.php");

$loginData = json_decode(file_get_contents("php://input"), true);

$account = $loginData["account"];
$password = $loginData["password"];

try {
    $sql = "SELECT * FROM MANAGER WHERE MAIL = :account AND PASSWORD = :password";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":account", $account);
    $statement->bindParam(":password", $password);

    $statement->execute();

    $data = $statement->fetchAll();
    if (count($data) > 0) {
        session_start();

        $managerId = "";
        foreach($data as $index => $row){
            $managerId = $row["ID"];
        }

        $updateSql = "UPDATE MEMBER SET LASTLOGIN = NOW() WHERE ID = :managerId";
        $updateStatement = $pdo->prepare($updateSql);
        $updateStatement->bindParam(":managerId", $managerId);
        $updateStatement->execute();

        $response = array('success' => true, 'managerId' => $managerId);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        $response = array('success' => false, 'message' => '帳號或密碼無效');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} catch (Exception $e) {
    error_log("Error: ". $e->getMessage()); // Log the error
    $response = array('success' => false, 'message' => 'An error occurred');
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>