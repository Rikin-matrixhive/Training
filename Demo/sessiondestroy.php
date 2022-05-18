<?php
session_start();


session_unset();

session_destroy();

echo "Your session has been destroyed" ;

?>