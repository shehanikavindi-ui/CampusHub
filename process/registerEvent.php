<?php
session_start();
include "../connection.php";

$eventID = $_POST['ei'];
$studentID = $_SESSION['u']['id'];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d");

Database::iud("INSERT INTO `registration` (`date`, `student_id`, `event_id`) 
                VALUES ('" . $date . "', '" . $studentID . "', '" . $eventID . "')");
echo("success");

?>