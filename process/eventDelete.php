<?php
require_once "../connection.php";

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo "Missing event id";
    exit;
}

$id = $_GET["id"];


if (!is_numeric($id)) {
    http_response_code(400);
    echo "Invalid event id";
    exit;
}

$query = "DELETE FROM event WHERE id = '$id'";
Database::iud($query);

echo "success";
?>