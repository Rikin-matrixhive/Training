<form action="<?php $_SERVER['PHP_SELF'];?>"  method="POST" >
    <input type="text" name="myname">
    <br>
    <button type="button
    ">Add</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
    $name =htmlspecialchars($_REQUEST['myname']) ;
    if(empty($name)){
        echo "Name is empty";
    }
    else{
      echo  $name;  
    }
}
?>