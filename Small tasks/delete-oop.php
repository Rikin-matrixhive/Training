<?php
class Dbconfig{
    public function __construct()
    {
        $this->conn =mysqli_connect("localhost","root","12345","Test_DB");
    }
}
class Deletedata extends Dbconfig{


    public function delete($id){
        $id = $_GET['id'];

$sql_query = "DELETE FROM employee where id = $id";
$delete_res = mysqli_query($this->conn, $sql_query);
if($delete_res == true){
    echo "Your data has been deleted";
}
else{
    echo "You can't delete this";
}
    }

}


$objects = new Deletedata();
$objects->delete($id);
