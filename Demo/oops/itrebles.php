<?php
// Create an Iterator
class MyIterator implements Iterator {
  private $items = [];
  private $pointer = 0;

  public function __construct($items) {
    // array_values() makes sure that the keys are numbers
    $this->items = array_values($items);
  }

  public function current() {
    return $this->items[$this->pointer];
  }

  public function key() {
    return $this->pointer;
  }

  public function next() {
    $this->pointer++;
  }

  public function rewind() {
    $this->pointer = 0;
  }

  public function valid() {
    // count() indicates how many items are in the list
    return $this->pointer < count($this->items);
  }
}

// A function that uses iterables
function printIterable(iterable $myIterable) {
  foreach($myIterable as $item) {
    echo $item;
  }
}

// Use the iterator as an iterable
$iterator = new MyIterator(["a", "b", "c"]);
printIterable($iterator);
?>




<?php



function printeble(iterable $myitreble){
    foreach($myitreble as $item){
        echo $item;
        echo "<br>";

        
    
    }
}

$cararr= ["Ciaz","THAR", "Creta"];
printeble($cararr);

//another method

function getitreable():iterable{
    return ["a","b","c","d"];

}
$myitreble = getitreable();
foreach ($myitreble as $items) {
    echo "<br>";
echo $items;

}

// // how to create it

//     class myitretor implements Iterator{
//         private $items = [];
//         private $items =0;
//         public function __construct($items){
//         $this->items = array_values($items);
            
//         }
//         public function current()
//         {
//             return $this->items[$this->pointer];
//         }
//         public function key()
//         {
//             return $this->pointer;
//         }


//         public function next()
//         {
//             return $this->pointer++;
//         }
//         public function rewind()
//         {
//             return $this->pointer= 0;
//         }
//         public function valid()
//         {
//             return $this->pointer < count($this->items);
//         }

//         function printIterable(iterable $myIterable) {
//             foreach($myIterable as $item) {
//               echo $item;
//             }
//           }
//         }
          
//           // Use the iterator as an iterable
//               $iterator = new myitretor(["a", "b", "c"]);
//           printIterable($iterator);
//           ?>

