<?php
    include ("../conn.php");
    $shop = $_GET['shop'];

    $resp = [];

    $sql = '
        select 
        R.ID, 
        M.NAME,
        R.STAR,
        R.CONTENT , 
        R.`TIME`,
        M.PHOTO as AVATAR,
        COUNT(L.ID) as `rLIKE`
        from REVIEW R
            left join `LIKE` L on R.ID = L.REVIEW_ID
            left join MEMBER M on M.ID = R.MEMBER_ID
        where R.STORE_ID = :shop
        group by R.ID
    ';
    $pstmt = $pdo->prepare($sql);
    $pstmt->bindValue(":shop", $shop);
    $pstmt->execute();
    $data = $pstmt->fetchAll(PDO::FETCH_ASSOC);

    
    foreach($data as $index => $row){
        
        $sql2 = '
            select PHOTO as pic
            from PHOTO
            where REVIEW_ID = :index;
        ';
        $pstmt2 = $pdo->prepare($sql2);
        $pstmt2->bindValue(":index", $row["ID"]);
        $pstmt2->execute();
        $data2 = $pstmt2->fetchAll(PDO::FETCH_ASSOC);

        $pics = [];  //將pic中的資料直接取出而不取欄位名
        foreach($data2 as $index2 => $row2){
            array_push($pics, $row2['pic']);
        }

        $a = ["PHOTOS" => $pics];  // 重新命名 (客製化名稱)

        // array_push($resp, array_merge($row, $a));

        //-------------------------------------------------------

        $sql3 = '
            select MEMBER_ID as likeID
            from `LIKE`
            where REVIEW_ID = :index;
        ';
        $pstmt3 = $pdo->prepare($sql3);
        $pstmt3->bindValue(":index", $row["ID"]);
        $pstmt3->execute();
        $data3 = $pstmt3->fetchAll(PDO::FETCH_ASSOC);

        $likeIDs = [];  //將likeID中的資料直接取出而不取欄位名
        foreach($data3 as $index3 => $row3){
            array_push($likeIDs, $row3['likeID']);
        }

        $b = ["LIKE_MEMBERS" => $likeIDs];  // 重新命名 (客製化名稱)

        //-------------------------------------------------------

        array_push($resp, array_merge($row, array_merge($a, $b)));

    }

    echo json_encode($resp);
?>