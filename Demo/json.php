<?php
// json encode
$age = array("Sahebaj" => "25","Rikin"=>"24", "Noman" => "18", "Faizal"=> "20");
echo json_encode($age);
echo "<br>";
echo "<br>";

// json decode 


$carjson = '{"Honda":"City","Mahindra":"Thar","Sujuki":"Ciaz"}';
var_dump(json_decode($carjson));
echo "<br>";
echo "<br>";

// accesing object values 
$bikesjson = '{"Honda":"Hornet","Tvs":"Apache","Bajaj":"Dominar400"}';
$newobj = json_decode($bikesjson);
echo $newobj->Honda;
echo $newobj->Tvs;
echo $newobj->Bajaj;
echo "<br>";
echo "<br>";

// assocative array
$mobilejsson = '{"Apple":"Iphone 13 pro max","Oneplus":"Nord 2","Realme":"Neo GT2"}';
$newobj = json_decode($mobilejsson,true);
echo $newobj["Apple"];
echo $newobj["Oneplus"];
echo $newobj["Realme"];


// json using loops

$dummyjson= '{
    "userId": 1,
    "id": 1,
    "title": "delectus aut autem",
    "completed": false
  }
';
$myarr = json_decode($dummyjson,true);

foreach($myarr as $ker => $value){
    echo $key . $value ."<br>";

}
?>