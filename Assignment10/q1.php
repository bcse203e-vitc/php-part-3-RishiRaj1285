<?php
// save as visits.php
$count = 1;
if (isset($_COOKIE['visits'])) {
    $count = intval($_COOKIE['visits']) + 1;
}
setcookie('visits', strval($count), time() + 3600, "/"); // expire in 1 hour
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Visit Counter</title></head>
<body>
  <h1>Welcome!</h1>
  <p>You have visited this page <strong><?= htmlspecialchars($count) ?></strong> <?= $count === 1 ? "time" : "times" ?>.</p>
</body>
</html>

