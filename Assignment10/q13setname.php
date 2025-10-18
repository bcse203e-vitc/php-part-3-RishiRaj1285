<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
    $_SESSION['name'] = strip_tags($_POST['name']);
}
header('Location: q13greet.php');
exit;
?>
