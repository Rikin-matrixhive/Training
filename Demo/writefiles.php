<form action="" method="post">
<label for="">Enter data</label>
<input type="text" name="datas" >
</form>


<?php  
$fp = fopen('demo.txt', 'w+');
$data = $_POST['datas'];
// echo $data;
fwrite($fp, $data);  
fclose($fp);  
  
?>  