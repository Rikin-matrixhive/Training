    <?php
    class Connect
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

        public function insertdata()
        {
            if (isset($_POST['send'])) {

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $dob = $_POST['dob'];
                $age = $_POST['age'];
                $email = $_POST['email'];
                $mobno = $_POST['mobno'];
                $src1 = $_POST['src1'];
                $camp = $_POST['camp'];
                $country = $_POST['country'];
                $sql_query = mysqli_query($this->conn, "INSERT INTO persondetails(fname,lname,dob,age,email,mobno,src1,camp,country) VALUES ('$fname','$lname','$dob','$age','$email','$mobno','$src1','$camp','$country')");
                if ($sql_query == true) {

                    header("Location:view_empdetails.php");
                } else {
                    echo "Your registration has been failed";
                }
            }
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

        public function displyaRecordById($id)
        {
            $id = $_GET['id'];
            $dbquery = mysqli_query($this->conn, "SELECT * FROM `persondetails` WHERE id ='$id'");

            if ($dbquery->num_rows > 0) {
                $data = array();

                while ($row = $dbquery->fetch_assoc()) {
                    $data[0] = $row;

                    //    echo "<pre>";
                    //     print_r($row);
                    //     echo "</pre>";

                }
                return $data;
            } else {
                echo "No found records";
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


        public function updateRecord($id)
        {
            $id = $_GET['id'];

            if (isset($_POST['update'])) {

                $fname = $_POST['fname'];
                echo $fname;
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
        public function dataupdated($id)
        {

            if (isset($_POST['update'])) {

                $id = $_POST['edit_id'];

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $dob = $_POST['dob'];
                $age = $_POST['age'];
                $email = $_POST['email'];
                echo $email;
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
    $customerObj = new Connect();
    $customerObj->fetchdata($e_id);
