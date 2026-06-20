<?php
session_start();
include "../connection.php";

if (!isset($_SESSION['a'])) {
    http_response_code(401);
    echo "Unauthorized";
    exit();
}

$event_id = isset($_POST['event_id']) ? intval($_POST['event_id']) : 0;

if ($event_id <= 0) {
    echo "Please select an event.";
    exit();
}

if (empty($_FILES['media_img']) || empty($_FILES['media_img']['name'][0])) {
    echo "Please select at least one photo to upload.";
    exit();
}

$upload_dir = "../uploads/event-gallery/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

$allowed_types = ['image/png', 'image/jpeg', 'image/webp'];
$max_size = 10 * 1024 * 1024;
$max_files = 10;

$names     = $_FILES['media_img']['name'];
$tmp_names = $_FILES['media_img']['tmp_name'];
$errs      = $_FILES['media_img']['error'];
$types     = $_FILES['media_img']['type'];
$sizes     = $_FILES['media_img']['size'];

$total = count($names);

if ($total > $max_files) {
    echo "You can only upload up to $max_files photos at a time.";
    exit();
}

$saved_paths = [];

for ($i = 0; $i < $total; $i++) {
    if ($errs[$i] !== UPLOAD_ERR_OK) {
        continue;
    }

    if (!in_array($types[$i], $allowed_types)) {
        echo "\"{$names[$i]}\" is not a supported image type.";
        exit();
    }

    if ($sizes[$i] > $max_size) {
        echo "\"{$names[$i]}\" exceeds the 10MB limit.";
        exit();
    }

    $ext = strtolower(pathinfo($names[$i], PATHINFO_EXTENSION));
    $ext = preg_replace('/[^a-z0-9]/', '', $ext); // strip anything unsafe
    $safe_name = uniqid('img_', true) . '.' . $ext;
    $destination = $upload_dir . $safe_name;

    if (!move_uploaded_file($tmp_names[$i], $destination)) {
        echo "Failed to save \"{$names[$i]}\".";
        exit();
    }

    $saved_paths[] = "uploads/event-gallery/" . $safe_name;
}

if (empty($saved_paths)) {
    echo "No valid images were uploaded.";
    exit();
}

Database::setUpConnection();

foreach ($saved_paths as $path) {
    $safe_path = Database::$connection->real_escape_string($path);
    $q = "INSERT INTO event_images (path, event_id) VALUES ('$safe_path', $event_id)";
    Database::iud($q);
}

echo ("success");

?>