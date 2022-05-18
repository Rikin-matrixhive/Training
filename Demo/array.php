<?php
// indexed array
$games = array("COD", "BGMI", "COC","Apex legends");
echo $games[0]." ".$games[1]." ".$games[2]." ".$games[3];

// Assocative array

echo "<br>";

$phones = array("Iphone 13 pro max"=> "1,50,00000","Oneplus 9 pro" =>"47,000", "POCO x4"=>"30,000");
echo $phones['Iphone 13 pro max'];

// multidimetional array
echo "<br>";

$bikes = array(
array("CB shine","Karizma","R15"),
array("CB Hornet","Tvs apache","CB shine SP")
);
echo $bikes[0][0].",". $bikes[0][1] .",". $bikes [0][2];
echo "<br>";

echo $bikes[1][1].",". $bikes[1][1] .",". $bikes [1][2];

// sorting

?>