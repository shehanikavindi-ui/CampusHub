<?php
include "../connection.php";

$id = $_POST['id'];

$title = $_POST['title'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];
$location = $_POST['location'];
$category = $_POST['category'];
$institution = $_POST['institution'];
$status = $_POST['status'];

$imgQuery = "";

if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {

    $upload_dir = "../uploads/events/";

    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

    // SAME FORMAT AS CREATE
    $filename = uniqid("event_", true) . "." . $ext;

    $target = $upload_dir . $filename;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
        $imgQuery = ", `banner_img` = '$filename'";
    }
}

$query = "
UPDATE event SET
title = '$title',
date = '$date',
start_time = '$start',
end_time = '$end',
location = '$location',
category_id = '$category',
institution_id = '$institution',
status = '$status'
$imgQuery
WHERE id = '$id'
";

Database::iud($query);

echo "success";
?>