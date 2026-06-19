<?php
include "../connection.php";

$title = $_POST['title'];
$description = $_POST['desc'];
$date = $_POST['date'];
$start_time = $_POST['st_time'];
$end_time = $_POST['end_time'];
$location = $_POST['loc'];
$capacity = $_POST['capacity'];
$institute_id = $_POST['ins_id'];
$status = $_POST['status'];
$category_id = $_POST['cat_id'];

$banner_path = null;

if (isset($_FILES['banner_img']) && $_FILES['banner_img']['error'] === UPLOAD_ERR_OK) {

    $upload_dir = '../uploads/events/';

    $ext = pathinfo($_FILES['banner_img']['name'], PATHINFO_EXTENSION);
    $filename = uniqid('event_', true) . '.' . $ext;
    $target = $upload_dir . $filename;

    if (move_uploaded_file($_FILES['banner_img']['tmp_name'], $target)) {
        $banner_path = $filename;
    }
}

$banner_value = ($banner_path !== null) ? "'" . $banner_path . "'" : "NULL";

$q = "INSERT INTO `event`
(title, banner_img, description, date, start_time, end_time, location, institution_id, status, category_id, capacity)
VALUES
('" . $title . "', " . $banner_value . ", '" . $description . "', '" . $date . "', '" . $start_time . "', '" . $end_time . "', '" . $location . "', '" . $institute_id . "', '" . $status . "', '" . $category_id . "', '" . $capacity . "')";

Database::iud($q);

echo "success";
?>