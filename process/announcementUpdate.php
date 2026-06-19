<?php
include "../connection.php";

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$category = $_POST['category_id'] ?? '';
$institution = $_POST['institution_id'] ?? '';

try {
    $query = "
        UPDATE announcements SET
            title = '$title',
            description = '$description',
            category_id = '$category',
            institution_id = '$institution'
        WHERE id = '$id'
    ";

    Database::iud($query);

    echo "success";
} catch (Exception $e) {
    echo "error";
}
?>