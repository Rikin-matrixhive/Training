<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','12345');
define('DB_DATABASE','country_city_statedetails');

class DatabaseConnection
{
    private $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

        // if ($conn)
        // {
        //     echo "Database Connected Successfully";
        // }

        // else{
        //     echo "Database is not connected";

        // }
    }

    public function getConnectionObj(){
        return $this->conn;
    }
}

class Xyz
{
    protected $databaseConnection;
    public function __construct(DatabaseConnection $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection->getConnectionObj();
    }

    public function fetchdata(){
        $arr = [];
        try{
            $sql = "SELECT * FROM city";
            $result= $this->databaseConnection->query($sql);
            
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    // echo "<option value=".$row['name'].">".$row['name']."</option>";
                    $arr[] = $row;
                }
            } 
            return $arr;

        }catch(Exception $e){
            echo $e->getMessage();
        }
        return $arr;
    }
}

$xyz = new Xyz(new DatabaseConnection());
echo "<pre>";
print_r($xyz->fetchdata());
?>