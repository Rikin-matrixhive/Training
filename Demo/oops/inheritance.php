
<?php

class Employee{

public $name = "Rikin";
// private $salary = 12000;
// private $grade = 3;

function setSalary($salary){
    $this->salary = $salary; 
}

function getSalary(){ 
    echo "The salary of employee is $this->name is $this->salary <br>";
}

function showName(){
    echo "The name of this employee is $this->name <br>";
}
}

// Inheriting a new class Programmer from Employee
class Programmer extends Employee{
public $language = "php";

function changeLanguage($lang){
    $this->language = $lang; 
}
}
$obj = new Programmer();
echo $obj->name;

?>