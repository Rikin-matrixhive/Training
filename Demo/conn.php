<?php
// connection using oop

$servername= "localhost";
$username= "root";
$pass= "12345";
$db = "myDB";

// $conn= new mysqli($servername,$username,$pass,$db);

// if($conn->connect_error){
//     die("connection failed".$conn->connect_error);
// }
// else{
//     echo "Connected";

// }

// using PDO

try{
    $conn= new PDO("mysql:host=$servername;dbname=$db", $username,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected";
}
catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();

    }

?>  