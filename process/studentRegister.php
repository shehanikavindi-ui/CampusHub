<?php
session_start();
include "../connection.php";

$firstname = $_POST['fn'];
$lastname = $_POST['ln'];
$dob = $_POST['dob'];
$gender = $_POST['g'];
$email = $_POST['em'];
$phone = $_POST['ph'];

$studentID = $_POST['sid'];
$institute = $_POST['in'];
$faculty = $_POST['fac'];
$programme = $_POST['pr'];
$yearOfStudy = $_POST['yos'];

$password = $_POST['pw'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "invalid email";
    exit;
}

$student_rs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."'");
if($student_rs->num_rows > 0) {
    echo "exists";
    exit;
}

$pfp_path = null; // default if no photo uploaded

if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = '../uploads/profiles/';
    $ext = pathinfo($_FILES['pfp']['name'], PATHINFO_EXTENSION);
    $filename = uniqid('pfp_', true) . '.' . $ext;
    $target = $upload_dir . $filename;

    if (move_uploaded_file($_FILES['pfp']['tmp_name'], $target)) {
        $pfp_path = $filename;
    }

}

$pfp_value = ($pfp_path !== null) ? "'".$pfp_path."'" : "NULL";

Database::iud("INSERT INTO `student` (`fname`, `lname`, `dob`, `email`, `mobile`, `studentID`, `password`, 
                `institution_id`, `gender_id`, `pfp`, `yearOfStudy_id`, `course_id`) 
               VALUES ('".$firstname."', '".$lastname."', '".$dob."', '".$email."',
               '".$phone."', '".$studentID."', '".$password."', '".$institute."', 
               '".$gender."', ".$pfp_value.", '".$yearOfStudy."', '".$programme."')");

$new_student = Database::search("SELECT * FROM `student` WHERE `email`='".$email."'");
$student_data = $new_student->fetch_assoc();

$_SESSION['student_id'] = $student_data['id'];
$_SESSION['student_name'] = $student_data['fname'];
$_SESSION['student_email'] = $student_data['email'];

echo ("success");
?>