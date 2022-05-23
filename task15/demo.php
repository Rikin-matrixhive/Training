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
        
        if (isset($_POST['datas'])) {
            $datas = $_POST['datas'];

            if ($datas) {
                $limit_query = $main_query . " " . "LIMIT" . " " . $datas;
                $limit_res = mysqli_query($this->conn, $limit_query);
                if ($limit_res->num_rows > 0) {
                    echo '<table class = "table table-bordered">
                    <thead class = "bg-primary text-white text-center">
            <tr>
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

        }
        
        
       
        else {
            $db_query = mysqli_query($this->conn, $main_query);


            if ($db_query->num_rows > 0) {
                echo '<table class = "table table-bordered">
                <thead class = "bg-primary text-white text-center">
        <tr>
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

                while ($row = $db_query->fetch_assoc()) {


                    echo "<tr>
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

        if($_POST['searchdata']){

        $searchdata = $_POST['searchdata'];

        $search_query= $main_query." ". "WHERE" ." ". "fname". " ". "LIKE"." ". "'%".$searchdata."%'";
       // echo $search_query;
        $search_res = mysqli_query($this->conn,$search_query);
       // var_dump($search_res->num_rows);

        if($search_res->num_rows > 0){

            while($row = $search_res->fetch_assoc()){
            print_r($row);
                echo "<tr>
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
      
        ///////var_dump($search_res);
        
        }
      
        

        // if($search_res->num_rows >0){
        //     while ($row = $search_res->fetch_assoc()) {
        //     echo $row['fname'];
        //     var_dump($row['fname']);

        // //         echo "<tr>
        // //         <td>" . $row['fname'] . "</td>
        // //         <td>" . $row['lname'] . "</td>
        // //         <td>" . $row['dob'] . "</td>
        // //         <td>" . $row['age'] . "</td>
        // //         <td>" . $row['email'] . "</td>
        // //         <td>" . $row['mobno'] . "</td>
        // //         <td>" . $row['src1'] . "</td>
        // //         <td>" . $row['camp'] . "</td>
        // //        <td>" . $row['country'] . "</td>
        // //         <td><a href='crud-form.php?delete=" . $row['id'] . "'>Delete</a></td>
        // //  </tr>";
        //     }
        // }




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
$rowobj->tableData();
