<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File open and read</title>
</head>
<body>
    <?php
//  // for opning a file
$files= fopen("demo.txt", "r") or die("Unable to open a file");
// echo fread($files, filesize("constant.php"));
// fclose($files);

// // for closing a files
// $demofiles = fopen("variable.php", "r");
// echo fclose($demofiles);

// Read  a single lines
// echo fgets($files);
// fclose($files);
// while(!feof($files)){
// echo fgets($files);
// }
// fclose($files);
while(!feof($files)){
    echo fgetc($files);
    }
    fclose($files);
    ?>
</body> 
</html>