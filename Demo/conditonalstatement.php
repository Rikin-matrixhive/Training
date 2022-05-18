<?php
// if and else statement

$hour = date("H");
if ($hour < "20") {
    echo "Have a good day";
} else {
    echo "Good evning";
}
echo "<br>";
//if else-if and else
if ($hour < "20") {
    echo "Have a good day";
} elseif ($hour > "20") {
    echo "Good evning";
} else {
    echo "Sorry your data is not found";
}
echo "<br>";


// switch case
$age = 22;
switch ($age) {
    case '18':
        echo "Your age is 18";
        break;
    case '22':
        echo "Your age is 22";
        break;
    case '45':
        echo "Your age is 45";
        break;

    default:
        echo "No data found";
        break;
}
