<?php
session_start();
if (!isset($_SESSION['user'])) $_SESSION['user'] = null;

$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_SESSION['user'] ?? 'Guest';
    $feedback = trim($_POST['feedback'] ?? '');
    if ($feedback !== '') {
        $msg = "Feedback from $name:\n\n" . $feedback;
        if (mail("admin@vit.ac.in", "Student Feedback", $msg, "From: noreply@vit.ac.in")) {
            $result = "Thank you, $name. Feedback sent!";
        } else {
            $result = "Feedback saved but mail failed (check server).";
        }
    } else {
        $result = "Please write feedback.";
    }
}
?>
<!doctype html><html><body>
  <h2>Feedback</h2>
  <?php if ($result) echo "<p>$result</p>"; ?>
  <form method="post">
    <textarea name="feedback" rows="6" cols="40" placeholder="Your feedback"></textarea><br>
    <button type="submit">Send Feedback</button>
  </form>
</body></html>
