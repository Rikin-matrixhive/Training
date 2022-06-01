<?php
include 'datatable.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https:cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https:ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http:ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Employee details</title>
</head>
<style>
    .error {
        color: red;
    }

    .emailserror {
        color: red;

    }

    .pagination {
        margin-left: 80%;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
    }

    .pagination a.active {
        background-color: dodgerblue;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    img {
        width: 10px;
    }

    .sorting {
        width: 30%;

    }
</style>

<body>
    <div class="card">
        <div class="card-header bg-primary text-white text-center">Employee Details</div>
        <div class="card-body " id="data">
            <!-- <div class="search-box" style="width: 25%;margin-left:75%" >
        <input type="text" autocomplete="off" placeholder="Search country..." class="form-control">
        <div class="result"></div> -->

            <select id="limit" class="form-select limits" style="width: 10%;" name="limits" onchange="datatable()">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="">All</option>

            </select>

            <div class="livesearch">
                <input type="text" placeholder="Search" onkeyup="datatable()" class="form-control" id="searchs" style="width: 30%; margin-left:70%;    margin-top: -36px;
">
            </div>

            <a href="" class="btn btn-danger" id="delete-btn">Delete records</a>
            <br>

            <table class="table table-bordered tables">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>Delete</th>
                        <input= "hidden" value="">
                        <th class="head-col" data-dir="" data-name="id">Id<span class= "arrow text-white" ></span></th>
                        <th class="head-col" data-dir="" data-name="fname">Name<span class= "arrow text-white"></span></th>
                        <th class="head-col" data-dir="" data-name="lname">Surname <span class= "arrow text-white"></span></th>
                        <th class="head-col" data-dir="" data-name="dob">Birthdate<span class= "arrow text-white"></span></th>
                        <th class="head-col" data-dir="" data-name="age">Age <span class= "arrow text-white"></span></th>
                        <th class="head-col" data-dir="" data-name="email">Email <span class= "arrow text-white"></span></th>
                        <th class="head-col" data-dir="" data-name="mobno">Mobile <span class= "arrow text-white"></span></th>
                        <th class="head-col" data-dir="" data-name="src1">Source <span class= "arrow text-white"></span></th>
                        <th class="head-col" data-dir="" data-name="camp">Campign </th>
                        <th class="head-col" data-dir="" data-name="country">Country</th>

                        <th>Action</th>

                    </tr>
                </thead>
                <tbody id="response" class="pag_data" data>
                    <br>

                </tbody>
            </table>
            <div id="error-message"></div>
            <div id="success-message"></div>
            <div class="pag-data"></div>


            <script>
                function datatable(page = 1, data_name, data_dir, id) {
                    var limitdata = $("#limit").val();
                    var sort = $("#sort").val();
                    var searchdata = $("#searchs").val();
                    if (searchdata <= 3) {
                        $("#err")
                    }
                    
                    $.ajax({
                        type: "POST",
                        url: "datatable.php",
                        data: {
                            limitdata: limitdata,
                            searchdata: searchdata,
                            sort: sort,
                            page_id: page,
                            data_name: data_name,
                            data_dir: data_dir,
                            id: id

                        },



                        success: function(datatables) {


                            $("#response").html(datatables);

                        }

                    });
                }

                $(document).ready(function() {
                    datatable();

                    $(".head-col").click(function(e) {
                        //alert();
                        var data_name = $(this).attr("data-name");
                        var data_dir = $(this).attr("data-dir");
                        var arrow = "";
                        if (data_dir == "" || data_dir == "ASC") {
                            $(this).attr("data-dir", "DESC");

                        } else {
                            $(this).attr("data-dir", "ASC");

                        }
                        $(".arrow").html("");
                        if(data_dir == "ASC")
                        {
                            $(this).find(".arrow").html("<img src = 'arrow-up.svg'>");
                        }
                        else{
                            $(this).find(".arrow").html("<img src = 'arrow-down.svg'>");

                        }
                
                       
                        datatable(1, data_name, data_dir);

                    });

                });

                $(document).on("click", ".delete-btn", function() {
                    var stuId = $(this).data("id");
                    var element = this;
                    // alert(stuId);

                    $.ajax({
                        url: "datatable.php",
                        type: "POST",
                        data: {
                            id: stuId
                        },
                        success: function(data) {
                            //console.log(data)
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                            }
                        }
                    });
                    datatable();
                });


                // //multiple-delete
                $("#delete-btn").on("click", function() {

                    var id = [];
                    console.log(id);

                    $(":checkbox:checked").each(function(key) {
                        id[key] = $(this).val();

                    });
                    console.log(id);
                    if (id.length === 0) {
                        alert("PLEASE! select checkbox.");
                    } else {
                        if (confirm("do you really want delete these records?")) {
                            $.ajax({
                                url: "datatable.php",
                                type: "POST",
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    console.log(data);
                                    if (data == true) {
                                        $("#success-message").html("data delete successfully.").slideDown();
                                        $("#error-message").slideUp();
                                    } else {
                                        $("#error-message").html("data  delete ").slideDown();
                                        $("#success-message").slideUp();
                                    }
                                }
                            });
                            datatable();
                        }

                    };
                });
               
            </script>
        </div>

    </div>

</body>

</html>