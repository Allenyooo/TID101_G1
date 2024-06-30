<?php

include("../conn.php");

$member = json_decode(file_get_contents("php://input"), true);

try {
    $sql = "SELECT MAX(ID) AS latest_id FROM MEMBER";
    $identification = $pdo->prepare($sql);
    $identification->execute();
    $result = $identification->fetch();
    $latestId = $result['latest_id'];

    // Generate a new ID by incrementing the latest ID
    $newId = $latestId + 1;

    // Prepare the INSERT statement
    $sql = "INSERT INTO MEMBER (ID, NAME, MAIL, PASSWORD, BIRTHDAY, JOINDATE, LASTLOGIN, STATUS) VALUES (:id, :name, :mail, :pw, :birthday, NOW(), NOW(), '正常')";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $newId);
    $statement->bindParam(":name", $member["name"]);
    $statement->bindParam(":mail", $member["email"]);
    $statement->bindParam(":pw", $member["password"]);
    $statement->bindParam(":birthday", $member["birthday"]);

    if (!$statement->execute()) {
        $errorInfo = $statement->errorInfo();
        $response = array('success' => false, 'message' => 'Error executing query: ' . $errorInfo[2]);
    } else {
        $response = array('success' => true, 'message' => 'Registration successful!');
    }
} catch (Exception $e) {
    $errorMessage = "Error executing query: " . $e->getMessage() . "\n";
    $errorMessage .= "SQL Query: " . $sql . "\n";
    $errorMessage .= "Input Data: " . json_encode($member) . "\n";
    $errorMessage .= "User IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
    error_log($errorMessage, 3, "./error.log");
    $response = array('success' => false, 'message' => 'Error executing query');
}

echo json_encode($response);

?>