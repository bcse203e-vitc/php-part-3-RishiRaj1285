<?php
session_start();
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['captcha'] ?? '';
    if (isset($_SESSION['captcha']) && strval($_SESSION['captcha']) === trim($input)) {
        $msg = "CAPTCHA correct.";
    } else {
        $msg = "CAPTCHA incorrect. Try again.";
    }
    // regenerate server-side captcha if required
}
?>
<!doctype html>
<html>
<body>
  <h2>Enter CAPTCHA</h2>
  <?php if ($msg) echo "<p>$msg</p>"; ?>
  <form method="post">
    <img src="q4captcha.php" alt="CAPTCHA"><br>
    <input name="captcha" placeholder="Enter numbers"><br>
    <button type="submit">Verify</button>
  </form>
</body>
</html>
