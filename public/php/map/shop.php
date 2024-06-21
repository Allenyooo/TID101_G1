<?php
    include ("../conn.php");

    $sql = 'select *
            from STORE
            where REGION = "北"';

    $pstmt = $pdo->prepare($sql);
    $pstmt->execute();
    $data = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    // $shops = array();

    // if ($pstmt->rowCount() > 0) {
    //     $data = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    //     foreach ($data as $row) {
    //         // if (isset($row['BANNERPIC'])) {
    //         //     $row['BANNERPIC'] = str_replace(array("\r", "\n"), '', $row['BANNERPIC']);
    //         // }
    //         $shops[] = $row;
    //     }
    // }
    
    // header('Content-Type: application/json');

    // if ($pstmt->rowCount() > 0) {
    //     foreach($data as $pstmt->fetchAll(PDO::FETCH_ASSOC)) {
    //         // print_r($row["name"]);
    //         $shops[] = $data;
    //     }
    // }
    // foreach ($data as $key => $value) {

    //     $data[$key]['BANNERPIC'] = '';

    // }


    // foreach ($data as &$row) {
    //     if (isset($row['BANNERPIC'])) {
    //         $row['BANNERPIC'] = str_replace(array("\r", "\n"), '', $row['BANNERPIC']);
    //     }
    // }
    
    // header('Content-Type: application/json');

    print_r($data);


    echo json_encode($data);

?>