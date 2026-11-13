<?php
$proverbFile = "proverbs.txt";
if (file_exists($proverbFile)) {
    $proverbs = file($proverbFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $ProverbCount = count($proverbs);
    if ($ProverbCount > 0) {
        $randomIndex = rand(0, $ProverbCount - 1);
        echo "<p>A randomly displayed Chinese proverb read from a text file:</p>\n";
        echo "<p><em>" . htmlspecialchars($proverbs[$randomIndex]) . "</em></p>\n";
    }
}
?>
<p>&copy; <?php echo date("Y"); ?> The Chinese Zodiac Project</p>