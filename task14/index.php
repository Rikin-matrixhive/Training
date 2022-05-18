<?php
include 'backend.php';

if (isset($_POST['send'])) {
    $customerObj->insertdata();
}
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
    <title>Make CRUD in php</title>
</head>

<body>
    <div class="card">

        <div class="card-header bg-primary text-center text-white">CRUD IN PHP</div>
        <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="forms">
                <label for="">Firstname</label>
                <input type="text" name="fname" placeholder="Enter name" class="form-control">
                <br>
                <label for="">Lastname</label>
                <input type="text" name="lname" placeholder="Enter Surname" class="form-control">
                <br>
                <label for="">Date of birth</label>
                <input type="date" id='dob' name='dob' onchange="getAge();" class="form-control">
                <span class="error" id="dobError">*</span>
                <br>
                <label for="">Age</label>
                <input type="text" name='age' id='age' class="form-control" readonly>
                <span class="error" id="ageError">*</span>
                <br>
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Enter Email id " class="form-control">
                <span class="error">* <?php echo $emailErr; ?></span>

                <br>
                <label for="">Phone no</label>
                <input type="text" name="mobno" placeholder="Enter your mobileno" class="form-control">
                <br>
                <label for="">Source1</label>
                <input type="text" name="src1" placeholder="Enter source" class="form-control">
                <br>
                <label for="">Campaign</label>
                <input type="text" name="camp" placeholder="Enter campign" class="form-control">
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
                <input type="submit" value="Submit" class="btn btn-primary" name="send">
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

                            required: "<span class= 'text-danger'>Enter name</span>",
                            namecheck: "<span class= 'text-danger'>Name can only accept charectrers</span>",
                            minlength: "<span class= 'text-danger'>Enter atleast 3 cherecters</span>"

                        },
                        lname: {

                            required: "<span class= 'text-danger'>Enter surname</span>",
                            namecheck: "<span class= 'text-danger'>Name can only accept charectrers</span>",
                            minlength: "<span class= 'text-danger'>Enter atleast 3 cherecters</span>"

                        },
                        dob: {

                            required: "<span class= 'text-danger'>Enter Your date of birth</span>",

                        },

                        email: {

                            required: "<span class= 'text-danger'>Enter your email id</span>",
                            emailcheck: "<span class= 'text-danger'>Invalid Email</span>"

                        },


                        mobno: {

                            required: "<span class= 'text-danger'>Enter Mobile no</span>",
                            numcheck: "<span class= 'text-danger'>Enter only numbers</span>",

                            minlength: "<span class= 'text-danger'>The mobile number should be 10 digits</span>",
                            maxlength: "<span class= 'text-danger'>Dont Enter more than 10 numbers</span>",

                        },
                        src1: {

                            required: "<span class= 'text-danger'>Enter your sourcedetails</span>",
                            sourcecheck: "<span class= 'text-danger'>Enter only numbers charecters and whitespace only</span>",
                        },
                        camp: {
                            required: "<span class= 'text-danger'>Enter Your Campign details</span>",
                            campcheck: "<span class= 'text-danger'>Enter only numbers charecters and whitespace only</span>",

                        },
                        country: {
                            required: "<span class= 'text-danger'>Select country first</span>",


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
    </script>

</body>

</html>