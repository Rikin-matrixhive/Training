<?php
$cookiesname = "user";
$cookiesvalues = $_POST["myname"];
setcookie($cookiesname,$cookiesvalues, time()+(86400*30) , "/");
// setcookie("user", time()- 3600);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies in php</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="myname" placeholder="Enter name">
    </form>
    <div>
      <?php

      if(count($_COOKIE)>0){
          echo "Cookies are enabled" ;
      }

      else{
          echo "Cookies are not enabled";
      }
    //   echo "Cookies is deleted";
    //    if(!isset($_COOKIE[$cookiesname])){
    //      echo "Cookies name". $cookiesname. "is not set";
    //    }
    //    else{
    //     echo "Cookies name is: " . $cookiesname;
    //     echo " And it's value is ". $_COOKIE[$cookiesname];
    //    }
      ?>

      
    </div>
</body>
</html>

