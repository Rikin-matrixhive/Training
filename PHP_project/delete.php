<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db = "employee";
$connect = mysqli_connect($servername, $username, $password, $db);


if(isset($_GET['id'])){
$userid = $_GET['id'];
$sql= mysqli_query($connect,"DELETE FROM emp_details WHERE id= $userid");
if($sql == true){
   echo "Data deleted";
}
else{
    echo "Data Not deleted";
 }
}
