<?php
include "../connection.php";

$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$institute_id = $_POST['institute_id'] ?? '';
$category_id = $_POST['category_id'] ?? '';

$date = date("Y-m-d");

try {
    $q = "INSERT INTO announcements (title, description, institution_id, category_id, date)
          VALUES ('$title', '$description', '$institute_id', '$category_id', '$date')";

    Database::iud($q);

    echo "success";
} catch (Exception $e) {
    echo "error";
}
?>