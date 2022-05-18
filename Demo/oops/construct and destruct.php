<?php

// with parameters
class Cars
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}

$obj = new cars("Thar");
echo $obj->name . "<br>";
?>

<?php
// // without parameters

class Bikes
{
    function __construct()
    {
        echo "Dominar 400 is my favorite bike <br>";
    }
}

$obj1 = new Bikes();



// -----------------------------------------------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------------------------------------------
                                                             // destruct in php


class laptops{
    public $model;
    public function __construct($mod)
    {
        $this->model= $mod;
    }
    public function __destruct()
    {
     echo "$this->model is destructing  <br> ";
    }
    
}
$anobj = new laptops("thinkpad");
$anobj = new laptops("thinkpad");

echo $anobj->model ."<br>";
?>