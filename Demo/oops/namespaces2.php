<?php
include ("namespaces.php"); // include the file
$table = new namespaces\tables(); // create a new object
$table->titel = "mytable"; // set the title
$table->numrows =5; // set the number of rows
$row = new namespaces\tables(); // create a new object
$table->numrows =3; // set the number of rows

?>
<p><?php $table->message()?></p> // print the message
<p><?php $row->message()?></p> // print the message
?>
