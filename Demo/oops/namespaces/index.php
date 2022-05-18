<?php
include("product.php");

include("test.php");
function wow(){
    echo "This is also index files <br> ";
}
pro\wow(); //for function
$obj = new  tes\test;// for class
$obj1 = new pro\product;
?>  