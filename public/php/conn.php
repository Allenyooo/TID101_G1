<?php

    header('Access-Control-Allow-Origin: *');

    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE");

    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    //MySQL相關資訊
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "password";
    $db_select = "TID101_G1";

    // $db_host = "127.0.0.1";
    // $db_user = "tibamefe_since2021";
    // $db_pass = "vwRBSb.j&K#E";
    // $db_select = "tibamefe_tid101g1";

    //建立資料庫連線物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";

    //建立PDO物件，並放入指定的相關資料
    $pdo = new PDO($dsn, $db_user, $db_pass);


    // try {
        // $pdo = new PDO("mysql:host=$db_host;dbname=$db_select", $db_user, $db_pass);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully"; 
    // }
    // catch(PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage();
    // }

?>