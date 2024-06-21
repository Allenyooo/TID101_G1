<?php

include("conn.php");

$account = htmlspecialchars($_POST["account"]);
$pw = htmlspecialchars($_POST["password"]);

$sql = "SELECT * FROM member WHERE Account=? AND PWD=?";

$statement = $pdo->prepare($sql);

$statement->bindValue(1, $account);
$statement->bindValue(2, $pw);

$statement->execute();

$data = $statement->fetchAll();

if(count($data) > 0){
    session_start();
    $_SESSION["account"] = $account;
    exit; // Ensure the script exits after the redirect
}else{
    // echo "帳號或密碼錯誤！";
}

?>