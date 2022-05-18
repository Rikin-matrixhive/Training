<?php
include("config.php");

$sql =mysqli_query($conn,"SELECT * FROM employeedetails");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>See records</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Employee Details </h2>
  <table class="table table-bordered container mt-3" style="width: 100%; height:100%; ">
    <thead class="bg-primary text-white">
      <tr>
      <th>UUID</th>

        <th>Name</th>
        <th>Date</th>
        <th>Mobile</th>
        <th>Salary</th>
        <th>Profile</th>
        <th>Action</th>


      </tr>
    </thead>
    <tbody>
      <tr>
          <?php
          while($row=mysqli_fetch_array($sql)){

          ?>
       <td><?php echo $row['uuid'];?></td>
       <td><?php echo $row['names'];?></td>
       <td><?php echo $row['dates'];?></td>
       <td><?php echo $row['mobno'];?></td>
       <td><?php echo $row['salary'];?></td>
       <td><img src="profile/<?php echo $row['profiles'];?>" style="width:100%;height:100px "></td>
       <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
       <form action="update.php" method="post"> 
       <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
       <input type="hidden" name="deleteemp_image" value="<?php echo $row['profiles']; ?>">

       
       </form>
       <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure, you want to delete it?')">Delete</a>
      </td>
      </tr>
      <?php
          }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
