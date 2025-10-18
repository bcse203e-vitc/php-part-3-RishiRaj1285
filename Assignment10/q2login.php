<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    if ($user === 'admin' && $pass === '1234') {
        $_SESSION['user'] = 'admin';
        header('Location: q2welcome.php');
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Login</title></head>
<body>
  <h2>Login</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>".htmlspecialchars($error)."</p>"; ?>
  <form method="post">
    Username: <input name="user"><br>
    Password: <input name="pass" type="password"><br>
    <button type="submit">Login</button>
    <br><br><br>
    <div>
        test credentials: admin / 1234
    </div>
  </form>
</body>
</html>
