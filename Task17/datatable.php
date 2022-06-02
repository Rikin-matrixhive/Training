<?php

class Datatable{

    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","12345","country_city_statedetails");
    } 

 public function displayData()
 {
         $request=$_REQUEST;
        

        $sql = "SELECT * FROM persondetails";
        $query = mysqli_query($this->conn , $sql);
        

		
        $totalData = mysqli_num_rows($query);
        $totalFilter=$totalData;

        
        $data = array();
            while ($row=mysqli_fetch_array($query)) {
                $subdata = array();
                $subdata[]=$row[0]; 
                $subdata[]=$row[1]; 
                $subdata[]=$row[2]; 
                $subdata[]=$row[3]; 
                $subdata[]=$row[4]; 
                $subdata[]=$row[5]; 
				$subdata[]=$row[6]; 
                $subdata[]=$row[7]; 
                $subdata[]=$row[8]; 
                $subdata[]=$row[9]; 

                $data[]=$subdata;

            }
            
            $json_data = array(
            "draw"             => intval($request['draw']),
            "recordsTotal"     => intval($totalData),
            "recordsFiltered"  => intval($totalFilter),
            "data"             => $data
            );
           echo json_encode ($json_data);
        
     }
    }
     $Obj= new Datatable();
     if (count($_POST) > 0) {
     $Obj->displayData();

     }
     include 'simple.php';
?>