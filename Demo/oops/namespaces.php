<?php
namespace html;
class tables{
    public $titel = "";
    public $numrows = 0;
    public function message(){
        echo "<p> {$this->titel} has {$this->numrows}";
    }
}
$table = new tables();
$table->titel = "employee tables";
$table->numrows = "5";
//another method


?>



<p><?php $table->message()?></p>


