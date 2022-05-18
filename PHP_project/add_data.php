<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db = "employee";
$connect = mysqli_connect($servername, $username, $password, $db);

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $apply = $_POST['apply'];
    $file = $_FILES['image']['name'];
    $tmpname  = $_FILES['image']['tmp_name'];
    $dir = "profile/";
    $targetpath = $dir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $resume = $_FILES['resumes']['name'];
    $tmpname1  = $_FILES['resumes']['tmp_name'];
    $dir1 = "resume/";
    $anothertargetpath = $dir1 . basename($_FILES['resumes']['name']);
    $resumefiletype = strtolower(pathinfo($resume, PATHINFO_EXTENSION));
    $applyfor = implode(', ', $_POST['applyfor']);
    $address = $_POST['address'];
    $pass = $_POST['pass'];
    $sql = mysqli_query($connect, "INSERT INTO `emp_details`(`name`, `email`, `mobile`, `gender`, `apply`, `image`, `resumes`, `applyfor`, `address`, `pass`) VALUES ('$name','$email','$mobile','$gender','$apply','$file','$resume','$applyfor','$address','$pass') ");

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }  if ($resumefiletype != "doc" && $resumefiletype != "pdf" && $resumefiletype != "zip") {
        echo "Sorry, only doc, pdf, zip files are allowed.";
        $uploadOk = 0;
    } if (move_uploaded_file($_FILES["image"]["tmp_name"], "profile/" . $file)) {
    }  if (move_uploaded_file($_FILES["resumes"]["tmp_name"], "resume/" . $resume) && $sql) {
        $last_id = mysqli_insert_id($conn);
        echo "Data inserted";
    } else {
        echo "Data Not inserted";
    }
}
