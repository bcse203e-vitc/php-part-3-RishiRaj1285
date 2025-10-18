<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    if (!empty($_POST['remember'])) {
        setcookie('username', $username, time() + 86400 * 30, "/"); // 30 days
    } else {
        setcookie('username', '', time() - 3600, "/");
    }
    $message = "Preferences saved.";
}
$stored = $_COOKIE['username'] ?? '';
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Remember Me</title></head>
<body>
  <h2>Hello, <?= htmlspecialchars($stored ?: 'Guest') ?></h2>
  <?php if (!empty($message)) echo "<p>$message</p>"; ?>
  <form method="post">
    Username: <input name="username" value="<?= htmlspecialchars($stored) ?>"><br>
    Remember Me: <input type="checkbox" name="remember" <?= $stored ? 'checked' : '' ?>><br>
    <button type="submit">Save</button>
  </form>
</body>
</html>
