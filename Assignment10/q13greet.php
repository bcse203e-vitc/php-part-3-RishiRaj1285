<?php
session_start();
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "Student";
}
?>
<!doctype html><html><body>
  <h1>Hello, <?= htmlspecialchars($_SESSION['name']) ?>! Welcome to the PHP lab.</h1>
  <form method="post" action="q13setname.php">
    Change name: <input name="name"><button type="submit">Set</button>
  </form>
</body></html>
