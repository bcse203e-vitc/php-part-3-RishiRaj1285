<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: q2login.php');
    exit;
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Welcome</title></head>
<body>
  <h1>Welcome, <?= htmlspecialchars($_SESSION['user']) ?></h1>
  <p><a href="q2logout.php">Logout</a></p>
</body>
</html>
