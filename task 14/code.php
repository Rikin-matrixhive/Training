<?php
class Ajaxcalls
{

    private $servarname = "localhost";
    private $username = "root";

    private $password = "12345";

    private $database = "country_city_statedetails";


    public function __construct()
    {

        $this->conn = mysqli_connect($this->servarname, $this->username, $this->password, $this->database);

        // if ($this->conn) {
        //     echo "Connected";
        // } else {
        //     echo "Sorry not connected";
        // }
    }

    public function fetchdata($e_id)
    {

        if (isset($_POST['editbtn'])) {
            $e_id = $_POST['emp_id'];
            // echo $return = $e_id; 

            $result_array = [];
            //var_dump($result_array);

            $query = mysqli_query($this->conn, "SELECT * FROM persondetails WHERE id= '$e_id'");
            //var_dump($query);
            if (mysqli_num_rows($query) > 0) {

                foreach ($query as $row) {
                    array_push($result_array, $row);
                    echo json_encode($result_array);
                }
                //  foreach($query as $row){
                //      array_push($result_array, $row);
                //      header('Content-type:application/json');
                //      echo json_encode($result_array);



                //  }
            } else {
                echo "No found records";
            }
        }
    }

    public function dataupdate()

    {
        
        $demo = "sss";
            echo $demo;
        if (isset($_POST['update'])) {
            

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $mobno = $_POST['mobno'];
            $src1 = $_POST['src1'];
            $camp = $_POST['camp'];
            $country = $_POST['country'];

            $mysql_query = mysqli_query($this->conn, "UPDATE persondetails set fname = '$fname',lname= '$lname',dob='$dob',age = '$age', email = '$email',mobno = '$mobno',src1= '$src1',camp = '$camp', country = '$country' WHERE id = '$id'");

            if ($mysql_query == true) {
                header("Location:view_empdetails.php");
            } else {
                echo "Data can't be updated";
            }
        }
    }
}
$obj = new Ajaxcalls();
$obj->fetchdata($e_id);
