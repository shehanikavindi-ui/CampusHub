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

// image handling
$imgQuery = "";

if (isset($_FILES["image"])) {

    $img = $_FILES["image"]["name"];
    $tmp = $_FILES["image"]["tmp_name"];

    $path = "../uploads/events/" . $img;

    move_uploaded_file($tmp, $path);

    $imgQuery = ", `banner_img` = '$img'";
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