<?php
$name = "Rikin";


// for global 

function name(){

}
name();

echo $name;
// for local


function local2(){
$age = 24;
echo "<br>". $age;
}
local2();

// for static

function staticfun(){
static $num = 0;
echo "<br>".$num;
$num ++;

}
staticfun();
staticfun();
staticfun();
staticfun();
staticfun();
staticfun();
    
?>

