<?php
include "../connection.php";

$email = $_POST['em'];
$otp = $_POST['otp'];

$otp_rs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."' AND `otp`='".$otp."' ");
$otp_num = $otp_rs->num_rows;

if ($otp_num == 1) {
    echo("valid");
}


?>