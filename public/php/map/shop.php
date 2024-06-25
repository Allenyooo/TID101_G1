<?php
    include ("../conn.php");
    $region = $_GET['REGION'];

    $sql = 
    'select distinct
	#S.BANNERPIC,
	S.ID,
    S.NAME as SNAME,
    S.REGION,
    M.NAME as MNAME,
    R.CONTENT,
    R.`TIME`
        from STORE as S
            left join REVIEW as R on S.ID = R.STORE_ID
            left join MEMBER as M on M.ID = R.MEMBER_ID
            left join `LIKE` as L on L.REVIEW_ID = R.ID 
            left join PHOTO as P on P.REVIEW_ID = R.ID
        where REGION = :region and
            (S.ID, R.ID) in (select STORE_ID, REVIEW_ID
                from (select
                    s.ID as STORE_ID,
                    r.ID as REVIEW_ID,
                    RANK() over(
                        partition by s.ID
                        order by COUNT(*) desc
                    ) as rr
                from
                    STORE s
                    left join REVIEW r
                        on s.ID = r.STORE_ID
                    left join `LIKE` l
                        on r.ID = l.REVIEW_ID
                group by
                    s.ID,
                    r.ID) t
                where
                    t.rr = 1)';

        // $sql = 'select * from STORE where REGION like :region';

    $pstmt = $pdo->prepare($sql);
    $pstmt->bindValue(":region", $region);
    $pstmt->execute();
    $data = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    // echo count($data);

    // echo $region;
    echo json_encode($data);

?>