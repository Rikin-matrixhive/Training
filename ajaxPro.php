<?php 

class dbconn{
    public $mysqli;
function connect(){
$mysqli = mysqli_connect("localhost","root","12345","country_city_statedetails");

}

function updaterow(){
$position = $_POST['position'];


$i=1;
foreach($position as $k=>$v){
    $mysqli = mysqli_connect("localhost","root","12345","country_city_statedetails");

    $sql = "Update sorting_items SET position=".$i." WHERE id=".$v;
    $res=mysqli_query($mysqli,$sql);


	$i++;
}
}
}

$conn = new dbconn();
$conn->connect();

$conn->updaterow();
