<?php
require_once "../connection.php";

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo "Missing announcement id";
    exit;
}

$id = $_GET["id"];


if (!is_numeric($id)) {
    http_response_code(400);
    echo "Invalid announcement id";
    exit;
}

$query = "DELETE FROM announcements WHERE id = '$id'";
Database::iud($query);

echo "success";
?>