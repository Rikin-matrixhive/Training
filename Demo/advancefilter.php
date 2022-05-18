<?php
$int = 122;
$min = 1;
$max = 300;

// if(filter_var($int, FILTER_VALIDATE_INT, array("options"=>array("min_range"=>$min, "max_range"=> $max)))===FALSE){
//     echo "Variable value not beetween legal range";
// }
// else{
//     echo "Variable value  beetween legal range";
// }


// for validating ipv6
// $ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";
// if(!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)=== FALSE){
//     echo "Valid ipv6 address";
// }
// else{
//     echo "Not a Valid ipv6 address";
// }


// validating url with query string

// $url = "https://www.w3schools.com";
// if(!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)=== false){
//      echo "It is a valid url";

// }
// else{
//     echo "It is a not a valid url";
// }

// remove charecter from ascii values

$str = "<h1> Hello world</h1>";
$newstr = filter_var($str,  FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
echo $newstr;

?>

<h1>Hello wold</h1>