<?php
include 'config.php';
$id = $_GET['id'];


    $del_queery = "DELETE FROM employee where id = $id";
    $result = mysqli_query($conn, $del_queery);

    if($result){
        echo "Your Data has been deleted";
    }
    else{
        echo "You can't delete this";

    }
