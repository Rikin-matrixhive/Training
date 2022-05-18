<?php
interface laptops{
    public function model();

}
class thinkpad implements laptops{
    public function model(){
        echo "lenovo";
    }

}
$laptops =new thinkpad();
$laptops->model();

?>   