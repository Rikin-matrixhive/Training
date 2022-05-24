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
        $output = "";
        $total_record = mysqli_num_rows($main_res);
        $limitdata = $_POST['limitdata'];
        if ($_POST['searchdata']) {
            $searchdata = $_POST['searchdata'];

            $main_query .= " " . "WHERE" . " " . "fname" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "lname" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "dob" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "age" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "email" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "mobno" . " " . "LIKE" . " " . "'%" . $searchdata . "%' " . "OR" . " " .  "mobno" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "src1" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "camp" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "country" . " " . "LIKE" . " " . "'%" . $searchdata . "%'";
            // echo $main_query;
        }
        if ($_POST['limitdata']) {
            $main_query .= " " . "LIMIT" . " " . $limitdata;
            // echo $main_query;

        }

        if ($_POST['page']) {
            $pages = $_POST['page'];
            var_dump($pages);
        }
        $limit_res = mysqli_query($this->conn, $main_query);
        if ($limit_res->num_rows > 0) {
            //        
            while ($row = $limit_res->fetch_assoc()) {
?>
                <tr>

                    <td><input type="checkbox" name="customer_id[]" onclick="datatable()" class="delete_customer" value="<?php echo $row["id"]; ?>" /></td>

                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mobno']; ?></td>
                    <td><?php echo $row['src1']; ?></td>
                    <td><?php echo $row['camp']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><a href='index.php?delete="<?php $row['id'] ?> "'>Delete</a></td>
                </tr>
<?php
            }
        }
    }

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
    public function multipleDelete($id)
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
if (count($_POST) > 0) {

    $rowobj->tableData();
}
