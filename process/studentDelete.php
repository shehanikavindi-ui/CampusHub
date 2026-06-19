<?php
require_once "../connection.php";

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo "Missing student id";
    exit;
}

$id = $_GET["id"];

// basic validation
if (!is_numeric($id)) {
    http_response_code(400);
    echo "Invalid student id";
    exit;
}

$query = "DELETE FROM student WHERE id = '$id'";
Database::iud($query);

echo "success";
?>