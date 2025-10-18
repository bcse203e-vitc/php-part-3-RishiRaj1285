<?php
session_start();
session_unset();
session_destroy();
header('Location: q2login.php');
exit;
?>
