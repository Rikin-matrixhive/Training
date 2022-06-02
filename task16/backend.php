<?php
class Datatable
{

    public function __construct()
    {

        $this->conn = mysqli_connect("localhost", "root", "12345", "country_city_statedetails");

    }

    

    public function displayData()
    {

        $query = "SELECT * FROM persondetails";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

}
$customerObj = new Datatable();



