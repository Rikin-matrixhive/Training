<?php
$servername= "localhost";
$username = "root";
$password = "12345";
$db = "employee";   
$conn = mysqli_connect($servername,$username,$password,$db);
$sql = "CREATE TABLE emp_details1(
    id int (11) AUTO_INCREMENT,
    name varchar(30),
    email varchar(30),
    mobile varchar(30),
    gender varchar (30),
    apply varchar (30),
    image varchar (50),
    resumes varchar (50),
    applyfor varchar(50),
    address varchar(50),
    pass varchar(50),
    PRIMARY KEY(id)
    )"   ;
$res = mysqli_query($conn,$sql);
if($res === TRUE){
 echo "Database has been created";
}
else{
    echo "Database is not created";

}

?>