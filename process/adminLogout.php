<?php
session_start();
session_unset();
session_destroy();

header("Location: ../auth/adminLogin.php");
exit();
?>