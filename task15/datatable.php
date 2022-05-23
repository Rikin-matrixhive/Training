<?php
class Makedatatable
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "12345", "country_city_statedetails");
    }


    public function tableData()

    {

    

     $main_query = "SELECT * FROM persondetails";
        $main_res = mysqli_query($this->conn, $main_query);

        // if (isset($_POST['datas'])) {
            $limitdata = $_POST['limitdata'];

            
            // var_dump($_POST['datas']);
         
            if($_POST['searchdata']){
                $searchdata= $_POST['searchdata'];

                $main_query .= " ". "WHERE" ." ". "fname". " ". "LIKE"." ". "'%".$searchdata."%'" ."OR". " ".  "lname". " ". "LIKE"." ". "'%".$searchdata."%'" ."OR". " ".  "dob". " ". "LIKE"." ". "'%".$searchdata."%'" ."OR". " ".  "age". " ". "LIKE"." ". "'%".$searchdata."%'"."OR". " ".  "email". " ". "LIKE"." ". "'%".$searchdata."%'"."OR". " ".  "mobno". " ". "LIKE"." ". "'%".$searchdata."%' " ."OR". " ".  "mobno". " ". "LIKE"." ". "'%".$searchdata."%'" ."OR". " ".  "src1". " ". "LIKE"." ". "'%".$searchdata."%'"."OR". " ".  "camp". " ". "LIKE"." ". "'%".$searchdata."%'"."OR". " ".  "country". " ". "LIKE"." ". "'%".$searchdata."%'";
                // echo $main_query;
            }
            if ($_POST['limitdata']) {
                $main_query .= " " . "LIMIT" . " " . $limitdata;
                // echo $main_query;

            }
                $limit_res = mysqli_query($this->conn,$main_query);
                if ($limit_res->num_rows > 0) {
                    echo '<table class = "table table-bordered">
                    <thead class = "bg-primary text-white text-center">
            <tr>
            <th>#</th>
                <th>Id</th>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Age</th>
                <th>Email id</th>
                <th>Mobile No</th>
                <th>Source</th>
                <th>Campign</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            <thead>
            ';
                    while ($row = $limit_res->fetch_assoc()) {


                        echo "<tr>
                        <td><input type = 'checkbox' onchange ='datatable()' id= ></td>

                        <td>" . $row['fname'] . "</td>
                        <td>" . $row['lname'] . "</td>
                        <td>" . $row['dob'] . "</td>
                        <td>" . $row['age'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['mobno'] . "</td>
                        <td>" . $row['src1'] . "</td>
                        <td>" . $row['camp'] . "</td>
                       <td>" . $row['country'] . "</td>
                        <td><a href='crud-form.php?delete=" . $row['id'] . "'>Delete</a></td>
                 </tr>";
                    }
                }
            }
        



    // Prepare a select statement




    public function deleteRecord($id)
    {

        echo "deleteRecord";
        $query = mysqli_query($this->conn, "DELETE FROM persondetails WHERE id = '$id'");
        if ($query == true) {
            header("Location:view_empdetails.php");
        } else {
            echo "Record does not delete try again";
        }
    }
}





$rowobj = new Makedatatable();
if(count($_POST) > 0){
    $rowobj->tableData();
}

