<?php
   abstract class base {
      abstract function printdata();
      public function getdata() {
         echo "Rikin";
      }
   }
   class child extends base{
      public function printdata(){
         echo "Good morning";
      }
   }
   $obj = new child();
   $obj->printdata();
?>