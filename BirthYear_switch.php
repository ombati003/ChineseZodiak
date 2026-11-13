<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Birth Year Zodiac (Switch)</title>
</head>
<body>
<h2>Chinese Zodiac Sign Calculator</h2>
<?php
$showForm = true;
$output = "";

if (isset($_POST['submit'])) {
    $year = trim($_POST['birth_year']);
    if (empty($year) || !is_numeric($year)) {
        $output = "<p>You must enter a valid numeric birth year.</p>\n";
    } else {
        $showForm = false;
        $year = intval($year);
        $remainder = $year % 12;
        $sign = "";
        $image = "";

        // Switch statement to determine zodiac sign
        switch ($remainder) {
            case 0:
                $sign = "Monkey";
                $image = "images/Monkey.jpg";
                break;
            case 1:
                $sign = "Rooster";
                $image = "images/Rooster.jpg";
                break;
            case 2:
                $sign = "Dog";
                $image = "images/Dog.jpg";
                break;
            case 3:
                $sign = "Pig";
                $image = "images/Pig.jpg";
                break;
            case 4:
                $sign = "Rat";
                $image = "images/Rat.jpg";
                break;
            case 5:
                $sign = "Ox";
                $image = "images/Ox.jpg";
                break;
            case 6:
                $sign = "Tiger";
                $image = "images/Tiger.jpg";
                break;
            case 7:
                $sign = "Rabbit";
                $image = "images/Rabbit.jpg";
                break;
            case 8:
                $sign = "Dragon";
                $image = "images/Dragon.jpg";
                break;
            case 9:
                $sign = "Snake";
                $image = "images/Snake.jpg";
                break;
            case 10:
                $sign = "Horse";
                $image = "images/Horse.jpg";
                break;
            default:
                $sign = "Goat";
                $image = "images/Goat.jpg";
                break;
        }

        $output .= "<p>You were born under the sign of the <strong>$sign</strong>.</p>\n";
        $output .= "<p><img src=\"$image\" alt=\"$sign\" width=\"100\" height=\"100\" /></p>\n";

        // Track visitor counter in statistics subdirectory
        $statsDir = "statistics";
        if (!is_dir($statsDir)) {
            mkdir($statsDir, 0755, true);
        }
        $statFile = $statsDir . "/year_" . $year . ".txt";
        $count = 1;
        if (file_exists($statFile)) {
            $handle = fopen($statFile, "r+");
            if ($handle) {
                $count = intval(fgets($handle)) + 1;
                rewind($handle);
                fwrite($handle, $count);
                fclose($handle);
            }
        } else {
            $handle = fopen($statFile, "w");
            if ($handle) {
                fwrite($handle, $count);
                fclose($handle);
            }
        }
        $output .= "<p>You are visitor $count to enter $year.</p>\n";
    }
}

if ($showForm) {
?>
<form method="POST" action="">
    <p>Enter your birth year: <input type="text" name="birth_year" /></p>
    <p><input type="submit" name="submit" value="Calculate Zodiac" /></p>
</form>
<?php
} else {
    echo $output;
    echo '<p><a href="">Calculate Another Year</a></p>';
}
?>
</body>
</html>