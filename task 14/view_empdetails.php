    <?php


    include 'backend.php';

    include 'code.php';




    $customerObj = new Connect();

    $obj=new Ajaxcalls();
    $obj->dataupdate($id);    





    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $deleteId = $_GET['id'];
        $customerObj->deleteRecord($deleteId);
    }


    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>See Employee details</title>
    </head>

    <body>
        <div class="card">
            <div class="card-header bg-primary text-white text-center">Employee Details</div>
            <div class="card-body">
                <table class=" table table-bordered">
                    <thead class="bg-primary text-white ">
                        <tr>
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
                            <tr >
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
                                    <button type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#myModal">
                                        Update with modal
                                    </button>
            </div>

            <!-- The Modal -->
            <div class="modal" id="myModal" id="empviewmodel">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header bg-primary text-white ">
                            <h4 class="modal-title">Update Data</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body ">
                   
                            <form action="code.php" method="POST">
                            <div class="emp_data">
                            <input type="hidden" name="edit_id" id="edit_id">
                                    <label for="">Firstname</label>
                                <input type="text" name="fname" id="edit_fname" placeholder="Enter your name" class="form-control fname">
                                <br>
                                <label for="">Lastname</label>
                                <input type="text" name="lname" id= "edit_lname"placeholder="Enter your surname" class="form-control">
                                <br>
                                <label for="">Date of birth</label>
                                <input type="date" name="dob" class="form-control" id= "edit_dob">
                                <br>
                                <label for="">Age</label>
                                <input type="text" name="age" class="form-control" readonly id="edit_age">
                                <br>
                                <label for="">Email</label>
                                <input type="text" name="email" placeholder="Enter your email id" class="form-control" id="edit_email">
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
                                <input type="submit" value="Submit" class="btn btn-primary" name="update_btn">


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
       $(document).ready(function () {
           $(".editbtn").click(function (e) { 
               e.preventDefault();
               //alert("hello");

               var empdata=$(this).closest('tr').find('.emp_id').text();
               $.ajax({
                   type: "POST",
                   url: "code.php",
                   data:{
                       'editbtn':true,
                       'emp_id':empdata,
                   },
                   
                   success: function (response) {
                       $.each(JSON.parse(response)  , function (key, value) { 
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
                        //   $("#edit_fname").val(value['fname']);
                        //   $("#edit_fname").val(value['fname']);

                            
                       });
                   // $(".emp_data").html(response);
                    $("#empviewmodel").modal('show')
                    //    console.log(response)
                   }
               });
               //console.log(empdata);
           });
       });
            // $(document).ready(function() {

            //     let check = $("#forms").validate(

            //         {

            //             rules: {
            //                 fname: {
            //                     required: true,
            //                     namecheck: true,
            //                     minlength: 3,


            //                 },

            //                 lname: {
            //                     required: true,
            //                     namecheck: true,
            //                     minlength: 3,


            //                 },
            //                 dob: {
            //                     required: true,



            //                 },
            //                 email: {
            //                     required: true,
            //                     emailcheck: true





            //                 },
            //                 mobno: {
            //                     required: true,
            //                     numcheck: true,
            //                     minlength: 10,
            //                     maxlength: 10,
            //                 },

            //                 src1: {
            //                     required: true,
            //                     salcheck: true

            //                 },
            //                 camp: {
            //                     required: true,

            //                 },
            //                 country: {
            //                     required: true,

            //                 }

            //             },

            //             messages: {
            //                 fname: {

            //                     required: "Enter name",
            //                     namecheck: "Name can only accept charectrers",
            //                     minlength: "Enter atleast 3 cherecters"

            //                 },
            //                 lname: {

            //                     required: "Enter surname",
            //                     namecheck: "Name can only accept charectrers",
            //                     minlength: "Enter atleast 3 cherecters"

            //                 },
            //                 dob: {

            //                     required: "Enter Your date of birth",

            //                 },

            //                 email: {

            //                     required: "Enter your email id",
            //                     emailcheck: "Invalid Email"

            //                 },


            //                 mobno: {

            //                     required: "Enter Mobile no",
            //                     numcheck: "Enter only numbers",

            //                     minlength: "The mobile number should be 10 digits",
            //                     maxlength: "Dont Enter more than 10 numbers",

            //                 },
            //                 salary: {

            //                     required: "Enter your salary",
            //                     salcheck: "Salary should be in numeric format",
            //                 },
            //                 profiles: {
            //                     required: "Profile picture is required",

            //                 }

            //             },


            //         });
            //     $.validator.addMethod("numcheck",
            //         function(value, element) {
            //             return /^[0-9]+$/.test(value);


            //         });

            //     $.validator.addMethod("emailcheck",
            //         function(value, element) {
            //             return /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(value);


            //         });

            //     $.validator.addMethod("namecheck",
            //         function(value, element) {
            //             return /^[a-zA-Z]+$/i.test(value);
            //         });

            //     $.validator.addMethod("numcheck ",
            //         function(value, element) {
            //             return /^[0-9]+$/.test(value);
            //         });


            // });

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




            // for updating using ajax

            

            
        </script>
    </body>

    </html>