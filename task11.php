<?php
//include("db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select demo</title>
</head>

<body>
    <div class="card-header bg-primary text-white text-center">Select 2 Demo</div>
    <div class="card">
        <br>

        <div class="card-body">
            <form action="" method="POST">
            <center><select name="" id="" class="form-select" style="width:80%;" multiple="multiple">
                        <option value="">Select city</option>
                        </select>
                        <br>
                    <br>
                <center><select name="" id="" class="form-select" style="width:80%;" multiple="multiple">
                        <option value="">Select city</option>
                        <?php
                        class xyz{
                            public $db_conn;
                            function __construct() {
                                $servername='localhost';
                                $username='root';
                                $password='12345';
                                $dbname = "country_city_statedetails";
                                $this->db_conn=mysqli_connect($servername,$username,$password,"$dbname");
                                  if($this->db_conn){
                                      echo "connected";
                                    }
                                }
                              function get_city() {
                                 //  $arr = array();
                                  $result = mysqli_query($this->db_conn,"SELECT * FROM `city`");
                                         while($row = mysqli_fetch_array($result)) {
                                        
                                }
                                return $result;
                               }
                            }
                            $obj = new xyz();
                            $data = $obj->get_city();
                              foreach($data as $row) {
                         ?>
                         <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                         <?php
                            }
                         ?>
                         <?php
                        // class Xyz
                        // {
                        //     protected $databaseConnection;
                        //     public function __construct(DatabaseConnection $databaseConnection)
                        //     {
                        //         $this->databaseConnection = $databaseConnection->getConnectionObj();
                        //     }
                        
                        //     public function fetchdata(){
                        //         $arr = [];
                        //         try{
                        //             $sql = "SELECT * FROM city";
                        //             $result= $this->databaseConnection->query($sql);
                                    
                        //             if($result->num_rows >0){
                        //                 while($row = $result->fetch_assoc()){
                        //                     // echo "<option value=".$row['name'].">".$row['name']."</option>";
                        //                     $arr[] = $row;
                        //                 }
                        //             } 
                        //             return $arr;
                        
                        //         }catch(Exception $e){
                        //             echo $e->getMessage();
                        //         }
                        //         return $arr;
                        //     }
                        // } -->
                        
                        // $xyz = new Xyz(new DatabaseConnection());
                        // echo "<pre>";
                        // print_r($xyz->fetchdata());
                    //  return($conn);


                    //     function fetchdata($conn    ){
                    //     $sql = "SELECT * FROM city";
                    //     $result= $conn->query($sql);
                    //     if($result->num_rows >0){
                    //         while($row = $result->fetch_assoc()){
                    //             echo "<option value=".$row['name'].">".$row['name']."</option>";

                    //         }
                    //     }
                    // }
                       ?>
                    </select></center>
            </form>
        </div>
        <br>
        <div class="card bg-primary text-white text-center">Footer</div>
        <script>
            $("select").select2({
                tags: "true",
                placeholder: "Select an option",
                allowClear: true,
                width: '100%',
                createTag: function(params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        value: true // add additional parameters
                    }
                }
            });
        </script>
</body>

</html>