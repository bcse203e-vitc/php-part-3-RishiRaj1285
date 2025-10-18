<?php
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

    $file = $_FILES['file'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $name = basename($file['name']);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];
        if (!in_array($ext, $allowed)) {
            $msg = "Invalid file type.";
        } else {
            $target = $uploadDir . time() . "_" . preg_replace('/[^A-Za-z0-9._-]/', '_', $name);
            if (move_uploaded_file($file['tmp_name'], $target)) {
                $msg = "Upload successful.";
                $uploadedUrl = 'uploads/' . basename($target);
            } else {
                $msg = "Upload failed.";
            }
        }
    } else {
        $msg = "Upload error code: " . $file['error'];
    }
}
?>
<!doctype html><html><body>
  <h2>Upload Image</h2>
  <?php if ($msg) echo "<p>$msg</p>"; ?>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept="image/*"><br>
    <button type="submit">Upload</button>
  </form>
  <?php if (!empty($uploadedUrl)) echo "<h3>Preview:</h3><img src=\"{$uploadedUrl}\" style=\"max-width:300px;\">"; ?>
</body></html>
