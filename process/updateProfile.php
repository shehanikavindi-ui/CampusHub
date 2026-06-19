<?php
session_start();
include "../connection.php";

$email = $_SESSION['u']['email'];

$firstname = $_POST['fn'];
$lastname = $_POST['ln'];
$phone = $_POST['p'];
$dob = $_POST['dob'];
$year = $_POST['y'];

Database::iud("UPDATE `student` SET `fname`='" . $firstname . "',`lname`='" . $lastname . "',
          `dob`='" . $dob . "',`mobile`='" . $phone . "',`yearOfStudy_id`='" . $year . "'
           WHERE `email`='" . $email . "' ");
           
echo("success");

?>