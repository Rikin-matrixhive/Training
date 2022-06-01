<?php
$conn = mysqli_connect("localhost", "root","12345","Test_DB");
if($conn){
    echo "Connected";
}
else{
    echo "Connection Error";
}
