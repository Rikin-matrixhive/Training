<?php
include 'datatable.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $deleteId = $_GET['id'];
    $rowobj->deleteRecord($id);
}
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
        
            <a href="" class="btn btn-danger" id="multiple_delete">Delete records</a>
            <br>

            <span>Data deleted</span>
            <table class="table table-bordered tables">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <input type='hidden' id='sort' value='asc'>
                        <th onclick='datatable("id")' >#</th>
                        <th onclick='datatable("id")'>Id</th>
                        <th onclick='datatable("fname")'>Name</th>
                        <th onclick='datatable("lname")'>Surname</th>
                        <th onclick='datatable("dob")'>Birthdate</th>
                        <th onclick='datatable("age")'>Age</th>
                        <th onclick='datatable("email")'>Email</th>
                        <th onclick='datatable("mobno")'>Mobile</th>
                        <th onclick='datatable("src1")'>Source</th>
                        <th onclick='datatable("camp")'>Campign</th>
                        <th onclick='datatable("country")'>Country</th>
                        <th >Action</th>

                    </tr>
                </thead>
                <tbody id="response" class="pag_data" data>
                    <br>

                </tbody>
            </table>
            <div class="pag-data">

            </div>


            <script>
                function datatable(columnName) {
                    var limitdata = $("#limit").val();
                    var sort = $("#sort").val();
                    var searchdata = $("#searchs").val();
                    // var sorting = $(".datatable").attr("id");

                    //var sorting = $("#ordering").val();

                    if (searchdata <= 3) {
                        $("#err")
                    }

                    // var pagination= $("button").text();
                    // console.log(pagination);

                    $.ajax({
                        type: "POST",
                        url: "datatable.php",
                        data: {
                            limitdata: limitdata,
                            searchdata: searchdata,
                            columnName: columnName,
                            sort: sort
                        },



                        success: function(datatables) {
                            console.log(datatables);
                            if (sort == "asc" ) {
                                $("#sort").val("desc");
                            } else {
                                $("#sort").val("asc");
                            }
                            $("#response").html(datatables);

                            // $(".pag-data").html(datatables);

                        }
                    });
                }

                $(document).ready(function() {
                    datatable(1);

                });

                $(document).on("click", "#pagination a", function(e) {
                    e.preventDefault();
                    var page_id = $(this).attr("id");
                    var limitdata = $("#limit").val();
                    var searchdata = $("#searchs").val();


                    $.ajax({
                        type: "POST",
                        url: "datatable.php",
                        data: {
                            page_id: page_id,
                            limitdata: limitdata,
                            searchdata: searchdata
                        },
                        success: function(paginationdata) {
                            $(".pag_data").html(paginationdata);
                        }
                    });

                })

                $(document).on("click", "#pagination a", function(e) {
                    e.preventDefault();
                    var page_id = $(this).attr("id");
                    var limitdata = $("#limit").val();
                    var searchdata = $("#searchs").val();

                     datatable(page_id);
                    // $.ajax({
                    //     type: "POST",
                    //     url: "datatable.php",
                    //     data: {
                    //         page_id: page_id,
                    //         limitdata: limitdata,
                    //         searchdata: searchdata
                    //     },
                    //     success: function(paginationdata) {
                    //         //$(".pag_data").html(paginationdata);
                    //     }
                    // });

                })
              $("#multiple_delete").on("click", function () {
                   var id= [];
                   $(":checkbox:checked").each(function(key){
                       id[key]= $(this).val();

                   })
                   if(id.length === 0){
                       alert("Please select atleast one checkbox");
                    

                   }
                   else{
                       if(confirm("Are you Sure want to delete record"))
                       $.ajax({
                           type: "POST",
                           url: "datatable.php",
                           data: {id:id},
                           dataType: "dataType",
                           success: function (deletedata) {
                            if(deletedata == 1 ){

                            }

                           }
                       });
                   }

              });
            </script>
        </div>

    </div>

</body>

</html>