<?php
    include ("../conn.php");
    $memberId = $_GET['memberId'];

    $sql = 
    'select  S.ID, S.NAME as SNAME, S.BANNERPIC, S.REGION
        from STORE S
        join COLLECT_DETAIL C on S.ID = C.STORE_ID
            where C.MEMBER_ID = :memberId';

    $pstmt = $pdo->prepare($sql);
    $pstmt->bindValue(":memberId", $memberId);
    $pstmt->execute();
    $data = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    // echo count($data);

    // echo $region;
    echo json_encode($data);

?>