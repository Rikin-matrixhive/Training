<?php
include("config.php");

if (isset($_POST['add'])) {
    $uuid = random_int(100000, 999999); //generate random number 
    $uuidFrmt = substr($uuid, 0, 3) . '-' . substr($uuid, 3); //format the random number 
    $name = $_POST['names'];
    $date = $_POST['dates'];
    $mobno = $_POST['mobno'];
    $salary = $_POST['salary'];
    $file = $_FILES['profiles']['name']; //get the file name 
    $tmpname  = $_FILES['profiles']['tmp_name']; //get the temporary file name 
    $dir = "profile/"; //set the directory 
    $targetpath = $dir . basename($_FILES['profiles']['name']); //set the target path 
    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION)); //get the file extension \
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["profiles"]["tmp_name"], "profile/" . $file)) { //move the file to the directory 
        $sql = mysqli_query($conn, "INSERT INTO `employeedetails`(`uuid`, `names`, `dates`, `mobno`, `salary`, `profiles`) VALUES ('$uuidFrmt','$name','$date',' $mobno','$salary','$file')"); //insert the data into the database 

    }
    if ($sql == true) { //check if the data is inserted 
        echo "Data inserted";
        header('Location:viewdetails.php'); //redirect to the viewdetails page 
    } else {
        echo "Data Not inserted";
    }
}   
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee forms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>

<body>
    <div class="container mt-3 bg-primary text-white text-center">
        <h2>Employee forms</h2>
    </div>
    <div class="container mt-3">
        <form action="" method="POST" id="empform" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="names">
            </div>
            <div class="mb-3 mt-3">

                <label>Date of birth:</label>
                <input type="date" id='dob' name='dates' onchange="getAge();" class="form-control">
                <span class="error" id="dobError">*</span>
                <br>

                <label>Age:</label>
                <input type="text" name='age' id='age' class="form-control" readonly>
                <span class="error" id="ageError">*</span>
                <br>
                <div class="mb-3">
                    <label>Mobile No:</label>
                    <input type="text" class="form-control" placeholder="Enter Mobile no" name="mobno">

                </div>
                <div class="mb-3">
                    <label>Salary:</label>
                    <input type="text" class="form-control" id="salary" placeholder="Enter Salary" name="salary" onchange="changes()"><span id="sal"></span>

                </div>
                <div class="mb-3">
                    <label>Profile:</label>
                    <input type="file" class="form-control" id="profiles" name="profiles">

                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" name="add">Submit</button> <button type="reset" id="btnreset" class="btn btn-primary" name="add" onClick="document.location.reload(true)">Reset</button>

        </form>
    </div>
    <script>
        $(document).ready(function() {

            let check = $("#empform").validate(

                {

                    rules: {
                        names: {
                            required: true,
                            namecheck: true,
                            minlength: 3,


                        },
                        dates: {
                            required: true,



                        },


                        mobno: {
                            required: true,
                            numcheck: true,
                            minlength: 10,
                            maxlength: 10,
                        },

                        salary: {
                            required: true,
                            salcheck: true

                        },
                        profiles: {
                            required: true,

                        }

                    },

                    messages: {
                        names: {

                            required: "Enter name",
                            namecheck: "Name can only accept charectrers",
                            minlength: "Enter atleast 3 cherecters"

                        },
                        dates: {

                            required: "Enter Your date of birth",

                        },


                        mobno: {
                            numcheck: "Enter only numbers",

                            required: "Enter Mobile no",
                            minlength: "The mobile number should be 10 digits",
                            maxlength: "Dont Enter more than 10 numbers",

                        },
                        salary: {

                            required: "Enter your salary",
                            salcheck: "Salary should be in numeric format",
                        },
                        profiles: {
                            required: "Profile picture is required",

                        }

                    },


                });

            $.validator.addMethod("numcheck",
                function(value, element) {
                    return /^[0-9]+$/.test(value);


                });

            $.validator.addMethod("namecheck",
                function(value, element) {
                    return /^[a-zA-Z]+$/i.test(value);
                });

            $.validator.addMethod("salcheck",
                function(value, element) {
                    return /^[0-9]+$/.test(value);
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