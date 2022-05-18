<?php
class democlass{
    private $a;
    public function displayparent(){
        $this->a = 50;
        echo $this->a;
    }
}
$obj = new democlass;
$obj->displayparent();



class democlass1{
    protected $a;
    public function displayparent(){
        $this->a = 100;
        echo $this->a;
    }
}


class anotherdemoclass extends democlass1{
    
}
$obj = new democlass1;
$obj->displayparent();
?>