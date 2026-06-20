<?php
include "../connection.php";

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$institution_id = $_POST['institution_id'] ?? '';

try {
    $q = "INSERT INTO admin (name, email, password, institution_id)
          VALUES ('$name', '$email', '$password', '$institution_id')";

    Database::iud($q);

    echo "success";
} catch (Exception $e) {
    echo "error";
}
?>