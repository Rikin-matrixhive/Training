<?php
class greeting{
    public static function welcome(){
        echo "Hello world";
    }
}
greeting::welcome();


// 

class messages{
    public static function messages(){
        echo "<br>";
        echo "this is new message";
    }
    public function __construct()
    {
        self::messages();
    }

}
new messages();
?>