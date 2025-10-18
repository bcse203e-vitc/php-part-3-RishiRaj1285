<?php
$to = "receiver@example.com";
$subject = "Test Email with Attachment (Simulation)";
$message = "This is a test email with an attachment.\n\nSent from localhost (simulated).";
$filePath = __DIR__ . '/test.pdf'; // Place any file here if you want to show as attachment

$boundary = md5(time());
$headers = "From: sender@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

$body  = "--{$boundary}\r\n";
$body .= "Content-Type: text/plain; charset=UTF-8\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$body .= $message . "\r\n\r\n";

if (file_exists($filePath)) {
    $content = chunk_split(base64_encode(file_get_contents($filePath)));
    $fname = basename($filePath);
    $body .= "--{$boundary}\r\n";
    $body .= "Content-Type: application/octet-stream; name=\"{$fname}\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment; filename=\"{$fname}\"\r\n\r\n";
    $body .= $content . "\r\n\r\n";
}

$body .= "--{$boundary}--";

echo "<h2>Email Sent Successfully</h2>";
echo "<p><strong>To:</strong> " . htmlspecialchars($to) . "</p>";
echo "<p><strong>Subject:</strong> " . htmlspecialchars($subject) . "</p>";
echo "<h3>Message Body:</h3>";
echo "<pre>" . htmlspecialchars($message) . "</pre>";

if (file_exists($filePath)) {
    echo "<p><strong>Attachment included:</strong> " . htmlspecialchars(basename($filePath)) . "</p>";
} else {
    echo "<p><strong>No attachment found at:</strong> " . htmlspecialchars($filePath) . "</p>";
}

echo "<h3>Raw MIME Message:</h3>";
echo "<pre>" . htmlspecialchars($body) . "</pre>";
?>
