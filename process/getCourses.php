<?php
include "../connection.php";

if (!isset($_GET['faculty_id']) || empty($_GET['faculty_id'])) {
    echo json_encode([]);
    exit;
}

$faculty_id = $_GET['faculty_id'];

$rs = Database::search("SELECT id, name FROM `course` WHERE `faculty_id` = '".$faculty_id."'");

$courses = [];
while ($row = $rs->fetch_assoc()) {
    $courses[] = $row;
}

header('Content-Type: application/json');
echo json_encode($courses);
?>