<?php
include 'backend.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client side Datatable</title>
</head>

<body>
<div class="card">
<div class="card-header bg-success text-white text-center">Client-side datatable</div>
<div class="card">
    <table class="table table-striped" id="myTable">
        <thead> 
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Birthdate</th>
                <th>Age</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Source</th>
                <th>Campign</th>
                <th>Country</th>
            </tr>
        <tbody>
        <tr> <?php
                    $customers = $customerObj->displayData();
                    foreach ($customers as $customer) {
                    ?>
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
        </tr>
        <?php }?>

        </tbody>
        </tbody>
        </thead>
    </table>
</div>
<div class="card-footer"></div>
</div>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>

</html>