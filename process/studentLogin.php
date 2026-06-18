<?php
session_start();
include "../connection.php";

$email = $_POST['em'];
$password = $_POST['pw'];
$rememberMe = $_POST['rm'];

$student_rs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."' AND `password`='".$password."' ");
$student_num = $student_rs->num_rows;

if ($student_num == 0) {
    echo("invalid");
} else {

    $data = $student_rs->fetch_assoc();
    $_SESSION["u"] = $data;

    if($rememberMe == "true"){
        setcookie("email", $email, time() + (60 * 60 * 24 * 30), "/");
        setcookie("password", $password, time() + (60 * 60 * 24 * 30), "/");
    }

    echo("success");
}



?>