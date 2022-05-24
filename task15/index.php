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
</style>

<body>
    <div class="card">
        <div class="card-header bg-primary text-white text-center">Employee Details</div>
        <div class="card-body " id="data">
            <!-- <div class="search-box" style="width: 25%;margin-left:75%" >
        <input type="text" autocomplete="off" placeholder="Search country..." class="form-control">
        <div class="result"></div> -->

            <select id="limit" class="form-select limits" style="width: 10%;" name="limits" onchange="datatable()">
                <option value="">All</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>

            </select>

            <div class="livesearch">
                <input type="text" placeholder="Search" onkeyup="datatable()" class="form-control" id="searchs" style="width: 30%; margin-left:70%;    margin-top: -36px;
">
            </div>
            <br>

            <table class="table table-bordered">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>Age</th>
                        <th>Email id</th>
                        <th>Mobile No</th>
                        <th>Source</th>
                        <th>Campign</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="response" class="pag_data">

                </tbody>
            </table>
            <div id="pagination">
                <a class="active" id="1" href="">1</a>
                <a id="2" href="">2</a>
                <a id="3" href="">3</a>
            </div>
            <!-- <div class="deletebutton">
            <button type="button" class="btn btn-success btn-sm delete"  data-id="<?= $row['id']; ?>">Delete</button>            </div> -->


            <script>
                function datatable(page) {
                    var limitdata = $("#limit").val();
                    var searchdata = $("#searchs").val();
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
                            data: {
                                page: page
                            }

                        },

                        success: function(datatables) {

                            $("#response").html(datatables);


                        }
                    });
                }

                $(document).ready(function() {
                    datatable();

                });

                $(document).on("click", "#pagination a", function(e) {
                    //alert("a");
                    e.preventDefault();
                    var page_id = $(this).attr("id");
                    console.log(page_id);
                    datatable(page_id);

                })
            </script>
        </div>

    </div>

</body>

</html>