<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db = "employee";
$connect = mysqli_connect($servername, $username, $password, $db);
$sql = "SELECT * FROM emp_details";
$res= mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Your recodrs</title>
</head>
<body>
    <table class="table table-striped"> 
        <thead><tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>MOBILE</th>
        <th>GENDER</th>
        <th>APPLYING</th>
        <th>PROFILE</th>
        <th>RESUME</th>
        <th>APPLY FOR</th>
        <th>Address</th>
        <th>ACTION</th>

    </tr></thead>
    <tbody>
            <?php
            while($row= mysqli_fetch_array($res)){

            ?>
                    <tr>    

            <td><?php echo $row['id'];?></td>

            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['mobile'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['apply'];?></td>        
            
            <td><img src="profile/<?php echo $row['image'];?>" style="width:100px;height:100px "></td>
            <td><a href="" download="<?php echo $row['resumes'];?>"><?php echo $row['resumes'];?>|Download</a></td>        

            <td><?php echo $row['applyfor'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>"onclick="return confirm('Are you sure, you want to delete it?')">Delete</a></td>

            <?php }?>

    </tbody>
    </table>
</body>
</html>