<?php

include("../conn.php");

$loginData = json_decode(file_get_contents("php://input"), true);

$account = trim($loginData["account"]);
$password = trim($loginData["password"]);

try {
    $sql = "SELECT * FROM MEMBER WHERE MAIL = :account AND PASSWORD = :password";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":account", $account);
    $statement->bindParam(":password", $password);

    $statement->execute();

    $data = $statement->fetchAll();
    if (count($data) > 0) {
        session_start();
        $token = bin2hex(random_bytes(16)); // Generate a random token
        $_SESSION["token"] = $token;

        $memberId = "";
        foreach($data as $index => $row){
            $memberId = $row["ID"];
        }

        $updateSql = "UPDATE MEMBER SET LASTLOGIN = NOW() WHERE ID = :memberId";
        $updateStatement = $pdo->prepare($updateSql);
        $updateStatement->bindParam(":memberId", $memberId);
        $updateStatement->execute();

        $response = array('success' => true, 'token' => $token, 'memberId' => $memberId);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        http_response_code(401);
        $response = array('success' => false, 'message' => 'Invalid account or password');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} catch (Exception $e) {
    error_log("Error: ". $e->getMessage()); // Log the error
    http_response_code(500);
    $response = array('success' => false, 'message' => 'An error occurred');
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>