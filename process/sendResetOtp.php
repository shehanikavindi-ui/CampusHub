<?php
include "../connection.php";
include "../mailsending/SMTP.php";
include "../mailsending/PHPMailer.php";
include "../mailsending/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST['em'];

$student_rs = Database::search("SELECT * FROM `student` WHERE `email`='" . $email . "' ");
$student_num = $student_rs->num_rows;

if ($student_num == 1) {

    do {
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $otp_check_rs = Database::search("SELECT * FROM `student` WHERE `otp`='" . $otp . "'");
    } while ($otp_check_rs->num_rows > 0);

    Database::iud("UPDATE `student` SET `otp`='" . $otp . "' WHERE `email`='" . $email . "' ");

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'saskavindi20050115@gmail.com'; //sender's email
    $mail->Password = 'vjmxxfulkgeqnvxh'; //app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('saskavindi20050115@gmail.com', 'Reset Password');
    $mail->addReplyTo('saskavindi20050115@gmail.com', 'Reset Password');
    $mail->addAddress($email); //reciever's email
    $mail->isHTML(true);
    $mail->Subject = 'Verification code | Reset Password of Your Campus Hub Account';
    $bodyContent = '<p style="font-size:25px;">Your verification code is <b>' . $otp . '</b> </p>';
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo ("Verification sending failed");
    } else {
        echo ("sent");
    }

} else {

    echo ("not_found");
}
