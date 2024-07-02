<?php
// Establish database connection
// $db_host = "127.0.0.1";
// $db_user = "root";
// $db_pass = "passwordpassword";
// $db_select = "TID101_G1";

include '../conn.php';

$dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
$pdo = new PDO($dsn, $db_user, $db_pass);

// Check connection
if ($pdo) {
  echo "Connected to the database successfully!";
} else {
  echo "Failed to connect to the database!";
}

// Loop through the files sent in the request
foreach ($_FILES as $file) {
  // Get the file contents
  $photo = file_get_contents($file['tmp_name']);

  // Get the maximum ID from the PHOTO table
  $stmt = $pdo->prepare("SELECT MAX(ID) as max_id FROM PHOTO");
  $stmt->execute();
  $max_id = $stmt->fetchColumn() + 1;

  // Insert the data into the PHOTO table
  $stmt = $pdo->prepare("INSERT INTO PHOTO (ID, ADDRESS, REVIEW_ID, PHOTO) VALUES (:id, :address, :review_id, :photo)");
  $stmt->bindParam(':id', $max_id);
  $stmt->bindParam(':address', $address); // assume the address is available
  $stmt->bindParam(':review_id', $review_id); // assume the review ID is available
  $stmt->bindParam(':photo', $photo, PDO::PARAM_LOB);
  $stmt->execute();
}

?>