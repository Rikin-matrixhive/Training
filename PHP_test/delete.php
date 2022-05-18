<?php
include("config.php");
if(isset($_GET['id'])){
$userid = $_GET['id'];
$sql =mysqli_query($conn,"SELECT * FROM employeedetails where id = $userid");
$row=mysqli_fetch_array($sql);
echo $row['profiles'];
$delquery ="DELETE FROM employeedetails WHERE id = $userid ";
$res = mysqli_query($conn,$delquery);
if($res == true){
    unlink("profile/".$row['profiles']);

    echo "deleted";
    header('Location:viewdetails.php');
}

else{
    echo "Not deleted";

}
}
?>