<?php
// while loops
$number = 22;
while($number > 20){
echo "your condition is true";
break;
}
// do and while

$num=1;

do{
    echo "<br>";

    echo $num;
    echo "<br>";
    $num++;
}
while($num <= 5);
// for loop

for($x= 0; $x<=5;$x++){
    echo "<br>";
    echo $x;
}

// for each loops

$cars = array("Audi q7","MG celeton", "Honda city");
foreach($cars as $values){
    echo "<br>";

    echo $values;
}
?>