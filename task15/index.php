<?php


include 'datatable.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $deleteId = $_GET['id'];
    $rowobj->deleteRecord($deleteId);
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

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
</style>

<body>
    <div class="card">
        <div class="card-header bg-primary text-white text-center">Employee Details</div>
        <div class="card-body " id="data">
            <!-- <div class="search-box" style="width: 25%;margin-left:75%" >
        <input type="text" autocomplete="off" placeholder="Search country..." class="form-control">
        <div class="result"></div> -->

            <select id="limit" class="form-select limits" style="width: 10%;" name="limits">
                <option value="">All</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>

            </select>

            <div class="livesearch">
                <input type="text" placeholder="Search" class="form-control" id="searchs" style="width: 30%; margin-left:70%;    margin-top: -36px;
">
            </div>


            <script>
                $(document).ready(function() {

                    $("#limit").on('change', function() {
                        var datas = this.value;
                        console.log(datas);



                        $.ajax({
                            type: "POST",
                            url: "datatable.php",
                            data: {
                                datas: datas,
                            },

                            success: function(datatables) {
                                $("#data").append(datatables);


                            }


                        });

                    });

                });

                // $(document).ready(function() {

                //     $("#limit").on('click', function() {

                //         var datas = $(this).val();
                //         console.log(datas);

                //         $.ajax({
                //             type: "POST",
                //             url: "datatable.php",
                //             data: {
                //                 datas: true,
                //             },
                //             cache: false,
                //             success: function(datatables) {
                //                 console.log(datatables)


                //             }

                //             // success: function (datas) {


                //             // }
                //         });

                //     });
                // });
            </script>
        </div>

    </div>

</body>

</html>