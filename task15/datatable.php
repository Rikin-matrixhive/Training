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
            $main_query = "SELECT * FROM persondetails";
            if ($_POST['searchdata']) {
                $searchdata = $_POST['searchdata'];
                $main_query .= " " . "WHERE" . " " . "fname" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "lname" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "dob" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "age" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "email" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "mobno" . " " . "LIKE" . " " . "'%" . $searchdata . "%' " . "OR" . " " .  "mobno" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "src1" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "camp" . " " . "LIKE" . " " . "'%" . $searchdata . "%'" . "OR" . " " .  "country" . " " . "LIKE" . " " . "'%" . $searchdata . "%'";
            }
            $limitdata = $_POST['limitdata'];
            if ($limitdata == "All") {
                $main_query = "SELECT * FROM persondetails";
            }

            if(isset($_POST['sorting'])&& $_POST['sorting'] != ""){
                $sort_data = $_POST['sorting'];
                $main_query .= " ". "ORDER BY". " " ."fname".","."lname"." " . $sort_data;
            }
            $offset = ($page - 1) * $limitdata;
            $main_query .= " " . "LIMIT" . " " . $offset . "," . $limitdata;          
            $pag_id = $_POST['page_id'];
            $offset = ($pag_id - 1) * $limitdata;
            echo "<br>";
            $result = mysqli_query($this->conn, $main_query);
            $output = "";
            $total_pages = ceil($result / $limitdata);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $output .= '<tr> 
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['fname'] . '</td>
                    <td>' . $row['lname'] . '</td> 
                    <td>' . $row['dob'] . '</td> 
                    <td>' . $row['age'] . '</td> 
                    <td>' . $row['email'] . '</td> 
                    <td>' . $row['mobno'] . '</td> 
                    <td>' . $row['src1'] . '</td> 
                    <td>' . $row['camp'] . '</td> 
                    <td>' . $row['country'] . '</td> 


                    </tr>';
                }
                
            }
            $sql = "select * from persondetails";
            $res = mysqli_query($this->conn, $sql);
            $total_records = mysqli_num_rows($res);
            $total_pages = ceil($total_records / $limitdata);
            $output .= "<div class = 'pagination' id='pagination' style='margin-left:400%'>";

            for ($i = 1; $i <= $total_pages; $i++) {

                $output .= "<a class='active' id='{$i}' href=''>{$i}</a>";
            }
            $output .= "</div>";
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
    }

    $rowobj = new Makedatatable();
    if (count($_POST) > 0) {

        $rowobj->tableData();
    }
