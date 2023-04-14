<!-- manager_logout.php -->
<?php
session_start();
session_unset();
session_destroy();
header("Location: manager_login.php");
exit;
?>
