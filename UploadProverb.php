<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Upload Proverb</title>
</head>
<body>
<h2>Add a Chinese Proverb</h2>
<?php
$proverbFile = "proverbs.txt";

if (isset($_POST['submit'])) {
    $proverbText = trim($_POST['proverb']);
    if (!empty($proverbText)) {
        $fileHandle = fopen($proverbFile, "ab");
        if ($fileHandle && is_writable($proverbFile)) {
            if (fwrite($fileHandle, $proverbText . "\n")) {
                echo "<p>Thank you! Your proverb has been successfully added.</p>\n";
            } else {
                echo "<p>Error writing to the proverbs file.</p>\n";
            }
            fclose($fileHandle);
        } else {
            echo "<p>Cannot open or write to the proverbs file.</p>\n";
        }
    } else {
        echo "<p>Please enter a proverb before submitting.</p>\n";
    }
}
?>
<form method="POST" action="">
    <p>Enter a Chinese Proverb:<br />
    <textarea name="proverb" rows="4" cols="50"></textarea></p>
    <p><input type="submit" name="submit" value="Add Chinese Proverb" /></p>
</form>
</body>
</html>