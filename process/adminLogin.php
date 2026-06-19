<?php
session_start();
include "../connection.php";

$email = $_POST['em'];
$password = $_POST['pw'];

$admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."' AND `password`='".$password."' ");
$admin_num = $admin_rs->num_rows;

if ($admin_num == 0) {
    echo("invalid");
} else {

    $admin_data = $admin_rs->fetch_assoc();
    $_SESSION["a"] = $admin_data;

    echo("success");
}

?>