<?php
// this is class 
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$apple = new Fruit(); // and this is 
$color = new Fruit();

var_dump($apple instanceof Fruit); // intance of : this keyboard is use to check if an object belongs to class or not
$apple->set_name('Apple');
$color->set_name('red');


echo $apple->get_name();
echo "<br>";
echo $color->get_name();


?>