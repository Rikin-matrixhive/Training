<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Fiter name</td>
            <td>Filter id</td>
        </tr>
        <?php
    //    foreach(filter_list() as $id => $filter){
    //    echo '<tr><td>'. $filter. '</td><td>'. filter_id($filter). '</td></tr>';
    //    }

    // $sentence = "Hello this is Hello world";
    // $newsentence= filter_var($sentence);
    // echo $newsentence;
     

    // // for validate int
    // $integer= 0;

    // if(filter_var($integer, FILTER_VALIDATE_INT)=== 0 || !filter_var($integer, FILTER_VALIDATE_INT)=== false){
    // echo "Integer is valid";
  
    // }
    // else{
    //     echo "Integer is not valid";
    // }    

    // for IP

    // $ip = "127.0.0.1";
    // if(!filter_var($ip,FILTER_VALIDATE_IP)=== FALSE){
    //     echo "IP is valid";
    // }
    // else{
    //     echo "Ip is not valid";
    // }
    

    // for validating emails

    // $myemail = "rikin@gmail.com";
    // if(!filter_var($myemail,FILTER_VALIDATE_EMAIL)=== FALSE){
    //     echo "Email is valid";
    // }
    // else {
    //     echo "Email is not valid";
    // }

    // $url = "https://www.w3schools.com";
    // $url = filter_var($url, FILTER_SANITIZE_URL);

    // if(!$filter_var($url, FILTER_VALIDATE_URL)=== false){
    //     echo "URL is valid";
    // }
    // else{
    //     echo "Url is not valid";
    // }


$url = "https://www.w3schools.com";

// Remove all illegal characters from a url
// $url = filter_var($url, FILTER_SANITIZE_URL);

// Validate url
if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
  echo " valid URL";
} else {
  echo("Not a valid URL");
}
    ?>
    </table>
</body>
</html>