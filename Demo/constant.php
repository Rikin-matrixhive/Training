<?php
define("HELLO", "Hi this is rikin");
echo HELLO;

// array in constants
define("cars",
[
"audi","BMW", "Tesla"
]);

echo "<br>". cars[0].cars[1].cars[2];

// constant are global

define("games", "bgmi");
function seegame(){
echo "<br>".  games;
}
seegame();
?>