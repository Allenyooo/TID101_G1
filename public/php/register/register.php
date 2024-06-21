<?php

include("conn.php");

$mail = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
$pw = substr(htmlspecialchars($_POST["password"]), 0, 45);
$Cpw = htmlspecialchars($_POST["confirmPassword"]);
$name = htmlspecialchars($_POST["name"]);
$accept = htmlspecialchars($_POST["accept"]);

try {
    $sql = "SELECT MAX(ID) AS latest_id FROM MEMBER";
    $identification = $pdo->prepare($sql);
    $identification->execute();
    $result = $identification->fetch();
    $latestId = $result['latest_id'];

    // Generate a new ID by incrementing the latest ID
    $newId = $latestId + 1;

    // Prepare the INSERT statement
    $sql = "INSERT INTO MEMBER (ID, NAME, MAIL, PASSWORD, JOINDATE, LASTLOGIN, STATUS) VALUES (:id, :name, :mail, :pw, NOW(), NOW(), '正常')";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $newId);
    $statement->bindParam(":name", $name);
    $statement->bindParam(":mail", $mail);
    $statement->bindParam(":pw", $pw);

    // Execute the INSERT statement
    $affectedRow = $statement->execute();
    if ($affectedRow) {
        echo "Query executed successfully<br>";
    } else {
        echo "Error executing query<br>";
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(array('error' => 'Error executing query', 'essage' => $e->getMessage()));
    exit;
}

?>