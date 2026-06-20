<?php
require_once "../connection.php";

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo "Missing admin id";
    exit;
}

$id = $_GET["id"];


if (!is_numeric($id)) {
    http_response_code(400);
    echo "Invalid admin id";
    exit;
}

$query = "DELETE FROM admin WHERE id = '$id'";
Database::iud($query);

echo "success";
?>