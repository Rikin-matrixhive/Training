<?php

include 'backend.php';

$empobj = new Connect();
$empobj->updateRecord($id);



class Updates
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

    public function displayData($id)
    {

        $id = $_GET['id'];
        $query = "SELECT * FROM persondetails WHERE id = $id";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[0] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }
}




$object = new Updates();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <title>Update Data</title>
</head>

<body>
    <div class="card">

        <div class="card-header bg-primary text-center text-white">Update </div>
        <div class="card-body">
            <form action="" method="POST" id="forms">
                <?php
                $customers = $object->displayData($id);;
                foreach ($customers as $customer) {
                ?>
                    <label for="">Firstname</label>
                    <input type="text" name="fname" placeholder="Enter name" class="form-control" value="<?php echo $customer['fname']; ?>">
                    <br>
                    <label for="">Lastname</label>
                    <input type="text" name="lname" placeholder="Enter Surname" class="form-control" value="<?php echo $customer['lname']; ?>">
                    <br>
                    <label for="">Date of birth</label>
                    <input type="date" id='dob' name='dob' onchange="getAge();" class="form-control" value="<?php echo $customer['dob']; ?>">
                    <span class="error" id="dobError">*</span>
                    <br>
                    <label for="">Age</label>
                    <input type="text" name='age' id='age' class="form-control" readonly value="<?php echo $customer['age']; ?>">
                    <span class="error" id="ageError">*</span>
                    <br>
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Enter Email id " class="form-control" value="<?php echo $customer['email']; ?>">
                    <br>
                    <label for="">Phone no</label>
                    <input type="text" name="mobno" placeholder="Enter your mobileno" class="form-control" value="<?php echo $customer['mobno']; ?>">
                    <br>
                    <label for="">Source1</label>
                    <input type="text" name="src1" placeholder="Enter source" class="form-control" value="<?php echo $customer['src1']; ?>">
                    <br>
                    <label for="">Campaign</label>
                    <input type="text" name="camp" placeholder="Enter campign" class="form-control" value="<?php echo $customer['camp']; ?>">
                    <br>
                    <label for="">Select Country</label>
                    <select name="country" id="" value="" class="form-select">
                        <option value="">----------Select Your Country----------</option>
                        <option value="India">India</option>
                        <option value="Australia">Australia</option>
                        <option value="America">America</option>
                        <option value="Canada">Canada</option>
                    </select>
                    <br>
                    <input type="submit" value="Submit" class="btn btn-primary"  name="update">
                <?php  } ?>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>

    <script>
        $(document).ready(function() {

            let check = $("#forms").validate(

                {

                    rules: {
                        fname: {
                            required: true,
                            namecheck: true,
                            minlength: 3,


                        },

                        lname: {
                            required: true,
                            namecheck: true,
                            minlength: 3,


                        },
                        dob: {
                            required: true,



                        },
                        email: {
                            required: true,
                            emailcheck: true
                        },
                        mobno: {
                            required: true,
                            numcheck: true,
                            minlength: 10,
                            maxlength: 10,
                        },

                        src1: {
                            required: true,
                            sourcecheck: true,

                        },
                        camp: {
                            required: true,
                            campcheck: true,

                        },
                        country: {
                            required: true,

                        }

                    },

                    messages: {
                        fname: {

                            required: "Enter name",
                            namecheck: "Name can only accept charectrers",
                            minlength: "Enter atleast 3 cherecters"

                        },
                        lname: {

                            required: "Enter surname",
                            namecheck: "Name can only accept charectrers",
                            minlength: "Enter atleast 3 cherecters"

                        },
                        dob: {

                            required: "Enter Your date of birth",

                        },

                        email: {

                            required: "Enter your email id",
                            emailcheck: "Invalid Email"

                        },


                        mobno: {

                            required: "Enter Mobile no",
                            numcheck: "Enter only numbers",

                            minlength: "The mobile number should be 10 digits",
                            maxlength: "Dont Enter more than 10 numbers",

                        },
                        src1: {

                            required: "Enter your sourcedetails",
                            sourcecheck: "Enter only numbers charecters and whitespace only",
                        },
                        camp: {
                            required: "Enter Your Campign details",
                            campcheck: "Enter only numbers charecters and whitespace only",

                        },
                        country: {
                            required: "Select country first ",


                        },
                    },


                });
            $.validator.addMethod("numcheck",
                function(value, element) {
                    return /^[0-9]+$/.test(value);


                });

            $.validator.addMethod("emailcheck",
                function(value, element) {
                    return /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(value);


                });

            $.validator.addMethod("namecheck",
                function(value, element) {
                    return /^[a-zA-Z]+$/i.test(value);
                });

            $.validator.addMethod("numcheck ",
                function(value, element) {
                    return /^[0-9]+$/.test(value);
                });

            $.validator.addMethod("sourcecheck",
                function(value, element) {
                    return /^[0-9\sa-zA-Z_]+$/.test(value);
                });

            $.validator.addMethod("campcheck",
                function(value, element) {
                    return /^[0-9\sa-zA-Z_]+$/.test(value);
                });


        });

        function getAge() {
            var dobValue = document.getElementById('dob').value;
            if (dobValue === "") {
                document.getElementById('dobError').innerHTML = "Please Select DOB";
            } else {
                //Create Today Date
                var today = new Date();
                //change string to date
                var birthDate = new Date(dobValue);
                var age = today.getFullYear() - birthDate.getFullYear();
                //calculate month difference from current date in time
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                if (age > 18) {
                    document.getElementById('dobError').innerHTML = "";
                    document.getElementById('ageError').innerHTML = "";
                    //display the calculated age
                    document.getElementById('age').value = age;
                } else {
                    document.getElementById('dobError').innerHTML = "Please Select Valid DOB";
                    document.getElementById('ageError').innerHTML = "Sorry!This From Requires 18+ User Only. Your age is " + age;
                }
            }
        }

        function changes() {
            var int = document.getElementById("salary").value;
            var float = parseFloat(int).toFixed(2);
            document.getElementById("sal").innerHTML = "Your salary is : " + float;
        }
    </script>

</body>

</html>