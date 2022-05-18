<?php


//function
function mycallback($item){
return strlen($item);
}

$strings = ["Audi","BMW","MG", "Mini cooper"];
$length=array_map("mycallback", $strings);
print_r($length);

//another methods

$strings = ["Audi","BMW","MG", "Mini cooper"];
$length =array_map(function($item){return strlen($item);},$strings);
print_r($length);

// user defined function
function exfun1($str){
    return $str . "!";
}
function exfun2($str){
    return $str ."?";
}
function allexample($str,$format){
echo $format($str);
}
allexample("Hello ", "exfun1");
allexample("Rikin ", "exfun2");


?>


