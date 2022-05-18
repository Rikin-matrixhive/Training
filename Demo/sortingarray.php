<?php
// sort and rsort 
$cars = array("Volvo", "BMW", "Toyota");

asort   ($cars);
$check = count($cars);
for($x = 0; $x<$check;$x++){
 echo $cars[$x];
}
echo "<br>";
// asort and ksort
$bikes = array("name"=> "CB hornet","Price"=> "9000000");
ksort($bikes);

foreach($bikes as $x => $x_value){
echo $x.$x_value;
}
?>








<!-- 


sort() - sort arrays in ascending order
rsort() - sort arrays in descending order
asort() - sort associative arrays in ascending order, according to the value
ksort() - sort associative arrays in ascending order, according to the key
arsort() - sort associative arrays in descending order, according to the value
krsort() - sort associative arrays in descending order, according to the key -->