<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chinese Zodiac for Loop</title>
<link rel="stylesheet" type="text/css" href="Styles.css" />
</head>
<body>
<?php
$Signs = array("Rat", "Ox", "Tiger", "Rabbit", "Dragon", "Snake",
               "Horse", "Goat", "Monkey", "Rooster", "Dog", "Pig");
$Pictures = array("images/Rat.png", "images/Ox.png", "images/Tiger.png",
                  "images/Rabbit.png", "images/Dragon.png", "images/Snake.png",
                  "images/Horse.png", "images/Goat.png", "images/Monkey.png",
                  "images/Rooster.png", "images/Dog.png", "images/Pig.png");
$StartYear = 1912;
$CurrentYear = date("Y");

echo "<table>";
echo "<tr>";
for ($i = 0; $i < 12; ++$i) {
    echo "<th>$Signs[$i]<br /><img src=\"$Pictures[$i]\" alt=\"$Signs[$i]\" /></th>";
}
echo "</tr>";

for ($Year = $StartYear; $Year <= $CurrentYear; ++$Year) {
    $Column = ($Year - $StartYear) % 12;
    if ($Column == 0)
        echo "<tr>";
    echo "<td>$Year</td>";
    if ($Column == 11)
        echo "</tr>";
}
// finish the last row if it is only partly filled
$Column = ($Year - $StartYear) % 12;
if ($Column != 0) {
    for ($i = $Column; $i < 12; ++$i)
        echo "<td>&nbsp;</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>