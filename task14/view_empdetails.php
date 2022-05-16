<?php


include 'backend.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $deleteId = $_GET['id'];
    $customerObj->deleteRecord($deleteId);
}

$customerObj = new Connect();
$result=$customerObj->dataupdated($id);

var_dump($result) ;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Employee details</title>
</head>
<style>
    .error {
        color: red;
    }

    .emailserror{
        color: red;

    }
</style>

<body>
    <div class="card">
        <div class="card-header bg-primary text-white text-center">Employee Details</div>
        <div class="card-body">
            <table class=" table table-bordered">
                <thead class="bg-primary text-white ">
                    <tr>

                        <?php echo $email; ?>

                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>BirthDate</th>
                        <th>Age</th>

                        <th>Email id</th>
                        <th>Mobile no</th>
                        <th>Source</th>
                        <th>Campign</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $customers = $customerObj->displayData();
                    foreach ($customers as $customer) {
                    ?>
                        <tr>
                            <td class="emp_id"><?php echo $customer['id'] ?></td>
                            <td><?php echo $customer['fname'] ?></td>
                            <td><?php echo $customer['lname'] ?></td>
                            <td><?php echo $customer['dob'] ?></td>
                            <td><?php echo $customer['age'] ?></td>
                            <td><?php echo $customer['email'] ?></td>
                            <td><?php echo $customer['mobno'] ?></td>
                            <td><?php echo $customer['src1'] ?></td>
                            <td><?php echo $customer['camp'] ?></td>
                            <td><?php echo $customer['country'] ?></td>

                            <td><a href="updatempdetails.php?id= <?php echo $customer['id'] ?>" class="btn btn-primary">Update</a>
                                <button type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#myModal" data-backdrop="static" data-keyboard="false">
                                    Update with modal
                                </button>
                                <a href="view_empdetails.php?id= <?php echo $customer['id'] ?>" class="btn btn-primary">Delete</a>

        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal" >
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-primary text-white ">
                        <h4 class="modal-title">Update Data</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body ">
                        <div class="emp_data">
                            <form action="#" method="POST" id="forms" >

                                <input type="hidden" name="edit_id" id="edit_id">
                                <label for="">Firstname</label>
                                <input type="text" name="fname" id="edit_fname" placeholder="Enter your name" class="form-control fname">
                                <br>
                                <label for="">Lastname</label>
                                <input type="text" name="lname" id="edit_lname" placeholder="Enter your surname" class="form-control">
                                <br>
                                <label for="">Date of birth</label>
                                <input type="date" name="dob" class="form-control" id="edit_dob" onchange="getAge()">
                                <span class="error" id="dobError">*</span>

                                <br>
                                <label for="">Age</label>
                                <input type="text" name="age" class="form-control" readonly id="edit_age">
                                <span class="error" id="ageError">*</span>

                                <br>
                                <label for="">Email</label>
                                <input type="text" name="email" placeholder="Enter your email id" class="form-control emails" id="edit_email">
                                <span class="emailserror">* <?php echo $result; ?></span>
                                <br>
                                <label for="">Mobile no</label>
                                <input type="text" name="mobno" placeholder="Enter your mobile no" class="form-control" id="edit_mobno">
                                <br>
                                <label for="">Source</label>
                                <input type="text" name="src1" placeholder="Enter source" class="form-control" id="edit_src1">
                                <br>
                                <label for="">Campaign</label>
                                <input type="text" name="camp" placeholder="Enter Campaign" class="form-control" id="edit_camp">
                                <br>
                                <select name="country" id="edit_country" value="" class="form-select">
                                    <option value="">----------Select Your Country----------</option>
                                    <option value="India">India</option>
                                    <option value="Australia">Australia</option>
                                    <option value="America">America</option>
                                    <option value="Canada">Canada</option>
                                </select>
                                <br>
                                <button type="submit" value="Update" class="btn btn-primary" name="update" id="form_update">Update</button>


                            </form>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <td>

            <!-- <a href="view_empdetails.php?id= <?php echo $customer['id'] ?>"> Update with modal</a>
                                <a href="view_empdetails.php?id= <?php echo $customer['id'] ?>">Delete</a> -->




        </td>
        </tr>
    <?php  } ?>
    </tbody>


    </table>

    </div>
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
                        // email: {
                        //     required: true,
                        //     emailcheck:true
                        // },
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

                        // email: {

                        //     required: "<span class= 'text-danger'>Enter your email id</span>",
                        //     emailcheck:"<span class= 'text-danger'>Invalid Email</span>"

                        // },


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

            var dobValue = document.getElementById('edit_dob').value;
            if (dobValue === "") {
                // document.getElementById('dobError').innerHTML = "Please Select DOB";
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
                    document.getElementById('edit_age').value = age;
                } else {
                    document.getElementById('dobError').innerHTML = "Please Select Valid DOB";
                    document.getElementById('ageError').innerHTML = "Sorry!This From Requires 18+ User Only. Your age is " + age;
                }
            }
        }
        $(document).ready(function() {
            $(".editbtn").click(function(e) {
                e.preventDefault();
                //alert("hello");

                var empdata = $(this).closest('tr').find('.emp_id').text();
                $.ajax({
                    type: "POST",
                    url: "backend.php",
                    data: {
                        'editbtn': true,
                        'emp_id': empdata,
                    },

                    success: function(response) {

                        console.log(response);
                        $.each(JSON.parse(response), function(key, value) {
                            // console.log(value['fname']);
                            $("#edit_id").val(value['id']);
                            $("#edit_fname").val(value['fname']);
                            $("#edit_lname").val(value['lname']);
                            $("#edit_dob").val(value['dob']);
                            $("#edit_age").val(value['age']);
                            $("#edit_email").val(value['email']);
                            $("#edit_mobno").val(value['mobno']);
                            $("#edit_src1").val(value['src1']);
                            $("#edit_camp").val(value['camp']);
                            $("#edit_country").val(value['country']);


                        });


                        $("#myModal").modal('show')
                        //$("#empviewmodel").modal('hide');


                    }
                });
                //console.log(empdata);
            });
//             $('#empviewmodel').modal({
//         backdrop: 'static',
//         keyboard: false
// });
        });


    $(document).ready(function () {
        $(".emails").click(function () { 
            
            var emaildata= $(this).closest("form").find(".emails").val();
            $.ajax({
                type: "POST",
                url: "backend.php",
                data: {
                    'emails':true,
                    'emails':emaildata
                },
                success: function (response) {
                        console.log(response);
                    $(".emailserror").text(response);
                    
                }
            });
        });

    });



    </script>
</body>

</html>