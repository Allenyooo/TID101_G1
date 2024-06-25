<?php

include ("../conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $requestData = json_decode(file_get_contents('php://input'), true);

    $eventId = $requestData['itemId'];
    $memberId = $requestData['memberId'];


    $sqlCheck = "
        select COUNT(*) as countLikes from `LIKE`
        where REVIEW_ID = :eventId and MEMBER_ID = :memberId";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->bindValue(':eventId', $eventId, PDO::PARAM_INT);
    $stmtCheck->bindValue(':memberId', $memberId, PDO::PARAM_INT);
    $stmtCheck->execute();
    $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    $currentLikes = $result['countLikes'];

    if ($currentLikes == 0) {
        $sqlInsert = "
            insert into `LIKE`(REVIEW_ID, MEMBER_ID)
            values (:eventId, :memberId);";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->bindValue(':eventId', $eventId, PDO::PARAM_INT);
        $stmtInsert->bindValue(':memberId', $memberId, PDO::PARAM_INT);
        $stmtInsert->execute();
        $newLikes = $currentLikes + 1; 
        $message = 'Event liked successfully';
    } else {
        $sqlDelete = "
            delete from `LIKE`
            where REVIEW_ID = :eventId and MEMBER_ID = :memberId;";
        $stmtDelete = $pdo->prepare($sqlDelete);
        $stmtDelete->bindValue(':eventId', $eventId);
        $stmtDelete->bindValue(':memberId', $memberId);
        $stmtDelete->execute();
        $newLikes = $currentLikes - 1;
        $message = 'Event unliked successfully'; 
    }

    $response = [
        'success' => true,
        'newLikes' => $newLikes,
        'message' => $message
    ];
    echo json_encode($response);
}
?>
