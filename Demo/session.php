<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>

<body>
    <form action="session.php" method="post">

        <input type="text" name="name" placeholder="Enter name " autocomplete="off"><br><br>
        <input type="text" name="age" placeholder="Enter age " autocomplete="off"><br><br>
        <input type="submit" value="Add Session" name="send">
    </form>
    <div>

        <?php
        if ($_SESSION["Name"] = $_POST['name'] && $_SESSION["Age"] = $_POST['age']) {
            echo "Your session has set";
            $name = $_SESSION['Name'];
            $age = $_SESSION['age'];
            echo $name;
            echo $sge;
        } else {
            echo "Youe session can't be store";
        }
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["Name"] . ".<br>";
echo "Favorite animal is " . $_SESSION["age"] . ".";
        ?>
    </div>
</body>

</html>