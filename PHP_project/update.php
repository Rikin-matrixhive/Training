<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db = "employee";
$connect = mysqli_connect($servername, $username, $password, $db);
if(isset($_GET['id'])){
$userid = $_GET['id'];
$sql = "SELECT * FROM emp_details where id = $userid";
$res= mysqli_query($connect, $sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
            while($row= mysqli_fetch_array($res)){

            ?>  
    <div class="container mt-3">
        <form action="update.php" method="post" enctype="multipart/form-data">
            <hr>
            <img src="profile/<?php echo $row['image'];?>" style="width:100px;height:100px ">

            <hr>

               <div class="mb-3 mt-3">
                <label>Name:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter full name" name="name" value="<?php echo $row['name'];?>">
            </div>
            <div class="mb-3 mt-3">
                <label>Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email'];?>">
            </div>
            <div class="mb-3 mt-3">
                <label >Mobile:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter mobileno" name="mobile" value="<?php echo $row['mobile'];?>">
            </div>
        

          
            <label for="sel1" class="form-label">Select designation:</label>
            <select class="form-select" id="sel1" name="apply" value="<?php echo $row['apply'];?>">
                <optio>Devloper</option>
                <option>Tester</option>
                <option>HR</option>
                <option>Manager</option>
            </select>
            <div class="mb-3 mt-3">
                <label >Upload your profile picture:</label>
                <input type="file" class="form-control" id="email" placeholder="Enter email" name="image">
            </div>
            


                <div class="mb-3 mt-3">
                    <label >Address:</label>
                    <textarea class="form-control" rows="5" name="address" placeholder="Enter address" value="<?php echo $row['address'];?>"  ></textarea>
                </div>
        
            
            <button type="submit" class="btn btn-primary" name="update">Submit</button>

        </form>
        
        
        <?php 
        } }
    if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $apply = $_POST['apply'];
    $file = $_FILES['image']['name'];
    $tmpname  = $_FILES['image']['tmp_name'];
    $dir = "profile/";
    $targetpath = $dir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $address = $_POST['address'];
    $mysqli= mysqli_query($connect,"UPDATE `emp_details` SET `name`='$name',`email`='$email',`mobile`='$mobile',`apply`='$apply',`image`='$file' WHERE `id`='$user_id'");
   var_dump($mysqli);
   print_r($_FILES);
   print_r($_POST);
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;

    }   if (move_uploaded_file($_FILES["image"]["tmp_name"], "profile/" . $file)&& $mysqli == true) {
        echo "Data updated";
     } else {
        echo "Data Not updated";
    }
}        
        ?>

</body>

</html>