<?php
$servername= "localhost";
$username = "root";
$password = "12345";
$conn = mysqli_connect($servername,$username,$password);
$sql = "CREATE DATABASE employee"   ;
$res = mysqli_query($conn,$sql);
if($res === TRUE){
 echo "Database has been created";
}
else{
    echo "Database is not created";

}

?>