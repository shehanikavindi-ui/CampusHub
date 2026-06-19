<?php
session_start();
include "../connection.php";

$subject = $_POST['sub'];
$body = $_POST['bdy'];

if (!isset($_SESSION['u'])) {

    echo("Login Again");
    
} else {
    Database::iud("INSERT INTO `form` (`subject`, `body`, `student_id`) VALUES ('".$subject."', '".$body."', '".$_SESSION['u']['id']."') ");

    echo("success");

}


?>