<?php
class Makedatatable
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "12345", "country_city_statedetails");
    }
    public function tableData()
    {
        $db_query = "SELECT * FROM persondetails";

        $page = "";
        if (isset($_POST["page_id"])) {
            $page = $_POST["page_id"];
        } else {
            $page = 1;
        }
        if ($_POST['searchdata']) {
            $searchdata = $_POST['searchdata'];
            $db_query .= " " . "WHERE" . " " . "fname" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "lname" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "dob" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "age" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "email" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "mobno" . " " . "LIKE" . " " . "'%" . $searchdata . "%' " . "OR" . " " .  "mobno" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "src1" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "camp" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "country" . " " . "LIKE" . " " . "'%" . $searchdata . "%'";
        }

        if ($_POST['columnName']) {

            $page = $_POST['columnName'];
            $sort = $_POST['sort'];
            $db_query .= " " . "ORDER BY" . " " . $page . " " . $sort . " ";
            echo $db_query;
        }
        $main_res = mysqli_query($this->conn, $db_query);
        $total_record = mysqli_num_rows($main_res);
        $limit = $_POST['limitdata'] ? $_POST['limitdata'] : $total_record;
        $offset = ($page - 1) * $limit;
        if ($offset <= 0) {
            $offset = 0;
        }


        $db_query .= " " . "LIMIT" . " " . $offset . "," . $limit;
        $pag_id = $_POST['page_id'];
        $result = mysqli_query($this->conn, $db_query);
        $total_pages = ceil($result / $limit);
        $output = "";


        if ($result->num_rows > 0) {
         

            while ($row = $result->fetch_assoc()) {
                $output .= "
                <div><tr> 
                <td><input type ='checkbox' value= '{$row['id']}'></td>
                <td> {$row['id']}</td>
                <td> {$row['fname']}</td>
                <td> {$row['lname']}</td>
                <td> {$row['dob']}</td>
                <td> {$row['age']}</td>
                <td> {$row['email']}</td>
                <td> {$row['mobno']}</td>
                <td> {$row['src1']}</td>
                <td> {$row['camp']}</td>
                <td> {$row['country']}</td>
                <td><a href ='index.php?delete_id:{$row['id']}'>Delete</a></td>

                </div>";
            }
            //$sql = "SELECT * FROM persondetails";
            $res = mysqli_query($this->conn, $db_query);
            $total_records = mysqli_num_rows($res);
            $total_pages = ceil($total_records / $limit);
            $output .= "<div class = 'pagination' id='pagination' style='margin-left:100%'>";

            for ($i = 1; $i <= $total_pages; $i++) {

                $output .= "<a class='active' id='{$i}' href=''>{$i}</a>";
            }
            $output .= "</div>";
        }
        echo $output;
    }

    public function deleteRecord($id)
    {

        $query = mysqli_query($this->conn, "DELETE FROM persondetails WHERE id = '$id'");
        if ($query == true) {
            header("Location:view_empdetails.php");
        } else {
            echo "Record does not delete try again";
        }
    }

    public function multipleDelete(){

        $emp_id= $_POST['id'];
        $str = implode(", ", $emp_id);
        $sql_query= "DELETE FROM persondata WHERE id IN({$str})";
        $delete_res = mysqli_query($this->conn,$sql_query);
        if($delete_res){
            echo 1;
        }
        else{
            echo 0;
        }

    


    }
}

$rowobj = new Makedatatable();
if (count($_POST) > 0) {

    $rowobj->tableData();
}
