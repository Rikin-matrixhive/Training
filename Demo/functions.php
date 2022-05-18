<?php declare (strict_types = 1);

// function without argument 
function demofunction(){
$names = "Rikin";
echo $names;
}
demofunction();
//function without argument
echo "<br>";
function newfun($surname,$age){
echo "$surname rathod $age";
}
newfun("Rikin","23");

// using strict

function setheight(int $minheight=50){
    echo $minheight . "<br>";
    return $minheight;


}
setheight(100);
setheight();
setheight(250);
setheight(300);
setheight(900);
setheight(400);

?>