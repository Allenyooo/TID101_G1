<?php
// collection.php //功能:會員收藏;資料庫名稱MEMBER <->連接restaurant.vue

// include("../conn.php");
$db_host = "127.0.0.1";
$db_user = "root";
// $db_pass = "passwordpassword";
$db_pass = "password";
$db_select = "TID101_G1";

$dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
$pdo = new PDO($dsn, $db_user, $db_pass);

// Check if the memberId cookie is set
if (isset($_COOKIE['memberId'])) {
    $memberId = $_COOKIE['memberId'];

    // Retrieve the maximum ID value from the COLLECT_DETAIL table
    $query = "SELECT MAX(ID) AS max_id FROM COLLECT_DETAIL";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $maxId = $stmt->fetchColumn() + 1; // increment by 1 for the new record

    // Insert a new record into the COLLECT_DETAIL table
    $query = "INSERT INTO COLLECT_DETAIL (ID, STORE_ID, MEMBER_ID) VALUES (:id, 1, :memberId)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $maxId, PDO::PARAM_INT);
    $stmt->bindParam(':memberId', $memberId, PDO::PARAM_INT);
    if (!$stmt->execute()) {
        $errorInfo = $stmt->errorInfo();
        $response = array('success' => false, 'message' => 'Error executing query: '. $errorInfo[2]);
    } else {
        $response = array('success' => true, 'message' => 'Registration successful!');
    }
} else {
    // User is not logged in, deny access to collect store
    $response = array('success' => false, 'message' => 'Please log in to collect stores.');
}

// Output the response
echo json_encode($response);
?>