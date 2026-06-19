<?php
session_start();
include "../connection.php";

if (!isset($_FILES['pfp']) || $_FILES['pfp']['error'] !== UPLOAD_ERR_OK) {
    echo "No file received.";
    exit;
}

$tmpPath = $_FILES['pfp']['tmp_name'];
$originalName = $_FILES['pfp']['name'];
$ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

$allowed = ['jpg', 'jpeg', 'png', 'webp'];
if (!in_array($ext, $allowed)) {
    echo "Invalid file type. Only JPG, PNG, and WEBP are allowed.";
    exit;
}

$newFileName = uniqid('pfp_', true) . '.' . $ext;
$destination = __DIR__ . '/uploads/profiles/' . $newFileName;

if (!move_uploaded_file($tmpPath, $destination)) {
    echo "Upload failed.";
    exit;
}

$studentId = $_SESSION['u']['id'];
$q = "UPDATE student SET pfp = '" . $newFileName . "' WHERE id = '" . $studentId . "'";
Database::search($q);

echo "success";

?>