<?php
class Makedatatable
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "12345", "country_city_statedetails");
    }
    public function tableData()
    {
        $page = "";
        if (isset($_POST["page_id"])) {
            $page = $_POST["page_id"];
        } else {
            $page = 1;
        }
        $db_query = "SELECT * FROM persondetails";
        $output = "";
        $total_res = mysqli_query($this->conn, $db_query);
        $total_record  = mysqli_num_rows($total_res);
        if ($_POST['searchdata']) {
            $searchdata = $_POST['searchdata'];
            $db_query .= " " . "WHERE" . " " . "fname" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "lname" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "dob" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "age" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "email" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "mobno" . " " . "LIKE" . " " . "'%" . $searchdata . "%' " . "OR" . " " .  "mobno" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "src1" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "camp" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "country" . " " . "LIKE" . " " . "'%" . $searchdata . "%'";
        }

        if ($_POST['data_name'] && $_POST['data_dir']) {
            $data_name = $_POST['data_name'];
            $data_dir = $_POST['data_dir'];
            $db_query .= " " . "ORDER BY" . " " . $data_name . " " . $data_dir;
            echo $db_query;
        }
        $limit = ($_POST['limitdata'] && $_POST['limitdata'] != "") ? $_POST['limitdata'] : (($_POST['limitdata'] == "")  ? $total_record : 5);

        $offset = ($page - 1) * $limit;
        if ($offset <= 0) {
            $offset = 0;
        }
        $db_query .= " " . "LIMIT" . " " . $offset . "," . $limit;
        $res = mysqli_query($this->conn, $db_query);
        $total_pages = ceil($total_record / $limit);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {

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
            $output .= "<div class = 'pagination' id='pagination' style='margin-left:100%' >";

            for ($i = 1; $i <= $total_pages; $i++) {

                $output .= "<button class='active ' id='{$i}'  onclick = datatable({$i})>{$i}</button>";
            }
            $output .= "</div>";
            echo $output;
        }
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
}





$rowobj = new Makedatatable();
if (count($_POST) > 0) {

    $rowobj->tableData();
}
