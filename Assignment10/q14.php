<?php
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "example@domain.com";
    $sub = "Contact Form Message";
    $msgBody = "From: " . ($_POST['email'] ?? 'anonymous') . "\n\n" . ($_POST['message'] ?? '');
    $headers = "From: " . ($_POST['email'] ?? 'no-reply@domain.com') . "\r\n";
    if (mail($to, $sub, $msgBody, $headers)) {
        $msg = "Mail Sent!";
    } else {
        $msg = "Mail failed (check server).";
    }
}
?>
<!doctype html><html><body>
  <h2>Contact Us</h2>
  <?php if ($msg) echo "<p>$msg</p>"; ?>
  <form method="post">
    Your email: <input name="email"><br>
    Message:<br><textarea name="message"></textarea><br>
    <button type="submit">Send</button>
  </form>
</body></html>
