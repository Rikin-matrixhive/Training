<?php
 class Dbconfig{
     public function _construct()
     {
         $this->conn=mysqli_connect("localhost","root","12345","Test_DB");
     }
 }
  class Persondata extends Dbconfig{
      public function delete($id){
          $id= $_GET['id'];
          $query = "DELETE FROM studentdetails WHERE id= $id";
          $delete = mysqli_query($this->conn, $query);
          if($delete){
              echo " delete data successfully";
          }else{
            echo "can't delete data successfully";
          }
  }
}
$obj = new Persondata();
$obj->delete($id);
?>