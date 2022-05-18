<?php
class pi {
    public static $value = 45555;
    public function staticValue(){
        return self::$value;
    }

}

$pi = new pi();
echo $pi->staticValue();
?>