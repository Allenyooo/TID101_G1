<?php
// review.php 同一個from表單內的功能(評論、星級+新增照片

// Establish database connection
$db_host = "127.0.0.1";
$db_user = "root";
// $db_pass = "passwordpassword";
$db_pass = "password";
$db_select = "TID101_G1";

// 建立資料庫連線物件
$dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
$pdo = new PDO($dsn, $db_user, $db_pass);

// Check connection
if ($pdo) {
  echo "Connected to the database successfully!";
} else {
  echo "Failed to connect to the database!";
}

// Check if required data is set
if (!isset($_COOKIE['memberId']) ||!isset($_POST['rating']) ||!isset($_POST['content'])) {
    echo "Error: Missing required data";
    exit;
}

// Get the member ID from the cookie
$memberId = $_COOKIE['memberId'];

// Set the store ID to 1 by default
$storeId = 1;

// Get the form data from the request
$rating = $_POST['rating'];
$content = $_POST['content'];

// Insert the review into the database
$stmt = $pdo->prepare("INSERT INTO REVIEW (STORE_ID, MEMBER_ID, RATING, CONTENT) VALUES (:storeId, :memberId, :rating, :content)");
$stmt->bindParam(':storeId', $storeId);
$stmt->bindParam(':memberId', $memberId);
$stmt->bindParam(':rating', $rating);
$stmt->bindParam(':content', $content);
$stmt->execute();

// Get the review ID from the last inserted review
$reviewId = $pdo->lastInsertId();

// Loop through the files sent in the request
for ($i = 1; $i <= 6; $i++) {
    $fileKey = "photo_$i";
    if (isset($_FILES[$fileKey])) {
      $file = $_FILES[$fileKey];
      // Get the file contents
      $photo = file_get_contents($file['tmp_name']);
  
      // Insert the photo data into the PHOTO table
      $stmt = $pdo->prepare("INSERT INTO PHOTO (ID, ADDRESS, REVIEW_ID, PHOTO) VALUES (:id, :address, :reviewId, :photo)");
      $stmt->bindParam(':id', null, PDO::PARAM_INT);
      $stmt->bindParam(':address', $storeId); // assume the store ID is the address
      $stmt->bindParam(':reviewId', $reviewId);
      $stmt->bindParam(':photo', $photo, PDO::PARAM_LOB);
      $stmt->execute();
    }
  }

// Close the database connection
$pdo = null;
?>